package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.models.Article;
import tn.esprit.services.ArticleService;

import java.sql.SQLException;
import java.time.LocalDateTime;

public class AjouterArticleController {

    @FXML
    private TextField txtTitre;

    @FXML
    private TextArea txtContenu;

    @FXML
    private Button btnAjouter;

    @FXML
    private Button btnAnnuler;

    private ArticleService articleService;

    @FXML
    public void initialize() {
        articleService = new ArticleService();

        // bouton ajouter
        btnAjouter.setOnAction(e -> ajouterArticle());

        // bouton annuler
        btnAnnuler.setOnAction(e -> fermerFenetre());
    }

    private void ajouterArticle() {

        String titre = txtTitre.getText();
        String contenu = txtContenu.getText();

        if (titre.isEmpty() || contenu.isEmpty()) {
            showAlert("Erreur", "Veuillez remplir tous les champs !");
            return;
        }

        try {
            Article article = new Article(titre, contenu);
            article.setTitre(titre);
            article.setContenu(contenu);
            article.setDateCreation(LocalDateTime.now()); // date automatique
            article.setStatut("Actif"); // valeur par défaut

            articleService.ajouter(article);

            showAlert("Succès", "Article ajouté avec succès !");
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
