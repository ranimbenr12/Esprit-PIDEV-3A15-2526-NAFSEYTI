package tn.esprit.projet.gui;

<<<<<<< HEAD
=======
import javafx.animation.Animation;
import javafx.animation.KeyFrame;
import javafx.animation.Timeline;
>>>>>>> fd80a9a (final update)
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
<<<<<<< HEAD

import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.view.EventService;
import tn.esprit.projet.view.PlanificationService;
=======
import javafx.geometry.Pos;
import javafx.scene.layout.HBox;
import javafx.util.Duration;

import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Notification;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.view.EventService;
import tn.esprit.projet.view.PlanificationService;
import tn.esprit.projet.view.ParticipationService;
import tn.esprit.projet.view.NotificationService;
>>>>>>> fd80a9a (final update)

import java.sql.SQLException;
import java.time.LocalDate;
import java.time.temporal.ChronoUnit;
import java.util.List;

public class EvenementsController {

    // Event Table
<<<<<<< HEAD
=======
    @FXML private Button aiAssistantButton;
>>>>>>> fd80a9a (final update)
    @FXML private TableView<Event> tableEvents;
    @FXML private TableColumn<Event, Integer> colId;
    @FXML private TableColumn<Event, String> colTitre;
    @FXML private TableColumn<Event, String> colDateDebut;
    @FXML private TableColumn<Event, String> colLieu;
    @FXML private TableColumn<Event, String> colLink;
    @FXML private TableColumn<Event, String> colCreatedAt;
    @FXML private TableColumn<Event, String> colIsNew;
    @FXML private TableColumn<Event, Integer> colCreatorId;
<<<<<<< HEAD
=======
    @FXML private TableColumn<Event, String> colParticipants;
>>>>>>> fd80a9a (final update)

    // Planification Table
    @FXML private TableView<Planification> tablePlanifications;
    @FXML private TableColumn<Planification, Integer> colPlanId;
    @FXML private TableColumn<Planification, String> colPlanDesc;
    @FXML private TableColumn<Planification, String> colPlanDuree;
    @FXML private TableColumn<Planification, Integer> colPlanEventId;

    // Controls
    @FXML private Button btnAjouter;
    @FXML private Button btnModifier;
    @FXML private Button btnSupprimer;
    @FXML private Button btnActualiser;
    @FXML private TextField searchField;
    @FXML private ComboBox<String> sortCombo;

<<<<<<< HEAD
    // Services
    private final EventService eventService = new EventService();
    private final PlanificationService planService = new PlanificationService();

    private final ObservableList<Event> masterData = FXCollections.observableArrayList();
    private final ObservableList<Planification> planData = FXCollections.observableArrayList();
=======
    // Notification Bell
    @FXML private Button notificationBell;
    @FXML private Label notificationBadge;

    // Services
    private final EventService eventService = new EventService();
    private final PlanificationService planService = new PlanificationService();
    private final ParticipationService participationService = new ParticipationService();
    private final NotificationService notificationService = new NotificationService();

    private final ObservableList<Event> masterData = FXCollections.observableArrayList();
    private final ObservableList<Planification> planData = FXCollections.observableArrayList();
    private final ObservableList<Notification> notifications = FXCollections.observableArrayList();
>>>>>>> fd80a9a (final update)

