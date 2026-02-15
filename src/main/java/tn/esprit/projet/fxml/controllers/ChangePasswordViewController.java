package tn.esprit.projet.fxml.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import tn.esprit.projet.controllers.UserController;
import tn.esprit.projet.models.User;

/**
 * ChangePasswordViewController - Controller for change password view
 */
public class ChangePasswordViewController {

    @FXML
    private PasswordField currentPasswordField;

    @FXML
    private PasswordField newPasswordField;

    @FXML
    private PasswordField confirmPasswordField;

    @FXML
    private Label messageLabel;

    @FXML
    private Button changeButton;

    private User currentUser;
    private UserController userController;

    public ChangePasswordViewController() {
        this.userController = new UserController();
    }

    /**
     * Set current user
     */
    public void setUser(User user) {
        this.currentUser = user;
    }

    @FXML
    private void handleChangePassword(ActionEvent event) {
        if (currentUser == null) {
            showMessage("Error: No user loaded", "RED");
            return;
        }

        String currentPassword = currentPasswordField.getText();
        String newPassword = newPasswordField.getText();
        String confirmPassword = confirmPasswordField.getText();

        if (userController.updateUserPassword(currentUser, currentPassword, newPassword, confirmPassword)) {
            showMessage("Password changed successfully!", "GREEN");

            // Clear fields
            currentPasswordField.clear();
            newPasswordField.clear();
            confirmPasswordField.clear();
        } else {
            showMessage("Failed to change password. Check console for errors.", "RED");
        }
    }

    private void showMessage(String message, String color) {
        messageLabel.setText(message);
        messageLabel.setStyle("-fx-text-fill: " + color + ";");
        messageLabel.setVisible(true);
    }
}