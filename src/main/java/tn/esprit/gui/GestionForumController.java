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
    private TableColumn<Forum, Void> colAction; // utiliser Void pour les boutons

    private ForumService forumService;

    @FXML
    public void initialize() throws SQLException {
        forumService = new ForumService();

        colNomForum.setCellValueFactory(new PropertyValueFactory<>("nomForum"));
        colDescription.setCellValueFactory(new PropertyValueFactory<>("description"));
        colStatut.setCellValueFactory(new PropertyValueFactory<>("statut"));
        colDateCreation.setCellValueFactory(new PropertyValueFactory<>("date_creation"));

        addButtonToTable(); // Ajout des boutons Modifier / Supprimer

        loadForums();
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
                        btnModifier.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white;");
                        btnSupprimer.setStyle("-fx-background-color: #f44336; -fx-text-fill: white;");

                        btnModifier.setOnAction(event -> {
                            Forum forum = getTableView().getItems().get(getIndex());
                            System.out.println("Modifier forum id = " + forum.getIdForum());
                            // Appeler ici la méthode pour modifier le forum
                        });

                        btnSupprimer.setOnAction(event -> {
                            Forum forum = getTableView().getItems().get(getIndex());
                            System.out.println("Supprimer forum id = " + forum.getIdForum());
                            try {
                                forumService.supprimer(forum); // utiliser la méthode supprimer de ton service
                                loadForums();
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
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}

