package tn.esprit.projet.gui;

import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.effect.DropShadow;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.stage.Modality;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.view.EventService;
import tn.esprit.projet.view.PlanificationService;

import java.io.File;
import java.sql.SQLException;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.time.format.TextStyle;
import java.util.*;

public class PsychologueController{

    @FXML
    private BorderPane mainBorderPane;

    @FXML
    private Button btnAccueil, btnRendezVous, btnContenu, btnTests, btnEvenements, btnSuivi, btnFeedback;

    private EventService eventService;
    private PlanificationService planificationService;
    private List<Event> allEvents;
    private List<Planification> allPlanifications;
    private VBox eventsContainer;
    private TextField searchField;
    private Set<Integer> likedEventIds;
    private Button showLikedButton;
    private boolean showingOnlyLiked = false;

    @FXML
    public void initialize() {
        System.out.println("Client interface loaded successfully!");

        eventService = new EventService();
        planificationService = new PlanificationService();
        allEvents = new ArrayList<>();
        allPlanifications = new ArrayList<>();
        likedEventIds = new HashSet<>();

        // Handle click for Événements et Ateliers
        btnEvenements.setOnAction(event -> {
            highlightButton(btnEvenements);
            openBlankPage();
        });

        // Handle click for Mes Rendez-vous
        btnRendezVous.setOnAction(event -> handleBtnRendezVous());

        btnAccueil.setOnAction(event -> highlightButton(btnAccueil));
        btnContenu.setOnAction(event -> highlightButton(btnContenu));
        btnTests.setOnAction(event -> highlightButton(btnTests));
        btnSuivi.setOnAction(event -> highlightButton(btnSuivi));
        btnFeedback.setOnAction(event -> highlightButton(btnFeedback));
    }

    @FXML
    private void handleBtnRendezVous() {
        highlightButton(btnRendezVous);
        System.out.println("Mes rendez-vous clicked!");
    }

    // Highlight selected button
    private void highlightButton(Button clickedButton) {
        Button[] buttons = {btnAccueil, btnRendezVous, btnContenu, btnTests, btnEvenements, btnSuivi, btnFeedback};
        for (Button btn : buttons) {
            if (btn.equals(clickedButton)) {
                btn.setStyle("-fx-background-color: #285921; -fx-text-fill: white; -fx-alignment: CENTER_LEFT; " +
                        "-fx-padding: 10; -fx-font-size: 14px; -fx-background-radius: 8;");
            } else {
                btn.setStyle("-fx-background-color: transparent; -fx-text-fill: #69685c; -fx-alignment: CENTER_LEFT; " +
                        "-fx-padding: 10; -fx-font-size: 14px; -fx-background-radius: 8;");
            }
        }
    }

    // Load a page with search bar + sort options inside the center
    private void openBlankPage() {
        VBox blankPage = new VBox(25);
        blankPage.setStyle("-fx-background-color: linear-gradient(to bottom right, #f5f1ed 0%, #e8efe8 50%, #f0ede5 100%);");
        blankPage.setPrefSize(1000, 600);
        blankPage.setPadding(new Insets(30));

        // ===== Psychology-themed Header with Mind/Brain Theme =====
        VBox headerBox = new VBox(10);
        headerBox.setAlignment(Pos.CENTER_LEFT);

        HBox titleRow = new HBox(12);
        titleRow.setAlignment(Pos.CENTER_LEFT);

        // Create icon - try to load image, fallback to symbol
        StackPane iconContainer = new StackPane();
        iconContainer.setPrefSize(40, 40);
        iconContainer.setStyle("-fx-background-color: #285921; " +
                "-fx-background-radius: 50%; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.3), 8, 0, 0, 2);");

        // Try to load brain icon image
        try {
            ImageView brainIcon = new ImageView(new Image(getClass().getResourceAsStream("/images/brain-icon.png")));
            brainIcon.setFitWidth(30);
            brainIcon.setFitHeight(30);
            brainIcon.setPreserveRatio(true);
            iconContainer.getChildren().add(brainIcon);
        } catch (Exception e) {
            // Fallback to text symbol if image not found
            Label fallbackIcon = new Label("Ψ");
            fallbackIcon.setStyle("-fx-font-size: 28px; " +
                    "-fx-font-weight: bold; " +
                    "-fx-text-fill: white;");
            iconContainer.getChildren().add(fallbackIcon);
        }

        VBox titleBox = new VBox(5);
        Label headerTitle = new Label("Événements & Planifications");
        headerTitle.setStyle("-fx-font-size: 30px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: #285921; " +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.15), 2, 0, 0, 1);");

        Label headerSubtitle = new Label("🌱 Cultivez votre bien-être mental et épanouissement personnel");
        headerSubtitle.setStyle("-fx-font-size: 14px; " +
                "-fx-text-fill: #5a6c5a; " +
                "-fx-font-style: italic; " +
                "-fx-font-weight: 500;");

        titleBox.getChildren().addAll(headerTitle, headerSubtitle);
        titleRow.getChildren().addAll(iconContainer, titleBox);

        // ===== ADD ADMIN BUTTONS (Ajouter, Modifier, Supprimer) =====
        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        Button btnAjouter = createAdminButton("➕ Ajouter", "#4CAF50", "#45a049");
        btnAjouter.setOnAction(e -> openCreateEventWindow());

