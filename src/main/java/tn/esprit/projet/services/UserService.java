package tn.esprit.projet.services;

import tn.esprit.projet.models.User;
import tn.esprit.projet.models.PatientPsychologue;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class UserService {
    private Connection cnx = MyBDConnexion.getInstance().getCnx();

    // ===== AUTHENTIFICATION =====
    public User authentifier(String email, String password) {
        String req = "SELECT * FROM users WHERE email = ? AND password = ? AND status = 'actif'";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setString(1, email);
            ps.setString(2, password);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return mapResultSetToUser(rs);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur authentification: " + e.getMessage());
        }
        return null;
    }

    // ===== CRUD UTILISATEURS =====
    public User getUserById(int id) {
        String req = "SELECT * FROM users WHERE id = ?";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return mapResultSetToUser(rs);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getUserById: " + e.getMessage());
        }
        return null;
    }

    public List<User> getPsychologues() {
        List<User> liste = new ArrayList<>();
        String req = "SELECT * FROM users WHERE role = 'psychologue' AND status = 'actif'";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(req)) {
            while (rs.next()) {
                liste.add(mapResultSetToUser(rs));
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getPsychologues: " + e.getMessage());
        }
        return liste;
    }

    public List<User> getPatients() {
        List<User> liste = new ArrayList<>();
        String req = "SELECT * FROM users WHERE role = 'etudiant' AND status = 'actif'";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(req)) {
            while (rs.next()) {
                liste.add(mapResultSetToUser(rs));
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getPatients: " + e.getMessage());
        }
        return liste;
    }

    // ===== GESTION DES RELATIONS PSYCHOLOGUE-PATIENT =====

    public void assignerPatientAuPsychologue(int patientId, int psychologueId) {
        String req = "INSERT INTO patient_psychologue (patient_id, psychologue_id) VALUES (?, ?)";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, patientId);
            ps.setInt(2, psychologueId);
            ps.executeUpdate();
            System.out.println("✅ Patient " + patientId + " associé au psychologue " + psychologueId);
        } catch (SQLException e) {
            System.err.println("❌ Erreur assignation: " + e.getMessage());
        }
    }

    public List<User> getPatientsDuPsychologue(int psychologueId) {
        List<User> patients = new ArrayList<>();
        String req = "SELECT u.* FROM users u " +
                "JOIN patient_psychologue pp ON u.id = pp.patient_id " +
                "WHERE pp.psychologue_id = ? AND pp.statut = 'actif'";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, psychologueId);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                patients.add(mapResultSetToUser(rs));
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getPatientsDuPsychologue: " + e.getMessage());
        }
        return patients;
    }

    public User getPsychologueDuPatient(int patientId) {
        String req = "SELECT u.* FROM users u " +
                "JOIN patient_psychologue pp ON u.id = pp.psychologue_id " +
                "WHERE pp.patient_id = ? AND pp.statut = 'actif'";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, patientId);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return mapResultSetToUser(rs);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getPsychologueDuPatient: " + e.getMessage());
        }
        return null;
    }

    // ===== UTILITAIRES =====
    private User mapResultSetToUser(ResultSet rs) throws SQLException {
        User user = new User();
        user.setId(rs.getInt("id"));
        user.setProfilePhoto(rs.getString("profile_photo"));
        user.setFirstname(rs.getString("firstname"));
        user.setLastname(rs.getString("lastname"));
        user.setEmail(rs.getString("email"));
        user.setPassword(rs.getString("password"));
        user.setAddress(rs.getString("address"));
        user.setLocation(rs.getString("location"));
        user.setPhoneNumber(rs.getString("phone_number"));
        user.setRole(rs.getString("role"));
        user.setCreatedAt(rs.getTimestamp("created_at"));
        user.setStatus(rs.getString("status"));
        return user;
    }

    public List<User> getUsersByRole(String role) {
        List<User> liste = new ArrayList<>();
        String req = "SELECT * FROM users WHERE role = ? AND status = 'actif'";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setString(1, role);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                liste.add(mapResultSetToUser(rs));
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getUsersByRole: " + e.getMessage());
        }
        return liste;
    }

    public List<User> getAllUsers() {
        List<User> liste = new ArrayList<>();
        String req = "SELECT * FROM users ORDER BY created_at DESC";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(req)) {
            while (rs.next()) {
                liste.add(mapResultSetToUser(rs));
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getAllUsers: " + e.getMessage());
        }
        return liste;
    }
}