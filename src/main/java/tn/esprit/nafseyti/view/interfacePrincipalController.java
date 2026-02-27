package tn.esprit.nafseyti.view;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.layout.BorderPane;
import java.io.IOException;
import javafx.scene.Scene;      // <-- À ajouter
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;
import tn.esprit.nafseyti.fxmlUser.controllers.DashboardController;
import tn.esprit.nafseyti.models.User;

public class interfacePrincipalController {
    // BorderPane principal du FXML
    @FXML
    private BorderPane mainBorderPane;
    @FXML private StackPane mainContentArea;   // ← nouveau champ
    @FXML private Button btnUtilisateurs;
    @FXML private Button btnTableauBord;
    private User currentUser;

    // Méthode appelée quand on clique sur le bouton "Rendez-vous"
    @FXML
    private void handleRendezVous(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxml/rendez_vous.fxml")
            );
            Parent root = loader.load();

            // ✅ Passer l'utilisateur au RendezVousController
            RendezVousController ctrl = loader.getController();
            ctrl.setCurrentUser(currentUser);

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // Setter appelé depuis LoginController après connexion
    public void setCurrentUser(User user) {
        this.currentUser = user;
    }

    @FXML
    private void handleUtilisateurs() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/Dashboard.fxml")
            );
            Parent view = loader.load();

            // Passer l'utilisateur au DashboardContentController
            DashboardController ctrl = loader.getController();
            ctrl.setUser(currentUser);
            ctrl.setMainContentArea(mainContentArea); // pour recharger d'autres vues

            mainContentArea.getChildren().setAll(view);
            // Rendre le StackPane transparent
            view.setStyle("-fx-background-color: transparent;");
            // Mettre à jour style bouton actif
            resetMenuButtons();
            btnUtilisateurs.setStyle(
                    "-fx-background-color: #374535; -fx-text-fill: white; " +
                            "-fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;"
            );
            // Rendre le bouton "Tableau de bord" transparent
            btnTableauBord.setStyle(
                    "-fx-background-color: transparent; -fx-text-fill: #69685c; " +
                            "-fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;"
            );

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void resetMenuButtons() {
        String base = "-fx-background-color: transparent; -fx-text-fill: #69685c; " +
                "-fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;";
        btnUtilisateurs.setStyle(base);

        // ... autres boutons
    }
    @FXML
    private void handleDeconnexion() {
        try {
            // Charger la page de login
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/login.fxml") // ← adapte le chemin
            );
            Parent root = loader.load();

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("Connexion - NAFSEYTI");
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
