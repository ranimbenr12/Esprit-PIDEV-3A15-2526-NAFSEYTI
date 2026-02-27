package tn.esprit.nafseyti.google;

import com.google.api.client.auth.oauth2.Credential;
import com.google.api.client.googleapis.auth.oauth2.GoogleAuthorizationCodeFlow;
import com.google.api.client.googleapis.auth.oauth2.GoogleClientSecrets;
import com.google.api.client.googleapis.javanet.GoogleNetHttpTransport;
import com.google.api.client.http.javanet.NetHttpTransport;
import com.google.api.client.json.JsonFactory;
import com.google.api.client.json.jackson2.JacksonFactory;
import com.google.api.client.util.store.FileDataStoreFactory;
import com.google.api.services.sheets.v4.Sheets;
import com.google.api.services.sheets.v4.SheetsScopes;
import com.google.api.services.sheets.v4.model.*;

import java.io.*;
import java.util.*;

public class GoogleSheetsService {

    private static final String APPLICATION_NAME = "Nafseyti";
    private static final JsonFactory JSON_FACTORY = JacksonFactory.getDefaultInstance();
    private static final String TOKENS_DIR        = "tokens_sheets";
    private static final List<String> SCOPES      = Arrays.asList(
            SheetsScopes.SPREADSHEETS,
            "https://www.googleapis.com/auth/drive.file"
    );
    private static final String REDIRECT_URI = "urn:ietf:wg:oauth:2.0:oob";

    private static Sheets sheetsService;
    private static GoogleAuthorizationCodeFlow flow;

    // ── Flow OAuth2 ──
    public static GoogleAuthorizationCodeFlow getFlow() throws Exception {
        if (flow != null) return flow;

        File credFile = new File("src/main/java/tn/esprit/nafseyti/google/credentials.json");
        GoogleClientSecrets secrets = GoogleClientSecrets.load(
                JSON_FACTORY, new FileReader(credFile));

        NetHttpTransport transport = GoogleNetHttpTransport.newTrustedTransport();
        flow = new GoogleAuthorizationCodeFlow.Builder(
                transport, JSON_FACTORY, secrets, SCOPES)
                .setDataStoreFactory(new FileDataStoreFactory(new File(TOKENS_DIR)))
                .setAccessType("offline")
                .build();
        return flow;
    }

    // ── Vérifier si authentifié ──
    public static boolean isAuthenticated() throws Exception {
        Credential existing = getFlow().loadCredential("user");
        if (existing == null) return false;
        if (existing.getExpiresInSeconds() != null && existing.getExpiresInSeconds() <= 60) {
            boolean refreshed = existing.refreshToken();
            if (!refreshed) {
                getFlow().getCredentialDataStore().delete("user");
                sheetsService = null;
                return false;
            }
        }
        return true;
    }

    // ── Générer URL auth ──
    public static String generateAuthUrl() throws Exception {
        return getFlow().newAuthorizationUrl().setRedirectUri(REDIRECT_URI).build();
    }

    // ── Authentifier avec code ──
    public static void authenticateWithCode(String code) throws Exception {
        var tokenResponse = getFlow().newTokenRequest(code)
                .setRedirectUri(REDIRECT_URI).execute();
        getFlow().createAndStoreCredential(tokenResponse, "user");
        sheetsService = null;
    }

    // ── Service Sheets ──
    public static Sheets getService() throws Exception {
        if (sheetsService == null) {
            NetHttpTransport transport = GoogleNetHttpTransport.newTrustedTransport();
            Credential credential = getFlow().loadCredential("user");
            sheetsService = new Sheets.Builder(transport, JSON_FACTORY, credential)
                    .setApplicationName(APPLICATION_NAME)
                    .build();
        }
        return sheetsService;
    }

