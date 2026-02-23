package TestPsychologique.dao;

import TestPsychologique.models.ReponseScore;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ReponseScoredao {

    /**
     * Récupérer les points pour une réponse spécifique
     * C'EST LA MÉTHODE PRINCIPALE!
     */
    public int getPointsForAnswer(int questionId, String reponse) {
        String sql = "SELECT points FROM reponses_scores " +
                "WHERE question_id=? AND (lettre_reponse=? OR lettre_reponse='ANY')";

        try (Connection conn = DataBaseConnection.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, questionId);
            pstmt.setString(2, reponse);

            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                int points = rs.getInt("points");
                System.out.println("✅ Question " + questionId +
                        " | Réponse: " + reponse +
                        " | Points: " + points);
                return points;
            } else {
                System.out.println("⚠️ Aucun score trouvé pour question " + questionId +
                        " réponse " + reponse);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur getPointsForAnswer: " + e.getMessage());
            e.printStackTrace();
        }

        // Si aucune correspondance, retourner 0
        return 0;
    }

    /**
     * Récupérer tous les scores pour une question (utile pour l'admin)
     */
    public List<ReponseScore> getScoresByQuestionId(int questionId) {
        List<ReponseScore> scores = new ArrayList<>();
        String sql = "SELECT * FROM reponses_scores WHERE question_id=?";

        try (Connection conn = DataBaseConnection.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, questionId);
            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                ReponseScore score = new ReponseScore();
                score.setId(rs.getInt("id"));
                score.setQuestionId(rs.getInt("question_id"));
                score.setLettreReponse(rs.getString("lettre_reponse"));
                score.setPoints(rs.getInt("points"));
                scores.add(score);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return scores;
    }

    /**
     * Ajouter un score de réponse (pour l'interface admin)
     */
    public boolean ajouterScore(ReponseScore score) {
        String sql = "INSERT INTO reponses_scores (question_id, lettre_reponse, points) " +
                "VALUES (?, ?, ?)";

        try (Connection conn = DataBaseConnection.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, score.getQuestionId());
            pstmt.setString(2, score.getLettreReponse());
            pstmt.setInt(3, score.getPoints());

            return pstmt.executeUpdate() > 0;

        } catch (SQLException e) {
            System.err.println("❌ Erreur ajouterScore: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }
}