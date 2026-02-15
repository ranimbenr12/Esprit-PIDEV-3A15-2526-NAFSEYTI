package tn.esprit.projet.fxml.controllers;

import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import tn.esprit.projet.controllers.UserController;
import tn.esprit.projet.models.User;

import java.util.List;
import java.util.Optional;

/**
 * ViewAllUsersViewController - Controller for viewing all users with Update/Delete actions
 */
public class ViewAllUsersViewController {

    @FXML
    private TableView<User> usersTable;

    @FXML
    private TableColumn<User, String> idColumn;

    @FXML
    private TableColumn<User, String> nameColumn;

    @FXML
    private TableColumn<User, String> emailColumn;

    @FXML
    private TableColumn<User, String> roleColumn;

    @FXML
    private TableColumn<User, String> phoneColumn;

    @FXML
    private TableColumn<User, Void> actionsColumn;

    @FXML
    private Label totalLabel;

    @FXML
    private Button refreshButton;

    private UserController userController;
    private ObservableList<User> usersList;

    public ViewAllUsersViewController() {
        this.userController = new UserController();
        this.usersList = FXCollections.observableArrayList();
    }

    @FXML
    public void initialize() {
        setupTableColumns();
        loadUsers();
    }

    private void setupTableColumns() {
        // ID Column
        idColumn.setCellValueFactory(cellData ->
                new SimpleStringProperty(String.valueOf(cellData.getValue().getId())));

        // Name Column
        nameColumn.setCellValueFactory(cellData ->
                new SimpleStringProperty(cellData.getValue().getFirstname() + " " + cellData.getValue().getLastname()));

        // Email Column
        emailColumn.setCellValueFactory(cellData ->
                new SimpleStringProperty(cellData.getValue().getEmail()));

        // Role Column
        roleColumn.setCellValueFactory(cellData ->
                new SimpleStringProperty(cellData.getValue().getRole()));

        // Phone Column
        phoneColumn.setCellValueFactory(cellData -> {
            String phone = cellData.getValue().getPhoneNumber();
            return new SimpleStringProperty(phone != null ? phone : "N/A");
        });

        // Actions Column with Update and Delete buttons
        actionsColumn.setCellFactory(param -> new TableCell<>() {
            private final Button updateButton = new Button("Update Role");
            private final Button deleteButton = new Button("Delete");
            private final HBox buttonsBox = new HBox(10, updateButton, deleteButton);

            {
                // Style Update button
                updateButton.setStyle(
                        "-fx-background-color: #FF9800; " +
                                "-fx-text-fill: white; " +
                                "-fx-padding: 5 10; " +
                                "-fx-font-size: 11px;"
                );

                // Style Delete button
                deleteButton.setStyle(
                        "-fx-background-color: #f44336; " +
                                "-fx-text-fill: white; " +
                                "-fx-padding: 5 10; " +
                                "-fx-font-size: 11px;"
                );

                buttonsBox.setAlignment(Pos.CENTER);

                // Update button action
                updateButton.setOnAction(event -> {
                    User user = getTableView().getItems().get(getIndex());
                    handleUpdateRole(user);
                });

                // Delete button action
                deleteButton.setOnAction(event -> {
                    User user = getTableView().getItems().get(getIndex());
                    handleDeleteUser(user);
                });
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                if (empty) {
                    setGraphic(null);
                } else {
                    setGraphic(buttonsBox);
                }
            }
        });
    }

    @FXML
    private void handleRefresh(ActionEvent event) {
        loadUsers();
    }

    private void loadUsers() {
        List<User> users = userController.getAllUsers();
        usersList.clear();
        usersList.addAll(users);
        usersTable.setItems(usersList);
        totalLabel.setText("Total Users: " + users.size());
    }

    /**
     * Handle update role for a user
     */
    private void handleUpdateRole(User user) {
        // Create dialog for role selection
        Dialog<String> dialog = new Dialog<>();
        dialog.setTitle("Update User Role");
        dialog.setHeaderText("Update role for: " + user.getFirstname() + " " + user.getLastname());

        // Set button types
        ButtonType updateButtonType = new ButtonType("Update", ButtonBar.ButtonData.OK_DONE);
        dialog.getDialogPane().getButtonTypes().addAll(updateButtonType, ButtonType.CANCEL);

        // Create role selection
        ComboBox<String> roleComboBox = new ComboBox<>();
        roleComboBox.getItems().addAll("user", "admin", "therapist", "moderator");
        roleComboBox.setValue(user.getRole());
        roleComboBox.setPrefWidth(200);

        HBox content = new HBox(10);
        content.setAlignment(Pos.CENTER_LEFT);
        content.getChildren().addAll(new Label("New Role:"), roleComboBox);
        dialog.getDialogPane().setContent(content);

        // Convert result
        dialog.setResultConverter(dialogButton -> {
            if (dialogButton == updateButtonType) {
                return roleComboBox.getValue();
            }
            return null;
        });

        Optional<String> result = dialog.showAndWait();
        result.ifPresent(newRole -> {
            if (userController.updateUserRole(user, newRole)) {
                showAlert("Success", "Role updated to: " + newRole, Alert.AlertType.INFORMATION);
                loadUsers(); // Refresh table
            } else {
                showAlert("Error", "Failed to update role", Alert.AlertType.ERROR);
            }
        });
    }

    /**
     * Handle delete user
     */
    private void handleDeleteUser(User user) {
        Alert confirmation = new Alert(Alert.AlertType.CONFIRMATION);
        confirmation.setTitle("Delete User");
        confirmation.setHeaderText("Delete " + user.getFirstname() + " " + user.getLastname() + "?");
        confirmation.setContentText("This action cannot be undone. Are you sure?");

        Optional<ButtonType> result = confirmation.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            if (userController.deleteUser(user.getId())) {
                showAlert("Success", "User deleted successfully", Alert.AlertType.INFORMATION);
                loadUsers(); // Refresh table
            } else {
                showAlert("Error", "Failed to delete user", Alert.AlertType.ERROR);
            }
        }
    }

    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}