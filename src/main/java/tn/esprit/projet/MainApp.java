package tn.esprit.projet;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;


public class MainApp extends Application {

    @Override
    public void start(Stage primaryStage) throws Exception {
        // Load the login screen FXML
        Parent root = FXMLLoader.load(getClass().getResource("/fxml/Login.fxml"));

        // Create scene
        Scene scene = new Scene(root, 900, 600);

        // Add CSS stylesheet (optional)
        scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());

        // Configure stage
        primaryStage.setTitle("NAFSEYTI - Login");
        primaryStage.setScene(scene);
        primaryStage.setResizable(false);
        primaryStage.show();
    }

    public static void main(String[] args) {
        launch(args);
    }
}