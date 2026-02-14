package TestPsychologique.dao;

import TestPsychologique.models.Resultat;
import TestPsychologique.models.Interpretation;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

public class Resultatdao {

    /**
     * Enregistrer un résultat dans la base de données
     */
    public int enregistrerResultat(Resultat resultat) {
        String sql = "INSERT INTO resultats (user_id, test_id, score_total) VALUES (?, ?, ?)";

        try (Connection conn = DataBaseConnection.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {

            pstmt.setInt(1, resultat.getUserId());
            pstmt.setInt(2, resultat.getTestId());
            pstmt.setInt(3, resultat.getScoreTotal());

            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                ResultSet rs = pstmt.getGeneratedKeys();
                if (rs.next()) {
                    int resultatId = rs.getInt(1);
                    System.out.println("✅ Résultat enregistré avec ID: " + resultatId);
                    return resultatId;
                }
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de l'enregistrement du résultat: " + e.getMessage());
            e.printStackTrace();
        }

        return -1;
    }

    /**
     * Récupérer l'interprétation correspondant au score
     */
    public Interpretation getInterpretation(int testId, int score) {
        String sql = "SELECT * FROM interpretations WHERE test_id = ? AND ? BETWEEN score_min AND score_max LIMIT 1";

        try (Connection conn = DataBaseConnection.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, testId);
            pstmt.setInt(2, score);

            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                Interpretation interp = new Interpretation();
                interp.setId(rs.getInt("id"));
                interp.setTestId(rs.getInt("test_id"));
                interp.setScoreMin(rs.getInt("score_min"));
                interp.setScoreMax(rs.getInt("score_max"));
                interp.setTitre(rs.getString("titre"));
                interp.setDescription(rs.getString("description"));
                interp.setConseils(rs.getString("conseils"));

                System.out.println("✅ Interprétation trouvée: " + interp.getTitre());
                return interp;
            } else {
                System.out.println("⚠️ Aucune interprétation trouvée pour test_id=" + testId + ", score=" + score);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la récupération de l'interprétation: " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }

    /**
     * Récupérer tous les résultats d'un utilisateur
     */
    public List<Resultat> getResultatsByUserId(int userId) {
        List<Resultat> resultats = new ArrayList<>();
        String sql = "SELECT * FROM resultats WHERE user_id = ? ORDER BY date_test DESC";

        try (Connection conn = DataBaseConnection.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, userId);
            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                Resultat resultat = new Resultat();
                resultat.setId(rs.getInt("id"));
                resultat.setUserId(rs.getInt("user_id"));
                resultat.setTestId(rs.getInt("test_id"));
                resultat.setScoreTotal(rs.getInt("score_total"));
                resultat.setDateTest(rs.getTimestamp("date_test"));

                resultats.add(resultat);
            }

            System.out.println("✅ " + resultats.size() + " résultats trouvés pour l'utilisateur " + userId);

        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la récupération des résultats: " + e.getMessage());
            e.printStackTrace();
        }

        return resultats;
    }

    /**
     * Récupérer un résultat par son ID
     */
    public Resultat getResultatById(int resultatId) {
        String sql = "SELECT * FROM resultats WHERE id = ?";

        try (Connection conn = DataBaseConnection.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, resultatId);
            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                Resultat resultat = new Resultat();
                resultat.setId(rs.getInt("id"));
                resultat.setUserId(rs.getInt("user_id"));
                resultat.setTestId(rs.getInt("test_id"));
                resultat.setScoreTotal(rs.getInt("score_total"));
                resultat.setDateTest(rs.getTimestamp("date_test"));

                return resultat;
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la récupération du résultat: " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }
}