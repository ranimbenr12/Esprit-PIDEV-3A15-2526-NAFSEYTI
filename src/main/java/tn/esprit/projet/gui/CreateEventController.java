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

public class CreateEventController {

    @FXML private TextField titleField;
    @FXML private TextField locationField;
    @FXML private DatePicker datePicker;
<<<<<<< HEAD
    @FXML private TextField linkField; // stores image path or link
    @FXML private TextField planDescriptionField; // new
    @FXML private TextField planDureeField;       // new
=======
    @FXML private TextField linkField;
    @FXML private TextField maxParticipantsField;
    @FXML private TextField planDescriptionField;
    @FXML private TextField planDureeField;
>>>>>>> fd80a9a (final update)
    @FXML private Button btnSave;
    @FXML private Button btnCancel;
    @FXML private ImageView imagePreview;

    private final EventService eventService = new EventService();
<<<<<<< HEAD
    private final PlanificationService planService = new PlanificationService(); // new
// methode te5dm automatically ki t7el interface
=======
    private final PlanificationService planService = new PlanificationService();

>>>>>>> fd80a9a (final update)
    @FXML
    public void initialize() {
        btnSave.setOnAction(e -> saveEvent());
        btnCancel.setOnAction(e -> closeWindow());
<<<<<<< HEAD
=======

        // Add listeners for real-time validation
        titleField.textProperty().addListener((obs, old, newVal) -> validateTitle());
        locationField.textProperty().addListener((obs, old, newVal) -> validateLocation());
        maxParticipantsField.textProperty().addListener((obs, old, newVal) -> validateMaxParticipants());
        planDescriptionField.textProperty().addListener((obs, old, newVal) -> validatePlanificationFields());
        planDureeField.textProperty().addListener((obs, old, newVal) -> validatePlanificationFields());
>>>>>>> fd80a9a (final update)
    }

    @FXML
    private void handleUploadImage() {
        FileChooser fileChooser = new FileChooser();
<<<<<<< HEAD
        fileChooser.setTitle("Choose Event Image");
        fileChooser.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Image Files", "*.png", "*.jpg", "*.jpeg", "*.gif")
=======
        fileChooser.setTitle("Choisir une image pour l'événement");
        fileChooser.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Images", "*.png", "*.jpg", "*.jpeg", "*.gif")
>>>>>>> fd80a9a (final update)
        );

        File selectedFile = fileChooser.showOpenDialog(null);
        if (selectedFile != null) {
            String path = selectedFile.toURI().toString();
            linkField.setText(path);
            imagePreview.setImage(new Image(path));
        }
    }

