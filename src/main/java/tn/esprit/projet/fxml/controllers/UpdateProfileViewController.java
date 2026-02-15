package tn.esprit.projet.fxml.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import tn.esprit.projet.controllers.UserController;
import tn.esprit.projet.models.User;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;

/**
 * UpdateProfileViewController - Controller with profile picture upload
 */
public class UpdateProfileViewController {

    @FXML
    private ImageView profilePicturePreview;

    @FXML
    private Label profilePlaceholder;

    @FXML
    private Button uploadButton;

    @FXML
    private Button removePhotoButton;

    @FXML
    private TextField firstnameField;

    @FXML
    private TextField lastnameField;

    @FXML
    private TextField addressField;

    @FXML
    private TextField locationField;

    @FXML
    private TextField phoneField;

    @FXML
    private Label messageLabel;

    @FXML
    private Button saveButton;

    private User currentUser;
    private UserController userController;
    private Runnable onUpdateCallback;
    private String selectedPhotoPath;

    public UpdateProfileViewController() {
        this.userController = new UserController();
    }

    /**
     * Set user data and optional callback for refresh
     */
    public void setUser(User user, Runnable onUpdateCallback) {
        this.currentUser = user;
        this.onUpdateCallback = onUpdateCallback;

        if (user != null) {
            firstnameField.setText(user.getFirstname());
            lastnameField.setText(user.getLastname());
            addressField.setText(user.getAddress() != null ? user.getAddress() : "");
            locationField.setText(user.getLocation() != null ? user.getLocation() : "");
            phoneField.setText(user.getPhoneNumber() != null ? user.getPhoneNumber() : "");

            // Load existing profile picture
            loadProfilePicture(user.getProfilePhoto());
        }
    }

    @FXML
    private void handleUploadPhoto(ActionEvent event) {
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Select Profile Picture");

        // Set extension filters
        fileChooser.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Image Files", "*.png", "*.jpg", "*.jpeg", "*.gif")
        );

        // Show open file dialog
        Stage stage = (Stage) uploadButton.getScene().getWindow();
        File selectedFile = fileChooser.showOpenDialog(stage);

        if (selectedFile != null) {
            // Check file size (max 5MB)
            long fileSizeInMB = selectedFile.length() / (1024 * 1024);
            if (fileSizeInMB > 5) {
                showMessage("File size exceeds 5MB. Please choose a smaller image.", "RED");
                return;
            }

            try {
                // Create uploads directory if it doesn't exist
                Path uploadsDir = Paths.get("uploads/profile_pictures");
                Files.createDirectories(uploadsDir);

                // Generate unique filename
                String extension = getFileExtension(selectedFile.getName());
                String newFileName = "profile_" + currentUser.getId() + "_" + System.currentTimeMillis() + extension;
                Path targetPath = uploadsDir.resolve(newFileName);

                // Copy file to uploads directory
                Files.copy(selectedFile.toPath(), targetPath, StandardCopyOption.REPLACE_EXISTING);

                // Store the path
                selectedPhotoPath = targetPath.toString();

                // Preview the image
                Image image = new Image(selectedFile.toURI().toString());
                profilePicturePreview.setImage(image);
                profilePlaceholder.setVisible(false);
                profilePicturePreview.setVisible(true);
                removePhotoButton.setVisible(true);

                showMessage("Photo uploaded successfully! Click 'Save Changes' to update.", "GREEN");

            } catch (IOException e) {
                showMessage("Error uploading photo: " + e.getMessage(), "RED");
                e.printStackTrace();
            }
        }
    }

    @FXML
    private void handleRemovePhoto(ActionEvent event) {
        Alert confirmation = new Alert(Alert.AlertType.CONFIRMATION);
        confirmation.setTitle("Remove Photo");
        confirmation.setHeaderText("Remove profile picture?");
        confirmation.setContentText("This will remove your current profile picture.");

        confirmation.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                selectedPhotoPath = null;
                profilePicturePreview.setImage(null);
                profilePicturePreview.setVisible(false);
                profilePlaceholder.setVisible(true);
                removePhotoButton.setVisible(false);
                showMessage("Photo removed. Click 'Save Changes' to update.", "ORANGE");
            }
        });
    }

    @FXML
    private void handleSave(ActionEvent event) {
        if (currentUser == null) {
            showMessage("Error: No user loaded", "RED");
            return;
        }

        String firstname = firstnameField.getText().trim();
        String lastname = lastnameField.getText().trim();
        String address = addressField.getText().trim();
        String location = locationField.getText().trim();
        String phone = phoneField.getText().trim();

        // Update profile
        if (userController.updateUserProfile(currentUser, firstname, lastname, address, location, phone)) {

            // Update profile photo if changed
            if (selectedPhotoPath != null || (selectedPhotoPath == null && removePhotoButton.isVisible())) {
                userController.updateProfilePhoto(currentUser, selectedPhotoPath);
            }

            // Refresh user data
            currentUser = userController.getUserById(currentUser.getId());
            showMessage("Profile updated successfully!", "GREEN");

            // Call callback if provided (to refresh parent view)
            if (onUpdateCallback != null) {
                onUpdateCallback.run();
            }
        } else {
            showMessage("Failed to update profile. Check console for errors.", "RED");
        }
    }

    /**
     * Load profile picture from path
     */
    private void loadProfilePicture(String photoPath) {
        if (photoPath != null && !photoPath.trim().isEmpty()) {
            try {
                File file = new File(photoPath);
                if (file.exists()) {
                    Image image = new Image(file.toURI().toString());
                    profilePicturePreview.setImage(image);
                    profilePlaceholder.setVisible(false);
                    profilePicturePreview.setVisible(true);
                    removePhotoButton.setVisible(true);
                    selectedPhotoPath = photoPath;
                }
            } catch (Exception e) {
                // Show placeholder if loading fails
                showPlaceholder();
            }
        } else {
            showPlaceholder();
        }
    }

    /**
     * Show placeholder
     */
    private void showPlaceholder() {
        profilePicturePreview.setVisible(false);
        profilePlaceholder.setVisible(true);
        removePhotoButton.setVisible(false);
    }

    /**
     * Get file extension
     */
    private String getFileExtension(String fileName) {
        int lastIndexOf = fileName.lastIndexOf(".");
        if (lastIndexOf == -1) {
            return ""; // No extension
        }
        return fileName.substring(lastIndexOf);
    }

    private void showMessage(String message, String color) {
        messageLabel.setText(message);
        messageLabel.setStyle("-fx-text-fill: " + color + ";");
        messageLabel.setVisible(true);
    }

    /**
     * Get the updated user (useful for parent controllers)
     */
    public User getUpdatedUser() {
        return currentUser;
    }
}