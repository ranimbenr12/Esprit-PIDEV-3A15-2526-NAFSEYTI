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
import java.time.LocalDateTime;

public class PsychoCreateController {

    @FXML
    private TextField titleField;
    @FXML private TextField locationField;
    @FXML private DatePicker datePicker;
    @FXML private TextField linkField; // stores image path or link
    @FXML private TextField planDescriptionField; // new
    @FXML private TextField planDureeField;       // new
    @FXML private Button btnSave;
    @FXML private Button btnCancel;
    @FXML private ImageView imagePreview;

    private final EventService eventService = new EventService();
    private final PlanificationService planService = new PlanificationService(); // new

    @FXML
    public void initialize() {
        btnSave.setOnAction(e -> saveEvent());
        btnCancel.setOnAction(e -> closeWindow());
    }

    @FXML
    private void handleUploadImage() {
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Choose Event Image");
        fileChooser.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Image Files", "*.png", "*.jpg", "*.jpeg", "*.gif")
        );

        File selectedFile = fileChooser.showOpenDialog(null);
        if (selectedFile != null) {
            String path = selectedFile.toURI().toString();
            linkField.setText(path);
            imagePreview.setImage(new Image(path));
        }
    }

    private void saveEvent() {
        // ✅ Validation
        String title = titleField.getText().trim();
        String location = locationField.getText().trim();
        String planDesc = planDescriptionField.getText().trim();
        String planDuree = planDureeField.getText().trim();

        if (title.isEmpty() || title.length() < 3) {
            showAlert(Alert.AlertType.WARNING, "Validation Error", "Title must be at least 3 characters!");
            return;
        }
        if (location.isEmpty() || location.length() < 3) {
            showAlert(Alert.AlertType.WARNING, "Validation Error", "Location must be at least 3 characters!");
            return;
        }
        if (datePicker.getValue() == null) {
            showAlert(Alert.AlertType.WARNING, "Validation Error", "Please select an event date!");
            return;
        }

        // ✅ Planification validation
        if(planDesc.isEmpty() || planDesc.length() < 4) {
            showAlert(Alert.AlertType.WARNING, "Validation Error", "Plan description must be at least 4 characters!");
            return;
        }
        if(planDuree.isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Validation Error", "Plan duration cannot be empty!");
            return;
        }

        // ✅ Save Event
        try {
            Event event = new Event();
            event.setTitle(title);
            event.setLocation(location);
            event.setEventDate(datePicker.getValue());
            event.setLink(linkField.getText()); // optional image
            event.setCreator_id(1);
            event.setCreatedAt(LocalDateTime.now());

            eventService.insertOne(event);

            // ✅ Save Planification
            Planification plan = new Planification();
            plan.setIdEvent(event.getId());
            plan.setDescription(planDesc);
            plan.setDuree(planDuree);
            planService.insertOne(plan);

            showAlert(Alert.AlertType.INFORMATION, "Success", "Event and planification created successfully!");
            closeWindow();

        } catch (Exception e) {
            e.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Error", "Error creating event: " + e.getMessage());
        }
    }

    private void showAlert(Alert.AlertType type, String title, String message) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    private void closeWindow() {
        Stage stage = (Stage) btnCancel.getScene().getWindow();
        stage.close();
    }
}
