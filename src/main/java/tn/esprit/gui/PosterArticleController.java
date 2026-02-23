package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import tn.esprit.models.Article;
import tn.esprit.services.ArticleService;

import java.sql.SQLException;
import java.time.LocalDateTime;

public class PosterArticleController {

    private int forumIdCourant; // forum sélectionné

    public void setForumId(int forumId) {
        this.forumIdCourant = forumId;
    }

    @FXML
    private TextField txtTitre;

    @FXML
    private TextArea txtContenu;

    @FXML
    private Button btnPoster;

    private ArticleService articleService = new ArticleService();

    @FXML
    public void initialize() {
        btnPoster.setOnAction(e -> {
            try {
                if (!txtTitre.getText().isEmpty() && !txtContenu.getText().isEmpty()) {
                    Article a = new Article();
                    a.setTitre(txtTitre.getText());
                    a.setContenu(txtContenu.getText());
                    a.setStatut("actif");
                    a.setLikeCount(0);
                    a.setForumId(forumIdCourant); // associer au forum courant

                    articleService.ajouter(a);
                    System.out.println("Article ajouté dans le forum ID " + forumIdCourant);

                    // Fermer la fenêtre après ajout
                    btnPoster.getScene().getWindow().hide();
                }
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        });
    }
}