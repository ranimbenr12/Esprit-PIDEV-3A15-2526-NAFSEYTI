package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.scene.image.Image; // ADD THIS IMPORT
import javafx.scene.image.ImageView; // ADD THIS IMPORT
import javafx.scene.control.Dialog; // ADD THIS IMPORT
import javafx.scene.control.ButtonType; // ADD THIS IMPORT

import tn.esprit.projet.models.Notification;
import tn.esprit.projet.models.User;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Participation;
import tn.esprit.projet.view.NotificationService; // Changed from view to service

import java.sql.SQLException;
import java.time.format.DateTimeFormatter;
import java.util.List;

public class PsychologueNotificationsController {

    @FXML private TableView<Notification> notificationsTable;
    @FXML private TableColumn<Notification, String> colMessage;
    @FXML private TableColumn<Notification, String> colEvent;
    @FXML private TableColumn<Notification, String> colDate;
    @FXML private TableColumn<Notification, Boolean> colStatus;
    @FXML private TableColumn<Notification, Void> colAction;
    @FXML private Label unreadCountLabel;
    @FXML private Button markAllReadBtn;
    @FXML private Button refreshBtn;

    private final NotificationService notificationService = new NotificationService();
    private final ObservableList<Notification> notifications = FXCollections.observableArrayList();
    private final DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");
    private int currentPsychologueId = 2; // Assuming psychologist ID is 2 (Sarra)

    @FXML
    public void initialize() {
        setupTableColumns();
        loadNotifications();

        markAllReadBtn.setOnAction(e -> markAllAsRead());
        refreshBtn.setOnAction(e -> loadNotifications());
    }

    private void setupTableColumns() {
        colMessage.setCellValueFactory(new PropertyValueFactory<>("message"));

        colEvent.setCellValueFactory(cell -> {
            if (cell.getValue().getEvent() != null) {
                return new javafx.beans.property.SimpleStringProperty(cell.getValue().getEvent().getTitle());
            }
            return new javafx.beans.property.SimpleStringProperty("");
        });

        colDate.setCellValueFactory(cell ->
                new javafx.beans.property.SimpleStringProperty(
                        cell.getValue().getCreatedAt().toLocalDateTime().format(formatter)
                )
        );

        colStatus.setCellValueFactory(cell ->
                new javafx.beans.property.SimpleBooleanProperty(cell.getValue().isRead())
        );

        colStatus.setCellFactory(col -> new TableCell<Notification, Boolean>() {
            @Override
            protected void updateItem(Boolean isRead, boolean empty) {
                super.updateItem(isRead, empty);
                if (empty || isRead == null) {
                    setText(null);
                } else {
                    setText(isRead ? "✅ Lu" : "🆕 Non lu");
                    setStyle(isRead ? "-fx-text-fill: gray;" : "-fx-text-fill: #285921; -fx-font-weight: bold;");
                }
            }
        });

        colAction.setCellFactory(col -> new TableCell<Notification, Void>() {
            private final Button viewBtn = new Button("👤 Voir détails");
            {
                viewBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-background-radius: 8; -fx-cursor: hand;");

                viewBtn.setOnMouseEntered(e ->
                        viewBtn.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white; -fx-background-radius: 8; -fx-cursor: hand;")
                );

                viewBtn.setOnMouseExited(e ->
                        viewBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-background-radius: 8; -fx-cursor: hand;")
                );

                viewBtn.setOnAction(e -> {
                    Notification notification = getTableView().getItems().get(getIndex());
                    viewNotificationDetails(notification);
                });
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                setGraphic(empty ? null : viewBtn);
            }
        });

        notificationsTable.setItems(notifications);
    }

    private void loadNotifications() {
        try {
            List<Notification> list = notificationService.getNotificationsForPsychologue(currentPsychologueId);
            notifications.setAll(list);

            int unreadCount = 0;
            for (Notification n : list) {
                if (!n.isRead()) unreadCount++;
            }
            unreadCountLabel.setText("🔔 Non lues: " + unreadCount);

            if (unreadCount > 0) {
                unreadCountLabel.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white; -fx-padding: 8 15; -fx-background-radius: 20; -fx-font-weight: bold;");
            } else {
                unreadCountLabel.setStyle("-fx-background-color: #cccccc; -fx-text-fill: #333333; -fx-padding: 8 15; -fx-background-radius: 20;");
            }

        } catch (SQLException e) {
            e.printStackTrace();
            showAlert("Erreur lors du chargement des notifications !");
        }
    }

