package tn.esprit.projet.services;

import tn.esprit.projet.models.Points;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class PointsService {
    private Connection cnx = MyBDConnexion.getInstance().getCnx();

    // Ajouter des points pour un objectif validé
    public void ajouterPoints(int idUtilisateur, int idObjectif, int nombrePoints) {
        String req = "INSERT INTO points (id_utilisateur, id_objectif, nombre_points) VALUES (?, ?, ?)";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);
            ps.setInt(2, idObjectif);
            ps.setInt(3, nombrePoints);
            ps.executeUpdate();
            System.out.println("✅ " + nombrePoints + " points ajoutés à l'utilisateur " + idUtilisateur);
        } catch (SQLException e) {
            System.err.println("❌ Erreur ajout points: " + e.getMessage());
        }
    }

    // Calculer le total des points d'un utilisateur
    public int getTotalPoints(int idUtilisateur) {
        String req = "SELECT SUM(nombre_points) as total FROM points WHERE id_utilisateur = ?";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return rs.getInt("total");
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getTotalPoints: " + e.getMessage());
        }
        return 0;
    }

    // Récupérer l'historique des points d'un utilisateur
    public List<Points> getHistoriquePoints(int idUtilisateur) {
        List<Points> liste = new ArrayList<>();
        String req = "SELECT p.*, o.titre as objectif_titre FROM points p " +
                "JOIN objectifs o ON p.id_objectif = o.id_objectif " +
                "WHERE p.id_utilisateur = ? ORDER BY p.date_attribution DESC";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Points p = new Points();
                p.setIdPoint(rs.getInt("id_point"));
                p.setIdUtilisateur(rs.getInt("id_utilisateur"));
                p.setIdObjectif(rs.getInt("id_objectif"));
                p.setNombrePoints(rs.getInt("nombre_points"));
                p.setDateAttribution(rs.getTimestamp("date_attribution"));
                liste.add(p);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getHistoriquePoints: " + e.getMessage());
        }
        return liste;
    }
}