package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.scene.control.*;
        import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.view.EventService;
import tn.esprit.projet.view.PlanificationService;

import java.io.File;
import java.sql.SQLException;
import java.time.LocalDateTime;
import java.util.List;

public class PsychoEditController {

    @FXML
    private TextField titleField;
    @FXML private TextField locationField;
    @FXML private DatePicker datePicker;
    @FXML private TextField linkField;
    @FXML private TextField planDescriptionField; // new
    @FXML private TextField planDureeField;       // new
    @FXML private Button btnUpdate;
    @FXML private Button btnCancel;
    @FXML private ImageView imagePreview;

    private Event eventToEdit;
    private final EventService eventService = new EventService();
    private final PlanificationService planService = new PlanificationService();
    private Planification currentPlan;

    // Set the event to edit
    public void setEvent(Event event) {
        this.eventToEdit = event;

        titleField.setText(event.getTitle());
        locationField.setText(event.getLocation());
        datePicker.setValue(event.getEventDate());
        linkField.setText(event.getLink());

        // Load image if exists
        if (event.getLink() != null && !event.getLink().isEmpty()) {
            try {
                Image image = new Image(event.getLink());
                imagePreview.setImage(image);
            } catch (Exception e) {
                System.out.println("Invalid image path.");
            }
        }

        loadPlanification();
    }

    private void loadPlanification() {
        try {
            List<Planification> plans = planService.selectAll();
            for(Planification p : plans){
                if(p.getIdEvent() == eventToEdit.getId()){
                    currentPlan = p;
                    planDescriptionField.setText(p.getDescription());
                    planDureeField.setText(p.getDuree());
                    break;
                }
            }
        } catch (SQLException ex){
            ex.printStackTrace();
        }
    }

    @FXML
    public void initialize() {
        btnUpdate.setOnAction(e -> updateEvent());
        btnCancel.setOnAction(e -> closeWindow());

        // Hover effects
        addHoverEffect(btnUpdate, "#4CAF50", "#45a049");
        addHoverEffect(btnCancel, "#b22222", "#8b0000");
    }

    @FXML
    private void handleUploadImage() {
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Choose Event Image");
        fileChooser.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Image Files", "*.png", "*.jpg", "*.jpeg")
        );

        File selectedFile = fileChooser.showOpenDialog(btnUpdate.getScene().getWindow());

        if (selectedFile != null) {
            String imagePath = selectedFile.toURI().toString();
            Image image = new Image(imagePath);
            imagePreview.setImage(image);
            linkField.setText(imagePath);
        }
    }

    private void updateEvent() {
        if (titleField.getText().length() < 3 ||
                locationField.getText().length() < 3 ||
                datePicker.getValue() == null) {
            showAlert("Veuillez remplir correctement le titre, le lieu et la date (min 3 caractères).");
            return;
        }

        try {
            eventToEdit.setTitle(titleField.getText());
            eventToEdit.setLocation(locationField.getText());
            eventToEdit.setEventDate(datePicker.getValue());
            eventToEdit.setLink(linkField.getText());
            eventToEdit.setCreatedAt(LocalDateTime.now());

            eventService.updateOne(eventToEdit);

            // ✅ Update or create planification
            String planDesc = planDescriptionField.getText().trim();
            String planDuree = planDureeField.getText().trim();
            if(!planDesc.isEmpty() || !planDuree.isEmpty()) {
                if(currentPlan != null) {
                    currentPlan.setDescription(planDesc);
                    currentPlan.setDuree(planDuree);
                    planService.updateOne(currentPlan);
                } else {
                    Planification newPlan = new Planification();
                    newPlan.setIdEvent(eventToEdit.getId());
                    newPlan.setDescription(planDesc.isEmpty() ? "N/A" : planDesc);
                    newPlan.setDuree(planDuree.isEmpty() ? "N/A" : planDuree);
                    planService.insertOne(newPlan);
                }
            }

            closeWindow();

        } catch (SQLException ex) {
            ex.printStackTrace();
            showAlert("Erreur lors de la mise à jour !");
        }
    }

    private void closeWindow() {
        Stage stage = (Stage) btnCancel.getScene().getWindow();
        stage.close();
    }

    private void showAlert(String msg) {
        Alert alert = new Alert(Alert.AlertType.WARNING);
        alert.setTitle("Attention");
        alert.setHeaderText(null);
        alert.setContentText(msg);
        alert.showAndWait();
    }

    private void addHoverEffect(Button btn, String normalColor, String hoverColor) {
        btn.setStyle("-fx-background-color:" + normalColor + ";" +
                "-fx-text-fill:white; -fx-font-weight:bold; " +
                "-fx-background-radius:15; -fx-padding:10 20;");

        btn.setOnMouseEntered(e -> btn.setStyle(
                "-fx-background-color:" + hoverColor + ";" +
                        "-fx-text-fill:white; -fx-font-weight:bold; " +
                        "-fx-background-radius:15; -fx-padding:10 20;"
        ));

        btn.setOnMouseExited(e -> btn.setStyle(
                "-fx-background-color:" + normalColor + ";" +
                        "-fx-text-fill:white; -fx-font-weight:bold; " +
                        "-fx-background-radius:15; -fx-padding:10 20;"
        ));
    }
}

