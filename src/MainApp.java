import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class MainApp extends Application {

    @Override
    public void start(Stage primaryStage) {
        try {
            // Charger le fichier FXML
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/TestPsychologique/views/TestView.fxml"));
            Parent root = loader.load();

            // Créer la scène
            Scene scene = new Scene(root, 1000, 700);

            // Configurer la fenêtre
            primaryStage.setTitle("NAFSEYTI - Gestion des Tests Psychologiques");
            primaryStage.setScene(scene);
            primaryStage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}