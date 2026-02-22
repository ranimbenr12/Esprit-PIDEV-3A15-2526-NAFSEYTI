package tn.esprit.nafseyti.view;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.HBox;
import javafx.stage.Stage;

import javafx.event.ActionEvent;
import tn.esprit.nafseyti.controllers.fiche_consultationController;
import tn.esprit.nafseyti.models.fiche_consultation;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.io.IOException;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.List;

public class GestionFicheConsultationController {
    @FXML
    private TableView<fiche_consultation> tableFiche;

    @FXML
    private TableColumn<fiche_consultation, String> colProbleme;

    @FXML
    private TableColumn<fiche_consultation, String> colDiagnostic;

    @FXML
    private TableColumn<fiche_consultation, String> colTraitement;

    @FXML
    private TableColumn<fiche_consultation, String> colRecommandations;

    @FXML
    private TableColumn<fiche_consultation, String> colNotes;

    @FXML
    private TableColumn<fiche_consultation, String> colDateRdv;

    @FXML
    private TableColumn<fiche_consultation, String> colCreatedAt;

    @FXML
    private TableColumn<fiche_consultation, Void> colActions; // colonne pour boutons

    @FXML
    private void initialize() {
        // Colonnes classiques
        colProbleme.setCellValueFactory(new PropertyValueFactory<>("problemePrincipal"));
        colDiagnostic.setCellValueFactory(new PropertyValueFactory<>("diagnostic"));
        colTraitement.setCellValueFactory(new PropertyValueFactory<>("traitement"));
        colRecommandations.setCellValueFactory(new PropertyValueFactory<>("recommandations"));
        colNotes.setCellValueFactory(new PropertyValueFactory<>("notes"));
        colCreatedAt.setCellValueFactory(new PropertyValueFactory<>("createdAt"));
        // Colonne date du RDV : récupération directe depuis la base
        colDateRdv.setCellValueFactory(cellData -> {
            fiche_consultation fc = cellData.getValue();
            String dateRdv = "";
            String req = "SELECT dateRendezVous FROM rendez_vous WHERE id = ?";

            try (PreparedStatement pst = MyBDConnexion.getInstance().getCnx().prepareStatement(req)) {
                pst.setInt(1, fc.getRendezVousId());
                try (java.sql.ResultSet rs = pst.executeQuery()) {
                    if (rs.next() && rs.getDate("dateRendezVous") != null) {
                        dateRdv = rs.getDate("dateRendezVous").toString();
                    }
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }

            return new javafx.beans.property.SimpleStringProperty(dateRdv);
        });

        // Coloration du texte ligne par ligne
        colDateRdv.setCellFactory(column -> new TableCell<fiche_consultation, String>() {
            @Override
            protected void updateItem(String item, boolean empty) {
                super.updateItem(item, empty);
                if (empty || item == null) {
                    setText(null);
                    setStyle("");
                } else {
                    setText(item);
                    if (getIndex() % 2 == 0) {
                        setStyle("-fx-text-fill: #933a8d;");  // couleur pour ligne paire
                    } else {
                        setStyle("-fx-text-fill: blue;"); // couleur pour ligne impaire
                    }
                }
            }
        });


// Colonne actions avec boutons texte
        colActions.setCellFactory(param -> new TableCell<>() {
            private final Button btnEdit = new Button("Modifier");
            private final Button btnDelete = new Button("Supprimer");
            private final HBox hbox = new HBox(5, btnEdit, btnDelete);

            {
                btnEdit.setStyle("-fx-background-color: #e52e97; -fx-text-fill: white;");
                btnDelete.setStyle("-fx-background-color: #8adafc; -fx-text-fill: white;");

                btnEdit.setOnAction(event -> {
                    fiche_consultation fc = getTableView().getItems().get(getIndex());

                    try {
                        FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/ModifierFiche.fxml"));
                        Parent root = loader.load();

                        // Récupérer le controller et passer la fiche à modifier
                        ModifierFicheController controller = loader.getController();
                        controller.setFicheConsultation(fc);

                        Stage stage = new Stage();
                        stage.setTitle("Modifier Fiche de Consultation");
                        stage.setScene(new Scene(root));
                        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);
                        stage.showAndWait();

                        // Recharger le tableau après modification
                        loadFichesFromDatabase();

                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                });

                btnDelete.setOnAction(event -> {
                    fiche_consultation fc = getTableView().getItems().get(getIndex());

                    // Créer une alerte de confirmation
                    Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
                    confirmAlert.setTitle("Confirmation de suppression");
                    confirmAlert.setHeaderText("Êtes-vous sûr de vouloir supprimer cette fiche ?");
                    confirmAlert.setContentText(
                            "Fiche ID: " + fc.getId() + "\n" +
                                    "Problème: " + fc.getProblemePrincipal() + "\n\n" +
                                    "Cette action est irréversible !"
                    );

                    // Personnaliser les boutons
                    ButtonType btnOui = new ButtonType("Oui, supprimer");
                    ButtonType btnNon = new ButtonType("Annuler", ButtonBar.ButtonData.CANCEL_CLOSE);
                    confirmAlert.getButtonTypes().setAll(btnOui, btnNon);

                    // Afficher l'alerte et attendre la réponse
                    confirmAlert.showAndWait().ifPresent(response -> {
                        if (response == btnOui) {
                            try {
                                // Supprimer la fiche
                                fiche_consultationController fcController = new fiche_consultationController();
                                fcController.deleteOne(fc);

                                // Afficher un message de succès
                                Alert successAlert = new Alert(Alert.AlertType.INFORMATION);
                                successAlert.setTitle("Succès");
                                successAlert.setHeaderText(null);
                                successAlert.setContentText("La fiche de consultation a été supprimée avec succès !");
                                successAlert.showAndWait();

                                // Recharger le tableau
                                loadFichesFromDatabase();

                            } catch (SQLException e) {
                                // Afficher un message d'erreur
                                Alert errorAlert = new Alert(Alert.AlertType.ERROR);
                                errorAlert.setTitle("Erreur");
                                errorAlert.setHeaderText("Erreur lors de la suppression");
                                errorAlert.setContentText("Une erreur est survenue : " + e.getMessage());
                                errorAlert.showAndWait();
                                e.printStackTrace();
                            }
                        }
                    });
                });
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                if (empty) {
                    setGraphic(null);
                } else {
                    setGraphic(hbox);
                }
            }
        });



        loadFichesFromDatabase();
    }


    private void loadFichesFromDatabase() {
        fiche_consultationController fcController = new fiche_consultationController();
        ObservableList<fiche_consultation> list = FXCollections.observableArrayList();
        try {
            // Récupération des fiches avec JOIN pour récupérer la date du rendez-vous
            List<fiche_consultation> fiches = fcController.selectALL();
            list.addAll(fiches);
            tableFiche.setItems(list);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleRetour(ActionEvent event) {
        try {
            Parent root = FXMLLoader.load(
                    getClass().getResource("/fxml/rendez_vous.fxml")
            );

            Scene scene = new Scene(root);

            Stage stage = (Stage) ((Node) event.getSource())
                    .getScene()
                    .getWindow();

            stage.setScene(scene);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleNouvelleFiche(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/NouvelleFiche.fxml"));
            Parent root = loader.load();

            Stage stage = new Stage();
            stage.setTitle("Nouvelle Fiche de Consultation");
            stage.setScene(new Scene(root));
            stage.initModality(javafx.stage.Modality.APPLICATION_MODAL); // bloque la fenêtre principale
            stage.showAndWait(); // attend la fermeture

            // Recharger le tableau après insertion
            loadFichesFromDatabase();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }


}
