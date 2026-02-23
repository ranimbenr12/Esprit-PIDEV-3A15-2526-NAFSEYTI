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

public class ArticleListController {

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

    // Couleurs du thème
    private static final String PRIMARY_COLOR = "#4361ee";
    private static final String SECONDARY_COLOR = "#3f37c9";
    private static final String ACCENT_COLOR = "#4cc9f0";
    private static final String SUCCESS_COLOR = "#06d6a0";
    private static final String DANGER_COLOR = "#ef476f";
    private static final String WARNING_COLOR = "#ffd166";
    private static final String DARK_COLOR = "#2b2d42";
    private static final String LIGHT_COLOR = "#f8f9fa";
    @FXML
    private void retournerVersForums() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/MonContenu.fxml"));
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
            sortCombo.getItems().addAll("Plus récents", "Plus anciens", "Plus aimés", "Alphabétique");
            sortCombo.setValue("Plus récents");
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
     * Affiche les articles avec filtrage
     */
    private void displayArticles(List<Article> articles) {
        articleContainer.getChildren().clear();

        if (articles.isEmpty()) {
            showEmptyState();
            return;
        }

        for (Article article : articles) {
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

        // Boutons d'action
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

        Label authorName = new Label( "Anonyme");
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

        // Badge de catégorie (aléatoire pour l'exemple)
        Label categoryBadge = createCategoryBadge();

        header.getChildren().addAll(avatar, authorInfo, spacer, categoryBadge);

        return header;
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
        Label likesLabel = new Label("❤️ " + article.getLikeCount());
        likesLabel.setStyle(
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
            stats.getChildren().addAll(likesLabel, commentsLabel);
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
        Button likeBtn = createStyledButton("❤️ J'aime", PRIMARY_COLOR, SECONDARY_COLOR);
        likeBtn.setOnAction(e -> handleModernLike(article, likeBtn));

        // Bouton Résumé IA
        Button resumeBtn = createStyledButton("📝 Résumé IA", "#9c88ff", "#8c78ff");
        resumeBtn.setOnAction(e -> generateModernResume(article));

        // Bouton Partager
        Button shareBtn = createStyledButton("📤 Partager", "#4cc9f0", "#3ab7e0");
        shareBtn.setOnAction(e -> showShareDialog(article));

        actions.getChildren().addAll(likeBtn, resumeBtn, shareBtn);

        return actions;
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
     * Gère le like de façon moderne
     */
    private void handleModernLike(Article article, Button likeBtn) {
        try {
            articleService.ajouterLike(article.getIdPost());
            article.setLikeCount(article.getLikeCount() + 1);

            // Animation du bouton
            ScaleTransition st = new ScaleTransition(Duration.millis(200), likeBtn);
            st.setFromX(1);
            st.setFromY(1);
            st.setToX(1.3);
            st.setToY(1.3);
            st.setAutoReverse(true);
            st.setCycleCount(2);
            st.play();

            // Changer la couleur
            likeBtn.setStyle(
                    "-fx-background-color: #ef476f;" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 8 15;" +
                            "-fx-cursor: hand;"
            );
            likeBtn.setText("❤️ " + article.getLikeCount());

            showSuccessNotification("Like ajouté !");

        } catch (SQLException ex) {
            showError("Erreur", "Impossible d'ajouter le like");
            ex.printStackTrace();
        }
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
     * Affiche un dialogue de partage
     */
    private void showShareDialog(Article article) {
        // À implémenter selon vos besoins
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Partager");
        alert.setHeaderText("Partager l'article");
        alert.setContentText("Lien de partage : article_" + article.getIdPost());
        alert.showAndWait();
    }

    /**
     * Affiche le dialogue de résumé moderne
     */
    private void showModernResumeDialog(Article article, String resume) {
        // Réutilisation de votre méthode existante ou nouvelle implémentation
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
            case "Plus aimés":
                sorted = allArticles.stream()
                        .sorted((a1, a2) -> Integer.compare(a2.getLikeCount(), a1.getLikeCount()))
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
     * Crée un badge de catégorie aléatoire
     */
    private Label createCategoryBadge() {
        String[] categories = {"Général", "Question", "Discussion", "Annonce", "Tutoriel"};
        String[] colors = {PRIMARY_COLOR, SUCCESS_COLOR, WARNING_COLOR, ACCENT_COLOR, DANGER_COLOR};

        Random rand = new Random();
        int index = rand.nextInt(categories.length);

        Label badge = new Label(categories[index]);
        badge.setStyle(
                "-fx-background-color: " + colors[index] + "20;" +
                        "-fx-text-fill: " + colors[index] + ";" +
                        "-fx-font-weight: bold;" +
                        "-fx-font-size: 11;" +
                        "-fx-padding: 3 10;" +
                        "-fx-background-radius: 12;" +
                        "-fx-border-color: " + colors[index] + "40;" +
                        "-fx-border-radius: 12;" +
                        "-fx-border-width: 1;"
        );

        return badge;
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
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/PosterArticle.fxml"));
            Parent root = loader.load();

            PosterArticleController controller = loader.getController();
            controller.setForumId(forumCourant.getIdForum());

            Stage stage = new Stage();
            stage.setTitle("Poster un nouvel article");
            stage.setScene(new Scene(root, 400, 400));
            stage.setOnHidden(e -> actualiserArticles());
            stage.show();
        } catch (IOException e) { e.printStackTrace(); }
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