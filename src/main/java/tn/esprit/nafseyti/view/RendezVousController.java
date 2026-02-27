package tn.esprit.nafseyti.view;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.BorderPane;
import javafx.stage.Stage;
import tn.esprit.nafseyti.fxmlUser.controllers.DashboardController;
import tn.esprit.nafseyti.models.User;

import java.io.IOException;
public class RendezVousController {
    @FXML private BorderPane mainBorderPane;
    @FXML private Button btnTableauBord;
    @FXML private Button btnUtilisateurs;
    @FXML private Button btnRendezVous;

    private User currentUser;  // ← stocker l'utilisateur

    public void setCurrentUser(User user) {
        this.currentUser = user;
    }
    @FXML private Button btnTests;

    // ── Gérer le style actif des boutons ──
    private void setActiveButton(Button activeBtn) {
        String inactiveStyle = "-fx-background-color: transparent; -fx-text-fill: #69685c; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;";
        String activeStyle = "-fx-background-color: #374535; -fx-text-fill: white; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;";

        // Tous les boutons redeviendront inactifs
        btnRendezVous.setStyle(inactiveStyle);
        btnUtilisateurs.setStyle(inactiveStyle);
        btnTableauBord.setStyle(inactiveStyle);
        btnTests.setStyle(inactiveStyle);

        // Celui actif devient coloré
        activeBtn.setStyle(activeStyle);
    }

    // ── Aller vers Utilisateurs (Dashboard) ──
    @FXML
    private void handleUtilisateurs() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxml/interfacePrincipal.fxml")
            );
            Parent root = loader.load();

            interfacePrincipalController ctrl = loader.getController();

            // ✅ Une seule méthode qui fait set + navigate
            ctrl.navigateToUtilisateurs(currentUser);

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    // ── Retour Tableau de bord ──
    @FXML
    private void handleTableauBord() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxml/interfacePrincipal.fxml")
            );
            Parent root = loader.load();

            interfacePrincipalController ctrl = loader.getController();
            ctrl.setCurrentUser(currentUser);  // ← passer l'utilisateur

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleGererRendezVous(ActionEvent event) {
        try {
            // Charge le FXML de gestion des rendez-vous
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/gestion_rendez_vous.fxml"));
            Parent root = loader.load();

            // Récupère la fenêtre actuelle
            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            // Change la scène
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleGererFiches(ActionEvent event) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/GestionFicheConsultation.fxml"));
            Scene scene = new Scene(root);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();
            stage.setScene(scene);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void handleDeconnexion() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/login.fxml")
            );
            Parent root = loader.load();

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("Connexion - NAFSEYTI");
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void handleTests() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlTeste/DashboardView.fxml")
            );
            Parent root = loader.load();

            tn.esprit.nafseyti.controllers.DashboardController ctrl = loader.getController();
            ctrl.setCurrentUser(currentUser); // si ton DashboardController accepte un user

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
