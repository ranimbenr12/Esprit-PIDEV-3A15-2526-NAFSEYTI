package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.models.Article;
import tn.esprit.services.ArticleService;

import java.sql.SQLException;

public class ModifierArticleController {

    @FXML
    private TextField titreField;
    @FXML
    private TextArea contenuArea;
    @FXML
    private ComboBox<String> statutCombo;

    private Article article;
    private ArticleService articleService = new ArticleService();
    private GestionArticleController parentController;

    @FXML
    public void initialize() {
        // Initialiser la combo box des statuts
        statutCombo.getItems().addAll("Publié", "Brouillon", "Archivé");
    }

    /**
     * Définit l'article à modifier
     */
    public void setArticle(Article article) {
        this.article = article;

        // Remplir les champs avec les données de l'article
        if (article != null) {
            titreField.setText(article.getTitre());
            contenuArea.setText(article.getContenu());
            statutCombo.setValue(article.getStatut());
        }
    }

    /**
     * Définit le contrôleur parent pour rafraîchir la table après modification
     */
    public void setParentController(GestionArticleController parentController) {
        this.parentController = parentController;
    }

    @FXML
    private void modifierArticle() {
        // Validation des champs
        if (titreField.getText().trim().isEmpty()) {
            showAlert("Erreur", "Le titre ne peut pas être vide");
            return;
        }

        if (contenuArea.getText().trim().isEmpty()) {
            showAlert("Erreur", "Le contenu ne peut pas être vide");
            return;
        }

        try {
            // Mettre à jour l'article
            article.setTitre(titreField.getText().trim());
            article.setContenu(contenuArea.getText().trim());
            article.setStatut(statutCombo.getValue());

            // Modifier dans la base de données
            articleService.modifier(article);

            // Afficher un message de succès
            showSuccess("Article modifié avec succès !");

            // Rafraîchir la table dans le contrôleur parent


            // Fermer la fenêtre
            fermerFenetre();

        } catch (SQLException e) {
            e.printStackTrace();
            showAlert("Erreur", "Impossible de modifier l'article: " + e.getMessage());
        }
    }

    @FXML
    private void annuler() {
        fermerFenetre();
    }

    private void fermerFenetre() {
        Stage stage = (Stage) titreField.getScene().getWindow();
        stage.close();
    }

    private void showAlert(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    private void showSuccess(String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Succès");
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}