package tn.esprit.projet.gui;

import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.utils.QRCodeService;

public class QRCodeDialog {

    public static void showQRCode(Event event) {
        Stage stage = new Stage();
        stage.setTitle("QR Code - " + event.getTitle());

        VBox root = new VBox(20);
        root.setPadding(new Insets(25));
        root.setAlignment(Pos.CENTER);
        root.setStyle("-fx-background-color: #F5F1E6;");

        // Header
        Label headerLabel = new Label("📍 Localisation de l'événement");
        headerLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        // Event info
        Label eventLabel = new Label(event.getTitle());
        eventLabel.setStyle("-fx-font-size: 16px; -fx-font-weight: bold;");

        Label locationLabel = new Label(event.getLocation());
        locationLabel.setStyle("-fx-font-size: 14px; -fx-text-fill: #5a6c5a;");

        // Generate Google Maps URL
        String mapsUrl = QRCodeService.generateGoogleMapsUrl(event.getLocation(), event.getTitle());

        // Generate QR Code
        Image qrImage = QRCodeService.generateQRCode(mapsUrl);
        ImageView qrView = new ImageView(qrImage);
        qrView.setFitWidth(250);
        qrView.setFitHeight(250);
        qrView.setPreserveRatio(true);

        // URL display
        TextField urlField = new TextField(mapsUrl);
        urlField.setEditable(false);
        urlField.setStyle("-fx-background-color: white; -fx-border-color: #CFCBB3; -fx-border-radius: 5;");

        // Instructions
        Label instructionLabel = new Label("Scannez ce code QR pour ouvrir la localisation dans Google Maps");
        instructionLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #8b9a8b; -fx-text-alignment: center;");
        instructionLabel.setWrapText(true);
        instructionLabel.setMaxWidth(300);

        // Buttons
        Button copyBtn = new Button("📋 Copier le lien");
        copyBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-padding: 10 20; -fx-background-radius: 8; -fx-cursor: hand;");
        copyBtn.setOnAction(e -> {
            javafx.scene.input.Clipboard clipboard = javafx.scene.input.Clipboard.getSystemClipboard();
            javafx.scene.input.ClipboardContent content = new javafx.scene.input.ClipboardContent();
            content.putString(mapsUrl);
            clipboard.setContent(content);

            // Show temporary confirmation
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Copié");
            alert.setHeaderText(null);
            alert.setContentText("Lien copié dans le presse-papiers !");
            alert.showAndWait();
        });

        Button closeBtn = new Button("Fermer");
        closeBtn.setStyle("-fx-background-color: #b22222; -fx-text-fill: white; -fx-padding: 10 20; -fx-background-radius: 8; -fx-cursor: hand;");
        closeBtn.setOnAction(e -> stage.close());

        HBox buttonBox = new HBox(15);
        buttonBox.setAlignment(Pos.CENTER);
        buttonBox.getChildren().addAll(copyBtn, closeBtn);

        root.getChildren().addAll(headerLabel, eventLabel, locationLabel, qrView, urlField, instructionLabel, buttonBox);

        Scene scene = new Scene(root, 400, 550);
        stage.setScene(scene);
        stage.show();
    }
}