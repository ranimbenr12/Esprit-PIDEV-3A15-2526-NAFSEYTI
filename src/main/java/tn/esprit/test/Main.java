package tn.esprit.test;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class Main extends Application {

    @Override
    public void start(Stage stage) throws Exception {

        System.out.println("START EXECUTED"); // <-- Ajoute ça pour tester

        FXMLLoader loader = new FXMLLoader(
                getClass().getResource("/Dashboard.fxml")
        );

        Scene scene = new Scene(loader.load());
        stage.setTitle("Test");
        stage.setScene(scene);
        stage.show();
    }

    public static void main(String[] args) {
        launch();
    }
}
