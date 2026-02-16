package tn.esprit.gui;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.control.Label;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;

public class DashboardController {

    @FXML
    private BorderPane mainBorderPane;

    @FXML
    private VBox contentArea;


    private Label lblArticles;

    public void initialize() {
        System.out.println("Dashboard loaded ✅");
    }


    @FXML
    private void openForum() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Forum.fxml"));
            Parent forumRoot = loader.load();

            // Remplacer le centre du BorderPane par le contenu du forum
            mainBorderPane.setCenter(forumRoot);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
