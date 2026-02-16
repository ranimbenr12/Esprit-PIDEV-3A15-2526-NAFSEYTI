package tn.esprit.projet.gui;

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

import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.view.EventService;
import tn.esprit.projet.view.PlanificationService;

import java.sql.SQLException;
import java.time.LocalDate;
import java.time.temporal.ChronoUnit;
import java.util.List;

public class EvenementsController {

    // Event Table
    @FXML private TableView<Event> tableEvents;
    @FXML private TableColumn<Event, Integer> colId;
    @FXML private TableColumn<Event, String> colTitre;
    @FXML private TableColumn<Event, String> colDateDebut;
    @FXML private TableColumn<Event, String> colLieu;
    @FXML private TableColumn<Event, String> colLink;
    @FXML private TableColumn<Event, String> colCreatedAt;
    @FXML private TableColumn<Event, String> colIsNew;
    @FXML private TableColumn<Event, Integer> colCreatorId;

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

    // Services
    private final EventService eventService = new EventService();
    private final PlanificationService planService = new PlanificationService();

    private final ObservableList<Event> masterData = FXCollections.observableArrayList();
    private final ObservableList<Planification> planData = FXCollections.observableArrayList();

    private FilteredList<Event> filteredData;
    private SortedList<Event> sortedData;

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
                return new javafx.beans.property.SimpleStringProperty(days <= 7 ? "Mis à jour" : "Ancien");
            } else return new javafx.beans.property.SimpleStringProperty("Ancien");
        });

        // Planification Table Columns
        colPlanId.setCellValueFactory(new PropertyValueFactory<>("idPlanification"));
        colPlanDesc.setCellValueFactory(new PropertyValueFactory<>("description"));
        colPlanDuree.setCellValueFactory(new PropertyValueFactory<>("duree"));
        colPlanEventId.setCellValueFactory(new PropertyValueFactory<>("idEvent"));

        // ✅ Bind the planification table to the observable list
        tablePlanifications.setItems(planData);

        // Buttons actions
        btnAjouter.setOnAction(e -> openCreateEventPopup());
        btnModifier.setOnAction(e -> modifySelected());
        btnSupprimer.setOnAction(e -> deleteSelected());
        btnActualiser.setOnAction(e -> loadEvents());

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
                    return String.valueOf(event.getId()).contains(key)
                            || (event.getTitle() != null && event.getTitle().toLowerCase().contains(key))
                            || (event.getLocation() != null && event.getLocation().toLowerCase().contains(key))
                            || String.valueOf(event.getCreator_id()).contains(key)
                            || (event.getEventDate() != null &&
                            event.getEventDate().toString().toLowerCase().contains(key));
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

    //  NEW METHOD: Load ALL planifications from database
    private void loadAllPlanifications(){
        try{
            List<Planification> list = planService.selectAll();
            planData.setAll(list);
        } catch(Exception e){
            e.printStackTrace();
            showAlert("Impossible de charger les planifications !");
        }
    }

    private void loadPlanifications(int eventId){
        try{
            List<Planification> list = planService.getByEventId(eventId);
            planData.setAll(list);
        } catch(Exception e){
            e.printStackTrace();
            showAlert("Impossible de charger les planifications !");
        }
    }

    private void applySorting(String criteria) {
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
            } catch (SQLException e) {
                e.printStackTrace();
                showAlert("Erreur lors de la suppression !");
            }
        } else showAlert("Aucun événement sélectionné !");
    }

    private void modifySelected(){
        Event selected = tableEvents.getSelectionModel().getSelectedItem();
        if(selected != null){
            try {
                FXMLLoader loader = new FXMLLoader(getClass().getResource("/EditEvent.fxml"));
                Stage stage = new Stage();
                stage.setScene(new Scene(loader.load()));
                stage.setTitle("Modifier l'Événement");

                EditEventController controller = loader.getController();
                controller.setEvent(selected);

                stage.showAndWait();
                loadEvents();
                loadAllPlanifications(); // ✅ Reload all planifications after edit
            } catch(Exception e){
                e.printStackTrace();
                showAlert("Impossible d'ouvrir le formulaire de modification !");
            }
        } else showAlert("Aucun événement sélectionné !");
    }

    private void openCreateEventPopup(){
        try{
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/CreateEvent.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(loader.load()));
            stage.setTitle("Créer un événement");
            stage.showAndWait();
            loadEvents();
            loadAllPlanifications(); // ✅ Reload all planifications after create
        } catch(Exception e){
            e.printStackTrace();
            showAlert("Impossible d'ouvrir le formulaire !");
        }
    }

    private void showAlert(String msg){
        Alert alert = new Alert(Alert.AlertType.WARNING);
        alert.setTitle("Attention");
        alert.setHeaderText(null);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}