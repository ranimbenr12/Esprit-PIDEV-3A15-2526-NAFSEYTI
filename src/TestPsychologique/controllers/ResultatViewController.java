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

public class ResultatViewController {

    @FXML private Label testNameLabel;
    @FXML private Label scoreLabel;
    @FXML private Label questionsLabel;
    @FXML private Label interpretationTitreLabel;
    @FXML private Label interpretationDescLabel;
    @FXML private Label interpretationConseilsLabel;
    @FXML private VBox interpretationCard;
    @FXML private VBox conseilsBox;

    private Test currentTest;
    private int scoreTotal;
    private int scoreMax;

    /**
     * Affiche le résultat du test avec son interprétation
     */
    public void afficherResultat(Test test, int scoreTotal, int questionsRepondues, int totalQuestions, Interpretation interpretation) {
        this.currentTest = test;
        this.scoreTotal = scoreTotal;

        // Afficher le nom du test
        testNameLabel.setText(test.getTitre());

        // Calculer le score max (par exemple: nombre de questions × 5 points)
        this.scoreMax = totalQuestions * 5;
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
            // Pas d'interprétation disponible - afficher un message par défaut
            interpretationTitreLabel.setText("Résultat enregistré");
            interpretationDescLabel.setText("Votre score a été enregistré. Consultez votre psychologue pour une interprétation détaillée.");
            conseilsBox.setVisible(false);
            conseilsBox.setManaged(false);
        }
    }

    /**
     * Retourne à l'interface principale
     */
    @FXML
    private void returnToHome() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/views/UserInterface.fxml"));
            Parent root = loader.load();

            Scene scene = new Scene(root);
            Stage stage = (Stage) testNameLabel.getScene().getWindow();
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI - Interface Utilisateur");

        } catch (Exception e) {
            System.err.println("❌ Erreur lors du retour à l'accueil: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Refaire le même test
     */
    @FXML
    private void refaireTest() {
        try {
            // Fermer la fenêtre actuelle et retourner à la liste des tests
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/views/ListTests.fxml"));
            Parent root = loader.load();

            Scene scene = new Scene(root);
            Stage stage = (Stage) testNameLabel.getScene().getWindow();
            stage.setScene(scene);
            stage.setTitle("Tests Disponibles");

        } catch (Exception e) {
            System.err.println("❌ Erreur lors du rechargement: " + e.getMessage());
            e.printStackTrace();
        }
    }
}