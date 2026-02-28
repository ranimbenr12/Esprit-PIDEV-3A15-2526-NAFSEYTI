package tn.esprit.projet.gui;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.text.Text;
import javafx.scene.text.TextFlow;
import tn.esprit.projet.models.ChatBotConfig;
import tn.esprit.projet.models.ChatBotMessage;
import tn.esprit.projet.services.ChatBotService;
import tn.esprit.projet.services.AlerteService;  // ✅ Import ajouté

import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.List;
import java.util.concurrent.CompletableFuture;

public class ChatBotController {

    @FXML private ScrollPane scrollPane;
    @FXML private VBox vboxMessages;
    @FXML private TextArea txtMessage;
    @FXML private HBox hboxSuggestions;
    @FXML private HBox hboxLoading;
    @FXML private HBox hboxInfoConfig;
    @FXML private Label lblConfigInfo;
    @FXML private Button btnEnvoyer;
    @FXML private Label lblTyping;  // C'est bien un Label (pas un HBox)

    private ChatBotService chatBotService;
    private AlerteService alerteService = new AlerteService();  // ✅ Service d'alerte ajouté
    private int ID_UTILISATEUR = 1; // À remplacer par l'ID réel de l'utilisateur connecté
    private boolean isLoading = false;

    // ===== MÉTHODE POUR RECEVOIR L'ID DE L'UTILISATEUR =====
    public void setCurrentUserId(int userId) {
        this.ID_UTILISATEUR = userId;
        System.out.println("✅ ChatBot - User ID défini: " + userId);
    }

