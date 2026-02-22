package tn.esprit.gui;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.TableCell;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.HBox;
import javafx.stage.Stage;
import javafx.util.Callback;
import tn.esprit.models.Forum;
import tn.esprit.services.ForumService;

import java.sql.SQLException;
import java.util.Date;
import java.util.List;

public class GestionForumController {

    @FXML
    private TableView<Forum> forumTable;

    @FXML
    private TableColumn<Forum, String> colNomForum;
    @FXML
    private TableColumn<Forum, String> colDescription;
    @FXML
    private TableColumn<Forum, String> colStatut;
    @FXML
    private TableColumn<Forum, Date> colDateCreation;
    @FXML
    private TableColumn<Forum, Void> colAction; // pour les boutons

    private ForumService forumService;

    @FXML
    public void initialize() throws SQLException {
        forumService = new ForumService();

        colNomForum.setCellValueFactory(new PropertyValueFactory<>("nomForum"));
        colDescription.setCellValueFactory(new PropertyValueFactory<>("description"));
        colStatut.setCellValueFactory(new PropertyValueFactory<>("statut"));


        addButtonToTable(); // ajout boutons Modifier / Supprimer
        loadForums(); // charger la liste
    }

    private void loadForums() throws SQLException {
        List<Forum> forums = forumService.afficher();
        ObservableList<Forum> data = FXCollections.observableArrayList(forums);
        forumTable.setItems(data);
    }

    private void addButtonToTable() {
        colAction.setCellFactory(new Callback<>() {
            @Override
            public TableCell<Forum, Void> call(final TableColumn<Forum, Void> param) {
                return new TableCell<>() {
                    private final Button btnModifier = new Button("Modifier");
                    private final Button btnSupprimer = new Button("Supprimer");
                    private final HBox pane = new HBox(10, btnModifier, btnSupprimer);

                    {
                        // Styles simples
                        btnModifier.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white;");
                        btnSupprimer.setStyle("-fx-background-color: #f44336; -fx-text-fill: white;");

                        // Événement Modifier
                        btnModifier.setOnAction(event -> {
                            Forum forum = getTableView().getItems().get(getIndex());
                            try {
                                FXMLLoader loader = new FXMLLoader(getClass().getResource("/ModifierForum.fxml"));
                                Parent root = loader.load();

                                ModifierForumController controller = loader.getController();
                                controller.setForum(forum); // passer le forum à modifier

                                Stage stage = new Stage();
                                stage.setTitle("Modifier Forum");
                                stage.setScene(new Scene(root));
                                stage.show();

                                // Optionnel : recharger la table après fermeture
                                stage.setOnHiding(e -> {
                                    try {
                                        loadForums();
                                    } catch (SQLException ex) {
                                        ex.printStackTrace();
                                    }
                                });

                            } catch (Exception e) {
                                e.printStackTrace();
                            }
                        });

                        // Événement Supprimer
                        btnSupprimer.setOnAction(event -> {
                            Forum forum = getTableView().getItems().get(getIndex());
                            try {
                                forumService.supprimer(forum); // supprimer dans la base
                                loadForums(); // recharger table
                            } catch (SQLException e) {
                                e.printStackTrace();
                            }
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
            }
        });
    }

    @FXML
    private void ajouterForum() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/AjouterForum.fxml"));
            Parent root = loader.load();

            Stage stage = new Stage();
            stage.setTitle("Ajouter Forum");
            stage.setScene(new Scene(root));
            stage.show();

            // Recharger table après ajout
            stage.setOnHiding(e -> {
                try {
                    loadForums();
                } catch (SQLException ex) {
                    ex.printStackTrace();
                }
            });

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
