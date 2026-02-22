package tn.esprit.gui;

import javafx.animation.ScaleTransition;
import javafx.fxml.FXML;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.VBox;
import javafx.scene.control.ScrollPane;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.stage.Stage;
import javafx.util.Duration;
import tn.esprit.models.Article;
import tn.esprit.models.Commentaire;
import tn.esprit.models.Forum;
import tn.esprit.services.ArticleService;
import tn.esprit.services.CommentaireService;

import java.sql.SQLException;
import java.time.LocalDateTime;
import java.util.List;

public class ArticleListController {

    @FXML
    private VBox articleContainer;

    @FXML
    private Label titreForum;

    private ArticleService articleService = new ArticleService();
    private CommentaireService commentaireService = new CommentaireService();

    public void setForum(Forum forum) {
        titreForum.setText("Forum: " + forum.getNomForum());
        chargerArticles(forum.getIdForum());
    }

    public void chargerArticles(int forumId) {
        try {
            List<Article> posts = articleService.getArticlesByForum(forumId);
            articleContainer.getChildren().clear();

            for (Article p : posts) {
                VBox card = new VBox(10);
                card.setPadding(new Insets(15));
                card.setStyle(
                        "-fx-background-color: #ffffff;" +
                                "-fx-background-radius: 15;" +
                                "-fx-border-radius: 15;" +
                                "-fx-border-color: #e0e0e0;" +
                                "-fx-effect: dropshadow(two-pass-box, rgba(0,0,0,0.08), 8, 0, 0, 2);"
                );

                // Ligne du titre + Like
                HBox titleLine = new HBox();
                Label titre = new Label(p.getTitre());
                titre.setStyle("-fx-font-weight: bold; -fx-font-size: 16; -fx-text-fill: #222;");

                Label likes = new Label("❤️ " + p.getLikeCount());
                likes.setStyle("-fx-font-size: 14; -fx-text-fill: grey; -fx-cursor: hand;");

                final boolean[] liked = {false};
                likes.setOnMouseClicked(e -> {
                    try {
                        if (!liked[0]) {
                            articleService.ajouterLike(p.getIdPost());
                            p.setLikeCount(p.getLikeCount() + 1);
                            likes.setStyle("-fx-font-size: 14; -fx-text-fill: #e74c3c; -fx-cursor: hand;");
                            liked[0] = true;
                        } else {
                            articleService.retirerLike(p.getIdPost());
                            p.setLikeCount(p.getLikeCount() - 1);
                            likes.setStyle("-fx-font-size: 14; -fx-text-fill: grey; -fx-cursor: hand;");
                            liked[0] = false;
                        }
                        likes.setText("❤️ " + p.getLikeCount());

                        ScaleTransition st = new ScaleTransition(Duration.millis(200), likes);
                        st.setFromX(1);
                        st.setFromY(1);
                        st.setToX(1.5);
                        st.setToY(1.5);
                        st.setAutoReverse(true);
                        st.setCycleCount(2);
                        st.play();

                    } catch (SQLException ex) {
                        ex.printStackTrace();
                    }
                });

                HBox spacer = new HBox();
                HBox.setHgrow(spacer, Priority.ALWAYS);
                titleLine.getChildren().addAll(titre, spacer, likes);
                titleLine.setAlignment(Pos.CENTER_LEFT);

                // Auteur
                Label auteur = new Label("Posté par : Anonyme");
                auteur.setStyle("-fx-font-size: 12; -fx-text-fill: #777;");

                // Contenu
                Label contenu = new Label(p.getContenu());
                contenu.setWrapText(true);
                contenu.setStyle("-fx-font-size: 14; -fx-text-fill: #333;");

                // Champ commentaire + boutons
                TextField newCommentField = new TextField();
                newCommentField.setPromptText("Écrire un commentaire...");
                newCommentField.setStyle(
                        "-fx-background-radius: 5;" +
                                "-fx-border-radius: 5;" +
                                "-fx-border-color: #ccc;" +
                                "-fx-padding: 5 8 5 8;" +
                                "-fx-font-size: 13;"
                );
                newCommentField.setPrefWidth(200);

                Button addCommentBtn = new Button("Ajouter");
                addCommentBtn.setStyle(
                        "-fx-background-color: #2ecc71;" +
                                "-fx-text-fill: white;" +
                                "-fx-background-radius: 5;" +
                                "-fx-font-size: 13;"
                );
                addCommentBtn.setMinHeight(28);
                addCommentBtn.setOnAction(e -> {
                    try {
                        if (!newCommentField.getText().isEmpty()) {
                            Commentaire c = new Commentaire();
                            c.setIdPost(p.getIdPost());
                            c.setContenu(newCommentField.getText());
                            c.setDateCreation(LocalDateTime.now());
                            commentaireService.ajouter(c);
                            newCommentField.clear();
                        }
                    } catch (SQLException ex) {
                        ex.printStackTrace();
                    }
                });

                Button commentsBtn = new Button("Commentaires");
                commentsBtn.setStyle(
                        "-fx-background-color: #3498db;" +
                                "-fx-text-fill: white;" +
                                "-fx-background-radius: 5;" +
                                "-fx-font-size: 13;"
                );
                commentsBtn.setMinHeight(28);
                commentsBtn.setOnAction(e -> {
                    try {
                        afficherCommentairesPopup(p);
                    } catch (SQLException ex) {
                        ex.printStackTrace();
                    }
                });

                HBox commentLine = new HBox(10);
                HBox.setHgrow(newCommentField, Priority.ALWAYS);
                commentLine.getChildren().addAll(newCommentField, addCommentBtn, commentsBtn);
                commentLine.setAlignment(Pos.CENTER_LEFT);

                // Ajouter tous les éléments à la carte
                card.getChildren().addAll(titleLine, auteur, contenu, commentLine);
                articleContainer.getChildren().add(card);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private void afficherCommentairesPopup(Article post) throws SQLException {
        List<Commentaire> commentaires = commentaireService.getCommentairesByPost(post.getIdPost());

        VBox root = new VBox(10);
        root.setPadding(new Insets(10));

        // Titre en haut
        Label titrePopup = new Label("Commentaires pour : " + post.getTitre());
        titrePopup.setStyle("-fx-font-size: 16; -fx-font-weight: bold; -fx-text-fill: #111111; -fx-padding: 5 0 10 0;");
        root.getChildren().add(titrePopup);

        for (Commentaire c : commentaires) {
            HBox commentCard = new HBox(10);
            commentCard.setPadding(new Insets(8));
            commentCard.setStyle(
                    "-fx-background-color: #f0f4f7;" +
                            "-fx-background-radius: 10;" +
                            "-fx-border-radius: 10;" +
                            "-fx-border-color: #d0dce0;"
            );

            // Avatar circulaire
            Label avatar = new Label("A");
            avatar.setStyle(
                    "-fx-background-color: #3498db;" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-alignment: center;" +
                            "-fx-min-width: 30;" +
                            "-fx-min-height: 30;" +
                            "-fx-max-width: 30;" +
                            "-fx-max-height: 30;" +
                            "-fx-background-radius: 15;"
            );

            VBox commentContent = new VBox(5);
            Label auteur = new Label("Anonyme");
            auteur.setStyle("-fx-font-weight: bold; -fx-font-size: 13; -fx-text-fill: #222222;");

            Label date = new Label(c.getDateCreation().toLocalDate().toString());
            date.setStyle("-fx-font-size: 11; -fx-text-fill: #555555;");

            Label contenu = new Label(c.getContenu());
            contenu.setWrapText(true);
            contenu.setStyle("-fx-font-size: 13; -fx-text-fill: #111111;");

            commentContent.getChildren().addAll(auteur, date, contenu);
            commentCard.getChildren().addAll(avatar, commentContent);

            root.getChildren().add(commentCard);
        }

        ScrollPane scrollPane = new ScrollPane(root);
        scrollPane.setFitToWidth(true);
        scrollPane.setPrefSize(400, 500);
        scrollPane.setStyle("-fx-background: transparent; -fx-background-color: transparent;");

        // Bouton fermer
        Button closeBtn = new Button("Fermer");
        closeBtn.setStyle("-fx-background-color: #e74c3c; -fx-text-fill: white; -fx-background-radius: 5;");
        closeBtn.setOnAction(e -> ((Stage) closeBtn.getScene().getWindow()).close());

        VBox popup = new VBox(10, scrollPane, closeBtn);
        popup.setPadding(new Insets(10));

        Scene scene = new Scene(popup);
        Stage stage = new Stage();
        stage.setTitle("Commentaires");
        stage.setScene(scene);
        stage.show();
    }
}