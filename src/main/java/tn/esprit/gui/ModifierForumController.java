package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.models.Forum;
import tn.esprit.services.ForumService;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class ModifierForumController implements Initializable {

    @FXML
    private Label lblIdForum;

    @FXML
    private TextField txtNomForum;

    @FXML
    private TextArea txtDescription;

    @FXML
    private ComboBox<String> comboStatut;

    @FXML
    private Button btnSave;

    @FXML
    private Button btnCancel;

    private Forum forum;
    private ForumService forumService;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        forumService = new ForumService();
        comboStatut.getItems().addAll("actif", "archivé");
    }

    /**
     * Reçoit le forum à modifier
     */
    public void setForum(Forum forum) {
        this.forum = forum;
        populateFields();
    }

    /**
     * Remplit les champs avec les données du forum
     */
    private void populateFields() {
        if (forum != null) {
            lblIdForum.setText("ID: " + forum.getIdForum());
            txtNomForum.setText(forum.getNomForum());
            txtDescription.setText(forum.getDescription());
            comboStatut.setValue(forum.getStatut());
        }
    }

    /**
     * Sauvegarde les modifications
     */
    @FXML
    private void handleSave() {
        if (validateInput()) {
            try {
                forum.setNomForum(txtNomForum.getText().trim());
                forum.setDescription(txtDescription.getText().trim());
                forum.setStatut(comboStatut.getValue());

                forumService.modifier(forum);

                showAlert(Alert.AlertType.INFORMATION, "Succès", "Forum modifié avec succès !");

                // Fermer la fenêtre
                Stage stage = (Stage) btnSave.getScene().getWindow();
                stage.close();

            } catch (SQLException e) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la modification : " + e.getMessage());
                e.printStackTrace();
            }
        }
    }

    /**
     * Annule la modification
     */
    @FXML
    private void handleCancel() {
        Stage stage = (Stage) btnCancel.getScene().getWindow();
        stage.close();
    }

    /**
     * Valide les champs du formulaire
     */
    private boolean validateInput() {
        if (txtNomForum.getText().trim().isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Le nom du forum est obligatoire");
            return false;
        }
        if (txtDescription.getText().trim().isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Validation", "La description est obligatoire");
            return false;
        }
        if (comboStatut.getValue() == null) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Le statut est obligatoire");
            return false;
        }
        return true;
    }

    /**
     * Affiche une alerte
     */
    private void showAlert(Alert.AlertType type, String title, String message) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}