package tn.esprit.projet.gui;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import tn.esprit.projet.models.User;
import tn.esprit.projet.services.UserService;
import tn.esprit.projet.services.AlerteService;
import tn.esprit.projet.utils.SessionManager;
import javafx.scene.layout.BorderPane;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.List;

public class AdminDashboardController {

    @FXML private BorderPane mainBorderPane;

    // Boutons du menu
    @FXML private Button btnDashboard;
    @FXML private Button btnUtilisateurs;
    @FXML private Button btnPsychologues;
    @FXML private Button btnEtudiants;
    @FXML private Button btnStatistiques;
    @FXML private Button btnAlertes;
    @FXML private Button btnRecompenses;
    @FXML private Button btnRapports;

    // Labels des stats
    @FXML private Label lblTotalUsers;
    @FXML private Label lblActifs;
    @FXML private Label lblNouveaux;
    @FXML private Label lblAlertes;
    @FXML private Label lblPsychologues;
    @FXML private Label lblEtudiants;
    @FXML private Label lblEnseignants;
    @FXML private Label lblCoachs;
    @FXML private Label lblConversations;
    @FXML private Label lblMessagesRisque;
    @FXML private Label lblTempsReponse;
    @FXML private Label lblObjectifsCrees;
    @FXML private Label lblObjectifsValides;
    @FXML private Label lblPoints;
    @FXML private Label lblRecompensesEchangees;
    @FXML private Label lblTopRecompense;
    @FXML private Label lblPointsMoyens;
    @FXML private Label lblDate;

    // Tableau des utilisateurs
    @FXML private TableView<User> tableUtilisateurs;
    @FXML private TableColumn<User, Integer> colId;
    @FXML private TableColumn<User, String> colNom;
    @FXML private TableColumn<User, String> colPrenom;
    @FXML private TableColumn<User, String> colEmail;
    @FXML private TableColumn<User, String> colRole;
    @FXML private TableColumn<User, String> colDate;

    private UserService userService = new UserService();
    private AlerteService alerteService = new AlerteService();
    private User currentUser;

    private final String ACTIVE_STYLE = "-fx-background-color: #374535; -fx-text-fill: white; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px; -fx-background-radius: 8;";
    private final String INACTIVE_STYLE = "-fx-background-color: transparent; -fx-text-fill: #69685c; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px; -fx-background-radius: 8;";

    @FXML
    public void initialize() {
        currentUser = SessionManager.getInstance().getCurrentUser();

        // Afficher la date du jour
        lblDate.setText(LocalDate.now().format(DateTimeFormatter.ofPattern("dd/MM/yyyy")));

        // Configurer le tableau
        configurerTableau();

        // Charger les statistiques
        chargerStatistiques();

        // Activer le bouton Dashboard par défaut
        setActiveButton(btnDashboard);
    }

    private void configurerTableau() {
        colId.setCellValueFactory(new PropertyValueFactory<>("id"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("lastname"));
        colPrenom.setCellValueFactory(new PropertyValueFactory<>("firstname"));
        colEmail.setCellValueFactory(new PropertyValueFactory<>("email"));
        colRole.setCellValueFactory(new PropertyValueFactory<>("role"));
        colDate.setCellValueFactory(new PropertyValueFactory<>("createdAt"));
    }

    private void chargerStatistiques() {
        try {
            List<User> tous = userService.getAllUsers();

            // Stats générales
            lblTotalUsers.setText(String.valueOf(tous.size()));

            long actifs = tous.stream().filter(u -> "actif".equals(u.getStatus())).count();
            lblActifs.setText(String.valueOf(actifs));

            // Stats par rôle
            long psyCount = tous.stream().filter(u -> "psychologue".equals(u.getRole())).count();
            long etuCount = tous.stream().filter(u -> "etudiant".equals(u.getRole())).count();
            long ensCount = tous.stream().filter(u -> "enseignant".equals(u.getRole())).count();
            long coachCount = tous.stream().filter(u -> "coach_vie".equals(u.getRole())).count();

            lblPsychologues.setText(String.valueOf(psyCount));
            lblEtudiants.setText(String.valueOf(etuCount));
            lblEnseignants.setText(String.valueOf(ensCount));
            lblCoachs.setText(String.valueOf(coachCount));

            // Alertes non traitées
            int alertesNonTraitees = 0;
            if (currentUser != null) {
                alertesNonTraitees = alerteService.getNombreAlertesNonTraitees(currentUser.getId());
            }
            lblAlertes.setText(String.valueOf(alertesNonTraitees));

            // Remplir le tableau
            ObservableList<User> users = FXCollections.observableArrayList(tous);
            tableUtilisateurs.setItems(users);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @FXML
    public void handleDashboard() {
        setActiveButton(btnDashboard);
        // Reste sur la vue actuelle (dashboard)
    }

    @FXML
    public void handleUtilisateurs() {
        setActiveButton(btnUtilisateurs);
        chargerVue("/AdminUtilisateurs.fxml", "Gestion des utilisateurs");
    }

    @FXML
    public void handlePsychologues() {
        setActiveButton(btnPsychologues);
        chargerVue("/AdminPsychologues.fxml", "Gestion des psychologues");
    }

    @FXML
    public void handleEtudiants() {
        setActiveButton(btnEtudiants);
        chargerVue("/AdminEtudiants.fxml", "Gestion des étudiants");
    }

    @FXML
    public void handleStatistiques() {
        setActiveButton(btnStatistiques);
        chargerVue("/AdminStatistiques.fxml", "Statistiques détaillées");
    }

    @FXML
    public void handleAlertes() {
        setActiveButton(btnAlertes);
        chargerVue("/AlertesSuicide.fxml", "Alertes de sécurité");
    }

    @FXML
    public void handleRecompenses() {
        setActiveButton(btnRecompenses);
        chargerVue("/AdminRecompenses.fxml", "Gestion des récompenses");
    }

    @FXML
    public void handleRapports() {
        setActiveButton(btnRapports);
        chargerVue("/AdminRapports.fxml", "Génération de rapports");
    }

    @FXML
    public void handleDeconnexion() {
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Déconnexion");
        confirm.setHeaderText(null);
        confirm.setContentText("Voulez-vous vraiment vous déconnecter ?");

        confirm.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                SessionManager.getInstance().logout();
                try {
                    Parent loginView = FXMLLoader.load(getClass().getResource("/Login.fxml"));
                    Stage stage = (Stage) mainBorderPane.getScene().getWindow();
                    stage.setScene(new Scene(loginView, 400, 500));
                    stage.setTitle("NAFSEYTI - Connexion");
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });
    }

    private void chargerVue(String fxmlPath, String titre) {
        try {
            Node vue = FXMLLoader.load(getClass().getResource(fxmlPath));
            mainBorderPane.setCenter(vue);
            System.out.println("✅ " + titre + " chargé");
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement " + fxmlPath + ": " + e.getMessage());
            showAlert("Erreur", "Impossible de charger " + titre, Alert.AlertType.ERROR);
        }
    }

    private void setActiveButton(Button activeBtn) {
        Button[] tousLesBoutons = {
                btnDashboard, btnUtilisateurs, btnPsychologues, btnEtudiants,
                btnStatistiques, btnAlertes, btnRecompenses, btnRapports
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

    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    public void setCurrentUser(User user) {
        this.currentUser = user;
        if (user != null) {
            System.out.println("✅ Admin connecté: " + user.getFullName());
        }
    }
}