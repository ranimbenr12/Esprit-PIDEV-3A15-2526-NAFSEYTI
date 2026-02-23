package tn.esprit.projet.view;

import tn.esprit.projet.models.Notification;
import tn.esprit.projet.models.Participation;
import tn.esprit.projet.models.User;
import tn.esprit.projet.models.Event;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class NotificationService {


    private Connection cnx;
    private UserService userService = new UserService();
    private EventService eventService = new EventService();

    public NotificationService() {
        cnx = MyBDConnexion.getInstance().getCnx();
    }

    // ========== ADMIN METHODS ==========

    public List<Notification> getUnreadNotificationsForAdmin() throws SQLException {
        List<Notification> notifications = new ArrayList<>();
        String req = "SELECT * FROM notifications WHERE user_id=1 AND is_read=FALSE ORDER BY created_at DESC";
        PreparedStatement ps = cnx.prepareStatement(req);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            notifications.add(mapResultSetToNotification(rs));
        }
        return notifications;
    }

    public int getUnreadCountForAdmin() throws SQLException {
        String req = "SELECT COUNT(*) as count FROM notifications WHERE user_id=1 AND is_read=FALSE";
        PreparedStatement ps = cnx.prepareStatement(req);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            return rs.getInt("count");
        }
        return 0;
    }

    public List<Notification> getAllNotificationsForAdmin() throws SQLException {
        List<Notification> notifications = new ArrayList<>();
        String req = "SELECT * FROM notifications WHERE user_id=1 ORDER BY created_at DESC";
        PreparedStatement ps = cnx.prepareStatement(req);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            notifications.add(mapResultSetToNotification(rs));
        }
        return notifications;
    }

    public void markAllAsRead() throws SQLException {
        String req = "UPDATE notifications SET is_read=TRUE WHERE user_id=1";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.executeUpdate();
    }

    // ========== PSYCHOLOGIST METHODS ==========

    public int getUnreadCountForPsychologue(int psychologueId) throws SQLException {
        String req = "SELECT COUNT(*) as count FROM notifications n " +
                "JOIN participations p ON n.related_id = p.id " +
                "JOIN events e ON p.event_id = e.id " +
                "WHERE e.creator_id = ? AND n.is_read = FALSE";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, psychologueId);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            return rs.getInt("count");
        }
        return 0;
    }

    public List<Notification> getNotificationsForPsychologue(int psychologueId) throws SQLException {
        List<Notification> notifications = new ArrayList<>();
        String req = "SELECT n.* FROM notifications n " +
                "JOIN participations p ON n.related_id = p.id " +
                "JOIN events e ON p.event_id = e.id " +
                "WHERE e.creator_id = ? ORDER BY n.created_at DESC";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, psychologueId);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            notifications.add(mapResultSetToNotification(rs));
        }
        return notifications;
    }

    public void markAllAsReadForPsychologue(int psychologueId) throws SQLException {
        String req = "UPDATE notifications n " +
                "JOIN participations p ON n.related_id = p.id " +
                "JOIN events e ON p.event_id = e.id " +
                "SET n.is_read = TRUE " +
                "WHERE e.creator_id = ? AND n.is_read = FALSE";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, psychologueId);
        ps.executeUpdate();
    }

    // ========== COMMON METHODS ==========

    public void markAsRead(int notificationId) throws SQLException {
        String req = "UPDATE notifications SET is_read=TRUE WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, notificationId);
        ps.executeUpdate();
    }

    public Notification getNotificationWithDetails(int notificationId) throws SQLException {
        String req = "SELECT n.*, " +
                "u.id as user_id, u.firstname, u.lastname, u.email, u.profile_photo, u.role as user_role, " +
                "p.id as participation_id, p.participation_date, p.status as participation_status, " +
                "e.id as event_id, e.title as event_title, e.event_date, e.location, e.link, e.max_participants, e.creator_id, " +
                "(SELECT COUNT(*) FROM participations WHERE event_id = e.id) as current_participants " +
                "FROM notifications n " +
                "JOIN participations p ON n.related_id = p.id " +
                "JOIN users u ON p.user_id = u.id " +
                "JOIN events e ON p.event_id = e.id " +
                "WHERE n.id = ?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, notificationId);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            Notification notification = mapResultSetToNotification(rs);

            // Create and set user
            User user = new User();
            user.setId(rs.getInt("user_id"));
            user.setFirstname(rs.getString("firstname"));
            user.setLastname(rs.getString("lastname"));
            user.setEmail(rs.getString("email"));
            user.setProfilePhoto(rs.getString("profile_photo"));
            user.setRole(rs.getString("user_role"));
            notification.setUser(user);

            // Create and set event
            Event event = new Event();
            event.setId(rs.getInt("event_id"));
            event.setTitle(rs.getString("event_title"));
            event.setEventDate(rs.getDate("event_date") != null ? rs.getDate("event_date").toLocalDate() : null);
            event.setLocation(rs.getString("location"));
            event.setLink(rs.getString("link"));
            event.setMaxParticipants(rs.getInt("max_participants"));
            event.setCurrentParticipants(rs.getInt("current_participants"));
            event.setCreator_id(rs.getInt("creator_id"));
            notification.setEvent(event);

            // Create and set participation
            Participation participation = new Participation();
            participation.setId(rs.getInt("participation_id"));
            participation.setUserId(rs.getInt("user_id"));
            participation.setEventId(rs.getInt("event_id"));
            participation.setParticipationDate(rs.getTimestamp("participation_date"));
            participation.setStatus(rs.getString("participation_status"));
            participation.setUser(user);
            participation.setEvent(event);
            notification.setParticipation(participation);

            return notification;
        }
        return null;
    }

    private Notification mapResultSetToNotification(ResultSet rs) throws SQLException {
        Notification notification = new Notification();
        notification.setId(rs.getInt("id"));
        notification.setUserId(rs.getInt("user_id"));
        notification.setMessage(rs.getString("message"));
        notification.setType(rs.getString("type"));
        notification.setRelatedId(rs.getInt("related_id"));
        notification.setRead(rs.getBoolean("is_read"));
        notification.setCreatedAt(rs.getTimestamp("created_at"));
        return notification;
    }
}