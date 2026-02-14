package TestPsychologique.controllers;

import TestPsychologique.dao.Testdao;
import TestPsychologique.dao.Questiondao;
import TestPsychologique.models.Test;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Cursor;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.*;
import javafx.stage.Stage;

import java.io.File;
import java.util.List;

public class UserInterfaceController {

    @FXML
    private Label welcomeLabel;

    @FXML
    private Label testsCountLabel;

    @FXML
    private VBox testsListContainer;

    @FXML
    private VBox emptyStateBox;

    @FXML
    private VBox testsContainer;

    private Testdao testDao;
    private Questiondao questionDao;
    private List<Test> allTests;

    @FXML
    public void initialize() {
        testDao = new Testdao();
        questionDao = new Questiondao();
        loadTests();
    }

    /**
     * Charge tous les tests depuis la base de données
     */
    private void loadTests() {
        try {
            allTests = testDao.getAllTests();

            if (allTests == null || allTests.isEmpty()) {
                showEmptyState();
            } else {
                hideEmptyState();
                displayTests();
                updateTestsCount();
            }

        } catch (Exception e) {
            System.err.println("Erreur lors du chargement des tests: " + e.getMessage());
            e.printStackTrace();
            showEmptyState();
        }
    }

    /**
     * Affiche tous les tests disponibles
     */
    private void displayTests() {
        testsListContainer.getChildren().clear();

        for (Test test : allTests) {
            HBox testCard = createTestCard(test);
            testsListContainer.getChildren().add(testCard);
        }
    }

    /**
     * Crée une carte pour un test (style original)
     */
    private HBox createTestCard(Test test) {
        HBox card = new HBox();
        card.setSpacing(20);
        card.setAlignment(Pos.CENTER_LEFT);
        card.setStyle("-fx-background-color: #f5f5f5; -fx-background-radius: 8; -fx-padding: 15;");
        card.setPrefHeight(120);

        // Icône du test
        Label iconLabel = new Label(getTestIcon(test.getCategorie()));
        iconLabel.setStyle("-fx-font-size: 32px;");
        card.getChildren().add(iconLabel);

        // Informations du test
        VBox infoBox = new VBox();
        infoBox.setSpacing(5);
        HBox.setHgrow(infoBox, Priority.ALWAYS);

        // Titre
        Label titleLabel = new Label(test.getTitre());
        titleLabel.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #285921;");
        titleLabel.setWrapText(true);

        // Description
        Label descLabel = new Label(test.getDescription() != null ? test.getDescription() : "");
        descLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #666;");
        descLabel.setWrapText(true);
        descLabel.setMaxHeight(45);

        // Badges (catégorie, durée, statut)
        HBox badgesBox = new HBox();
        badgesBox.setSpacing(15);

        // Badge catégorie
        Label categoryBadge = new Label("📁 " + (test.getCategorie() != null ? test.getCategorie() : "Général"));
        categoryBadge.setStyle("-fx-font-size: 12px; -fx-text-fill: #666; -fx-background-color: #f5f5f5; -fx-padding: 5 12; -fx-background-radius: 15;");

        // Badge durée
        Label durationBadge = new Label("⏱️ " + test.getDuree() + " min");
        durationBadge.setStyle("-fx-font-size: 12px; -fx-text-fill: #666; -fx-background-color: #f5f5f5; -fx-padding: 5 12; -fx-background-radius: 15;");

        // Badge statut
        Label statusBadge = new Label("✓ " + test.getStatus());
        statusBadge.setStyle("-fx-font-size: 12px; -fx-text-fill: white; -fx-background-color: #2e7d32; -fx-padding: 5 12; -fx-background-radius: 15;");

        badgesBox.getChildren().addAll(categoryBadge, durationBadge, statusBadge);

        infoBox.getChildren().addAll(titleLabel, descLabel, badgesBox);
        card.getChildren().add(infoBox);

        // Boutons d'action
        VBox actionsBox = new VBox();
        actionsBox.setSpacing(10);
        actionsBox.setAlignment(Pos.CENTER);
        actionsBox.setPrefWidth(180);

        // Bouton Commencer
        Button startButton = new Button("▶️ Commencer");
        startButton.setMaxWidth(Double.MAX_VALUE);
        startButton.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 20; -fx-background-radius: 5; -fx-cursor: hand;");
        startButton.setCursor(Cursor.HAND);
        startButton.setOnAction(e -> startTest(test));

        // Effet hover sur le bouton Commencer
        startButton.setOnMouseEntered(e -> {
            startButton.setStyle("-fx-background-color: #1b5e20; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 20; -fx-background-radius: 5; -fx-cursor: hand;");
        });

        startButton.setOnMouseExited(e -> {
            startButton.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 20; -fx-background-radius: 5; -fx-cursor: hand;");
        });

        // Bouton Détails
        Button detailsButton = new Button("ℹ️ Détails");
        detailsButton.setMaxWidth(Double.MAX_VALUE);
        detailsButton.setStyle("-fx-background-color: transparent; -fx-text-fill: #666; -fx-font-size: 13px; -fx-border-color: #ddd; -fx-border-width: 2; -fx-border-radius: 5; -fx-background-radius: 5; -fx-padding: 10 20; -fx-cursor: hand;");
        detailsButton.setCursor(Cursor.HAND);

        actionsBox.getChildren().addAll(startButton, detailsButton);
        card.getChildren().add(actionsBox);

        return card;
    }

