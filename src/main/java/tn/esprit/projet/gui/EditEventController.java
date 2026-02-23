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

public class EditEventController {

    @FXML private TextField titleField;
    @FXML private TextField locationField;
    @FXML private DatePicker datePicker;
    @FXML private TextField linkField;
<<<<<<< HEAD
    @FXML private TextField planDescriptionField; // new
    @FXML private TextField planDureeField;       // new
=======
    @FXML private TextField maxParticipantsField;
    @FXML private TextField planDescriptionField;
    @FXML private TextField planDureeField;
>>>>>>> fd80a9a (final update)
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
<<<<<<< HEAD
=======
        maxParticipantsField.setText(String.valueOf(event.getMaxParticipants()));
>>>>>>> fd80a9a (final update)

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

<<<<<<< HEAD
=======
        // Add listeners for real-time validation
        titleField.textProperty().addListener((obs, old, newVal) -> validateTitle());
        locationField.textProperty().addListener((obs, old, newVal) -> validateLocation());
        maxParticipantsField.textProperty().addListener((obs, old, newVal) -> validateMaxParticipants());
        planDescriptionField.textProperty().addListener((obs, old, newVal) -> validatePlanificationFields());
        planDureeField.textProperty().addListener((obs, old, newVal) -> validatePlanificationFields());

>>>>>>> fd80a9a (final update)
        // Hover effects
        addHoverEffect(btnUpdate, "#4CAF50", "#45a049");
        addHoverEffect(btnCancel, "#b22222", "#8b0000");
    }

<<<<<<< HEAD
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

        return isValid;
    }

>>>>>>> fd80a9a (final update)
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
<<<<<<< HEAD
        if (titleField.getText().length() < 3 ||
                locationField.getText().length() < 3 ||
                datePicker.getValue() == null) {
            showAlert("Veuillez remplir correctement le titre, le lieu et la date (min 3 caractères).");
=======
        if (!validateAll()) {
            showAlert("Veuillez remplir correctement tous les champs obligatoires !");
>>>>>>> fd80a9a (final update)
            return;
        }

        try {
<<<<<<< HEAD
            eventToEdit.setTitle(titleField.getText());
            eventToEdit.setLocation(locationField.getText());
            eventToEdit.setEventDate(datePicker.getValue());
            eventToEdit.setLink(linkField.getText());
            eventToEdit.setCreatedAt(LocalDateTime.now());

            eventService.updateOne(eventToEdit);

            //  Update or create planification
            String planDesc = planDescriptionField.getText().trim();
            String planDuree = planDureeField.getText().trim();
            if(!planDesc.isEmpty() || !planDuree.isEmpty()) {
                if(currentPlan != null) {
=======
            // Update Event
            eventToEdit.setTitle(titleField.getText().trim());
            eventToEdit.setLocation(locationField.getText().trim());
            eventToEdit.setEventDate(datePicker.getValue());
            eventToEdit.setLink(linkField.getText());
            eventToEdit.setCreatedAt(LocalDateTime.now());
            eventToEdit.setMaxParticipants(Integer.parseInt(maxParticipantsField.getText().trim()));

            eventService.updateOne(eventToEdit);

            // Handle Planification
            String planDesc = planDescriptionField.getText().trim();
            String planDuree = planDureeField.getText().trim();

            // Remove planification if both fields are empty
            if (planDesc.isEmpty() && planDuree.isEmpty()) {
                if (currentPlan != null) {
                    planService.deletOne(currentPlan);
                    currentPlan = null;
                }
            }
            // Add or update planification
            else if (!planDesc.isEmpty() && !planDuree.isEmpty()) {
                if (planDesc.length() < 4) {
                    showAlert("La description de la planification doit contenir au moins 4 caractères !");
                    return;
                }

                if (currentPlan != null) {
                    // Update existing planification
>>>>>>> fd80a9a (final update)
                    currentPlan.setDescription(planDesc);
                    currentPlan.setDuree(planDuree);
                    planService.updateOne(currentPlan);
                } else {
<<<<<<< HEAD
                    Planification newPlan = new Planification();
                    newPlan.setIdEvent(eventToEdit.getId());
                    newPlan.setDescription(planDesc.isEmpty() ? "N/A" : planDesc);
                    newPlan.setDuree(planDuree.isEmpty() ? "N/A" : planDuree);
                    planService.insertOne(newPlan);
                }
            }

=======
                    // Create new planification
                    Planification newPlan = new Planification();
                    newPlan.setIdEvent(eventToEdit.getId());
                    newPlan.setDescription(planDesc);
                    newPlan.setDuree(planDuree);
                    planService.insertOne(newPlan);
                }
            }
            // Invalid state
            else {
                if (!planDesc.isEmpty() && planDuree.isEmpty()) {
                    showAlert("Veuillez ajouter une durée pour la planification !");
                } else if (planDesc.isEmpty() && !planDuree.isEmpty()) {
                    showAlert("Veuillez ajouter une description pour la planification !");
                }
                return;
            }

            showAlert(Alert.AlertType.INFORMATION, "Succès", "Événement modifié avec succès !");
>>>>>>> fd80a9a (final update)
            closeWindow();

        } catch (SQLException ex) {
            ex.printStackTrace();
            showAlert("Erreur lors de la mise à jour !");
<<<<<<< HEAD
=======
        } catch (NumberFormatException ex) {
            showAlert("Le nombre de participants doit être un nombre valide !");
>>>>>>> fd80a9a (final update)
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

<<<<<<< HEAD
=======
    private void showAlert(Alert.AlertType type, String title, String message) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

>>>>>>> fd80a9a (final update)
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
<<<<<<< HEAD
}
=======
}
>>>>>>> fd80a9a (final update)
