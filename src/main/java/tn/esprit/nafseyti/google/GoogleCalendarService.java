package tn.esprit.nafseyti.google;

import com.google.api.client.auth.oauth2.Credential;
import com.google.api.client.auth.oauth2.TokenResponse;
import com.google.api.client.googleapis.auth.oauth2.GoogleAuthorizationCodeFlow;
import com.google.api.client.googleapis.auth.oauth2.GoogleClientSecrets;
import com.google.api.client.googleapis.auth.oauth2.GoogleTokenResponse;
import com.google.api.client.googleapis.javanet.GoogleNetHttpTransport;
import com.google.api.client.http.javanet.NetHttpTransport;
import com.google.api.client.json.JsonFactory;
import com.google.api.client.json.jackson2.JacksonFactory;
import com.google.api.client.util.DateTime;
import com.google.api.client.util.store.FileDataStoreFactory;
import com.google.api.services.calendar.Calendar;
import com.google.api.services.calendar.CalendarScopes;
import com.google.api.services.calendar.model.Event;
import com.google.api.services.calendar.model.EventDateTime;
import com.google.api.services.calendar.model.Events;

import java.io.*;
import java.security.GeneralSecurityException;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.ZoneId;
import java.time.ZonedDateTime;
import java.time.format.DateTimeFormatter;
import java.util.Collections;
import java.util.List;

public class GoogleCalendarService {

    private static final String APPLICATION_NAME = "Nafseyti";
    private static final JsonFactory JSON_FACTORY = JacksonFactory.getDefaultInstance();
    private static final String TOKENS_DIR        = "tokens";
    private static final List<String> SCOPES      = Collections.singletonList(CalendarScopes.CALENDAR);
    // ── URI de redirection — doit correspondre à Google Cloud Console ──
    private static final String REDIRECT_URI = "urn:ietf:wg:oauth:2.0:oob";

    private static Calendar calendarService;
    private static GoogleAuthorizationCodeFlow flow;

    // ─────────────────────────────────────────────────
    //  Construire le Flow OAuth2
    // ─────────────────────────────────────────────────
    public static GoogleAuthorizationCodeFlow getFlow(NetHttpTransport transport) throws IOException {
        if (flow != null) return flow;

        File credFile = new File("src/main/java/tn/esprit/nafseyti/google/credentials.json");
        if (!credFile.exists()) {
            throw new FileNotFoundException(
                    "credentials.json introuvable à : " + credFile.getAbsolutePath());
        }

        GoogleClientSecrets secrets = GoogleClientSecrets.load(
                JSON_FACTORY, new FileReader(credFile));

        flow = new GoogleAuthorizationCodeFlow.Builder(
                transport, JSON_FACTORY, secrets, SCOPES)
                .setDataStoreFactory(new FileDataStoreFactory(new File(TOKENS_DIR)))
                .setAccessType("offline")
                .build();

        return flow;
    }
    // ✅ Nouvelle méthode — juste générer le lien sans bloquer
    public static String generateAuthUrl() throws Exception {
        NetHttpTransport transport = GoogleNetHttpTransport.newTrustedTransport();
        GoogleAuthorizationCodeFlow authFlow = getFlow(transport);
        return authFlow.newAuthorizationUrl()
                .setRedirectUri(REDIRECT_URI)
                .build();
    }

    // ✅ Nouvelle méthode — valider le code collé par l'utilisateur
    public static void authenticateWithCode(String code) throws Exception {
        NetHttpTransport transport = GoogleNetHttpTransport.newTrustedTransport();
        GoogleAuthorizationCodeFlow authFlow = getFlow(transport);
        GoogleTokenResponse tokenResponse = authFlow.newTokenRequest(code)
                .setRedirectUri(REDIRECT_URI)
                .execute();
        authFlow.createAndStoreCredential(tokenResponse, "user");
        // Réinitialiser pour utiliser le nouveau token
        calendarService = null;
    }

    // ✅ Vérifier si déjà authentifié
    public static boolean isAuthenticated() throws Exception {
        NetHttpTransport transport = GoogleNetHttpTransport.newTrustedTransport();
        GoogleAuthorizationCodeFlow authFlow = getFlow(transport);
        Credential existing = authFlow.loadCredential("user");
        return existing != null && (existing.getRefreshToken() != null
                || existing.getExpiresInSeconds() > 60);
    }

    // ─────────────────────────────────────────────────
    //  Authentification avec WebView JavaFX intégré
    //  → Ouvre une fenêtre dans l'app au lieu du navigateur
    // ─────────────────────────────────────────────────
    private static Credential getCredentials(NetHttpTransport transport) throws Exception {
        GoogleAuthorizationCodeFlow authFlow = getFlow(transport);

        // Vérifier si un token valide existe déjà
        Credential existing = authFlow.loadCredential("user");
        if (existing != null && (existing.getRefreshToken() != null
                || existing.getExpiresInSeconds() > 60)) {
            System.out.println("✅ Token existant valide — pas besoin de re-authentifier");
            return existing;
        }

        // ── Générer l'URL d'authentification Google ──
        String authUrl = authFlow.newAuthorizationUrl()
                .setRedirectUri(REDIRECT_URI)
                .build();

        System.out.println("🌐 Ouverture de la fenêtre d'authentification Google...");

        // ── Ouvrir la fenêtre WebView dans l'app ────
        GoogleAuthWebView webView = new GoogleAuthWebView();
        String code = webView.showAndWaitForCode(authUrl, REDIRECT_URI);

        if (code == null) {
            throw new IOException("❌ Authentification annulée par l'utilisateur.");
        }

        // ── Échanger le code contre un token ────────
        GoogleTokenResponse tokenResponse = authFlow.newTokenRequest(code)
                .setRedirectUri(REDIRECT_URI)
                .execute();

        Credential credential = authFlow.createAndStoreCredential(tokenResponse, "user");
        System.out.println("✅ Authentification Google réussie !");
        return credential;
    }

