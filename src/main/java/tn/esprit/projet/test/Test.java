package tn.esprit.projet.test;

import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalDateTime;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.view.EventService;
import tn.esprit.projet.view.PlanificationService;

public class Test extends Application {

    public static void main(String[] args) {
        launch(args);   // ONLY THIS HERE
    }

    @Override
    public void start(Stage stage) throws Exception {

        // ✅ JDBC TEST HERE (runs after JavaFX starts)

        Event e1 = new Event(
        );

        EventService service = new EventService();
        try {
            service.insertOne(e1);
        } catch (SQLException e){
            System.err.println(e.getMessage());
        }

        Planification p1 = new Planification(
        );

        PlanificationService pService = new PlanificationService();
        try {
            pService.insertOne(p1);
        } catch (SQLException e){
            System.err.println(e.getMessage());
        }

        //  Load FXML AFTER that
<<<<<<< HEAD
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/EventClient.fxml"));
=======
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/Psychologue.fxml"));
>>>>>>> fd80a9a (final update)
        Scene scene = new Scene(loader.load());
        stage.setTitle("Fintech App");
        stage.setScene(scene);
        stage.show();
    }
}