        titleRow.getChildren().addAll(spacer, btnAjouter);
        headerBox.getChildren().add(titleRow);

        // ===== Psychology-themed Search and Sort Bar =====
        HBox searchSortBox = new HBox(15);
        searchSortBox.setPadding(new Insets(18));
        searchSortBox.setAlignment(Pos.CENTER_LEFT);
        searchSortBox.setStyle("-fx-background-color: linear-gradient(to right, rgba(255,255,255,0.95), rgba(245,241,237,0.95)); " +
                "-fx-background-radius: 20; " +
                "-fx-border-color: rgba(40, 89, 33, 0.25); " +
                "-fx-border-width: 1.5; " +
                "-fx-border-radius: 20; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.15), 12, 0, 0, 4);");

        // Calming Search bar with mind icon
        searchField = new TextField();
        searchField.setPromptText("🔍  Recherchez votre atelier de bien-être...");
        searchField.setPrefWidth(420);
        searchField.setStyle("-fx-font-size: 14px; " +
                "-fx-padding: 14 18 14 18; " +
                "-fx-background-radius: 15; " +
                "-fx-border-radius: 15; " +
                "-fx-border-color: rgba(40, 89, 33, 0.3); " +
                "-fx-border-width: 2; " +
                "-fx-background-color: white; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.1), 4, 0, 0, 2);");

        searchField.setOnMouseEntered(e -> searchField.setStyle("-fx-font-size: 14px; " +
                "-fx-padding: 14 18 14 18; " +
                "-fx-background-radius: 15; " +
                "-fx-border-radius: 15; " +
                "-fx-border-color: rgba(40, 89, 33, 0.6); " +
                "-fx-border-width: 2; " +
                "-fx-background-color: white; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.25), 8, 0, 0, 3);"));

        searchField.setOnMouseExited(e -> searchField.setStyle("-fx-font-size: 14px; " +
                "-fx-padding: 14 18 14 18; " +
                "-fx-background-radius: 15; " +
                "-fx-border-radius: 15; " +
                "-fx-border-color: rgba(40, 89, 33, 0.3); " +
                "-fx-border-width: 2; " +
                "-fx-background-color: white; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.1), 4, 0, 0, 2);"));

        // Add search listener
        searchField.textProperty().addListener((observable, oldValue, newValue) -> {
            filterAndDisplayEvents(newValue);
        });

        // Wellness-themed Sort button
        MenuButton sortButton = new MenuButton("✨ Trier par");
        sortButton.setStyle("-fx-font-size: 14px; " +
                "-fx-background-radius: 15; " +
                "-fx-border-radius: 15; " +
                "-fx-background-color: linear-gradient(135deg, #a8e6cf 0%, #7ec8a3 100%); " +
                "-fx-text-fill: #000000; " +
                "-fx-padding: 14 22 14 22; " +
                "-fx-font-weight: bold; " +
                "-fx-effect: dropshadow(gaussian, rgba(126, 200, 163, 0.4), 8, 0, 0, 3);");

        sortButton.setOnMouseEntered(e -> {
            sortButton.setStyle("-fx-font-size: 14px; " +
                    "-fx-background-radius: 15; " +
                    "-fx-border-radius: 15; " +
                    "-fx-background-color: linear-gradient(135deg, #7ec8a3 0%, #5fb88b 100%); " +
                    "-fx-text-fill: #000000; " +
                    "-fx-padding: 14 22 14 22; " +
                    "-fx-font-weight: bold; " +
                    "-fx-cursor: hand; " +
                    "-fx-effect: dropshadow(gaussian, rgba(126, 200, 163, 0.6), 12, 0, 0, 4);");
            sortButton.setTranslateY(-2);
        });

        sortButton.setOnMouseExited(e -> {
            sortButton.setStyle("-fx-font-size: 14px; " +
                    "-fx-background-radius: 15; " +
                    "-fx-border-radius: 15; " +
                    "-fx-background-color: linear-gradient(135deg, #a8e6cf 0%, #7ec8a3 100%); " +
                    "-fx-text-fill: #000000; " +
                    "-fx-padding: 14 22 14 22; " +
                    "-fx-font-weight: bold; " +
                    "-fx-effect: dropshadow(gaussian, rgba(126, 200, 163, 0.4), 8, 0, 0, 3);");
            sortButton.setTranslateY(0);
        });

        MenuItem sortTitle = new MenuItem("📚  Par Titre (A → Z)");
        sortTitle.setStyle("-fx-padding: 10 18 10 18; -fx-font-size: 13px; -fx-text-fill: #000000;");

        MenuItem sortDate = new MenuItem("📅  Par Date (Récent)");
        sortDate.setStyle("-fx-padding: 10 18 10 18; -fx-font-size: 13px; -fx-text-fill: #000000;");

        MenuItem sortDuration = new MenuItem("🎯  Par Activités");
        sortDuration.setStyle("-fx-padding: 10 18 10 18; -fx-font-size: 13px; -fx-text-fill: #000000;");

        sortButton.getItems().addAll(sortTitle, sortDate, sortDuration);

        // Sort actions
        sortTitle.setOnAction(e -> {
            sortEventsByTitle();
            displayEvents(getCurrentFilteredEvents());
        });

        sortDate.setOnAction(e -> {
            sortEventsByDate();
            displayEvents(getCurrentFilteredEvents());
        });

