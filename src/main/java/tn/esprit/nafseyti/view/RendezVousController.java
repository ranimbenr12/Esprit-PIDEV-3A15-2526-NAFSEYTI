package tn.esprit.nafseyti.view;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import java.io.IOException;
public class RendezVousController {
    @FXML
    private void handleTableauBord(ActionEvent event) {
        try {
            // Charger l'interface principale
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/interfacePrincipal.fxml"));
            Parent root = loader.load();

            // Récupérer le stage actuel depuis n'importe quel bouton
            Stage stage = (Stage) ((javafx.scene.Node) event.getSource()).getScene().getWindow();

            // Mettre à jour la scène
            Scene scene = new Scene(root);
            stage.setScene(scene);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void handleGererRendezVous(ActionEvent event) {
        try {
            // Charge le FXML de gestion des rendez-vous
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/gestion_rendez_vous.fxml"));
            Parent root = loader.load();

            // Récupère la fenêtre actuelle
            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            // Change la scène
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleGererFiches(ActionEvent event) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/fxml/GestionFicheConsultation.fxml"));
            Scene scene = new Scene(root);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();
            stage.setScene(scene);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}
