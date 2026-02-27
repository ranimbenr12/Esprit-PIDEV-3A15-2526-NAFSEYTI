package tn.esprit.nafseyti.controllers;

import javafx.animation.FadeTransition;
import javafx.animation.ParallelTransition;
import javafx.animation.TranslateTransition;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.util.Callback;
import javafx.util.Duration;
import tn.esprit.nafseyti.models.Question;
import tn.esprit.nafseyti.models.Test;
import tn.esprit.nafseyti.utils.Questiondao;
import tn.esprit.nafseyti.utils.Testdao;

import java.net.URL;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;

public class QuestionController implements Initializable {

    @FXML private VBox formulaireCard;
    @FXML
    private HBox testFilterCard;

    @FXML
    private ComboBox<String> comboTypeQuestion;
    @FXML private Label formTitle, lblTotalQuestions, lblTestInfo, lblSelectedTestName;
    @FXML private Button btnNouvelleQuestion;
    @FXML private TextField txtRecherche, txtPoints, txtOrdre;
    @FXML private TextArea txtTexte, txtReponsesPossibles;
    @FXML private ComboBox<String>  cmbStatus;
    @FXML private ComboBox<Test> cmbTestAssocie;
    @FXML private CheckBox chkObligatoire;
    @FXML private TableView<Question> tableQuestions;
    @FXML private TableColumn<Question, Integer> colId, colPoints, colOrdre;
    @FXML private TableColumn<Question, String> colTestNom, colTexte, colType, colStatus;
    @FXML private TableColumn<Question, Boolean> colObligatoire;
    @FXML private TableColumn<Question, Void> colActions;
    @FXML private TableView<Test> tableTests;

    private ObservableList<Question> questionsList = FXCollections.observableArrayList();
    private ObservableList<Test> testsList = FXCollections.observableArrayList();
    private Questiondao questionDao = new Questiondao();
    private Testdao testdao = new Testdao();
    private Question selectedQuestion = null;
    private Test filteredTest = null;
    private boolean isFormVisible = false;

    @Override
    public void initialize(URL location, ResourceBundle resources) {
        loadTests();
        setupTable();
        loadQuestions();
        setupSearchFilter();
        ObservableList<String> types = FXCollections.observableArrayList(
                "QCM", "Vrai/Faux", "Texte Libre", "Classement"
        );
        comboTypeQuestion.setItems(types);
        setupTable();
        // Set default values
        cmbStatus.setValue("actif");
        txtPoints.setText("1");
        txtOrdre.setText("1");
    }

    private void loadTests() {
        testsList.clear();
        List<Test> tests = testdao.getAllTests();
        testsList.addAll(tests);
        cmbTestAssocie.setItems(testsList);

        // Custom display for ComboBox
        cmbTestAssocie.setCellFactory(param -> new ListCell<Test>() {
            @Override
            protected void updateItem(Test test, boolean empty) {
                super.updateItem(test, empty);
                setText(empty || test == null ? null : test.getTitre());

            }
        });

        cmbTestAssocie.setButtonCell(new ListCell<Test>() {
            @Override
            protected void updateItem(Test test, boolean empty) {
                super.updateItem(test, empty);
                setText(empty || test == null ? null : test.getTitre());

            }
        });
    }

    public void setFilteredTest(Test test) {
        this.filteredTest = test;
        if (test != null) {
            testFilterCard.setManaged(true);
            testFilterCard.setVisible(true);
            lblSelectedTestName.setText(test.getTitre());
            lblTestInfo.setText("Questions pour: " + test.getTitre());

            cmbTestAssocie.setValue(test);
            loadQuestions();
        }
    }

    @FXML
    private void clearTestFilter() {
        this.filteredTest = null;
        testFilterCard.setManaged(false);
        testFilterCard.setVisible(false);
        lblTestInfo.setText("Créez et gérez vos questions");
        cmbTestAssocie.setValue(null);
        loadQuestions();
    }

