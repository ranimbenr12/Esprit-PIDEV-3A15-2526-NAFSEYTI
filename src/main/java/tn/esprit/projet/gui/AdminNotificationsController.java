package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.stage.Stage;

import tn.esprit.projet.models.Notification;
import tn.esprit.projet.models.User;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Participation;
import tn.esprit.projet.view.NotificationService;

import java.sql.SQLException;
import java.time.format.DateTimeFormatter;
import java.util.List;

public class AdminNotificationsController {

    @FXML private TableView<Notification> notificationsTable;
    @FXML private TableColumn<Notification, String> colMessage;
    @FXML private TableColumn<Notification, String> colDate;
    @FXML private TableColumn<Notification, Boolean> colStatus;
    @FXML private TableColumn<Notification, Void> colAction;
    @FXML private Label unreadCountLabel;
    @FXML private Button markAllReadBtn;
    @FXML private Button refreshBtn;

    private final NotificationService notificationService = new NotificationService();
    private final ObservableList<Notification> notifications = FXCollections.observableArrayList();
    private final DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");
    private final DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("dd MMMM yyyy");
    private final DateTimeFormatter timeFormatter = DateTimeFormatter.ofPattern("HH:mm");

    // Reference to the main controller to update badge
    private EvenementsController mainController;

    public void setMainController(EvenementsController controller) {
        this.mainController = controller;
    }

    @FXML
    public void initialize() {
        setupTableColumns();
        loadNotifications();

        markAllReadBtn.setOnAction(e -> markAllAsRead());
        refreshBtn.setOnAction(e -> loadNotifications());
    }

