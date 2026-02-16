package tn.esprit.projet.gui;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;
import tn.esprit.projet.models.suivi;
import tn.esprit.projet.services.suiviService;

public class suiviController {

    @FXML private BorderPane mainBorderPane;
    @FXML private Button btnTableauBord;
    @FXML private Button btnSuivi;
    @FXML private Button btnUtilisateurs;
    @FXML private Button btnRendezVous;
    @FXML private Button btnContenu;
    @FXML private Button btnTests;
    @FXML private Button btnEvenements;
    @FXML private Button btnFeedback;
    @FXML private Button BTS;
    @FXML private Label lblUtilisateurs;
    @FXML private Label lblRendezVous;
    @FXML private Label lblArticles;
    @FXML private Label lblTests;
    @FXML private Label lblEvenements;
    @FXML private Label lblSuiviPersonnel;
    @FXML private Label lblFeedback;
    @FXML private VBox contentArea;

    // Couleurs
    private final String ACTIVE_STYLE = "-fx-background-color: #374535; -fx-text-fill: white; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;";
    private final String INACTIVE_STYLE = "-fx-background-color: transparent; -fx-text-fill: #69685c; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;";

    @FXML
    public void initialize() {
        System.out.println("Tableau de bord chargé !");
    }

    @FXML
    public void handleRendezVous() {
        System.out.println("Rendez-vous cliqué !");
    }

    @FXML
    public void gererSuivis() {
        // Changer les couleurs des boutons
        btnTableauBord.setStyle(INACTIVE_STYLE);
        btnSuivi.setStyle(ACTIVE_STYLE);

        // Charger l'interface suivi dans le centre
        try {
            Node suivisView = FXMLLoader.load(getClass().getResource("/GestionSuivi.fxml"));
            mainBorderPane.setCenter(suivisView);
        } catch (Exception e) {
            System.err.println("Erreur : " + e.getMessage());
            e.printStackTrace();
        }
    }
}