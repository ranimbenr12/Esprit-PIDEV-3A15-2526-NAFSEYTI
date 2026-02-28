package tn.esprit.projet.gui;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.control.*;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import tn.esprit.projet.models.User;
import tn.esprit.projet.services.AlerteService;
import tn.esprit.projet.services.UserService;
import tn.esprit.projet.utils.SessionManager;

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
    @FXML private Button btnChatBot;
    @FXML private Button btnAlertes; // Nouveau bouton pour les alertes
    @FXML private Button BTS;

    @FXML private Label lblUtilisateurs;
    @FXML private Label lblRendezVous;
    @FXML private Label lblArticles;
    @FXML private Label lblTests;
    @FXML private Label lblEvenements;
    @FXML private Label lblSuiviPersonnel;
    @FXML private Label lblFeedback;
    @FXML private Label lblNotificationIndicator; // Indicateur de notifications
    @FXML private VBox contentArea;

    private final String ACTIVE_STYLE = "-fx-background-color: #374535; -fx-text-fill: white; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px; -fx-background-radius: 8;";
    private final String INACTIVE_STYLE = "-fx-background-color: transparent; -fx-text-fill: #69685c; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px; -fx-background-radius: 8;";

    private User currentUser;
    private UserService userService = new UserService();
    private AlerteService alerteService = new AlerteService();
    private Thread notificationThread;
    private volatile boolean running = true;

    @FXML
    public void initialize() {
        System.out.println("✅ Tableau de bord chargé !");

        // Récupérer l'utilisateur connecté depuis la session
        if (SessionManager.getInstance().isLoggedIn()) {
            currentUser = SessionManager.getInstance().getCurrentUser();
            System.out.println("✅ Utilisateur connecté: " + currentUser.getFullName());

            // Si c'est un psychologue, démarrer la surveillance des notifications
            if (currentUser.isPsychologue()) {
                demarrerSurveillanceNotifications();
                creerIndicateurNotification();
            }
        } else {
            System.out.println("⚠️ Aucun utilisateur connecté - Mode démo");
        }
    }

    /**
     * Créer un indicateur de notification dans l'interface
     */
    private void creerIndicateurNotification() {
        // Chercher un endroit pour mettre l'indicateur (par exemple dans l'en-tête)
        Platform.runLater(() -> {
            if (lblNotificationIndicator != null) {
                lblNotificationIndicator.setVisible(false);
            }
        });
    }

    /**
     * Mettre à jour l'indicateur de notification
     */
    private void mettreAJourIndicateurNotification(boolean hasNotifications) {
        Platform.runLater(() -> {
            if (lblNotificationIndicator != null) {
                if (hasNotifications) {
                    lblNotificationIndicator.setText("🔴");
                    lblNotificationIndicator.setStyle("-fx-text-fill: red; -fx-font-size: 20px;");
                    lblNotificationIndicator.setVisible(true);
                } else {
                    lblNotificationIndicator.setVisible(false);
                }
            }

            // Aussi mettre à jour le bouton d'alerte si présent
            if (btnAlertes != null) {
                if (hasNotifications) {
                    btnAlertes.setText("🚨 Alertes (Nouvelles)");
                    btnAlertes.setStyle("-fx-background-color: #c0392b; -fx-text-fill: white; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px; -fx-background-radius: 8;");
                } else {
                    btnAlertes.setText("🚨 Alertes");
                    btnAlertes.setStyle(INACTIVE_STYLE);
                }
            }
        });
    }

    /**
     * Démarrer la surveillance des notifications en temps réel
     */
    private void demarrerSurveillanceNotifications() {
        notificationThread = new Thread(() -> {
            while (running) {
                try {
                    Thread.sleep(10000); // Vérifier toutes les 10 secondes

                    if (currentUser != null && currentUser.isPsychologue()) {
                        boolean aDesNotifs = alerteService.aDesNotificationsNonLues(currentUser.getId());

                        if (aDesNotifs) {
                            Platform.runLater(() -> {
                                // Mettre à jour l'indicateur
                                mettreAJourIndicateurNotification(true);

                                // Afficher une notification popup (pas trop souvent)
                                afficherNotificationPopUp();
                            });
                        } else {
                            Platform.runLater(() -> {
                                mettreAJourIndicateurNotification(false);
                            });
                        }
                    }

                } catch (InterruptedException e) {
                    break;
                }
            }
        });
        notificationThread.setDaemon(true);
        notificationThread.start();
    }

    private long derniereNotification = 0;

    /**
     * Afficher une popup de notification (max toutes les 30 secondes)
     */
    private void afficherNotificationPopUp() {
        long maintenant = System.currentTimeMillis();
        if (maintenant - derniereNotification < 30000) {
            return; // Pas plus d'une notification toutes les 30 secondes
        }
        derniereNotification = maintenant;

        Alert alert = new Alert(Alert.AlertType.WARNING);
        alert.setTitle("🚨 NOUVELLE ALERTE SÉCURITÉ");
        alert.setHeaderText("Un patient a envoyé un message préoccupant");
        alert.setContentText("Cliquez sur 'Voir les alertes' pour plus de détails.");

        ButtonType btnVoir = new ButtonType("Voir les alertes", ButtonBar.ButtonData.YES);
        ButtonType btnPlusTard = new ButtonType("Plus tard", ButtonBar.ButtonData.NO);
        alert.getButtonTypes().setAll(btnVoir, btnPlusTard);

        alert.showAndWait().ifPresent(response -> {
            if (response == btnVoir) {
                ouvrirAlertes();
            }
        });
    }

    @FXML
    public void handleRendezVous() {
        setActiveButton(btnRendezVous);
        System.out.println("Rendez-vous cliqué !");
        chargerVue("/RendezVous.fxml", "📅 Rendez-vous");
    }

    @FXML
    public void gererSuivis() {
        System.out.println("🟢 Clic sur Suivi personnel");

        // Mettre à jour les styles
        setActiveButton(btnSuivi);

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/GestionSuivi.fxml"));
            Node suivisView = loader.load();

            // Passer l'ID de l'utilisateur connecté au contrôleur
            GestionSuiviController controller = loader.getController();
            if (currentUser != null) {
                controller.setCurrentUserId(currentUser.getId());
            } else {
                controller.setCurrentUserId(1); // ID par défaut pour les tests
            }

            mainBorderPane.setCenter(suivisView);
            System.out.println("✅ Interface GestionSuivi chargée");

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();
            showAlert("Erreur", "Impossible de charger GestionSuivi.fxml", Alert.AlertType.ERROR);
        }
    }

    @FXML
    public void ouvrirChatBotAdmin() {
        System.out.println("🔵 Clic sur ChatBot Admin");

        // Mettre à jour les styles
        setActiveButton(btnChatBot);

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/ChatBotAdmin.fxml"));
            Node chatbotView = loader.load();

            mainBorderPane.setCenter(chatbotView);
            System.out.println("✅ Interface ChatBot Admin chargée");

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();
            showAlert("Erreur", "Impossible de charger ChatBotAdmin.fxml", Alert.AlertType.ERROR);
        }
    }

    @FXML
    public void ouvrirAlertes() {
        System.out.println("🚨 Clic sur Alertes");

        setActiveButton(btnAlertes);

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/AlertesSuicide.fxml"));
            Node alertesView = loader.load();

            mainBorderPane.setCenter(alertesView);
            System.out.println("✅ Interface Alertes chargée");

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();
            showAlert("Erreur", "Impossible de charger AlertesSuicide.fxml", Alert.AlertType.ERROR);
        }
    }

    @FXML
    public void handleUtilisateurs() {
        setActiveButton(btnUtilisateurs);
        chargerVue("/Utilisateurs.fxml", "👥 Utilisateurs");
    }

    @FXML
    public void handleContenu() {
        setActiveButton(btnContenu);
        chargerVue("/Contenu.fxml", "📄 Contenu");
    }

    @FXML
    public void handleTests() {
        setActiveButton(btnTests);
        chargerVue("/Tests.fxml", "📝 Tests");
    }

    @FXML
    public void handleEvenements() {
        setActiveButton(btnEvenements);
        chargerVue("/Evenements.fxml", "🎉 Événements");
    }

    @FXML
    public void handleFeedback() {
        setActiveButton(btnFeedback);
        chargerVue("/Feedback.fxml", "💬 Feedback");
    }

    /**
     * Charger une vue générique
     */
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

    /**
     * Mettre à jour le style du bouton actif
     */
    private void setActiveButton(Button activeBtn) {
        Button[] tousLesBoutons = {
                btnTableauBord, btnSuivi, btnUtilisateurs, btnRendezVous,
                btnContenu, btnTests, btnEvenements, btnFeedback,
                btnChatBot, btnAlertes, BTS
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

    /**
     * Afficher une alerte
     */
    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    /**
     * Méthode pour définir l'utilisateur courant
     */
    public void setCurrentUser(User user) {
        this.currentUser = user;
        if (user != null) {
            System.out.println("✅ Connecté: " + user.getFullName());

            if (user.isPsychologue()) {
                demarrerSurveillanceNotifications();
                creerIndicateurNotification();
            }
        }
    }

    /**
     * Nettoyer les ressources à la fermeture
     */
    public void cleanup() {
        running = false;
        if (notificationThread != null) {
            notificationThread.interrupt();
        }
    }
}