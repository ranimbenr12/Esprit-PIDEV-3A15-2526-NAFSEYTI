package tn.esprit.projet.test;

import tn.esprit.projet.models.suivi;
import tn.esprit.projet.services.suiviService;
import tn.esprit.projet.utils.MyBDConnexion;

public class test {

    public static void main(String[] args) {
        MyBDConnexion cn1 = MyBDConnexion.getInstance();

        // Créer un nouveau suivi
        suivi s1 = new suivi();
        s1.setidutilisateur(1);
        s1.setidpsychologue(2);
        s1.settitre("Suivi de stress");
        s1.setdescription("Accompagnement pour gérer le stress des examens");
        s1.settype_suivi("actif");

        // Ajouter le suivi à la base de données
        suiviService service = new suiviService();
        service.insertOne(s1);

        System.out.println("Test terminé !");
    }
}
