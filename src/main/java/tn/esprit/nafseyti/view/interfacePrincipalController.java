package tn.esprit.nafseyti.view;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.layout.BorderPane;
import java.io.IOException;
import javafx.scene.Scene;      // <-- À ajouter
import javafx.stage.Stage;
public class interfacePrincipalController {
    // BorderPane principal du FXML
    @FXML
    private BorderPane mainBorderPane;
    //
    // Méthode appelée quand on clique sur le bouton "Rendez-vous"
    @FXML
    private void handleRendezVous(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/rendez_vous.fxml"));
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
