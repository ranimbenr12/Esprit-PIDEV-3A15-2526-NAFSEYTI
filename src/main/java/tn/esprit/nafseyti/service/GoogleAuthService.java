package tn.esprit.nafseyti.service;

import com.google.api.client.auth.oauth2.Credential;
import com.google.api.client.extensions.java6.auth.oauth2.AuthorizationCodeInstalledApp;
import com.google.api.client.extensions.jetty.auth.oauth2.LocalServerReceiver;
import com.google.api.client.googleapis.auth.oauth2.GoogleAuthorizationCodeFlow;
import com.google.api.client.googleapis.auth.oauth2.GoogleClientSecrets;
import com.google.api.client.googleapis.javanet.GoogleNetHttpTransport;
import com.google.api.client.http.javanet.NetHttpTransport;
import com.google.api.client.json.JsonFactory;
import com.google.api.client.json.jackson2.JacksonFactory;
import com.google.api.client.util.store.FileDataStoreFactory;
import com.google.api.services.oauth2.Oauth2;
import com.google.api.services.oauth2.model.Userinfo;

import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.security.GeneralSecurityException;
import java.util.Arrays;
import java.util.Collections;
import java.util.List;

/**
 * GoogleAuthService - Handles Google OAuth 2.0 authentication
 */
public class GoogleAuthService {


    private static final String APPLICATION_NAME = "Nafseyti";
    private static final JsonFactory JSON_FACTORY = JacksonFactory.getDefaultInstance();
    private static final String TOKENS_DIRECTORY_PATH = "tokens";

    // ✅ SCOPES corrigés — deux éléments séparés
    private static final List<String> SCOPES = Arrays.asList(
            "https://www.googleapis.com/auth/userinfo.profile",
            "https://www.googleapis.com/auth/userinfo.email",
            "https://www.googleapis.com/auth/calendar"
    );

    private static Credential getCredentials(final NetHttpTransport HTTP_TRANSPORT)
            throws IOException {

        // ✅ Chemin corrigé — fichier dans src/main/resources/
        InputStream in = GoogleAuthService.class.getResourceAsStream("/client_secret.json");

        if (in == null) {
            throw new IOException("❌ Fichier client_secret.json introuvable dans les ressources !");
        }

        GoogleClientSecrets clientSecrets = GoogleClientSecrets.load(
                JSON_FACTORY, new InputStreamReader(in)
        );

        GoogleAuthorizationCodeFlow flow = new GoogleAuthorizationCodeFlow.Builder(
                HTTP_TRANSPORT, JSON_FACTORY, clientSecrets, SCOPES)
                .setDataStoreFactory(new FileDataStoreFactory(
                        new java.io.File(TOKENS_DIRECTORY_PATH)))
                .setAccessType("offline")
                .build();

        // Force re-authentification à chaque fois
        flow.getCredentialDataStore().clear();

        LocalServerReceiver receiver = new LocalServerReceiver.Builder()
                .setPort(8888)
                .build();

        return new AuthorizationCodeInstalledApp(flow, receiver).authorize("user");
    }

    public static GoogleUserInfo authenticateUser() {
        try {
            final NetHttpTransport HTTP_TRANSPORT = GoogleNetHttpTransport.newTrustedTransport();
            Credential credential = getCredentials(HTTP_TRANSPORT);

            Oauth2 oauth2 = new Oauth2.Builder(HTTP_TRANSPORT, JSON_FACTORY, credential)
                    .setApplicationName(APPLICATION_NAME)
                    .build();

            Userinfo userInfo = oauth2.userinfo().get().execute();

            System.out.println("✅ Google auth réussie : " + userInfo.getEmail());

            return new GoogleUserInfo(
                    userInfo.getGivenName(),
                    userInfo.getFamilyName(),
                    userInfo.getEmail(),
                    userInfo.getPicture()
            );

        } catch (GeneralSecurityException | IOException e) {
            System.err.println("❌ Erreur Google auth : " + e.getMessage());
            e.printStackTrace();
            return null;
        }
    }

    // ── GoogleUserInfo inchangé ──
    public static class GoogleUserInfo {
        private final String firstName;
        private final String lastName;
        private final String email;
        private final String profilePictureUrl;

        public GoogleUserInfo(String firstName, String lastName,
                              String email, String profilePictureUrl) {
            this.firstName = firstName != null ? firstName : "";
            this.lastName  = lastName  != null ? lastName  : "";
            this.email = email;
            this.profilePictureUrl = profilePictureUrl;
        }

        public String getFirstName()        { return firstName; }
        public String getLastName()         { return lastName; }
        public String getEmail()            { return email; }
        public String getProfilePictureUrl(){ return profilePictureUrl; }
    }
}