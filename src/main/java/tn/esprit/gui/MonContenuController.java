package tn.esprit.gui;

import javafx.animation.*;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import javafx.scene.shape.Rectangle;
import javafx.util.Duration;
import tn.esprit.models.Forum;
import tn.esprit.services.ForumService;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;
import java.util.stream.Collectors;

public class MonContenuController implements Initializable {

    @FXML
    private VBox doctorContainer;

    @FXML
    private TextField searchField;

    @FXML
    private ComboBox<String> filterCombo;

    @FXML
    private Label titleLabel;

    @FXML
    private Button refreshBtn;

    private ForumService forumService;
    private List<Forum> allForums;

    // 🎨 PALETTE DE COULEURS PERSONNALISÉE
    private static final String BEIGE_CLAIR = "#b1b099";      // Fond, arrière-plan
    private static final String JAUNE_SABLE = "#dbcd87";      // Accents, surlignage
    private static final String GRIS_VERT = "#d2d1c3";        // Bordures, séparateurs
    private static final String OLIVE_CLAIR = "#b7b05f";      // Éléments secondaires
    private static final String BRUN_TERRE = "#564433";       // Texte principal
    private static final String VERT_OLIVE = "#7e8343";       // Boutons, actions
    private static final String VERT_TENDRE = "#c8ce7d";      // Survol, succès
    private static final String VERT_PROFOND = "#666c12";     // Titres, éléments importants
    private static final String VERT_FEUILLE = "#72771c";     // Accents, icônes
    private static final String VERT_FORET = "#555e3c";       // Texte secondaire
    private static final String BEIGE_GRIS = "#8e8d74";       // Cartes, conteneurs
    private static final String VERT_CLAIR = "#9faf52";       // CTA, éléments dynamiques

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        forumService = new ForumService();
        setupUI();
        setupSearchAndFilter();
        loadForums();
    }

    /**
     * Configuration de l'interface utilisateur avec la palette personnalisée
     */
    private void setupUI() {
        // Style du conteneur principal - Fond beige clair apaisant
        doctorContainer.setStyle(
                "-fx-background-color: " + BEIGE_CLAIR + ";" +
                        "-fx-padding: 20;"
        );

        // Animation d'apparition progressive
        FadeTransition ft = new FadeTransition(Duration.millis(1200), doctorContainer);
        ft.setFromValue(0);
        ft.setToValue(1);
        ft.setInterpolator(Interpolator.EASE_IN);
        ft.play();

        // Style du titre - Vert profond pour l'ancrage
        if (titleLabel != null) {
            titleLabel.setText("🌿 Mes Forums");
            titleLabel.setStyle(
                    "-fx-font-size: 36;" +
                            "-fx-font-weight: bold;" +
                            "-fx-text-fill: " + VERT_PROFOND + ";" +
                            "-fx-effect: dropshadow(gaussian, rgba(102,108,18,0.2), 10, 0, 0, 2);" +
                            "-fx-font-family: 'Segoe UI', 'System';"
            );

            // Animation subtile du titre
            ScaleTransition st = new ScaleTransition(Duration.millis(800), titleLabel);
            st.setFromX(0.95);
            st.setFromY(0.95);
            st.setToX(1);
            st.setToY(1);
            st.setInterpolator(Interpolator.EASE_OUT);
            st.play();
        }

        // Style du bouton refresh - Vert olive pour l'action
        if (refreshBtn != null) {
            refreshBtn.setText("↻ Rafraîchir");
            refreshBtn.setStyle(
                    "-fx-background-color: " + VERT_OLIVE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 10 20;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "40, 10, 0, 0, 3);"
            );

            // Effet de survol - Vert tendre
            refreshBtn.setOnMouseEntered(e -> {
                refreshBtn.setStyle(
                        "-fx-background-color: " + VERT_TENDRE + ";" +
                                "-fx-text-fill: " + BRUN_TERRE + ";" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + VERT_TENDRE + "80, 15, 0, 0, 5);" +
                                "-fx-scale-x: 1.05;" +
                                "-fx-scale-y: 1.05;"
                );
            });

            refreshBtn.setOnMouseExited(e -> {
                refreshBtn.setStyle(
                        "-fx-background-color: " + VERT_OLIVE + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "40, 10, 0, 0, 3);" +
                                "-fx-scale-x: 1;" +
                                "-fx-scale-y: 1;"
                );
            });

            refreshBtn.setOnAction(e -> refreshForums());
        }
    }

    /**
     * Configuration de la recherche et du filtre
     */
    private void setupSearchAndFilter() {
        if (searchField != null) {
            searchField.setPromptText("🔍 Rechercher un forum...");
            searchField.setStyle(
                    "-fx-background-radius: 25;" +
                            "-fx-border-radius: 25;" +
                            "-fx-border-color: " + GRIS_VERT + ";" +
                            "-fx-border-width: 1.5;" +
                            "-fx-padding: 12 20;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-color: white;" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.03), 5, 0, 0, 2);" +
                            "-fx-prompt-text-fill: " + VERT_FORET + ";"
            );

            // Effet de focus - Bordure vert olive
            searchField.focusedProperty().addListener((obs, oldVal, newVal) -> {
                if (newVal) {
                    searchField.setStyle(
                            "-fx-background-radius: 25;" +
                                    "-fx-border-radius: 25;" +
                                    "-fx-border-color: " + VERT_OLIVE + ";" +
                                    "-fx-border-width: 2;" +
                                    "-fx-padding: 12 20;" +
                                    "-fx-font-size: 14;" +
                                    "-fx-background-color: white;" +
                                    "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "20, 10, 0, 0, 2);"
                    );
                } else {
                    searchField.setStyle(
                            "-fx-background-radius: 25;" +
                                    "-fx-border-radius: 25;" +
                                    "-fx-border-color: " + GRIS_VERT + ";" +
                                    "-fx-border-width: 1.5;" +
                                    "-fx-padding: 12 20;" +
                                    "-fx-font-size: 14;" +
                                    "-fx-background-color: white;" +
                                    "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.03), 5, 0, 0, 2);"
                    );
                }
            });

            // Recherche en temps réel
            searchField.textProperty().addListener((obs, oldVal, newVal) -> {
                filterForums(newVal);
            });
        }

        if (filterCombo != null) {
            filterCombo.getItems().addAll(
                    "🌿 Tous les forums",
                    "✅ Actifs",
                    "📦 Archivés",
                    "🔤 Ordre alphabétique"
            );
            filterCombo.setValue("🌿 Tous les forums");
            filterCombo.setStyle(
                    "-fx-background-radius: 25;" +
                            "-fx-border-radius: 25;" +
                            "-fx-border-color: " + GRIS_VERT + ";" +
                            "-fx-padding: 8 15;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-color: white;" +
                            "-fx-font-weight: 500;"
            );

            filterCombo.setOnAction(e -> applyFilter());
        }
    }

    /**
     * Charge les forums depuis la base de données
     */
    private void loadForums() {
        showLoadingIndicator();

        // Chargement asynchrone
        new Thread(() -> {
            try {
                Thread.sleep(600);
                allForums = forumService.afficher();

                javafx.application.Platform.runLater(() -> {
                    hideLoadingIndicator();
                    displayForums(allForums);
                    showSuccessNotification(allForums.size() + " forums chargés");
                });
            } catch (SQLException | InterruptedException e) {
                e.printStackTrace();
                javafx.application.Platform.runLater(() -> {
                    hideLoadingIndicator();
                    showError("Erreur de chargement", "Impossible de charger les forums");
                });
            }
        }).start();
    }

    /**
     * Affiche les forums
     */
    private void displayForums(List<Forum> forums) {
        doctorContainer.getChildren().clear();

        if (forums.isEmpty()) {
            showEmptyState();
            return;
        }

        // Grille pour les cartes
        GridPane grid = new GridPane();
        grid.setHgap(25);
        grid.setVgap(25);
        grid.setPadding(new Insets(15));

        int column = 0;
        int row = 0;

        for (Forum forum : forums) {
            VBox card = createNatureForumCard(forum);
            grid.add(card, column, row);

            column++;
            if (column > 1) {
                column = 0;
                row++;
            }

            // Animation d'apparition
            FadeTransition ft = new FadeTransition(Duration.millis(600), card);
            ft.setFromValue(0);
            ft.setToValue(1);
            ft.setDelay(Duration.millis(row * 120 + column * 60));
            ft.setInterpolator(Interpolator.EASE_OUT);
            ft.play();
        }

        // Centrer si un seul forum
        if (forums.size() == 1) {
            HBox centerBox = new HBox(grid);
            centerBox.setAlignment(Pos.CENTER);
            doctorContainer.getChildren().add(centerBox);
        } else {
            doctorContainer.getChildren().add(grid);
        }
    }

    /**
     * Crée une carte de forum avec le thème naturel
     */
    private VBox createNatureForumCard(Forum forum) {
        VBox card = new VBox(15);
        card.setPrefWidth(340);
        card.setPadding(new Insets(0));
        card.setStyle(
                "-fx-background-color: white;" +
                        "-fx-background-radius: 24;" +
                        "-fx-effect: dropshadow(gaussian, rgba(86,68,51,0.15), 20, 0, 0, 5);" +
                        "-fx-cursor: hand;" +
                        "-fx-border-width: 1;" +
                        "-fx-border-color: " + GRIS_VERT + ";" +
                        "-fx-border-radius: 24;"
        );

        // Image d'en-tête
        StackPane imageContainer = new StackPane();
        imageContainer.setPrefHeight(180);

        ImageView imageView = createForumImageView();

        // Overlay avec dégradé naturel
        Rectangle gradientOverlay = new Rectangle(340, 180);
        gradientOverlay.setArcHeight(24);
        gradientOverlay.setArcWidth(24);
        gradientOverlay.setStyle(
                "-fx-fill: linear-gradient(to bottom, rgba(126,131,67,0.3), rgba(86,68,51,0.8));"
        );

        // Badge de statut
        Label statusBadge = createNatureStatusBadge(forum.getStatut());
        StackPane.setMargin(statusBadge, new Insets(12, 0, 0, 12));
        StackPane.setAlignment(statusBadge, Pos.TOP_LEFT);

        // Titre sur l'image
        Label titleOnImage = new Label(forum.getNomForum());
        titleOnImage.setStyle(
                "-fx-font-size: 20;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: white;" +
                        "-fx-wrap-text: true;" +
                        "-fx-effect: dropshadow(gaussian, rgba(86,68,51,0.5), 8, 0, 0, 2);" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );
        titleOnImage.setMaxWidth(300);
        StackPane.setMargin(titleOnImage, new Insets(0, 0, 20, 15));
        StackPane.setAlignment(titleOnImage, Pos.BOTTOM_LEFT);

        imageContainer.getChildren().addAll(imageView, gradientOverlay, statusBadge, titleOnImage);

        // Contenu de la carte
        VBox contentBox = new VBox(15);
        contentBox.setPadding(new Insets(18, 18, 20, 18));

        // Description
        Label description = new Label(forum.getDescription());
        description.setWrapText(true);
        description.setStyle(
                "-fx-font-size: 13.5;" +
                        "-fx-text-fill: " + BRUN_TERRE + ";" +
                        "-fx-line-spacing: 4;" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );
        description.setMaxHeight(65);

        // Séparateur
        Separator separator = new Separator();
        separator.setStyle("-fx-background-color: " + GRIS_VERT + "; -fx-padding: 0;");

        // Informations supplémentaires
        HBox infoBox = new HBox(20);
        infoBox.setAlignment(Pos.CENTER_LEFT);
        infoBox.setPadding(new Insets(5, 0, 5, 0));

        // ID du forum
        Label idIcon = new Label("🆔");
        idIcon.setStyle("-fx-font-size: 14;");

        Label idLabel = new Label("Forum #" + forum.getIdForum());
        idLabel.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-text-fill: " + VERT_FORET + ";" +
                        "-fx-font-weight: 500;"
        );

        HBox idBox = new HBox(5, idIcon, idLabel);
        idBox.setAlignment(Pos.CENTER_LEFT);

        // Statistiques simulées
        Label statsIcon = new Label("📊");
        statsIcon.setStyle("-fx-font-size: 14;");

        int articleCount = (int)(Math.random() * 30) + 1;
        Label statsLabel = new Label(articleCount + " articles");
        statsLabel.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-text-fill: " + VERT_FORET + ";" +
                        "-fx-font-weight: 500;"
        );

        HBox statsBox = new HBox(5, statsIcon, statsLabel);
        statsBox.setAlignment(Pos.CENTER_LEFT);

        infoBox.getChildren().addAll(idBox, statsBox);

        // Bouton d'action
        Button viewButton = createNatureViewButton(forum);

        contentBox.getChildren().addAll(description, separator, infoBox, viewButton);

        card.getChildren().addAll(imageContainer, contentBox);

        // Effet de survol
        card.setOnMouseEntered(e -> {
            card.setStyle(
                    "-fx-background-color: white;" +
                            "-fx-background-radius: 24;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "40, 30, 0, 0, 10);" +
                            "-fx-border-width: 1;" +
                            "-fx-border-color: " + VERT_OLIVE + ";" +
                            "-fx-border-radius: 24;" +
                            "-fx-scale-x: 1.02;" +
                            "-fx-scale-y: 1.02;"
            );

            ScaleTransition st = new ScaleTransition(Duration.millis(200), imageView);
            st.setToX(1.05);
            st.setToY(1.05);
            st.play();
        });

        card.setOnMouseExited(e -> {
            card.setStyle(
                    "-fx-background-color: white;" +
                            "-fx-background-radius: 24;" +
                            "-fx-effect: dropshadow(gaussian, rgba(86,68,51,0.15), 20, 0, 0, 5);" +
                            "-fx-border-width: 1;" +
                            "-fx-border-color: " + GRIS_VERT + ";" +
                            "-fx-border-radius: 24;" +
                            "-fx-scale-x: 1;" +
                            "-fx-scale-y: 1;"
            );

            ScaleTransition st = new ScaleTransition(Duration.millis(200), imageView);
            st.setToX(1);
            st.setToY(1);
            st.play();
        });

        card.setOnMouseClicked(e -> ouvrirArticles(forum));

        return card;
    }

    /**
     * Crée l'image du forum
     */
    private ImageView createForumImageView() {
        ImageView img = new ImageView();
        img.setFitWidth(340);
        img.setFitHeight(180);
        img.setPreserveRatio(false);

        try {
            Image image = new Image(getClass().getResourceAsStream("/images/télécharger (12).jpg"));
            if (image != null && !image.isError()) {
                img.setImage(image);
            } else {
                img.setStyle("-fx-background-color: linear-gradient(to right, " + VERT_OLIVE + ", " + VERT_TENDRE + ");");
            }
        } catch (Exception e) {
            img.setStyle("-fx-background-color: linear-gradient(to right, " + VERT_OLIVE + ", " + VERT_TENDRE + ");");
        }

        return img;
    }

    /**
     * Crée un badge de statut avec les couleurs naturelles
     */
    private Label createNatureStatusBadge(String statut) {
        String statusText = statut != null ? statut : "Actif";
        String color;
        String textColor = "white";

        if ("actif".equalsIgnoreCase(statusText) || "Actif".equalsIgnoreCase(statusText)) {
            color = VERT_FEUILLE; // Vert feuille pour l'activité
        } else if ("archivé".equalsIgnoreCase(statusText) || "Archivé".equalsIgnoreCase(statusText)) {
            color = BEIGE_GRIS; // Beige gris pour l'archivage
        } else {
            color = JAUNE_SABLE; // Jaune sable pour les autres statuts
        }

        Label badge = new Label("● " + statusText);
        badge.setStyle(
                "-fx-background-color: " + color + ";" +
                        "-fx-text-fill: " + textColor + ";" +
                        "-fx-font-weight: 600;" +
                        "-fx-font-size: 11;" +
                        "-fx-padding: 5 12;" +
                        "-fx-background-radius: 20;" +
                        "-fx-effect: dropshadow(gaussian, " + color + "80, 5, 0, 0, 2);" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        return badge;
    }

    /**
     * Crée le bouton Voir plus avec les couleurs naturelles
     */
    private Button createNatureViewButton(Forum forum) {
        Button viewBtn = new Button("Explorer le forum →");
        viewBtn.setMaxWidth(Double.MAX_VALUE);
        viewBtn.setStyle(
                "-fx-background-color: " + VERT_OLIVE + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: 600;" +
                        "-fx-font-size: 13;" +
                        "-fx-background-radius: 12;" +
                        "-fx-padding: 12 15;" +
                        "-fx-cursor: hand;" +
                        "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "30, 8, 0, 0, 2);" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        viewBtn.setOnMouseEntered(e -> {
            viewBtn.setStyle(
                    "-fx-background-color: " + VERT_FEUILLE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 12 15;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_FEUILLE + "80, 12, 0, 0, 4);" +
                            "-fx-translate-y: -2;"
            );
        });

        viewBtn.setOnMouseExited(e -> {
            viewBtn.setStyle(
                    "-fx-background-color: " + VERT_OLIVE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 12 15;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "30, 8, 0, 0, 2);" +
                            "-fx-translate-y: 0;"
            );
        });

        viewBtn.setOnAction(e -> ouvrirArticles(forum));

        return viewBtn;
    }

    /**
     * Filtre les forums par recherche
     */
    private void filterForums(String query) {
        if (allForums == null) return;

        if (query == null || query.isEmpty()) {
            applyFilter();
            return;
        }

        List<Forum> filtered = allForums.stream()
                .filter(f -> f.getNomForum().toLowerCase().contains(query.toLowerCase()) ||
                        f.getDescription().toLowerCase().contains(query.toLowerCase()))
                .collect(Collectors.toList());

        displayForums(filtered);

        if (filtered.size() == 0) {
            showInfo("Aucun résultat pour '" + query + "'");
        }
    }

    /**
     * Applique le filtre sélectionné
     */
    private void applyFilter() {
        if (allForums == null || filterCombo.getValue() == null) return;

        String filter = filterCombo.getValue();
        List<Forum> filtered = allForums;

        switch (filter) {
            case "✅ Actifs":
                filtered = allForums.stream()
                        .filter(f -> "actif".equalsIgnoreCase(f.getStatut()))
                        .collect(Collectors.toList());
                break;
            case "📦 Archivés":
                filtered = allForums.stream()
                        .filter(f -> "archivé".equalsIgnoreCase(f.getStatut()))
                        .collect(Collectors.toList());
                break;
            case "🔤 Ordre alphabétique":
                filtered = allForums.stream()
                        .sorted((f1, f2) -> f1.getNomForum().compareToIgnoreCase(f2.getNomForum()))
                        .collect(Collectors.toList());
                break;
            default:
                break;
        }

        displayForums(filtered);
    }

    /**
     * Rafraîchit la liste des forums
     */
    private void refreshForums() {
        RotateTransition rt = new RotateTransition(Duration.millis(600), refreshBtn);
        rt.setByAngle(360);
        rt.setCycleCount(1);
        rt.setInterpolator(Interpolator.EASE_OUT);
        rt.play();

        rt.setOnFinished(e -> loadForums());
    }

    /**
     * Affiche un indicateur de chargement
     */
    private void showLoadingIndicator() {
        VBox loadingBox = new VBox(20);
        loadingBox.setAlignment(Pos.CENTER);
        loadingBox.setPadding(new Insets(60));

        ProgressIndicator indicator = new ProgressIndicator();
        indicator.setPrefSize(60, 60);
        indicator.setStyle("-fx-progress-color: " + VERT_OLIVE + ";");

        Label label = new Label("Chargement des forums...");
        label.setStyle(
                "-fx-font-size: 15;" +
                        "-fx-text-fill: " + BRUN_TERRE + ";" +
                        "-fx-font-weight: 500;" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        FadeTransition ft = new FadeTransition(Duration.millis(1500), label);
        ft.setFromValue(0.6);
        ft.setToValue(1);
        ft.setCycleCount(Animation.INDEFINITE);
        ft.setAutoReverse(true);
        ft.play();

        loadingBox.getChildren().addAll(indicator, label);
        doctorContainer.getChildren().setAll(loadingBox);
    }

    /**
     * Cache l'indicateur de chargement
     */
    private void hideLoadingIndicator() {}

    /**
     * Affiche un état vide
     */
    private void showEmptyState() {
        VBox emptyBox = new VBox(25);
        emptyBox.setAlignment(Pos.CENTER);
        emptyBox.setPadding(new Insets(60));
        emptyBox.setStyle(
                "-fx-background-color: white;" +
                        "-fx-background-radius: 30;" +
                        "-fx-effect: dropshadow(gaussian, rgba(86,68,51,0.1), 20, 0, 0, 5);"
        );

        Label icon = new Label("🌱");
        icon.setStyle("-fx-font-size: 80;");

        Label title = new Label("Bienvenue dans vos forums !");
        title.setStyle(
                "-fx-font-size: 24;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: " + VERT_PROFOND + ";" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        Label subtitle = new Label("Créez votre premier forum pour commencer l'aventure");
        subtitle.setStyle(
                "-fx-font-size: 15;" +
                        "-fx-text-fill: " + VERT_FORET + ";" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        Button createBtn = new Button("+ Créer un forum");
        createBtn.setStyle(
                "-fx-background-color: " + VERT_OLIVE + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-font-size: 14;" +
                        "-fx-background-radius: 30;" +
                        "-fx-padding: 15 30;" +
                        "-fx-cursor: hand;" +
                        "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "40, 15, 0, 0, 5);"
        );

        createBtn.setOnMouseEntered(e -> {
            createBtn.setStyle(
                    "-fx-background-color: " + VERT_FEUILLE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-radius: 30;" +
                            "-fx-padding: 15 30;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_FEUILLE + "80, 20, 0, 0, 8);" +
                            "-fx-scale-x: 1.05;" +
                            "-fx-scale-y: 1.05;"
            );
        });

        createBtn.setOnMouseExited(e -> {
            createBtn.setStyle(
                    "-fx-background-color: " + VERT_OLIVE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-radius: 30;" +
                            "-fx-padding: 15 30;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_OLIVE + "40, 15, 0, 0, 5);" +
                            "-fx-scale-x: 1;" +
                            "-fx-scale-y: 1;"
            );
        });

        emptyBox.getChildren().addAll(icon, title, subtitle, createBtn);

        StackPane centerPane = new StackPane(emptyBox);
        centerPane.setPadding(new Insets(20));
        doctorContainer.getChildren().add(centerPane);
    }

    private void showSuccessNotification(String message) {
        System.out.println("✅ " + message);
    }

    private void showInfo(String message) {
        System.out.println("ℹ️ " + message);
    }

    private void showError(String title, String message) {
        javafx.application.Platform.runLater(() -> {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle(title);
            alert.setHeaderText(null);
            alert.setContentText(message);
            alert.getDialogPane().setStyle(
                    "-fx-background-color: white;" +
                            "-fx-font-family: 'Segoe UI', 'System';"
            );
            alert.showAndWait();
        });
    }

    private void ouvrirArticles(Forum forum) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/ArticleList.fxml"));
            Parent root = loader.load();

            ArticleListController controller = loader.getController();
            controller.setForum(forum);

            Scene currentScene = doctorContainer.getScene();
            if (currentScene != null) {
                currentScene.setRoot(root);

                FadeTransition ft = new FadeTransition(Duration.millis(600), root);
                ft.setFromValue(0);
                ft.setToValue(1);
                ft.setInterpolator(Interpolator.EASE_IN);
                ft.play();
            }

        } catch (Exception e) {
            e.printStackTrace();
            showError("Erreur", "Impossible d'ouvrir le forum");
        }
    }

    @FXML
    private void MonContenu(javafx.event.ActionEvent event) {
        System.out.println("Bouton MonContenu cliqué !");

        Button btn = (Button) event.getSource();
        ScaleTransition st = new ScaleTransition(Duration.millis(200), btn);
        st.setFromX(1);
        st.setFromY(1);
        st.setToX(0.9);
        st.setToY(0.9);
        st.setAutoReverse(true);
        st.setCycleCount(2);
        st.setInterpolator(Interpolator.EASE_OUT);
        st.play();
    }
}