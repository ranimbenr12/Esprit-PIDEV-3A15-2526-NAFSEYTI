package tn.esprit.gui;

import javafx.animation.*;
import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.util.Duration;
import tn.esprit.models.Article;
import tn.esprit.models.Commentaire;
import tn.esprit.models.Forum;
import tn.esprit.services.ArticleService;
import tn.esprit.services.CommentaireService;
import tn.esprit.services.CopilotService;

import java.io.IOException;
import java.sql.SQLException;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.List;
import java.util.Random;
import java.util.Comparator;
import java.util.HashMap;
import java.util.Map;

public class C_ArticleListController {

    @FXML
    private VBox articleContainer;

    @FXML
    private Label titreForum;

    @FXML
    private Button btnPosterArticle;

    @FXML
    private HBox headerActions;

    @FXML
    private TextField searchField;

    @FXML
    private ComboBox<String> sortCombo;

    @FXML
    private Button btnRetour;

    private ArticleService articleService = new ArticleService();
    private CommentaireService commentaireService = new CommentaireService();

    private Forum forumCourant;
    private CopilotService copilotService = new CopilotService();
    private List<Article> allArticles;

    // Map pour stocker l'état des likes/dislikes de l'utilisateur
    private Map<Integer, String> userVotes = new HashMap<>(); // "like" ou "dislike" pour chaque article

    // Couleurs du thème
    private static final String PRIMARY_COLOR = "#4361ee";
    private static final String SECONDARY_COLOR = "#3f37c9";
    private static final String ACCENT_COLOR = "#4cc9f0";
    private static final String SUCCESS_COLOR = "#06d6a0";
    private static final String DANGER_COLOR = "#ef476f";
    private static final String WARNING_COLOR = "#ffd166";
    private static final String DARK_COLOR = "#2b2d42";
    private static final String LIGHT_COLOR = "#f8f9fa";
    private static final String DISLIKE_COLOR = "#f44336";

    @FXML
    private void retournerVersForums() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/ClientContenu.fxml"));
            Parent root = loader.load();

