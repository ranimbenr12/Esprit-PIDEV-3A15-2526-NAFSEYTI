package tn.esprit.nafseyti.controllers;


import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import tn.esprit.nafseyti.models.Interpretation;
import tn.esprit.nafseyti.models.Question;
import tn.esprit.nafseyti.models.Resultat;
import tn.esprit.nafseyti.models.Test;
import tn.esprit.nafseyti.utils.Questiondao;
import tn.esprit.nafseyti.utils.ReponseScoredao;
import tn.esprit.nafseyti.utils.Resultatdao;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ListTestsfrontController {

    @FXML private Label testNameLabel;
    @FXML private Label testDescriptionLabel;
    @FXML private Label questionNumberLabel;
    @FXML private ProgressBar progressBar;
    @FXML private Label progressLabel;
    @FXML private VBox questionContainer;
    @FXML private Button previousButton;
    @FXML private Button nextButton;
    @FXML private Button submitButton;

    private Test currentTest;
    private List<Question> questions;
    private int currentQuestionIndex = 0;
    private Map<Integer, String> answers;
    private Questiondao questionDao;
    private Resultatdao resultatDao;

    private int userId = 1; // TODO: Remplacer par SessionManager

    public ListTestsfrontController() {
        questionDao = new Questiondao();
        resultatDao = new Resultatdao();
        answers = new HashMap<>();
    }

    public void initTest(Test test) {
        this.currentTest = test;
        this.currentQuestionIndex = 0;

        loadQuestions();

        if (testNameLabel != null) testNameLabel.setText(test.getTitre());
        if (testDescriptionLabel != null && test.getDescription() != null)
            testDescriptionLabel.setText(test.getDescription());

        if (questions != null && !questions.isEmpty()) {
            displayQuestion();
            updateProgress();
            updateNavigationButtons();
        } else {
            showNoQuestionsMessage();
        }
    }

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

        previousButton.setDisable(true);
        nextButton.setDisable(true);
        submitButton.setDisable(true);
    }

    private void displayQuestion() {
        if (questions == null || questions.isEmpty() || currentQuestionIndex >= questions.size()) return;

        questionContainer.getChildren().clear();
        Question question = questions.get(currentQuestionIndex);

        questionNumberLabel.setText("Question " + (currentQuestionIndex + 1) + " sur " + questions.size());

        Label questionText = new Label(question.getTexte());
        questionText.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #285921; -fx-padding: 0 0 20 0;");
        questionText.setWrapText(true);
        questionContainer.getChildren().add(questionText);

        String typeQuestion = question.getTypeQuestion();
        if (typeQuestion == null || typeQuestion.isEmpty()) typeQuestion = "qcm";
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
                System.out.println("⚠️ Type non reconnu: " + typeQuestion + ". Affichage en QCM.");
                displayQCMQuestion(question);
                break;
        }
    }

    private void displayQCMQuestion(Question question) {
        VBox answersBox = new VBox();
        answersBox.setSpacing(15);
        answersBox.setPadding(new Insets(10, 0, 20, 0));

        String reponsesPossibles = question.getReponsesPossibles();

        if (reponsesPossibles != null && !reponsesPossibles.isEmpty()) {
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

                    radioButton.selectedProperty().addListener((obs, oldVal, newVal) -> {
                        if (newVal) {
                            radioButton.setStyle("-fx-font-size: 15px; -fx-text-fill: #285921; -fx-font-weight: bold; -fx-padding: 12; -fx-background-color: #e8f5e9; -fx-background-radius: 5; -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 5;");
                        } else {
                            radioButton.setStyle("-fx-font-size: 15px; -fx-text-fill: #333; -fx-padding: 12; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");
                        }
                    });

                    String previousAnswer = answers.get(question.getId());
                    if (previousAnswer != null && previousAnswer.equals(optionLetter)) {
                        radioButton.setSelected(true);
                    }

                    radioButton.setOnAction(e -> answers.put(question.getId(), (String) radioButton.getUserData()));
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

    private void displayVraiFauxQuestion(Question question) {
        VBox answersBox = new VBox();
        answersBox.setSpacing(15);
        answersBox.setPadding(new Insets(10, 0, 20, 0));

        ToggleGroup toggleGroup = new ToggleGroup();

        RadioButton vraiButton = new RadioButton("✓ Vrai");
        vraiButton.setToggleGroup(toggleGroup);
        vraiButton.setUserData("Vrai");
        vraiButton.setStyle("-fx-font-size: 16px; -fx-text-fill: #333; -fx-padding: 15; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");

        RadioButton fauxButton = new RadioButton("✗ Faux");
        fauxButton.setToggleGroup(toggleGroup);
        fauxButton.setUserData("Faux");
        fauxButton.setStyle("-fx-font-size: 16px; -fx-text-fill: #333; -fx-padding: 15; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");

        for (RadioButton rb : new RadioButton[]{vraiButton, fauxButton}) {
            rb.selectedProperty().addListener((obs, oldVal, newVal) -> {
                if (newVal) {
                    rb.setStyle("-fx-font-size: 16px; -fx-text-fill: #285921; -fx-font-weight: bold; -fx-padding: 15; -fx-background-color: #e8f5e9; -fx-background-radius: 5; -fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 5;");
                } else {
                    rb.setStyle("-fx-font-size: 16px; -fx-text-fill: #333; -fx-padding: 15; -fx-background-color: white; -fx-background-radius: 5; -fx-border-color: #e0e0e0; -fx-border-width: 1; -fx-border-radius: 5;");
                }
            });
            rb.setOnAction(e -> answers.put(question.getId(), (String) rb.getUserData()));
        }

        String previousAnswer = answers.get(question.getId());
        if (previousAnswer != null) {
            if (previousAnswer.equals("Vrai")) vraiButton.setSelected(true);
            else if (previousAnswer.equals("Faux")) fauxButton.setSelected(true);
        }

        answersBox.getChildren().addAll(vraiButton, fauxButton);
        questionContainer.getChildren().add(answersBox);
    }

    /**
     * 🧠 Affiche une question à texte libre AVEC bouton d'analyse émotionnelle
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
        textArea.setStyle("-fx-font-size: 14px; -fx-padding: 15; -fx-border-color: #e0e0e0; " +
                "-fx-border-width: 1; -fx-border-radius: 5; -fx-background-radius: 5;");

        textArea.focusedProperty().addListener((obs, oldVal, newVal) -> {
            if (newVal) {
                textArea.setStyle("-fx-font-size: 14px; -fx-padding: 15; -fx-border-color: #2e7d32; " +
                        "-fx-border-width: 2; -fx-border-radius: 5; -fx-background-radius: 5;");
            } else {
                textArea.setStyle("-fx-font-size: 14px; -fx-padding: 15; -fx-border-color: #e0e0e0; " +
                        "-fx-border-width: 1; -fx-border-radius: 5; -fx-background-radius: 5;");
            }
        });

        String previousAnswer = answers.get(question.getId());
        if (previousAnswer != null) textArea.setText(previousAnswer);

        textArea.textProperty().addListener((obs, oldVal, newVal) -> answers.put(question.getId(), newVal));

        // Compteur de caractères
        Label charCount = new Label("0 caractères");
        charCount.setStyle("-fx-font-size: 12px; -fx-text-fill: #999;");
        textArea.textProperty().addListener((obs, oldVal, newVal) -> {
            int count = newVal.length();
            charCount.setText(count + " caractère" + (count > 1 ? "s" : ""));
        });

        // 🧠 Label résultat analyse (caché au départ)
        Label analyseResult = new Label();
        analyseResult.setWrapText(true);
        analyseResult.setVisible(false);
        analyseResult.setManaged(false);
        analyseResult.setStyle("-fx-font-size: 13px; -fx-text-fill: #285921; " +
                "-fx-background-color: #e8f5e9; -fx-padding: 12; -fx-background-radius: 8;");

        // 🧠 Bouton Analyser
        Button analyserBtn = new Button("🧠 Analyser mon écriture");
        analyserBtn.setStyle("-fx-background-color: #1565c0; -fx-text-fill: white; -fx-font-size: 12px; " +
                "-fx-font-weight: bold; -fx-padding: 8 18; -fx-background-radius: 15; -fx-cursor: hand;");

        analyserBtn.setOnAction(e -> {
            final String texte = textArea.getText().trim();
            if (texte.length() < 10) {
                analyseResult.setText("⚠️ Veuillez écrire au moins quelques mots pour analyser.");
                analyseResult.setStyle("-fx-font-size: 13px; -fx-text-fill: #e65100; " +
                        "-fx-background-color: #fff3e0; -fx-padding: 12; -fx-background-radius: 8;");
                analyseResult.setVisible(true);
                analyseResult.setManaged(true);
            } else {
                analyserBtn.setText("⏳ Analyse en cours...");
                analyserBtn.setDisable(true);

                // Thread séparé pour ne pas bloquer l'UI
                new Thread(() -> {

                    javafx.application.Platform.runLater(() -> {

                        analyseResult.setStyle("-fx-font-size: 13px; -fx-text-fill: #285921; " +
                                "-fx-background-color: #e8f5e9; -fx-padding: 12; -fx-background-radius: 8;");
                        analyseResult.setVisible(true);
                        analyseResult.setManaged(true);
                        analyserBtn.setText("🔄 Ré-analyser");
                        analyserBtn.setDisable(false);
                    });
                }).start();
            }
        });

        answersBox.getChildren().addAll(instruction, textArea, charCount, analyserBtn, analyseResult);
        questionContainer.getChildren().add(answersBox);
    }

    private void updateProgress() {
        if (questions == null || questions.isEmpty()) return;

        double progress = (double) (currentQuestionIndex + 1) / questions.size();
        progressBar.setProgress(progress);
        progressLabel.setText((int) (progress * 100) + "%");
    }

    private void updateNavigationButtons() {
        previousButton.setDisable(currentQuestionIndex == 0);

        boolean isLastQuestion = currentQuestionIndex == questions.size() - 1;
        nextButton.setVisible(!isLastQuestion);
        nextButton.setManaged(!isLastQuestion);
        submitButton.setVisible(isLastQuestion);
        submitButton.setManaged(isLastQuestion);
    }

    @FXML
    public void previousQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            displayQuestion();
            updateProgress();
            updateNavigationButtons();
        }
    }

    @FXML
    public void nextQuestion() {
        if (currentQuestionIndex < questions.size() - 1) {
            currentQuestionIndex++;
            displayQuestion();
            updateProgress();
            updateNavigationButtons();
        }
    }

    @FXML
    public void submitTest() {
        int unansweredCount = questions.size() - answers.size();

        if (unansweredCount > 0) {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Test incomplet");
            alert.setHeaderText(unansweredCount + " question(s) non répondue(s)");
            alert.setContentText("Voulez-vous soumettre le test quand même?");
            if (alert.showAndWait().get() != ButtonType.OK) return;
        }

        int scoreTotal = calculerScoreTotal();
        System.out.println("📊 Score calculé: " + scoreTotal + " points");
        System.out.println("📝 Questions répondues: " + answers.size() + "/" + questions.size());

        enregistrerEtAfficherResultat(scoreTotal);
    }

    private int calculerScoreTotal() {
        int scoreTotal = 0;
        ReponseScoredao reponseScoreDao = new ReponseScoredao();

        System.out.println("\n🧮 CALCUL DU SCORE:");
        System.out.println("═══════════════════════════════");

        for (Map.Entry<Integer, String> entry : answers.entrySet()) {
            int questionId = entry.getKey();
            String reponse = entry.getValue();
            int points = reponseScoreDao.getPointsForAnswer(questionId, reponse);
            scoreTotal += points;
        }

        System.out.println("🎯 SCORE TOTAL: " + scoreTotal + " points");
        System.out.println("═══════════════════════════════\n");

        return scoreTotal;
    }

    private void enregistrerEtAfficherResultat(int scoreTotal) {
        try {
            System.out.println("💾 Enregistrement du résultat...");

            Resultat resultat = new Resultat(userId, currentTest.getId(), scoreTotal);
            int resultatId = resultatDao.enregistrerResultat(resultat);

            if (resultatId > 0) {
                System.out.println("✅ Résultat enregistré avec ID: " + resultatId);

                Interpretation interpretation = resultatDao.getInterpretation(currentTest.getId(), scoreTotal);

                if (interpretation != null) System.out.println("✅ Interprétation trouvée: " + interpretation.getTitre());
                else System.out.println("⚠️ Aucune interprétation trouvée pour ce score");

                afficherPageResultat(scoreTotal, interpretation);

            } else {
                System.err.println("❌ Erreur lors de l'enregistrement du résultat");
                showAlert("Avertissement",
                        "Le résultat n'a pas pu être enregistré, mais vous pouvez voir votre score.",
                        Alert.AlertType.WARNING);
                afficherPageResultat(scoreTotal, null);
            }

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();
            showAlert("Erreur", "Une erreur est survenue lors de l'enregistrement du résultat.", Alert.AlertType.ERROR);
        }
    }

    private void afficherPageResultat(int scoreTotal, Interpretation interpretation) {
        System.out.println("🎉 Affichage du résultat en popup élégant...");

        Stage resultStage = new Stage();
        resultStage.setTitle("✅ Résultats du Test");
        resultStage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        VBox mainContainer = new VBox(0);
        mainContainer.setStyle("-fx-background-color: #f8f5f2;");

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

        VBox scoreSection = new VBox(15);
        scoreSection.setPadding(new Insets(30, 40, 30, 40));
        scoreSection.setAlignment(Pos.CENTER);
        scoreSection.setStyle("-fx-background-color: white; -fx-background-radius: 15; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 10, 0, 0, 3);");
        VBox.setMargin(scoreSection, new Insets(30, 40, 20, 40));

        Label scoreLabel = new Label("VOTRE SCORE");
        scoreLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #666; -fx-letter-spacing: 2px;");

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

        HBox statsBox = new HBox(30);
        statsBox.setAlignment(Pos.CENTER);
        statsBox.setPadding(new Insets(15, 0, 0, 0));

        VBox questionsBox = createStatBox("📝", answers.size() + "/" + questions.size(), "Questions répondues");
        VBox completionBox = createStatBox("✅", Math.round((float) answers.size() / questions.size() * 100) + "%", "Taux de complétion");
        statsBox.getChildren().addAll(questionsBox, completionBox);

        scoreSection.getChildren().addAll(scoreLabel, scoreCircle, statsBox);

        VBox interpretationSection = null;
        if (interpretation != null) {
            interpretationSection = new VBox(15);
            interpretationSection.setPadding(new Insets(25));
            interpretationSection.setStyle("-fx-background-color: white; -fx-background-radius: 15; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 10, 0, 0, 3);");
            VBox.setMargin(interpretationSection, new Insets(0, 40, 20, 40));

            HBox interpHeader = new HBox(10);
            interpHeader.setAlignment(Pos.CENTER_LEFT);

            Label interpIcon = new Label("🎯");
            interpIcon.setStyle("-fx-font-size: 24px;");

            Label interpTitle = new Label(interpretation.getTitre());
            interpTitle.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #285921;");
            interpHeader.getChildren().addAll(interpIcon, interpTitle);

            VBox descBox = new VBox(8);
            descBox.setPadding(new Insets(10, 0, 0, 0));

            Label descTitle = new Label("📝 Description");
            descTitle.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #666;");

            Label descText = new Label(interpretation.getDescription());
            descText.setStyle("-fx-font-size: 14px; -fx-text-fill: #333; -fx-line-spacing: 5px;");
            descText.setWrapText(true);
            descBox.getChildren().addAll(descTitle, descText);

            interpretationSection.getChildren().addAll(interpHeader, new Separator(), descBox);

            if (interpretation.getConseils() != null && !interpretation.getConseils().isEmpty()) {
                VBox conseilsBox = new VBox(8);
                conseilsBox.setPadding(new Insets(10, 0, 0, 0));

                Label conseilsTitle = new Label("💡 Recommandations");
                conseilsTitle.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #666;");

                Label conseilsText = new Label(interpretation.getConseils());
                conseilsText.setStyle("-fx-font-size: 14px; -fx-text-fill: #333; -fx-line-spacing: 5px;");
                conseilsText.setWrapText(true);
                conseilsBox.getChildren().addAll(conseilsTitle, conseilsText);

                interpretationSection.getChildren().addAll(new Separator(), conseilsBox);
            }
        }

        HBox buttonsBox = new HBox(15);
        buttonsBox.setAlignment(Pos.CENTER);
        buttonsBox.setPadding(new Insets(20, 40, 30, 40));

        Button closeButton = new Button("Fermer");
        closeButton.setStyle("-fx-background-color: #757575; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;");
        closeButton.setOnAction(e -> {
            resultStage.close();
            try {
                Stage stage = (Stage) questionContainer.getScene().getWindow();
                stage.close();
            } catch (Exception ex) {
                ex.printStackTrace();
            }
        });

        Button homeButton = new Button("🏠 Retour à l'accueil");
        homeButton.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;");
        homeButton.setOnAction(e -> { resultStage.close(); returnToHome(); });

        closeButton.setOnMouseEntered(e -> closeButton.setStyle("-fx-background-color: #616161; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));
        closeButton.setOnMouseExited(e -> closeButton.setStyle("-fx-background-color: #757575; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));
        homeButton.setOnMouseEntered(e -> homeButton.setStyle("-fx-background-color: #1b5e20; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));
        homeButton.setOnMouseExited(e -> homeButton.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 12 30; -fx-background-radius: 25; -fx-cursor: hand;"));

        buttonsBox.getChildren().addAll(homeButton, closeButton);

        ScrollPane scrollPane = new ScrollPane();
        scrollPane.setFitToWidth(true);
        scrollPane.setStyle("-fx-background: #f8f5f2; -fx-background-color: #f8f5f2;");

        VBox contentBox = new VBox();
        contentBox.getChildren().add(scoreSection);
        if (interpretationSection != null) contentBox.getChildren().add(interpretationSection);
        scrollPane.setContent(contentBox);

        mainContainer.getChildren().addAll(header, scrollPane, buttonsBox);

        Scene scene = new Scene(mainContainer, 650, 750);
        resultStage.setScene(scene);
        resultStage.setResizable(false);
        resultStage.show();

        System.out.println("✅ Popup élégant affiché!");
    }

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

    @FXML
    public void returnToHome() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlTeste/UserInterface.fxml"));
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

    private void showAlert(String title, String content, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
}