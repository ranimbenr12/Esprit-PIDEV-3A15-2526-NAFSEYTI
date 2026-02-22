package tn.esprit.nafseyti.service;

import tn.esprit.nafseyti.models.rendez_vous;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class rendez_vousController implements CRUD<rendez_vous> {
    private Connection cnx;
    public rendez_vousController() {
        cnx = MyBDConnexion.getInstance().getCnx();
    }

    @Override
    public void insertOne(rendez_vous rendezVous) throws SQLException {

        String req = "INSERT INTO rendez_vous (medecinId, dateRendezVous, heureDebut, heureFin, type_seance, statut) " +
                "VALUES (?, ?, ?, ?, ?, ?)";

        try (PreparedStatement pst = cnx.prepareStatement(req)) {

            pst.setInt(1, rendezVous.getMedecinId());
            pst.setDate(2, java.sql.Date.valueOf(rendezVous.getDateRendezVous()));

            if (rendezVous.getHeureDebut() != null)
                pst.setTime(3, java.sql.Time.valueOf(rendezVous.getHeureDebut()));
            else
                pst.setNull(3, java.sql.Types.TIME);

            if (rendezVous.getHeureFin() != null)
                pst.setTime(4, java.sql.Time.valueOf(rendezVous.getHeureFin()));
            else
                pst.setNull(4, java.sql.Types.TIME);

            pst.setString(5, rendezVous.getTypeSeance());
            pst.setString(6, rendezVous.getStatut());

            pst.executeUpdate();
        }
    }


    @Override
    public void updateOne(rendez_vous rv) throws SQLException {

        String req = "UPDATE rendez_vous SET " +
                "medecinId=?, dateRendezVous=?, " +
                "heureDebut=?, heureFin=?, type_seance=?, statut=? " +
                "WHERE id=?";

        PreparedStatement pst = cnx.prepareStatement(req);

        pst.setInt(1, rv.getMedecinId());
        pst.setDate(2, java.sql.Date.valueOf(rv.getDateRendezVous()));
        pst.setTime(3, java.sql.Time.valueOf(rv.getHeureDebut()));
        pst.setTime(4, java.sql.Time.valueOf(rv.getHeureFin()));
        pst.setString(5, rv.getTypeSeance());
        pst.setString(6, rv.getStatut());
        pst.setInt(7, rv.getId());

        pst.executeUpdate();
    }


    @Override
    public void deleteOne(rendez_vous rendezVous) throws SQLException {
        String req = "DELETE FROM rendez_vous WHERE id = ?";
        try (PreparedStatement pst = cnx.prepareStatement(req)) {
            pst.setInt(1, rendezVous.getId());
            int rows = pst.executeUpdate();
            System.out.println("Rows deleted = " + rows);
        }

    }

    @Override
    public List<rendez_vous> selectALL() throws SQLException {


        List<rendez_vous> list = new ArrayList<>();
        String req = "SELECT * FROM rendez_vous";

        try (PreparedStatement pst = cnx.prepareStatement(req)) {
            var rs = pst.executeQuery();
            while (rs.next()) {
                rendez_vous rv = new rendez_vous();
                rv.setMedecinId(rs.getInt("medecinId"));
                rv.setDateRendezVous(rs.getDate("dateRendezVous").toLocalDate());
                rv.setHeureDebut(rs.getTime("heureDebut").toLocalTime());
                rv.setHeureFin(rs.getTime("heureFin").toLocalTime());
                rv.setTypeSeance(rs.getString("type_seance"));
                rv.setStatut(rs.getString("statut"));
                rv.setId(rs.getInt("id")); // IMPORTANT pour update

                list.add(rv);
            }
        }
        return list;
    }
    public String getMedecinNomPrenom(int medecinId) throws SQLException {
        String query = "SELECT firstname, lastname FROM users WHERE id = ?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, medecinId);
            var rs = pst.executeQuery();
            if (rs.next()) {
                return rs.getString("firstname") + " " + rs.getString("lastname");
            } else {
                return "Médecin inconnu";
            }
        }
    }
    public List<Integer> getMedecinsDisponibles() throws SQLException {
        List<Integer> medecins = new ArrayList<>();
        String query = "SELECT id FROM users WHERE role IN ('coach_vie', 'psychologue')";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            var rs = pst.executeQuery();
            while (rs.next()) {
                medecins.add(rs.getInt("id"));
            }
        }
        return medecins;
    }


}
