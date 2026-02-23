package tn.esprit.projet.gui;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import tn.esprit.projet.view.AIEventAssistantService;

import java.util.concurrent.CompletableFuture;

public class AIAssistantController {

    @FXML private TextArea eventDescriptionArea;
    @FXML private TextArea resultArea;
    @FXML private ProgressIndicator loadingIndicator;
    @FXML private Button generateButton;
    @FXML private Button clearButton;
    @FXML private Button copyButton;
    @FXML private Button closeButton;
    @FXML private ComboBox<String> eventTypeCombo;
    @FXML private ComboBox<String> budgetCombo;
    @FXML private ComboBox<String> audienceSizeCombo;
    @FXML private VBox quickFiltersBox;

    @FXML
    public void initialize() {
        // Populate quick filters
        eventTypeCombo.getItems().addAll(
                "💖 Bien-être & Développement personnel",
                "💼 Entreprise & Professionnel",
                "🎉 Événements sociaux & Fêtes",
                "📚 Ateliers éducatifs",
                "🌍 Culturels & Communautaires",
                "🎪 Saisonniers & Fêtes",
                "✨ Surprise-moi!"
        );

        budgetCombo.getItems().addAll(
                "💰 Moins de 1 000 €",
                "💰 1 000 € - 5 000 €",
                "💰 5 000 € - 10 000 €",
                "💰 10 000 € - 25 000 €",
                "💰 25 000 € +"
        );

        audienceSizeCombo.getItems().addAll(
                "👥 Petit (moins de 50)",
                "👥 Moyen (50-200)",
                "👥 Grand (200-500)",
                "👥 Très grand (500+)"
        );

        // Set welcome message with cool formatting
        resultArea.setText("""
            ╔══════════════════════════════════════════════════════════════╗
            ║         🤖  BIENVENUE À L'ASSISTANT ÉVÉNEMENTIEL  🤖         ║
            ╚══════════════════════════════════════════════════════════════╝
            
            ✨ Bonjour! Je suis votre assistant personnel de planification d'événements.
            
            🎯 **COMMENT PUIS-JE VOUS AIDER AUJOURD'HUI?**
            
            • Besoin d'inspiration? Dites "Donne-moi des idées d'événements"
            • Vous avez un événement spécifique en tête? Décrivez-le!
            • Utilisez les filtres rapides ci-dessus pour des suggestions ciblées
            • Demandez-moi des conseils sur les budgets, les calendriers ou le marketing
            
            💡 **EXEMPLES À ESSAYER:**
            • "Je veux créer un événement sur l'amour de soi"
            • "Besoin d'idées pour un team building en entreprise"
            • "Aide-moi à planifier une fête d'été pour 100 personnes"
            • "Quelles sont des idées d'ateliers uniques?"
            • "Donne-moi de l'inspiration pour la journée de la femme"
            
            Tapez votre demande ci-dessous et créons quelque chose d'incroyable! 🚀
            """);

        // Add listener for quick filters
        eventTypeCombo.setOnAction(e -> applyQuickFilters());
        budgetCombo.setOnAction(e -> applyQuickFilters());
        audienceSizeCombo.setOnAction(e -> applyQuickFilters());
    }

    private void applyQuickFilters() {
        String eventType = eventTypeCombo.getValue();
        String budget = budgetCombo.getValue();
        String audience = audienceSizeCombo.getValue();

        StringBuilder filterText = new StringBuilder();

        if (eventType != null) {
            filterText.append("Je cherche un événement de type ").append(
                    eventType.replace("💖 ", "").replace("💼 ", "").replace("🎉 ", "")
                            .replace("📚 ", "").replace("🌍 ", "").replace("🎪 ", "").replace("✨ ", ""));
        }

        if (budget != null) {
            filterText.append(" avec un budget ").append(budget.replace("💰 ", ""));
        }

        if (audience != null) {
            filterText.append(" pour ").append(audience.replace("👥 ", ""));
        }

        if (filterText.length() > 0) {
            eventDescriptionArea.setText(filterText.toString());
        }
    }

    @FXML
    private void generateIdeas() {
        String input = eventDescriptionArea.getText().trim();

        if (input.isEmpty()) {
            // If empty, give random inspiration
            input = "Donne-moi des idées d'événements";
        }

        // Show loading with animation
        generateButton.setDisable(true);
        loadingIndicator.setVisible(true);
        resultArea.setText("🤔 **Je réfléchis...**\n\nGénération d'idées créatives pour votre événement...\n\n" +
                "✨ Cela peut prendre quelques secondes pendant que je prépare les suggestions parfaites!");

        // Call AI service
        CompletableFuture<String> future = AIEventAssistantService.generateThemeIdeas(input);

        future.thenAccept(response -> {
            Platform.runLater(() -> {
                resultArea.setText(response);
                generateButton.setDisable(false);
                loadingIndicator.setVisible(false);

                // Auto-scroll to top
                resultArea.setScrollTop(0);
            });
        }).exceptionally(throwable -> {
            Platform.runLater(() -> {
                resultArea.setText("❌ **Oups! Une erreur s'est produite**\n\n" +
                        "Erreur: " + throwable.getMessage() + "\n\n" +
                        "Veuillez réessayer avec une description différente.");
                generateButton.setDisable(false);
                loadingIndicator.setVisible(false);
            });
            return null;
        });
    }

    @FXML
    private void clearFields() {
        eventDescriptionArea.clear();
        eventTypeCombo.setValue(null);
        budgetCombo.setValue(null);
        audienceSizeCombo.setValue(null);
        initialize(); // Reset to welcome message
    }

    @FXML
    private void copyToClipboard() {
        String content = resultArea.getText();
        if (content != null && !content.isEmpty()) {
            javafx.scene.input.Clipboard clipboard = javafx.scene.input.Clipboard.getSystemClipboard();
            javafx.scene.input.ClipboardContent clipboardContent = new javafx.scene.input.ClipboardContent();
            clipboardContent.putString(content);
            clipboard.setContent(clipboardContent);

            showTemporaryNotification("✨ Copié dans le presse-papiers!");
        }
    }

    @FXML
    private void closeWindow() {
        Stage stage = (Stage) closeButton.getScene().getWindow();
        stage.close();
    }

    private void showTemporaryNotification(String message) {
        Tooltip tooltip = new Tooltip(message);
        tooltip.setShowDelay(javafx.util.Duration.millis(100));
        tooltip.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white; -fx-font-size: 14px;");

        tooltip.show(copyButton.getScene().getWindow(),
                copyButton.localToScreen(copyButton.getBoundsInLocal()).getMinX(),
                copyButton.localToScreen(copyButton.getBoundsInLocal()).getMinY() - 40);

        new Thread(() -> {
            try {
                Thread.sleep(2000);
                Platform.runLater(() -> tooltip.hide());
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }).start();
    }

    @FXML
    private void handleQuickIdea() {
        eventDescriptionArea.setText("Donne-moi des idées d'événements");
        generateIdeas();
    }

    @FXML
    private void handleBudgetHelp() {
        eventDescriptionArea.setText("Aide-moi à planifier un budget pour mon événement");
        generateIdeas();
    }

    @FXML
    private void handleTimelineHelp() {
        eventDescriptionArea.setText("Quel devrait être le calendrier de mon événement?");
        generateIdeas();
    }
}