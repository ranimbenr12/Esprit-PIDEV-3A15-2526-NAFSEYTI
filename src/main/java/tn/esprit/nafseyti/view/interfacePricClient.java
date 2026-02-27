package tn.esprit.nafseyti.view;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.BorderPane;
import javafx.stage.Stage;
import tn.esprit.nafseyti.controllers.UserInterfaceController;
import tn.esprit.nafseyti.fxmlUser.controllers.DashboardController;
import tn.esprit.nafseyti.models.User;

import java.io.IOException;

public class interfacePricClient {

    @FXML private BorderPane mainBorderPane;
    @FXML private Button btnAccueil;
    @FXML private Button btnRendezVous;
    @FXML private Button btnContenu;
    @FXML private Button btnTests;
    @FXML private Button btnEvenements;
    @FXML private Button btnSuivi;
    @FXML private Button btnFeedback;

    private User currentUser;  // ← champ manquant

    // ── Setter appelé depuis LoginController ──
    public void setUser(User user) {
        this.currentUser = user;
    }

    // ── Profil ──
    @FXML
    private void handleProfil() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/Dashboard.fxml")
            );
            Parent dashboardContent = loader.load();

            DashboardController ctrl = loader.getController();
            ctrl.setUser(currentUser);

            // Créer le popup
            Stage popup = new Stage();
            popup.setTitle("👤 Mon espace personnel");
            popup.initModality(javafx.stage.Modality.APPLICATION_MODAL); // bloque la fenêtre principale
            popup.initOwner(mainBorderPane.getScene().getWindow());       // centré sur la fenêtre principale

            Scene scene = new Scene(dashboardContent, 750, 600);
            popup.setScene(scene);
            popup.setResizable(false);
            popup.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    // ── Déconnexion ──
    @FXML
    private void handleDeconnexion() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/Login.fxml")
            );
            Parent root = loader.load();

            javafx.stage.Stage stage = (javafx.stage.Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new javafx.scene.Scene(root));
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    // ── Navigation rendez-vous ──
    @FXML
    private void handleBtnRendezVous() {
        setActiveButton(btnRendezVous);
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlClient/MesRendezVous.fxml"));
            Parent root = loader.load();

            mesRendezVousClientController ctrl = loader.getController();
            ctrl.setUser(currentUser); // ← passer l'utilisateur

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            Scene scene = new Scene(root);
            stage.setScene(scene);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // ── Utilitaire : bouton actif ──
    private void setActiveButton(Button active) {
        String defaultStyle = "-fx-background-color: transparent; -fx-text-fill: #69685c; " +
                "-fx-alignment: CENTER_LEFT; -fx-padding: 10; " +
                "-fx-font-size: 14px; -fx-background-radius: 8;";
        String activeStyle  = "-fx-background-color: #374535; -fx-text-fill: white; " +
                "-fx-alignment: CENTER_LEFT; -fx-padding: 10; " +
                "-fx-font-size: 14px; -fx-background-radius: 8;";

        // Remet tous les boutons en défaut
        btnAccueil.setStyle(defaultStyle);
        btnRendezVous.setStyle(defaultStyle);
        btnContenu.setStyle(defaultStyle);
        btnTests.setStyle(defaultStyle);
        btnEvenements.setStyle(defaultStyle);
        btnSuivi.setStyle(defaultStyle);
        btnFeedback.setStyle(defaultStyle);

        // Active le bouton cliqué (si non null)
        if (active != null) {
            active.setStyle(activeStyle);
        }
    }
    @FXML
    private void handleBtnTests(ActionEvent event) {
        setActiveButton(btnTests);
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlTeste/UserInterface.fxml"));
            Parent root = loader.load();

            // Passer l'utilisateur si le controller le supporte
            UserInterfaceController ctrl = loader.getController();
            ctrl.setUser(currentUser);

            Stage stage = (Stage) btnTests.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}