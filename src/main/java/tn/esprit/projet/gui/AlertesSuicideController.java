package tn.esprit.projet.gui;

import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import tn.esprit.projet.services.AlerteService;
import tn.esprit.projet.utils.SessionManager;

import java.time.format.DateTimeFormatter;
import java.util.List;

public class AlertesSuicideController {

    @FXML private Label lblCompteur;
    @FXML private TableView<Object[]> tableAlertes;
    @FXML private TableColumn<Object[], String> colPatient;
    @FXML private TableColumn<Object[], String> colDate;
    @FXML private TableColumn<Object[], String> colMessage;
    @FXML private TableColumn<Object[], String> colMots;
    @FXML private TableColumn<Object[], String> colStatut;
    @FXML private TableColumn<Object[], String> colAction;

    private AlerteService alerteService = new AlerteService();
    private ObservableList<Object[]> alertesList = FXCollections.observableArrayList();

    @FXML
    public void initialize() {
        // Configuration des colonnes
        colPatient.setCellValueFactory(data -> new SimpleStringProperty((String) data.getValue()[1]));

        colDate.setCellValueFactory(data -> {
            if (data.getValue()[4] != null) {
                return new SimpleStringProperty(
                        data.getValue()[4].toString().substring(0, 16)
                );
            }
            return new SimpleStringProperty("");
        });

        colMessage.setCellValueFactory(data -> new SimpleStringProperty((String) data.getValue()[2]));
        colMots.setCellValueFactory(data -> new SimpleStringProperty((String) data.getValue()[3]));

        colStatut.setCellValueFactory(data -> {
            boolean traite = (boolean) data.getValue()[5];
            return new SimpleStringProperty(traite ? "✅ Traitée" : "⏳ En attente");
        });

        // Bouton d'action
        colAction.setCellFactory(col -> new TableCell<Object[], String>() {
            final Button btn = new Button("Voir");
            {
                btn.setOnAction(event -> {
                    Object[] alerte = getTableRow().getItem();
                    if (alerte != null) {
                        voirDetailsAlerte(alerte);
                    }
                });
                btn.setStyle("-fx-background-color: #3498db; -fx-text-fill: white; -fx-font-weight: bold; -fx-cursor: hand;");
            }

            @Override
            protected void updateItem(String item, boolean empty) {
                super.updateItem(item, empty);
                setGraphic(empty ? null : btn);
            }
        });

        actualiserAlertes();
    }

    @FXML
    public void actualiserAlertes() {
        int idPsychologue = SessionManager.getInstance().getCurrentUser().getId();
        List<Object[]> alertes = alerteService.getAlertesNonTraitees(idPsychologue);

        alertesList.clear();
        alertesList.addAll(alertes);
        tableAlertes.setItems(alertesList);

        long nonTraitees = alertes.stream().filter(a -> !(boolean) a[5]).count();
        lblCompteur.setText(nonTraitees + " alerte(s) non traitée(s)");
    }

    @FXML
    public void marquerTraitee() {
        Object[] selected = tableAlertes.getSelectionModel().getSelectedItem();
        if (selected == null) {
            showAlert("Attention", "Sélectionnez une alerte", Alert.AlertType.WARNING);
            return;
        }

        int idAlerte = (int) selected[0];
        alerteService.marquerTraitee(idAlerte);
        actualiserAlertes();

        showAlert("Succès", "✅ Alerte marquée comme traitée", Alert.AlertType.INFORMATION);
    }

    private void voirDetailsAlerte(Object[] alerte) {
        Alert details = new Alert(Alert.AlertType.INFORMATION);
        details.setTitle("Détails de l'alerte");
        details.setHeaderText("Patient: " + alerte[1]);

        String contenu = String.format(
                "📅 Date: %s\n" +
                        "⚠️ Message: %s\n" +
                        "🔍 Mots détectés: %s\n" +
                        "📊 Statut: %s\n\n",
                alerte[4], alerte[2], alerte[3],
                (boolean) alerte[5] ? "Traitée" : "En attente"
        );

        details.setContentText(contenu);
        details.showAndWait();
    }

    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}