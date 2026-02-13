package TestPsychologique.controllers;

import TestPsychologique.dao.Testdao;
import TestPsychologique.models.Test;
import javafx.animation.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.util.Callback;
import javafx.util.Duration;

import java.net.URL;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;

public class TestController implements Initializable {
    @FXML private VBox formulaireCard;

    @FXML private HBox testFilterCard;
    @FXML private Label formTitle, lblTotalTests;
    @FXML private Button btnNouveauTest;
    @FXML private TextField txtNom, txtRecherche, txtDuree;
    @FXML private TextArea txtDescription;
    @FXML private ComboBox<String> cmbCategorie, cmbStatus;
    @FXML private TableView<Test> tableTests;
    @FXML private TableColumn<Test, Integer> colId;
    @FXML private TableColumn<Test, String> colNom, colDescription, colCategorie, colStatus;
    @FXML private TableColumn<Test, Integer> colDuree;
    @FXML private TableColumn<Test, Void> colActions;

    private ObservableList<Test> testsList = FXCollections.observableArrayList();
    private Testdao testdao = new Testdao();
    private Test selectedTest = null;
    private boolean isFormVisible = false;

    @Override
    public void initialize(URL location, ResourceBundle resources) {
        setupTable();
        loadTests();
        setupSearchFilter();

        // Set default values for ComboBoxes
        cmbCategorie.setValue("Personnalité");
        cmbStatus.setValue("actif");
    }

