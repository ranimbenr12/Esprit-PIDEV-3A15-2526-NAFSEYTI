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
import tn.esprit.models.Article;
import tn.esprit.services.ArticleService;

import java.sql.SQLException;
import java.util.List;

public class GestionArticleController {

    @FXML
    private TableView<Article> articleTable;

    @FXML
    private TableColumn<Article, String> colTitre;
    @FXML
    private TableColumn<Article, String> colContenu;
    @FXML
    private TableColumn<Article, String> colStatut;
    @FXML
    private TableColumn<Article, String> colDateCreation;
    @FXML
    private TableColumn<Article, String> colLike;
    @FXML
    private TableColumn<Article, Void> colAction; // Pour boutons Modifier/Supprimer

    @FXML
    private Button btnAjouterArticle; // Bouton "+ Ajouter Article"

    private ArticleService articleService;

    @FXML
    public void initialize() throws SQLException {
        articleService = new ArticleService();

        // Configurer les colonnes
        colTitre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        colContenu.setCellValueFactory(new PropertyValueFactory<>("contenu"));
        colDateCreation.setCellValueFactory(new PropertyValueFactory<>("dateCreation"));
        colStatut.setCellValueFactory(new PropertyValueFactory<>("statut"));
        colLike.setCellValueFactory(new PropertyValueFactory<>("Like_Count"));

        // Ajouter boutons Modifier/Supprimer dans la table
        addButtonToTable();

        // Charger les articles dans la table
        loadArticles();

        // Action pour le bouton "+ Ajouter Article"
        btnAjouterArticle.setOnAction(event -> ouvrirFenetreAjouterArticle());
    }

    private void loadArticles() throws SQLException {
        List<Article> articles = articleService.afficher();
        ObservableList<Article> data = FXCollections.observableArrayList(articles);
        articleTable.setItems(data);
    }

    private void addButtonToTable() {
        colAction.setCellFactory(new Callback<>() {
            @Override
            public TableCell<Article, Void> call(final TableColumn<Article, Void> param) {
                return new TableCell<>() {
                    private final Button btnModifier = new Button("Modifier");
                    private final Button btnSupprimer = new Button("Supprimer");
                    private final HBox pane = new HBox(10, btnModifier, btnSupprimer);

                    {
                        btnModifier.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white;");
                        btnSupprimer.setStyle("-fx-background-color: #f44336; -fx-text-fill: white;");

                        btnModifier.setOnAction(event -> {
                            Article article = getTableView().getItems().get(getIndex());
                            System.out.println("Modifier article id = " + article.getIdPost());
                            // Appeler ici la méthode pour modifier l'article
                        });

                        btnSupprimer.setOnAction(event -> {
                            Article article = getTableView().getItems().get(getIndex());
                            System.out.println("Supprimer article id = " + article.getIdPost());
                            try {
                                articleService.supprimer(article);
                                loadArticles();
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

    // Ouvrir la fenêtre Ajouter Article
    private void ouvrirFenetreAjouterArticle() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/AjouterArticle.fxml"));
            Parent root = loader.load();

            Stage stage = new Stage();
            stage.setTitle("Ajouter Article");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }




    @FXML
    private void ajouterArticle() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/AjouterArticle.fxml"));
            Parent root = loader.load();

            Stage stage = new Stage();
            stage.setTitle("Ajouter Article");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
