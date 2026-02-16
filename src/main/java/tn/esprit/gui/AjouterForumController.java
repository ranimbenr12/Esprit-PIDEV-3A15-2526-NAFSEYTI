package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.models.Forum;
import tn.esprit.services.ForumService;

import java.sql.SQLException;

public class AjouterForumController {

    @FXML
    private TextField txtNom;

    @FXML
    private TextArea txtDescription;

    @FXML
    private Button btnAjouter;

    @FXML
    private Button btnAnnuler;

    private ForumService forumService;

    @FXML
    public void initialize() {
        forumService = new ForumService();

        // Actions des boutons
        btnAjouter.setOnAction(e -> ajouterForum());
        btnAnnuler.setOnAction(e -> fermerFenetre());
    }

    @FXML
    private void ajouterForum() {
        String titre = txtNom.getText().trim();
        String description = txtDescription.getText().trim();

        if (titre.isEmpty() || description.isEmpty()) {
            showAlert("Erreur", "Veuillez remplir tous les champs !");
            return;
        }

        try {
            // Crée un Forum avec seulement nom et description
            Forum forum = new Forum(titre, description);

            // Appel du service pour l'ajouter en base
            forumService.ajouter(forum);

            showAlert("Succès", "Forum ajouté avec succès !");
            fermerFenetre();

        } catch (SQLException ex) {
            ex.printStackTrace();
            showAlert("Erreur SQL", ex.getMessage());
        }
    }

    private void fermerFenetre() {
        Stage stage = (Stage) btnAnnuler.getScene().getWindow();
        stage.close();
    }

    private void showAlert(String titre, String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(titre);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
