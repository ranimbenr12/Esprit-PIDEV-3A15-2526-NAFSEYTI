package tn.esprit.projet.view;

import tn.esprit.projet.models.Planification;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class PlanificationService implements CRUD<Planification> {

    private Connection cnx;

    public PlanificationService() {
        cnx = MyBDConnexion.getInstance().getCnx();
    }

    @Override
    public void insertOne(Planification plan) throws SQLException {
        if(plan.getDescription() == null || plan.getDescription().isEmpty())
            throw new SQLException("La description de la planification ne peut pas être vide !");

        // Vérifie que l'événement existe
        String check = "SELECT id FROM events WHERE id=?";
        PreparedStatement psCheck = cnx.prepareStatement(check);
        psCheck.setInt(1, plan.getIdEvent());
        ResultSet rs = psCheck.executeQuery();
        if(!rs.next()) throw new SQLException("Événement ID " + plan.getIdEvent() + " n'existe pas !");

        // Insert planification
        String req = "INSERT INTO planification(id_event, description, duree) VALUES (?,?,?)";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, plan.getIdEvent());
        ps.setString(2, plan.getDescription());
        ps.setString(3, plan.getDuree());
        ps.executeUpdate();
    }

    @Override
    public void updateOne(Planification plan) throws SQLException {
        String req = "UPDATE planification SET id_event=?, description=?, duree=? WHERE id_planification=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, plan.getIdEvent());
        ps.setString(2, plan.getDescription());
        ps.setString(3, plan.getDuree());
        ps.setInt(4, plan.getIdPlanification());
        ps.executeUpdate();
    }

    @Override
    public void deletOne(Planification plan) throws SQLException {
        String req = "DELETE FROM planification WHERE id_planification=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, plan.getIdPlanification());
        ps.executeUpdate();
    }

    public List<Planification> getByEventId(int eventId) throws SQLException {
        List<Planification> plans = new ArrayList<>();
        String req = "SELECT * FROM planification WHERE id_event=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, eventId);
        ResultSet rs = ps.executeQuery();
        while (rs.next()) {
            Planification pl = new Planification();
            pl.setIdPlanification(rs.getInt("id_planification"));
            pl.setIdEvent(rs.getInt("id_event"));
            pl.setDescription(rs.getString("description"));
            pl.setDuree(rs.getString("duree"));
            plans.add(pl);
        }
        return plans;
    }

    @Override
    public List<Planification> selectAll() throws SQLException {
        List<Planification> plans = new ArrayList<>();
        String req = "SELECT * FROM planification";
        Statement st = cnx.createStatement();
        ResultSet rs = st.executeQuery(req);
        while (rs.next()) {
            Planification pl = new Planification();
            pl.setIdPlanification(rs.getInt("id_planification"));
            pl.setIdEvent(rs.getInt("id_event"));
            pl.setDescription(rs.getString("description"));
            pl.setDuree(rs.getString("duree"));
            plans.add(pl);
        }
        return plans;
    }
}