            Scene currentScene = btnRetour.getScene();
            if (currentScene != null) {
                currentScene.setRoot(root);
            }

        } catch (Exception e) {
            e.printStackTrace();
            showError("Erreur", "Impossible de retourner aux forums");
        }
    }

    public void setForum(Forum forum) {
        this.forumCourant = forum;
        titreForum.setText(forum.getNomForum());
        setupHeader();
        chargerArticles(forum.getIdForum());
    }

    @FXML
    public void initialize() {
        setupUI();
        setupSearchAndSort();
    }

    /**
     * Configuration de l'interface utilisateur
     */
    private void setupUI() {
        // Style du conteneur principal
        articleContainer.setStyle(
                "-fx-background-color: #f5f7fa;" +
                        "-fx-padding: 20;"
        );

        // Animation d'apparition
        FadeTransition ft = new FadeTransition(Duration.millis(1000), articleContainer);
        ft.setFromValue(0);
        ft.setToValue(1);
        ft.play();
    }

    /**
     * Configuration de l'en-tête
     */
    private void setupHeader() {
        // Style du titre du forum
        titreForum.setStyle(
                "-fx-font-size: 28;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: " + DARK_COLOR + ";" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 10, 0, 0, 2);"
        );

        // Animation du titre
        ScaleTransition st = new ScaleTransition(Duration.millis(500), titreForum);
        st.setFromX(0.9);
        st.setFromY(0.9);
        st.setToX(1);
        st.setToY(1);
        st.setInterpolator(Interpolator.EASE_OUT);
        st.play();

        // Style du bouton poster
        btnPosterArticle.setStyle(
                "-fx-background-color: " + PRIMARY_COLOR + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-font-size: 14;" +
                        "-fx-background-radius: 25;" +
                        "-fx-padding: 12 25;" +
                        "-fx-cursor: hand;" +
                        "-fx-effect: dropshadow(gaussian, " + PRIMARY_COLOR + "40, 15, 0, 0, 5);" +
                        "-fx-border-width: 0;"
        );

        // Effet de survol du bouton poster
        btnPosterArticle.setOnMouseEntered(e -> {
            btnPosterArticle.setStyle(
                    "-fx-background-color: " + SECONDARY_COLOR + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 12 25;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + SECONDARY_COLOR + "60, 20, 0, 0, 8);" +
                            "-fx-border-width: 0;" +
                            "-fx-scale-x: 1.05;" +
                            "-fx-scale-y: 1.05;"
            );
        });

        btnPosterArticle.setOnMouseExited(e -> {
            btnPosterArticle.setStyle(
                    "-fx-background-color: " + PRIMARY_COLOR + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 12 25;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + PRIMARY_COLOR + "40, 15, 0, 0, 5);" +
                            "-fx-border-width: 0;" +
                            "-fx-scale-x: 1;" +
                            "-fx-scale-y: 1;"
            );
        });
    }

    /**
     * Configuration de la recherche et du tri
     */
    private void setupSearchAndSort() {
        if (searchField != null) {
            searchField.setPromptText("🔍 Rechercher un article...");
            searchField.setStyle(
                    "-fx-background-radius: 25;" +
                            "-fx-border-radius: 25;" +
                            "-fx-border-color: #e0e0e0;" +
                            "-fx-border-width: 1;" +
                            "-fx-padding: 10 15;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-color: white;" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.05), 5, 0, 0, 2);"
            );

            // Recherche en temps réel
            searchField.textProperty().addListener((obs, oldVal, newVal) -> {
                filterArticles(newVal);
            });
        }

        if (sortCombo != null) {
            sortCombo.getItems().addAll("Plus populaires", "Moins populaires", "Plus récents", "Plus anciens", "Alphabétique");
            sortCombo.setValue("Plus populaires");
            sortCombo.setStyle(
                    "-fx-background-radius: 25;" +
                            "-fx-border-radius: 25;" +
                            "-fx-border-color: #e0e0e0;" +
                            "-fx-padding: 5 10;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-color: white;"
            );

            sortCombo.setOnAction(e -> sortArticles());
        }
    }

    public void actualiserArticles() {
        if (forumCourant != null) {
            chargerArticles(forumCourant.getIdForum());
        }
    }

    public void chargerArticles(int forumId) {
        try {
            allArticles = articleService.getArticlesByForum(forumId);
            displayArticles(allArticles);
        } catch (SQLException e) {
            showError("Erreur de chargement", "Impossible de charger les articles");
            e.printStackTrace();
        }
    }

    /**
     * Calcule le score d'un article (likes - dislikes)
     */
    private int calculateScore(Article article) {
        return article.getLikeCount() - article.getDislikeCount();
    }

    /**
     * Affiche les articles avec filtrage
     */
    private void displayArticles(List<Article> articles) {
        articleContainer.getChildren().clear();

        if (articles.isEmpty()) {
            showEmptyState();
            return;
        }

        // Trier par score par défaut (plus populaire en premier)
        List<Article> sortedArticles = articles.stream()
                .sorted((a1, a2) -> Integer.compare(calculateScore(a2), calculateScore(a1)))
                .toList();

        for (Article article : sortedArticles) {
            VBox card = createModernArticleCard(article);
            articleContainer.getChildren().add(card);

            // Animation d'apparition
            FadeTransition ft = new FadeTransition(Duration.millis(500), card);
            ft.setFromValue(0);
            ft.setToValue(1);
            ft.play();
        }
    }

    /**
     * Crée une carte d'article moderne
     */
    private VBox createModernArticleCard(Article article) {
        VBox card = new VBox(15);
        card.setPadding(new Insets(20));
        card.setStyle(
                "-fx-background-color: white;" +
                        "-fx-background-radius: 20;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 20, 0, 0, 5);" +
                        "-fx-border-width: 1;" +
                        "-fx-border-color: #f0f0f0;" +
                        "-fx-border-radius: 20;"
        );

        // Animation au survol
        card.setOnMouseEntered(e -> {
            card.setStyle(
                    "-fx-background-color: white;" +
                            "-fx-background-radius: 20;" +
                            "-fx-effect: dropshadow(gaussian, rgba(67,97,238,0.15), 30, 0, 0, 10);" +
                            "-fx-border-width: 1;" +
                            "-fx-border-color: " + PRIMARY_COLOR + "20;" +
                            "-fx-border-radius: 20;" +
                            "-fx-scale-x: 1.02;" +
                            "-fx-scale-y: 1.02;"
            );
        });

        card.setOnMouseExited(e -> {
            card.setStyle(
                    "-fx-background-color: white;" +
                            "-fx-background-radius: 20;" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 20, 0, 0, 5);" +
                            "-fx-border-width: 1;" +
                            "-fx-border-color: #f0f0f0;" +
                            "-fx-border-radius: 20;" +
                            "-fx-scale-x: 1;" +
                            "-fx-scale-y: 1;"
            );
        });

        // En-tête de la carte avec avatar et métadonnées
        HBox cardHeader = createCardHeader(article);

        // Titre et contenu
        VBox contentBox = createCardContent(article);

        // Statistiques et actions
        HBox statsBox = createCardStats(article);

        // Section commentaires
        VBox commentSection = createModernCommentSection(article);

        // Boutons d'action avec Like/Dislike
        HBox actionButtons = createCardActions(article);

        card.getChildren().addAll(
                cardHeader,
                contentBox,
                statsBox,
                new Separator(),
                commentSection,
                actionButtons
        );

        return card;
    }

    /**
     * Crée l'en-tête de la carte
     */
    private HBox createCardHeader(Article article) {
        HBox header = new HBox(15);
        header.setAlignment(Pos.CENTER_LEFT);

        // Avatar avec initiales
        StackPane avatar = new StackPane();
        avatar.setPrefSize(45, 45);
        avatar.setStyle(
                "-fx-background-color: linear-gradient(to bottom right, " + PRIMARY_COLOR + ", " + SECONDARY_COLOR + ");" +
                        "-fx-background-radius: 15;" +
                        "-fx-effect: dropshadow(gaussian, " + PRIMARY_COLOR + "40, 10, 0, 0, 3);"
        );

        Label initials = new Label(getInitials("auteur"));
        initials.setStyle(
                "-fx-font-size: 16;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: white;"
        );
        avatar.getChildren().add(initials);

        // Informations auteur
        VBox authorInfo = new VBox(3);

        Label authorName = new Label("Anonyme");
        authorName.setStyle(
                "-fx-font-weight: bold;" +
                        "-fx-font-size: 14;" +
                        "-fx-text-fill: " + DARK_COLOR + ";"
        );

        Label dateLabel = new Label();
        if (article.getDateCreation() != null) {
            DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd MMMM yyyy 'à' HH:mm");
            dateLabel.setText("📅 " + article.getDateCreation().format(formatter));
            dateLabel.setStyle(
                    "-fx-font-size: 11;" +
                            "-fx-text-fill: #6c757d;"
            );
        }

        authorInfo.getChildren().addAll(authorName, dateLabel);

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        // Badge de score
        Label scoreBadge = createScoreBadge(article);

        header.getChildren().addAll(avatar, authorInfo, spacer, scoreBadge);

        return header;
    }

    /**
     * Crée un badge de score
     */
    private Label createScoreBadge(Article article) {
        int score = calculateScore(article);
        String scoreText = score >= 0 ? "👍 " + score : "👎 " + Math.abs(score);
        String color = score >= 0 ? SUCCESS_COLOR : DANGER_COLOR;

        Label badge = new Label(scoreText);
        badge.setStyle(
                "-fx-background-color: " + color + "20;" +
                        "-fx-text-fill: " + color + ";" +
                        "-fx-font-weight: bold;" +
                        "-fx-font-size: 12;" +
                        "-fx-padding: 5 12;" +
                        "-fx-background-radius: 20;" +
                        "-fx-border-color: " + color + "40;" +
                        "-fx-border-radius: 20;" +
                        "-fx-border-width: 1;"
        );

        return badge;
    }

    /**
     * Crée le contenu de la carte
     */
    private VBox createCardContent(Article article) {
        VBox content = new VBox(8);

        Label title = new Label(article.getTitre());
        title.setStyle(
                "-fx-font-size: 20;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: " + DARK_COLOR + ";" +
                        "-fx-wrap-text: true;"
        );
        title.setMaxWidth(600);

        Label body = new Label(article.getContenu());
        body.setWrapText(true);
        body.setStyle(
                "-fx-font-size: 14;" +
                        "-fx-text-fill: #4a5568;" +
                        "-fx-line-spacing: 5;"
        );
        body.setMaxHeight(100);

        // Bouton "Lire plus"
        if (article.getContenu().length() > 200) {
            Hyperlink readMore = new Hyperlink("Lire plus");
            readMore.setStyle(
                    "-fx-text-fill: " + PRIMARY_COLOR + ";" +
                            "-fx-font-weight: bold;" +
                            "-fx-border-width: 0;"
            );
            readMore.setOnAction(e -> expandContent(body, readMore));
            content.getChildren().addAll(title, body, readMore);
        } else {
            content.getChildren().addAll(title, body);
        }

        return content;
    }

    /**
     * Crée les statistiques de la carte
     */
    private HBox createCardStats(Article article) {
        HBox stats = new HBox(20);
        stats.setPadding(new Insets(5, 0, 5, 0));

        // Likes
        Label likesLabel = new Label("👍 " + article.getLikeCount());
        likesLabel.setStyle(
                "-fx-font-size: 13;" +
                        "-fx-text-fill: #6c757d;"
        );

        // Dislikes
        Label dislikesLabel = new Label("👎 " + article.getDislikeCount());
        dislikesLabel.setStyle(
                "-fx-font-size: 13;" +
                        "-fx-text-fill: #6c757d;"
        );

        // Commentaires
        try {
            int commentCount = commentaireService.getCommentairesByPost(article.getIdPost()).size();
            Label commentsLabel = new Label("💬 " + commentCount + " commentaires");
            commentsLabel.setStyle(
                    "-fx-font-size: 13;" +
                            "-fx-text-fill: #6c757d;"
            );
            stats.getChildren().addAll(likesLabel, dislikesLabel, commentsLabel);
        } catch (SQLException e) {
            e.printStackTrace();
        }

        // Vues (aléatoire pour l'exemple)
        Label viewsLabel = new Label("👁️ " + new Random().nextInt(1000));
        viewsLabel.setStyle(
                "-fx-font-size: 13;" +
                        "-fx-text-fill: #6c757d;"
        );

        stats.getChildren().add(viewsLabel);

        return stats;
    }

    /**
     * Crée la section commentaires moderne
     */
    private VBox createModernCommentSection(Article article) {
        VBox section = new VBox(10);

        // Champ de commentaire
        HBox commentInput = new HBox(10);
        commentInput.setAlignment(Pos.CENTER_LEFT);

        TextField commentField = new TextField();
        commentField.setPromptText("Écrire un commentaire...");
        commentField.setStyle(
                "-fx-background-radius: 25;" +
                        "-fx-border-radius: 25;" +
                        "-fx-border-color: #e0e0e0;" +
                        "-fx-border-width: 1;" +
                        "-fx-padding: 10 15;" +
                        "-fx-font-size: 13;" +
                        "-fx-background-color: #f8f9fa;"
        );
        HBox.setHgrow(commentField, Priority.ALWAYS);

        Button sendBtn = new Button("Envoyer");
        sendBtn.setStyle(
                "-fx-background-color: " + PRIMARY_COLOR + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 25;" +
                        "-fx-padding: 8 20;" +
                        "-fx-cursor: hand;"
        );
        sendBtn.setOnAction(e -> addModernComment(article, commentField));

        commentInput.getChildren().addAll(commentField, sendBtn);

        // Aperçu des derniers commentaires
        VBox previewComments = new VBox(8);
        try {
            List<Commentaire> recentComments = commentaireService.getCommentairesByPost(article.getIdPost());
            int limit = Math.min(2, recentComments.size());

            for (int i = 0; i < limit; i++) {
                Commentaire c = recentComments.get(i);
                HBox commentPreview = createCommentPreview(c);
                previewComments.getChildren().add(commentPreview);
            }

            if (recentComments.size() > 2) {
                Hyperlink viewAll = new Hyperlink("Voir tous les " + recentComments.size() + " commentaires");
                viewAll.setStyle(
                        "-fx-text-fill: " + PRIMARY_COLOR + ";" +
                                "-fx-font-size: 12;"
                );
                viewAll.setOnAction(e -> {
                    try {
                        afficherCommentairesPopup(article);
                    } catch (SQLException ex) {
                        ex.printStackTrace();
                    }
                });
                previewComments.getChildren().add(viewAll);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        section.getChildren().addAll(commentInput, previewComments);

        return section;
    }

    /**
     * Crée un aperçu de commentaire
     */
    private HBox createCommentPreview(Commentaire commentaire) {
        HBox preview = new HBox(10);
        preview.setAlignment(Pos.CENTER_LEFT);
        preview.setPadding(new Insets(5));

        Label avatar = new Label("👤");
        avatar.setStyle(
                "-fx-font-size: 14;"
        );

        VBox content = new VBox(2);

        Label author = new Label("Anonyme");
        author.setStyle(
                "-fx-font-weight: bold;" +
                        "-fx-font-size: 12;" +
                        "-fx-text-fill: " + DARK_COLOR + ";"
        );

        String commentText = commentaire.getContenu();
        if (commentText.length() > 50) {
            commentText = commentText.substring(0, 47) + "...";
        }
        Label text = new Label(commentText);
        text.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-text-fill: #6c757d;"
        );

        content.getChildren().addAll(author, text);

        preview.getChildren().addAll(avatar, content);

        return preview;
    }

    /**
     * Ajoute un commentaire moderne
     */
    private void addModernComment(Article article, TextField commentField) {
        String text = commentField.getText().trim();
        if (!text.isEmpty()) {
            try {
                Commentaire c = new Commentaire();
                c.setIdPost(article.getIdPost());
                c.setContenu(text);
                c.setDateCreation(LocalDateTime.now());
                commentaireService.ajouter(c);
                commentField.clear();

                // Animation de succès
                showSuccessNotification("Commentaire ajouté !");

                // Rafraîchir
                actualiserArticles();

            } catch (SQLException ex) {
                showError("Erreur", "Impossible d'ajouter le commentaire");
                ex.printStackTrace();
            }
        }
    }

    /**
     * Crée les boutons d'action de la carte
     */
    private HBox createCardActions(Article article) {
        HBox actions = new HBox(10);
        actions.setAlignment(Pos.CENTER_LEFT);

        // Bouton Like
        Button likeBtn = createVoteButton("👍", article, "like");

        // Bouton Dislike
        Button dislikeBtn = createVoteButton("👎", article, "dislike");

        // Bouton Résumé IA
        Button resumeBtn = createStyledButton("📝 Résumé IA", "#9c88ff", "#8c78ff");
        resumeBtn.setOnAction(e -> generateModernResume(article));

        // Bouton Partager
        Button shareBtn = createStyledButton("📤 Partager", "#4cc9f0", "#3ab7e0");
        shareBtn.setOnAction(e -> showShareDialog(article));

        actions.getChildren().addAll(likeBtn, dislikeBtn, resumeBtn, shareBtn);

        return actions;
    }

    /**
     * Crée un bouton de vote (like/dislike)
     */
    private Button createVoteButton(String emoji, Article article, String voteType) {
        int count = voteType.equals("like") ? article.getLikeCount() : article.getDislikeCount();
        String text = emoji + " " + count;
        String baseColor = voteType.equals("like") ? SUCCESS_COLOR : DISLIKE_COLOR;
        String hoverColor = voteType.equals("like") ? "#05c79b" : "#e53935";

        Button btn = new Button(text);

        // Vérifier si l'utilisateur a déjà voté
        String userVote = userVotes.get(article.getIdPost());
        boolean isActive = userVote != null && userVote.equals(voteType);

        String activeStyle = isActive ?
                "-fx-background-color: " + baseColor + "; -fx-text-fill: white; -fx-font-weight: bold; -fx-font-size: 12; -fx-background-radius: 25; -fx-padding: 8 15; -fx-cursor: hand;" :
                "-fx-background-color: " + baseColor + "20; -fx-text-fill: " + baseColor + "; -fx-font-weight: bold; -fx-font-size: 12; -fx-background-radius: 25; -fx-padding: 8 15; -fx-cursor: hand; -fx-border-color: " + baseColor + "40; -fx-border-radius: 25; -fx-border-width: 1;";

        btn.setStyle(activeStyle);

        btn.setOnMouseEntered(e -> {
            if (!(userVotes.containsKey(article.getIdPost()) && userVotes.get(article.getIdPost()).equals(voteType))) {
                btn.setStyle(
                        "-fx-background-color: " + hoverColor + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 12;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 8 15;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + hoverColor + "60, 15, 0, 0, 5);" +
                                "-fx-scale-x: 1.05;" +
                                "-fx-scale-y: 1.05;"
                );
            }
        });

        btn.setOnMouseExited(e -> {
            if (!(userVotes.containsKey(article.getIdPost()) && userVotes.get(article.getIdPost()).equals(voteType))) {
                btn.setStyle(
                        "-fx-background-color: " + baseColor + "20;" +
                                "-fx-text-fill: " + baseColor + ";" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 12;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 8 15;" +
                                "-fx-cursor: hand;" +
                                "-fx-border-color: " + baseColor + "40;" +
                                "-fx-border-radius: 25;" +
                                "-fx-border-width: 1;"
                );
            }
        });

        btn.setOnAction(e -> handleVote(article, btn, voteType));

        return btn;
    }

    /**
     * Gère le vote (like/dislike)
     */
    private void handleVote(Article article, Button btn, String voteType) {
        try {
            String currentVote = userVotes.get(article.getIdPost());

            if (currentVote == null) {
                // Premier vote
                if (voteType.equals("like")) {
                    articleService.ajouterLike(article.getIdPost());
                    article.setLikeCount(article.getLikeCount() + 1);
                } else {
                    articleService.ajouterDislike(article.getIdPost());
                    article.setDislikeCount(article.getDislikeCount() + 1);
                }
                userVotes.put(article.getIdPost(), voteType);

            } else if (currentVote.equals(voteType)) {
                // Annuler le vote
                if (voteType.equals("like")) {
                    articleService.retirerLike(article.getIdPost());
                    article.setLikeCount(article.getLikeCount() - 1);
                } else {
                    articleService.retirerDislike(article.getIdPost());
                    article.setDislikeCount(article.getDislikeCount() - 1);
                }
                userVotes.remove(article.getIdPost());

            } else {
                // Changer de vote
                if (voteType.equals("like")) {
                    // Retirer le dislike, ajouter le like
                    articleService.retirerDislike(article.getIdPost());
                    articleService.ajouterLike(article.getIdPost());
                    article.setDislikeCount(article.getDislikeCount() - 1);
                    article.setLikeCount(article.getLikeCount() + 1);
                } else {
                    // Retirer le like, ajouter le dislike
                    articleService.retirerLike(article.getIdPost());
                    articleService.ajouterDislike(article.getIdPost());
                    article.setLikeCount(article.getLikeCount() - 1);
                    article.setDislikeCount(article.getDislikeCount() + 1);
                }
                userVotes.put(article.getIdPost(), voteType);
            }

            // Animation du bouton
            ScaleTransition st = new ScaleTransition(Duration.millis(200), btn);
            st.setFromX(1);
            st.setFromY(1);
            st.setToX(1.3);
            st.setToY(1.3);
            st.setAutoReverse(true);
            st.setCycleCount(2);
            st.play();

            // Mettre à jour l'affichage
            actualiserArticles();

            showSuccessNotification(voteType.equals("like") ? "Like ajouté !" : "Dislike ajouté !");

        } catch (SQLException ex) {
            showError("Erreur", "Impossible de voter");
            ex.printStackTrace();
        }
    }

    /**
     * Crée un bouton stylisé
     */
    private Button createStyledButton(String text, String color, String hoverColor) {
        Button btn = new Button(text);
        btn.setStyle(
                "-fx-background-color: " + color + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-font-size: 12;" +
                        "-fx-background-radius: 25;" +
                        "-fx-padding: 8 15;" +
                        "-fx-cursor: hand;" +
                        "-fx-effect: dropshadow(gaussian, " + color + "40, 10, 0, 0, 3);"
        );

        btn.setOnMouseEntered(e -> {
            btn.setStyle(
                    "-fx-background-color: " + hoverColor + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 8 15;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + hoverColor + "60, 15, 0, 0, 5);" +
                            "-fx-scale-x: 1.05;" +
                            "-fx-scale-y: 1.05;"
            );
        });

        btn.setOnMouseExited(e -> {
            btn.setStyle(
                    "-fx-background-color: " + color + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 8 15;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + color + "40, 10, 0, 0, 3);" +
                            "-fx-scale-x: 1;" +
                            "-fx-scale-y: 1;"
            );
        });

        return btn;
    }

    /**
     * Génère un résumé moderne
     */
    private void generateModernResume(Article article) {
        // Fenêtre de chargement moderne
        Stage loadingStage = createModernLoadingStage();
        loadingStage.show();

        new Thread(() -> {
            String resume = genererResumeIA(article.getContenu());

            Platform.runLater(() -> {
                loadingStage.close();
                showModernResumeDialog(article, resume);
            });
        }).start();
    }

    /**
     * Crée une fenêtre de chargement moderne
     */
    private Stage createModernLoadingStage() {
        Stage stage = new Stage();
        stage.initStyle(StageStyle.TRANSPARENT);
        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        VBox content = new VBox(20);
        content.setAlignment(Pos.CENTER);
        content.setPadding(new Insets(30));
        content.setStyle(
                "-fx-background-color: white;" +
                        "-fx-background-radius: 20;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.2), 30, 0, 0, 10);"
        );

        ProgressIndicator indicator = new ProgressIndicator();
        indicator.setPrefSize(60, 60);
        indicator.setStyle("-fx-progress-color: " + PRIMARY_COLOR + ";");

        Label label = new Label("Génération du résumé...");
        label.setStyle(
                "-fx-font-size: 16;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: " + DARK_COLOR + ";"
        );

        Label subLabel = new Label("Cela peut prendre quelques secondes");
        subLabel.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-text-fill: #6c757d;"
        );

        content.getChildren().addAll(indicator, label, subLabel);

        Scene scene = new Scene(content);
        scene.setFill(null);
        stage.setScene(scene);

        return stage;
    }

    /**
     * Affiche une notification de succès
     */
    private void showSuccessNotification(String message) {
        // À implémenter selon votre système de notification
        System.out.println("✅ " + message);
    }

    /**
     * Affiche une erreur
     */
    private void showError(String title, String message) {
        Platform.runLater(() -> {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle(title);
            alert.setHeaderText(null);
            alert.setContentText(message);
            alert.showAndWait();
        });
    }

    /**
     * Affiche un dialogue de partage moderne avec plusieurs options
     */
    private void showShareDialog(Article article) {
        // Création du stage de partage
        Stage shareStage = new Stage();
        shareStage.initStyle(StageStyle.TRANSPARENT);
        shareStage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        // Conteneur principal
        VBox root = new VBox(20);
        root.setPadding(new Insets(25));
        root.setStyle(
                "-fx-background-color: white;" +
                        "-fx-background-radius: 20;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.2), 30, 0, 0, 10);"
        );
        root.setMaxWidth(400);
        root.setMaxHeight(500);

        // Animation d'apparition
        ScaleTransition st = new ScaleTransition(Duration.millis(300), root);
        st.setFromX(0.8);
        st.setFromY(0.8);
        st.setToX(1);
        st.setToY(1);
        st.setInterpolator(Interpolator.EASE_OUT);
        st.play();

        // En-tête
        HBox header = new HBox(10);
        header.setAlignment(Pos.CENTER_LEFT);

        Label iconLabel = new Label("📤");
        iconLabel.setStyle("-fx-font-size: 28;");

        Label titleLabel = new Label("Partager l'article");
        titleLabel.setStyle(
                "-fx-font-size: 20;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: " + DARK_COLOR + ";"
        );

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        Button closeBtn = new Button("✕");
        closeBtn.setStyle(
                "-fx-background-color: transparent;" +
                        "-fx-text-fill: #95a5a6;" +
                        "-fx-font-size: 16;" +
                        "-fx-font-weight: bold;" +
                        "-fx-cursor: hand;" +
                        "-fx-padding: 5 10;"
        );
        closeBtn.setOnAction(e -> shareStage.close());

        header.getChildren().addAll(iconLabel, titleLabel, spacer, closeBtn);

        // Aperçu de l'article
        VBox previewBox = new VBox(10);
        previewBox.setPadding(new Insets(15));
        previewBox.setStyle(
                "-fx-background-color: #f8f9fa;" +
                        "-fx-background-radius: 15;" +
                        "-fx-border-color: #e9ecef;" +
                        "-fx-border-radius: 15;" +
                        "-fx-border-width: 1;"
        );

        Label articleTitle = new Label(article.getTitre());
        articleTitle.setStyle(
                "-fx-font-weight: bold;" +
                        "-fx-font-size: 14;" +
                        "-fx-text-fill: " + DARK_COLOR + ";"
        );
        articleTitle.setWrapText(true);

        Label articlePreview = new Label(getPreviewText(article.getContenu(), 100));
        articlePreview.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-text-fill: #6c757d;"
        );
        articlePreview.setWrapText(true);

        previewBox.getChildren().addAll(articleTitle, articlePreview);

        // Options de partage
        Label shareOptionsLabel = new Label("Partager via");
        shareOptionsLabel.setStyle(
                "-fx-font-weight: bold;" +
                        "-fx-font-size: 13;" +
                        "-fx-text-fill: " + DARK_COLOR + ";"
        );

        // Grille d'options de partage
        GridPane shareGrid = new GridPane();
        shareGrid.setHgap(15);
        shareGrid.setVgap(15);
        shareGrid.setAlignment(Pos.CENTER);

        // Option 1: Copier le lien
        VBox copyOption = createShareOption(
                "📋",
                "Copier le lien",
                "#667eea",
                () -> copyArticleLink(article, shareStage)
        );

        // Option 2: Partager sur les réseaux
        VBox twitterOption = createShareOption(
                "🐦",
                "Twitter",
                "#1DA1F2",
                () -> shareOnSocialMedia(article, "Twitter")
        );

        VBox facebookOption = createShareOption(
                "📘",
                "Facebook",
                "#4267B2",
                () -> shareOnSocialMedia(article, "Facebook")
        );

        VBox linkedinOption = createShareOption(
                "🔗",
                "LinkedIn",
                "#0077b5",
                () -> shareOnSocialMedia(article, "LinkedIn")
        );

        // Option 3: Partager par email
        VBox emailOption = createShareOption(
                "📧",
                "Email",
                "#EA4335",
                () -> shareByEmail(article)
        );

        // Option 4: Télécharger en PDF
        VBox pdfOption = createShareOption(
                "📄",
                "PDF",
                "#FF5722",
                () -> exportToPDF(article)
        );

        // Option 5: Imprimer
        VBox printOption = createShareOption(
                "🖨️",
                "Imprimer",
                "#607D8B",
                () -> printArticle(article)
        );

        // Option 6: QR Code
        VBox qrOption = createShareOption(
                "📱",
                "QR Code",
                "#4CAF50",
                () -> generateQRCode(article, shareStage)
        );

        // Ajout des options à la grille
        shareGrid.add(copyOption, 0, 0);
        shareGrid.add(twitterOption, 1, 0);
        shareGrid.add(facebookOption, 2, 0);
        shareGrid.add(linkedinOption, 0, 1);
        shareGrid.add(emailOption, 1, 1);
        shareGrid.add(pdfOption, 2, 1);
        shareGrid.add(qrOption, 0, 2);
        shareGrid.add(printOption, 1, 2);

        // Lien direct
        HBox directLinkBox = new HBox(10);
        directLinkBox.setAlignment(Pos.CENTER_LEFT);
        directLinkBox.setPadding(new Insets(10, 0, 0, 0));

        TextField linkField = new TextField(generateArticleLink(article));
        linkField.setEditable(false);
        linkField.setStyle(
                "-fx-background-color: #f1f3f4;" +
                        "-fx-background-radius: 10;" +
                        "-fx-border-radius: 10;" +
                        "-fx-padding: 10;" +
                        "-fx-font-size: 12;"
        );
        HBox.setHgrow(linkField, Priority.ALWAYS);

        Button copyLinkBtn = new Button("Copier");
        copyLinkBtn.setStyle(
                "-fx-background-color: " + PRIMARY_COLOR + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-padding: 8 15;" +
                        "-fx-cursor: hand;" +
                        "-fx-font-size: 12;"
        );
        copyLinkBtn.setOnAction(e -> {
            copyToClipboard(linkField.getText());
            showTemporaryNotification(copyLinkBtn, "Copié !", "#48bb78");
        });

        directLinkBox.getChildren().addAll(linkField, copyLinkBtn);

        // Assemblage final
        root.getChildren().addAll(
                header,
                previewBox,
                shareOptionsLabel,
                shareGrid,
                new Separator(),
                directLinkBox
        );

        Scene scene = new Scene(root);
        scene.setFill(null);
        shareStage.setScene(scene);

        // Centrer par rapport à la fenêtre principale
        shareStage.setOnShown(e -> {
            Stage mainStage = (Stage) btnPosterArticle.getScene().getWindow();
            shareStage.setX(mainStage.getX() + (mainStage.getWidth() - root.getWidth()) / 2);
            shareStage.setY(mainStage.getY() + (mainStage.getHeight() - root.getHeight()) / 2);
        });

        shareStage.show();
    }

    /**
     * Crée une option de partage
     */
    private VBox createShareOption(String emoji, String label, String color, Runnable action) {
        VBox option = new VBox(5);
        option.setAlignment(Pos.CENTER);
        option.setPadding(new Insets(10));
        option.setStyle(
                "-fx-background-color: " + color + "10;" +
                        "-fx-background-radius: 15;" +
                        "-fx-border-color: " + color + "30;" +
                        "-fx-border-radius: 15;" +
                        "-fx-border-width: 1;" +
                        "-fx-cursor: hand;"
        );
        option.setPrefWidth(80);
        option.setPrefHeight(80);

        Label emojiLabel = new Label(emoji);
        emojiLabel.setStyle("-fx-font-size: 28;");

        Label textLabel = new Label(label);
        textLabel.setStyle(
                "-fx-font-size: 11;" +
                        "-fx-text-fill: " + DARK_COLOR + ";" +
                        "-fx-font-weight: bold;"
        );

        option.getChildren().addAll(emojiLabel, textLabel);

        // Effets de survol
        option.setOnMouseEntered(e -> {
            option.setStyle(
                    "-fx-background-color: " + color + ";" +
                            "-fx-background-radius: 15;" +
                            "-fx-border-color: " + color + ";" +
                            "-fx-border-radius: 15;" +
                            "-fx-border-width: 1;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + color + "40, 10, 0, 0, 2);"
            );
            emojiLabel.setStyle("-fx-font-size: 28; -fx-text-fill: white;");
            textLabel.setStyle("-fx-font-size: 11; -fx-text-fill: white; -fx-font-weight: bold;");
        });

        option.setOnMouseExited(e -> {
            option.setStyle(
                    "-fx-background-color: " + color + "10;" +
                            "-fx-background-radius: 15;" +
                            "-fx-border-color: " + color + "30;" +
                            "-fx-border-radius: 15;" +
                            "-fx-border-width: 1;" +
                            "-fx-cursor: hand;"
            );
            emojiLabel.setStyle("-fx-font-size: 28;");
            textLabel.setStyle("-fx-font-size: 11; -fx-text-fill: " + DARK_COLOR + "; -fx-font-weight: bold;");
        });

        // Action au clic
        option.setOnMouseClicked(e -> action.run());

        return option;
    }

    /**
     * Copie le lien de l'article
     */
    private void copyArticleLink(Article article, Stage shareStage) {
        String link = generateArticleLink(article);
        copyToClipboard(link);

        // Notification de succès
        showSuccessNotification("Lien copié dans le presse-papier !");

        // Fermer la fenêtre de partage
        shareStage.close();
    }

    /**
     * Génère un lien pour l'article
     */
    private String generateArticleLink(Article article) {
        // Simuler un lien d'article
        return "https://esprit.tn/forum/" + forumCourant.getIdForum() + "/article/" + article.getIdPost();
    }

    /**
     * Copie du texte dans le presse-papier
     */
    private void copyToClipboard(String text) {
        javafx.scene.input.Clipboard clipboard = javafx.scene.input.Clipboard.getSystemClipboard();
        javafx.scene.input.ClipboardContent content = new javafx.scene.input.ClipboardContent();
        content.putString(text);
        clipboard.setContent(content);
    }

    /**
     * Partage sur les réseaux sociaux (simulé)
     */
    private void shareOnSocialMedia(Article article, String platform) {
        String message = "Découvrez cet article sur notre forum : " + article.getTitre() + "\n" + generateArticleLink(article);

        // Simulation d'ouverture de navigateur
        showSuccessNotification("Partage sur " + platform + " simulé !");

        // Dans une vraie application, vous pourriez ouvrir une URL comme:
        // String url = "https://twitter.com/intent/tweet?text=" + URLEncoder.encode(message, "UTF-8");
        // getHostServices().showDocument(url);
    }

    /**
     * Partage par email
     */
    private void shareByEmail(Article article) {
        String subject = article.getTitre();
        String body = "Bonjour,\n\nJe souhaite partager cet article avec vous :\n\n" +
                article.getTitre() + "\n\n" +
                getPreviewText(article.getContenu(), 200) + "\n\n" +
                "Lien : " + generateArticleLink(article) + "\n\n" +
                "Cordialement,\n" + "Utilisateur du forum";

        try {
            // Créer un mailto URL
            String mailto = "mailto:?subject=" +
                    java.net.URLEncoder.encode(subject, "UTF-8").replace("+", "%20") +
                    "&body=" + java.net.URLEncoder.encode(body, "UTF-8").replace("+", "%20");

            // Ouvrir le client mail par défaut
            getHostServices().showDocument(mailto);
        } catch (Exception e) {
            e.printStackTrace();
            showError("Erreur", "Impossible d'ouvrir le client mail");
        }
    }

    /**
     * Exporte l'article en PDF
     */
    private void exportToPDF(Article article) {
        // Simulation d'export PDF
        Stage loadingStage = createModernLoadingStage();
        loadingStage.show();

        new Thread(() -> {
            try {
                // Simuler un délai de génération PDF
                Thread.sleep(2000);

                Platform.runLater(() -> {
                    loadingStage.close();

                    // Demander où sauvegarder
                    javafx.stage.FileChooser fileChooser = new javafx.stage.FileChooser();
                    fileChooser.setTitle("Sauvegarder le PDF");
                    fileChooser.getExtensionFilters().add(
                            new javafx.stage.FileChooser.ExtensionFilter("Fichiers PDF", "*.pdf")
                    );
                    fileChooser.setInitialFileName(article.getTitre().replaceAll("[^a-zA-Z0-9]", "_") + ".pdf");

                    java.io.File file = fileChooser.showSaveDialog(null);
                    if (file != null) {
                        showSuccessNotification("PDF exporté avec succès !");
                    }
                });
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }).start();
    }

    /**
     * Imprime l'article
     */
    private void printArticle(Article article) {
        // Créer un contenu imprimable
        javafx.print.PrinterJob job = javafx.print.PrinterJob.createPrinterJob();
        if (job != null) {
            // Créer une version imprimable de l'article
            VBox printableContent = new VBox(20);
            printableContent.setPadding(new Insets(20));
            printableContent.setStyle("-fx-background-color: white;");

            Label title = new Label(article.getTitre());
            title.setStyle("-fx-font-size: 24; -fx-font-weight: bold;");

            Label date = new Label("Publié le " +
                    article.getDateCreation().format(DateTimeFormatter.ofPattern("dd/MM/yyyy")));
            date.setStyle("-fx-font-size: 12; -fx-text-fill: gray;");

            Label content = new Label(article.getContenu());
            content.setWrapText(true);
            content.setStyle("-fx-font-size: 14;");

            printableContent.getChildren().addAll(title, date, new Separator(), content);

            // Lancer l'impression
            if (job.showPrintDialog(null)) {
                boolean success = job.printPage(printableContent);
                if (success) {
                    job.endJob();
                    showSuccessNotification("Article envoyé à l'impression !");
                }
            }
        }
    }

    /**
     * Génère un QR Code pour l'article
     */
    private void generateQRCode(Article article, Stage parentStage) {
        Stage qrStage = new Stage();
        qrStage.initStyle(StageStyle.TRANSPARENT);
        qrStage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        VBox root = new VBox(20);
        root.setPadding(new Insets(25));
        root.setStyle(
                "-fx-background-color: white;" +
                        "-fx-background-radius: 20;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.2), 30, 0, 0, 10);"
        );
        root.setMaxWidth(350);

        // En-tête
        HBox header = new HBox(10);
        header.setAlignment(Pos.CENTER_LEFT);

        Label titleLabel = new Label("📱 QR Code");
        titleLabel.setStyle("-fx-font-size: 20; -fx-font-weight: bold;");

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        Button closeBtn = new Button("✕");
        closeBtn.setStyle(
                "-fx-background-color: transparent;" +
                        "-fx-text-fill: #95a5a6;" +
                        "-fx-font-size: 16;" +
                        "-fx-font-weight: bold;" +
                        "-fx-cursor: hand;"
        );
        closeBtn.setOnAction(e -> qrStage.close());

        header.getChildren().addAll(titleLabel, spacer, closeBtn);

        // Simulation de QR Code (dans une vraie app, utiliser une bibliothèque comme ZXing)
        StackPane qrPlaceholder = new StackPane();
        qrPlaceholder.setPrefSize(200, 200);
        qrPlaceholder.setStyle(
                "-fx-background-color: #f0f0f0;" +
                        "-fx-background-radius: 15;" +
                        "-fx-border-color: #e0e0e0;" +
                        "-fx-border-radius: 15;"
        );

        Label qrSimulation = new Label("⬛⬛⬛⬛⬛⬛⬛\n" +
                "⬛⬜⬜⬜⬜⬜⬛\n" +
                "⬛⬜⬛⬛⬛⬜⬛\n" +
                "⬛⬜⬛⬜⬛⬜⬛\n" +
                "⬛⬜⬛⬛⬛⬜⬛\n" +
                "⬛⬜⬜⬜⬜⬜⬛\n" +
                "⬛⬛⬛⬛⬛⬛⬛");
        qrSimulation.setStyle("-fx-font-family: monospace; -fx-font-size: 16;");
        qrPlaceholder.getChildren().add(qrSimulation);

        VBox infoBox = new VBox(10);
        infoBox.setAlignment(Pos.CENTER);

        Label scanLabel = new Label("Scannez pour accéder à l'article");
        scanLabel.setStyle("-fx-font-weight: bold;");

        Label articleInfo = new Label(article.getTitre());
        articleInfo.setStyle("-fx-text-fill: #6c757d; -fx-font-size: 12;");
        articleInfo.setWrapText(true);

        // Bouton de téléchargement
        Button downloadBtn = new Button("📥 Télécharger QR Code");
        downloadBtn.setStyle(
                "-fx-background-color: " + PRIMARY_COLOR + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-padding: 10 20;" +
                        "-fx-cursor: hand;"
        );
        downloadBtn.setOnAction(e -> {
            showSuccessNotification("QR Code téléchargé !");
            qrStage.close();
        });

        infoBox.getChildren().addAll(scanLabel, articleInfo);
        root.getChildren().addAll(header, qrPlaceholder, infoBox, downloadBtn);

        Scene scene = new Scene(root);
        scene.setFill(null);
        qrStage.setScene(scene);

        // Centrer
        qrStage.setOnShown(e -> {
            qrStage.setX(parentStage.getX() + (parentStage.getWidth() - root.getWidth()) / 2);
            qrStage.setY(parentStage.getY() + (parentStage.getHeight() - root.getHeight()) / 2);
        });

        qrStage.show();
    }

    /**
     * Affiche une notification temporaire sur un bouton
     */
    private void showTemporaryNotification(Button button, String text, String color) {
        String originalText = button.getText();
        String originalStyle = button.getStyle();

        button.setText(text);
        button.setStyle(
                "-fx-background-color: " + color + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-padding: 8 15;" +
                        "-fx-cursor: hand;" +
                        "-fx-font-size: 12;"
        );

        PauseTransition pause = new PauseTransition(Duration.seconds(2));
        pause.setOnFinished(e -> {
            button.setText(originalText);
            button.setStyle(originalStyle);
        });
        pause.play();
    }

    /**
     * Obtient le service d'hôte pour ouvrir des URLs
     */
    private javafx.application.HostServices getHostServices() {
        // Note: Dans un vrai contrôleur FXML, vous devriez passer HostServices depuis l'application principale
        return null;
    }

    /**
     * Obtient un aperçu du texte
     */
    private String getPreviewText(String text, int maxLength) {
        if (text == null) return "";
        if (text.length() <= maxLength) return text;
        return text.substring(0, maxLength) + "...";
    }

    /**
     * Affiche le dialogue de résumé moderne
     */
    private void showModernResumeDialog(Article article, String resume) {
        afficherFenetreResumeAmelioree(article, resume);
    }

    /**
     * Affiche un état vide
     */
    private void showEmptyState() {
        VBox emptyBox = new VBox(15);
        emptyBox.setAlignment(Pos.CENTER);
        emptyBox.setPadding(new Insets(50));

        Label icon = new Label("📭");
        icon.setStyle("-fx-font-size: 64;");

        Label title = new Label("Aucun article pour le moment");
        title.setStyle(
                "-fx-font-size: 20;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: " + DARK_COLOR + ";"
        );

        Label subtitle = new Label("Soyez le premier à poster un article dans ce forum !");
        subtitle.setStyle(
                "-fx-font-size: 14;" +
                        "-fx-text-fill: #6c757d;"
        );

        Button postBtn = new Button("📝 Poster un article");
        postBtn.setStyle(
                "-fx-background-color: " + PRIMARY_COLOR + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 25;" +
                        "-fx-padding: 12 25;" +
                        "-fx-cursor: hand;"
        );
        postBtn.setOnAction(e -> ouvrirFenetrePoster());

        emptyBox.getChildren().addAll(icon, title, subtitle, postBtn);
        articleContainer.getChildren().add(emptyBox);
    }

    /**
     * Filtre les articles
     */
    private void filterArticles(String query) {
        if (allArticles == null || query.isEmpty()) {
            displayArticles(allArticles);
            return;
        }

        List<Article> filtered = allArticles.stream()
                .filter(a -> a.getTitre().toLowerCase().contains(query.toLowerCase()) ||
                        a.getContenu().toLowerCase().contains(query.toLowerCase()))
                .toList();

        displayArticles(filtered);
    }

    /**
     * Trie les articles
     */
    private void sortArticles() {
        if (allArticles == null || sortCombo.getValue() == null) return;

        String sortBy = sortCombo.getValue();
        List<Article> sorted = allArticles;

        switch (sortBy) {
            case "Plus populaires":
                sorted = allArticles.stream()
                        .sorted((a1, a2) -> Integer.compare(calculateScore(a2), calculateScore(a1)))
                        .toList();
                break;
            case "Moins populaires":
                sorted = allArticles.stream()
                        .sorted((a1, a2) -> Integer.compare(calculateScore(a1), calculateScore(a2)))
                        .toList();
                break;
            case "Plus récents":
                sorted = allArticles.stream()
                        .sorted((a1, a2) -> a2.getDateCreation().compareTo(a1.getDateCreation()))
                        .toList();
                break;
            case "Plus anciens":
                sorted = allArticles.stream()
                        .sorted((a1, a2) -> a1.getDateCreation().compareTo(a2.getDateCreation()))
                        .toList();
                break;
            case "Alphabétique":
                sorted = allArticles.stream()
                        .sorted((a1, a2) -> a1.getTitre().compareToIgnoreCase(a2.getTitre()))
                        .toList();
                break;
        }

        displayArticles(sorted);
    }

    /**
     * Obtient les initiales d'un nom
     */
    private String getInitials(String name) {
        if (name == null || name.isEmpty()) return "A";
        String[] parts = name.split(" ");
        if (parts.length == 1) return parts[0].substring(0, 1).toUpperCase();
        return (parts[0].substring(0, 1) + parts[parts.length - 1].substring(0, 1)).toUpperCase();
    }

    /**
     * Développe le contenu d'un article
     */
    private void expandContent(Label body, Hyperlink link) {
        body.setMaxHeight(Double.MAX_VALUE);
        link.setText("Réduire");
        link.setOnAction(e -> collapseContent(body, link));
    }

    /**
     * Réduit le contenu d'un article
     */
    private void collapseContent(Label body, Hyperlink link) {
        body.setMaxHeight(100);
        link.setText("Lire plus");
        link.setOnAction(e -> expandContent(body, link));
    }

    // Méthodes existantes conservées...

    private void afficherCommentairesPopup(Article post) throws SQLException {
        List<Commentaire> commentaires = commentaireService.getCommentairesByPost(post.getIdPost());

        VBox root = new VBox(15);
        root.setPadding(new Insets(15));
        root.setStyle("-fx-background-color:white;");

        Label titrePopup = new Label("Commentaires — " + post.getTitre());
        titrePopup.setStyle("-fx-font-size:18; -fx-font-weight:bold;");
        root.getChildren().add(titrePopup);

        for (Commentaire c : commentaires) {
            HBox commentCard = new HBox(10);
            commentCard.setPadding(new Insets(10));
            commentCard.setStyle(
                    "-fx-background-color:#f7f9fc;" +
                            "-fx-background-radius:12;" +
                            "-fx-border-radius:12;" +
                            "-fx-border-color:#e3e9ef;"
            );

            Label avatar = new Label("A");
            avatar.setStyle(
                    "-fx-background-color:#4facfe;" +
                            "-fx-text-fill:white;" +
                            "-fx-font-weight:bold;" +
                            "-fx-alignment:center;" +
                            "-fx-min-width:32;" +
                            "-fx-min-height:32;" +
                            "-fx-background-radius:20;"
            );

            VBox content = new VBox(3);
            Label auteur = new Label("Anonyme");
            auteur.setStyle("-fx-font-weight:bold;");
            Label date = new Label(c.getDateCreation().toLocalDate().toString());
            date.setStyle("-fx-font-size:11; -fx-text-fill:#666;");
            Label texte = new Label(c.getContenu());
            texte.setWrapText(true);
            content.getChildren().addAll(auteur, date, texte);

            commentCard.getChildren().addAll(avatar, content);
            root.getChildren().add(commentCard);
        }

        ScrollPane scroll = new ScrollPane(root);
        scroll.setFitToWidth(true);

        Button close = new Button("Fermer");
        close.setStyle("-fx-background-color:#ff5e57; -fx-text-fill:white; -fx-background-radius:10;");
        close.setOnAction(e -> ((Stage) close.getScene().getWindow()).close());

        VBox box = new VBox(15, scroll, close);
        box.setPadding(new Insets(15));

        Stage stage = new Stage();
        stage.setScene(new Scene(box, 420, 520));
        stage.setTitle("Commentaires");
        stage.show();
    }

    @FXML
    private void ouvrirFenetrePoster() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/C.PosterArticle.fxml"));
            Parent root = loader.load();

            C_PosterArticleController controller = loader.getController();
            controller.setForumId(forumCourant.getIdForum());

            Stage stage = new Stage();
            stage.setTitle("Poster un nouvel article");
            stage.setScene(new Scene(root, 400, 400));
            stage.setOnHidden(e -> actualiserArticles());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    private String genererResumeIA(String texte) {
        try {
            return copilotService.generateSummary(texte);
        } catch (Exception e) {
            e.printStackTrace();
            return "❌ Résumé non disponible pour le moment. Veuillez réessayer plus tard.";
        }
    }

    private void afficherFenetreResumeAmelioree(Article article, String resume) {
        Stage stage = new Stage();
        stage.setTitle("Résumé IA - " + article.getTitre());
        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        // Conteneur principal
        BorderPane root = new BorderPane();
        root.setStyle("-fx-background-color: #f8fafd;");
        root.setPadding(new Insets(25));

        // --- EN-TÊTE ---
        VBox headerBox = new VBox(10);
        headerBox.setPadding(new Insets(0, 0, 20, 0));

        // Titre principal avec icône
        HBox titleBox = new HBox(10);
        titleBox.setAlignment(Pos.CENTER_LEFT);

        Label iconLabel = new Label("📝");
        iconLabel.setStyle("-fx-font-size: 32;");

        Label mainTitle = new Label("Résumé Intelligent");
        mainTitle.setStyle("-fx-font-size: 24; -fx-font-weight: bold; -fx-text-fill: #2c3e50;");

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        // Badge de l'article
        Label articleBadge = new Label("Article #" + article.getIdPost());
        articleBadge.setStyle(
                "-fx-background-color: #e9ecef;" +
                        "-fx-text-fill: #495057;" +
                        "-fx-font-size: 12;" +
                        "-fx-font-weight: bold;" +
                        "-fx-padding: 5 12;" +
                        "-fx-background-radius: 20;"
        );

        titleBox.getChildren().addAll(iconLabel, mainTitle, spacer, articleBadge);

        // Titre de l'article original
        Label articleTitle = new Label("« " + article.getTitre() + " »");
        articleTitle.setStyle(
                "-fx-font-size: 16;" +
                        "-fx-text-fill: #6c757d;" +
                        "-fx-font-style: italic;" +
                        "-fx-wrap-text: true;"
        );

        headerBox.getChildren().addAll(titleBox, articleTitle);

        // --- ZONE DE RÉSUMÉ ---
        VBox contentBox = new VBox(15);
        contentBox.setStyle(
                "-fx-background-color: white;" +
                        "-fx-background-radius: 15;" +
                        "-fx-padding: 20;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 15, 0, 0, 5);"
        );

        // Label "Résumé généré"
        Label summaryLabel = new Label("RÉSUMÉ GÉNÉRÉ");
        summaryLabel.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: #667eea;" +
                        "-fx-letter-spacing: 1px;"
        );

        // Zone de texte du résumé
        TextArea resumeArea = new TextArea(resume);
        resumeArea.setWrapText(true);
        resumeArea.setEditable(false);
        resumeArea.setPrefRowCount(8);
        resumeArea.setStyle(
                "-fx-font-size: 14;" +
                        "-fx-text-fill: #2c3e50;" +
                        "-fx-background-color: #f8f9fa;" +
                        "-fx-background-radius: 10;" +
                        "-fx-border-radius: 10;" +
                        "-fx-border-color: #e9ecef;" +
                        "-fx-border-width: 1;" +
                        "-fx-padding: 12;" +
                        "-fx-font-family: 'System';"
        );

        // Retirer le contour du focus
        resumeArea.setFocusTraversable(false);

        // Statistiques du résumé
        HBox statsBox = new HBox(20);
        statsBox.setAlignment(Pos.CENTER_LEFT);
        statsBox.setPadding(new Insets(10, 0, 0, 0));

        int mots = resume.split("\\s+").length;
        int caracteres = resume.length();

        Label motsLabel = new Label("📊 " + mots + " mots");
        motsLabel.setStyle("-fx-text-fill: #6c757d; -fx-font-size: 12;");

        Label charsLabel = new Label("📝 " + caracteres + " caractères");
        charsLabel.setStyle("-fx-text-fill: #6c757d; -fx-font-size: 12;");

        Label timeLabel = new Label("⏱️ Généré à " +
                java.time.LocalTime.now().format(java.time.format.DateTimeFormatter.ofPattern("HH:mm")));
        timeLabel.setStyle("-fx-text-fill: #6c757d; -fx-font-size: 12;");

        statsBox.getChildren().addAll(motsLabel, charsLabel, timeLabel);

        contentBox.getChildren().addAll(summaryLabel, resumeArea, statsBox);

        // --- BOUTONS D'ACTION ---
        HBox buttonBar = new HBox(12);
        buttonBar.setAlignment(Pos.CENTER_RIGHT);
        buttonBar.setPadding(new Insets(20, 0, 0, 0));

        // Bouton Copier
        Button copyBtn = new Button("📋 Copier le résumé");
        copyBtn.setStyle(
                "-fx-background-color: #667eea;" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-cursor: hand;" +
                        "-fx-padding: 10 20;" +
                        "-fx-font-size: 13;"
        );
        copyBtn.setOnMouseEntered(e -> copyBtn.setStyle(
                "-fx-background-color: #5a67d8;" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-cursor: hand;" +
                        "-fx-padding: 10 20;" +
                        "-fx-font-size: 13;" +
                        "-fx-effect: dropshadow(gaussian, rgba(102,126,234,0.4), 10, 0, 0, 2);"
        ));
        copyBtn.setOnMouseExited(e -> copyBtn.setStyle(
                "-fx-background-color: #667eea;" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-cursor: hand;" +
                        "-fx-padding: 10 20;" +
                        "-fx-font-size: 13;"
        ));

        copyBtn.setOnAction(ev -> {
            javafx.scene.input.Clipboard clipboard = javafx.scene.input.Clipboard.getSystemClipboard();
            javafx.scene.input.ClipboardContent content = new javafx.scene.input.ClipboardContent();
            content.putString(resume);
            clipboard.setContent(content);

            // Feedback visuel
            copyBtn.setText("✓ Copié !");
            copyBtn.setStyle(
                    "-fx-background-color: #48bb78;" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-background-radius: 10;" +
                            "-fx-cursor: hand;" +
                            "-fx-padding: 10 20;" +
                            "-fx-font-size: 13;"
            );

            // Restaurer le bouton après 2 secondes
            new Thread(() -> {
                try { Thread.sleep(2000); } catch (InterruptedException ex) {}
                javafx.application.Platform.runLater(() -> {
                    copyBtn.setText("📋 Copier le résumé");
                    copyBtn.setStyle(
                            "-fx-background-color: #667eea;" +
                                    "-fx-text-fill: white;" +
                                    "-fx-font-weight: bold;" +
                                    "-fx-background-radius: 10;" +
                                    "-fx-cursor: hand;" +
                                    "-fx-padding: 10 20;" +
                                    "-fx-font-size: 13;"
                    );
                });
            }).start();
        });

        // Bouton Fermer
        Button closeBtn = new Button("Fermer");
        closeBtn.setStyle(
                "-fx-background-color: #e53e3e;" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-cursor: hand;" +
                        "-fx-padding: 10 25;" +
                        "-fx-font-size: 13;"
        );
        closeBtn.setOnMouseEntered(e -> closeBtn.setStyle(
                "-fx-background-color: #c53030;" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-cursor: hand;" +
                        "-fx-padding: 10 25;" +
                        "-fx-font-size: 13;" +
                        "-fx-effect: dropshadow(gaussian, rgba(229,62,62,0.4), 10, 0, 0, 2);"
        ));
        closeBtn.setOnMouseExited(e -> closeBtn.setStyle(
                "-fx-background-color: #e53e3e;" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 10;" +
                        "-fx-cursor: hand;" +
                        "-fx-padding: 10 25;" +
                        "-fx-font-size: 13;"
        ));
        closeBtn.setOnAction(ev -> stage.close());

        buttonBar.getChildren().addAll(copyBtn, closeBtn);

        // Assemblage final
        root.setTop(headerBox);
        root.setCenter(contentBox);
        root.setBottom(buttonBar);

        // Création et affichage de la scène
        Scene scene = new Scene(root, 600, 500);
        stage.setScene(scene);
        stage.show();
    }
}