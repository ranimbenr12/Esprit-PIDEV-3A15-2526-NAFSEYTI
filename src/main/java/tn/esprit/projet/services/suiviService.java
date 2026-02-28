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
            System.out.println("✅ Suivi ajouté pour l'utilisateur " + s.getidutilisateur());
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
            if (rowsAffected > 0) {
                System.out.println("✅ Suivi modifié - ID: " + s.getidsuivi());
            } else {
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
            if (rowsAffected > 0) {
                System.out.println("✅ Suivi supprimé - ID: " + s.getidsuivi());
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur deleteOne : " + e.getMessage());
        }
    }

    // ===================== SELECT ALL =====================
    public List<suivi> selectAll() {
        List<suivi> liste = new ArrayList<>();
        String req = "SELECT * FROM suivis ORDER BY id_suivi DESC";
        try {
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                suivi s = mapResultSetToSuivi(rs);
                liste.add(s);
                System.out.println("📋 Suivi trouvé: ID=" + s.getidsuivi() + " | " + s.gettitre() + " | User=" + s.getidutilisateur());
            }
            System.out.println("✅ " + liste.size() + " suivis au total");
        } catch (SQLException e) {
            System.err.println("❌ Erreur selectAll : " + e.getMessage());
        }
        return liste;
    }

    // ===================== SELECT BY USER ID =====================
    public List<suivi> selectByUserId(int userId) {
        List<suivi> liste = new ArrayList<>();
        String req = "SELECT * FROM suivis WHERE id_utilisateur = ? ORDER BY id_suivi DESC";

        System.out.println("🔍 Recherche des suivis pour l'utilisateur ID: " + userId);

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, userId);
            ResultSet rs = ps.executeQuery();

            while (rs.next()) {
                suivi s = mapResultSetToSuivi(rs);
                liste.add(s);
                System.out.println("   → Suivi trouvé: " + s.gettitre() + " (ID=" + s.getidsuivi() + ")");
            }

            System.out.println("✅ " + liste.size() + " suivis trouvés pour l'utilisateur " + userId);

        } catch (SQLException e) {
            System.err.println("❌ Erreur selectByUserId: " + e.getMessage());
        }
        return liste;
    }

    // ===================== RECHERCHE par ID ou Titre =====================
    public List<suivi> rechercher(String motCle) {
        List<suivi> liste = new ArrayList<>();

        if (motCle == null || motCle.trim().isEmpty()) {
            return selectAll();
        }

        try {
            PreparedStatement ps;

            // Vérifier si c'est un ID (nombre)
            try {
                int id = Integer.parseInt(motCle.trim());
                // Recherche par ID
                String req = "SELECT * FROM suivis WHERE id_suivi = ?";
                ps = cnx.prepareStatement(req);
                ps.setInt(1, id);
                System.out.println("🔍 Recherche par ID: " + id);
            } catch (NumberFormatException e) {
                // Recherche par Titre
                String req = "SELECT * FROM suivis WHERE titre LIKE ? OR description LIKE ?";
                ps = cnx.prepareStatement(req);
                ps.setString(1, "%" + motCle + "%");
                ps.setString(2, "%" + motCle + "%");
                System.out.println("🔍 Recherche par texte: " + motCle);
            }

            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                suivi s = mapResultSetToSuivi(rs);
                liste.add(s);
            }

            System.out.println("✅ " + liste.size() + " résultats pour la recherche: " + motCle);

        } catch (SQLException e) {
            System.err.println("❌ Erreur rechercher : " + e.getMessage());
        }
        return liste;
    }

    // ===================== MÉTHODE UTILITAIRE =====================
    private suivi mapResultSetToSuivi(ResultSet rs) throws SQLException {
        suivi s = new suivi();
        s.setidsuivi(rs.getInt("id_suivi"));
        s.setidutilisateur(rs.getInt("id_utilisateur"));
        s.setidpsychologue(rs.getInt("id_psychologue"));
        s.settitre(rs.getString("titre"));
        s.setdescription(rs.getString("description"));
        s.settype_suivi(rs.getString("type_suivi"));
        return s;
    }

    // ===================== VÉRIFIER CONNEXION =====================
    public boolean testConnexion() {
        try {
            return cnx != null && !cnx.isClosed();
        } catch (SQLException e) {
            return false;
        }
    }
}