        sortDuration.setOnAction(e -> {
            sortEventsByDuration();
            displayEvents(getCurrentFilteredEvents());
        });

        // Favorites button with beige/brown theme
        showLikedButton = new Button("💛 Mes Favoris");
        showLikedButton.setStyle("-fx-font-size: 14px; " +
                "-fx-background-radius: 15; " +
                "-fx-border-radius: 15; " +
                "-fx-background-color: linear-gradient(135deg, #d4b896 0%, #c9b99b 100%); " +
                "-fx-text-fill: #000000; " +
                "-fx-padding: 14 22 14 22; " +
                "-fx-font-weight: bold; " +
                "-fx-effect: dropshadow(gaussian, rgba(201, 185, 155, 0.4), 8, 0, 0, 3);");

        showLikedButton.setOnMouseEntered(e -> showLikedButton.setStyle("-fx-font-size: 14px; " +
                "-fx-background-radius: 15; " +
                "-fx-border-radius: 15; " +
                "-fx-background-color: linear-gradient(135deg, #c9b99b 0%, #b8a888 100%); " +
                "-fx-text-fill: #000000; " +
                "-fx-padding: 14 22 14 22; " +
                "-fx-font-weight: bold; " +
                "-fx-cursor: hand; " +
                "-fx-effect: dropshadow(gaussian, rgba(201, 185, 155, 0.6), 12, 0, 0, 4);"));

        showLikedButton.setOnMouseExited(e -> {
            if (!showingOnlyLiked) {
                showLikedButton.setStyle("-fx-font-size: 14px; " +
                        "-fx-background-radius: 15; " +
                        "-fx-border-radius: 15; " +
                        "-fx-background-color: linear-gradient(135deg, #d4b896 0%, #c9b99b 100%); " +
                        "-fx-text-fill: #000000; " +
                        "-fx-padding: 14 22 14 22; " +
                        "-fx-font-weight: bold; " +
                        "-fx-effect: dropshadow(gaussian, rgba(201, 185, 155, 0.4), 8, 0, 0, 3);");
            }
        });

        showLikedButton.setOnAction(e -> {
            showingOnlyLiked = !showingOnlyLiked;
            if (showingOnlyLiked) {
                showLikedButton.setText("🌟 Tous");
                showLikedButton.setStyle("-fx-font-size: 14px; " +
                        "-fx-background-radius: 15; " +
                        "-fx-border-radius: 15; " +
                        "-fx-background-color: linear-gradient(135deg, #a8e6cf 0%, #7ec8a3 100%); " +
                        "-fx-text-fill: #000000; " +
                        "-fx-padding: 14 22 14 22; " +
                        "-fx-font-weight: bold; " +
                        "-fx-effect: dropshadow(gaussian, rgba(126, 200, 163, 0.5), 8, 0, 0, 3);");
            } else {
                showLikedButton.setText("💛 Mes Favoris");
                showLikedButton.setStyle("-fx-font-size: 14px; " +
                        "-fx-background-radius: 15; " +
                        "-fx-border-radius: 15; " +
                        "-fx-background-color: linear-gradient(135deg, #d4b896 0%, #c9b99b 100%); " +
                        "-fx-text-fill: #000000; " +
                        "-fx-padding: 14 22 14 22; " +
                        "-fx-font-weight: bold; " +
                        "-fx-effect: dropshadow(gaussian, rgba(201, 185, 155, 0.4), 8, 0, 0, 3);");
            }
            displayEvents(getCurrentFilteredEvents());
        });

        // Event count badge with green theme
        Label eventCount = new Label();
        eventCount.setStyle("-fx-font-size: 13px; " +
                "-fx-text-fill: #285921; " +
                "-fx-padding: 10 18 10 18; " +
                "-fx-background-color: rgba(40, 89, 33, 0.1); " +
                "-fx-background-radius: 25; " +
                "-fx-font-weight: bold; " +
                "-fx-border-color: rgba(40, 89, 33, 0.3); " +
                "-fx-border-width: 1.5; " +
                "-fx-border-radius: 25;");

        Region spacer2 = new Region();
        HBox.setHgrow(spacer2, Priority.ALWAYS);

        searchSortBox.getChildren().addAll(searchField, sortButton, showLikedButton, spacer2, eventCount);

        // ===== ScrollPane for events =====
        ScrollPane scrollPane = new ScrollPane();
        scrollPane.setFitToWidth(true);
        scrollPane.setStyle("-fx-background-color: transparent; -fx-background: transparent;");
        scrollPane.setPrefHeight(500);
        scrollPane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
        scrollPane.setHbarPolicy(ScrollPane.ScrollBarPolicy.NEVER);

        eventsContainer = new VBox(22);
        eventsContainer.setPadding(new Insets(15));
        eventsContainer.setStyle("-fx-background-color: transparent;");

        scrollPane.setContent(eventsContainer);

        // Load and display events
        loadEventsAndPlanifications();

        // Update count badge
        eventCount.setText("🎯 " + allEvents.size() + " événement" + (allEvents.size() > 1 ? "s" : ""));

        // Add all to the main VBox
        blankPage.getChildren().addAll(headerBox, searchSortBox, scrollPane);

