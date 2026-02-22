package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.ComboBox;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import tn.esprit.models.Forum;

import java.net.URL;
import java.util.ResourceBundle;

public class ModifierForumController implements Initializable {

    @FXML
    private TextField tfTitre;

    @FXML
    private TextArea taDescription;

    @FXML
    private ComboBox<String> cbStatut;
    private Forum forum;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // Remplir le ComboBox Statut
        cbStatut.getItems().addAll("Actif", "Inactif");
    }

    // Méthodes pour gérer les boutons
    @FXML
    private void modifierForum() {
        String titre = tfTitre.getText();
        String description = taDescription.getText();
        String statut = cbStatut.getValue();

        // Ici : ajouter la logique pour modifier le forum dans la base de données
        System.out.println("Modifier Forum : " + titre + ", " + description + ", " + statut);
    }

    @FXML
    private void annuler() {
        // Logique pour fermer la fenêtre ou réinitialiser les champs
        tfTitre.clear();
        taDescription.clear();
        cbStatut.getSelectionModel().clearSelection();
    }

    public void setForum(Forum forum) {
        this.forum = forum;
    }

    public Forum getForum() {
        return forum;
    }
}
