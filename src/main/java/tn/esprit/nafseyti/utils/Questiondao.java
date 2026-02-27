package tn.esprit.nafseyti.utils;

import tn.esprit.nafseyti.models.Question;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class Questiondao {

    /**
     * Ajouter une nouvelle question
     */
    public void ajouterQuestion(Question question) {
        String sql = "INSERT INTO questions (test_id, texte, type_question, reponses_possibles, " +
                "points, ordre, obligatoire, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, question.getTestId());
            stmt.setString(2, question.getTexte());
            stmt.setString(3, question.getTypeQuestion());
            stmt.setString(4, question.getReponsesPossibles());
            stmt.setInt(5, question.getPoints());
            stmt.setInt(6, question.getOrdre());
            stmt.setBoolean(7, question.isObligatoire());
            stmt.setString(8, question.getStatus());

            stmt.executeUpdate();
            System.out.println("Question ajoutée avec succès.");

        } catch (SQLException e) {
            System.err.println("Erreur lors de l'ajout : " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Récupérer toutes les questions
     */
    public List<Question> getAllQuestions() {
        List<Question> questions = new ArrayList<>();
        String sql = "SELECT * FROM questions ORDER BY test_id, ordre";

        try (Connection conn = MyBDConnexion.getConnection();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                questions.add(mapRow(rs));
            }

        } catch (SQLException e) {
            System.err.println("Erreur récupération : " + e.getMessage());
            e.printStackTrace();
        }

        return questions;
    }

    /**
     * Récupérer les questions d’un test
     */
    public List<Question> getQuestionsByTestId(int testId) {
        List<Question> questions = new ArrayList<>();
        String sql = "SELECT * FROM questions WHERE test_id = ? ORDER BY ordre";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, testId);
            ResultSet rs = stmt.executeQuery();

            while (rs.next()) {
                questions.add(mapRow(rs));
            }

        } catch (SQLException e) {
            System.err.println("Erreur récupération : " + e.getMessage());
            e.printStackTrace();
        }

        return questions;
    }

    /**
     * Récupérer une question par ID
     */
    public Question getQuestionById(int id) {
        String sql = "SELECT * FROM questions WHERE id = ?";

        try (Connection conn =MyBDConnexion.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, id);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                return mapRow(rs);
            }

        } catch (SQLException e) {
            System.err.println("Erreur récupération : " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }

    /**
     * Modifier une question
     */
    public void modifierQuestion(Question question) {
        String sql = "UPDATE questions SET test_id = ?, texte = ?, type_question = ?, " +
                "reponses_possibles = ?, points = ?, ordre = ?, obligatoire = ?, status = ? " +
                "WHERE id = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, question.getTestId());
            stmt.setString(2, question.getTexte());
            stmt.setString(3, question.getTypeQuestion());
            stmt.setString(4, question.getReponsesPossibles());
            stmt.setInt(5, question.getPoints());
            stmt.setInt(6, question.getOrdre());
            stmt.setBoolean(7, question.isObligatoire());
            stmt.setString(8, question.getStatus());
            stmt.setInt(9, question.getId());

            stmt.executeUpdate();

        } catch (SQLException e) {
            System.err.println("Erreur modification : " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Supprimer une question
     */
    public void supprimerQuestion(int id) {
        String sql = "DELETE FROM questions WHERE id = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, id);
            stmt.executeUpdate();

        } catch (SQLException e) {
            System.err.println("Erreur suppression : " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Compter les questions d’un test
     */
    public int countQuestionsByTestId(int testId) {
        String sql = "SELECT COUNT(*) FROM questions WHERE test_id = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, testId);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                return rs.getInt(1);
            }

        } catch (SQLException e) {
            System.err.println("Erreur comptage : " + e.getMessage());
            e.printStackTrace();
        }

        return 0;
    }

    /**
     * Mapper ResultSet → Question
     */
    private Question mapRow(ResultSet rs) throws SQLException {
        Question q = new Question();
        q.setId(rs.getInt("id"));
        q.setTestId(rs.getInt("test_id"));
        q.setTexte(rs.getString("texte"));
        q.setTypeQuestion(rs.getString("type_question"));
        q.setReponsesPossibles(rs.getString("reponses_possibles"));
        q.setPoints(rs.getInt("points"));
        q.setOrdre(rs.getInt("ordre"));
        q.setObligatoire(rs.getBoolean("obligatoire"));
        q.setStatus(rs.getString("status"));
        q.setCreatedAt(rs.getTimestamp("created_at"));
        return q;
    }
}