    private FilteredList<Event> filteredData;
    private SortedList<Event> sortedData;

<<<<<<< HEAD
=======
    private Timeline notificationChecker;

>>>>>>> fd80a9a (final update)
    @FXML
    public void initialize() {

        // Event Table Columns
        colId.setCellValueFactory(new PropertyValueFactory<>("id"));
        colTitre.setCellValueFactory(new PropertyValueFactory<>("title"));
        colLieu.setCellValueFactory(new PropertyValueFactory<>("location"));
        colLink.setCellValueFactory(new PropertyValueFactory<>("link"));
        colCreatorId.setCellValueFactory(new PropertyValueFactory<>("creator_id"));

        colDateDebut.setCellValueFactory(cell -> new javafx.beans.property.SimpleStringProperty(
                cell.getValue().getEventDate() != null ? cell.getValue().getEventDate().toString() : ""
        ));

        colCreatedAt.setCellValueFactory(cell -> new javafx.beans.property.SimpleStringProperty(
                cell.getValue().getCreatedAt() != null ? cell.getValue().getCreatedAt().toLocalDate().toString() : ""
        ));

        colIsNew.setCellValueFactory(cell -> {
            Event e = cell.getValue();
            if(e.getCreatedAt() != null) {
                long days = ChronoUnit.DAYS.between(e.getCreatedAt().toLocalDate(), LocalDate.now());
<<<<<<< HEAD
                return new javafx.beans.property.SimpleStringProperty(days <= 7 ? "Mis à jour" : "Ancien");
            } else return new javafx.beans.property.SimpleStringProperty("Ancien");
        });

=======
                return new javafx.beans.property.SimpleStringProperty(days <= 7 ? "Nouveau" : "Ancien");
            } else return new javafx.beans.property.SimpleStringProperty("Ancien");
        });

        // AI Assistant button action - MOVED TO CORRECT LOCATION
        aiAssistantButton.setOnAction(e -> openAIAssistant());

        // Participants column with progress indicator
        colParticipants.setCellValueFactory(cell -> {
            Event e = cell.getValue();
            String participantsText = e.getCurrentParticipants() + " / " + e.getMaxParticipants();
            return new javafx.beans.property.SimpleStringProperty(participantsText);
        });

        // Custom cell factory for participants column
        colParticipants.setCellFactory(col -> new TableCell<Event, String>() {
            private final ProgressBar progressBar = new ProgressBar();
            private final Label label = new Label();
            private final HBox container = new HBox(5);

            {
                container.setAlignment(Pos.CENTER_LEFT);
                progressBar.setPrefWidth(80);
                progressBar.setPrefHeight(8);
            }

            @Override
            protected void updateItem(String item, boolean empty) {
                super.updateItem(item, empty);
                if (empty || item == null) {
                    setGraphic(null);
                } else {
                    Event event = getTableView().getItems().get(getIndex());
                    double ratio = (double) event.getCurrentParticipants() / event.getMaxParticipants();
                    progressBar.setProgress(ratio);

                    if (ratio >= 1.0) {
                        progressBar.setStyle("-fx-accent: #b22222;");
                        label.setText(item + " (Complet)");
                        label.setStyle("-fx-text-fill: #b22222; -fx-font-weight: bold;");
                    } else if (ratio >= 0.8) {
                        progressBar.setStyle("-fx-accent: #ff9800;");
                        label.setText(item);
                        label.setStyle("-fx-text-fill: #ff9800;");
                    } else {
                        progressBar.setStyle("-fx-accent: #4CAF50;");
                        label.setText(item);
                        label.setStyle("-fx-text-fill: #4CAF50;");
                    }

                    container.getChildren().setAll(progressBar, label);
                    setGraphic(container);
                }
            }
        });

        // HIDE the ID columns
        colId.setVisible(false);
        colCreatorId.setVisible(false);
        colPlanId.setVisible(false);
        colPlanEventId.setVisible(false);

>>>>>>> fd80a9a (final update)
        // Planification Table Columns
        colPlanId.setCellValueFactory(new PropertyValueFactory<>("idPlanification"));
        colPlanDesc.setCellValueFactory(new PropertyValueFactory<>("description"));
        colPlanDuree.setCellValueFactory(new PropertyValueFactory<>("duree"));
        colPlanEventId.setCellValueFactory(new PropertyValueFactory<>("idEvent"));

<<<<<<< HEAD
        // ✅ Bind the planification table to the observable list
=======
>>>>>>> fd80a9a (final update)
        tablePlanifications.setItems(planData);

        // Buttons actions
        btnAjouter.setOnAction(e -> openCreateEventPopup());
        btnModifier.setOnAction(e -> modifySelected());
        btnSupprimer.setOnAction(e -> deleteSelected());
        btnActualiser.setOnAction(e -> loadEvents());

<<<<<<< HEAD
        // Sorting
        sortCombo.getItems().addAll("ID", "Titre", "Localisation");
        sortCombo.getSelectionModel().selectedItemProperty().addListener((obs, oldVal, newVal) -> applySorting(newVal));

        // Event selection listener -> show planifications for selected event
        tableEvents.getSelectionModel().selectedItemProperty().addListener((obs, oldSel, newSel) -> {
            if(newSel != null) loadPlanifications(newSel.getId());
            else loadAllPlanifications(); // ✅ Show all when no event selected
        });

        loadEvents();
        loadAllPlanifications(); // ✅ Load all planifications on startup
