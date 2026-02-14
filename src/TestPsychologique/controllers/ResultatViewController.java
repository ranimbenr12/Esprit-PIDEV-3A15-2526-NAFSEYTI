package TestPsychologique.controllers;

import TestPsychologique.models.Test;
import TestPsychologique.models.Interpretation;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;

import java.io.File;

public class ResultatViewController {

    @FXML
    private Label testNameLabel;

    @FXML
    private Label scoreLabel;

    @FXML
    private Label questionsLabel;

    @FXML
    private Label interpretationTitreLabel;

    @FXML
    private Label interpretationDescLabel;

    @FXML
    private Label interpretationConseilsLabel;

    @FXML
    private VBox interpretationCard;

    @FXML
    private VBox conseilsBox;

    private Test currentTest;

    /**
     * Affiche le résultat du test avec son interprétation
     */
    public void afficherResultat(Test test, int scoreTotal, int questionsRepondues, int totalQuestions, Interpretation interpretation) {
        this.currentTest = test;

        // Afficher le nom du test
        testNameLabel.setText(test.getTitre());

        // Afficher le score
        int scoreMax = test.getScoreMax();
        if (scoreMax == 0) {
            // Calculer le score max basé sur les questions
            scoreMax = totalQuestions * 5; // estimation
        }
        scoreLabel.setText(scoreTotal + " / " + scoreMax);

        // Afficher les questions répondues
        questionsLabel.setText(questionsRepondues + " / " + totalQuestions);

        // Afficher l'interprétation
        if (interpretation != null) {
            interpretationTitreLabel.setText(interpretation.getTitre());
            interpretationDescLabel.setText(interpretation.getDescription());

            // Afficher les conseils s'ils existent
            if (interpretation.getConseils() != null && !interpretation.getConseils().isEmpty()) {
                interpretationConseilsLabel.setText(interpretation.getConseils());
                conseilsBox.setVisible(true);
                conseilsBox.setManaged(true);
            } else {
                conseilsBox.setVisible(false);
                conseilsBox.setManaged(false);
            }
        } else {
            // Pas d'interprétation disponible
            interpretationCard.setVisible(false);
            interpretationCard.setManaged(false);
        }
    }

    /**
     * Retourne à l'interface principale
     */
    @FXML
    private void returnToHome() {
        try {
            File fxmlFile = new File("src/TestPsychologique/views/UserInterface.fxml");
            FXMLLoader loader = new FXMLLoader(fxmlFile.toURI().toURL());
            Parent root = loader.load();

            Scene scene = new Scene(root);
            Stage stage = (Stage) testNameLabel.getScene().getWindow();
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI - Interface Utilisateur");

        } catch (Exception e) {
            System.err.println("Erreur lors du retour à l'accueil: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Refaire le même test
     */
    @FXML
    private void refaireTest() {
        try {
            File fxmlFile = new File("src/TestPsychologique/views/ListTestsfront.fxml");
            FXMLLoader loader = new FXMLLoader(fxmlFile.toURI().toURL());
            Parent root = loader.load();

            // Passer le test au contrôleur
            ListTestsfrontController controller = loader.getController();
            controller.initTest(currentTest);

            Scene scene = new Scene(root);
            Stage stage = (Stage) testNameLabel.getScene().getWindow();
            stage.setScene(scene);
            stage.setTitle("Test: " + currentTest.getTitre());

        } catch (Exception e) {
            System.err.println("Erreur lors du rechargement du test: " + e.getMessage());
            e.printStackTrace();
        }
    }
}