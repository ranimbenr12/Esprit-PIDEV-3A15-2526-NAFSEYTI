package tn.esprit.projet.fxml.controllers;

import tn.esprit.projet.services.UserController;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;
import tn.esprit.projet.models.User;

import java.util.Optional;


public class DashboardController {

    @FXML
    private Label welcomeLabel;

    @FXML
    private Button logoutButton;

    @FXML
    private Button profileButton;

    @FXML
    private Button updateButton;

    @FXML
    private Button changePasswordButton;

    @FXML
    private Button deleteAccountButton;

    @FXML
    private Label adminLabel;

    @FXML
    private Button viewAllUsersButton;

    @FXML
    private StackPane contentArea;

    private User currentUser;
    private UserController userController;

    public DashboardController() {
        this.userController = new UserController();
    }

    public void setUser(User user) {
        this.currentUser = user;
        welcomeLabel.setText("Welcome, " + user.getFirstname() + " TO NAFSEYTI !");

        // Show admin section if user is admin
        if ("admin".equals(user.getRole())) {
            adminLabel.setVisible(true);
            viewAllUsersButton.setVisible(true);
        }
    }

    @FXML
    private void handleLogout(ActionEvent event) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/Login.fxml"));
            Stage stage = (Stage) logoutButton.getScene().getWindow();
            Scene scene = new Scene(root);
            scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI - Login");
            stage.setWidth(900);
            stage.setHeight(600);
            stage.centerOnScreen();
        } catch (Exception e) {
            showAlert("Error", "Error logging out: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    @FXML
    private void showProfile(ActionEvent event) {
        loadView("/fxml/ProfileView.fxml", controller -> {
            if (controller instanceof ProfileViewController) {
                ((ProfileViewController) controller).setUser(currentUser);
            }
        });
    }

    @FXML
    private void showUpdateProfile(ActionEvent event) {
        loadView("/fxml/UpdateProfileView.fxml", controller -> {
            if (controller instanceof UpdateProfileViewController) {
                ((UpdateProfileViewController) controller).setUser(currentUser, () -> {
                    // Refresh user after update
                    currentUser = userController.getUserById(currentUser.getId());
                    setUser(currentUser);
                });
            }
        });
    }

    @FXML
    private void showChangePassword(ActionEvent event) {
        loadView("/fxml/ChangePasswordView.fxml", controller -> {
            if (controller instanceof ChangePasswordViewController) {
                ((ChangePasswordViewController) controller).setUser(currentUser);
            }
        });
    }

    @FXML
    private void showDeleteAccount(ActionEvent event) {
        Alert confirmation = new Alert(Alert.AlertType.CONFIRMATION);
        confirmation.setTitle("Delete Account");
        confirmation.setHeaderText("⚠️ WARNING: This action cannot be undone!");
        confirmation.setContentText("Are you sure you want to permanently delete your account?\n\nType 'DELETE' to confirm.");

        TextField confirmField = new TextField();
        confirmField.setPromptText("Type DELETE to confirm");

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20, 150, 10, 10));
        grid.add(new Label("Confirmation:"), 0, 0);
        grid.add(confirmField, 1, 0);

        confirmation.getDialogPane().setContent(grid);

        Optional<ButtonType> result = confirmation.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            if ("DELETE".equals(confirmField.getText())) {
                if (userController.deleteUser(currentUser.getId())) {
                    showAlert("Success", "Account deleted successfully. Goodbye!", Alert.AlertType.INFORMATION);
                    handleLogout(event);
                } else {
                    showAlert("Error", "Failed to delete account", Alert.AlertType.ERROR);
                }
            } else {
                showAlert("Error", "You must type 'DELETE' to confirm", Alert.AlertType.ERROR);
            }
        }
    }

    @FXML
    private void showAllUsers(ActionEvent event) {
        loadView("/fxml/ViewAllUsersView.fxml", controller -> {

        });
    }


    private void loadView(String fxmlPath, ControllerCallback callback) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent view = loader.load();

            // Pass data to controller
            Object controller = loader.getController();
            if (callback != null) {
                callback.configure(controller);
            }

            contentArea.getChildren().clear();
            contentArea.getChildren().add(view);
        } catch (Exception e) {
            showAlert("Error", "Failed to load view: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }


    @FunctionalInterface
    private interface ControllerCallback {
        void configure(Object controller);
    }
}