    @FXML
    public void initialize() {
        try {
            // Initialiser le service
            chatBotService = new ChatBotService();

            // Configurer l'interface
            configurerInterface();

            // Charger les données
            chargerConfigurationPsychologue();
            chargerHistorique();
            chargerMessageBienvenue();
            chargerSuggestions();

            // Configurer les événements
            configurerEvenements();

        } catch (Exception e) {
            afficherErreur("Erreur d'initialisation", e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Configuration de base de l'interface
     */
    private void configurerInterface() {
        // Masquer les éléments au démarrage
        hboxLoading.setVisible(false);
        hboxLoading.setManaged(false);
        hboxInfoConfig.setVisible(false);
        hboxInfoConfig.setManaged(false);

        // Configuration correcte du lblTyping (Label)
        lblTyping.setVisible(false);
        lblTyping.setManaged(false);
        lblTyping.setText("🤖 est en train d'écrire...");
        lblTyping.setStyle("-fx-text-fill: #6c5ce7; -fx-font-style: italic; -fx-font-size: 12px; -fx-padding: 5 0 0 10;");

        // Style des suggestions
        hboxSuggestions.setSpacing(10);
        hboxSuggestions.setPadding(new Insets(10));

        // Auto-scroll
        vboxMessages.heightProperty().addListener((obs, oldVal, newVal) -> {
            if (!isLoading) {
                scrollPane.setVvalue(1.0);
            }
        });
    }

    /**
     * Charger la configuration du psychologue
     */
    private void chargerConfigurationPsychologue() {
        try {
            ChatBotConfig config = chatBotService.getConfig(ID_UTILISATEUR);

            if (config != null && config.getsuggestion_personnalisee() != null &&
                    !config.getsuggestion_personnalisee().trim().isEmpty()) {
                hboxInfoConfig.setVisible(true);
                hboxInfoConfig.setManaged(true);
                lblConfigInfo.setText("✨ Chatbot personnalisé par votre psychologue");

                // Tooltip avec les suggestions
                Tooltip tooltip = new Tooltip(config.getsuggestion_personnalisee());
                tooltip.setWrapText(true);
                tooltip.setMaxWidth(300);
                tooltip.setStyle("-fx-background-color: #6c5ce7; -fx-text-fill: white; -fx-font-size: 12px; -fx-padding: 10;");
                lblConfigInfo.setTooltip(tooltip);
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement config: " + e.getMessage());
        }
    }

    /**
     * Charger l'historique des messages
     */
    private void chargerHistorique() {
        try {
            List<ChatBotMessage> historique = chatBotService.getHistorique(ID_UTILISATEUR);

            if (historique != null && !historique.isEmpty()) {
                for (ChatBotMessage msg : historique) {
                    ajouterMessageUtilisateurSansScroll(msg.getmessage_utilisateur());
                    ajouterMessageBotSansScroll(msg.getreponse_chatbot());
                }

                // Cacher les suggestions si historique existe
                hboxSuggestions.setVisible(false);
                hboxSuggestions.setManaged(false);
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement historique: " + e.getMessage());
        }
    }

    /**
     * Message de bienvenue si pas d'historique
     */
    private void chargerMessageBienvenue() {
        if (vboxMessages.getChildren().isEmpty()) {
            ajouterMessageBot("👋 **Bonjour !** Je suis **NafseytiBot**, votre assistant psychologique.\n\n" +
                    "💫 **Je peux vous aider avec :**\n\n" +
                    "• 🧠 **Gestion du stress et de l'anxiété**\n" +
                    "• 🎯 **Motivation et concentration**\n" +
                    "• 💚 **Bien-être mental**\n" +
                    "• 💡 **Conseils pratiques**\n\n" +
                    "✨ **N'hésitez pas à me poser vos questions !**");
        }
    }

    /**
     * Charger les suggestions rapides
     */
    private void chargerSuggestions() {
        try {
            String[] suggestions = chatBotService.getSuggestionsRapides();
            hboxSuggestions.getChildren().clear();

            for (String suggestion : suggestions) {
                Button btn = new Button(suggestion);
                btn.getStyleClass().add("suggestion-button");
                btn.setMaxWidth(200);
                btn.setWrapText(true);

                btn.setOnAction(e -> {
                    txtMessage.setText(suggestion);
                    envoyerMessage();
                });

                hboxSuggestions.getChildren().add(btn);
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement suggestions: " + e.getMessage());
        }
    }

    /**
     * Configurer les événements
     */
    private void configurerEvenements() {
        // Enter pour envoyer (Shift+Enter pour nouvelle ligne)
        txtMessage.setOnKeyPressed(event -> {
            switch (event.getCode()) {
                case ENTER:
                    if (!event.isShiftDown()) {
                        event.consume();
                        envoyerMessage();
                    }
                    break;
                case ESCAPE:
                    txtMessage.clear();
                    break;
            }
        });

        // Focus sur le champ de texte
        Platform.runLater(() -> txtMessage.requestFocus());
    }

    @FXML
    public void envoyerMessage() {
        String message = txtMessage.getText().trim();

        if (message.isEmpty() || isLoading) return;

        // ✅ Détection des messages à risque
        try {
            if (alerteService.verifierMessage(message)) {
                System.out.println("🚨 ALERTE DÉTECTÉE pour l'utilisateur " + ID_UTILISATEUR);

                // Enregistrer l'alerte
                alerteService.enregistrerAlerte(ID_UTILISATEUR, message);
                alerteService.notifierPsychologue(ID_UTILISATEUR, message);

                // Message de soutien
                String reponseSoutien = "Je suis là pour toi. 🌟 Si tu traverses un moment difficile, " +
                        "je t'encourage à en parler à ton psychologue. " +
                        "Tu n'es pas seul(e). 💚";

                // Afficher immédiatement le message de soutien
                Platform.runLater(() -> {
                    ajouterMessageUtilisateur(message);
                    ajouterMessageBot(reponseSoutien);
                    txtMessage.clear();
                });

                // Sauvegarder dans l'historique
                try {
                    ChatBotMessage nouveauMessage = new ChatBotMessage(
                            ID_UTILISATEUR,
                            message,
                            reponseSoutien
                    );
                    chatBotService.sauvegarderMessage(nouveauMessage);
                } catch (Exception e) {
                    System.err.println("⚠️ Erreur sauvegarde message d'alerte: " + e.getMessage());
                }

                return; // IMPORTANT: Ne pas envoyer à l'IA
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur détection alerte: " + e.getMessage());
            e.printStackTrace();
            // Continuer normalement en cas d'erreur
        }

        // ===== CODE EXISTANT POUR L'ENVOI À L'IA =====
        // Désactiver l'envoi pendant le chargement
        isLoading = true;
        txtMessage.setDisable(true);
        btnEnvoyer.setDisable(true);

        // Afficher le message utilisateur
        ajouterMessageUtilisateur(message);
        txtMessage.clear();

        // Masquer les suggestions
        hboxSuggestions.setVisible(false);
        hboxSuggestions.setManaged(false);

        // Afficher les indicateurs de chargement
        hboxLoading.setVisible(true);
        hboxLoading.setManaged(true);
        lblTyping.setVisible(true);

        // Envoyer la requête en arrière-plan
        CompletableFuture.supplyAsync(() -> {
            try {
                return chatBotService.envoyerMessageIA(ID_UTILISATEUR, message);
            } catch (Exception e) {
                e.printStackTrace();
                return "❌ Erreur : " + e.getMessage();
            }
        }).thenAccept(reponse -> {
            Platform.runLater(() -> {
                // Masquer le chargement
                hboxLoading.setVisible(false);
                hboxLoading.setManaged(false);
                lblTyping.setVisible(false);

                // Afficher la réponse
                ajouterMessageBot(reponse);

                // Réactiver l'envoi
                isLoading = false;
                txtMessage.setDisable(false);
                btnEnvoyer.setDisable(false);
                txtMessage.requestFocus();
            });
        });
    }

    @FXML
    public void reinitialiserChat() {
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Nouvelle conversation");
        confirm.setHeaderText(null);
        confirm.setContentText("⚠️ Voulez-vous supprimer tout l'historique et démarrer une nouvelle conversation ?");

        // Personnalisation des boutons
        ButtonType btnOui = new ButtonType("Oui", ButtonBar.ButtonData.YES);
        ButtonType btnNon = new ButtonType("Non", ButtonBar.ButtonData.NO);
        confirm.getButtonTypes().setAll(btnOui, btnNon);

        confirm.showAndWait().ifPresent(response -> {
            if (response == btnOui) {
                try {
                    // Réinitialiser l'historique
                    chatBotService.reinitialiserHistorique(ID_UTILISATEUR);

                    // Vider l'interface
                    vboxMessages.getChildren().clear();

                    // Message de confirmation
                    ajouterMessageBot("🆕 **Nouvelle conversation démarrée !**\n\nComment puis-je vous aider aujourd'hui ?");

                    // Réafficher les suggestions
                    hboxSuggestions.setVisible(true);
                    hboxSuggestions.setManaged(true);

                    // Afficher une notification temporaire
                    showTemporaryNotification("✅ Historique effacé");

                } catch (Exception e) {
                    afficherErreur("Erreur", "Impossible de réinitialiser l'historique: " + e.getMessage());
                }
            }
        });
    }

    /**
     * Ajouter un message utilisateur avec scroll
     */
    private void ajouterMessageUtilisateur(String message) {
        ajouterMessageUtilisateurSansScroll(message);
        scrollToBottom();
    }

    /**
     * Ajouter un message utilisateur sans scroll
     */
    private void ajouterMessageUtilisateurSansScroll(String message) {
        VBox messageBox = creerBulleMessage(message, true);
        vboxMessages.getChildren().add(messageBox);
    }

    /**
     * Ajouter un message bot avec scroll
     */
    private void ajouterMessageBot(String message) {
        ajouterMessageBotSansScroll(message);
        scrollToBottom();
    }

    /**
     * Ajouter un message bot sans scroll
     */
    private void ajouterMessageBotSansScroll(String message) {
        VBox messageBox = creerBulleMessage(message, false);
        vboxMessages.getChildren().add(messageBox);
    }

    /**
     * Créer une bulle de message stylisée
     */
    private VBox creerBulleMessage(String message, boolean isUser) {
        VBox box = new VBox(5);
        box.setAlignment(isUser ? Pos.CENTER_RIGHT : Pos.CENTER_LEFT);
        box.setPadding(new Insets(5, 10, 5, 10));
        box.setMaxWidth(600);

        Text text = new Text(message);
        text.setWrappingWidth(450);
        text.setStyle(isUser ? "-fx-fill: white;" : "-fx-fill: #2d3436;");

        TextFlow flow = new TextFlow(text);
        flow.setMaxWidth(500);
        flow.setPadding(new Insets(12, 15, 12, 15));

        if (isUser) {
            flow.setStyle("-fx-background-color: #6c5ce7; -fx-background-radius: 18 18 5 18;");
        } else {
            flow.setStyle("-fx-background-color: #f0f0f0; -fx-background-radius: 18 18 18 5;");
        }

        // Horodatage
        Label timeLabel = new Label(getHeureActuelle());
        timeLabel.setStyle("-fx-text-fill: #b2bec3; -fx-font-size: 11px;");

        box.getChildren().addAll(flow, timeLabel);
        return box;
    }

    /**
     * Faire défiler vers le bas
     */
    private void scrollToBottom() {
        Platform.runLater(() -> {
            scrollPane.setVvalue(1.0);
        });
    }

    /**
     * Obtenir l'heure actuelle formatée
     */
    private String getHeureActuelle() {
        return LocalTime.now().format(DateTimeFormatter.ofPattern("HH:mm"));
    }

    /**
     * Afficher une notification temporaire
     */
    private void showTemporaryNotification(String message) {
        Label notification = new Label(message);
        notification.setStyle("-fx-background-color: #00b894; -fx-text-fill: white; -fx-padding: 10; -fx-background-radius: 5;");
        notification.setOpacity(0);

        vboxMessages.getChildren().add(notification);

        javafx.animation.FadeTransition ft = new javafx.animation.FadeTransition(
                javafx.util.Duration.millis(2000), notification);
        ft.setFromValue(1.0);
        ft.setToValue(0.0);
        ft.setCycleCount(1);
        ft.setOnFinished(e -> vboxMessages.getChildren().remove(notification));
        ft.play();
    }

    /**
     * Afficher une erreur
     */
    private void afficherErreur(String titre, String message) {
        Platform.runLater(() -> {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur");
            alert.setHeaderText(titre);
            alert.setContentText(message);
            alert.showAndWait();
        });
    }

    /**
     * Nettoyer les ressources
     */
    public void cleanup() {
        // Libérer les ressources si nécessaire
    }
}