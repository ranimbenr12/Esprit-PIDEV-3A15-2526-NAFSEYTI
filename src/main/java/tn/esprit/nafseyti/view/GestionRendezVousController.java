package tn.esprit.nafseyti.view;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.ComboBoxTableCell;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.cell.TextFieldTableCell;
import javafx.scene.layout.HBox;
import javafx.stage.Stage;
import tn.esprit.nafseyti.controllers.rendez_vousController;
import tn.esprit.nafseyti.models.rendez_vous;

import java.io.IOException;
import java.sql.SQLException;
import java.text.CollationElementIterator;
import java.util.List;

import javafx.util.Callback;
import javafx.scene.paint.Color;


public class GestionRendezVousController {
    @FXML
    private TableView<rendez_vous> tableRendezVous;



    @FXML
    private TableColumn<rendez_vous, Integer> colMedecin;

    @FXML
    private TableColumn<rendez_vous, String> colDate;

    @FXML
    private TableColumn<rendez_vous, String> colHeureDebut;

    @FXML
    private TableColumn<rendez_vous, String> colHeureFin;

    @FXML
    private TableColumn<rendez_vous, String> colType;

    @FXML
    private TableColumn<rendez_vous, String> colStatut;

    private ObservableList<rendez_vous> rendezVousList = FXCollections.observableArrayList();

    private rendez_vousController rvController = new rendez_vousController();
    @FXML
    private TableColumn<rendez_vous, Void> colActions;
    @FXML
    private Label lblTotal;

    @FXML
    private Label lblEnAttente;

    @FXML
    private Label lblConfirmes;

    @FXML
    private Label lblAnnules;

    @FXML
    private Label lblTermines;



