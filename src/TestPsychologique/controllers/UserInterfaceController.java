package TestPsychologique.controllers;

import TestPsychologique.dao.Testdao;
import TestPsychologique.dao.Questiondao;
import TestPsychologique.dao.Resultatdao;
import TestPsychologique.models.Test;
import TestPsychologique.models.Resultat;
import TestPsychologique.models.Interpretation;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Cursor;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.layout.*;
import javafx.stage.Stage;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import java.io.InputStream;
import java.util.List;

public class UserInterfaceController {

    @FXML private Label welcomeLabel;
    @FXML private Label testsCountLabel;
    @FXML private Label testsCompletesLabel;
    @FXML private VBox testsListContainer;
    @FXML private VBox emptyStateBox;
    @FXML private VBox testsContainer;
    @FXML private ImageView logoImage;
    @FXML private ImageView backgroundImage;  // AJOUTÉ


    @FXML private ImageView testDisponibleImage;   // ✅ NOUVEAU
    @FXML private ImageView testCompleteImage;     // ✅ NOUVEAU
    @FXML private ImageView testEncoursImage;      // ✅ NOUVEAU
    private Testdao testDao;
    private Questiondao questionDao;
    private Resultatdao resultatDao;
    private List<Test> allTests;
    private int userId = 1;

    @FXML
    public void initialize() {
        testDao = new Testdao();
        questionDao = new Questiondao();
        resultatDao = new Resultatdao();

        chargerImages();  // MODIFIÉ
        loadTests();
        loadStatistics();
    }

