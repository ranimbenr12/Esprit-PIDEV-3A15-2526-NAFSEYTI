package tn.esprit.nafseyti.fxmlUser.controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.shape.Circle;
import tn.esprit.nafseyti.models.User;

import java.io.File;


public class ProfileViewController {

    @FXML
    private Circle profilePictureBorder;

    @FXML
    private ImageView profilePictureView;

    @FXML
    private Label profilePlaceholder;

    @FXML
    private Label nameLabel;

    @FXML
    private Label roleLabel;

    @FXML
    private Label emailLabel;

    @FXML
    private Label phoneLabel;

    @FXML
    private Label addressLabel;

    @FXML
    private Label locationLabel;


    public void setUser(User user) {
        if (user != null) {
            // Set name
            nameLabel.setText(user.getFirstname() + " " + user.getLastname());

            // Set role with color coding
            roleLabel.setText(user.getRole().toUpperCase());
            styleRoleBadge(user.getRole());

            // Set contact info
            emailLabel.setText(user.getEmail());
            phoneLabel.setText(user.getPhoneNumber() != null ? user.getPhoneNumber() : "Not provided");
            addressLabel.setText(user.getAddress() != null ? user.getAddress() : "Not provided");
            locationLabel.setText(user.getLocation() != null ? user.getLocation() : "Not provided");

            // Load profile picture
            loadProfilePicture(user.getProfilePhoto());
        }
    }


    private void loadProfilePicture(String photoPath) {
        if (photoPath != null && !photoPath.trim().isEmpty()) {
            try {
                File file = new File(photoPath);
                if (file.exists()) {
                    Image image = new Image(file.toURI().toString());
                    profilePictureView.setImage(image);
                    profilePlaceholder.setVisible(false);
                    profilePictureView.setVisible(true);
                } else {
                    // Try as URL
                    Image image = new Image(photoPath);
                    profilePictureView.setImage(image);
                    profilePlaceholder.setVisible(false);
                    profilePictureView.setVisible(true);
                }
            } catch (Exception e) {
                // Show placeholder if image fails to load
                showPlaceholder();
            }
        } else {
            // No photo path, show placeholder
            showPlaceholder();
        }
    }


    private void showPlaceholder() {
        profilePictureView.setVisible(false);
        profilePlaceholder.setVisible(true);
    }


    private void styleRoleBadge(String role) {
        String color;
        switch (role.toLowerCase()) {
            case "admin":
                color = "#e74c3c"; // Red
                break;
            case "therapist":
                color = "#27ae60"; // Green
                break;
            case "moderator":
                color = "#f39c12"; // Orange
                break;
            default:
                color = "#667eea"; // Blue (default)
                break;
        }

        roleLabel.setStyle(
                "-fx-background-color: " + color + ";" +
                        "-fx-text-fill: white;" +
                        "-fx-padding: 5 15;" +
                        "-fx-background-radius: 15;" +
                        "-fx-font-size: 12px;" +
                        "-fx-font-weight: bold;"
        );
    }
}