    private void viewNotificationDetails(Notification notification) {
        try {
            if (!notification.isRead()) {
                notificationService.markAsRead(notification.getId());
                loadNotifications();
            }

            Notification fullNotification = notificationService.getNotificationWithDetails(notification.getId());

            if (fullNotification != null && fullNotification.getUser() != null && fullNotification.getEvent() != null) {
                showDetailedNotificationDialog(fullNotification);
            } else {
                showAlert("Impossible de charger les détails complets de cette notification.");
            }

        } catch (SQLException e) {
            e.printStackTrace();
            showAlert("Erreur lors du chargement des détails !");
        }
    }

    private void showDetailedNotificationDialog(Notification notification) {
        Dialog<Void> dialog = new Dialog<>();
        dialog.setTitle("📋 Détails de la participation");
        dialog.setHeaderText(null);

        // Set dialog size
        dialog.getDialogPane().setPrefSize(500, 550);

        // Create custom content
        VBox content = new VBox(20);
        content.setPadding(new Insets(25));
        content.setStyle("-fx-background-color: #F5F1E6;");

        // Header with icon
        HBox headerBox = new HBox(15);
        headerBox.setAlignment(Pos.CENTER_LEFT);

        Label iconLabel = new Label("👤");
        iconLabel.setStyle("-fx-font-size: 40px;");

        Label titleLabel = new Label("Nouvelle participation à votre événement");
        titleLabel.setStyle("-fx-font-size: 22px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        headerBox.getChildren().addAll(iconLabel, titleLabel);

        // Separator
        Separator separator = new Separator();
        separator.setStyle("-fx-background-color: #285921;");

        // User Information Section
        TitledPane userPane = new TitledPane();
        userPane.setText("👤 Informations du participant");
        userPane.setExpanded(true);
        userPane.setStyle("-fx-background-color: white; -fx-border-color: #285921; -fx-border-radius: 8;");

        GridPane userGrid = new GridPane();
        userGrid.setHgap(15);
        userGrid.setVgap(12);
        userGrid.setPadding(new Insets(15));

        User user = notification.getUser();

        // Profile photo if available
        if (user.getProfilePhoto() != null && !user.getProfilePhoto().isEmpty()) {
            try {
                ImageView profilePic = new ImageView(new Image(user.getProfilePhoto()));
                profilePic.setFitHeight(80);
                profilePic.setFitWidth(80);
                profilePic.setPreserveRatio(true);
                userGrid.add(profilePic, 0, 0, 1, 4);
            } catch (Exception e) {
                // Skip image if not available
                System.err.println("Could not load profile image: " + e.getMessage());
            }
        }

        int colOffset = (user.getProfilePhoto() != null && !user.getProfilePhoto().isEmpty()) ? 1 : 0;

        addUserInfoRow(userGrid, "👤 Nom complet:", user.getFirstname() + " " + user.getLastname(), 0, colOffset);
        addUserInfoRow(userGrid, "📧 Email:", user.getEmail(), 1, colOffset);
        addUserInfoRow(userGrid, "🎭 Rôle:", user.getRole(), 2, colOffset);
        addUserInfoRow(userGrid, "📱 Téléphone:", user.getPhoneNumber() != null ? user.getPhoneNumber() : "Non renseigné", 3, colOffset);

        userPane.setContent(userGrid);

        // Event Information Section
        TitledPane eventPane = new TitledPane();
        eventPane.setText("📌 Détails de votre événement");
        eventPane.setExpanded(true);
        eventPane.setStyle("-fx-background-color: white; -fx-border-color: #285921; -fx-border-radius: 8;");

        GridPane eventGrid = new GridPane();
        eventGrid.setHgap(15);
        eventGrid.setVgap(12);
        eventGrid.setPadding(new Insets(15));

        Event event = notification.getEvent();

        addInfoRow(eventGrid, "📌 Titre:", event.getTitle(), 0);
        addInfoRow(eventGrid, "📍 Lieu:", event.getLocation(), 1);
        addInfoRow(eventGrid, "📅 Date:", event.getEventDate() != null ?
                event.getEventDate().format(DateTimeFormatter.ofPattern("dd/MM/yyyy")) : "Non définie", 2);
        addInfoRow(eventGrid, "👥 Participants:",
                event.getCurrentParticipants() + " / " + event.getMaxParticipants(), 3);

        eventPane.setContent(eventGrid);

        // Participation Information Section
        TitledPane participationPane = new TitledPane();
        participationPane.setText("✅ Informations de participation");
        participationPane.setExpanded(true);
        participationPane.setStyle("-fx-background-color: white; -fx-border-color: #285921; -fx-border-radius: 8;");

        GridPane participationGrid = new GridPane();
        participationGrid.setHgap(15);
        participationGrid.setVgap(12);
        participationGrid.setPadding(new Insets(15));

        Participation participation = notification.getParticipation();

        addInfoRow(participationGrid, "📅 Date d'inscription:",
                participation.getParticipationDate().toLocalDateTime()
                        .format(DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm")), 0);
        addInfoRow(participationGrid, "✅ Statut:", participation.getStatus(), 1);

        participationPane.setContent(participationGrid);

        // Button bar
        HBox buttonBar = new HBox(15);
        buttonBar.setAlignment(Pos.CENTER_RIGHT);

        Button closeBtn = new Button("Fermer");
        closeBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-padding: 10 30; -fx-background-radius: 8; -fx-cursor: hand;");

        closeBtn.setOnMouseEntered(e ->
                closeBtn.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white; -fx-padding: 10 30; -fx-background-radius: 8; -fx-cursor: hand;")
        );

        closeBtn.setOnMouseExited(e ->
                closeBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-padding: 10 30; -fx-background-radius: 8; -fx-cursor: hand;")
        );

        closeBtn.setOnAction(e -> ((Stage) closeBtn.getScene().getWindow()).close());

        buttonBar.getChildren().add(closeBtn);

        // Add all to content
        content.getChildren().addAll(headerBox, separator, userPane, eventPane, participationPane, buttonBar);

        dialog.getDialogPane().setContent(content);

        // Add button type
        dialog.getDialogPane().getButtonTypes().add(ButtonType.CLOSE);

        dialog.showAndWait();
    }
    private void addUserInfoRow(GridPane grid, String label, String value, int row, int colOffset) {
        Label labelNode = new Label(label);
        labelNode.setStyle("-fx-font-weight: bold; -fx-min-width: 120;");
        Label valueNode = new Label(value);
        valueNode.setWrapText(true);
        valueNode.setStyle("-fx-text-fill: #5a6c5a;");
        grid.add(labelNode, colOffset, row);
        grid.add(valueNode, colOffset + 1, row);
    }

    private void addInfoRow(GridPane grid, String label, String value, int row) {
        Label labelNode = new Label(label);
        labelNode.setStyle("-fx-font-weight: bold; -fx-min-width: 120;");
        Label valueNode = new Label(value);
        valueNode.setWrapText(true);
        valueNode.setStyle("-fx-text-fill: #5a6c5a;");
        grid.add(labelNode, 0, row);
        grid.add(valueNode, 1, row);
    }

    private void markAllAsRead() {
        try {
            notificationService.markAllAsReadForPsychologue(currentPsychologueId);
            loadNotifications();
            showInfo("✅ Toutes les notifications ont été marquées comme lues.");
        } catch (SQLException e) {
            e.printStackTrace();
            showAlert("Erreur lors du marquage des notifications !");
        }
    }

    private void showAlert(String msg) {
        Alert alert = new Alert(Alert.AlertType.WARNING);
        alert.setTitle("Attention");
        alert.setHeaderText(null);
        alert.setContentText(msg);
        alert.showAndWait();
    }

    private void showInfo(String msg) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Information");
        alert.setHeaderText(null);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}