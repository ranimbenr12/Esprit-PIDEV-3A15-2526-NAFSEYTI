package tn.esprit.gui;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.stage.Stage;

import java.io.IOException;

public class InterPrin {

    @FXML
    private Button btnAccueil;

    @FXML
    private Button btnRendezVous;

    @FXML
    private Button btnContenu;

    @FXML
    private Button btnTests;

    @FXML
    private Button btnEvenements;

    @FXML
    private Button btnSuivi;

    @FXML
    private Button btnFeedback;

    // ----------------------------
    // Méthodes pour les boutons
    // ----------------------------



    @FXML
    private void MonContenu(ActionEvent event) {
        System.out.println("Mon contenu cliqué !");
        loadFXML(event, "/MonContenu.fxml");
    }





    // ----------------------------
    // Méthode générique pour charger un FXML
    // ----------------------------
    private void loadFXML(ActionEvent event, String fxmlPath) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent root = loader.load();

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
