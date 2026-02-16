package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.layout.VBox;

public class EventController {

    @FXML
    private Button btnRendezVous;

    @FXML
    private VBox centerContent;

    @FXML
    private void handleRendezVous() {
        System.out.println("Rendez-vous button clicked ✅");
    }


        @FXML
        private Button btnTableauBord;

        @FXML
        private Button btnEvenements;

        @FXML
        private Button BTS; // Gérer les événements button

    @FXML
    public void initialize() {
        BTS.setOnAction(e -> switchToEvenements());
    }


    private void switchToEvenements() {

        btnTableauBord.setStyle(
                "-fx-background-color: transparent; " +
                        "-fx-text-fill: #69685c; " +
                        "-fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;"
        );

        btnEvenements.setStyle(
                "-fx-background-color: #374535; " +
                        "-fx-text-fill: white; " +
                        "-fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;"
        );

        try {
            Parent page = FXMLLoader.load(
                    getClass().getResource("/evenements.fxml")
            );


            centerContent.getChildren().setAll(page);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}









