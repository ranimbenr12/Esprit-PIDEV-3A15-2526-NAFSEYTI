import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class TestUserInterface extends Application {

    @Override
    public void start(Stage primaryStage) {
        try {
            System.out.println("🔍 CHARGEMENT DE L'INTERFACE");

            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlTeste/UserInterface.fxml"));
            Parent root = loader.load();

            Scene scene = new Scene(root, 1200, 700);
            primaryStage.setTitle("NAFSEYTI - Espace Étudiant");
            primaryStage.setScene(scene);
            primaryStage.setResizable(true);
            primaryStage.setMinWidth(1200);
            primaryStage.setMinHeight(700);
            primaryStage.centerOnScreen();
            primaryStage.show();

            System.out.println("✅ SUCCÈS! Interface chargée!");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}