    /**
     * Charge le logo et l'image de fond depuis le dossier views
     */
    /**
     * Charge le logo et toutes les images de fond
     */
    private void chargerImages() {
        try {
            // Charger le logo
            InputStream logoStream = getClass().getResourceAsStream("../views/logo.png");
            if (logoStream != null) {
                Image logo = new Image(logoStream);
                logoImage.setImage(logo);
                System.out.println("✅ Logo chargé");
            } else {
                System.err.println("❌ Logo non trouvé");
            }

            // Charger l'image de fond du header
            InputStream bgStream = getClass().getResourceAsStream("../views/background.jpg");
            if (bgStream != null) {
                Image bg = new Image(bgStream);
                backgroundImage.setImage(bg);
                System.out.println("✅ Image de fond header chargée");
            } else {
                System.err.println("❌ Image de fond header non trouvée");
            }

            // Charger l'image Tests Disponibles
            InputStream testDispStream = getClass().getResourceAsStream("../views/testdisponible.jpg");
            if (testDispStream != null) {
                Image testDisp = new Image(testDispStream);
                testDisponibleImage.setImage(testDisp);
                System.out.println("✅ Image Tests Disponibles chargée");
            } else {
                System.err.println("❌ Image Tests Disponibles non trouvée");
            }

            // Charger l'image Tests Complétés
            InputStream testCompStream = getClass().getResourceAsStream("../views/testcomplete.jpg");
            if (testCompStream != null) {
                Image testComp = new Image(testCompStream);
                testCompleteImage.setImage(testComp);
                System.out.println("✅ Image Tests Complétés chargée");
            } else {
                System.err.println("❌ Image Tests Complétés non trouvée");
            }

            // Charger l'image Tests En Cours
            InputStream testEncStream = getClass().getResourceAsStream("../views/testencours.jpg");
            if (testEncStream != null) {
                Image testEnc = new Image(testEncStream);
                testEncoursImage.setImage(testEnc);
                System.out.println("✅ Image Tests En Cours chargée");
            } else {
                System.err.println("❌ Image Tests En Cours non trouvée");
            }

        } catch (Exception e) {
            System.err.println("❌ Erreur chargement images: " + e.getMessage());
            e.printStackTrace();
        }
    }

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
            e.printStackTrace();
            showEmptyState();
        }
    }

    private void loadStatistics() {
        try {
            List<Resultat> resultats = resultatDao.getResultatsByUserId(userId);
            int testsCompletes = resultats.size();

            if (testsCompletesLabel != null) {
                testsCompletesLabel.setText(String.valueOf(testsCompletes));
            }

        } catch (Exception e) {
            System.err.println("Erreur statistiques: " + e.getMessage());
        }
    }

    private void displayTests() {
        testsListContainer.getChildren().clear();

        int maxTests = Math.min(3, allTests.size());

        for (int i = 0; i < maxTests; i++) {
            Test test = allTests.get(i);
            HBox testCard = createTestCard(test);
            testsListContainer.getChildren().add(testCard);
        }
    }

    private HBox createTestCard(Test test) {
        HBox card = new HBox();
        card.setSpacing(20);
        card.setAlignment(Pos.CENTER_LEFT);
        card.setStyle("-fx-background-color: #f5f5f5; -fx-background-radius: 8; -fx-padding: 15;");
        card.setPrefHeight(120);

        Label iconLabel = new Label(getTestIcon(test.getCategorie()));
        iconLabel.setStyle("-fx-font-size: 32px;");
        card.getChildren().add(iconLabel);

        VBox infoBox = new VBox();
        infoBox.setSpacing(5);
        HBox.setHgrow(infoBox, Priority.ALWAYS);

        Label titleLabel = new Label(test.getTitre());
        titleLabel.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #285921;");
        titleLabel.setWrapText(true);

        Label descLabel = new Label(test.getDescription() != null ? test.getDescription() : "");
        descLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #666;");
        descLabel.setWrapText(true);
        descLabel.setMaxHeight(45);

        HBox badgesBox = new HBox();
        badgesBox.setSpacing(15);

        Label categoryBadge = new Label("📁 " + (test.getCategorie() != null ? test.getCategorie() : "Général"));
        categoryBadge.setStyle("-fx-font-size: 12px; -fx-text-fill: #666; -fx-background-color: #f5f5f5; -fx-padding: 5 12; -fx-background-radius: 15;");

        Label durationBadge = new Label("⏱️ " + test.getDuree() + " min");
        durationBadge.setStyle("-fx-font-size: 12px; -fx-text-fill: #666; -fx-background-color: #f5f5f5; -fx-padding: 5 12; -fx-background-radius: 15;");

        badgesBox.getChildren().addAll(categoryBadge, durationBadge);

        infoBox.getChildren().addAll(titleLabel, descLabel, badgesBox);
        card.getChildren().add(infoBox);

        Button startButton = new Button("▶️ Commencer");
        startButton.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 20; -fx-background-radius: 5; -fx-cursor: hand;");
        startButton.setCursor(Cursor.HAND);
        startButton.setOnAction(e -> startTest(test));

        card.getChildren().add(startButton);

        return card;
    }

    private String getTestIcon(String category) {
        if (category == null) return "📝";
        switch (category.toLowerCase()) {
            case "personnalité": return "👤";
            case "émotionnel": return "🧠";
            case "aptitudes": return "🎯";
            case "professionnel": return "💼";
            default: return "📝";
        }
    }

    private void startTest(Test test) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("../views/ListTestsfront.fxml"));
            Parent root = loader.load();

            ListTestsfrontController controller = loader.getController();
            controller.initTest(test);

            Scene scene = new Scene(root);
            Stage stage = (Stage) testsListContainer.getScene().getWindow();
            stage.setScene(scene);
            stage.setTitle("Test: " + test.getTitre());

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void updateTestsCount() {
        int count = allTests.size();
        testsCountLabel.setText(String.valueOf(count));
    }

    private void showEmptyState() {
        testsListContainer.setVisible(false);
        testsListContainer.setManaged(false);
        emptyStateBox.setVisible(true);
        emptyStateBox.setManaged(true);
        testsCountLabel.setText("0");
    }

    private void hideEmptyState() {
        testsListContainer.setVisible(true);
        testsListContainer.setManaged(true);
        emptyStateBox.setVisible(false);
        emptyStateBox.setManaged(false);
    }

    @FXML
    private void showAllTests() {
        afficherTousLesTests();
    }

    private void afficherTousLesTests() {
        try {
            Stage stage = new Stage();
            stage.setTitle("Tests Disponibles");

            VBox mainBox = new VBox(0);
            mainBox.setStyle("-fx-background-color: #f8f5f2;");

            // Header moderne avec dégradé vert
            VBox header = new VBox(10);
            header.setPadding(new Insets(25, 30, 25, 30));
            header.setStyle("-fx-background-color: linear-gradient(to right, #285921, #2e7d32); -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.2), 10, 0, 0, 3);");

            Label titleLabel = new Label("📚 Tous les Tests Disponibles");
            titleLabel.setStyle("-fx-font-size: 28px; -fx-font-weight: bold; -fx-text-fill: white;");

            Label subtitleLabel = new Label(allTests.size() + " test(s) psychologique(s) à votre disposition");
            subtitleLabel.setStyle("-fx-font-size: 14px; -fx-text-fill: rgba(255,255,255,0.9);");

            header.getChildren().addAll(titleLabel, subtitleLabel);

            // Barre d'info
            HBox searchBox = new HBox(15);
            searchBox.setPadding(new Insets(20, 30, 10, 30));
            searchBox.setAlignment(Pos.CENTER_LEFT);

            Label searchIcon = new Label("🔍");
            searchIcon.setStyle("-fx-font-size: 20px;");

            Label countLabel = new Label(allTests.size() + " résultat(s)");
            countLabel.setStyle("-fx-font-size: 14px; -fx-text-fill: #666; -fx-font-weight: bold;");

            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);

            searchBox.getChildren().addAll(searchIcon, countLabel, spacer);

            // ScrollPane pour les tests
            ScrollPane scrollPane = new ScrollPane();
            scrollPane.setFitToWidth(true);
            scrollPane.setStyle("-fx-background: transparent; -fx-background-color: transparent;");
            VBox.setVgrow(scrollPane, Priority.ALWAYS);

            VBox testsBox = new VBox(20);
            testsBox.setPadding(new Insets(10, 30, 20, 30));

            for (Test test : allTests) {
                HBox card = createModernTestCard(test, stage);
                testsBox.getChildren().add(card);
            }

            scrollPane.setContent(testsBox);

            // Footer avec bouton
            HBox footer = new HBox();
            footer.setPadding(new Insets(15, 30, 20, 30));
            footer.setAlignment(Pos.CENTER);
            footer.setStyle("-fx-background-color: white; -fx-border-color: #e0e0e0; -fx-border-width: 1 0 0 0;");

            Button closeBtn = new Button("✖ Fermer");
            closeBtn.setStyle("-fx-background-color: transparent; -fx-text-fill: #666; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 40; -fx-border-color: #ddd; -fx-border-width: 2; -fx-border-radius: 8; -fx-background-radius: 8; -fx-cursor: hand;");
            closeBtn.setCursor(Cursor.HAND);
            closeBtn.setOnMouseEntered(e -> closeBtn.setStyle("-fx-background-color: #f5f5f5; -fx-text-fill: #333; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 40; -fx-border-color: #285921; -fx-border-width: 2; -fx-border-radius: 8; -fx-background-radius: 8; -fx-cursor: hand;"));
            closeBtn.setOnMouseExited(e -> closeBtn.setStyle("-fx-background-color: transparent; -fx-text-fill: #666; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 40; -fx-border-color: #ddd; -fx-border-width: 2; -fx-border-radius: 8; -fx-background-radius: 8; -fx-cursor: hand;"));
            closeBtn.setOnAction(e -> stage.close());

            footer.getChildren().add(closeBtn);

            mainBox.getChildren().addAll(header, searchBox, scrollPane, footer);

            Scene scene = new Scene(mainBox, 950, 650);
            stage.setScene(scene);
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }


    private HBox createModernTestCard(Test test, Stage parentStage) {
        HBox card = new HBox(20);
        card.setAlignment(Pos.CENTER_LEFT);
        card.setStyle("-fx-background-color: white; -fx-background-radius: 12; -fx-padding: 25; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 15, 0, 0, 2); -fx-border-color: #e8f5e9; -fx-border-width: 1; -fx-border-radius: 12;");
        card.setPrefHeight(140);

        // Hover effect
        card.setOnMouseEntered(e -> card.setStyle("-fx-background-color: white; -fx-background-radius: 12; -fx-padding: 25; -fx-effect: dropshadow(gaussian, rgba(40,89,33,0.15), 20, 0, 0, 5); -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 12; -fx-cursor: hand;"));
        card.setOnMouseExited(e -> card.setStyle("-fx-background-color: white; -fx-background-radius: 12; -fx-padding: 25; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 15, 0, 0, 2); -fx-border-color: #e8f5e9; -fx-border-width: 1; -fx-border-radius: 12;"));

        // Icône du test dans un cercle
        VBox iconBox = new VBox();
        iconBox.setAlignment(Pos.CENTER);
        iconBox.setPrefWidth(80);
        iconBox.setPrefHeight(80);
        iconBox.setStyle("-fx-background-color: linear-gradient(to bottom right, #e8f5e9, #c8e6c9); -fx-background-radius: 40;");
        Label icon = new Label(getTestIcon(test.getCategorie()));
        icon.setStyle("-fx-font-size: 40px;");
        iconBox.getChildren().add(icon);

        // Informations du test
        VBox infoBox = new VBox(8);
        HBox.setHgrow(infoBox, Priority.ALWAYS);

        Label titre = new Label(test.getTitre());
        titre.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #285921;");
        titre.setWrapText(true);

        Label desc = new Label(test.getDescription() != null ? test.getDescription() : "Description non disponible");
        desc.setStyle("-fx-font-size: 13px; -fx-text-fill: #666; -fx-opacity: 0.9;");
        desc.setWrapText(true);
        desc.setMaxHeight(40);

        HBox badges = new HBox(12);

        Label catBadge = new Label("📁 " + (test.getCategorie() != null ? test.getCategorie() : "Général"));
        catBadge.setStyle("-fx-font-size: 11px; -fx-text-fill: #2e7d32; -fx-background-color: #e8f5e9; -fx-padding: 5 12; -fx-background-radius: 12; -fx-font-weight: bold;");

        Label durBadge = new Label("⏱ " + test.getDuree() + " min");
        durBadge.setStyle("-fx-font-size: 11px; -fx-text-fill: #666; -fx-background-color: #f5f5f5; -fx-padding: 5 12; -fx-background-radius: 12;");

        // Compter les questions
        int nbQuestions = questionDao.getQuestionsByTestId(test.getId()).size();
        Label qBadge = new Label("📝 " + nbQuestions + " question" + (nbQuestions > 1 ? "s" : ""));
        qBadge.setStyle("-fx-font-size: 11px; -fx-text-fill: #666; -fx-background-color: #f5f5f5; -fx-padding: 5 12; -fx-background-radius: 12;");

        badges.getChildren().addAll(catBadge, durBadge, qBadge);

        infoBox.getChildren().addAll(titre, desc, badges);

        // Bouton d'action
        VBox actionBox = new VBox(10);
        actionBox.setAlignment(Pos.CENTER);
        actionBox.setPrefWidth(160);

        Button btnStart = new Button("▶ Commencer");
        btnStart.setMaxWidth(Double.MAX_VALUE);
        btnStart.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 14 0; -fx-background-radius: 8; -fx-cursor: hand;");
        btnStart.setCursor(Cursor.HAND);
        btnStart.setOnMouseEntered(e -> btnStart.setStyle("-fx-background-color: #1b5e20; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 14 0; -fx-background-radius: 8; -fx-cursor: hand; -fx-scale-x: 1.05; -fx-scale-y: 1.05;"));
        btnStart.setOnMouseExited(e -> btnStart.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 14 0; -fx-background-radius: 8; -fx-cursor: hand;"));
        btnStart.setOnAction(e -> {
            parentStage.close();
            startTest(test);
        });

        actionBox.getChildren().add(btnStart);

        card.getChildren().addAll(iconBox, infoBox, actionBox);
        return card;
    }

    @FXML
    private void showResultats() {
        try {
            List<Resultat> resultats = resultatDao.getResultatsByUserId(userId);

            if (resultats.isEmpty()) {
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Mes Résultats");
                alert.setHeaderText("Aucun résultat");
                alert.setContentText("Vous n'avez pas encore passé de tests.\n\nCommencez un test pour voir vos résultats ici !");
                alert.showAndWait();
            } else {
                afficherResultatsPopup(resultats);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void afficherResultatsPopup(List<Resultat> resultats) {
        Stage stage = new Stage();
        stage.setTitle("Mes Résultats");

        VBox mainBox = new VBox(0);
        mainBox.setStyle("-fx-background-color: #f8f5f2;");

        // Header moderne
        VBox header = new VBox(10);
        header.setPadding(new Insets(25, 30, 25, 30));
        header.setStyle("-fx-background-color: linear-gradient(to right, #285921, #2e7d32); -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.2), 10, 0, 0, 3);");

        Label titleLabel = new Label("📊 Historique de vos Résultats");
        titleLabel.setStyle("-fx-font-size: 28px; -fx-font-weight: bold; -fx-text-fill: white;");

        // Calculer moyenne
        int scoreMoyen = 0;
        for (Resultat r : resultats) {
            scoreMoyen += r.getScoreTotal();
        }
        scoreMoyen = resultats.size() > 0 ? scoreMoyen / resultats.size() : 0;

        Label subtitleLabel = new Label(resultats.size() + " test(s) complété(s) • Score moyen: " + scoreMoyen + " points");
        subtitleLabel.setStyle("-fx-font-size: 14px; -fx-text-fill: rgba(255,255,255,0.9);");

        header.getChildren().addAll(titleLabel, subtitleLabel);

        // Statistiques rapides
        HBox statsBox = new HBox(20);
        statsBox.setPadding(new Insets(20, 30, 15, 30));
        statsBox.setAlignment(Pos.CENTER);

        VBox stat1 = createStatBox("🎯", String.valueOf(resultats.size()), "Tests passés");
        VBox stat2 = createStatBox("⭐", String.valueOf(scoreMoyen), "Score moyen");
        VBox stat3 = createStatBox("📈", "100%", "Complétion");

        statsBox.getChildren().addAll(stat1, stat2, stat3);

        // ScrollPane pour les résultats
        ScrollPane scrollPane = new ScrollPane();
        scrollPane.setFitToWidth(true);
        scrollPane.setStyle("-fx-background: transparent; -fx-background-color: transparent;");
        VBox.setVgrow(scrollPane, Priority.ALWAYS);

        VBox resultsBox = new VBox(15);
        resultsBox.setPadding(new Insets(5, 30, 20, 30));

        java.text.SimpleDateFormat sdf = new java.text.SimpleDateFormat("dd/MM/yyyy à HH:mm");

        for (Resultat resultat : resultats) {
            Test test = testDao.getTestById(resultat.getTestId());
            String testNom = test != null ? test.getTitre() : "Test #" + resultat.getTestId();

            HBox card = createModernResultCard(resultat, testNom, sdf, stage);
            resultsBox.getChildren().add(card);
        }

        scrollPane.setContent(resultsBox);

        // Footer
        HBox footer = new HBox();
        footer.setPadding(new Insets(15, 30, 20, 30));
        footer.setAlignment(Pos.CENTER);
        footer.setStyle("-fx-background-color: white; -fx-border-color: #e0e0e0; -fx-border-width: 1 0 0 0;");

        Button closeBtn = new Button("✖ Fermer");
        closeBtn.setStyle("-fx-background-color: transparent; -fx-text-fill: #666; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 40; -fx-border-color: #ddd; -fx-border-width: 2; -fx-border-radius: 8; -fx-background-radius: 8; -fx-cursor: hand;");
        closeBtn.setCursor(Cursor.HAND);
        closeBtn.setOnMouseEntered(e -> closeBtn.setStyle("-fx-background-color: #f5f5f5; -fx-text-fill: #333; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 40; -fx-border-color: #285921; -fx-border-width: 2; -fx-border-radius: 8; -fx-background-radius: 8; -fx-cursor: hand;"));
        closeBtn.setOnMouseExited(e -> closeBtn.setStyle("-fx-background-color: transparent; -fx-text-fill: #666; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 40; -fx-border-color: #ddd; -fx-border-width: 2; -fx-border-radius: 8; -fx-background-radius: 8; -fx-cursor: hand;"));
        closeBtn.setOnAction(e -> stage.close());

        footer.getChildren().add(closeBtn);

        mainBox.getChildren().addAll(header, statsBox, scrollPane, footer);

        Scene scene = new Scene(mainBox, 900, 650);
        stage.setScene(scene);
        stage.show();
    }
    /**
     * Créer une petite boîte de statistique
     */
    private VBox createStatBox(String icon, String value, String label) {
        VBox box = new VBox(5);
        box.setAlignment(Pos.CENTER);
        box.setStyle("-fx-background-color: white; -fx-background-radius: 10; -fx-padding: 15 25; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 10, 0, 0, 2);");
        box.setPrefWidth(150);

        Label iconLabel = new Label(icon);
        iconLabel.setStyle("-fx-font-size: 28px;");

        Label valueLabel = new Label(value);
        valueLabel.setStyle("-fx-font-size: 24px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        Label textLabel = new Label(label);
        textLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #666;");

        box.getChildren().addAll(iconLabel, valueLabel, textLabel);
        return box;
    }


    /**
     * Créer une carte de résultat moderne
     */
    private HBox createModernResultCard(Resultat resultat, String testNom, java.text.SimpleDateFormat sdf, Stage parentStage) {
        HBox card = new HBox(20);
        card.setAlignment(Pos.CENTER_LEFT);
        card.setStyle("-fx-background-color: white; -fx-background-radius: 12; -fx-padding: 20; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 15, 0, 0, 2); -fx-border-color: #e8f5e9; -fx-border-width: 1; -fx-border-radius: 12;");
        card.setPrefHeight(110);

        // Hover effect
        card.setOnMouseEntered(e -> card.setStyle("-fx-background-color: white; -fx-background-radius: 12; -fx-padding: 20; -fx-effect: dropshadow(gaussian, rgba(40,89,33,0.15), 20, 0, 0, 5); -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 12; -fx-cursor: hand;"));
        card.setOnMouseExited(e -> card.setStyle("-fx-background-color: white; -fx-background-radius: 12; -fx-padding: 20; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 15, 0, 0, 2); -fx-border-color: #e8f5e9; -fx-border-width: 1; -fx-border-radius: 12;"));

        // Icône
        VBox iconBox = new VBox();
        iconBox.setAlignment(Pos.CENTER);
        iconBox.setPrefWidth(70);
        iconBox.setPrefHeight(70);
        iconBox.setStyle("-fx-background-color: linear-gradient(to bottom right, #e8f5e9, #c8e6c9); -fx-background-radius: 35;");
        Label icon = new Label("📊");
        icon.setStyle("-fx-font-size: 35px;");
        iconBox.getChildren().add(icon);

        // Informations
        VBox infoBox = new VBox(6);
        HBox.setHgrow(infoBox, Priority.ALWAYS);

        Label titre = new Label(testNom);
        titre.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #285921;");
        titre.setWrapText(true);

        Label date = new Label("📅 " + sdf.format(resultat.getDateTest()));
        date.setStyle("-fx-font-size: 12px; -fx-text-fill: #666;");

        // Badge score avec couleur conditionnelle
        int score = resultat.getScoreTotal();
        String scoreColor = score >= 40 ? "#2e7d32" : (score >= 20 ? "#ff9800" : "#666");
        Label scoreBadge = new Label("Score: " + score + " points");
        scoreBadge.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: " + scoreColor + "; -fx-background-color: " + (score >= 40 ? "#e8f5e9" : "#f5f5f5") + "; -fx-padding: 4 10; -fx-background-radius: 10;");

        infoBox.getChildren().addAll(titre, date, scoreBadge);

        // Bouton voir détails
        Button btnVoir = new Button("👁 Voir détails");
        btnVoir.setPrefWidth(140);
        btnVoir.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 13px; -fx-font-weight: bold; -fx-padding: 12 20; -fx-background-radius: 8; -fx-cursor: hand;");
        btnVoir.setCursor(Cursor.HAND);
        btnVoir.setOnMouseEntered(e -> btnVoir.setStyle("-fx-background-color: #1b5e20; -fx-text-fill: white; -fx-font-size: 13px; -fx-font-weight: bold; -fx-padding: 12 20; -fx-background-radius: 8; -fx-cursor: hand;"));
        btnVoir.setOnMouseExited(e -> btnVoir.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 13px; -fx-font-weight: bold; -fx-padding: 12 20; -fx-background-radius: 8; -fx-cursor: hand;"));
        btnVoir.setOnAction(e -> afficherDetailResultatModerne(resultat, testNom));

        card.getChildren().addAll(iconBox, infoBox, btnVoir);
        return card;
    }
    /**
     * Afficher le détail d'un résultat dans une fenêtre moderne
     */
    private void afficherDetailResultatModerne(Resultat resultat, String testNom) {
        Interpretation interpretation = resultatDao.getInterpretation(
                resultat.getTestId(),
                resultat.getScoreTotal()
        );

        Stage stage = new Stage();
        stage.setTitle("Détail du Résultat");

        VBox mainBox = new VBox(0);
        mainBox.setStyle("-fx-background-color: #f8f5f2;");

        // Header
        VBox header = new VBox(8);
        header.setPadding(new Insets(25, 30, 25, 30));
        header.setStyle("-fx-background-color: linear-gradient(to right, #285921, #2e7d32);");

        Label titleLabel = new Label("📊 Détail du Résultat");
        titleLabel.setStyle("-fx-font-size: 24px; -fx-font-weight: bold; -fx-text-fill: white;");

        Label testLabel = new Label(testNom);
        testLabel.setStyle("-fx-font-size: 16px; -fx-text-fill: rgba(255,255,255,0.9);");

        header.getChildren().addAll(titleLabel, testLabel);

        // Contenu
        VBox content = new VBox(20);
        content.setPadding(new Insets(30));

        // Score
        VBox scoreBox = new VBox(10);
        scoreBox.setAlignment(Pos.CENTER);
        scoreBox.setStyle("-fx-background-color: white; -fx-background-radius: 15; -fx-padding: 25; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 15, 0, 0, 3);");

        Label scoreLabel = new Label(resultat.getScoreTotal() + " points");
        scoreLabel.setStyle("-fx-font-size: 42px; -fx-font-weight: bold; -fx-text-fill: #2e7d32;");

        java.text.SimpleDateFormat sdf = new java.text.SimpleDateFormat("dd/MM/yyyy à HH:mm");
        Label dateLabel = new Label("📅 " + sdf.format(resultat.getDateTest()));
        dateLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #666;");

        scoreBox.getChildren().addAll(scoreLabel, dateLabel);

        // Interprétation
        if (interpretation != null) {
            VBox interpBox = new VBox(15);
            interpBox.setStyle("-fx-background-color: #e8f5e9; -fx-background-radius: 15; -fx-padding: 25; -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 15;");

            Label interpTitle = new Label("🎯 " + interpretation.getTitre());
            interpTitle.setStyle("-fx-font-size: 22px; -fx-font-weight: bold; -fx-text-fill: #285921;");

            Label interpDesc = new Label(interpretation.getDescription());
            interpDesc.setStyle("-fx-font-size: 14px; -fx-text-fill: #333; -fx-line-spacing: 5px;");
            interpDesc.setWrapText(true);

            interpBox.getChildren().addAll(interpTitle, interpDesc);

            if (interpretation.getConseils() != null && !interpretation.getConseils().isEmpty()) {
                Label conseilsTitle = new Label("💡 Conseils");
                conseilsTitle.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #285921; -fx-padding: 10 0 0 0;");

                Label conseilsText = new Label(interpretation.getConseils());
                conseilsText.setStyle("-fx-font-size: 13px; -fx-text-fill: #444; -fx-line-spacing: 4px;");
                conseilsText.setWrapText(true);

                interpBox.getChildren().addAll(conseilsTitle, conseilsText);
            }

            content.getChildren().addAll(scoreBox, interpBox);
        } else {
            content.getChildren().add(scoreBox);
        }

        ScrollPane scroll = new ScrollPane(content);
        scroll.setFitToWidth(true);
        scroll.setStyle("-fx-background: transparent; -fx-background-color: transparent;");
        VBox.setVgrow(scroll, Priority.ALWAYS);

        // Footer
        HBox footer = new HBox();
        footer.setPadding(new Insets(15, 30, 20, 30));
        footer.setAlignment(Pos.CENTER);
        footer.setStyle("-fx-background-color: white; -fx-border-color: #e0e0e0; -fx-border-width: 1 0 0 0;");

        Button closeBtn = new Button("✖ Fermer");
        closeBtn.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 40; -fx-background-radius: 8; -fx-cursor: hand;");
        closeBtn.setCursor(Cursor.HAND);
        closeBtn.setOnAction(e -> stage.close());

        footer.getChildren().add(closeBtn);

        mainBox.getChildren().addAll(header, scroll, footer);

        Scene scene = new Scene(mainBox, 700, 600);
        stage.setScene(scene);
        stage.show();
    }

    @FXML
    private void continueTest() {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Continuer Test");
        alert.setHeaderText(null);
        alert.setContentText("Reprise du test en cours...");
        alert.showAndWait();
    }

    @FXML
    private void refreshTests() {
        loadTests();
        loadStatistics();
    }
}