=======
        // Notification Bell action
        notificationBell.setOnAction(e -> openNotifications());

        // Sorting
        sortCombo.getItems().addAll("Titre", "Localisation", "Date", "Participants");
        sortCombo.getSelectionModel().selectedItemProperty().addListener((obs, oldVal, newVal) -> applySorting(newVal));

        tableEvents.getSelectionModel().selectedItemProperty().addListener((obs, oldSel, newSel) -> {
            if(newSel != null) loadPlanifications(newSel.getId());
            else loadAllPlanifications();
        });

        loadEvents();
        loadAllPlanifications();

        // Start notification checker
        startNotificationChecker();
    }

    private void startNotificationChecker() {
        notificationChecker = new Timeline(
                new KeyFrame(Duration.seconds(5), e -> updateNotificationBadge())
        );
        notificationChecker.setCycleCount(Animation.INDEFINITE);
        notificationChecker.play();
    }

    // Add this public method to allow AdminNotificationsController to update the badge
    public void updateNotificationBadge() {
        try {
            int unreadCount = notificationService.getUnreadCountForAdmin();

            if (unreadCount > 0) {
                notificationBadge.setText(String.valueOf(unreadCount));
                notificationBadge.setVisible(true);
                // Don't animate here, only animate when new notifications arrive
            } else {
                notificationBadge.setVisible(false);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private void animateBell() {
        Timeline bellShake = new Timeline(
                new KeyFrame(Duration.seconds(0.1), e -> notificationBell.setRotate(15)),
                new KeyFrame(Duration.seconds(0.2), e -> notificationBell.setRotate(-15)),
                new KeyFrame(Duration.seconds(0.3), e -> notificationBell.setRotate(10)),
                new KeyFrame(Duration.seconds(0.4), e -> notificationBell.setRotate(-10)),
                new KeyFrame(Duration.seconds(0.5), e -> notificationBell.setRotate(5)),
                new KeyFrame(Duration.seconds(0.6), e -> notificationBell.setRotate(-5)),
                new KeyFrame(Duration.seconds(0.7), e -> notificationBell.setRotate(0))
        );
        bellShake.play();
    }

    private void openNotifications() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/AdminNotifications.fxml"));

            // Add debug to check if resource exists
            if (getClass().getResource("/AdminNotifications.fxml") == null) {
                System.err.println("ERROR: AdminNotifications.fxml not found in resources!");
                showAlert("Fichier AdminNotifications.fxml introuvable!");
                return;
            }

            Stage stage = new Stage();
            stage.setScene(new Scene(loader.load()));
            stage.setTitle("Notifications de participations");
            stage.show();

            stage.setOnHidden(e -> updateNotificationBadge());

        } catch (Exception e) {
            e.printStackTrace();
            showAlert("Impossible d'ouvrir les notifications : " + e.getMessage());
        }
    }

    // ADD THIS METHOD - It was missing from your class
    private void openAIAssistant() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/AIAssistant.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(loader.load()));
            stage.setTitle("🤖 AI Event Assistant");
            stage.setMinWidth(600);
            stage.setMinHeight(700);
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
            showAlert("Impossible d'ouvrir l'assistant IA : " + e.getMessage());
        }
>>>>>>> fd80a9a (final update)
    }

    private void loadEvents() {
        try {
            List<Event> list = eventService.selectAll();
            masterData.setAll(list);

            filteredData = new FilteredList<>(masterData, b -> true);
            searchField.textProperty().addListener((obs, oldValue, newValue) -> {
                filteredData.setPredicate(event -> {
                    if(newValue == null || newValue.isEmpty()) return true;
                    String key = newValue.toLowerCase();
<<<<<<< HEAD
                    return String.valueOf(event.getId()).contains(key)
                            || (event.getTitle() != null && event.getTitle().toLowerCase().contains(key))
                            || (event.getLocation() != null && event.getLocation().toLowerCase().contains(key))
                            || String.valueOf(event.getCreator_id()).contains(key)
                            || (event.getEventDate() != null &&
                            event.getEventDate().toString().toLowerCase().contains(key));
=======
                    return (event.getTitle() != null && event.getTitle().toLowerCase().contains(key))
                            || (event.getLocation() != null && event.getLocation().toLowerCase().contains(key))
                            || (event.getEventDate() != null &&
                            event.getEventDate().toString().toLowerCase().contains(key))
                            || (String.valueOf(event.getCurrentParticipants()).contains(key));
>>>>>>> fd80a9a (final update)
                });
            });

            sortedData = new SortedList<>(filteredData);
            sortedData.comparatorProperty().bind(tableEvents.comparatorProperty());
            tableEvents.setItems(sortedData);
        } catch (SQLException e) {
            e.printStackTrace();
            showAlert("Erreur lors du chargement des événements !");
        }
    }

