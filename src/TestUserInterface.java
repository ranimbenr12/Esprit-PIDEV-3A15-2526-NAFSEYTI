import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import java.io.File;
import java.net.URL;

public class TestUserInterface extends Application {

    @Override
    public void start(Stage primaryStage) {
        try {
            System.out.println("=================================");
            System.out.println("🔍 CHARGEMENT DE L'INTERFACE");
            System.out.println("=================================");

            // Le chemin correct vers votre fichier FXML
            File fxmlFile = new File("src/TestPsychologique/views/UserInterface.fxml");

            System.out.println("\n📂 Chargement depuis: " + fxmlFile.getAbsolutePath());
            System.out.println("📄 Fichier existe: " + fxmlFile.exists());

            if (!fxmlFile.exists()) {
                System.out.println("\n❌ FICHIER INTROUVABLE!");
                return;
            }

            // Charger l'interface
            URL fxmlUrl = fxmlFile.toURI().toURL();
            FXMLLoader loader = new FXMLLoader(fxmlUrl);
            Parent root = loader.load();

            Scene scene = new Scene(root, 1400, 900);
            primaryStage.setTitle("NAFSEYTI - Interface Utilisateur");
            primaryStage.setScene(scene);
            primaryStage.show();

            System.out.println("\n✅ SUCCÈS! Interface chargée!");
            System.out.println("=================================");

        } catch(Exception e) {
            System.err.println("\n❌ ERREUR PENDANT LE CHARGEMENT:");
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}