    private void setupTable() {
        // Setup action column with buttons
        colActions.setCellFactory(new Callback<TableColumn<Test, Void>, TableCell<Test, Void>>() {
            @Override
            public TableCell<Test, Void> call(TableColumn<Test, Void> param) {
                return new TableCell<Test, Void>() {

                    private final Button btnGererQuestions = createActionButton("📋 Questions", "#2196f3");
                    private final Button btnModifier = createActionButton("✏️ Modifier", "#fbbf24");
                    private final Button btnSupprimer = createActionButton("🗑️ Supprimer", "#ef4444");

                    private final HBox actionBox = new HBox(8, btnGererQuestions, btnModifier, btnSupprimer);

                    {
                        actionBox.setAlignment(Pos.CENTER);

                        btnGererQuestions.setOnAction(event -> {
                            Test test = getTableView().getItems().get(getIndex());
                            handleGererQuestions(test);
                        });

                        btnModifier.setOnAction(event -> {
                            Test test = getTableView().getItems().get(getIndex());
                            handleModifier(test);
                        });

                        btnSupprimer.setOnAction(event -> {
                            Test test = getTableView().getItems().get(getIndex());
                            handleSupprimer(test);
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
                        "-fx-font-size: 11px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-padding: 6 12; " +
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
    @FXML
    private void handleDashboardClick() {
        handleBack();
    }

    @FXML
    private void handleTestsClick() {
        // توا أصلاً إنت في tests، تنجم تخليها فارغة
    }

    private void loadTests() {
        testsList.clear();
        List<Test> tests = testdao.getAllTests();
        testsList.addAll(tests);
        tableTests.setItems(testsList);
        updateTestCount();
    }

    private void setupSearchFilter() {
        txtRecherche.textProperty().addListener((observable, oldValue, newValue) -> {
            if (newValue == null || newValue.isEmpty()) {
                tableTests.setItems(testsList);
            } else {
                ObservableList<Test> filteredList = FXCollections.observableArrayList();
                for (Test test : testsList) {
                    if (test.getTitre().toLowerCase().contains(newValue.toLowerCase()) ||
                            test.getDescription().toLowerCase().contains(newValue.toLowerCase())) {

                        filteredList.add(test);
                    }
                }
                tableTests.setItems(filteredList);
            }
            updateTestCount();
        });
    }

    private void updateTestCount() {
        lblTotalTests.setText(tableTests.getItems().size() + " test(s)");
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

            btnNouveauTest.setText("✖️ Fermer");
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

            btnNouveauTest.setText("➕ Nouveau Test");
            handleReset();
        }
    }

    @FXML
    private void handleSaveOrUpdate() {
        // Validation
        if (txtNom.getText().trim().isEmpty() || txtDescription.getText().trim().isEmpty()) {
            showAlert(Alert.AlertType.ERROR, "Erreur de Validation",
                    "Veuillez remplir tous les champs obligatoires (Nom et Description)");
            return;
        }

        try {
            if (selectedTest == null) {
                // Ajouter nouveau test
                Test newTest = new Test();
                newTest.setTitre(txtNom.getText().trim());

                newTest.setDescription(txtDescription.getText().trim());
                newTest.setCategorie(cmbCategorie.getValue());
                newTest.setDuree(txtDuree.getText().isEmpty() ? 0 : Integer.parseInt(txtDuree.getText()));
                newTest.setStatus(cmbStatus.getValue());

                testdao.ajouterTest(newTest);
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Test ajouté avec succès!");
            } else {
                // Modifier test existant
                selectedTest.setTitre(txtNom.getText().trim());

                selectedTest.setDescription(txtDescription.getText().trim());
                selectedTest.setCategorie(cmbCategorie.getValue());
                selectedTest.setDuree(txtDuree.getText().isEmpty() ? 0 : Integer.parseInt(txtDuree.getText()));
                selectedTest.setStatus(cmbStatus.getValue());

                testdao.modifierTest(selectedTest);
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Test modifié avec succès!");
            }

            loadTests();
            toggleFormulaire();

        } catch (NumberFormatException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "La durée doit être un nombre valide");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de l'enregistrement: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    private void handleReset() {
        txtNom.clear();
        txtDescription.clear();
        txtDuree.clear();
        cmbCategorie.setValue("Personnalité");
        cmbStatus.setValue("actif");
        selectedTest = null;
        formTitle.setText("Ajouter un Nouveau Test");
    }

    private void handleGererQuestions(Test test) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/TestPsychologique/views/QuestionsView.fxml"));
            Parent root = loader.load();

            // Pass the selected test to QuestionController
            QuestionController controller = loader.getController();
            controller.setFilteredTest(test);

            Stage stage = (Stage) tableTests.getScene().getWindow();
            Scene scene = new Scene(root);
            stage.setScene(scene);
            stage.show();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de charger la vue des questions");
            e.printStackTrace();
        }
    }

    private void handleModifier(Test test) {
        selectedTest = test;

        txtNom.setText(test.getTitre());

        txtDescription.setText(test.getDescription());
        cmbCategorie.setValue(test.getCategorie());
        txtDuree.setText(String.valueOf(test.getDuree()));
        cmbStatus.setValue(test.getStatus());

        formTitle.setText("Modifier le Test");

        if (!isFormVisible) {
            toggleFormulaire();
        }
    }

    private void handleSupprimer(Test test) {
        Alert confirmation = new Alert(Alert.AlertType.CONFIRMATION);
        confirmation.setTitle("Confirmation de Suppression");
        confirmation.setHeaderText("Supprimer le test: " + test.getTitre());
        confirmation.setContentText("Êtes-vous sûr de vouloir supprimer ce test?\nToutes les questions associées seront également supprimées.");

        Optional<ButtonType> result = confirmation.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                testdao.supprimerTest(test.getId());
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Test supprimé avec succès!");
                loadTests();
            } catch (Exception e) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la suppression: " + e.getMessage());
                e.printStackTrace();
            }
        }
    }

    @FXML
    private void handleBack() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/TestPsychologique/views/DashboardView.fxml"));
            Parent root = loader.load();

            Stage stage = (Stage) tableTests.getScene().getWindow();
            Scene scene = new Scene(root, 1200, 700);
            stage.setScene(scene);
            stage.show();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de retourner au dashboard");
            e.printStackTrace();
        }
    }

    private void showAlert(Alert.AlertType type, String title, String content) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
}
