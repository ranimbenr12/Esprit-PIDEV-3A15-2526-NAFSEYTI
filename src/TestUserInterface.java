import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
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
                System.out.println("💡 Vérifiez que le fichier est bien dans: src/TestPsychologique/views/");
                return;
            }

            // Charger l'interface
            URL fxmlUrl = fxmlFile.toURI().toURL();
            FXMLLoader loader = new FXMLLoader(fxmlUrl);
            Parent root = loader.load();

            // Dimensions optimales pour votre interface avec sidebar
            Scene scene = new Scene(root, 1500, 900);

            // ✅ Configuration de la fenêtre avec boutons standards
            primaryStage.setTitle("NAFSEYTI - Espace Étudiant");
            primaryStage.setScene(scene);
            primaryStage.setResizable(true);     // Permet de redimensionner
            primaryStage.setMinWidth(1200);      // Largeur minimum
            primaryStage.setMinHeight(700);      // Hauteur minimum
            primaryStage.centerOnScreen();       // Centrer la fenêtre

            // ✅ NE PAS mettre StageStyle.UNDECORATED pour garder les boutons
            // primaryStage.initStyle(StageStyle.DECORATED); // Par défaut

            primaryStage.show();

            System.out.println("\n✅ SUCCÈS! Interface chargée!");
            System.out.println("📐 Dimensions: 1500x900");
            System.out.println("🪟 Contrôles: Minimiser, Agrandir, Fermer");
            System.out.println("=================================");

        } catch(Exception e) {
            System.err.println("\n❌ ERREUR PENDANT LE CHARGEMENT:");
            System.err.println("📍 Détails de l'erreur:");
            e.printStackTrace();
            System.err.println("\n💡 Solutions possibles:");
            System.err.println("   1. Vérifiez que UserInterface.fxml existe");
            System.err.println("   2. Vérifiez que le contrôleur est correct");
            System.err.println("   3. Rebuild le projet");
            System.err.println("   4. Vérifiez les images (logo.png, background.jpg, etc.)");
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}