    // ─────────────────────────────────────────────────
    //  Singleton du service Calendar
    // ─────────────────────────────────────────────────
    public static Calendar getService() throws Exception {
        if (calendarService == null) {
            NetHttpTransport transport = GoogleNetHttpTransport.newTrustedTransport();
            calendarService = new Calendar.Builder(
                    transport, JSON_FACTORY, getCredentials(transport))
                    .setApplicationName(APPLICATION_NAME)
                    .build();
        }
        return calendarService;
    }

    // ─────────────────────────────────────────────────
    //  CRÉER un événement → retourne l'ID Google
    // ─────────────────────────────────────────────────
    public static String createEvent(String titre,
                                     LocalDate date,
                                     LocalTime debut,
                                     LocalTime fin,
                                     String description) throws Exception {
        Event event = new Event()
                .setSummary(titre)
                .setDescription(description)
                .setColorId("7"); // ← 🔵 Bleu Google Calendar
        ZoneId zone = ZoneId.of("Africa/Tunis");

        String startStr = ZonedDateTime.of(date, debut, zone)
                .format(DateTimeFormatter.ISO_OFFSET_DATE_TIME);
        String endStr   = ZonedDateTime.of(date, fin, zone)
                .format(DateTimeFormatter.ISO_OFFSET_DATE_TIME);

        event.setStart(new EventDateTime()
                .setDateTime(new DateTime(startStr))
                .setTimeZone("Africa/Tunis"));
        event.setEnd(new EventDateTime()
                .setDateTime(new DateTime(endStr))
                .setTimeZone("Africa/Tunis"));

        Event created = getService().events().insert("primary", event).execute();
        System.out.println("✅ Événement Google créé : " + created.getHtmlLink());
        return created.getId();
    }

    // ─────────────────────────────────────────────────
    //  LIRE les événements du mois en cours
    // ─────────────────────────────────────────────────
    public static List<Event> getEventsThisMonth() throws Exception {
        LocalDate now   = LocalDate.now();
        LocalDate start = now.withDayOfMonth(1);
        LocalDate end   = now.withDayOfMonth(now.lengthOfMonth());
        ZoneId zone     = ZoneId.of("Africa/Tunis");

        DateTime timeMin = new DateTime(
                ZonedDateTime.of(start, LocalTime.MIDNIGHT, zone)
                        .format(DateTimeFormatter.ISO_OFFSET_DATE_TIME));
        DateTime timeMax = new DateTime(
                ZonedDateTime.of(end, LocalTime.of(23, 59, 59), zone)
                        .format(DateTimeFormatter.ISO_OFFSET_DATE_TIME));

        Events events = getService().events().list("primary")
                .setTimeMin(timeMin)
                .setTimeMax(timeMax)
                .setOrderBy("startTime")
                .setSingleEvents(true)
                .execute();

        return events.getItems();
    }

    // ─────────────────────────────────────────────────
    //  MODIFIER un événement existant
    // ─────────────────────────────────────────────────
    public static void updateEvent(String googleEventId,
                                   String nouveauTitre,
                                   LocalDate date,
                                   LocalTime debut,
                                   LocalTime fin) throws Exception {
        Event event = getService().events().get("primary", googleEventId).execute();
        event.setSummary(nouveauTitre);

        ZoneId zone = ZoneId.of("Africa/Tunis");

        event.setStart(new EventDateTime()
                .setDateTime(new DateTime(ZonedDateTime.of(date, debut, zone)
                        .format(DateTimeFormatter.ISO_OFFSET_DATE_TIME)))
                .setTimeZone("Africa/Tunis"));
        event.setEnd(new EventDateTime()
                .setDateTime(new DateTime(ZonedDateTime.of(date, fin, zone)
                        .format(DateTimeFormatter.ISO_OFFSET_DATE_TIME)))
                .setTimeZone("Africa/Tunis"));

        getService().events().update("primary", googleEventId, event).execute();
        System.out.println("✏️ Événement Google mis à jour !");
    }

    // ─────────────────────────────────────────────────
    //  SUPPRIMER un événement
    // ─────────────────────────────────────────────────
    public static void deleteEvent(String googleEventId) throws Exception {
        getService().events().delete("primary", googleEventId).execute();
        System.out.println("🗑️ Événement Google supprimé !");
    }

    // ─────────────────────────────────────────────────
    //  Réinitialiser le service (pour re-authentifier)
    // ─────────────────────────────────────────────────
    public static void resetService() {
        calendarService = null;
        flow = null;
    }
}