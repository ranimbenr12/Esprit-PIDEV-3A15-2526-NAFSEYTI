package tn.esprit.nafseyti.utils;

import tn.esprit.nafseyti.models.JournalEntry;

import java.sql.*;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class JournalEntrydao {

    /**
     * Créer une nouvelle entrée de journal
     */
    public int createEntry(JournalEntry entry) {
        String sql = "INSERT INTO journal_entries (user_id, date, humeur, emotions, note_texte, energie, sommeil_qualite) " +
                "VALUES (?, ?, ?, ?, ?, ?, ?)";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {

            pstmt.setInt(1, entry.getUserId());
            pstmt.setDate(2, entry.getDate());
            pstmt.setString(3, entry.getHumeur());
            pstmt.setString(4, entry.getEmotionsAsString());
            pstmt.setString(5, entry.getNoteTexte());
            pstmt.setInt(6, entry.getEnergie());
            pstmt.setInt(7, entry.getSommeilQualite());

            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                ResultSet rs = pstmt.getGeneratedKeys();
                if (rs.next()) {
                    int id = rs.getInt(1);
                    System.out.println("✅ Entrée journal créée avec ID: " + id);
                    return id;
                }
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur création entrée: " + e.getMessage());
            e.printStackTrace();
        }

        return -1;
    }

    /**
     * Récupérer une entrée par date et userId
     */
    public JournalEntry getEntryByDate(int userId, Date date) {
        String sql = "SELECT * FROM journal_entries WHERE user_id = ? AND date = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, userId);
            pstmt.setDate(2, date);

            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                return mapResultSetToEntry(rs);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur récupération entrée: " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }

    /**
     * Récupérer toutes les entrées d'un utilisateur
     */
    public List<JournalEntry> getEntriesByUserId(int userId) {
        List<JournalEntry> entries = new ArrayList<>();
        String sql = "SELECT * FROM journal_entries WHERE user_id = ? ORDER BY date DESC";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, userId);
            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                entries.add(mapResultSetToEntry(rs));
            }

            System.out.println("✅ " + entries.size() + " entrées récupérées");

        } catch (SQLException e) {
            System.err.println("❌ Erreur récupération entrées: " + e.getMessage());
            e.printStackTrace();
        }

        return entries;
    }

    /**
     * Récupérer les entrées d'une période
     */
    public List<JournalEntry> getEntriesByPeriod(int userId, Date startDate, Date endDate) {
        List<JournalEntry> entries = new ArrayList<>();
        String sql = "SELECT * FROM journal_entries WHERE user_id = ? AND date BETWEEN ? AND ? ORDER BY date ASC";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, userId);
            pstmt.setDate(2, startDate);
            pstmt.setDate(3, endDate);

            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                entries.add(mapResultSetToEntry(rs));
            }

            System.out.println("✅ " + entries.size() + " entrées de la période récupérées");

        } catch (SQLException e) {
            System.err.println("❌ Erreur récupération période: " + e.getMessage());
            e.printStackTrace();
        }

        return entries;
    }

    /**
     * Mettre à jour une entrée existante
     */
    public boolean updateEntry(JournalEntry entry) {
        String sql = "UPDATE journal_entries SET humeur = ?, emotions = ?, note_texte = ?, " +
                "energie = ?, sommeil_qualite = ? WHERE id = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setString(1, entry.getHumeur());
            pstmt.setString(2, entry.getEmotionsAsString());
            pstmt.setString(3, entry.getNoteTexte());
            pstmt.setInt(4, entry.getEnergie());
            pstmt.setInt(5, entry.getSommeilQualite());
            pstmt.setInt(6, entry.getId());

            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                System.out.println("✅ Entrée mise à jour");
                return true;
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur mise à jour: " + e.getMessage());
            e.printStackTrace();
        }

        return false;
    }

    /**
     * Supprimer une entrée
     */
    public boolean deleteEntry(int id) {
        String sql = "DELETE FROM journal_entries WHERE id = ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, id);
            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                System.out.println("✅ Entrée supprimée");
                return true;
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur suppression: " + e.getMessage());
            e.printStackTrace();
        }

        return false;
    }

    /**
     * Obtenir les statistiques d'humeur sur une période
     */
    public Map<String, Integer> getHumeurStatistics(int userId, Date startDate, Date endDate) {
        Map<String, Integer> stats = new HashMap<>();
        String sql = "SELECT humeur, COUNT(*) as count FROM journal_entries " +
                "WHERE user_id = ? AND date BETWEEN ? AND ? GROUP BY humeur";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, userId);
            pstmt.setDate(2, startDate);
            pstmt.setDate(3, endDate);

            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                stats.put(rs.getString("humeur"), rs.getInt("count"));
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur statistiques: " + e.getMessage());
            e.printStackTrace();
        }

        return stats;
    }

    /**
     * Calculer la moyenne d'énergie sur une période
     */
    public double getAverageEnergie(int userId, Date startDate, Date endDate) {
        String sql = "SELECT AVG(energie) as avg_energie FROM journal_entries " +
                "WHERE user_id = ? AND date BETWEEN ? AND ?";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, userId);
            pstmt.setDate(2, startDate);
            pstmt.setDate(3, endDate);

            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                return rs.getDouble("avg_energie");
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur calcul moyenne: " + e.getMessage());
            e.printStackTrace();
        }

        return 0.0;
    }

    /**
     * Compter le nombre de jours consécutifs avec entrées
     */
    public int getStreakDays(int userId) {
        String sql = "SELECT date FROM journal_entries WHERE user_id = ? ORDER BY date DESC LIMIT 30";

        try (Connection conn = MyBDConnexion.getConnection();
             PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, userId);
            ResultSet rs = pstmt.executeQuery();

            int streak = 0;
            Date lastDate = null;

            while (rs.next()) {
                Date currentDate = rs.getDate("date");

                if (lastDate == null) {
                    // Première date
                    lastDate = currentDate;
                    streak = 1;
                } else {
                    // Vérifier si c'est le jour précédent
                    long diff = (lastDate.getTime() - currentDate.getTime()) / (1000 * 60 * 60 * 24);
                    if (diff == 1) {
                        streak++;
                        lastDate = currentDate;
                    } else {
                        break; // Fin de la série
                    }
                }
            }

            return streak;

        } catch (SQLException e) {
            System.err.println("❌ Erreur calcul streak: " + e.getMessage());
            e.printStackTrace();
        }

        return 0;
    }

    /**
     * Mapper ResultSet vers JournalEntry
     */
    private JournalEntry mapResultSetToEntry(ResultSet rs) throws SQLException {
        JournalEntry entry = new JournalEntry();
        entry.setId(rs.getInt("id"));
        entry.setUserId(rs.getInt("user_id"));
        entry.setDate(rs.getDate("date"));
        entry.setHumeur(rs.getString("humeur"));
        entry.setEmotionsFromString(rs.getString("emotions"));
        entry.setNoteTexte(rs.getString("note_texte"));
        entry.setEnergie(rs.getInt("energie"));
        entry.setSommeilQualite(rs.getInt("sommeil_qualite"));
        entry.setCreatedAt(rs.getTimestamp("created_at"));
        return entry;
    }
}