        mainBorderPane.setCenter(blankPage);
    }

    // ===== CREATE ADMIN BUTTON HELPER =====
    private Button createAdminButton(String text, String normalColor, String hoverColor) {
        Button btn = new Button(text);
        btn.setStyle("-fx-font-size: 14px; " +
                "-fx-background-radius: 12; " +
                "-fx-border-radius: 12; " +
                "-fx-background-color: " + normalColor + "; " +
                "-fx-text-fill: white; " +
                "-fx-padding: 12 24 12 24; " +
                "-fx-font-weight: bold; " +
                "-fx-effect: dropshadow(gaussian, rgba(0, 0, 0, 0.3), 6, 0, 0, 2);");

        btn.setOnMouseEntered(e -> {
            btn.setStyle("-fx-font-size: 14px; " +
                    "-fx-background-radius: 12; " +
                    "-fx-border-radius: 12; " +
                    "-fx-background-color: " + hoverColor + "; " +
                    "-fx-text-fill: white; " +
                    "-fx-padding: 12 24 12 24; " +
                    "-fx-font-weight: bold; " +
                    "-fx-cursor: hand; " +
                    "-fx-effect: dropshadow(gaussian, rgba(0, 0, 0, 0.4), 10, 0, 0, 3);");
            btn.setTranslateY(-2);
        });

        btn.setOnMouseExited(e -> {
            btn.setStyle("-fx-font-size: 14px; " +
                    "-fx-background-radius: 12; " +
                    "-fx-border-radius: 12; " +
                    "-fx-background-color: " + normalColor + "; " +
                    "-fx-text-fill: white; " +
                    "-fx-padding: 12 24 12 24; " +
                    "-fx-font-weight: bold; " +
                    "-fx-effect: dropshadow(gaussian, rgba(0, 0, 0, 0.3), 6, 0, 0, 2);");
            btn.setTranslateY(0);
        });

        return btn;
    }

    // ===== OPEN CREATE EVENT WINDOW =====
    private void openCreateEventWindow() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/PsychoCreate.fxml"));
            Parent root = loader.load();

            Stage stage = new Stage();
            stage.setTitle("Créer un événement");
            stage.initModality(Modality.APPLICATION_MODAL);
            stage.setScene(new Scene(root));
            stage.showAndWait();

            // Reload events after closing
            loadEventsAndPlanifications();

        } catch (Exception e) {
            e.printStackTrace();
            showError("Erreur lors de l'ouverture de la fenêtre de création: " + e.getMessage());
        }
    }

    // ===== OPEN EDIT EVENT WINDOW =====
    private void openEditEventWindow(Event event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/PsychoEdit.fxml"));
            Parent root = loader.load();

            PsychoEditController controller = loader.getController();
            controller.setEvent(event);

            Stage stage = new Stage();
            stage.setTitle("Modifier l'événement");
            stage.initModality(Modality.APPLICATION_MODAL);
            stage.setScene(new Scene(root));
            stage.showAndWait();

            // Reload events after closing
            loadEventsAndPlanifications();

        } catch (Exception e) {
            e.printStackTrace();
            showError("Erreur lors de l'ouverture de la fenêtre d'édition: " + e.getMessage());
        }
    }

    // ===== DELETE EVENT =====
    private void deleteEvent(Event event) {
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Supprimer l'événement");
        confirmAlert.setContentText("Êtes-vous sûr de vouloir supprimer l'événement \"" + event.getTitle() + "\" ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                // Delete associated planifications first
                List<Planification> eventPlans = allPlanifications.stream()
                        .filter(p -> p.getIdEvent() == event.getId())
                        .toList();

                for (Planification plan : eventPlans) {
                    planificationService.deletOne(plan);
                }

                // Delete event
                eventService.deletOne(event);

                // Reload events
                loadEventsAndPlanifications();

                showInfo("Événement supprimé avec succès!");

            } catch (SQLException e) {
                e.printStackTrace();
                showError("Erreur lors de la suppression: " + e.getMessage());
            }
        }
    }

    private void loadEventsAndPlanifications() {
        try {
            allEvents = eventService.selectAll();
            allPlanifications = planificationService.selectAll();
            displayEvents(allEvents);
        } catch (SQLException e) {
            e.printStackTrace();
            showError("Erreur lors du chargement des événements: " + e.getMessage());
        }
    }

    private List<Event> getCurrentFilteredEvents() {
        if (showingOnlyLiked) {
            return allEvents.stream()
                    .filter(e -> likedEventIds.contains(e.getId()))
                    .toList();
        }
        return allEvents;
    }

    private void displayEvents(List<Event> events) {
        eventsContainer.getChildren().clear();

        if (events.isEmpty()) {
            VBox emptyState = new VBox(20);
            emptyState.setAlignment(Pos.CENTER);
            emptyState.setPadding(new Insets(70));
            emptyState.setStyle("-fx-background-color: linear-gradient(to bottom right, rgba(255,255,255,0.95), rgba(245,241,237,0.95)); " +
                    "-fx-background-radius: 25; " +
                    "-fx-border-color: rgba(40, 89, 33, 0.25); " +
                    "-fx-border-width: 2; " +
                    "-fx-border-radius: 25; " +
                    "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.1), 12, 0, 0, 4);");

            Label emptyIcon = new Label(showingOnlyLiked ? "💛" : "🌸");
            emptyIcon.setStyle("-fx-font-size: 72px;");

            Label emptyText = new Label(showingOnlyLiked ? "Aucun événement dans vos favoris" : "Aucun événement trouvé");
            emptyText.setStyle("-fx-font-size: 22px; -fx-font-weight: bold; -fx-text-fill: #285921;");

            Label emptySubtext = new Label(showingOnlyLiked ?
                    "💫 Ajoutez des ateliers à vos favoris pour les retrouver facilement" :
                    "🌱 Essayez une autre recherche ou revenez bientôt");
            emptySubtext.setStyle("-fx-font-size: 14px; -fx-text-fill: #5a6c5a; -fx-text-alignment: center;");
            emptySubtext.setWrapText(true);
            emptySubtext.setMaxWidth(400);

            emptyState.getChildren().addAll(emptyIcon, emptyText, emptySubtext);
            eventsContainer.getChildren().add(emptyState);
            return;
        }

        DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
        DateTimeFormatter createdFormatter = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");

        for (Event event : events) {
            // Get planifications for this event
            List<Planification> eventPlans = allPlanifications.stream()
                    .filter(p -> p.getIdEvent() == event.getId())
                    .toList();

            // Create psychology-themed card for event
            HBox eventCard = createPsychologyEventCard(event, eventPlans, dateFormatter, createdFormatter);
            eventsContainer.getChildren().add(eventCard);
        }
    }

    private HBox createPsychologyEventCard(Event event, List<Planification> planifications,
                                           DateTimeFormatter dateFormatter, DateTimeFormatter createdFormatter) {
        HBox card = new HBox(0);
        card.setStyle("-fx-background-color: linear-gradient(to bottom right, rgba(255,255,255,0.98), rgba(245,241,237,0.98)); " +
                "-fx-background-radius: 22; " +
                "-fx-border-color: rgba(40, 89, 33, 0.2); " +
                "-fx-border-width: 1.5; " +
                "-fx-border-radius: 22; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.12), 15, 0, 0, 5);");
        card.setPrefHeight(Region.USE_COMPUTED_SIZE);
        card.setAlignment(Pos.CENTER_LEFT);

        // Hover effect with calming transition
        card.setOnMouseEntered(e -> {
            card.setStyle("-fx-background-color: linear-gradient(to bottom right, rgba(255,255,255,1), rgba(240,237,230,1)); " +
                    "-fx-background-radius: 22; " +
                    "-fx-border-color: rgba(40, 89, 33, 0.4); " +
                    "-fx-border-width: 2; " +
                    "-fx-border-radius: 22; " +
                    "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.25), 20, 0, 0, 8);");
            card.setTranslateY(-4);
        });

        card.setOnMouseExited(e -> {
            card.setStyle("-fx-background-color: linear-gradient(to bottom right, rgba(255,255,255,0.98), rgba(245,241,237,0.98)); " +
                    "-fx-background-radius: 22; " +
                    "-fx-border-color: rgba(40, 89, 33, 0.2); " +
                    "-fx-border-width: 1.5; " +
                    "-fx-border-radius: 22; " +
                    "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.12), 15, 0, 0, 5);");
            card.setTranslateY(0);
        });

        // Left side: Calendar date with wellness styling
        if (event.getEventDate() != null) {
            VBox calendarBox = createWellnessCalendarDisplay(event.getEventDate());
            VBox calendarContainer = new VBox(calendarBox);
            calendarContainer.setAlignment(Pos.TOP_CENTER);
            calendarContainer.setPadding(new Insets(20));
            card.getChildren().add(calendarContainer);
        }

        // Center: Event information with psychology theme
        VBox infoBox = new VBox(14);
        infoBox.setAlignment(Pos.TOP_LEFT);
        infoBox.setPadding(new Insets(25));
        HBox.setHgrow(infoBox, Priority.ALWAYS);

        // Top section: Title with wellness badges
        HBox titleRow = new HBox(12);
        titleRow.setAlignment(Pos.CENTER_LEFT);

        Label titleLabel = new Label(event.getTitle());
        titleLabel.setStyle("-fx-font-size: 23px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: #285921;");
        titleLabel.setWrapText(true);
        titleLabel.setMaxWidth(450);

        // NOUVEAU Badge with growth theme
        boolean isNew = isEventNew(event.getCreatedAt());
        if (isNew) {
            Label newBadge = new Label("NOUVEAU");
            newBadge.setStyle("-fx-font-size: 10px; " +
                    "-fx-text-fill: white; " +
                    "-fx-background-color: linear-gradient(to right, #a8e6cf, #7ec8a3); " +
                    "-fx-background-radius: 6; " +
                    "-fx-padding: 4 10 4 10; " +
                    "-fx-font-weight: bold; " +
                    "-fx-effect: dropshadow(gaussian, rgba(126, 200, 163, 0.4), 3, 0, 0, 1);");
            titleRow.getChildren().add(newBadge);
        }

        titleRow.getChildren().add(titleLabel);

        // Activity count badge with beige theme
        if (!planifications.isEmpty()) {
            Label badge = new Label("🎯 " + planifications.size() + " activité" + (planifications.size() > 1 ? "s" : ""));
            badge.setStyle("-fx-font-size: 11px; " +
                    "-fx-text-fill: white; " +
                    "-fx-background-color: linear-gradient(to right, #d4b896, #c9b99b); " +
                    "-fx-background-radius: 15; " +
                    "-fx-padding: 5 12 5 12; " +
                    "-fx-font-weight: bold; " +
                    "-fx-effect: dropshadow(gaussian, rgba(201, 185, 155, 0.3), 3, 0, 0, 1);");
            titleRow.getChildren().add(badge);
        }

        Region titleSpacer = new Region();
        HBox.setHgrow(titleSpacer, Priority.ALWAYS);
        titleRow.getChildren().add(titleSpacer);

        // ===== ADD ADMIN ACTION BUTTONS (Modifier, Supprimer) =====
        HBox adminButtonsBox = new HBox(8);
        adminButtonsBox.setAlignment(Pos.CENTER_RIGHT);

        Button btnModifier = createSmallAdminButton("✏️ Modifier", "#2196F3", "#1976D2");
        btnModifier.setOnAction(e -> openEditEventWindow(event));

        Button btnSupprimer = createSmallAdminButton("🗑️ Supprimer", "#f44336", "#d32f2f");
        btnSupprimer.setOnAction(e -> deleteEvent(event));

        adminButtonsBox.getChildren().addAll(btnModifier, btnSupprimer);

        // Heart button for favorites
        Button heartButton = createHeartButton(event.getId());

        HBox actionButtonsRow = new HBox(10);
        actionButtonsRow.getChildren().addAll(adminButtonsBox, heartButton);
        titleRow.getChildren().add(actionButtonsRow);

        infoBox.getChildren().add(titleRow);

        // Details section with calming icons
        VBox detailsBox = new VBox(10);

        // Location with pin icon
        if (event.getLocation() != null && !event.getLocation().isEmpty()) {
            HBox locationBox = new HBox(10);
            locationBox.setAlignment(Pos.CENTER_LEFT);

            Label locationIcon = new Label("📍");
            locationIcon.setStyle("-fx-font-size: 17px;");

            Label locationLabel = new Label(event.getLocation());
            locationLabel.setStyle("-fx-font-size: 14px; " +
                    "-fx-text-fill: #5a6c7d; " +
                    "-fx-font-weight: 600;");

            locationBox.getChildren().addAll(locationIcon, locationLabel);
            detailsBox.getChildren().add(locationBox);
        }

        // Created At with time icon
        if (event.getCreatedAt() != null) {
            HBox createdBox = new HBox(10);
            createdBox.setAlignment(Pos.CENTER_LEFT);

            Label createdIcon = new Label("🕐");
            createdIcon.setStyle("-fx-font-size: 15px;");

            Label createdLabel = new Label("Créé le " + event.getCreatedAt().format(createdFormatter));
            createdLabel.setStyle("-fx-font-size: 12px; " +
                    "-fx-text-fill: #95a5a6; " +
                    "-fx-font-style: italic;");

            createdBox.getChildren().addAll(createdIcon, createdLabel);
            detailsBox.getChildren().add(createdBox);
        }

        infoBox.getChildren().add(detailsBox);

        // Planifications section with mindfulness theme
        if (!planifications.isEmpty()) {
            // Separator with green gradient
            Region separator = new Region();
            separator.setPrefHeight(1);
            separator.setStyle("-fx-background-color: linear-gradient(to right, transparent, rgba(40, 89, 33, 0.25), transparent);");
            infoBox.getChildren().add(separator);

            HBox planTitleRow = new HBox(8);
            planTitleRow.setAlignment(Pos.CENTER_LEFT);

            Label planIcon = new Label("🌱");
            planIcon.setStyle("-fx-font-size: 16px;");

            Label planTitle = new Label("Programme de l'atelier");
            planTitle.setStyle("-fx-font-size: 16px; " +
                    "-fx-font-weight: bold; " +
                    "-fx-text-fill: #285921; " +
                    "-fx-padding: 10 0 5 0;");

            planTitleRow.getChildren().addAll(planIcon, planTitle);
            infoBox.getChildren().add(planTitleRow);

            VBox planificationsBox = new VBox(12);

            for (int i = 0; i < planifications.size(); i++) {
                Planification plan = planifications.get(i);
                HBox planCard = createWellnessPlanificationCard(plan, i + 1);
                planificationsBox.getChildren().add(planCard);
            }

            infoBox.getChildren().add(planificationsBox);
        }

        card.getChildren().add(infoBox);

        // Right side: Image with wellness frame
        if (event.getLink() != null && !event.getLink().isEmpty()) {
            StackPane imageContainer = createWellnessImageContainer(event.getLink());
            if (imageContainer != null) {
                VBox imageWrapper = new VBox(imageContainer);
                imageWrapper.setAlignment(Pos.CENTER);
                imageWrapper.setPadding(new Insets(20));
                card.getChildren().add(imageWrapper);
            }
        }

        return card;
    }

    // ===== CREATE SMALL ADMIN BUTTON FOR CARD ACTIONS =====
    private Button createSmallAdminButton(String text, String normalColor, String hoverColor) {
        Button btn = new Button(text);
        btn.setStyle("-fx-font-size: 11px; " +
                "-fx-background-radius: 8; " +
                "-fx-border-radius: 8; " +
                "-fx-background-color: " + normalColor + "; " +
                "-fx-text-fill: white; " +
                "-fx-padding: 6 12 6 12; " +
                "-fx-font-weight: bold; " +
                "-fx-effect: dropshadow(gaussian, rgba(0, 0, 0, 0.2), 3, 0, 0, 1);");

        btn.setOnMouseEntered(e -> {
            btn.setStyle("-fx-font-size: 11px; " +
                    "-fx-background-radius: 8; " +
                    "-fx-border-radius: 8; " +
                    "-fx-background-color: " + hoverColor + "; " +
                    "-fx-text-fill: white; " +
                    "-fx-padding: 6 12 6 12; " +
                    "-fx-font-weight: bold; " +
                    "-fx-cursor: hand; " +
                    "-fx-effect: dropshadow(gaussian, rgba(0, 0, 0, 0.3), 5, 0, 0, 2);");
            btn.setTranslateY(-1);
        });

        btn.setOnMouseExited(e -> {
            btn.setStyle("-fx-font-size: 11px; " +
                    "-fx-background-radius: 8; " +
                    "-fx-border-radius: 8; " +
                    "-fx-background-color: " + normalColor + "; " +
                    "-fx-text-fill: white; " +
                    "-fx-padding: 6 12 6 12; " +
                    "-fx-font-weight: bold; " +
                    "-fx-effect: dropshadow(gaussian, rgba(0, 0, 0, 0.2), 3, 0, 0, 1);");
            btn.setTranslateY(0);
        });

        return btn;
    }

    private VBox createWellnessCalendarDisplay(java.time.LocalDate date) {
        VBox calendarBox = new VBox(0);
        calendarBox.setAlignment(Pos.CENTER);
        calendarBox.setPrefSize(90, 90);
        calendarBox.setMaxSize(90, 90);
        calendarBox.setMinSize(90, 90);
        calendarBox.setStyle("-fx-background-color: linear-gradient(to bottom, #ffffff, #f5f1ed); " +
                "-fx-border-color: rgba(40, 89, 33, 0.35); " +
                "-fx-border-width: 2; " +
                "-fx-border-radius: 15; " +
                "-fx-background-radius: 15; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.15), 8, 0, 0, 3);");

        // Month header with green gradient
        Label monthLabel = new Label(date.getMonth().getDisplayName(TextStyle.SHORT, Locale.FRENCH).toUpperCase());
        monthLabel.setStyle("-fx-font-size: 11px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: white; " +
                "-fx-background-color: linear-gradient(to right, #2e6a28, #285921); " +
                "-fx-padding: 6 0 6 0; " +
                "-fx-background-radius: 13 13 0 0;");
        monthLabel.setMaxWidth(Double.MAX_VALUE);
        monthLabel.setAlignment(Pos.CENTER);

        // Day number in green
        Label dayLabel = new Label(String.valueOf(date.getDayOfMonth()));
        dayLabel.setStyle("-fx-font-size: 34px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: #285921; " +
                "-fx-padding: 10 0 10 0;");

        calendarBox.getChildren().addAll(monthLabel, dayLabel);

        return calendarBox;
    }

    private Button createHeartButton(int eventId) {
        boolean isLiked = likedEventIds.contains(eventId);

        Button heartBtn = new Button(isLiked ? "💛" : "🤍");
        heartBtn.setStyle("-fx-font-size: 26px; " +
                "-fx-background-color: transparent; " +
                "-fx-border-color: transparent; " +
                "-fx-padding: 5; " +
                "-fx-cursor: hand;");

        heartBtn.setOnMouseEntered(e -> {
            heartBtn.setStyle("-fx-font-size: 30px; " +
                    "-fx-background-color: rgba(212, 184, 150, 0.15); " +
                    "-fx-background-radius: 50%; " +
                    "-fx-border-color: transparent; " +
                    "-fx-padding: 5; " +
                    "-fx-cursor: hand;");
        });

        heartBtn.setOnMouseExited(e -> {
            heartBtn.setStyle("-fx-font-size: 26px; " +
                    "-fx-background-color: transparent; " +
                    "-fx-border-color: transparent; " +
                    "-fx-padding: 5; " +
                    "-fx-cursor: hand;");
        });

        heartBtn.setOnAction(e -> {
            if (likedEventIds.contains(eventId)) {
                likedEventIds.remove(eventId);
                heartBtn.setText("🤍");
                System.out.println("Event " + eventId + " removed from favorites");
            } else {
                likedEventIds.add(eventId);
                heartBtn.setText("💛");
                System.out.println("Event " + eventId + " added to favorites");
            }

            if (showingOnlyLiked) {
                displayEvents(getCurrentFilteredEvents());
            }
        });

        return heartBtn;
    }

    private boolean isEventNew(LocalDateTime createdAt) {
        if (createdAt == null) return false;
        LocalDateTime now = LocalDateTime.now();
        LocalDateTime sevenDaysAgo = now.minusDays(7);
        return createdAt.isAfter(sevenDaysAgo);
    }

    private StackPane createWellnessImageContainer(String link) {
        ImageView imageView = loadImageFromLink(link);
        if (imageView == null) return null;

        StackPane imageContainer = new StackPane();
        imageContainer.setPrefSize(190, 190);
        imageContainer.setMaxSize(190, 190);
        imageContainer.setMinSize(190, 190);
        imageContainer.setStyle("-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.2), 10, 0, 0, 3);");

        Rectangle clip = new Rectangle(190, 190);
        clip.setArcWidth(22);
        clip.setArcHeight(22);
        imageView.setClip(clip);

        // Soft green overlay
        Region overlay = new Region();
        overlay.setPrefSize(190, 190);
        overlay.setStyle("-fx-background-color: linear-gradient(to bottom, " +
                "rgba(40, 89, 33, 0.02), " +
                "rgba(40, 89, 33, 0.08)); " +
                "-fx-background-radius: 22;");

        imageContainer.getChildren().addAll(imageView, overlay);

        return imageContainer;
    }

    private HBox createWellnessPlanificationCard(Planification plan, int number) {
        HBox planCard = new HBox(14);
        planCard.setAlignment(Pos.CENTER_LEFT);
        planCard.setStyle("-fx-background-color: linear-gradient(to right, rgba(168, 230, 207, 0.12), rgba(245, 241, 237, 0.2)); " +
                "-fx-padding: 14 18 14 18; " +
                "-fx-background-radius: 15; " +
                "-fx-border-color: rgba(40, 89, 33, 0.2); " +
                "-fx-border-width: 1.5; " +
                "-fx-border-radius: 15; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.05), 4, 0, 0, 2);");

        // Number badge with green colors
        Label numberLabel = new Label(String.valueOf(number));
        numberLabel.setStyle("-fx-font-size: 15px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: white; " +
                "-fx-background-color: linear-gradient(135deg, #2e6a28, #285921); " +
                "-fx-background-radius: 50%; " +
                "-fx-min-width: 34; " +
                "-fx-min-height: 34; " +
                "-fx-max-width: 34; " +
                "-fx-max-height: 34; " +
                "-fx-alignment: center; " +
                "-fx-effect: dropshadow(gaussian, rgba(40, 89, 33, 0.3), 3, 0, 0, 1);");

        VBox contentBox = new VBox(6);
        HBox.setHgrow(contentBox, Priority.ALWAYS);

        // Description
        if (plan.getDescription() != null && !plan.getDescription().isEmpty()) {
            Label descLabel = new Label(plan.getDescription());
            descLabel.setStyle("-fx-font-size: 13px; " +
                    "-fx-text-fill: #5a6c5a; " +
                    "-fx-font-weight: 600;");
            descLabel.setWrapText(true);
            contentBox.getChildren().add(descLabel);
        }

        // Duration with clock icon
        if (plan.getDuree() != null && !plan.getDuree().isEmpty()) {
            HBox durationBox = new HBox(6);
            durationBox.setAlignment(Pos.CENTER_LEFT);

            Label durationIcon = new Label("⏰");
            durationIcon.setStyle("-fx-font-size: 13px;");

            Label durationLabel = new Label(plan.getDuree());
            durationLabel.setStyle("-fx-font-size: 12px; " +
                    "-fx-text-fill: #7a8c7a; " +
                    "-fx-font-weight: 700;");

            durationBox.getChildren().addAll(durationIcon, durationLabel);
            contentBox.getChildren().add(durationBox);
        }

        planCard.getChildren().addAll(numberLabel, contentBox);
        return planCard;
    }

    private ImageView loadImageFromLink(String link) {
        try {
            File imageFile = new File(link);
            if (imageFile.exists()) {
                Image image = new Image(imageFile.toURI().toString());
                ImageView imageView = new ImageView(image);
                imageView.setFitWidth(190);
                imageView.setFitHeight(190);
                imageView.setPreserveRatio(false);
                imageView.setSmooth(true);
                return imageView;
            }

            Image image = new Image(link);
            if (!image.isError()) {
                ImageView imageView = new ImageView(image);
                imageView.setFitWidth(190);
                imageView.setFitHeight(190);
                imageView.setPreserveRatio(false);
                imageView.setSmooth(true);
                return imageView;
            }
        } catch (Exception e) {
            System.err.println("Failed to load image from: " + link);
        }
        return null;
    }

    private void filterAndDisplayEvents(String searchText) {
        List<Event> baseEvents = getCurrentFilteredEvents();

        if (searchText == null || searchText.trim().isEmpty()) {
            displayEvents(baseEvents);
            return;
        }

        String searchLower = searchText.toLowerCase().trim();
        List<Event> filteredEvents = baseEvents.stream()
                .filter(event ->
                        (event.getTitle() != null && event.getTitle().toLowerCase().contains(searchLower)) ||
                                (event.getLocation() != null && event.getLocation().toLowerCase().contains(searchLower))
                )
                .toList();

        displayEvents(filteredEvents);
    }

    private void sortEventsByTitle() {
        allEvents.sort(Comparator.comparing(Event::getTitle, String.CASE_INSENSITIVE_ORDER));
    }

    private void sortEventsByDate() {
        allEvents.sort((e1, e2) -> {
            if (e1.getEventDate() == null && e2.getEventDate() == null) return 0;
            if (e1.getEventDate() == null) return 1;
            if (e2.getEventDate() == null) return -1;
            return e1.getEventDate().compareTo(e2.getEventDate());
        });
    }

    private void sortEventsByDuration() {
        allEvents.sort((e1, e2) -> {
            long count1 = allPlanifications.stream().filter(p -> p.getIdEvent() == e1.getId()).count();
            long count2 = allPlanifications.stream().filter(p -> p.getIdEvent() == e2.getId()).count();
            return Long.compare(count2, count1);
        });
    }

    private void showError(String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle("Erreur");
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    private void showInfo(String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Information");
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}