    private void setupTable() {
        // Setup action column with buttons
        colActions.setCellFactory(new Callback<TableColumn<Question, Void>, TableCell<Question, Void>>() {
            @Override
            public TableCell<Question, Void> call(TableColumn<Question, Void> param) {
                return new TableCell<Question, Void>() {

                    private final Button btnModifier = createActionButton("✏️", "#fbbf24");
                    private final Button btnSupprimer = createActionButton("🗑️", "#ef4444");

                    private final HBox actionBox = new HBox(8, btnModifier, btnSupprimer);

                    {
                        actionBox.setAlignment(Pos.CENTER);

                        btnModifier.setOnAction(event -> {
                            Question question = getTableView().getItems().get(getIndex());
                            handleModifier(question);
                        });

                        btnSupprimer.setOnAction(event -> {
                            Question question = getTableView().getItems().get(getIndex());
                            handleSupprimer(question);
                        });
                    }

                    @Override
                    protected void updateItem(Void item, boolean empty) {
                        super.updateItem(item, empty);
                        setGraphic(empty ? null : actionBox);
                    }
                };
            }
        });
    }

    private Button createActionButton(String text, String bgColor) {
        Button btn = new Button(text);
        btn.setStyle(String.format(
                "-fx-background-color: %s; " +
                        "-fx-text-fill: white; " +
                        "-fx-font-size: 13px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-padding: 8 15; " +
                        "-fx-background-radius: 4; " +
                        "-fx-cursor: hand;",
                bgColor
        ));

        // Hover effect
        btn.setOnMouseEntered(e -> btn.setStyle(btn.getStyle() +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.3), 5, 0, 0, 2);" +
                "-fx-scale-x: 1.05; -fx-scale-y: 1.05;"));
        btn.setOnMouseExited(e -> btn.setStyle(btn.getStyle().replace(
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.3), 5, 0, 0, 2);-fx-scale-x: 1.05; -fx-scale-y: 1.05;", "")));

        return btn;
    }

    private void loadQuestions() {
        questionsList.clear();
        List<Question> questions;

        if (filteredTest != null) {
            questions = questionDao.getQuestionsByTestId(filteredTest.getId());
        } else {
            questions = questionDao.getAllQuestions();
        }

        questionsList.addAll(questions);
        tableQuestions.setItems(questionsList);
        updateQuestionCount();
    }

    private void setupSearchFilter() {
        txtRecherche.textProperty().addListener((observable, oldValue, newValue) -> {
            if (newValue == null || newValue.isEmpty()) {
                tableQuestions.setItems(questionsList);
            } else {
                ObservableList<Question> filteredList = FXCollections.observableArrayList();
                for (Question question : questionsList) {
                    if (question.getTexte().toLowerCase().contains(newValue.toLowerCase()) ||
                            (question.getTestNom() != null && question.getTestNom().toLowerCase().contains(newValue.toLowerCase()))) {
                        filteredList.add(question);
                    }
                }
                tableQuestions.setItems(filteredList);
            }
            updateQuestionCount();
        });
    }

    private void updateQuestionCount() {
        lblTotalQuestions.setText(tableQuestions.getItems().size() + " question(s)");
    }

    @FXML
    private void toggleFormulaire() {
        isFormVisible = !isFormVisible;

        if (isFormVisible) {
            formulaireCard.setManaged(true);
            formulaireCard.setVisible(true);

            // Slide down animation
            TranslateTransition slideDown = new TranslateTransition(Duration.millis(300), formulaireCard);
            slideDown.setFromY(-50);
            slideDown.setToY(0);

            FadeTransition fadeIn = new FadeTransition(Duration.millis(300), formulaireCard);
            fadeIn.setFromValue(0);
            fadeIn.setToValue(1);

            ParallelTransition parallel = new ParallelTransition(slideDown, fadeIn);
            parallel.play();

            btnNouvelleQuestion.setText("✖️ Fermer");
        } else {
            // Slide up animation
            TranslateTransition slideUp = new TranslateTransition(Duration.millis(200), formulaireCard);
            slideUp.setToY(-50);

            FadeTransition fadeOut = new FadeTransition(Duration.millis(200), formulaireCard);
            fadeOut.setToValue(0);

            ParallelTransition parallel = new ParallelTransition(slideUp, fadeOut);
            parallel.setOnFinished(e -> {
                formulaireCard.setManaged(false);
                formulaireCard.setVisible(false);
            });
            parallel.play();

            btnNouvelleQuestion.setText("➕ Nouvelle Question");
            handleReset();
        }
    }

    @FXML
    private void handleSaveOrUpdate() {
        // Validation
        if (cmbTestAssocie.getValue() == null || txtTexte.getText().trim().isEmpty() ||
                comboTypeQuestion.getValue() == null) {
            showAlert(Alert.AlertType.ERROR, "Erreur de Validation",
                    "Veuillez remplir tous les champs obligatoires (Test, Question, Type)");
            return;
        }

        try {
            if (selectedQuestion == null) {
                // Ajouter nouvelle question
                Question newQuestion = new Question();
                newQuestion.setTestId(cmbTestAssocie.getValue().getId());
                newQuestion.setTexte(txtTexte.getText().trim());
                newQuestion.setTypeQuestion(comboTypeQuestion.getValue());
                newQuestion.setReponsesPossibles(txtReponsesPossibles.getText().trim());
                newQuestion.setPoints(txtPoints.getText().isEmpty() ? 1 : Integer.parseInt(txtPoints.getText()));
                newQuestion.setOrdre(txtOrdre.getText().isEmpty() ? 1 : Integer.parseInt(txtOrdre.getText()));
                newQuestion.setObligatoire(chkObligatoire.isSelected());
                newQuestion.setStatus(cmbStatus.getValue());

                questionDao.ajouterQuestion(newQuestion);
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Question ajoutée avec succès!");
            } else {
                // Modifier question existante
                selectedQuestion.setTestId(cmbTestAssocie.getValue().getId());
                selectedQuestion.setTexte(txtTexte.getText().trim());
                selectedQuestion.setTypeQuestion(comboTypeQuestion.getValue());
                selectedQuestion.setReponsesPossibles(txtReponsesPossibles.getText().trim());
                selectedQuestion.setPoints(txtPoints.getText().isEmpty() ? 1 : Integer.parseInt(txtPoints.getText()));
                selectedQuestion.setOrdre(txtOrdre.getText().isEmpty() ? 1 : Integer.parseInt(txtOrdre.getText()));
                selectedQuestion.setObligatoire(chkObligatoire.isSelected());
                selectedQuestion.setStatus(cmbStatus.getValue());

                questionDao.modifierQuestion(selectedQuestion);
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Question modifiée avec succès!");
            }

            loadQuestions();
            toggleFormulaire();

        } catch (NumberFormatException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Les points et l'ordre doivent être des nombres valides");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de l'enregistrement: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    private void handleReset() {
        txtTexte.clear();
        txtReponsesPossibles.clear();
        txtPoints.setText("1");
        txtOrdre.setText("1");
        comboTypeQuestion.setValue(null);
        cmbStatus.setValue("actif");
        chkObligatoire.setSelected(true);

        if (filteredTest == null) {
            cmbTestAssocie.setValue(null);
        } else {
            cmbTestAssocie.setValue(filteredTest);
        }

        selectedQuestion = null;
        formTitle.setText("Ajouter une Nouvelle Question");
    }

    private void handleModifier(Question question) {
        selectedQuestion = question;

        // Find and set the test
        Test test = testsList.stream()
                .filter(t -> t.getId() == question.getTestId())
                .findFirst()
                .orElse(null);
        cmbTestAssocie.setValue(test);

        txtTexte.setText(question.getTexte());
        comboTypeQuestion.setValue(question.getTypeQuestion());
        txtReponsesPossibles.setText(question.getReponsesPossibles());
        txtPoints.setText(String.valueOf(question.getPoints()));
        txtOrdre.setText(String.valueOf(question.getOrdre()));
        chkObligatoire.setSelected(question.isObligatoire());
        cmbStatus.setValue(question.getStatus());

        formTitle.setText("Modifier la Question");

        if (!isFormVisible) {
            toggleFormulaire();
        }
    }

    private void handleSupprimer(Question question) {
        Alert confirmation = new Alert(Alert.AlertType.CONFIRMATION);
        confirmation.setTitle("Confirmation de Suppression");
        confirmation.setHeaderText("Supprimer la question");
        confirmation.setContentText("Êtes-vous sûr de vouloir supprimer cette question?");

        Optional<ButtonType> result = confirmation.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                questionDao.supprimerQuestion(question.getId());
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Question supprimée avec succès!");
                loadQuestions();
            } catch (Exception e) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la suppression: " + e.getMessage());
                e.printStackTrace();
            }
        }
    }

    @FXML
    private void handleBack() {
        Stage stage = (Stage) tableQuestions.getScene().getWindow();
        stage.close(); // ← Ferme simplement le popup
    }

    private void showAlert(Alert.AlertType type, String title, String content) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
}