<<<<<<< HEAD
    private void saveEvent() {
        // ✅ Validation
=======
    private boolean validateTitle() {
        String title = titleField.getText().trim();
        if (title.isEmpty()) {
            titleField.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            return false;
        } else if (title.length() < 3) {
            titleField.setStyle("-fx-border-color: orange; -fx-border-width: 2;");
            return false;
        } else {
            titleField.setStyle("-fx-border-color: green; -fx-border-width: 2;");
            return true;
        }
    }

    private boolean validateLocation() {
        String location = locationField.getText().trim();
        if (location.isEmpty()) {
            locationField.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            return false;
        } else if (location.length() < 3) {
            locationField.setStyle("-fx-border-color: orange; -fx-border-width: 2;");
            return false;
        } else {
            locationField.setStyle("-fx-border-color: green; -fx-border-width: 2;");
            return true;
        }
    }

    private boolean validateDate() {
        if (datePicker.getValue() == null) {
            datePicker.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            return false;
        } else {
            datePicker.setStyle("-fx-border-color: green; -fx-border-width: 2;");
            return true;
        }
    }

    private boolean validateMaxParticipants() {
        String maxPart = maxParticipantsField.getText().trim();
        if (maxPart.isEmpty()) {
            maxParticipantsField.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            return false;
        }

        try {
            int value = Integer.parseInt(maxPart);
            if (value <= 0) {
                maxParticipantsField.setStyle("-fx-border-color: orange; -fx-border-width: 2;");
                return false;
            } else {
                maxParticipantsField.setStyle("-fx-border-color: green; -fx-border-width: 2;");
                return true;
            }
        } catch (NumberFormatException e) {
            maxParticipantsField.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            return false;
        }
    }

    private boolean validatePlanificationFields() {
        String planDesc = planDescriptionField.getText().trim();
        String planDuree = planDureeField.getText().trim();

        // If both fields are empty, it's valid (optional)
        if (planDesc.isEmpty() && planDuree.isEmpty()) {
            planDescriptionField.setStyle("");
            planDureeField.setStyle("");
            return true;
        }

        // If one field is filled and the other is empty
        if (!planDesc.isEmpty() && planDuree.isEmpty()) {
            planDescriptionField.setStyle("-fx-border-color: green; -fx-border-width: 2;");
            planDureeField.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            return false;
        }

        if (planDesc.isEmpty() && !planDuree.isEmpty()) {
            planDescriptionField.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            planDureeField.setStyle("-fx-border-color: green; -fx-border-width: 2;");
            return false;
        }

        // Both fields are filled - validate each
        boolean valid = true;

        if (planDesc.length() < 4) {
            planDescriptionField.setStyle("-fx-border-color: orange; -fx-border-width: 2;");
            valid = false;
        } else {
            planDescriptionField.setStyle("-fx-border-color: green; -fx-border-width: 2;");
        }

        if (planDuree.isEmpty()) {
            planDureeField.setStyle("-fx-border-color: red; -fx-border-width: 2;");
            valid = false;
        } else {
            planDureeField.setStyle("-fx-border-color: green; -fx-border-width: 2;");
        }

        return valid;
    }

    private boolean validateAll() {
        boolean isValid = true;

        if (!validateTitle()) isValid = false;
        if (!validateLocation()) isValid = false;
        if (!validateDate()) isValid = false;
        if (!validateMaxParticipants()) isValid = false;

        // Validate planification fields
        String planDesc = planDescriptionField.getText().trim();
        String planDuree = planDureeField.getText().trim();

        if (!planDesc.isEmpty() || !planDuree.isEmpty()) {
            if (!validatePlanificationFields()) {
                isValid = false;
                if (planDesc.isEmpty() && !planDuree.isEmpty()) {
                    showAlert(Alert.AlertType.WARNING, "Validation",
                            "Veuillez ajouter une description pour la planification !");
                } else if (!planDesc.isEmpty() && planDuree.isEmpty()) {
                    showAlert(Alert.AlertType.WARNING, "Validation",
                            "Veuillez ajouter une durée pour la planification !");
                } else if (planDesc.length() < 4) {
                    showAlert(Alert.AlertType.WARNING, "Validation",
                            "La description doit contenir au moins 4 caractères !");
                }
            }
        }

        return isValid;
    }

    private void saveEvent() {
        if (!validateAll()) {
            return;
        }

>>>>>>> fd80a9a (final update)
        String title = titleField.getText().trim();
        String location = locationField.getText().trim();
        String planDesc = planDescriptionField.getText().trim();
        String planDuree = planDureeField.getText().trim();
<<<<<<< HEAD

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
=======
        int maxParticipants = Integer.parseInt(maxParticipantsField.getText().trim());

        try {
            // Create and save Event
>>>>>>> fd80a9a (final update)
            Event event = new Event();
            event.setTitle(title);
            event.setLocation(location);
            event.setEventDate(datePicker.getValue());
<<<<<<< HEAD
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
=======
            event.setLink(linkField.getText());
            event.setCreator_id(1); // Assuming logged-in user ID
            event.setCreatedAt(LocalDateTime.now());
            event.setMaxParticipants(maxParticipants);

            eventService.insertOne(event);

            // If planification fields are filled, create and save Planification
            if (!planDesc.isEmpty() && !planDuree.isEmpty()) {
                Planification plan = new Planification();
                plan.setIdEvent(event.getId()); // Get the generated event ID
                plan.setDescription(planDesc);
                plan.setDuree(planDuree);
                planService.insertOne(plan);

                showAlert(Alert.AlertType.INFORMATION, "Succès",
                        "Événement créé avec succès avec sa planification !");
            } else {
                showAlert(Alert.AlertType.INFORMATION, "Succès",
                        "Événement créé avec succès !");
            }

>>>>>>> fd80a9a (final update)
            closeWindow();

        } catch (Exception e) {
            e.printStackTrace();
<<<<<<< HEAD
            showAlert(Alert.AlertType.ERROR, "Error", "Error creating event: " + e.getMessage());
=======
            showAlert(Alert.AlertType.ERROR, "Erreur",
                    "Erreur lors de la création : " + e.getMessage());
>>>>>>> fd80a9a (final update)
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
<<<<<<< HEAD
}
=======
}
>>>>>>> fd80a9a (final update)
