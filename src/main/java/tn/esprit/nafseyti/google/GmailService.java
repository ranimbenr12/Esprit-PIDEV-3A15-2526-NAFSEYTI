package tn.esprit.nafseyti.google;

import com.google.api.client.auth.oauth2.Credential;
import com.google.api.client.extensions.java6.auth.oauth2.AuthorizationCodeInstalledApp;
import com.google.api.client.extensions.jetty.auth.oauth2.LocalServerReceiver;
import com.google.api.client.googleapis.auth.oauth2.GoogleAuthorizationCodeFlow;
import com.google.api.client.googleapis.auth.oauth2.GoogleClientSecrets;
import com.google.api.client.googleapis.javanet.GoogleNetHttpTransport;
import com.google.api.client.http.javanet.NetHttpTransport;
import com.google.api.client.json.jackson2.JacksonFactory;
import com.google.api.client.util.store.FileDataStoreFactory;
import com.google.api.services.gmail.Gmail;
import com.google.api.services.gmail.model.Message;

import javax.mail.Session;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;
import java.io.*;
import java.util.*;

public class GmailService {

    private static final String APPLICATION_NAME = "NAFSEYTI";
    private static final List<String> SCOPES =
            Collections.singletonList("https://www.googleapis.com/auth/gmail.send");
    private static final String TOKENS_DIRECTORY_PATH = "tokens";

    private static Credential getCredentials(NetHttpTransport HTTP_TRANSPORT, String doctorEmail) throws Exception {
        InputStream in = new FileInputStream("src/main/java/tn/esprit/nafseyti/google/credentials_gmail.json");
        GoogleClientSecrets clientSecrets =
                GoogleClientSecrets.load(JacksonFactory.getDefaultInstance(), new InputStreamReader(in));

        GoogleAuthorizationCodeFlow flow =
                new GoogleAuthorizationCodeFlow.Builder(
                        HTTP_TRANSPORT,
                        JacksonFactory.getDefaultInstance(),
                        clientSecrets,
                        SCOPES)
                        .setDataStoreFactory(new FileDataStoreFactory(new File(TOKENS_DIRECTORY_PATH + "/" + doctorEmail)))
                        .setAccessType("offline")
                        .build();

        LocalServerReceiver receiver = new LocalServerReceiver.Builder().setPort(0).build();
        return new AuthorizationCodeInstalledApp(flow, receiver).authorize(doctorEmail);
    }

    // ─────────────────────────────────────────────────────────────
    //  sendEmail — accepte maintenant toutes les infos du RDV
    // ─────────────────────────────────────────────────────────────
    public static void sendEmail(
            String doctorEmail,
            String to,
            String subject,
            String patientName,
            String doctorName,
            String date,
            String heureDebut,
            String heureFin,
            String typeSeance
    ) throws Exception {

        final NetHttpTransport HTTP_TRANSPORT = GoogleNetHttpTransport.newTrustedTransport();

        Gmail service = new Gmail.Builder(
                HTTP_TRANSPORT,
                JacksonFactory.getDefaultInstance(),
                getCredentials(HTTP_TRANSPORT, doctorEmail))
                .setApplicationName(APPLICATION_NAME)
                .build();

        Properties props = new Properties();
        Session session = Session.getDefaultInstance(props, null);

        MimeMessage email = new MimeMessage(session);
        email.setFrom(new InternetAddress(doctorEmail));
        email.addRecipient(javax.mail.Message.RecipientType.TO, new InternetAddress(to));
        email.setSubject(subject, "UTF-8");

        // ── HTML body ──
        String htmlBody = buildHtmlEmail(patientName, doctorName, date, heureDebut, heureFin, typeSeance);

        MimeMultipart multipart = new MimeMultipart("alternative");
        MimeBodyPart htmlPart = new MimeBodyPart();
        htmlPart.setContent(htmlBody, "text/html; charset=utf-8");
        multipart.addBodyPart(htmlPart);
        email.setContent(multipart);

        ByteArrayOutputStream buffer = new ByteArrayOutputStream();
        email.writeTo(buffer);
        String encodedEmail = Base64.getUrlEncoder().encodeToString(buffer.toByteArray());

        Message message = new Message();
        message.setRaw(encodedEmail);
        service.users().messages().send("me", message).execute();
    }

