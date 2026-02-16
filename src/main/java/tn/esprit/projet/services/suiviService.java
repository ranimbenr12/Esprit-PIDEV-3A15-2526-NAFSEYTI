package tn.esprit.projet.services;

import tn.esprit.projet.models.suivi;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class suiviService {

    private Connection cnx = MyBDConnexion.getInstance().getCnx();

    // ===================== INSERT =====================
    public void insertOne(suivi s) {
        String req = "INSERT INTO suivis (id_utilisateur, id_psychologue, titre, description, type_suivi) VALUES (?, ?, ?, ?, ?)";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, s.getidutilisateur());
            ps.setInt(2, s.getidpsychologue());
            ps.setString(3, s.gettitre());
            ps.setString(4, s.getdescription());
            ps.setString(5, s.gettype_suivi());
            ps.executeUpdate();
            System.out.println("✅ Suivi ajouté !");
        } catch (SQLException e) {
            System.err.println("❌ Erreur insertOne : " + e.getMessage());
        }
    }

    // ===================== UPDATE =====================
    public void updateOne(suivi s) {
        String req = "UPDATE suivis SET titre=?, description=?, type_suivi=? WHERE id_suivi=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setString(1, s.gettitre());
            ps.setString(2, s.getdescription());
            ps.setString(3, s.gettype_suivi());
            ps.setInt(4, s.getidsuivi());

            int rowsAffected = ps.executeUpdate();
            System.out.println("✅ Lignes modifiées : " + rowsAffected);

            if (rowsAffected == 0) {
                System.err.println("❌ Aucune ligne modifiée — ID=" + s.getidsuivi() + " introuvable !");
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur updateOne : " + e.getMessage());
        }
    }

    // ===================== DELETE =====================
    public void deleteOne(suivi s) {
        String req = "DELETE FROM suivis WHERE id_suivi=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, s.getidsuivi());
            int rowsAffected = ps.executeUpdate();
            System.out.println("✅ Lignes supprimées : " + rowsAffected);
        } catch (SQLException e) {
            System.err.println("❌ Erreur deleteOne : " + e.getMessage());
        }
    }

    // ===================== SELECT ALL =====================
    public List<suivi> selectAll() {
        List<suivi> liste = new ArrayList<>();
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
                s.settype_suivi(rs.getString("type_suivi"));

                System.out.println("Lu → ID=" + s.getidsuivi() + " | " + s.gettitre() + " | " + s.gettype_suivi());

                liste.add(s);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur selectAll : " + e.getMessage());
        }
        return liste;
    }

    // ===================== RECHERCHE par ID ou Titre =====================
    public List<suivi> rechercher(String motCle) {
        List<suivi> liste = new ArrayList<>();
        String req;
        PreparedStatement ps;

        try {
            // Vérifier si c'est un ID (nombre) ou un titre (texte)
            try {
                int id = Integer.parseInt(motCle);
                // Recherche par ID
                req = "SELECT * FROM suivis WHERE id_suivi = ?";
                ps = cnx.prepareStatement(req);
                ps.setInt(1, id);
            } catch (NumberFormatException e) {
                // Recherche par Titre
                req = "SELECT * FROM suivis WHERE titre LIKE ?";
                ps = cnx.prepareStatement(req);
                ps.setString(1, "%" + motCle + "%");
            }

            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                suivi s = new suivi();
                s.setidsuivi(rs.getInt("id_suivi"));
                s.setidutilisateur(rs.getInt("id_utilisateur"));
                s.setidpsychologue(rs.getInt("id_psychologue"));
                s.settitre(rs.getString("titre"));
                s.setdescription(rs.getString("description"));
                s.settype_suivi(rs.getString("type_suivi"));
                liste.add(s);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur rechercher : " + e.getMessage());
        }
        return liste;
    }
}