    @FXML
    public void initialize() {
        // Lier les colonnes aux attributs de l'entité

        colMedecin.setCellFactory(column -> new TableCell<rendez_vous, Integer>() {
            @Override
            protected void updateItem(Integer medecinId, boolean empty) {
                super.updateItem(medecinId, empty);
                if (empty || medecinId == null) {
                    setText(null);
                } else {
                    try {
                        // Récupère firstname + lastname depuis la BDD
                        String nomComplet = rvController.getMedecinNomPrenom(medecinId);
                        setText(nomComplet);
                    } catch (SQLException e) {
                        e.printStackTrace();
                        setText("Erreur");
                    }
                }
            }
        });

        colDate.setCellValueFactory(new PropertyValueFactory<>("dateRendezVous"));
        colHeureDebut.setCellValueFactory(new PropertyValueFactory<>("heureDebut"));
        colHeureFin.setCellValueFactory(new PropertyValueFactory<>("heureFin"));
        colType.setCellValueFactory(new PropertyValueFactory<>("typeSeance"));
        colStatut.setCellValueFactory(new PropertyValueFactory<>("statut"));

        // Ajouter les boutons Modifier et Supprimer
        // Ajouter les boutons Modifier et Supprimer avec icônes
        // Ajouter les boutons Modifier et Supprimer avec icônes colorées
        Callback<TableColumn<rendez_vous, Void>, TableCell<rendez_vous, Void>> cellFactory = param -> new TableCell<>() {

            private final Button btnEdit = new Button("Modifier");
            private final Button btnDelete = new Button("Supprimer");
            private final HBox pane = new HBox(10, btnEdit, btnDelete);

            {
                // Styles colorés simples
                btnEdit.setStyle("-fx-background-color: #007bff; -fx-text-fill: white; -fx-font-size: 14px; -fx-background-radius: 5;");
                btnDelete.setStyle("-fx-background-color: #dc3545; -fx-text-fill: white; -fx-font-size: 14px; -fx-background-radius: 5;");

                btnEdit.setPrefWidth(80);
                btnDelete.setPrefWidth(100);

                pane.setStyle("-fx-alignment: CENTER;");

                // Action Modifier
                btnEdit.setOnAction(event -> {

                    rendez_vous rv = getTableView().getItems().get(getIndex());

                    try {
                        FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/ModifierRendezVous.fxml"));
                        Parent root = loader.load();

                        ModifierRendezVousController controller = loader.getController();
                        controller.setRendezVous(rv);
                        controller.setParentController(GestionRendezVousController.this);

                        Stage stage = new Stage();
                        stage.setTitle("Modifier Rendez-vous");
                        stage.setScene(new Scene(root));
                        stage.initOwner(getTableView().getScene().getWindow());
                        stage.show();

                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                });


                // Action Supprimer
                btnDelete.setOnAction(event -> {
                    rendez_vous rv = getTableView().getItems().get(getIndex());

                    // 🔹 Créer une alert de confirmation
                    Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
                    alert.setTitle("Confirmation de suppression");
                    alert.setHeaderText("Vous êtes sur le point de supprimer ce rendez-vous !");
                    alert.setContentText("Voulez-vous continuer ?");

                    // Afficher l'alerte et attendre la réponse
                    alert.showAndWait().ifPresent(response -> {
                        if (response == ButtonType.OK) {
                            try {
                                rvController.deleteOne(rv); // supprimer de la BDD
                                getTableView().getItems().remove(rv); // supprimer de la table
                                System.out.println("Rendez-vous supprimé !");
                            } catch (SQLException e) {
                                e.printStackTrace();
                                // Optionnel : afficher une alert d'erreur
                                Alert errorAlert = new Alert(Alert.AlertType.ERROR);
                                errorAlert.setTitle("Erreur");
                                errorAlert.setHeaderText("Impossible de supprimer le rendez-vous");
                                errorAlert.setContentText(e.getMessage());
                                errorAlert.showAndWait();
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
                    setGraphic(pane);
                }
            }
        };

        colActions.setCellFactory(cellFactory); // appliquer la factory UNE SEULE FOIS




        colStatut.setCellFactory(column -> new TableCell<rendez_vous, String>() {
            @Override
            protected void updateItem(String item, boolean empty) {
                super.updateItem(item, empty);

                if (empty || item == null) {
                    setText(null);
                    setStyle("");
                } else {
                    setText(item); // afficher le texte
                    setStyle("-fx-alignment: CENTER; -fx-font-weight: bold;"); // centrer le texte

                    // couleur selon le statut
                    switch (item) {
                        case "En attente" -> setStyle("-fx-text-fill: #ffc107; -fx-alignment: CENTER; -fx-font-weight: bold;"); // jaune
                        case "confirmé" -> setStyle("-fx-text-fill: #28a745; -fx-alignment: CENTER; -fx-font-weight: bold;"); // vert
                        case "Annulé" -> setStyle("-fx-text-fill: #dc3545; -fx-alignment: CENTER; -fx-font-weight: bold;"); // rouge
                        case "Pas encore pris" -> setStyle("-fx-text-fill: #17a2b8; -fx-alignment: CENTER; -fx-font-weight: bold;"); // bleu
                        default -> setStyle("-fx-text-fill: black; -fx-alignment: CENTER;");
                    }
                }
            }
        });




        loadRendezVous();


    }

    void loadRendezVous() {
        try {
            // Récupérer tous les rendez-vous depuis la BDD
            List<rendez_vous> list = rvController.selectALL();
            rendezVousList.setAll(list);
            tableRendezVous.setItems(rendezVousList);

            // Supprimer les colonnes fantômes si elles existent
            tableRendezVous.getColumns().removeIf(col -> col.getText() == null || col.getText().isEmpty());

            // ====== Statistiques ======
            int total = list.size();
            long enAttente = list.stream().filter(rv -> "En attente".equals(rv.getStatut())).count();
            long confirmes = list.stream().filter(rv -> "confirmé".equals(rv.getStatut())).count();
            long annules = list.stream().filter(rv -> "Annulé".equals(rv.getStatut())).count();
            long termines = list.stream().filter(rv -> "Pas encore pris".equals(rv.getStatut())).count();

            // Mettre à jour les labels
            lblTotal.setText(String.valueOf(total));
            lblEnAttente.setText(String.valueOf(enAttente));
            lblConfirmes.setText(String.valueOf(confirmes));
            lblAnnules.setText(String.valueOf(annules));
            lblTermines.setText(String.valueOf(termines));

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleBack(ActionEvent event) {
        try {
            // Charge le FXML du tableau de bord ou de la page rendez_vous
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/rendez_vous.fxml"));
            Parent root = loader.load();

            // Récupère la fenêtre actuelle
            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            // Change la scène
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void ouvrirPopupNouveauRendezVous(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/NouveauRendezVous.fxml"));
            Parent root = loader.load();

            NouveauRendezVousController popupController = loader.getController();
            popupController.setParentController(this);

            Stage stage = new Stage();
            stage.setTitle("Nouveau Rendez-vous");
            stage.setScene(new Scene(root));
            stage.initOwner(((Node) event.getSource()).getScene().getWindow());
            stage.setResizable(false);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}
