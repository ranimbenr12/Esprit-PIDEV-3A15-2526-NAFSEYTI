package tn.esprit.projet.test;
import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalDateTime;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.utils.MyBDConnexion;
import tn.esprit.projet.view.EventService;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.view.PlanificationService;

public class Test {
    public static void main(String[] args){

        Event e1 = new Event(
                4,
                "playing with fire",
                LocalDate.of(2026,3,16),
                "korea",
                "http",
                LocalDateTime.of(2026,3,15,19,38,0),
                true,
                3
        );

        EventService service = new EventService();
        try {
        service.insertOne(e1);
    } catch (SQLException e){
            System.err.println(e.getMessage());
    }


        Planification p1 = new Planification(
                1,
                2,
                "hola",
                "2 hours"
        );

        PlanificationService Pservice = new PlanificationService();
        try {
            Pservice.insertOne(p1);
        } catch (SQLException e){
            System.err.println(e.getMessage());
        }


    }

}
