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

    // ✅ Remplacer handleUtilisateursFromOutside() par cette version qui accepte l'user
    public void navigateToUtilisateurs(User user) {
        this.currentUser = user; // ← setter intégré directement
        handleUtilisateurs();    // ← maintenant currentUser est garanti non-null
    }
    // Méthode appelée quand on clique sur le bouton "Rendez-vous"
    @FXML
    private void handleRendezVous(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxml/rendez_vous.fxml")
            );
            Parent root = loader.load();

            RendezVousController ctrl = loader.getController();

            System.out.println("currentUser dans interfacePrincipal: " + currentUser); // ← DEBUG

            ctrl.setCurrentUser(currentUser); // ← currentUser doit être non null ici

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
    private void handleTableauBord() {
        // ✅ Supprimer seulement les vues ajoutées dynamiquement (index > 0)
        if (mainContentArea.getChildren().size() > 1) {
            mainContentArea.getChildren().remove(1, mainContentArea.getChildren().size());
        }
        resetMenuButtons();
        btnTableauBord.setStyle(
                "-fx-background-color: #374535; -fx-text-fill: white; " +
                        "-fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;"
        );
    }

    @FXML
    private void handleUtilisateurs() {
        if (currentUser == null) {
            System.err.println("❌ currentUser null !");
            return;
        }
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/Dashboard.fxml")
            );
            Parent view = loader.load();

            DashboardController ctrl = loader.getController();
            ctrl.setUser(currentUser);
            ctrl.setMainContentArea(mainContentArea);

            // ✅ Callback retour : supprimer la vue dynamique
           // ctrl.setOnBack(() -> handleTableauBord());

            // ✅ Ajouter PAR-DESSUS le tableau de bord (pas remplacer)
            if (mainContentArea.getChildren().size() > 1) {
                mainContentArea.getChildren().remove(1, mainContentArea.getChildren().size());
            }
            mainContentArea.getChildren().add(view); // ← add() pas setAll()

            resetMenuButtons();
            btnUtilisateurs.setStyle(
                    "-fx-background-color: #374535; -fx-text-fill: white; " +
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
        btnTableauBord.setStyle(base);

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
    @FXML
    private void handleTests() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlTeste/DashboardView.fxml")
            );
            Parent root = loader.load();

            tn.esprit.nafseyti.controllers.DashboardController ctrl = loader.getController();
            ctrl.setCurrentUser(currentUser); // ✅ passer l'user

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}
