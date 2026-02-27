package tn.esprit.nafseyti.utils;

import tn.esprit.nafseyti.models.Test;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class Testdao {

    /**
     * Ajouter un nouveau test dans la base de données
     */
    public boolean ajouterTest(Test test) {

        String sql = """
        INSERT INTO tests (titre, description, categorie, niveau, duree, 
                          score_max, created_by, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        """;

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {

            // Remplir les 8 paramètres
            pstmt.setString(1, test.getTitre());        // titre
            pstmt.setString(2, test.getDescription());  // description
            pstmt.setString(3, test.getCategorie());    // categorie
            pstmt.setString(4, test.getNiveau());       // niveau
            pstmt.setInt(5, test.getDuree());           // duree
            pstmt.setInt(6, test.getScoreMax());        // score_max
            pstmt.setInt(7, test.getCreatedBy());       // created_by
            pstmt.setString(8, test.getStatus());       // status

            // Exécuter l'insertion
            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                // Récupérer l'ID généré automatiquement
                ResultSet generatedKeys = pstmt.getGeneratedKeys();
                if (generatedKeys.next()) {
                    test.setId(generatedKeys.getInt(1));
                }
                System.out.println("Test ajouté avec succès ! ID: " + test.getId());
                return true;
            }

        } catch (SQLException e) {
            System.err.println(" Erreur lors de l'ajout : " + e.getMessage());
            e.printStackTrace();
        }
        return false;
    }
    public Test getTestById(int id) {
        String sql = "SELECT * FROM tests WHERE id = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, id);
            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                Test test = new Test();
                test.setId(rs.getInt("id"));
                test.setTitre(rs.getString("titre"));
                test.setDescription(rs.getString("description"));
                test.setCategorie(rs.getString("categorie"));
                test.setNiveau(rs.getString("niveau"));
                test.setDuree(rs.getInt("duree"));
                test.setScoreMax(rs.getInt("score_max"));
                test.setCreatedBy(rs.getInt("created_by"));
                test.setStatus(rs.getString("status"));
                test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());

                System.out.println(" Test trouvé : " + test.getTitre());
                return test;
            } else {
                System.out.println(" Aucun test trouvé avec l'ID: " + id);
            }

        } catch (SQLException e) {
            System.err.println(" Erreur lors de la recherche : " + e.getMessage());
            e.printStackTrace();
        }
        return null;
    }


    public boolean modifierTest(Test test) {
        String sql = """
    UPDATE tests 
    SET titre = ?, description = ?, categorie = ?, niveau = ?, 
        duree = ?, score_max = ?, status = ?
    WHERE id = ?
    """;

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            // ✅ AJOUTEZ CE DEBUG
            System.out.println("🔍 DEBUG - ID du test à modifier : " + test.getId());

            pstmt.setString(1, test.getTitre());
            pstmt.setString(2, test.getDescription());
            pstmt.setString(3, test.getCategorie());
            pstmt.setString(4, test.getNiveau());
            pstmt.setInt(5, test.getDuree());
            pstmt.setInt(6, test.getScoreMax());
            pstmt.setString(7, test.getStatus());
            pstmt.setInt(8, test.getId());

            int rowsAffected = pstmt.executeUpdate();

            // ✅ AJOUTEZ CE DEBUG
            System.out.println("🔍 DEBUG - Lignes affectées : " + rowsAffected);

            if (rowsAffected > 0) {
                System.out.println(" Test modifié avec succès !");
                return true;
            } else {
                System.out.println(" Aucun test modifié (ID inexistant ?)");
            }

        } catch (SQLException e) {
            System.err.println(" Erreur lors de la modification : " + e.getMessage());
            e.printStackTrace();
        }
        return false;
    }


    public boolean supprimerTest(int id) {
        String sql = "DELETE FROM tests WHERE id = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, id);
            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                System.out.println(" Test supprimé avec succès !");
                return true;
            } else {
                System.out.println(" Aucun test supprimé (ID inexistant ?)");
            }

        } catch (SQLException e) {
            System.err.println(" Erreur lors de la suppression : " + e.getMessage());
            e.printStackTrace();
        }
        return false;
    }

    public List<Test> getAllTests() {
        List<Test> tests = new ArrayList<>();
        String sql = "SELECT * FROM tests ORDER BY created_at DESC";

        try (Connection conn = MyBDConnexion.getConnection();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                Test test = new Test();
                test.setId(rs.getInt("id"));
                test.setTitre(rs.getString("titre"));
                test.setDescription(rs.getString("description"));
                test.setCategorie(rs.getString("categorie"));
                test.setNiveau(rs.getString("niveau"));
                test.setDuree(rs.getInt("duree"));
                test.setScoreMax(rs.getInt("score_max"));
                test.setCreatedBy(rs.getInt("created_by"));
                test.setStatus(rs.getString("status"));
                test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());

                tests.add(test);
            }

            System.out.println(" " + tests.size() + " tests récupérés");

        } catch (SQLException e) {
            System.err.println(" Erreur lors de la récupération : " + e.getMessage());
            e.printStackTrace();
        }
        return tests;
    }
}