package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.Region;
import javafx.stage.Stage;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import tn.esprit.projet.models.User;
import tn.esprit.projet.models.Reduction;
import tn.esprit.projet.services.PointsService;
import tn.esprit.projet.services.ReductionService;
import tn.esprit.projet.gui.ChatBotController;
import tn.esprit.projet.utils.SessionManager;

import java.io.IOException;

public class interfacePricClientController {

    @FXML private BorderPane mainBorderPane;
    @FXML private Button btnAccueil;
    @FXML private Button btnRendezVous;
    @FXML private Button btnContenu;
    @FXML private Button btnTests;
    @FXML private Button btnEvenements;
    @FXML private Button btnSuivi;
    @FXML private Button btnFeedback;
    @FXML private Button btnChatbot;
    // @FXML private Button btnGift;  // ← SUPPRIMÉ du menu principal
    @FXML private Label lblBienvenue;
    // @FXML private Label lblTotalPoints;  // ← SUPPRIMÉ du menu principal

    private final String ACTIVE_STYLE = "-fx-background-color: #374535; -fx-text-fill: white; " +
            "-fx-alignment: CENTER_LEFT; -fx-padding: 10; " +
            "-fx-font-size: 14px; -fx-background-radius: 8;";

    private final String INACTIVE_STYLE = "-fx-background-color: transparent; -fx-text-fill: #69685c; " +
            "-fx-alignment: CENTER_LEFT; -fx-padding: 10; " +
            "-fx-font-size: 14px; -fx-background-radius: 8;";

    private User currentUser;
    private PointsService pointsService = new PointsService();
    private ReductionService reductionService = new ReductionService();

    @FXML
    public void initialize() {
        System.out.println("✅ Interface Client chargée !");
        setActiveButton(btnAccueil);
    }

    // ===== MÉTHODES EXISTANTES =====
    @FXML
    public void handleBtnAccueil() {
        setActiveButton(btnAccueil);
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
        setActiveButton(btnSuivi);
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/SuiviClient.fxml"));
            Node suiviView = loader.load();

            // Passer l'utilisateur connecté au SuiviClientController
            Object controller = loader.getController();
            if (controller instanceof SuiviClientController) {
                ((SuiviClientController) controller).setCurrentUser(currentUser);
            }

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
    public void handleBtnChatbot() {
        setActiveButton(btnChatbot);
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/ChatBot.fxml"));
            Pane chatPane = loader.load();

            // Passer l'utilisateur connecté au ChatBotController
            ChatBotController chatBotController = loader.getController();
            if (currentUser != null) {
                chatBotController.setCurrentUserId(currentUser.getId());
            }

            mainBorderPane.setCenter(chatPane);
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement ChatBot: " + e.getMessage());
            e.printStackTrace();
            afficherEnConstruction("🤖 ChatBot");
        }
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
                    // Vider la session
                    SessionManager.getInstance().logout();

                    // Retourner à l'écran de login
                    Parent loginView = FXMLLoader.load(getClass().getResource("/Login.fxml"));
                    Stage stage = (Stage) mainBorderPane.getScene().getWindow();
                    stage.setScene(new Scene(loginView, 400, 500));
                    stage.setTitle("NAFSEYTI - Connexion");
                    stage.setResizable(false);
                } catch (Exception e) {
                    System.err.println("⚠️ Erreur déconnexion: " + e.getMessage());
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
        placeholder.setAlignment(Pos.CENTER);
        Label icone = new Label("🚧");
        icone.setStyle("-fx-font-size: 60px;");
        Label titre = new Label(nomPage);
        titre.setStyle("-fx-font-size: 24px; -fx-font-weight: bold; -fx-text-fill: #374535;");
        Label message = new Label("Cette section est en cours de développement.");
        message.setStyle("-fx-font-size: 14px; -fx-text-fill: #69685c;");
        placeholder.getChildren().addAll(icone, titre, message);
        mainBorderPane.setCenter(placeholder);
    }

    private void setActiveButton(Button activeBtn) {
        Button[] tousLesBoutons = {
                btnAccueil, btnRendezVous, btnContenu,
                btnTests, btnEvenements, btnSuivi,
                btnFeedback, btnChatbot  // ← btnGift retiré de la liste
        };

        for (Button btn : tousLesBoutons) {
            if (btn != null) {
                btn.setStyle(INACTIVE_STYLE);
            }
        }

        if (activeBtn != null) {
            activeBtn.setStyle(ACTIVE_STYLE);
        }
    }

    public void setCurrentUser(User user) {
        this.currentUser = user;
        if (user != null) {
            System.out.println("✅ Client connecté: " + user.getFullName());
            if (lblBienvenue != null) {
                lblBienvenue.setText("👋 Bonjour " + user.getFirstname() + " !");
            }
        }
    }

}