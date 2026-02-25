package tn.esprit.nafseyti.test.test;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.Parent;
import javafx.stage.Stage;

public class MainFX extends Application {  // <-- EXTENDS Application

    @Override
    public void start(Stage primaryStage) throws Exception {
        // Charger le FXML
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlPsychologue/PsychologueInterface.fxml"));
        // /fxmlPsychologue/PsychologueInterface.fxml
        // /fxml/interfacePrincipal.fxml
        // /fxmlClient/interfacePricClient.fxml
        Parent root = loader.load();

        // Créer la scène
        Scene scene = new Scene(root);
        // Configurer et afficher la fenêtre
        primaryStage.setTitle("Tableau de bord");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    public static void main(String[] args) {
        launch(args); // <-- maintenant c'est reconnu
    }
}