    // ===== LOAD NOTIFICATIONS METHOD =====
    private void loadNotifications() {
        try {
            List<Notification> list = notificationService.getAllNotificationsForAdmin();
            notifications.setAll(list);

            int unreadCount = notificationService.getUnreadCountForAdmin();
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

    // ===== MARK ALL AS READ METHOD =====
    private void markAllAsRead() {
        try {
            notificationService.markAllAsRead();
            loadNotifications();

            // Notify main controller to update badge
            if (mainController != null) {
                mainController.updateNotificationBadge();
            }

            showInfo("✅ Toutes les notifications ont été marquées comme lues.");
        } catch (SQLException e) {
            e.printStackTrace();
            showAlert("Erreur lors du marquage des notifications !");
        }
    }

    private void setupTableColumns() {
        colMessage.setCellValueFactory(new PropertyValueFactory<>("message"));

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
                viewBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-background-radius: 8; -fx-cursor: hand; -fx-font-size: 12px; -fx-padding: 8 15;");

                viewBtn.setOnMouseEntered(e ->
                        viewBtn.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white; -fx-background-radius: 8; -fx-cursor: hand; -fx-font-size: 12px; -fx-padding: 8 15;")
                );

                viewBtn.setOnMouseExited(e ->
                        viewBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-background-radius: 8; -fx-cursor: hand; -fx-font-size: 12px; -fx-padding: 8 15;")
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

    private void viewNotificationDetails(Notification notification) {
        try {
            if (!notification.isRead()) {
                notificationService.markAsRead(notification.getId());
                loadNotifications();

                // Notify main controller to update badge
                if (mainController != null) {
                    mainController.updateNotificationBadge();
                }
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
        // Create custom dialog
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("📋 Détails de la participation");
        dialog.setHeaderText(null);

        // Set dialog size
        dialog.getDialogPane().setPrefSize(500, 600);
        dialog.getDialogPane().setStyle("-fx-background-color: #f9f7f4; -fx-background-radius: 15; -fx-border-radius: 15; -fx-border-color: #d4c9b8; -fx-border-width: 1;");

        // Create main content
        VBox mainContent = new VBox(20);
        mainContent.setPadding(new Insets(20));
        mainContent.setStyle("-fx-background-color: #f9f7f4; -fx-background-radius: 15;");

        User user = notification.getUser();
        Event event = notification.getEvent();
        Participation participation = notification.getParticipation();

        // ===== HEADER WITH GRADIENT =====
        HBox headerBox = new HBox();
        headerBox.setStyle("-fx-background-color: linear-gradient(to right, #285921, #3d7e33); -fx-background-radius: 10; -fx-padding: 15;");
        headerBox.setAlignment(Pos.CENTER_LEFT);

        Label headerIcon = new Label("📌");
        headerIcon.setStyle("-fx-font-size: 28px; -fx-text-fill: white; -fx-padding: 0 10 0 0;");

        Label headerTitle = new Label("NOUVELLE PARTICIPATION");
        headerTitle.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: white;");

        Region headerSpacer = new Region();
        HBox.setHgrow(headerSpacer, javafx.scene.layout.Priority.ALWAYS);

        // Time badge
        Label timeBadge = new Label(participation.getParticipationDate().toLocalDateTime().format(timeFormatter));
        timeBadge.setStyle("-fx-background-color: rgba(255,255,255,0.2); -fx-text-fill: white; -fx-padding: 5 12; -fx-background-radius: 20; -fx-font-size: 12px; -fx-font-weight: bold;");

        headerBox.getChildren().addAll(headerIcon, headerTitle, headerSpacer, timeBadge);

        // ===== PARTICIPANT CARD =====
        TitledPane participantPane = new TitledPane();
        participantPane.setText("👤 INFORMATIONS DU PARTICIPANT");
        participantPane.setExpanded(true);
        participantPane.setStyle("-fx-background-color: white; -fx-border-color: #e0d9cc; -fx-border-radius: 10; -fx-background-radius: 10; -fx-font-weight: bold; -fx-text-fill: #285921;");

        GridPane participantGrid = new GridPane();
        participantGrid.setHgap(15);
        participantGrid.setVgap(12);
        participantGrid.setPadding(new Insets(15));
        participantGrid.setStyle("-fx-background-color: #ffffff; -fx-background-radius: 8;");

        // Avatar with initial
        StackPane avatarContainer = new StackPane();
        Circle avatarCircle = new Circle(35);
        avatarCircle.setFill(Color.web("#285921"));
        avatarCircle.setStroke(Color.web("#4CAF50"));
        avatarCircle.setStrokeWidth(2);

        Label initialLabel = new Label(user.getFirstname().substring(0, 1).toUpperCase() +
                (user.getLastname() != null ? user.getLastname().substring(0, 1).toUpperCase() : ""));
        initialLabel.setStyle("-fx-font-size: 28px; -fx-font-weight: bold; -fx-text-fill: white;");

        avatarContainer.getChildren().addAll(avatarCircle, initialLabel);
        participantGrid.add(avatarContainer, 0, 0, 1, 3);

        // Participant details
        Label nameLabel = new Label(user.getFirstname() + " " + (user.getLastname() != null ? user.getLastname() : ""));
        nameLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #285921;");
        participantGrid.add(nameLabel, 1, 0);

        // Role badge
        Label roleBadge = new Label(user.getRole());
        roleBadge.setStyle("-fx-background-color: #e8f0e8; -fx-text-fill: #285921; -fx-padding: 4 12; -fx-background-radius: 20; -fx-font-size: 12px; -fx-font-weight: bold;");
        participantGrid.add(roleBadge, 1, 1);

        // Contact info
        VBox contactBox = new VBox(5);

        HBox emailRow = new HBox(10);
        emailRow.setAlignment(Pos.CENTER_LEFT);
        Label emailIcon = new Label("📧");
        emailIcon.setStyle("-fx-font-size: 14px;");
        Label emailLabel = new Label(user.getEmail());
        emailLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #5a6c5a;");
        emailRow.getChildren().addAll(emailIcon, emailLabel);

        HBox phoneRow = new HBox(10);
        phoneRow.setAlignment(Pos.CENTER_LEFT);
        Label phoneIcon = new Label("📱");
        phoneIcon.setStyle("-fx-font-size: 14px;");
        String phone = user.getPhoneNumber() != null ? user.getPhoneNumber() : "Non renseigné";
        Label phoneLabel = new Label(phone);
        phoneLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #5a6c5a;");
        phoneRow.getChildren().addAll(phoneIcon, phoneLabel);

        contactBox.getChildren().addAll(emailRow, phoneRow);
        participantGrid.add(contactBox, 1, 2);

        participantPane.setContent(participantGrid);

        // ===== EVENT CARD =====
        TitledPane eventPane = new TitledPane();
        eventPane.setText("📌 DÉTAILS DE L'ÉVÉNEMENT");
        eventPane.setExpanded(true);
        eventPane.setStyle("-fx-background-color: white; -fx-border-color: #e0d9cc; -fx-border-radius: 10; -fx-background-radius: 10; -fx-font-weight: bold; -fx-text-fill: #285921;");

        GridPane eventGrid = new GridPane();
        eventGrid.setHgap(15);
        eventGrid.setVgap(12);
        eventGrid.setPadding(new Insets(15));
        eventGrid.setStyle("-fx-background-color: #ffffff; -fx-background-radius: 8;");

        // Event icon
        Label eventIcon = new Label("🎯");
        eventIcon.setStyle("-fx-font-size: 24px; -fx-padding: 0 10 0 0;");
        eventGrid.add(eventIcon, 0, 0);

        // Event title
        Label eventTitle = new Label(event.getTitle());
        eventTitle.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #285921;");
        eventGrid.add(eventTitle, 1, 0);

        // Event details
        addInfoRow(eventGrid, "📍 Lieu:", event.getLocation(), 1);
        addInfoRow(eventGrid, "📅 Date:", event.getEventDate() != null ?
                event.getEventDate().format(dateFormatter) : "Non définie", 2);

        // Progress bar
        HBox progressBox = new HBox(15);
        progressBox.setAlignment(Pos.CENTER_LEFT);

        ProgressBar progressBar = new ProgressBar((double) event.getCurrentParticipants() / event.getMaxParticipants());
        progressBar.setPrefWidth(200);
        progressBar.setPrefHeight(12);
        progressBar.setStyle("-fx-accent: #4CAF50; -fx-background-radius: 10;");

        Label progressLabel = new Label(event.getCurrentParticipants() + "/" + event.getMaxParticipants() + " places");
        progressLabel.setStyle("-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        progressBox.getChildren().addAll(progressBar, progressLabel);

        eventGrid.add(new Label("👥 Places:"), 0, 3);
        eventGrid.add(progressBox, 1, 3);

        // Creator info
        String creatorType = (event.getCreator_id() == 1) ? "Administrateur" : "Psychologue";
        Label creatorLabel = new Label("Créé par: " + creatorType);
        creatorLabel.setStyle("-fx-font-size: 12px; -fx-font-style: italic; -fx-text-fill: #8b9a8b;");
        eventGrid.add(creatorLabel, 1, 4);

        eventPane.setContent(eventGrid);

        // ===== PARTICIPATION CARD =====
        TitledPane participationPane = new TitledPane();
        participationPane.setText("✅ INFORMATIONS D'INSCRIPTION");
        participationPane.setExpanded(true);
        participationPane.setStyle("-fx-background-color: white; -fx-border-color: #e0d9cc; -fx-border-radius: 10; -fx-background-radius: 10; -fx-font-weight: bold; -fx-text-fill: #285921;");

        GridPane participationGrid = new GridPane();
        participationGrid.setHgap(15);
        participationGrid.setVgap(12);
        participationGrid.setPadding(new Insets(15));
        participationGrid.setStyle("-fx-background-color: #ffffff; -fx-background-radius: 8;");

        // Date d'inscription
        addInfoRow(participationGrid, "📅 Date:", participation.getParticipationDate().toLocalDateTime().format(dateFormatter), 0);
        addInfoRow(participationGrid, "⏰ Heure:", participation.getParticipationDate().toLocalDateTime().format(timeFormatter), 1);

        // Status badge
        HBox statusBox = new HBox(10);
        statusBox.setAlignment(Pos.CENTER_LEFT);

        String statusColor = participation.getStatus().equals("confirmed") ? "#4CAF50" : "#FF9800";
        String statusText = participation.getStatus().equals("confirmed") ? "Confirmée" : "En attente";

        Circle statusDot = new Circle(6);
        statusDot.setFill(Color.web(statusColor));

        Label statusLabel = new Label(statusText);
        statusLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: " + statusColor + ";");

        statusBox.getChildren().addAll(statusDot, statusLabel);

        participationGrid.add(new Label("✅ Statut:"), 0, 2);
        participationGrid.add(statusBox, 1, 2);

        participationPane.setContent(participationGrid);

        // ===== BUTTONS =====
        HBox buttonBar = new HBox(15);
        buttonBar.setAlignment(Pos.CENTER_RIGHT);
        buttonBar.setPadding(new Insets(10, 0, 0, 0));

        Button closeBtn = new Button("Fermer");
        closeBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 10 30; -fx-background-radius: 25; -fx-cursor: hand;");

        Button contactBtn = new Button("📧 Contacter");
        contactBtn.setStyle("-fx-background-color: #2196F3; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 10 30; -fx-background-radius: 25; -fx-cursor: hand;");

        // Hover effects
        closeBtn.setOnMouseEntered(e -> closeBtn.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 10 30; -fx-background-radius: 25; -fx-cursor: hand;"));
        closeBtn.setOnMouseExited(e -> closeBtn.setStyle("-fx-background-color: #374535; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 10 30; -fx-background-radius: 25; -fx-cursor: hand;"));

        contactBtn.setOnMouseEntered(e -> contactBtn.setStyle("-fx-background-color: #1976D2; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 10 30; -fx-background-radius: 25; -fx-cursor: hand;"));
        contactBtn.setOnMouseExited(e -> contactBtn.setStyle("-fx-background-color: #2196F3; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-padding: 10 30; -fx-background-radius: 25; -fx-cursor: hand;"));

        // Contact action
        contactBtn.setOnAction(e -> {
            try {
                // Open email client
                java.awt.Desktop.getDesktop().mail(new java.net.URI("mailto:" + user.getEmail()));
            } catch (Exception ex) {
                showAlert("Impossible d'ouvrir le client email");
            }
        });

        closeBtn.setOnAction(e -> dialog.close());

        buttonBar.getChildren().addAll(contactBtn, closeBtn);

        // ===== ASSEMBLE ALL =====
        mainContent.getChildren().addAll(headerBox, participantPane, eventPane, participationPane, buttonBar);

        // Add scroll pane for content
        ScrollPane scrollPane = new ScrollPane(mainContent);
        scrollPane.setFitToWidth(true);
        scrollPane.setStyle("-fx-background-color: transparent; -fx-background: transparent; -fx-border-color: transparent;");

        dialog.getDialogPane().setContent(scrollPane);
        dialog.getDialogPane().getButtonTypes().add(ButtonType.CLOSE);

        // Find and hide the default close button
        dialog.getDialogPane().lookupButton(ButtonType.CLOSE).setVisible(false);

        dialog.showAndWait();
    }

    private void addInfoRow(GridPane grid, String label, String value, int row) {
        Label labelNode = new Label(label);
        labelNode.setStyle("-fx-font-weight: bold; -fx-text-fill: #5a6c5a; -fx-min-width: 80;");

        Label valueNode = new Label(value);
        valueNode.setStyle("-fx-text-fill: #2c3e50; -fx-font-size: 13px;");
        valueNode.setWrapText(true);

        grid.add(labelNode, 0, row);
        grid.add(valueNode, 1, row);
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