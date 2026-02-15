package tn.esprit.projet.fxml.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.projet.models.User;
import tn.esprit.projet.controllers.UserController;

/**
 * LoginController - JavaFX Controller for Login Screen
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
    private Hyperlink registerLink;

    private UserController userController;

    public LoginController() {
        this.userController = new UserController();
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
            // Login successful - navigate to dashboard
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

    private void showError(String message) {
        errorLabel.setText(message);
        errorLabel.setVisible(true);
    }
}