<<<<<<< HEAD
    //  NEW METHOD: Load ALL planifications from database
    private void loadAllPlanifications(){
        try{
            List<Planification> list = planService.selectAll();
            planData.setAll(list);
        } catch(Exception e){
=======
    private void loadAllPlanifications() {
        try {
            List<Planification> list = planService.selectAll();
            planData.setAll(list);
        } catch (Exception e) {
>>>>>>> fd80a9a (final update)
            e.printStackTrace();
            showAlert("Impossible de charger les planifications !");
        }
    }

<<<<<<< HEAD
    private void loadPlanifications(int eventId){
        try{
            List<Planification> list = planService.getByEventId(eventId);
            planData.setAll(list);
        } catch(Exception e){
=======
    private void loadPlanifications(int eventId) {
        try {
            List<Planification> list = planService.getByEventId(eventId);
            planData.setAll(list);
        } catch (Exception e) {
>>>>>>> fd80a9a (final update)
            e.printStackTrace();
            showAlert("Impossible de charger les planifications !");
        }
    }

    private void applySorting(String criteria) {
<<<<<<< HEAD
        if(criteria == null) return;
        tableEvents.getSortOrder().clear();
        switch(criteria){
            case "ID" -> tableEvents.getSortOrder().add(colId);
            case "Titre" -> tableEvents.getSortOrder().add(colTitre);
            case "Localisation" -> tableEvents.getSortOrder().add(colLieu);
        }
    }

    private void deleteSelected(){
        Event selected = tableEvents.getSelectionModel().getSelectedItem();
        if(selected != null){
            try {
                eventService.deletOne(selected);
                loadEvents();
                loadAllPlanifications(); // ✅ Reload all planifications after delete
=======
        if (criteria == null) return;
        tableEvents.getSortOrder().clear();
        switch (criteria) {
            case "Titre" -> tableEvents.getSortOrder().add(colTitre);
            case "Localisation" -> tableEvents.getSortOrder().add(colLieu);
            case "Date" -> tableEvents.getSortOrder().add(colDateDebut);
            case "Participants" -> {
                tableEvents.setItems(sortedData.sorted((e1, e2) -> {
                    double ratio1 = (double) e1.getCurrentParticipants() / e1.getMaxParticipants();
                    double ratio2 = (double) e2.getCurrentParticipants() / e2.getMaxParticipants();
                    return Double.compare(ratio2, ratio1);
                }));
                return;
            }
        }
    }

    private void deleteSelected() {
        Event selected = tableEvents.getSelectionModel().getSelectedItem();
        if (selected != null) {
            try {
                eventService.deletOne(selected);
                loadEvents();
                loadAllPlanifications();
>>>>>>> fd80a9a (final update)
            } catch (SQLException e) {
                e.printStackTrace();
                showAlert("Erreur lors de la suppression !");
            }
        } else showAlert("Aucun événement sélectionné !");
    }

<<<<<<< HEAD
    private void modifySelected(){
        Event selected = tableEvents.getSelectionModel().getSelectedItem();
        if(selected != null){
=======
    private void modifySelected() {
        Event selected = tableEvents.getSelectionModel().getSelectedItem();
        if (selected != null) {
>>>>>>> fd80a9a (final update)
            try {
                FXMLLoader loader = new FXMLLoader(getClass().getResource("/EditEvent.fxml"));
                Stage stage = new Stage();
                stage.setScene(new Scene(loader.load()));
                stage.setTitle("Modifier l'Événement");

                EditEventController controller = loader.getController();
                controller.setEvent(selected);

                stage.showAndWait();
                loadEvents();
<<<<<<< HEAD
                loadAllPlanifications(); // ✅ Reload all planifications after edit
            } catch(Exception e){
=======
                loadAllPlanifications();
            } catch (Exception e) {
>>>>>>> fd80a9a (final update)
                e.printStackTrace();
                showAlert("Impossible d'ouvrir le formulaire de modification !");
            }
        } else showAlert("Aucun événement sélectionné !");
    }

<<<<<<< HEAD
    private void openCreateEventPopup(){
        try{
=======
    private void openCreateEventPopup() {
        try {
>>>>>>> fd80a9a (final update)
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/CreateEvent.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(loader.load()));
            stage.setTitle("Créer un événement");
            stage.showAndWait();
            loadEvents();
<<<<<<< HEAD
            loadAllPlanifications(); // ✅ Reload all planifications after create
        } catch(Exception e){
=======
            loadAllPlanifications();
        } catch (Exception e) {
>>>>>>> fd80a9a (final update)
            e.printStackTrace();
            showAlert("Impossible d'ouvrir le formulaire !");
        }
    }

<<<<<<< HEAD
    private void showAlert(String msg){
=======


    private void showAlert(String msg) {
>>>>>>> fd80a9a (final update)
        Alert alert = new Alert(Alert.AlertType.WARNING);
        alert.setTitle("Attention");
        alert.setHeaderText(null);
        alert.setContentText(msg);
        alert.showAndWait();
    }
<<<<<<< HEAD
=======

    // This method is called from AdminNotificationsController, not from this class
    // Keep it for completeness but it won't be used in this controller
    private void loadNotifications() {
        // This method is intentionally empty as it's used by AdminNotificationsController
        // Not needed in EvenementsController
    }

>>>>>>> fd80a9a (final update)
}