package tn.esprit.nafseyti.fxmlUser.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.service.UserController;

import java.util.Optional;


public class ManageRolesViewController {

    @FXML
    private TextField userIdField;

    @FXML
    private Button searchButton;

    @FXML
    private Label userInfoLabel;

    @FXML
    private VBox roleSelectionBox;

    @FXML
    private ComboBox<String> roleComboBox;

    @FXML
    private Button updateButton;

    @FXML
    private Label messageLabel;

    private User currentUser;  // Admin user
    private User selectedUser;  // User being edited
    private UserController userController;
    private Runnable onRoleUpdateCallback;

    public ManageRolesViewController() {
        this.userController = new UserController();
    }

    @FXML
    public void initialize() {
        // Populate role combo box
        roleComboBox.getItems().addAll("user", "admin", "therapist", "moderator");
    }

    /**
     * Set current admin user and optional callback
     */
    public void setCurrentUser(User adminUser, Runnable onRoleUpdateCallback) {
        this.currentUser = adminUser;
        this.onRoleUpdateCallback = onRoleUpdateCallback;
    }

    @FXML
    private void handleSearch(ActionEvent event) {
        try {
            int userId = Integer.parseInt(userIdField.getText().trim());
            selectedUser = userController.getUserById(userId);

            if (selectedUser != null) {
                userInfoLabel.setText(String.format("User: %s %s (%s) - Current Role: %s",
                        selectedUser.getFirstname(), selectedUser.getLastname(),
                        selectedUser.getEmail(), selectedUser.getRole()));
                userInfoLabel.setVisible(true);

                roleComboBox.setValue(selectedUser.getRole());
                roleSelectionBox.setVisible(true);
                messageLabel.setVisible(false);
            } else {
                userInfoLabel.setText("User not found!");
                userInfoLabel.setVisible(true);
                roleSelectionBox.setVisible(false);
            }
        } catch (NumberFormatException e) {
            showMessage("Please enter a valid user ID", "RED");
        }
    }

    @FXML
    private void handleUpdateRole(ActionEvent event) {
        if (selectedUser == null || roleComboBox.getValue() == null) {
            showMessage("Please search for a user and select a role first", "RED");
            return;
        }

        String newRole = roleComboBox.getValue();

        // Warn if admin is changing their own role
        if (currentUser != null && selectedUser.getId() == currentUser.getId()) {
            Alert warning = new Alert(Alert.AlertType.WARNING);
            warning.setTitle("Warning");
            warning.setHeaderText("Changing Your Own Role");
            warning.setContentText("You are about to change your own role. You may lose admin privileges. Continue?");

            Optional<ButtonType> result = warning.showAndWait();
            if (result.isEmpty() || result.get() != ButtonType.OK) {
                return;
            }
        }

        if (userController.updateUserRole(selectedUser, newRole)) {
            showMessage("Role updated successfully to: " + newRole, "GREEN");
            userInfoLabel.setText(String.format("User: %s %s (%s) - Updated Role: %s",
                    selectedUser.getFirstname(), selectedUser.getLastname(),
                    selectedUser.getEmail(), newRole));

            // Call callback if provided
            if (onRoleUpdateCallback != null) {
                onRoleUpdateCallback.run();
            }
        } else {
            showMessage("Failed to update role. Check console for errors.", "RED");
        }
    }

    private void showMessage(String message, String color) {
        messageLabel.setText(message);
        messageLabel.setStyle("-fx-text-fill: " + color + ";");
        messageLabel.setVisible(true);
    }
}