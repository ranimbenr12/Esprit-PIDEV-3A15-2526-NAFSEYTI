package tn.esprit.gui;

import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.layout.BorderPane;

import javafx.fxml.FXML;

import javafx.scene.control.Label;

public class ForumController {


    @FXML
    private BorderPane mainBorderPane;




    private Label lblArticles;



    // ================= OUVRIR FORUM DANS LE CONTENT AREA =================

    @FXML
    private void Gestion_Article() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/GestionArticle.fxml"));
            Parent root = loader.load();

            if (mainBorderPane != null) {
                mainBorderPane.setCenter(root);
            } else {
                System.out.println("mainBorderPane non injecté !");
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void Gestion_Forum() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/GestionForum.fxml"));
            Parent root = loader.load();

            if (mainBorderPane != null) {
                mainBorderPane.setCenter(root);
            } else {
                System.out.println("mainBorderPane non injecté !");
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
