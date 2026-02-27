package tn.esprit.nafseyti.fxmlUser.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.control.*;
import javafx.scene.layout.StackPane;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.service.UserController;

public class DashboardController {

    @FXML private Label welcomeLabel;
    @FXML private StackPane contentArea;
    @FXML private Button btnTousUsers;

    private User currentUser;
    private StackPane mainContentArea; // référence au center principal
    private UserController userController = new UserController();

    public void setUser(User user) {
        this.currentUser = user;
        welcomeLabel.setText("👤 Bienvenue, " + user.getFirstname() + " " + user.getLastname());

        if ("administrateur".equals(user.getRole())) {
            btnTousUsers.setVisible(true);
        }
    }

    public void setMainContentArea(StackPane area) {
        this.mainContentArea = area;
    }

    @FXML
    private void showProfile(ActionEvent e) {
        loadIntoContent("/fxmlUser/ProfileView.fxml", ctrl -> {
            if (ctrl instanceof ProfileViewController)
                ((ProfileViewController) ctrl).setUser(currentUser);
        });
    }

    @FXML
    private void showUpdateProfile(ActionEvent e) {
        loadIntoContent("/fxmlUser/UpdateProfileView.fxml", ctrl -> {
            if (ctrl instanceof UpdateProfileViewController)
                ((UpdateProfileViewController) ctrl).setUser(currentUser, () -> {
                    currentUser = userController.getUserById(currentUser.getId());
                    setUser(currentUser);
                });
        });
    }

    @FXML
    private void showChangePassword(ActionEvent e) {
        loadIntoContent("/fxmlUser/ChangePasswordView.fxml", ctrl -> {
            if (ctrl instanceof ChangePasswordViewController)
                ((ChangePasswordViewController) ctrl).setUser(currentUser);
        });
    }

    @FXML
    private void showDeleteAccount(ActionEvent e) {
        // Réutiliser la logique existante du DashboardController
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION,
                "Confirmer la suppression de votre compte ?", ButtonType.OK, ButtonType.CANCEL);
        alert.setTitle("Supprimer le compte");
        alert.showAndWait().ifPresent(btn -> {
            if (btn == ButtonType.OK) {
                userController.deleteUser(currentUser.getId());
            }
        });
    }

    @FXML
    private void showAllUsers(ActionEvent e) {
        loadIntoContent("/fxmlUser/ViewAllUsersView.fxml", ctrl -> {});
    }

    private void loadIntoContent(String fxmlPath, ControllerCallback cb) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent view = loader.load();
            cb.configure(loader.getController());
            contentArea.getChildren().setAll(view);
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }

    @FunctionalInterface
    interface ControllerCallback { void configure(Object ctrl); }
}