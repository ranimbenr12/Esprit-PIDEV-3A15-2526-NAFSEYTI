package tn.esprit.nafseyti.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.StackPane;
import javafx.stage.Modality;
import javafx.stage.Stage;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.utils.Questiondao;
import tn.esprit.nafseyti.utils.Testdao;
import tn.esprit.nafseyti.view.RendezVousController;

import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.util.ResourceBundle;

public class DashboardController implements Initializable {

    @FXML private StackPane contentArea;
    @FXML private Label lblTotalTests, lblTotalQuestions;
    @FXML private ImageView logoImage;        // AJOUTÉ
    @FXML private ImageView backgroundImage;   // AJOUTÉ
    @FXML private BorderPane mainBorderPane;
    @FXML private Button btnDashboard,btnRendezVous;
    @FXML private Button btnTests, btnFeedback,btnUtilisateurs;
    private User currentUser;

    private Testdao testdao = new Testdao();
    private Questiondao questiondao = new Questiondao();
    public void setCurrentUser(User user) {
        this.currentUser = user;
    }
    @Override
    public void initialize(URL location, ResourceBundle resources) {
        loadStatistics();
        //setActiveButton(btnDashboard);
        chargerImages();  // MODIFIÉ (au lieu de chargerLogo)
    }

    // MODIFIÉ - méthode pour charger le logo ET l'image de fond
    private void chargerImages() {
        try {
            // Charger le logo
            InputStream logoStream = getClass().getResourceAsStream("../views/logo.png");
            if (logoStream != null) {
                Image logo = new Image(logoStream);
                logoImage.setImage(logo);
            }

            // Charger l'image de fond
            InputStream bgStream = getClass().getResourceAsStream("../views/background.jpg");
            if (bgStream != null) {
                Image bg = new Image(bgStream);
                backgroundImage.setImage(bg);
            }
        } catch (Exception e) {
            System.err.println("Images non chargées: " + e.getMessage());
        }
    }

    private void loadStatistics() {
        try {
            int totalTests = testdao.getAllTests().size();
            int totalQuestions = questiondao.getAllQuestions().size();

            lblTotalTests.setText(String.valueOf(totalTests));
            lblTotalQuestions.setText(String.valueOf(totalQuestions));
        } catch (Exception e) {
            lblTotalTests.setText("0");
            lblTotalQuestions.setText("0");
            e.printStackTrace();
        }
    }

    @FXML
    private void handleTestsClick() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlTeste/TestView.fxml"));
            Parent root = loader.load();

            Stage popup = new Stage();
            popup.setTitle("Gestion des Tests");
            popup.setScene(new Scene(root, 1000, 800));
            popup.initModality(Modality.APPLICATION_MODAL);
            popup.initOwner(mainBorderPane.getScene().getWindow()); // ← mainBorderPane au lieu de contentArea
            popup.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleQuestionsClick() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlTeste/QuestionView.fxml"));
            Parent root = loader.load();

            Stage popup = new Stage();
            popup.setTitle("Gestion des Questions");
            popup.setScene(new Scene(root, 1000, 800));
            popup.initModality(Modality.APPLICATION_MODAL);
            popup.initOwner(mainBorderPane.getScene().getWindow()); // ← idem
            popup.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }


    @FXML
    private void handleDashboardClick() {
        // Reload dashboard to refresh statistics
        loadStatistics();
      //  setActiveButton(btnDashboard);
    }
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
    @FXML
    private void handleUtilisateurs() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/Dashboard.fxml")
            );
            Parent dashboardContent = loader.load();

            tn.esprit.nafseyti.fxmlUser.controllers.DashboardController ctrl = loader.getController();
            ctrl.setUser(currentUser);

            // Remplace uniquement le centre, la sidebar reste intacte
            mainBorderPane.setCenter(dashboardContent);

            // Met le bouton Utilisateurs actif
            setActiveButton(btnUtilisateurs);

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    // ── Gérer le style actif des boutons ──
    private void setActiveButton(Button activeBtn) {
        String inactiveStyle = "-fx-background-color: transparent; -fx-text-fill: #69685c; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;";
        String activeStyle = "-fx-background-color: #374535; -fx-text-fill: white; -fx-alignment: CENTER_LEFT; -fx-padding: 10; -fx-font-size: 14px;";

        // Tous les boutons redeviendront inactifs
        btnRendezVous.setStyle(inactiveStyle);
        btnUtilisateurs.setStyle(inactiveStyle);
        btnDashboard.setStyle(inactiveStyle);
        btnTests.setStyle(inactiveStyle);

        // Celui actif devient coloré
        activeBtn.setStyle(activeStyle);
    }
    @FXML
    private void handleDeconnexion() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/Login.fxml"));
            Parent root = loader.load();

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            Scene scene = new Scene(root);
            scene.getStylesheets().add(
                    getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI — Connexion");
            stage.sizeToScene();
            stage.centerOnScreen();
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}