    // ── Créer le Spreadsheet avec les statistiques ──
    public static String createStatistiquesSheet(
            String medecinNom,
            int total, int confirmes, int enAttente, int annules,
            List<List<Object>> lignesRdv) throws Exception {

        // 1️⃣ Créer le fichier avec onglet "Résumé"
        Spreadsheet spreadsheet = new Spreadsheet()
                .setProperties(new SpreadsheetProperties()
                        .setTitle("📊 Statistiques NAFSEYTI — " + medecinNom))
                .setSheets(Arrays.asList(
                        new Sheet().setProperties(new SheetProperties()
                                .setTitle("Résumé").setIndex(0))
                ));

        Spreadsheet created = getService().spreadsheets()
                .create(spreadsheet).execute();
        String spreadsheetId = created.getSpreadsheetId();

        // ✅ Récupérer l'ID RÉEL de l'onglet "Résumé"
        int resumeSheetId = created.getSheets().get(0).getProperties().getSheetId();

        // 2️⃣ Remplir "Résumé"
        List<List<Object>> resumeData = new ArrayList<>();
        resumeData.add(Arrays.asList("📊 STATISTIQUES NAFSEYTI", ""));
        resumeData.add(Arrays.asList("Médecin", medecinNom));
        resumeData.add(Arrays.asList("Date d'export", java.time.LocalDate.now().toString()));
        resumeData.add(Arrays.asList("", ""));
        resumeData.add(Arrays.asList("INDICATEUR", "VALEUR"));
        resumeData.add(Arrays.asList("Total Rendez-vous", total));
        resumeData.add(Arrays.asList("✅ Confirmés", confirmes));
        resumeData.add(Arrays.asList("⏳ En attente", enAttente));
        resumeData.add(Arrays.asList("❌ Annulés", annules));
        resumeData.add(Arrays.asList("", ""));
        resumeData.add(Arrays.asList("Taux de confirmation",
                total > 0 ? Math.round((confirmes * 100.0) / total) + "%" : "0%"));

        getService().spreadsheets().values()
                .update(spreadsheetId, "Résumé!A1", new ValueRange().setValues(resumeData))
                .setValueInputOption("RAW")
                .execute();

        // 3️⃣ Ajouter onglet "Détail RDV" et récupérer son ID réel
        int detailSheetId = addSheetAndGetId(spreadsheetId, "Détail RDV");

        List<List<Object>> rdvData = new ArrayList<>();
        rdvData.add(Arrays.asList(
                "ID", "Patient", "Date", "Heure début",
                "Heure fin", "Type séance", "Statut"));
        rdvData.addAll(lignesRdv);

        getService().spreadsheets().values()
                .update(spreadsheetId, "Détail RDV!A1", new ValueRange().setValues(rdvData))
                .setValueInputOption("RAW")
                .execute();

        // 4️⃣ Formatter avec les vrais IDs
        formatHeaders(spreadsheetId, resumeSheetId, detailSheetId);

        return spreadsheetId;
    }

    // ✅ Retourne l'ID réel du nouvel onglet
    private static int addSheetAndGetId(String spreadsheetId, String sheetName) throws Exception {
        AddSheetRequest addSheet = new AddSheetRequest()
                .setProperties(new SheetProperties().setTitle(sheetName));
        BatchUpdateSpreadsheetRequest request = new BatchUpdateSpreadsheetRequest()
                .setRequests(Collections.singletonList(
                        new Request().setAddSheet(addSheet)));

        BatchUpdateSpreadsheetResponse response = getService().spreadsheets()
                .batchUpdate(spreadsheetId, request).execute();

        // ✅ Récupérer l'ID depuis la réponse
        return response.getReplies().get(0).getAddSheet()
                .getProperties().getSheetId();
    }

    // ✅ Formatter avec les vrais IDs des onglets
    private static void formatHeaders(String spreadsheetId,
                                      int resumeSheetId,
                                      int detailSheetId) throws Exception {
        List<Request> requests = new ArrayList<>();

        // Header onglet Résumé
        requests.add(new Request().setRepeatCell(
                new RepeatCellRequest()
                        .setRange(new GridRange()
                                .setSheetId(resumeSheetId)  // ← ID réel
                                .setStartRowIndex(0).setEndRowIndex(1)
                                .setStartColumnIndex(0).setEndColumnIndex(2))
                        .setCell(new CellData()
                                .setUserEnteredFormat(new CellFormat()
                                        .setBackgroundColor(new Color()
                                                .setRed(0.157f).setGreen(0.349f).setBlue(0.129f))
                                        .setTextFormat(new TextFormat()
                                                .setForegroundColor(new Color()
                                                        .setRed(1f).setGreen(1f).setBlue(1f))
                                                .setBold(true).setFontSize(12))))
                        .setFields("userEnteredFormat(backgroundColor,textFormat)")
        ));

        // Header onglet Détail RDV
        requests.add(new Request().setRepeatCell(
                new RepeatCellRequest()
                        .setRange(new GridRange()
                                .setSheetId(detailSheetId)  // ← ID réel
                                .setStartRowIndex(0).setEndRowIndex(1)
                                .setStartColumnIndex(0).setEndColumnIndex(7))
                        .setCell(new CellData()
                                .setUserEnteredFormat(new CellFormat()
                                        .setBackgroundColor(new Color()
                                                .setRed(0.157f).setGreen(0.349f).setBlue(0.129f))
                                        .setTextFormat(new TextFormat()
                                                .setForegroundColor(new Color()
                                                        .setRed(1f).setGreen(1f).setBlue(1f))
                                                .setBold(true).setFontSize(11))))
                        .setFields("userEnteredFormat(backgroundColor,textFormat)")
        ));

        BatchUpdateSpreadsheetRequest batchRequest = new BatchUpdateSpreadsheetRequest()
                .setRequests(requests);
        getService().spreadsheets().batchUpdate(spreadsheetId, batchRequest).execute();
    }

    public static void resetService() {
        sheetsService = null;
        flow = null;
    }
}