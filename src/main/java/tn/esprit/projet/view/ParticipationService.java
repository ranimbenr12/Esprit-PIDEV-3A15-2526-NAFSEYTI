package tn.esprit.projet.view;
import tn.esprit.projet.models.Participation;
import tn.esprit.projet.models.User;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ParticipationService implements CRUD<Participation> {

    private Connection cnx;
    private UserService userService = new UserService();
    private EventService eventService = new EventService();

    public ParticipationService() {
        cnx = MyBDConnexion.getInstance().getCnx();
    }

    @Override
    public void insertOne(Participation participation) throws SQLException {
        // Check if event has available slots
        String checkSlots = "SELECT e.*, (SELECT COUNT(*) FROM participations p WHERE p.event_id = e.id) as current_participants " +
                "FROM events e WHERE e.id = ?";
        PreparedStatement psCheck = cnx.prepareStatement(checkSlots);
        psCheck.setInt(1, participation.getEventId());
        ResultSet rs = psCheck.executeQuery();

        if (rs.next()) {
            int maxParticipants = rs.getInt("max_participants");
            int currentParticipants = rs.getInt("current_participants");

            if (currentParticipants >= maxParticipants) {
                throw new SQLException("Désolé, cet événement a atteint le nombre maximum de participants !");
            }
        }

        // Insert participation
        String req = "INSERT INTO participations (user_id, event_id, status) VALUES (?, ?, ?)";
        PreparedStatement ps = cnx.prepareStatement(req, Statement.RETURN_GENERATED_KEYS);
        ps.setInt(1, participation.getUserId());
        ps.setInt(2, participation.getEventId());
        ps.setString(3, participation.getStatus() != null ? participation.getStatus() : "confirmed");

        ps.executeUpdate();

        // Get generated ID
        ResultSet generatedKeys = ps.getGeneratedKeys();
        if (generatedKeys.next()) {
            participation.setId(generatedKeys.getInt(1));
        }

        // Create notification for admin
        createNotificationForAdmin(participation);
    }

    private void createNotificationForAdmin(Participation participation) throws SQLException {
        // Get event details
        Event event = eventService.getById(participation.getEventId());
        User user = userService.getById(participation.getUserId());

        String message = "Nouvelle participation de " + user.getFirstname() + " " + user.getLastname() +
                " à l'événement: " + event.getTitle();

        String req = "INSERT INTO notifications (user_id, message, type, related_id) VALUES (?, ?, ?, ?)";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, 1); // Admin ID (assuming admin has ID 1)
        ps.setString(2, message);
        ps.setString(3, "participation");
        ps.setInt(4, participation.getId());
        ps.executeUpdate();
    }

    @Override
    public void updateOne(Participation participation) throws SQLException {
        String req = "UPDATE participations SET status=? WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, participation.getStatus());
        ps.setInt(2, participation.getId());
        ps.executeUpdate();
    }

    @Override
    public void deletOne(Participation participation) throws SQLException {
        String req = "DELETE FROM participations WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, participation.getId());
        ps.executeUpdate();
    }

    @Override
    public List<Participation> selectAll() throws SQLException {
        List<Participation> participations = new ArrayList<>();
        String req = "SELECT * FROM participations ORDER BY participation_date DESC";
        Statement st = cnx.createStatement();
        ResultSet rs = st.executeQuery(req);

        while (rs.next()) {
            participations.add(mapResultSetToParticipation(rs));
        }
        return participations;
    }

    public List<Participation> getByEventId(int eventId) throws SQLException {
        List<Participation> participations = new ArrayList<>();
        String req = "SELECT * FROM participations WHERE event_id=? ORDER BY participation_date DESC";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, eventId);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            participations.add(mapResultSetToParticipation(rs));
        }
        return participations;
    }

    public List<Participation> getByUserId(int userId) throws SQLException {
        List<Participation> participations = new ArrayList<>();
        String req = "SELECT * FROM participations WHERE user_id=? ORDER BY participation_date DESC";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            participations.add(mapResultSetToParticipation(rs));
        }
        return participations;
    }

    public Participation getByUserAndEvent(int userId, int eventId) throws SQLException {
        String req = "SELECT * FROM participations WHERE user_id=? AND event_id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, userId);
        ps.setInt(2, eventId);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            return mapResultSetToParticipation(rs);
        }
        return null;
    }

    public int getParticipantsCount(int eventId) throws SQLException {
        String req = "SELECT COUNT(*) as count FROM participations WHERE event_id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, eventId);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            return rs.getInt("count");
        }
        return 0;
    }

    public List<Participation> getUserParticipationsWithDetails(int userId) throws SQLException {
        List<Participation> participations = new ArrayList<>();
        String req = "SELECT p.*, e.title as event_title, e.event_date, e.location " +
                "FROM participations p " +
                "JOIN events e ON p.event_id = e.id " +
                "WHERE p.user_id = ? " +
                "ORDER BY p.participation_date DESC";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            Participation p = mapResultSetToParticipation(rs);

            // Create and set event object with details
            Event event = new Event();
            event.setId(rs.getInt("event_id"));
            event.setTitle(rs.getString("event_title"));
            event.setEventDate(rs.getDate("event_date") != null ? rs.getDate("event_date").toLocalDate() : null);
            event.setLocation(rs.getString("location"));
            p.setEvent(event);

            participations.add(p);
        }
        return participations;
    }

    private Participation mapResultSetToParticipation(ResultSet rs) throws SQLException {
        Participation participation = new Participation();
        participation.setId(rs.getInt("id"));
        participation.setUserId(rs.getInt("user_id"));
        participation.setEventId(rs.getInt("event_id"));
        participation.setParticipationDate(rs.getTimestamp("participation_date"));
        participation.setStatus(rs.getString("status"));
        return participation;
    }
}
