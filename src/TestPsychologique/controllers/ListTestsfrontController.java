package TestPsychologique.controllers;

import TestPsychologique.dao.Questiondao;
import TestPsychologique.models.Question;
import TestPsychologique.models.Test;
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

    public ListTestsfrontController() {
        questionDao = new Questiondao();
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
     * Soumettre le test
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

        // Afficher un résumé
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Test terminé");
        alert.setHeaderText("Félicitations! 🎉");
        alert.setContentText("Vous avez répondu à " + answers.size() + " questions sur " + questions.size() + ".\n\nVos résultats seront bientôt disponibles.");
        alert.showAndWait();

        // Retourner à l'interface principale
        returnToHome();
    }

    /**
     * Retourne à l'interface principale
     */
    @FXML
    public void returnToHome() {
        try {
            File fxmlFile = new File("src/TestPsychologique/views/UserInterface.fxml");
            FXMLLoader loader = new FXMLLoader(fxmlFile.toURI().toURL());
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