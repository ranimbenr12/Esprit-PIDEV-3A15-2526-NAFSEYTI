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
 * RegisterController - JavaFX Controller for Registration Screen
 */
public class RegisterController {

    @FXML
    private TextField firstnameField;

    @FXML
    private TextField lastnameField;

    @FXML
    private TextField emailField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private PasswordField confirmPasswordField;

    @FXML
    private TextField phoneField;

    @FXML
    private TextField addressField;

    @FXML
    private TextField locationField;

    @FXML
    private Label errorLabel;

    @FXML
    private Label successLabel;

    @FXML
    private Button registerButton;

    @FXML
    private Hyperlink loginLink;

    private UserController userController;

    public RegisterController() {
        this.userController = new UserController();
    }

    @FXML
    private void handleRegister(ActionEvent event) {
        // Get input values
        String firstname = firstnameField.getText().trim();
        String lastname = lastnameField.getText().trim();
        String email = emailField.getText().trim();
        String password = passwordField.getText();
        String confirmPassword = confirmPasswordField.getText();
        String phone = phoneField.getText().trim();
        String address = addressField.getText().trim();
        String location = locationField.getText().trim();

        // Hide previous messages
        errorLabel.setVisible(false);
        successLabel.setVisible(false);

        // Register user
        User user = userController.registerUser(firstname, lastname, email, password, confirmPassword);

        if (user != null) {
            // Update optional fields if provided
            if (!phone.isEmpty() || !address.isEmpty() || !location.isEmpty()) {
                userController.updateUserProfile(user, firstname, lastname, address, location, phone);
            }

            // Show success message
            showSuccess("Registration successful! Redirecting to login...");

            // Clear form
            clearForm();

            // Auto-navigate to login after 2 seconds
            new Thread(() -> {
                try {
                    Thread.sleep(2000);
                    javafx.application.Platform.runLater(() -> {
                        try {
                            Parent root = FXMLLoader.load(getClass().getResource("/fxml/Login.fxml"));
                            Stage stage = (Stage) registerButton.getScene().getWindow();
                            Scene scene = new Scene(root);
                            scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());
                            stage.setScene(scene);
                            stage.setTitle("Mental Health Platform - Login");
                            stage.setHeight(600);
                            stage.centerOnScreen();
                        } catch (Exception ex) {
                            ex.printStackTrace();
                        }
                    });
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }).start();

        } else {
            showError("Registration failed. Please check your inputs.");
        }
    }

    @FXML
    private void handleBackToLogin(ActionEvent event) {
        try {
            // Load login screen
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/Login.fxml"));
            Stage stage = (Stage) (loginLink != null ? loginLink.getScene().getWindow() : registerButton.getScene().getWindow());
            Scene scene = new Scene(root);
            scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.setTitle("Mental Health Platform - Login");
            stage.setHeight(600);
            stage.centerOnScreen();

        } catch (Exception e) {
            showError("Error loading login page: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void clearForm() {
        firstnameField.clear();
        lastnameField.clear();
        emailField.clear();
        passwordField.clear();
        confirmPasswordField.clear();
        phoneField.clear();
        addressField.clear();
        locationField.clear();
    }

    private void showError(String message) {
        errorLabel.setText(message);
        errorLabel.setVisible(true);
        successLabel.setVisible(false);
    }

    private void showSuccess(String message) {
        successLabel.setText(message);
        successLabel.setVisible(true);
        errorLabel.setVisible(false);
    }
}