    // ─────────────────────────────────────────────────────────────
    //  Template HTML du mail
    // ─────────────────────────────────────────────────────────────
    private static String buildHtmlEmail(
            String patientName, String doctorName,
            String date, String heureDebut, String heureFin, String typeSeance
    ) {
        // Lieu déduit automatiquement selon le type de séance
        String lieu = typeSeance.equalsIgnoreCase("En ligne")
                ? "🖥️ Visioconférence (lien envoyé séparément)"
                : "🏥 Cabinet du Dr. " + doctorName;

        // Lien Google Calendar pré-rempli (chose innovante 🚀)
        // Format dates : YYYYMMDDTHHMMSS — on construit depuis les strings reçus
        String calStart = date.replace("-", "") + "T" + heureDebut.replace(":", "") + "00";
        String calEnd   = date.replace("-", "") + "T" + heureFin.replace(":", "") + "00";
        String calTitle = java.net.URLEncoder.encode("RDV NAFSEYTI — Dr. " + doctorName, java.nio.charset.StandardCharsets.UTF_8);
        String calDetails = java.net.URLEncoder.encode("Séance " + typeSeance + " avec Dr. " + doctorName, java.nio.charset.StandardCharsets.UTF_8);
        String calLink = "https://calendar.google.com/calendar/render?action=TEMPLATE"
                + "&text=" + calTitle
                + "&dates=" + calStart + "/" + calEnd
                + "&details=" + calDetails;

        return "<!DOCTYPE html><html lang='fr'><head><meta charset='UTF-8'/>" +
                "<meta name='viewport' content='width=device-width,initial-scale=1'/>" +
                "<style>" +
                "body{margin:0;padding:30px 16px;background:#eef2f0;font-family:Arial,sans-serif;}" +
                ".wrap{max-width:580px;margin:0 auto;}" +
                // Header
                ".header{background:linear-gradient(135deg,#0f2d1e,#1a4731,#2d7a4f,#4caf7d);" +
                "border-radius:20px 20px 0 0;padding:40px 30px 52px;text-align:center;}" +
                ".header .logo{font-size:42px;display:block;margin-bottom:10px;}" +
                ".header h1{color:#fff;font-size:28px;font-weight:700;letter-spacing:2px;margin:0;}" +
                ".header p{color:rgba(255,255,255,.65);font-size:13px;margin-top:6px;letter-spacing:1px;}" +
                // Badge
                ".badge-wrap{text-align:center;margin:-20px 0 0;}" +
                ".badge{display:inline-block;background:#fff;border:2.5px solid #2d7a4f;" +
                "color:#1a4731;font-weight:700;font-size:12px;letter-spacing:1.5px;" +
                "padding:8px 28px;border-radius:40px;text-transform:uppercase;" +
                "box-shadow:0 4px 18px rgba(45,122,79,.22);}" +
                // Card
                ".card{background:#fff;border-radius:0 0 20px 20px;padding:36px 30px 30px;}" +
                ".greeting{font-size:15.5px;color:#444;line-height:1.75;margin-bottom:26px;" +
                "padding-bottom:22px;border-bottom:1px dashed #d5e8dc;}" +
                ".greeting strong{color:#1a4731;}" +
                // Table infos
                ".info-table{width:100%;border-collapse:separate;border-spacing:0 8px;margin-bottom:24px;}" +
                ".info-row td{padding:11px 14px;}" +
                ".ic{background:#e4f3eb;border-radius:10px 0 0 10px;width:44px;text-align:center;font-size:18px;}" +
                ".lb{background:#f6faf8;color:#8aab99;font-size:11px;text-transform:uppercase;" +
                "letter-spacing:.9px;font-weight:600;width:120px;}" +
                ".vl{background:#f6faf8;border-radius:0 10px 10px 0;color:#1a2e24;font-size:14px;font-weight:600;}" +
                // Warning box
                ".warn{background:linear-gradient(135deg,#fffbea,#fff3cd);border-radius:12px;" +
                "padding:16px 20px;margin-bottom:22px;border-left:4px solid #f0c040;}" +
                ".warn p{color:#7a5c00;font-size:13px;line-height:1.7;}" +
                // ── INNOVANT : bouton Google Calendar ──
                ".cal-btn{display:block;text-align:center;margin-bottom:26px;}" +
                ".cal-btn a{display:inline-block;background:linear-gradient(135deg,#1a4731,#2d7a4f);" +
                "color:#fff;text-decoration:none;font-size:14px;font-weight:700;letter-spacing:.4px;" +
                "padding:13px 36px;border-radius:50px;" +
                "box-shadow:0 6px 22px rgba(26,71,49,.32);}" +
                // Footer
                ".footer{border-top:1px solid #e5eeea;padding-top:20px;text-align:center;}" +
                ".footer .name{color:#2d7a4f;font-size:15px;font-weight:700;letter-spacing:2px;margin-bottom:6px;}" +
                ".footer p{color:#bbb;font-size:11.5px;line-height:1.8;}" +
                "</style></head><body>" +
                "<div class='wrap'>" +

                // ── Header
                "<div class='header'>" +
                "<span class='logo'>🌿</span>" +
                "<h1>NAFSEYTI</h1>" +
                "<p>Votre plateforme de santé mentale</p>" +
                "</div>" +

                // ── Badge
                "<div class='badge-wrap'><span class='badge'>✅ Rendez-vous Confirmé</span></div>" +

                // ── Card
                "<div class='card'>" +
                "<p class='greeting'>Bonjour <strong>" + patientName + "</strong>,<br>" +
                "Votre rendez-vous avec <strong>Dr. " + doctorName + "</strong> a été " +
                "<strong style='color:#2d7a4f'>officiellement confirmé</strong>. " +
                "Voici le récapitulatif complet :</p>" +

                // ── Tableau infos
                "<table class='info-table'>" +
                row("📅", "Date",           date) +
                row("🕐", "Heure de début", heureDebut) +
                row("🕓", "Heure de fin",   heureFin) +
                row("💆", "Type de séance", typeSeance) +
                row("📍", "Lieu",           lieu) +
                row("👨‍⚕️", "Praticien",   "Dr. " + doctorName) +
                "</table>" +

                // ── Avertissement
                "<div class='warn'><p>⚠️ <strong>Rappel :</strong> En cas d'empêchement, merci d'annuler " +
                "au moins <strong>24h à l'avance</strong> afin de permettre à d'autres patients d'en bénéficier.</p></div>" +

                // ── Footer
                "<div class='footer'>" +
                "<p class='name'>🌿 NAFSEYTI</p>" +
                "<p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.<br>" +
                "© 2025 Nafseyti — Tous droits réservés.</p>" +
                "</div>" +

                "</div></div></body></html>";
    }

    private static String row(String icon, String label, String value) {
        return "<tr class='info-row'>" +
                "<td class='ic'>" + icon + "</td>" +
                "<td class='lb'>" + label + "</td>" +
                "<td class='vl'>" + value + "</td>" +
                "</tr>";
    }
}