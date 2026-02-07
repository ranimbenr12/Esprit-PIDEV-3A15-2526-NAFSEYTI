package tn.esprit.projet.services;

import tn.esprit.projet.models.suivi;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class suiviService implements CRUD<suivi> {

    private Connection cnx;

    public suiviService() {
        cnx = MyBDConnexion.getInstance().getCnx();
    }

    @Override
    public void insertOne(suivi s) {
        String req = "INSERT INTO suivis (id_utilisateur, id_psychologue, titre, description, statut) VALUES (?, ?, ?, ?, ?)";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, s.getidutilisateur());
            ps.setInt(2, s.getidpsychologue());
            ps.setString(3, s.gettitre());
            ps.setString(4, s.getdescription());
            ps.setString(5, s.getstatut());
            ps.executeUpdate();
            System.out.println("Suivi ajouté avec succès !");
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'ajout : " + e.getMessage());
        }
    }

    @Override
    public void updateOne(suivi s) {
        String req = "UPDATE suivis SET id_utilisateur=?, id_psychologue=?, titre=?, description=?, statut=? WHERE id_suivi=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, s.getidutilisateur());
            ps.setInt(2, s.getidpsychologue());
            ps.setString(3, s.gettitre());
            ps.setString(4, s.getdescription());
            ps.setString(5, s.getstatut());
            ps.setInt(6, s.getidsuivi());
            ps.executeUpdate();
            System.out.println("Suivi modifié avec succès !");
        } catch (SQLException e) {
            System.err.println("Erreur lors de la modification : " + e.getMessage());
        }
    }

    @Override
    public void deleteOne(suivi s) {
        String req = "DELETE FROM suivis WHERE id_suivi=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, s.getidsuivi());
            ps.executeUpdate();
            System.out.println("Suivi supprimé avec succès !");
        } catch (SQLException e) {
            System.err.println("Erreur lors de la suppression : " + e.getMessage());
        }
    }

    @Override
    public List<suivi> selectAll() {
        List<suivi> suivis = new ArrayList<>();
        String req = "SELECT * FROM suivis";
        try {
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                suivi s = new suivi();
                s.setidsuivi(rs.getInt("id_suivi"));
                s.setidutilisateur(rs.getInt("id_utilisateur"));
                s.setidpsychologue(rs.getInt("id_psychologue"));
                s.settitre(rs.getString("titre"));
                s.setdescription(rs.getString("description"));
                s.setdatecreation(rs.getTimestamp("date_creation").toLocalDateTime());
                s.setdatemodification(rs.getTimestamp("date_modification").toLocalDateTime());
                s.setstatut(rs.getString("statut"));
                suivis.add(s);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'affichage de tous les suivis : " + e.getMessage());
        }
        return suivis;
    }

    // Méthode supplémentaire pour afficher un seul suivi par ID
    public suivi selectOne(int id) {
        String req = "SELECT * FROM suivis WHERE id_suivi=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                suivi s = new suivi();
                s.setidsuivi(rs.getInt("id_suivi"));
                s.setidutilisateur(rs.getInt("id_utilisateur"));
                s.setidpsychologue(rs.getInt("id_psychologue"));
                s.settitre(rs.getString("titre"));
                s.setdescription(rs.getString("description"));
                s.setdatecreation(rs.getTimestamp("date_creation").toLocalDateTime());
                s.setdatemodification(rs.getTimestamp("date_modification").toLocalDateTime());
                s.setstatut(rs.getString("statut"));
                return s;
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'affichage du suivi : " + e.getMessage());
        }
        return null;
    }

    // Méthode pour rechercher un suivi par titre ou mot-clé
    public List<suivi> rechercherSuivi(String motCle) {
        List<suivi> suivis = new ArrayList<>();
        String req = "SELECT * FROM suivis WHERE titre LIKE ? OR description LIKE ?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setString(1, "%" + motCle + "%");
            ps.setString(2, "%" + motCle + "%");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                suivi s = new suivi();
                s.setidsuivi(rs.getInt("id_suivi"));
                s.setidutilisateur(rs.getInt("id_utilisateur"));
                s.setidpsychologue(rs.getInt("id_psychologue"));
                s.settitre(rs.getString("titre"));
                s.setdescription(rs.getString("description"));
                s.setdatecreation(rs.getTimestamp("date_creation").toLocalDateTime());
                s.setdatemodification(rs.getTimestamp("date_modification").toLocalDateTime());
                s.setstatut(rs.getString("statut"));
                suivis.add(s);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la recherche : " + e.getMessage());
        }
        return suivis;
    }

    // Méthode pour trier les suivis par date ou priorité
    public List<suivi> trierSuivis(String critere) {
        List<suivi> suivis = new ArrayList<>();
        String req = "SELECT * FROM suivis ORDER BY " + critere;
        try {
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                suivi s = new suivi();
                s.setidsuivi(rs.getInt("id_suivi"));
                s.setidutilisateur(rs.getInt("id_utilisateur"));
                s.setidpsychologue(rs.getInt("id_psychologue"));
                s.settitre(rs.getString("titre"));
                s.setdescription(rs.getString("description"));
                s.setdatecreation(rs.getTimestamp("date_creation").toLocalDateTime());
                s.setdatemodification(rs.getTimestamp("date_modification").toLocalDateTime());
                s.setstatut(rs.getString("statut"));
                suivis.add(s);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors du tri : " + e.getMessage());
        }
        return suivis;
    }
}