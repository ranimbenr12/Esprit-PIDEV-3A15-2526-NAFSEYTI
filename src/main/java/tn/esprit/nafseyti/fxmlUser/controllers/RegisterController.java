package tn.esprit.nafseyti.fxmlUser.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.service.UserController;
import javafx.scene.control.ComboBox;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import java.io.File;

public class RegisterController {

    @FXML
    private TextField firstnameField;

    @FXML
    private TextField lastnameField;

    @FXML
    private TextField emailField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private PasswordField confirmPasswordField;

    @FXML
    private TextField phoneField;

    @FXML
    private TextField addressField;

    @FXML
    private TextField locationField;

    @FXML
    private Label errorLabel;

    @FXML
    private Label successLabel;

    @FXML
    private Button registerButton;

    @FXML
    private Hyperlink loginLink;

    private UserController userController;
    // ── Nouveaux champs FXML ──
    @FXML private ComboBox<String> roleComboBox;

    @FXML private ImageView photoPreview;
    @FXML private Label photoPlaceholder;
    @FXML private Label photoNameLabel;
    @FXML private Button choosePhotoBtn;

    private String selectedPhotoPath = null; //

    public RegisterController() {
        this.userController = new UserController();

    }
    @FXML
    public void initialize() {
        // ✅ C'est ici que les composants FXML sont prêts
        roleComboBox.getItems().addAll("etudiant","enseignant","psychologue","coach_vie","administrateur");
    }

    @FXML
    private void handleChoosePhoto(ActionEvent event) {
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Choisir une photo de profil");
        fileChooser.getExtensionFilters().add(
                new FileChooser.ExtensionFilter("Images", "*.jpg", "*.jpeg", "*.png")
        );

        File file = fileChooser.showOpenDialog(choosePhotoBtn.getScene().getWindow());

        if (file != null) {
            selectedPhotoPath = file.getAbsolutePath();
            photoNameLabel.setText(file.getName());

            // Afficher aperçu
            Image image = new Image(file.toURI().toString());
            photoPreview.setImage(image);
            photoPreview.setVisible(true);
            photoPlaceholder.setVisible(false);
        }
    }
    @FXML
    private void handleRegister(ActionEvent event) {
        String firstname = firstnameField.getText().trim();
        String lastname  = lastnameField.getText().trim();
        String email     = emailField.getText().trim();
        String password  = passwordField.getText();
        String confirmPassword = confirmPasswordField.getText();
        String phone     = phoneField.getText().trim();
        String address   = addressField.getText().trim();
        String location  = locationField.getText().trim();
        String role      = roleComboBox.getValue(); // ← rôle sélectionné

        errorLabel.setVisible(false);
        successLabel.setVisible(false);

        // Validation rôle
        if (role == null || role.isEmpty()) {
            showError("Please select a role.");
            return;
        }

        User user = userController.registerUser(firstname, lastname, email, password, confirmPassword);

        if (user != null) {
            // Appliquer le rôle
            userController.updateUserRole(user, role.toLowerCase());

            // Appliquer photo + champs optionnels
            if (!phone.isEmpty() || !address.isEmpty() || !location.isEmpty()) {
                userController.updateUserProfile(user, firstname, lastname, address, location, phone);
            }
            if (selectedPhotoPath != null) {
                userController.updateProfilePhoto(user, selectedPhotoPath);
            }

            showSuccess("Registration successful! Redirecting...");
            clearForm();

            new Thread(() -> {
                try {
                    Thread.sleep(2000);
                    javafx.application.Platform.runLater(() -> {
                        try {
                            Parent root = FXMLLoader.load(getClass().getResource("/fxmlUser/Login.fxml"));
                            Stage stage = (Stage) registerButton.getScene().getWindow();
                            stage.setScene(new Scene(root));
                            stage.setTitle("NAFSEYTI - Login");
                            stage.setHeight(600);
                            stage.centerOnScreen();
                        } catch (Exception ex) { ex.printStackTrace(); }
                    });
                } catch (InterruptedException e) { e.printStackTrace(); }
            }).start();

        } else {
            showError("Registration failed. Please check your inputs.");
        }
    }

    @FXML
    private void handleBackToLogin(ActionEvent event) {
        try {
            // Load login screen
            Parent root = FXMLLoader.load(getClass().getResource("/fxmlUser/Login.fxml"));
            Stage stage = (Stage) (loginLink != null ? loginLink.getScene().getWindow() : registerButton.getScene().getWindow());
            Scene scene = new Scene(root);
            scene.getStylesheets().add(getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI - Login");
            stage.setHeight(600);
            stage.centerOnScreen();

        } catch (Exception e) {
            showError("Error loading login page: " + e.getMessage());
            e.printStackTrace();
        }
    }

    // ── clearForm() : ajouter reset photo et rôle ──
    private void clearForm() {
        firstnameField.clear(); lastnameField.clear();
        emailField.clear(); passwordField.clear();
        confirmPasswordField.clear(); phoneField.clear();
        addressField.clear(); locationField.clear();
        roleComboBox.setValue(null);          // ← reset rôle
        photoPreview.setVisible(false);       // ← reset photo
        photoPlaceholder.setVisible(true);
        photoNameLabel.setText("JPG, PNG — max 2 Mo");
        selectedPhotoPath = null;
    }

    private void showError(String message) {
        errorLabel.setText(message);
        errorLabel.setVisible(true);
        successLabel.setVisible(false);
    }

    private void showSuccess(String message) {
        successLabel.setText(message);
        successLabel.setVisible(true);
        errorLabel.setVisible(false);
    }
}