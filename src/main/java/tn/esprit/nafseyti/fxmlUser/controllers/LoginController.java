package tn.esprit.nafseyti.fxmlUser.controllers;

import javafx.concurrent.Task;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.service.GoogleAuthService;
import tn.esprit.nafseyti.service.UserController;

/**
 * LoginController - JavaFX Controller for Login Screen with Google Sign-In
 */
public class LoginController {

    @FXML
    private TextField emailField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private Label errorLabel;

    @FXML
    private Button loginButton;

    @FXML
    private Button googleSignInButton;

    @FXML
    private Hyperlink registerLink;

    private UserController userController;

    public LoginController() {
        this.userController = new UserController();
    }

    /**
     * Handle Google Sign-In
     */
    @FXML
    private void handleGoogleSignIn(ActionEvent event) {
        // Disable button during authentication
        googleSignInButton.setDisable(true);
        googleSignInButton.setText("Signing in...");

        // Run Google authentication in background thread to avoid freezing UI
        Task<GoogleAuthService.GoogleUserInfo> task = new Task<>() {
            @Override
            protected GoogleAuthService.GoogleUserInfo call() {
                return GoogleAuthService.authenticateUser();
            }
        };


        task.setOnSucceeded(e -> {
            javafx.application.Platform.runLater(() -> {  // ← OBLIGATOIRE
                GoogleAuthService.GoogleUserInfo googleUser = task.getValue();
                if (googleUser != null) {
                    User existingUser = userController.getUserByEmail(googleUser.getEmail());
                    if (existingUser != null) {
                        navigateToDashboard(existingUser);
                    } else {
                        User newUser = new User(
                                googleUser.getFirstName(), googleUser.getLastName(),
                                googleUser.getEmail(),
                                "google_oauth_" + System.currentTimeMillis()
                        );
                        newUser.setProfilePhoto(googleUser.getProfilePictureUrl());
                        if (userController.save(newUser)) {
                            navigateToDashboard(userController.getUserByEmail(googleUser.getEmail()));
                        } else {
                            showError("Échec création compte.");
                            googleSignInButton.setDisable(false);
                            googleSignInButton.setText("  G   Continuer avec Google");
                        }
                    }
                } else {
                    showError("Connexion Google échouée.");
                    googleSignInButton.setDisable(false);
                    googleSignInButton.setText("  G   Continuer avec Google");
                }
            });
        });

        task.setOnFailed(e -> {
            javafx.application.Platform.runLater(() -> {
                showError("Erreur : " + task.getException().getMessage());
                googleSignInButton.setDisable(false);
                googleSignInButton.setText("  G   Continuer avec Google");
            });
        });

        // Start the background task
        new Thread(task).start();
    }

    @FXML
    private void handleLogin(ActionEvent event) {
        // Get input values
        String email = emailField.getText().trim();
        String password = passwordField.getText();

        // Validate inputs
        if (email.isEmpty() || password.isEmpty()) {
            showError("Please fill in all fields");
            return;
        }

        // Attempt login
        User user = userController.loginUser(email, password);

        if (user != null) {
            navigateToDashboard(user);
        } else {
            showError("Invalid email or password");
        }
    }

    @FXML
    private void handleRegister(ActionEvent event) {
        try {
            // Load register screen
            Parent root = FXMLLoader.load(getClass().getResource("/fxmlUser/Register.fxml"));
            Stage stage = (Stage) registerLink.getScene().getWindow();
            Scene scene = new Scene(root);
            scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.setTitle("Mental Health Platform - Register");
            stage.setHeight(700);
            stage.centerOnScreen();

        } catch (Exception e) {
            showError("Error loading registration page: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Navigate to dashboard after successful login
     */
    private void navigateToDashboard(User user) {
        try {
            String fxmlPath = "";

            switch (user.getRole()) {
                case "administrateur":
                    fxmlPath = "/fxml/interfacePrincipal.fxml";
                    break;
                case "psychologue":
                case "coach_vie":
                    fxmlPath = "/fxmlPsychologue/PsychologueInterface.fxml";
                    break;
                case "etudiant":
                default:
                    fxmlPath = "/fxmlClient/interfacePricClient.fxml";
                    break;
            }

            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent root = loader.load();

            // ✅ Passer l'utilisateur selon le bon nom de méthode
            Object controller = loader.getController();

            if (controller instanceof tn.esprit.nafseyti.view.interfacePrincipalController) {
                // Admin
                ((tn.esprit.nafseyti.view.interfacePrincipalController) controller)
                        .setCurrentUser(user);                              // ← setCurrentUser ✅

            } else {
                // Autres interfaces (psychologue, étudiant) — méthode setUser
                try {
                    controller.getClass()
                            .getMethod("setUser", User.class)
                            .invoke(controller, user);
                } catch (NoSuchMethodException ignored) { }
            }

            Stage stage = (Stage) loginButton.getScene().getWindow();
            Scene scene = new Scene(root);
            scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.sizeToScene();
            stage.centerOnScreen();
            stage.setTitle("NAFSEYTI - Dashboard");

        } catch (Exception e) {
            showError("Error loading interface: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void showError(String message) {
        errorLabel.setText(message);
        errorLabel.setVisible(true);
    }
}