package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import javafx.stage.Stage;
import tn.esprit.projet.models.User;
import tn.esprit.projet.services.AlerteService;
import tn.esprit.projet.services.UserService;
import tn.esprit.projet.utils.SessionManager;

import java.util.List;

public class LoginController {

    @FXML private TextField txtEmail;
    @FXML private PasswordField txtPassword;
    @FXML private Button btnLogin;
    @FXML private Label lblMessage;

    private UserService userService = new UserService();
    private AlerteService alerteService = new AlerteService();

    @FXML
    public void initialize() {
        // Vérifier si déjà connecté
        if (SessionManager.getInstance().isLoggedIn()) {
            redirigerVersInterface(SessionManager.getInstance().getCurrentUser());
        }
    }

    @FXML
    public void handleLogin() {
        String email = txtEmail.getText().trim();
        String password = txtPassword.getText().trim();

        // Validation des champs
        if (email.isEmpty() || password.isEmpty()) {
            lblMessage.setText("❌ Veuillez remplir tous les champs");
            return;
        }

        // Désactiver le bouton pendant la tentative
        btnLogin.setDisable(true);
        btnLogin.setText("Connexion...");

        // Tentative d'authentification
        User user = userService.authentifier(email, password);

        if (user != null) {
            // Succès
            SessionManager.getInstance().setCurrentUser(user);
            lblMessage.setStyle("-fx-text-fill: green;");
            lblMessage.setText("✅ Connexion réussie !");

            // ✅ Vérifier les alertes APRÈS la connexion (uniquement pour les psychologues)
            if (user.isPsychologue()) {
                verifierAlertesApresConnexion(user);
            } else {
                // Pour les autres rôles, redirection normale
                redirigerVersInterface(user);
            }
        } else {
            // Échec
            lblMessage.setStyle("-fx-text-fill: red;");
            lblMessage.setText("❌ Email ou mot de passe incorrect");
            btnLogin.setDisable(false);
            btnLogin.setText("Se connecter");
        }
    }

    /**
     * Vérifie les alertes et les affiche immédiatement
     */
    private void verifierAlertesApresConnexion(User user) {
        try {
            // Récupérer les alertes non traitées
            List<Object[]> alertes = alerteService.getAlertesNonTraitees(user.getId());

            if (!alertes.isEmpty()) {
                // ✅ AFFICHER L'ALERTE IMMÉDIATEMENT
                afficherAlerteConnexion(alertes, user);
            } else {
                // Pas d'alerte, redirection normale
                redirigerVersInterface(user);
            }

        } catch (Exception e) {
            e.printStackTrace();
            // En cas d'erreur, redirection normale
            redirigerVersInterface(user);
        }
    }

    /**
     * Affiche une fenêtre d'alerte avec la liste des alertes
     */
    private void afficherAlerteConnexion(List<Object[]> alertes, User user) {
        // Créer une nouvelle fenêtre d'alerte
        Stage alertStage = new Stage();
        alertStage.setTitle("🚨 ALERTES DE SÉCURITÉ");
        alertStage.setResizable(false);

        // Conteneur principal
        VBox root = new VBox(15);
        root.setPadding(new Insets(20));
        root.setStyle("-fx-background-color: white;");

        // En-tête
        Label title = new Label("🚨 ALERTES DE SÉCURITÉ");
        title.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #c0392b;");

        Label subtitle = new Label(alertes.size() + " alerte(s) non traitée(s) nécessitent votre attention");
        subtitle.setStyle("-fx-font-size: 14px; -fx-text-fill: #666;");

        // Liste des alertes
        ListView<String> listView = new ListView<>();
        listView.setPrefHeight(300);
        listView.setPrefWidth(600);

        for (Object[] alerte : alertes) {
            String patient = (String) alerte[1];
            String message = (String) alerte[2];
            String date = alerte[4] != null ? alerte[4].toString() : "";

            // Limiter la longueur du message
            if (message != null && message.length() > 100) {
                message = message.substring(0, 100) + "...";
            }

            listView.getItems().add(String.format(
                    "[%s] %s : \"%s\"",
                    date.length() > 16 ? date.substring(0, 16) : date,
                    patient != null ? patient : "Inconnu",
                    message != null ? message : ""
            ));
        }

        // Boutons
        HBox buttonBox = new HBox(10);
        buttonBox.setAlignment(Pos.CENTER);

        Button btnVoir = new Button("👁️ Voir toutes les alertes");
        btnVoir.setStyle("-fx-background-color: #3498db; -fx-text-fill: white; -fx-font-weight: bold; -fx-padding: 10 20; -fx-cursor: hand;");
        btnVoir.setOnAction(e -> {
            alertStage.close();
            ouvrirInterfaceAlertes(user);
        });

        Button btnPlusTard = new Button("⏰ Consulter plus tard");
        btnPlusTard.setStyle("-fx-background-color: #7f8c8d; -fx-text-fill: white; -fx-font-weight: bold; -fx-padding: 10 20; -fx-cursor: hand;");
        btnPlusTard.setOnAction(e -> {
            alertStage.close();
            redirigerVersInterface(user);
        });

        buttonBox.getChildren().addAll(btnVoir, btnPlusTard);

        root.getChildren().addAll(title, subtitle, listView, buttonBox);

        Scene scene = new Scene(root, 650, 450);
        alertStage.setScene(scene);

        // Afficher la fenêtre et attendre
        alertStage.showAndWait();
    }

    /**
     * Ouvre l'interface des alertes
     */
    private void ouvrirInterfaceAlertes(User user) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/AlertesSuicide.fxml"));
            Parent root = loader.load();

            Stage stage = (Stage) btnLogin.getScene().getWindow();
            Scene scene = new Scene(root, 1200, 700);
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI - Alertes de sécurité");
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
            redirigerVersInterface(user);
        }
    }

    private void redirigerVersInterface(User user) {
        try {
            String fxmlPath;
            String titre;

            switch (user.getRole()) {
                case "psychologue":
                    fxmlPath = "/suivi.fxml";
                    titre = "NAFSEYTI - Psychologue";
                    break;
                case "etudiant":
                case "enseignant":
                case "patient":
                    fxmlPath = "/interfacePricClient.fxml";
                    titre = "NAFSEYTI - Espace Client";
                    break;
                case "admin":  // ✅ Ajout du rôle admin
                    fxmlPath = "/AdminDashboard.fxml";
                    titre = "NAFSEYTI - Administration";
                    break;
                case "coach_vie":  // ✅ Ajout du rôle coach_vie
                    fxmlPath = "/interfacePricClient.fxml";
                    titre = "NAFSEYTI - Espace Coach";
                    break;
                default:
                    fxmlPath = "/interfacePricClient.fxml";
                    titre = "NAFSEYTI - Espace Client";
                    break;
            }

            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent root = loader.load();

            Object controller = loader.getController();
            if (controller instanceof suiviController) {
                ((suiviController) controller).setCurrentUser(user);
            } else if (controller instanceof interfacePricClientController) {
                ((interfacePricClientController) controller).setCurrentUser(user);
            } else if (controller instanceof AdminDashboardController) {
                ((AdminDashboardController) controller).setCurrentUser(user);
            }

            Stage stage = (Stage) btnLogin.getScene().getWindow();
            Scene scene = new Scene(root, 1200, 700);
            stage.setScene(scene);
            stage.setTitle(titre);
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
            lblMessage.setText("❌ Erreur de chargement: " + e.getMessage());
            btnLogin.setDisable(false);
            btnLogin.setText("Se connecter");
        }
    }
}