package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.scene.shape.Rectangle;
import javafx.event.ActionEvent; // ✅ Correct pour JavaFX
import tn.esprit.models.Forum;
import tn.esprit.services.ForumService;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;

public class MonContenuController implements Initializable {

    @FXML
    private VBox doctorContainer;

    @FXML
    private TextField searchField;

    private ForumService forumService;

    // ✅ La méthode doit utiliser javafx.event.ActionEvent
    @FXML
    private void MonContenu(ActionEvent event) {
        System.out.println("Bouton MonContenu cliqué !");
        // Ici tu peux mettre le code pour changer de vue ou afficher autre chose
    }

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        forumService = new ForumService();

        try {
            List<Forum> forums = forumService.afficher(); // récupérer tous les forums
            displayForums(forums);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private void displayForums(List<Forum> forums) {
        doctorContainer.getChildren().clear();

        for (Forum forum : forums) {
            // HBox pour la carte
            HBox card = new HBox();
            card.setSpacing(10);
            card.setPadding(new Insets(10));
            card.setStyle("-fx-background-radius: 15; -fx-background-color: #f5f5f5; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 5,0,0,2);");
            card.setOnMouseClicked(e -> ouvrirArticles(forum));
            // Image (exemple statique)
            StackPane imagePane = new StackPane();
            imagePane.setPrefSize(180, 150);

            ImageView img = new ImageView(new Image(getClass().getResourceAsStream("/images/télécharger (12).jpg")));
            img.setFitWidth(180);
            img.setFitHeight(150);
            img.setPreserveRatio(true);

            Rectangle overlay = new Rectangle(180, 150);
            overlay.setArcHeight(15);
            overlay.setArcWidth(15);
            overlay.setStyle("-fx-fill: rgba(0,0,0,0.2);");

            Label tag = new Label(forum.getStatut());
            tag.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
            StackPane.setMargin(tag, new Insets(0, 0, 5, 0));
            StackPane.setAlignment(tag, javafx.geometry.Pos.BOTTOM_CENTER);

            imagePane.getChildren().addAll(img, overlay, tag);

            // Texte
            VBox textBox = new VBox();
            textBox.setSpacing(5);
            Label title = new Label(forum.getNomForum());
            title.setStyle("-fx-font-weight: bold; -fx-font-size: 14px; -fx-text-fill: #285921;");

            Label description = new Label(forum.getDescription());
            description.setStyle("-fx-font-size: 12px; -fx-text-fill: #69685c;");

            textBox.getChildren().addAll(title, description);

            card.getChildren().addAll(imagePane, textBox);

            doctorContainer.getChildren().add(card);
        }
    }
    private void ouvrirArticles(Forum forum) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/ArticleList.fxml"));
            Parent root = loader.load();

            ArticleListController controller = loader.getController();
            controller.setForum(forum);

            doctorContainer.getScene().setRoot(root);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
