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
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.stream.Collectors;

public class PsyContenu implements Initializable {

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

    @FXML
    private Button addForumBtn;

    @FXML
    private Button statsBtn;

    private ForumService forumService;
    private List<Forum> allForums;

    // 🎨 PALETTE DE COULEURS PERSONNALISÉE (thème plus professionnel)
    private static final String BLEU_PROFOND = "#2c3e50";      // Fond, arrière-plan principal
    private static final String BLEU_CLAIR = "#3498db";        // Actions primaires
    private static final String VERT_SAUGE = "#2ecc71";        // Succès, actif
    private static final String ORANGE_DOUX = "#e67e22";       // Avertissements
    private static final String ROUGE_DOUX = "#e74c3c";        // Suppression, danger
    private static final String GRIS_CLAIR = "#ecf0f1";        // Fond des cartes
    private static final String GRIS_MOYEN = "#bdc3c7";        // Bordures
    private static final String TEXTE_PRINCIPAL = "#2c3e50";   // Texte principal
    private static final String TEXTE_SECONDAIRE = "#7f8c8d";  // Texte secondaire
    private static final String BLANC = "#ffffff";             // Blanc pur
    private static final String VIOLET_DOUX = "#9b59b6";       // Statistiques

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        forumService = new ForumService();
        setupUI();
        setupSearchAndFilter();
        loadForums();
    }

    /**
     * Configuration de l'interface utilisateur pour le psychologue
     */
    private void setupUI() {
        // Style du conteneur principal
        doctorContainer.setStyle(
                "-fx-background-color: " + BLEU_PROFOND + ";" +
                        "-fx-padding: 20;"
        );

        // Animation d'apparition
        FadeTransition ft = new FadeTransition(Duration.millis(1200), doctorContainer);
        ft.setFromValue(0);
        ft.setToValue(1);
        ft.setInterpolator(Interpolator.EASE_IN);
        ft.play();

        // Style du titre
        if (titleLabel != null) {
            titleLabel.setText("👨‍⚕️ Espace Psychologue - Gestion des Forums");
            titleLabel.setStyle(
                    "-fx-font-size: 32;" +
                            "-fx-font-weight: bold;" +
                            "-fx-text-fill: " + BLANC + ";" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.3), 10, 0, 0, 2);" +
                            "-fx-font-family: 'Segoe UI', 'System';"
            );

            ScaleTransition st = new ScaleTransition(Duration.millis(800), titleLabel);
            st.setFromX(0.95);
            st.setFromY(0.95);
            st.setToX(1);
            st.setToY(1);
            st.setInterpolator(Interpolator.EASE_OUT);
            st.play();
        }

        // Style du bouton Ajouter
        if (addForumBtn != null) {
            addForumBtn.setText("➕ Nouveau Forum");
            addForumBtn.setStyle(
                    "-fx-background-color: " + VERT_SAUGE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 10 20;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_SAUGE + "40, 10, 0, 0, 3);"
            );

            addForumBtn.setOnMouseEntered(e -> {
                addForumBtn.setStyle(
                        "-fx-background-color: " + VERT_SAUGE + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + VERT_SAUGE + "80, 15, 0, 0, 5);" +
                                "-fx-scale-x: 1.05;" +
                                "-fx-scale-y: 1.05;"
                );
            });

            addForumBtn.setOnMouseExited(e -> {
                addForumBtn.setStyle(
                        "-fx-background-color: " + VERT_SAUGE + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + VERT_SAUGE + "40, 10, 0, 0, 3);" +
                                "-fx-scale-x: 1;" +
                                "-fx-scale-y: 1;"
                );
            });

            addForumBtn.setOnAction(e -> ouvrirCreationForum());
        }

        // Style du bouton Statistiques
        if (statsBtn != null) {
            statsBtn.setText("📊 Tableau de bord");
            statsBtn.setStyle(
                    "-fx-background-color: " + VIOLET_DOUX + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 10 20;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VIOLET_DOUX + "40, 10, 0, 0, 3);"
            );

            statsBtn.setOnMouseEntered(e -> {
                statsBtn.setStyle(
                        "-fx-background-color: " + VIOLET_DOUX + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + VIOLET_DOUX + "80, 15, 0, 0, 5);" +
                                "-fx-scale-x: 1.05;" +
                                "-fx-scale-y: 1.05;"
                );
            });

            statsBtn.setOnMouseExited(e -> {
                statsBtn.setStyle(
                        "-fx-background-color: " + VIOLET_DOUX + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + VIOLET_DOUX + "40, 10, 0, 0, 3);" +
                                "-fx-scale-x: 1;" +
                                "-fx-scale-y: 1;"
                );
            });

            statsBtn.setOnAction(e -> ouvrirStatistiques());
        }

        // Style du bouton refresh
        if (refreshBtn != null) {
            refreshBtn.setText("↻ Actualiser");
            refreshBtn.setStyle(
                    "-fx-background-color: " + BLEU_CLAIR + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 13;" +
                            "-fx-background-radius: 25;" +
                            "-fx-padding: 10 20;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + BLEU_CLAIR + "40, 10, 0, 0, 3);"
            );

            refreshBtn.setOnMouseEntered(e -> {
                refreshBtn.setStyle(
                        "-fx-background-color: " + BLEU_CLAIR + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + BLEU_CLAIR + "80, 15, 0, 0, 5);" +
                                "-fx-scale-x: 1.05;" +
                                "-fx-scale-y: 1.05;"
                );
            });

            refreshBtn.setOnMouseExited(e -> {
                refreshBtn.setStyle(
                        "-fx-background-color: " + BLEU_CLAIR + ";" +
                                "-fx-text-fill: white;" +
                                "-fx-font-weight: bold;" +
                                "-fx-font-size: 13;" +
                                "-fx-background-radius: 25;" +
                                "-fx-padding: 10 20;" +
                                "-fx-cursor: hand;" +
                                "-fx-effect: dropshadow(gaussian, " + BLEU_CLAIR + "40, 10, 0, 0, 3);" +
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
                            "-fx-border-color: " + GRIS_MOYEN + ";" +
                            "-fx-border-width: 1.5;" +
                            "-fx-padding: 12 20;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-color: white;" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.03), 5, 0, 0, 2);" +
                            "-fx-prompt-text-fill: " + TEXTE_SECONDAIRE + ";"
            );

            searchField.focusedProperty().addListener((obs, oldVal, newVal) -> {
                if (newVal) {
                    searchField.setStyle(
                            "-fx-background-radius: 25;" +
                                    "-fx-border-radius: 25;" +
                                    "-fx-border-color: " + BLEU_CLAIR + ";" +
                                    "-fx-border-width: 2;" +
                                    "-fx-padding: 12 20;" +
                                    "-fx-font-size: 14;" +
                                    "-fx-background-color: white;" +
                                    "-fx-effect: dropshadow(gaussian, " + BLEU_CLAIR + "20, 10, 0, 0, 2);"
                    );
                } else {
                    searchField.setStyle(
                            "-fx-background-radius: 25;" +
                                    "-fx-border-radius: 25;" +
                                    "-fx-border-color: " + GRIS_MOYEN + ";" +
                                    "-fx-border-width: 1.5;" +
                                    "-fx-padding: 12 20;" +
                                    "-fx-font-size: 14;" +
                                    "-fx-background-color: white;" +
                                    "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.03), 5, 0, 0, 2);"
                    );
                }
            });

            searchField.textProperty().addListener((obs, oldVal, newVal) -> {
                filterForums(newVal);
            });
        }

        if (filterCombo != null) {
            filterCombo.getItems().addAll(
                    "📋 Tous les forums",
                    "✅ Actifs",
                    "📦 Archivés",
                    "📊 Plus actifs",
                    "🕒 Plus récents",
                    "🔤 Ordre alphabétique"
            );
            filterCombo.setValue("📋 Tous les forums");
            filterCombo.setStyle(
                    "-fx-background-radius: 25;" +
                            "-fx-border-radius: 25;" +
                            "-fx-border-color: " + GRIS_MOYEN + ";" +
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
     * Affiche les forums avec options de gestion
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
            VBox card = createPsychologueForumCard(forum);
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

        if (forums.size() == 1) {
            HBox centerBox = new HBox(grid);
            centerBox.setAlignment(Pos.CENTER);
            doctorContainer.getChildren().add(centerBox);
        } else {
            doctorContainer.getChildren().add(grid);
        }
    }

    /**
     * Crée une carte de forum pour le psychologue avec options de gestion
     */
    private VBox createPsychologueForumCard(Forum forum) {
        VBox card = new VBox(15);
        card.setPrefWidth(340);
        card.setPadding(new Insets(0));
        card.setStyle(
                "-fx-background-color: " + GRIS_CLAIR + ";" +
                        "-fx-background-radius: 24;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 20, 0, 0, 5);" +
                        "-fx-cursor: hand;" +
                        "-fx-border-width: 1;" +
                        "-fx-border-color: " + GRIS_MOYEN + ";" +
                        "-fx-border-radius: 24;"
        );

        // Image d'en-tête
        StackPane imageContainer = new StackPane();
        imageContainer.setPrefHeight(180);

        ImageView imageView = createForumImageView();

        Rectangle gradientOverlay = new Rectangle(340, 180);
        gradientOverlay.setArcHeight(24);
        gradientOverlay.setArcWidth(24);
        gradientOverlay.setStyle(
                "-fx-fill: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(44,62,80,0.7));"
        );

        // Badge de statut
        Label statusBadge = createStatusBadge(forum.getStatut());
        StackPane.setMargin(statusBadge, new Insets(12, 0, 0, 12));
        StackPane.setAlignment(statusBadge, Pos.TOP_LEFT);

        // Titre sur l'image
        Label titleOnImage = new Label(forum.getNomForum());
        titleOnImage.setStyle(
                "-fx-font-size: 20;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: white;" +
                        "-fx-wrap-text: true;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.5), 8, 0, 0, 2);" +
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
                        "-fx-text-fill: " + TEXTE_PRINCIPAL + ";" +
                        "-fx-line-spacing: 4;" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );
        description.setMaxHeight(65);

        // Séparateur
        Separator separator = new Separator();
        separator.setStyle("-fx-background-color: " + GRIS_MOYEN + "; -fx-padding: 0;");

        // Informations supplémentaires
        HBox infoBox = new HBox(20);
        infoBox.setAlignment(Pos.CENTER_LEFT);
        infoBox.setPadding(new Insets(5, 0, 5, 0));

        // Statistiques
        Label participantsIcon = new Label("👥");
        participantsIcon.setStyle("-fx-font-size: 14;");

        int participantCount = (int)(Math.random() * 50) + 5;
        Label participantsLabel = new Label(participantCount + " participants");
        participantsLabel.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-text-fill: " + TEXTE_SECONDAIRE + ";" +
                        "-fx-font-weight: 500;"
        );

        HBox participantsBox = new HBox(5, participantsIcon, participantsLabel);
        participantsBox.setAlignment(Pos.CENTER_LEFT);

        // Articles
        Label articlesIcon = new Label("📝");
        articlesIcon.setStyle("-fx-font-size: 14;");

        int articleCount = (int)(Math.random() * 30) + 1;
        Label articlesLabel = new Label(articleCount + " articles");
        articlesLabel.setStyle(
                "-fx-font-size: 12;" +
                        "-fx-text-fill: " + TEXTE_SECONDAIRE + ";" +
                        "-fx-font-weight: 500;"
        );

        HBox articlesBox = new HBox(5, articlesIcon, articlesLabel);
        articlesBox.setAlignment(Pos.CENTER_LEFT);

        infoBox.getChildren().addAll(participantsBox, articlesBox);

        // Boutons d'action
        HBox actionBox = new HBox(10);
        actionBox.setAlignment(Pos.CENTER);

        // Bouton Gérer (ouvrir)
        Button manageBtn = createManageButton(forum);

        // Bouton Modifier
        Button editBtn = createEditButton(forum);

        // Bouton Supprimer
        Button deleteBtn = createDeleteButton(forum);

        actionBox.getChildren().addAll(manageBtn, editBtn, deleteBtn);
        HBox.setHgrow(manageBtn, Priority.ALWAYS);
        HBox.setHgrow(editBtn, Priority.ALWAYS);
        HBox.setHgrow(deleteBtn, Priority.ALWAYS);

        contentBox.getChildren().addAll(description, separator, infoBox, actionBox);
        card.getChildren().addAll(imageContainer, contentBox);

        // Effet de survol
        card.setOnMouseEntered(e -> {
            card.setStyle(
                    "-fx-background-color: " + GRIS_CLAIR + ";" +
                            "-fx-background-radius: 24;" +
                            "-fx-effect: dropshadow(gaussian, " + BLEU_CLAIR + "40, 30, 0, 0, 10);" +
                            "-fx-border-width: 1;" +
                            "-fx-border-color: " + BLEU_CLAIR + ";" +
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
                    "-fx-background-color: " + GRIS_CLAIR + ";" +
                            "-fx-background-radius: 24;" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 20, 0, 0, 5);" +
                            "-fx-border-width: 1;" +
                            "-fx-border-color: " + GRIS_MOYEN + ";" +
                            "-fx-border-radius: 24;" +
                            "-fx-scale-x: 1;" +
                            "-fx-scale-y: 1;"
            );

            ScaleTransition st = new ScaleTransition(Duration.millis(200), imageView);
            st.setToX(1);
            st.setToY(1);
            st.play();
        });

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
            Image image = new Image(getClass().getResourceAsStream("/images/forum-default.jpg"));
            if (image != null && !image.isError()) {
                img.setImage(image);
            } else {
                img.setStyle("-fx-background-color: linear-gradient(to right, " + BLEU_CLAIR + ", " + VIOLET_DOUX + ");");
            }
        } catch (Exception e) {
            img.setStyle("-fx-background-color: linear-gradient(to right, " + BLEU_CLAIR + ", " + VIOLET_DOUX + ");");
        }

        return img;
    }

    /**
     * Crée un badge de statut
     */
    private Label createStatusBadge(String statut) {
        String statusText = statut != null ? statut : "Actif";
        String color;
        String textColor = "white";

        if ("actif".equalsIgnoreCase(statusText) || "Actif".equalsIgnoreCase(statusText)) {
            color = VERT_SAUGE;
        } else if ("archivé".equalsIgnoreCase(statusText) || "Archivé".equalsIgnoreCase(statusText)) {
            color = GRIS_MOYEN;
            textColor = TEXTE_PRINCIPAL;
        } else {
            color = ORANGE_DOUX;
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
     * Crée le bouton Gérer
     */
    private Button createManageButton(Forum forum) {
        Button btn = new Button("Gérer");
        btn.setMaxWidth(Double.MAX_VALUE);
        btn.setStyle(
                "-fx-background-color: " + BLEU_CLAIR + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: 600;" +
                        "-fx-font-size: 12;" +
                        "-fx-background-radius: 12;" +
                        "-fx-padding: 8 10;" +
                        "-fx-cursor: hand;"
        );

        btn.setOnMouseEntered(e -> {
            btn.setStyle(
                    "-fx-background-color: " + BLEU_CLAIR + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 8 10;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + BLEU_CLAIR + "80, 8, 0, 0, 2);" +
                            "-fx-translate-y: -2;"
            );
        });

        btn.setOnMouseExited(e -> {
            btn.setStyle(
                    "-fx-background-color: " + BLEU_CLAIR + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 8 10;" +
                            "-fx-cursor: hand;" +
                            "-fx-translate-y: 0;"
            );
        });

        btn.setOnAction(e -> ouvrirGestionForum(forum));

        return btn;
    }

    /**
     * Crée le bouton Modifier
     */
    private Button createEditButton(Forum forum) {
        Button btn = new Button("✎ Modifier");
        btn.setMaxWidth(Double.MAX_VALUE);
        btn.setStyle(
                "-fx-background-color: " + ORANGE_DOUX + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: 600;" +
                        "-fx-font-size: 12;" +
                        "-fx-background-radius: 12;" +
                        "-fx-padding: 8 10;" +
                        "-fx-cursor: hand;"
        );

        btn.setOnMouseEntered(e -> {
            btn.setStyle(
                    "-fx-background-color: " + ORANGE_DOUX + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 8 10;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + ORANGE_DOUX + "80, 8, 0, 0, 2);" +
                            "-fx-translate-y: -2;"
            );
        });

        btn.setOnMouseExited(e -> {
            btn.setStyle(
                    "-fx-background-color: " + ORANGE_DOUX + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 8 10;" +
                            "-fx-cursor: hand;" +
                            "-fx-translate-y: 0;"
            );
        });

        btn.setOnAction(e -> ouvrirModificationForum(forum));

        return btn;
    }

    /**
     * Crée le bouton Supprimer avec confirmation
     */
    private Button createDeleteButton(Forum forum) {
        Button btn = new Button("🗑 Supprimer");
        btn.setMaxWidth(Double.MAX_VALUE);
        btn.setStyle(
                "-fx-background-color: " + ROUGE_DOUX + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: 600;" +
                        "-fx-font-size: 12;" +
                        "-fx-background-radius: 12;" +
                        "-fx-padding: 8 10;" +
                        "-fx-cursor: hand;"
        );

        btn.setOnMouseEntered(e -> {
            btn.setStyle(
                    "-fx-background-color: " + ROUGE_DOUX + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 8 10;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + ROUGE_DOUX + "80, 8, 0, 0, 2);" +
                            "-fx-translate-y: -2;"
            );
        });

        btn.setOnMouseExited(e -> {
            btn.setStyle(
                    "-fx-background-color: " + ROUGE_DOUX + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: 600;" +
                            "-fx-font-size: 12;" +
                            "-fx-background-radius: 12;" +
                            "-fx-padding: 8 10;" +
                            "-fx-cursor: hand;" +
                            "-fx-translate-y: 0;"
            );
        });

        btn.setOnAction(e -> supprimerForum(forum));

        return btn;
    }

    /**
     * Supprime un forum avec confirmation
     */
    private void supprimerForum(Forum forum) {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation de suppression");
        alert.setHeaderText("Supprimer le forum : " + forum.getNomForum());
        alert.setContentText("Êtes-vous sûr de vouloir supprimer ce forum ?\n" +
                "Cette action est irréversible et supprimera tous les articles associés.");

        alert.getDialogPane().setStyle(
                "-fx-background-color: white;" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        ButtonType buttonTypeOui = new ButtonType("Oui, supprimer");
        ButtonType buttonTypeNon = new ButtonType("Non, annuler");

        alert.getButtonTypes().setAll(buttonTypeOui, buttonTypeNon);

        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == buttonTypeOui) {
            try {
                forumService.supprimer(forum);
                showSuccessNotification("Forum supprimé avec succès");
                loadForums(); // Recharger la liste
            } catch (SQLException e) {
                e.printStackTrace();
                showError("Erreur", "Impossible de supprimer le forum");
            }
        }
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

        if (filtered.isEmpty()) {
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
            case "📊 Plus actifs":
                filtered = allForums.stream()
                        .sorted((f1, f2) -> Integer.compare(
                                (int)(Math.random() * 50), // Simulation d'activité
                                (int)(Math.random() * 50)
                        ))
                        .collect(Collectors.toList());
                break;
            case "🕒 Plus récents":
                filtered = allForums.stream()
                        .sorted((f1, f2) -> Integer.compare(f2.getIdForum(), f1.getIdForum()))
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
        indicator.setStyle("-fx-progress-color: " + BLEU_CLAIR + ";");

        Label label = new Label("Chargement des forums...");
        label.setStyle(
                "-fx-font-size: 15;" +
                        "-fx-text-fill: " + BLANC + ";" +
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
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 20, 0, 0, 5);"
        );

        Label icon = new Label("📚");
        icon.setStyle("-fx-font-size: 80;");

        Label title = new Label("Aucun forum pour le moment");
        title.setStyle(
                "-fx-font-size: 24;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: " + TEXTE_PRINCIPAL + ";" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        Label subtitle = new Label("Créez votre premier forum pour commencer à animer votre communauté");
        subtitle.setStyle(
                "-fx-font-size: 15;" +
                        "-fx-text-fill: " + TEXTE_SECONDAIRE + ";" +
                        "-fx-font-family: 'Segoe UI', 'System';"
        );

        Button createBtn = new Button("+ Créer un forum");
        createBtn.setStyle(
                "-fx-background-color: " + VERT_SAUGE + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-font-weight: bold;" +
                        "-fx-font-size: 14;" +
                        "-fx-background-radius: 30;" +
                        "-fx-padding: 15 30;" +
                        "-fx-cursor: hand;" +
                        "-fx-effect: dropshadow(gaussian, " + VERT_SAUGE + "40, 15, 0, 0, 5);"
        );

        createBtn.setOnMouseEntered(e -> {
            createBtn.setStyle(
                    "-fx-background-color: " + VERT_SAUGE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-radius: 30;" +
                            "-fx-padding: 15 30;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_SAUGE + "80, 20, 0, 0, 8);" +
                            "-fx-scale-x: 1.05;" +
                            "-fx-scale-y: 1.05;"
            );
        });

        createBtn.setOnMouseExited(e -> {
            createBtn.setStyle(
                    "-fx-background-color: " + VERT_SAUGE + ";" +
                            "-fx-text-fill: white;" +
                            "-fx-font-weight: bold;" +
                            "-fx-font-size: 14;" +
                            "-fx-background-radius: 30;" +
                            "-fx-padding: 15 30;" +
                            "-fx-cursor: hand;" +
                            "-fx-effect: dropshadow(gaussian, " + VERT_SAUGE + "40, 15, 0, 0, 5);" +
                            "-fx-scale-x: 1;" +
                            "-fx-scale-y: 1;"
            );
        });

        createBtn.setOnAction(e -> ouvrirCreationForum());

        emptyBox.getChildren().addAll(icon, title, subtitle, createBtn);

        StackPane centerPane = new StackPane(emptyBox);
        centerPane.setPadding(new Insets(20));
        doctorContainer.getChildren().add(centerPane);
    }

    /**
     * Affiche une notification de succès
     */
    private void showSuccessNotification(String message) {
        // Simulation de notification
        System.out.println("✅ " + message);

        // Animation du bouton refresh
        if (refreshBtn != null) {
            ScaleTransition st = new ScaleTransition(Duration.millis(200), refreshBtn);
            st.setFromX(1);
            st.setFromY(1);
            st.setToX(1.1);
            st.setToY(1.1);
            st.setAutoReverse(true);
            st.setCycleCount(2);
            st.play();
        }
    }

    /**
     * Affiche une information
     */
    private void showInfo(String message) {
        System.out.println("ℹ️ " + message);
    }

    /**
     * Affiche une erreur
     */
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

    /**
     * Ouvre la page de création de forum
     */
    private void ouvrirCreationForum() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/CreationForum.fxml"));
            Parent root = loader.load();

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
            showError("Erreur", "Impossible d'ouvrir la page de création");
        }
    }

    /**
     * Ouvre la page de modification de forum
     */
    private void ouvrirModificationForum(Forum forum) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/ModifierForum.fxml"));
            Parent root = loader.load();

            // Passer le forum au contrôleur de modification
            ModifierForumController controller = loader.getController();
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
            showError("Erreur", "Impossible d'ouvrir la page de modification");
        }
    }

    /**
     * Ouvre la page de gestion du forum (articles)
     */
    private void ouvrirGestionForum(Forum forum) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/C.ArticleListfxml"));
            Parent root = loader.load();

            C_ArticleListController controller = loader.getController();
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
            showError("Erreur", "Impossible d'ouvrir la gestion du forum");
        }
    }

    /**
     * Ouvre les statistiques
     */
    private void ouvrirStatistiques() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/StatistiquesForums.fxml"));
            Parent root = loader.load();

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
            showError("Erreur", "Impossible d'ouvrir les statistiques");
        }
    }

    @FXML
    private void MonContenu(javafx.event.ActionEvent event) {
        System.out.println("Navigation vers Mon Contenu...");

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