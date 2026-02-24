package tn.esprit.projet.services;

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

import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.security.GeneralSecurityException;
import java.util.Collections;
import java.util.List;

/**
 * GoogleAuthService - Handles Google OAuth 2.0 authentication
 */
public class GoogleAuthService {

    private static final String APPLICATION_NAME = "Nafseyti";
    private static final JsonFactory JSON_FACTORY = JacksonFactory.getDefaultInstance();
    private static final String TOKENS_DIRECTORY_PATH = "tokens";

    // Request only email and profile info
    private static final List<String> SCOPES = Collections.singletonList(
            "https://www.googleapis.com/auth/userinfo.profile " +
                    "https://www.googleapis.com/auth/userinfo.email"
    );

    private static final String CREDENTIALS_FILE_PATH = "client_secret.json";

    /**
     * Creates an authorized Credential object.
     */
    private static Credential getCredentials(final NetHttpTransport HTTP_TRANSPORT)
            throws IOException {

        // Load client secrets from resources
        GoogleClientSecrets clientSecrets;
        try (InputStreamReader reader = new InputStreamReader(
                GoogleAuthService.class.getResourceAsStream("/client_secret.json"))) {
            clientSecrets = GoogleClientSecrets.load(JSON_FACTORY, reader);
        }

        // Build flow with forced account selection
        GoogleAuthorizationCodeFlow flow = new GoogleAuthorizationCodeFlow.Builder(
                HTTP_TRANSPORT, JSON_FACTORY, clientSecrets, SCOPES)
                .setDataStoreFactory(new FileDataStoreFactory(new java.io.File(TOKENS_DIRECTORY_PATH)))
                .setAccessType("offline")
                .build();

        // Clear any cached credentials to force re-authentication
        flow.getCredentialDataStore().clear();

        LocalServerReceiver receiver = new LocalServerReceiver.Builder()
                .setPort(8888)
                .build();

        return new AuthorizationCodeInstalledApp(flow, receiver).authorize("user");
    }

    /**
     * Authenticate user with Google and get their info
     * @return GoogleUserInfo object with user data, or null if authentication failed
     */
    public static GoogleUserInfo authenticateUser() {
        try {
            // Build a new authorized API client service
            final NetHttpTransport HTTP_TRANSPORT = GoogleNetHttpTransport.newTrustedTransport();
            Credential credential = getCredentials(HTTP_TRANSPORT);

            // Get user info
            Oauth2 oauth2 = new Oauth2.Builder(HTTP_TRANSPORT, JSON_FACTORY, credential)
                    .setApplicationName(APPLICATION_NAME)
                    .build();

            Userinfo userInfo = oauth2.userinfo().get().execute();

            // Return user data
            return new GoogleUserInfo(
                    userInfo.getGivenName(),
                    userInfo.getFamilyName(),
                    userInfo.getEmail(),
                    userInfo.getPicture()
            );

        } catch (GeneralSecurityException | IOException e) {
            System.err.println("Error authenticating with Google: " + e.getMessage());
            e.printStackTrace();
            return null;
        }
    }

    /**
     * Simple class to hold Google user information
     */
    public static class GoogleUserInfo {
        private String firstName;
        private String lastName;
        private String email;
        private String profilePictureUrl;

        public GoogleUserInfo(String firstName, String lastName, String email, String profilePictureUrl) {
            this.firstName = firstName != null ? firstName : "";
            this.lastName = lastName != null ? lastName : "";
            this.email = email;
            this.profilePictureUrl = profilePictureUrl;
        }

        public String getFirstName() { return firstName; }
        public String getLastName() { return lastName; }
        public String getEmail() { return email; }
        public String getProfilePictureUrl() { return profilePictureUrl; }

        @Override
        public String toString() {
            return "GoogleUserInfo{" +
                    "firstName='" + firstName + '\'' +
                    ", lastName='" + lastName + '\'' +
                    ", email='" + email + '\'' +
                    ", profilePictureUrl='" + profilePictureUrl + '\'' +
                    '}';
        }
    }
}