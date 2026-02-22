package tn.esprit.nafseyti.controllers;

import tn.esprit.nafseyti.models.fiche_consultation;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.List;
public class fiche_consultationController implements CRUD<fiche_consultation> {



    @Override
    public void insertOne(fiche_consultation ficheConsultation) throws SQLException {
        String req = "INSERT INTO fiche_consultation " +
                "(rendez_vous_id, notes, probleme_principal, diagnostic, recommandations, traitement) " +
                "VALUES (?, ?, ?, ?, ?, ?)";
        Connection cnx = MyBDConnexion.getInstance().getCnx();
        try (PreparedStatement pst = cnx.prepareStatement(req)) {

            pst.setInt(1, ficheConsultation.getRendezVousId());
            pst.setString(2, ficheConsultation.getNotes());
            pst.setString(3, ficheConsultation.getProblemePrincipal());
            pst.setString(4, ficheConsultation.getDiagnostic());
            pst.setString(5, ficheConsultation.getRecommandations());
            pst.setString(6, ficheConsultation.getTraitement());

            pst.executeUpdate();

        }
    }



    @Override
    public void updateOne(fiche_consultation ficheConsultation) throws SQLException {
        String req = "UPDATE fiche_consultation SET " +
                "rendez_vous_id = ?, " +
                "notes = ?, " +
                "probleme_principal = ?, " +
                "diagnostic = ?, " +
                "recommandations = ?, " +
                "traitement = ? " +
                "WHERE id = ?";

        Connection cnx = MyBDConnexion.getInstance().getCnx();
        try (PreparedStatement pst = cnx.prepareStatement(req)) {
            pst.setInt(1, ficheConsultation.getRendezVousId());
            pst.setString(2, ficheConsultation.getNotes());
            pst.setString(3, ficheConsultation.getProblemePrincipal());
            pst.setString(4, ficheConsultation.getDiagnostic());
            pst.setString(5, ficheConsultation.getRecommandations());
            pst.setString(6, ficheConsultation.getTraitement());
            pst.setInt(7, ficheConsultation.getId()); // WHERE id = ?

            pst.executeUpdate();

            System.out.println("Fiche de consultation modifiée avec succès !");
        }
    }

    @Override
    public void deleteOne(fiche_consultation ficheConsultation) throws SQLException {
        String req = "DELETE FROM fiche_consultation WHERE id = ?";

        Connection cnx = MyBDConnexion.getInstance().getCnx();
        try (PreparedStatement pst = cnx.prepareStatement(req)) {
            pst.setInt(1, ficheConsultation.getId());
            pst.executeUpdate();

            System.out.println("Fiche de consultation supprimée avec succès !");
        }
    }

    @Override
    public List<fiche_consultation> selectALL() throws SQLException {
        List<fiche_consultation> list = new java.util.ArrayList<>();

        // Requête avec JOIN pour récupérer la date du rendez-vous
        String req = "SELECT fc.*, rv.dateRendezVous " +
                "FROM fiche_consultation fc " +
                "LEFT JOIN rendez_vous rv ON fc.rendez_vous_id = rv.id";
        Connection cnx = MyBDConnexion.getInstance().getCnx();
        try (java.sql.PreparedStatement pst = cnx.prepareStatement(req);
             java.sql.ResultSet rs = pst.executeQuery()) {

            while (rs.next()) {
                fiche_consultation f = new fiche_consultation(
                        rs.getInt("id"),
                        rs.getInt("rendez_vous_id"),
                        rs.getString("notes"),
                        rs.getString("probleme_principal"),
                        rs.getString("diagnostic"),
                        rs.getString("recommandations"),
                        rs.getString("traitement"),
                        rs.getTimestamp("created_at").toLocalDateTime()
                );

                // Mettre la date du rendez-vous comme string temporaire dans la colonne "Créé le"
                // Ici on utilisera une fonction lambda ou TableColumn cellFactory pour afficher rs.getDate("dateRendezVous") directement
                // Sans toucher au modèle

                list.add(f);
            }
        }

        return list;
    }
}
