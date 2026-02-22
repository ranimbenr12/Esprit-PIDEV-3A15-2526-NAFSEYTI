package tn.esprit.nafseyti.test;

import tn.esprit.nafseyti.service.fiche_consultationController;
import tn.esprit.nafseyti.service.rendez_vousController;
import tn.esprit.nafseyti.models.fiche_consultation;
import tn.esprit.nafseyti.models.rendez_vous;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalTime;

public class teste {
    public static void main(String[] args) {
        MyBDConnexion c1 = MyBDConnexion.getInstance();

        rendez_vous rdv = new rendez_vous();
        rdv.setUserId(1);  // id existant dans ta table users
        rdv.setMedecinId(2); // id existant dans ta table users
        rdv.setDateRendezVous(LocalDate.of(2026, 2, 7));
        rdv.setHeureDebut(LocalTime.of(14, 30));
        rdv.setHeureFin(LocalTime.of(15, 30));
        rdv.setTypeSeance("consultation");
        rdv.setStatut("en_attente");

        // Créer le controller
        rendez_vousController controller = new rendez_vousController();

        try {
            // Appeler la méthode insertOne
            controller.insertOne(rdv);
            System.out.println("Insertion réussie de rendez_vous!");
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'insertion de rendez_vous : " + e.getMessage());

        }

        fiche_consultation fiche = new fiche_consultation();

        fiche.setRendezVousId(1);
        fiche.setNotes("Patient stressé");
        fiche.setProblemePrincipal("Anxiété sociale");
        fiche.setDiagnostic("Stress léger");
        fiche.setRecommandations("Respiration + sport");
        fiche.setTraitement("Séances hebdomadaires");
        fiche.setDuree(60);

        fiche_consultationController ficheController = new fiche_consultationController();

        try {
            ficheController.insertOne(fiche);
            System.out.println("Fiche ajoutée !");
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'insertion de fiche de consultation: " + e.getMessage());
        }
    }
}
