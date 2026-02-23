package tn.esprit.projet.view;

import tn.esprit.projet.models.User;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class UserService implements CRUD<User> {

    private Connection cnx;

    public UserService() {
        cnx = MyBDConnexion.getInstance().getCnx();
    }

    @Override
    public void insertOne(User user) throws SQLException {
        // Validation
        if(user.getEmail() == null || user.getEmail().isEmpty())
            throw new SQLException("L'email ne peut pas être vide !");
        if(user.getFirstname() == null || user.getFirstname().isEmpty())
            throw new SQLException("Le prénom ne peut pas être vide !");
        if(user.getLastname() == null || user.getLastname().isEmpty())
            throw new SQLException("Le nom ne peut pas être vide !");
        if(user.getPassword() == null || user.getPassword().isEmpty())
            throw new SQLException("Le mot de passe ne peut pas être vide !");

        // Vérifie que l'email n'existe pas déjà
        String checkEmail = "SELECT id FROM users WHERE email=?";
        PreparedStatement psCheck = cnx.prepareStatement(checkEmail);
        psCheck.setString(1, user.getEmail());
        ResultSet rs = psCheck.executeQuery();
        if(rs.next()) throw new SQLException("L'email " + user.getEmail() + " est déjà utilisé !");

        // Insert user
        String req = "INSERT INTO users (profile_photo, firstname, lastname, email, password, " +
                "address, location, phone_number, role, created_at, status) " +
                "VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, user.getProfilePhoto());
        ps.setString(2, user.getFirstname());
        ps.setString(3, user.getLastname());
        ps.setString(4, user.getEmail());
        ps.setString(5, user.getPassword());
        ps.setString(6, user.getAddress());
        ps.setString(7, user.getLocation());
        ps.setString(8, user.getPhoneNumber());
        ps.setString(9, user.getRole());
        ps.setTimestamp(10, user.getCreatedAt() != null ? user.getCreatedAt() : new Timestamp(System.currentTimeMillis()));
        ps.setString(11, user.getStatus() != null ? user.getStatus() : "active");

        ps.executeUpdate();
    }

    @Override
    public void updateOne(User user) throws SQLException {
        // Check if email is being changed and if it's already used by another user
        String checkEmail = "SELECT id FROM users WHERE email=? AND id!=?";
        PreparedStatement psCheck = cnx.prepareStatement(checkEmail);
        psCheck.setString(1, user.getEmail());
        psCheck.setInt(2, user.getId());
        ResultSet rs = psCheck.executeQuery();
        if(rs.next()) throw new SQLException("L'email " + user.getEmail() + " est déjà utilisé par un autre utilisateur !");

        String req = "UPDATE users SET profile_photo=?, firstname=?, lastname=?, email=?, password=?, " +
                "address=?, location=?, phone_number=?, role=?, status=? WHERE id=?";

        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, user.getProfilePhoto());
        ps.setString(2, user.getFirstname());
        ps.setString(3, user.getLastname());
        ps.setString(4, user.getEmail());
        ps.setString(5, user.getPassword());
        ps.setString(6, user.getAddress());
        ps.setString(7, user.getLocation());
        ps.setString(8, user.getPhoneNumber());
        ps.setString(9, user.getRole());
        ps.setString(10, user.getStatus());
        ps.setInt(11, user.getId());

        ps.executeUpdate();
    }

    @Override
    public void deletOne(User user) throws SQLException {
        String req = "DELETE FROM users WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, user.getId());
        ps.executeUpdate();
    }

    // Alternative soft delete method (if you prefer to just update status instead of deleting)
    public void softDelete(User user) throws SQLException {
        String req = "UPDATE users SET status='deleted' WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, user.getId());
        ps.executeUpdate();
    }

    public User getByEmail(String email) throws SQLException {
        String req = "SELECT * FROM users WHERE email=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, email);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            return mapResultSetToUser(rs);
        }
        return null;
    }

    public User getById(int id) throws SQLException {
        String req = "SELECT * FROM users WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, id);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            return mapResultSetToUser(rs);
        }
        return null;
    }

    public List<User> getByRole(String role) throws SQLException {
        List<User> users = new ArrayList<>();
        String req = "SELECT * FROM users WHERE role=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, role);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            users.add(mapResultSetToUser(rs));
        }
        return users;
    }

    public List<User> getByStatus(String status) throws SQLException {
        List<User> users = new ArrayList<>();
        String req = "SELECT * FROM users WHERE status=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, status);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            users.add(mapResultSetToUser(rs));
        }
        return users;
    }

    public User authenticate(String email, String password) throws SQLException {
        String req = "SELECT * FROM users WHERE email=? AND password=? AND status='active'";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, email);
        ps.setString(2, password);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            return mapResultSetToUser(rs);
        }
        return null;
    }

    @Override
    public List<User> selectAll() throws SQLException {
        List<User> users = new ArrayList<>();
        String req = "SELECT * FROM users";
        Statement st = cnx.createStatement();
        ResultSet rs = st.executeQuery(req);

        while (rs.next()) {
            users.add(mapResultSetToUser(rs));
        }
        return users;
    }

    // Helper method to map ResultSet to User object
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
}