    /**
     * Retourne une icône appropriée selon la catégorie du test
     */
    private String getTestIcon(String category) {
        if (category == null) return "📝";

        switch (category.toLowerCase()) {
            case "personnalité":
            case "personalité":
                return "👤";
            case "émotionnel":
            case "emotionnel":
                return "🧠";
            case "aptitudes":
            case "cognitif":
                return "🎯";
            case "professionnel":
            case "carrière":
                return "💼";
            case "stress":
            case "anxiété":
                return "😌";
            default:
                return "📝";
        }
    }

    /**
     * Démarre un test
     */
    private void startTest(Test test) {
        try {
            System.out.println("Démarrage du test: " + test.getTitre());

            // Charger la vue du test
            File fxmlFile = new File("src/TestPsychologique/views/ListTestsfront.fxml");
            FXMLLoader loader = new FXMLLoader(fxmlFile.toURI().toURL());
            Parent root = loader.load();

            // Récupérer le contrôleur et lui passer le test
            ListTestsfrontController controller = loader.getController();
            controller.initTest(test);

            // Créer une nouvelle scène
            Scene scene = new Scene(root);
            Stage stage = (Stage) testsListContainer.getScene().getWindow();
            stage.setScene(scene);
            stage.setTitle("Test: " + test.getTitre());

        } catch (Exception e) {
            System.err.println("Erreur lors du démarrage du test: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Met à jour le compteur de tests
     */
    private void updateTestsCount() {
        int count = allTests.size();
        testsCountLabel.setText(String.valueOf(count));
    }

    /**
     * Affiche l'état vide
     */
    private void showEmptyState() {
        testsListContainer.setVisible(false);
        testsListContainer.setManaged(false);
        emptyStateBox.setVisible(true);
        emptyStateBox.setManaged(true);
        testsCountLabel.setText("0");
    }

    /**
     * Cache l'état vide
     */
    private void hideEmptyState() {
        testsListContainer.setVisible(true);
        testsListContainer.setManaged(true);
        emptyStateBox.setVisible(false);
        emptyStateBox.setManaged(false);
    }

    /**
     * Affiche tous les tests (appelé par le bouton "Voir les Tests")
     */
    @FXML
    private void showAllTests() {
        // Pour l'instant, rien à faire car tous les tests sont déjà affichés
        System.out.println("Affichage de tous les tests");
    }

    /**
     * Rafraîchit la liste des tests
     */
    @FXML
    private void refreshTests() {
        loadTests();
    }
}