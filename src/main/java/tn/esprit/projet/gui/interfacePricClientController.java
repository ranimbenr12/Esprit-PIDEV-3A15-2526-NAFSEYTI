package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;

public class interfacePricClientController {

    @FXML private BorderPane mainBorderPane;
    @FXML private Button btnAccueil;
    @FXML private Button btnRendezVous;
    @FXML private Button btnContenu;
    @FXML private Button btnTests;
    @FXML private Button btnEvenements;
    @FXML private Button btnSuivi;
    @FXML private Button btnFeedback;

    private final String ACTIVE_STYLE =
            "-fx-background-color: #374535; -fx-text-fill: white; " +
                    "-fx-alignment: CENTER_LEFT; -fx-padding: 10; " +
                    "-fx-font-size: 14px; -fx-background-radius: 8;";

    private final String INACTIVE_STYLE =
            "-fx-background-color: transparent; -fx-text-fill: #69685c; " +
                    "-fx-alignment: CENTER_LEFT; -fx-padding: 10; " +
                    "-fx-font-size: 14px; -fx-background-radius: 8;";

    @FXML
    public void initialize() {
        System.out.println("✅ Interface Client chargée !");
        // ✅ Au démarrage, Accueil est actif
        setActiveButton(btnAccueil);
    }

    @FXML
    public void handleBtnAccueil() {
        setActiveButton(btnAccueil); // ✅ Accueil devient vert
        afficherEnConstruction("🏠 Accueil");
    }

    @FXML
    public void handleBtnRendezVous() {
        setActiveButton(btnRendezVous);
        chargerVue("/RendezVous.fxml", "📅 Mes Rendez-vous");
    }

    @FXML
    public void handleBtnContenu() {
        setActiveButton(btnContenu);
        chargerVue("/Contenu.fxml", "📚 Mon Contenu");
    }

    @FXML
    public void handleBtnTests() {
        setActiveButton(btnTests);
        chargerVue("/Tests.fxml", "📊 Tests et Évaluations");
    }

    @FXML
    public void handleBtnEvenements() {
        setActiveButton(btnEvenements);
        chargerVue("/Evenements.fxml", "🎉 Événements et Ateliers");
    }

    @FXML
    public void handleBtnSuivi() {
        setActiveButton(btnSuivi); // ✅ Mon Progression devient vert
        try {
            Node suiviView = FXMLLoader.load(getClass().getResource("/SuiviClient.fxml"));
            mainBorderPane.setCenter(suiviView);
            System.out.println("✅ SuiviClient.fxml chargé !");
        } catch (Exception e) {
            System.err.println("❌ Erreur : " + e.getMessage());
            afficherEnConstruction("📈 Mon Progression");
        }
    }

    @FXML
    public void handleBtnFeedback() {
        setActiveButton(btnFeedback);
        chargerVue("/Feedback.fxml", "💬 Donner mon avis");
    }

    @FXML
    public void handleDeconnexion() {
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Déconnexion");
        confirm.setHeaderText(null);
        confirm.setContentText("Voulez-vous vraiment vous déconnecter ?");
        confirm.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                try {
                    Node loginView = FXMLLoader.load(getClass().getResource("/Login.fxml"));
                    mainBorderPane.setCenter(loginView);
                } catch (Exception e) {
                    System.err.println("⚠️ Login.fxml introuvable");
                }
            }
        });
    }

    private void chargerVue(String fxmlPath, String nomPage) {
        try {
            Node vue = FXMLLoader.load(getClass().getResource(fxmlPath));
            mainBorderPane.setCenter(vue);
        } catch (Exception e) {
            afficherEnConstruction(nomPage);
        }
    }

    private void afficherEnConstruction(String nomPage) {
        VBox placeholder = new VBox(20);
        placeholder.setStyle("-fx-background-color: #f8f5f2;");
        placeholder.setAlignment(javafx.geometry.Pos.CENTER);
        Label icone = new Label("🚧");
        icone.setStyle("-fx-font-size: 60px;");
        Label titre = new Label(nomPage);
        titre.setStyle("-fx-font-size: 24px; -fx-font-weight: bold; -fx-text-fill: #374535;");
        Label message = new Label("Cette section est en cours de développement.");
        message.setStyle("-fx-font-size: 14px; -fx-text-fill: #69685c;");
        placeholder.getChildren().addAll(icone, titre, message);
        mainBorderPane.setCenter(placeholder);
    }

    // ✅ CORRECTION : cette méthode met le bouton cliqué en vert
    // et remet TOUS les autres en transparent
    private void setActiveButton(Button activeBtn) {
        Button[] tousLesBoutons = {
                btnAccueil, btnRendezVous, btnContenu,
                btnTests, btnEvenements, btnSuivi, btnFeedback
        };
        for (Button btn : tousLesBoutons) {
            if (btn != null) btn.setStyle(INACTIVE_STYLE);
        }
        if (activeBtn != null) activeBtn.setStyle(ACTIVE_STYLE);
    }
}
