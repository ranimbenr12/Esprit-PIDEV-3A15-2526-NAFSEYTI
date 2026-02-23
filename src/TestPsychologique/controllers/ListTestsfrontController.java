package TestPsychologique.controllers;

import TestPsychologique.dao.Questiondao;
import TestPsychologique.dao.Resultatdao;
import TestPsychologique.models.Question;
import TestPsychologique.models.Test;
import TestPsychologique.dao.ReponseScoredao;

import TestPsychologique.models.Resultat;
import TestPsychologique.models.Interpretation;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.stage.Stage;

import java.io.File;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ListTestsfrontController {

    @FXML
    private Label testNameLabel;

    @FXML
    private Label testDescriptionLabel;

    @FXML
    private Label questionNumberLabel;

    @FXML
    private ProgressBar progressBar;

    @FXML
    private Label progressLabel;

    @FXML
    private VBox questionContainer;

    @FXML
    private Button previousButton;

    @FXML
    private Button nextButton;

    @FXML
    private Button submitButton;

    private Test currentTest;
    private List<Question> questions;
    private int currentQuestionIndex = 0;
    private Map<Integer, String> answers; // questionId -> response
    private Questiondao questionDao;
    private Resultatdao resultatDao;

    // TODO: Remplacer par l'ID de l'utilisateur connecté via SessionManager
    private int userId = 1; // ← À MODIFIER

    public ListTestsfrontController() {
        questionDao = new Questiondao();
        resultatDao = new Resultatdao();
        answers = new HashMap<>();
    }

    /**
     * Initialise le test avec ses questions
     */
    public void initTest(Test test) {
        this.currentTest = test;
        this.currentQuestionIndex = 0;

        // Charger les questions du test
        loadQuestions();

        // Afficher les informations du test
        if (testNameLabel != null) {
            testNameLabel.setText(test.getTitre());
        }

        if (testDescriptionLabel != null && test.getDescription() != null) {
            testDescriptionLabel.setText(test.getDescription());
        }

        // Afficher la première question
        if (questions != null && !questions.isEmpty()) {
            displayQuestion();
            updateProgress();
            updateNavigationButtons();
        } else {
            showNoQuestionsMessage();
        }
    }

    /**
     * Charge les questions du test depuis la base de données
     */
    private void loadQuestions() {
        try {
            questions = questionDao.getQuestionsByTestId(currentTest.getId());

            if (questions == null || questions.isEmpty()) {
                showAlert("Aucune question", "Ce test ne contient aucune question.", Alert.AlertType.WARNING);
            } else {
                System.out.println("✅ " + questions.size() + " questions chargées pour le test: " + currentTest.getTitre());
            }

        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement des questions: " + e.getMessage());
            e.printStackTrace();
            showAlert("Erreur", "Impossible de charger les questions du test.", Alert.AlertType.ERROR);
        }
    }

    /**
     * Affiche un message quand il n'y a pas de questions
     */
    private void showNoQuestionsMessage() {
        questionContainer.getChildren().clear();

        VBox emptyBox = new VBox();
        emptyBox.setAlignment(Pos.CENTER);
        emptyBox.setSpacing(15);
        emptyBox.setPadding(new Insets(60));

        Label icon = new Label("📭");
        icon.setStyle("-fx-font-size: 64px;");

        Label message = new Label("Ce test ne contient pas encore de questions");
        message.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        Label submessage = new Label("Veuillez contacter l'administrateur");
        submessage.setStyle("-fx-font-size: 14px; -fx-text-fill: #666;");

        emptyBox.getChildren().addAll(icon, message, submessage);
        questionContainer.getChildren().add(emptyBox);

        // Désactiver la navigation
        previousButton.setDisable(true);
        nextButton.setDisable(true);
        submitButton.setDisable(true);
    }

    /**
     * Affiche la question courante selon son type
     */
    private void displayQuestion() {
        if (questions == null || questions.isEmpty() || currentQuestionIndex >= questions.size()) {
            return;
        }

        questionContainer.getChildren().clear();
        Question question = questions.get(currentQuestionIndex);

        // Numéro de la question
        questionNumberLabel.setText("Question " + (currentQuestionIndex + 1) + " sur " + questions.size());

        // Texte de la question
        Label questionText = new Label(question.getTexte());
        questionText.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #285921; -fx-padding: 0 0 20 0;");
        questionText.setWrapText(true);
        questionContainer.getChildren().add(questionText);

        // Afficher le type de question approprié
        String typeQuestion = question.getTypeQuestion();

        if (typeQuestion == null || typeQuestion.isEmpty()) {
            typeQuestion = "qcm"; // Par défaut
        }

        typeQuestion = typeQuestion.toLowerCase().trim();

        System.out.println("📝 Question " + (currentQuestionIndex + 1) + " - Type: " + typeQuestion);

        switch (typeQuestion) {
            case "qcm":
            case "choix multiple":
            case "choix_multiple":
                displayQCMQuestion(question);
                break;

            case "vrai/faux":
            case "vrai_faux":
            case "vraifaux":
            case "boolean":
                displayVraiFauxQuestion(question);
                break;

            case "texte libre":
            case "texte_libre":
            case "textlibre":
            case "ouverte":
            case "text":
                displayTexteLibreQuestion(question);
                break;

            default:
                // Si type non reconnu, afficher en QCM par défaut
                System.out.println("⚠️ Type de question non reconnu: " + typeQuestion + ". Affichage en QCM.");
                displayQCMQuestion(question);
                break;
        }
    }

    /**
     * Affiche une question QCM (Questionnaire à Choix Multiples)
     */
    private void displayQCMQuestion(Question question) {
        VBox answersBox = new VBox();
        answersBox.setSpacing(15);
        answersBox.setPadding(new Insets(10, 0, 20, 0));

        String reponsesPossibles = question.getReponsesPossibles();

        if (reponsesPossibles != null && !reponsesPossibles.isEmpty()) {
            // Parser les réponses (format: "A:réponse1|B:réponse2|C:réponse3|D:réponse4")
            String[] options = reponsesPossibles.split("\\|");
            ToggleGroup toggleGroup = new ToggleGroup();

            for (String option : options) {
                if (option.contains(":")) {
                    String[] parts = option.split(":", 2);
                    String optionLetter = parts[0].trim();
                    String optionText = parts[1].trim();

                    RadioButton radioButton = new RadioButton(optionLetter + ". " + optionText);
                    radioButton.setToggleGroup(toggleGroup);
                    radioButton.setStyle("-fx-font-size: 15px; -fx-text-fill: #333; -fx-padding: 12; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");
                    radioButton.setUserData(optionLetter);

                    // Style pour la sélection
                    radioButton.selectedProperty().addListener((obs, oldVal, newVal) -> {
                        if (newVal) {
                            radioButton.setStyle("-fx-font-size: 15px; -fx-text-fill: #285921; -fx-font-weight: bold; -fx-padding: 12; -fx-background-color: #e8f5e9; -fx-background-radius: 5; -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 5;");
                        } else {
                            radioButton.setStyle("-fx-font-size: 15px; -fx-text-fill: #333; -fx-padding: 12; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");
                        }
                    });

                    // Charger la réponse précédente
                    String previousAnswer = answers.get(question.getId());
                    if (previousAnswer != null && previousAnswer.equals(optionLetter)) {
                        radioButton.setSelected(true);
                    }

                    // Sauvegarder la réponse
                    radioButton.setOnAction(e -> {
                        answers.put(question.getId(), (String) radioButton.getUserData());
                    });

                    answersBox.getChildren().add(radioButton);
                }
            }
        } else {
            Label noOptionsLabel = new Label("⚠️ Aucune option disponible pour cette question");
            noOptionsLabel.setStyle("-fx-font-size: 14px; -fx-text-fill: #ff9800; -fx-padding: 20;");
            answersBox.getChildren().add(noOptionsLabel);
        }

        questionContainer.getChildren().add(answersBox);
    }

    /**
     * Affiche une question Vrai/Faux
     */
    private void displayVraiFauxQuestion(Question question) {
        VBox answersBox = new VBox();
        answersBox.setSpacing(15);
        answersBox.setPadding(new Insets(10, 0, 20, 0));

        ToggleGroup toggleGroup = new ToggleGroup();

        // Option Vrai
        RadioButton vraiButton = new RadioButton("✓ Vrai");
        vraiButton.setToggleGroup(toggleGroup);
        vraiButton.setUserData("Vrai");
        vraiButton.setStyle("-fx-font-size: 16px; -fx-text-fill: #333; -fx-padding: 15; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");

        // Option Faux
        RadioButton fauxButton = new RadioButton("✗ Faux");
        fauxButton.setToggleGroup(toggleGroup);
        fauxButton.setUserData("Faux");
        fauxButton.setStyle("-fx-font-size: 16px; -fx-text-fill: #333; -fx-padding: 15; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");

        // Style pour la sélection
        for (RadioButton rb : new RadioButton[]{vraiButton, fauxButton}) {
            rb.selectedProperty().addListener((obs, oldVal, newVal) -> {
                if (newVal) {
                    rb.setStyle("-fx-font-size: 16px; -fx-text-fill: #285921; -fx-font-weight: bold; -fx-padding: 15; -fx-background-color: #e8f5e9; -fx-background-radius: 5; -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 5;");
                } else {
                    rb.setStyle("-fx-font-size: 16px; -fx-text-fill: #333; -fx-padding: 15; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");
                }
            });

            rb.setOnAction(e -> {
                answers.put(question.getId(), (String) rb.getUserData());
            });
        }

        // Charger la réponse précédente
        String previousAnswer = answers.get(question.getId());
        if (previousAnswer != null) {
            if (previousAnswer.equals("Vrai")) {
                vraiButton.setSelected(true);
            } else if (previousAnswer.equals("Faux")) {
                fauxButton.setSelected(true);
            }
        }

        answersBox.getChildren().addAll(vraiButton, fauxButton);
        questionContainer.getChildren().add(answersBox);
    }

    /**
     * Affiche une question à texte libre
     */
    private void displayTexteLibreQuestion(Question question) {
        VBox answersBox = new VBox();
        answersBox.setSpacing(10);
        answersBox.setPadding(new Insets(10, 0, 20, 0));

        Label instruction = new Label("💭 Rédigez votre réponse ci-dessous:");
        instruction.setStyle("-fx-font-size: 14px; -fx-text-fill: #666; -fx-font-style: italic;");

        TextArea textArea = new TextArea();
        textArea.setPromptText("Écrivez votre réponse ici...");
        textArea.setPrefRowCount(6);
        textArea.setWrapText(true);
        textArea.setStyle("-fx-font-size: 14px; -fx-padding: 15; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5; -fx-background-radius: 5;");

        // Style focus
        textArea.focusedProperty().addListener((obs, oldVal, newVal) -> {
            if (newVal) {
                textArea.setStyle("-fx-font-size: 14px; -fx-padding: 15; -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 5; -fx-background-radius: 5;");
            } else {
                textArea.setStyle("-fx-font-size: 14px; -fx-padding: 15; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5; -fx-background-radius: 5;");
            }
        });

        // Charger la réponse précédente
        String previousAnswer = answers.get(question.getId());
        if (previousAnswer != null) {
            textArea.setText(previousAnswer);
        }

        // Sauvegarder la réponse
        textArea.textProperty().addListener((obs, oldVal, newVal) -> {
            answers.put(question.getId(), newVal);
        });

        // Compteur de caractères
        Label charCount = new Label("0 caractères");
        charCount.setStyle("-fx-font-size: 12px; -fx-text-fill: #999;");
        textArea.textProperty().addListener((obs, oldVal, newVal) -> {
            int count = newVal.length();
            charCount.setText(count + " caractère" + (count > 1 ? "s" : ""));
        });

        answersBox.getChildren().addAll(instruction, textArea, charCount);
        questionContainer.getChildren().add(answersBox);
    }

    /**
     * Met à jour la barre de progression
     */
    private void updateProgress() {
        if (questions == null || questions.isEmpty()) {
            return;
        }

        double progress = (double) (currentQuestionIndex + 1) / questions.size();
        progressBar.setProgress(progress);

        int percentage = (int) (progress * 100);
        progressLabel.setText(percentage + "%");
    }

    /**
     * Met à jour l'état des boutons de navigation
     */
    private void updateNavigationButtons() {
        previousButton.setDisable(currentQuestionIndex == 0);

        boolean isLastQuestion = currentQuestionIndex == questions.size() - 1;
        nextButton.setVisible(!isLastQuestion);
        nextButton.setManaged(!isLastQuestion);
        submitButton.setVisible(isLastQuestion);
        submitButton.setManaged(isLastQuestion);
    }

    /**
     * Question précédente
     */
    @FXML
    public void previousQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            displayQuestion();
            updateProgress();
            updateNavigationButtons();
        }
    }

    /**
     * Question suivante
     */
    @FXML
    public void nextQuestion() {
        if (currentQuestionIndex < questions.size() - 1) {
            currentQuestionIndex++;
            displayQuestion();
            updateProgress();
            updateNavigationButtons();
        }
    }

    /**
     * Soumettre le test - MODIFIÉ AVEC ENREGISTREMENT DU RÉSULTAT
     */
    @FXML
    public void submitTest() {
        // Vérifier que toutes les questions ont été répondues
        int unansweredCount = questions.size() - answers.size();

        if (unansweredCount > 0) {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Test incomplet");
            alert.setHeaderText(unansweredCount + " question(s) non répondue(s)");
            alert.setContentText("Voulez-vous soumettre le test quand même?");

            if (alert.showAndWait().get() != ButtonType.OK) {
                return;
            }
        }

        // 🆕 CALCUL DU SCORE
        int scoreTotal = calculerScoreTotal();

        System.out.println("📊 Score calculé: " + scoreTotal + " points");
        System.out.println("📝 Questions répondues: " + answers.size() + "/" + questions.size());

        // 🆕 ENREGISTRER LE RÉSULTAT
        enregistrerEtAfficherResultat(scoreTotal);
    }

    /**
     * 🆕 Calculer le score total selon les réponses
     */
    private int calculerScoreTotal() {
        int scoreTotal = 0;
        ReponseScoredao reponseScoreDao = new ReponseScoredao();

        System.out.println("\n🧮 CALCUL DU SCORE:");
        System.out.println("═══════════════════════════════");

        // Pour chaque réponse donnée par l'utilisateur
        for (Map.Entry<Integer, String> entry : answers.entrySet()) {
            int questionId = entry.getKey();      // ID de la question
            String reponse = entry.getValue();    // Réponse choisie

            // ✅ RÉCUPÉRER les points pour cette réponse spécifique
            int points = reponseScoreDao.getPointsForAnswer(questionId, reponse);

            scoreTotal += points;
        }

        System.out.println("═══════════════════════════════");
        System.out.println("🎯 SCORE TOTAL: " + scoreTotal + " points");
        System.out.println("═══════════════════════════════\n");

        return scoreTotal;
    }
    /**
     * 🆕 Enregistrer le résultat et afficher l'interprétation
     */
    private void enregistrerEtAfficherResultat(int scoreTotal) {
        try {
            System.out.println("💾 Enregistrement du résultat...");

            // 1. Créer l'objet Resultat
            Resultat resultat = new Resultat(userId, currentTest.getId(), scoreTotal);

            // 2. Enregistrer dans la BDD
            int resultatId = resultatDao.enregistrerResultat(resultat);

            if (resultatId > 0) {
                System.out.println("✅ Résultat enregistré avec ID: " + resultatId);

                // 3. Récupérer l'interprétation selon le score
                Interpretation interpretation = resultatDao.getInterpretation(
                        currentTest.getId(),
                        scoreTotal
                );

                if (interpretation != null) {
                    System.out.println("✅ Interprétation trouvée: " + interpretation.getTitre());
                } else {
                    System.out.println("⚠️ Aucune interprétation trouvée pour ce score");
                }

                // 4. Afficher la page de résultat
                afficherPageResultat(scoreTotal, interpretation);

            } else {
                System.err.println("❌ Erreur lors de l'enregistrement du résultat");

                // Afficher quand même le résultat sans l'enregistrer
                showAlert("Avertissement",
                        "Le résultat n'a pas pu être enregistré, mais vous pouvez voir votre score.",
                        Alert.AlertType.WARNING);

                afficherPageResultat(scoreTotal, null);
            }

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();

            showAlert("Erreur",
                    "Une erreur est survenue lors de l'enregistrement du résultat.",
                    Alert.AlertType.ERROR);
        }
    }

    /**
     * 🆕 Afficher la page de résultat avec l'interprétation
     */
    /**
     * 🎨 Afficher un popup moderne et élégant pour les résultats
     */
    private void afficherPageResultat(int scoreTotal, Interpretation interpretation) {
        System.out.println("🎉 Affichage du résultat en popup élégant...");

        // Créer une nouvelle fenêtre (Stage)
        Stage resultStage = new Stage();
        resultStage.setTitle("✅ Résultats du Test");
        resultStage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        // Container principal
        VBox mainContainer = new VBox(0);
        mainContainer.setStyle("-fx-background-color: #f8f5f2;");

        // ========== HEADER AVEC DÉGRADÉ ==========
        StackPane header = new StackPane();
        header.setPrefHeight(150);
        header.setStyle("-fx-background-color: linear-gradient(to right, #285921, #2e7d32); -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.3), 10, 0, 0, 5);");

        VBox headerContent = new VBox(10);
        headerContent.setAlignment(Pos.CENTER);
        headerContent.setPadding(new Insets(20));

        Label successIcon = new Label("🎉");
        successIcon.setStyle("-fx-font-size: 48px;");

        Label headerTitle = new Label("Félicitations !");
        headerTitle.setStyle("-fx-font-size: 32px; -fx-font-weight: bold; -fx-text-fill: white;");

        Label headerSubtitle = new Label("Vous avez terminé le test : " + currentTest.getTitre());
        headerSubtitle.setStyle("-fx-font-size: 14px; -fx-text-fill: rgba(255,255,255,0.9);");
        headerSubtitle.setWrapText(true);
        headerSubtitle.setAlignment(Pos.CENTER);

        headerContent.getChildren().addAll(successIcon, headerTitle, headerSubtitle);
        header.getChildren().add(headerContent);

        // ========== ZONE SCORE ==========
        VBox scoreSection = new VBox(15);
        scoreSection.setPadding(new Insets(30, 40, 30, 40));
        scoreSection.setAlignment(Pos.CENTER);
        scoreSection.setStyle("-fx-background-color: white; -fx-background-radius: 15; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 10, 0, 0, 3);");
        VBox.setMargin(scoreSection, new Insets(30, 40, 20, 40));

        Label scoreLabel = new Label("VOTRE SCORE");
        scoreLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #666; -fx-letter-spacing: 2px;");

        // Score géant avec cercle
        StackPane scoreCircle = new StackPane();
        scoreCircle.setPrefSize(160, 160);
        scoreCircle.setStyle("-fx-background-color: linear-gradient(to bottom right, #e8f5e9, #c8e6c9); -fx-background-radius: 80; -fx-border-color: #2e7d32; -fx-border-width: 4; -fx-border-radius: 80;");

        Label scoreValue = new Label(String.valueOf(scoreTotal));
        scoreValue.setStyle("-fx-font-size: 64px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        Label pointsLabel = new Label("points");
        pointsLabel.setStyle("-fx-font-size: 16px; -fx-text-fill: #666;");

        VBox scoreBox = new VBox(5);
        scoreBox.setAlignment(Pos.CENTER);
        scoreBox.getChildren().addAll(scoreValue, pointsLabel);

        scoreCircle.getChildren().add(scoreBox);

        // Stats
        HBox statsBox = new HBox(30);
        statsBox.setAlignment(Pos.CENTER);
        statsBox.setPadding(new Insets(15, 0, 0, 0));

        VBox questionsBox = createStatBox("📝", answers.size() + "/" + questions.size(), "Questions répondues");
        VBox completionBox = createStatBox("✅", Math.round((float)answers.size() / questions.size() * 100) + "%", "Taux de complétion");

        statsBox.getChildren().addAll(questionsBox, completionBox);

        scoreSection.getChildren().addAll(scoreLabel, scoreCircle, statsBox);

        // ========== ZONE INTERPRÉTATION ==========
        VBox interpretationSection = null;

        if (interpretation != null) {
            interpretationSection = new VBox(15);
            interpretationSection.setPadding(new Insets(25));
            interpretationSection.setStyle("-fx-background-color: white; -fx-background-radius: 15; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 10, 0, 0, 3);");
            VBox.setMargin(interpretationSection, new Insets(0, 40, 20, 40));

            // Titre de l'interprétation
            HBox interpHeader = new HBox(10);
            interpHeader.setAlignment(Pos.CENTER_LEFT);

            Label interpIcon = new Label("🎯");
            interpIcon.setStyle("-fx-font-size: 24px;");

            Label interpTitle = new Label(interpretation.getTitre());
            interpTitle.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #285921;");

            interpHeader.getChildren().addAll(interpIcon, interpTitle);

            // Description
            VBox descBox = new VBox(8);
            descBox.setPadding(new Insets(10, 0, 0, 0));

            Label descTitle = new Label("📝 Description");
            descTitle.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #666;");

            Label descText = new Label(interpretation.getDescription());
            descText.setStyle("-fx-font-size: 14px; -fx-text-fill: #333; -fx-line-spacing: 5px;");
            descText.setWrapText(true);

            descBox.getChildren().addAll(descTitle, descText);

            // Recommandations
            VBox conseilsBox = null;
            if (interpretation.getConseils() != null && !interpretation.getConseils().isEmpty()) {
                conseilsBox = new VBox(8);
                conseilsBox.setPadding(new Insets(10, 0, 0, 0));

                Label conseilsTitle = new Label("💡 Recommandations");
                conseilsTitle.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #666;");

                Label conseilsText = new Label(interpretation.getConseils());
                conseilsText.setStyle("-fx-font-size: 14px; -fx-text-fill: #333; -fx-line-spacing: 5px;");
                conseilsText.setWrapText(true);

                conseilsBox.getChildren().addAll(conseilsTitle, conseilsText);
            }

            interpretationSection.getChildren().addAll(interpHeader, new Separator(), descBox);
            if (conseilsBox != null) {
                interpretationSection.getChildren().addAll(new Separator(), conseilsBox);
            }
        }

        // ========== BOUTONS ==========
        HBox buttonsBox = new HBox(15);
        buttonsBox.setAlignment(Pos.CENTER);
        buttonsBox.setPadding(new Insets(20, 40, 30, 40));

        Button closeButton = new Button("Fermer");
        closeButton.setStyle("-fx-background-color: #757575; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;");
        closeButton.setOnAction(e -> {
            resultStage.close();
            // Fermer aussi la fenêtre du test
            try {
                Stage stage = (Stage) questionContainer.getScene().getWindow();
                stage.close();
            } catch (Exception ex) {
                ex.printStackTrace();
            }
        });

        Button homeButton = new Button("🏠 Retour à l'accueil");
        homeButton.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;");
        homeButton.setOnAction(e -> {
            resultStage.close();
            returnToHome();
        });

        // Effets hover
        closeButton.setOnMouseEntered(e -> closeButton.setStyle("-fx-background-color: #616161; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));
        closeButton.setOnMouseExited(e -> closeButton.setStyle("-fx-background-color: #757575; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));

        homeButton.setOnMouseEntered(e -> homeButton.setStyle("-fx-background-color: #1b5e20; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));
        homeButton.setOnMouseExited(e -> homeButton.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));

        buttonsBox.getChildren().addAll(homeButton, closeButton);

        // ========== ASSEMBLAGE ==========
        ScrollPane scrollPane = new ScrollPane();
        scrollPane.setFitToWidth(true);
        scrollPane.setStyle("-fx-background: #f8f5f2; -fx-background-color: #f8f5f2;");

        VBox contentBox = new VBox();
        contentBox.getChildren().add(scoreSection);
        if (interpretationSection != null) {
            contentBox.getChildren().add(interpretationSection);
        }

        scrollPane.setContent(contentBox);

        mainContainer.getChildren().addAll(header, scrollPane, buttonsBox);

        // ========== SCÈNE ==========
        Scene scene = new Scene(mainContainer, 650, 750);
        resultStage.setScene(scene);
        resultStage.setResizable(false);
        resultStage.show();

        System.out.println("✅ Popup élégant affiché!");
    }

    /**
     * 🎨 Créer une petite carte de statistique
     */
    private VBox createStatBox(String icon, String value, String label) {
        VBox box = new VBox(5);
        box.setAlignment(Pos.CENTER);

        Label iconLabel = new Label(icon);
        iconLabel.setStyle("-fx-font-size: 24px;");

        Label valueLabel = new Label(value);
        valueLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        Label textLabel = new Label(label);
        textLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #666;");

        box.getChildren().addAll(iconLabel, valueLabel, textLabel);
        return box;
    }
    /**
     * Retourne à l'interface principale
     */
    @FXML
    public void returnToHome() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/TestPsychologique/views/UserInterface.fxml"));
            Parent root = loader.load();

            Scene scene = new Scene(root);
            Stage stage = (Stage) questionContainer.getScene().getWindow();
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI - Interface Utilisateur");

        } catch (Exception e) {
            System.err.println("Erreur lors du retour à l'accueil: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Affiche une alerte
     */
    private void showAlert(String title, String content, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
}