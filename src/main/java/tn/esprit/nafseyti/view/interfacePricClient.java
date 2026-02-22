package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.layout.BorderPane;
import javafx.stage.Stage;

import java.io.IOException;

public class interfacePricClient {
    @FXML
    private BorderPane mainBorderPane; // Assure-toi que ton fx:id est bien mainBorderPane

    @FXML
    private void handleBtnRendezVous(javafx.event.ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlClient/MesRendezVous.fxml"));
            Parent root = loader.load();

            // Récupérer le stage actuel
            Stage stage = (Stage) mainBorderPane.getScene().getWindow();

            // Créer une nouvelle scène avec le FXML complet
            Scene scene = new Scene(root);
            stage.setScene(scene);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}
