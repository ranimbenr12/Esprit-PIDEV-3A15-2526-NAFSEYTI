package tn.esprit.projet.fxml.controllers;

import tn.esprit.projet.services.UserController;
import tn.esprit.projet.services.GoogleAuthService;
import javafx.concurrent.Task;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.projet.models.User;

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
            GoogleAuthService.GoogleUserInfo googleUser = task.getValue();

            if (googleUser != null) {
                // Check if user exists by email
                User existingUser = userController.getUserByEmail(googleUser.getEmail());

                if (existingUser != null) {
                    // User exists - login
                    navigateToDashboard(existingUser);
                } else {
                    // New user - create account
                    User newUser = new User(
                            googleUser.getFirstName(),
                            googleUser.getLastName(),
                            googleUser.getEmail(),
                            "google_oauth_" + System.currentTimeMillis() // Dummy password for OAuth users
                    );

                    // Set profile picture from Google
                    newUser.setProfilePhoto(googleUser.getProfilePictureUrl());

                    // Save new user
                    if (userController.save(newUser)) {
                        // Get the saved user with ID
                        User savedUser = userController.getUserByEmail(googleUser.getEmail());
                        navigateToDashboard(savedUser);
                    } else {
                        showError("Failed to create account. Please try again.");
                        googleSignInButton.setDisable(false);
                        googleSignInButton.setText("🔐 Sign in with Google");
                    }
                }
            } else {
                showError("Google sign-in failed. Please try again.");
                googleSignInButton.setDisable(false);
                googleSignInButton.setText("🔐 Sign in with Google");
            }
        });

        task.setOnFailed(e -> {
            showError("Error during Google sign-in: " + task.getException().getMessage());
            googleSignInButton.setDisable(false);
            googleSignInButton.setText("🔐 Sign in with Google");
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
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/Register.fxml"));
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
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/Dashboard.fxml"));
            Parent root = loader.load();

            // Pass user to dashboard controller
            DashboardController dashboardController = loader.getController();
            dashboardController.setUser(user);

            // Switch to dashboard scene
            Stage stage = (Stage) loginButton.getScene().getWindow();
            Scene scene = new Scene(root);
            scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.setTitle("Mental Health Platform - Dashboard");
            stage.setWidth(1000);
            stage.setHeight(700);
            stage.centerOnScreen();

        } catch (Exception e) {
            showError("Error loading dashboard: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void showError(String message) {
        errorLabel.setText(message);
        errorLabel.setVisible(true);
    }
}