package tn.esprit.projet.view;

import tn.esprit.projet.models.Event;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class EventService implements CRUD<Event> {
    private final Connection cnx;

    public EventService() {
        cnx = MyBDConnexion.getInstance().getCnx();
    }

    @Override
    public void insertOne(Event event) throws SQLException {
<<<<<<< HEAD
        String req = "INSERT INTO events(title, event_date, location, link, created_at, creator_id) VALUES (?, ?, ?, ?, ?, ?)";
=======
        String req = "INSERT INTO events(title, event_date, location, link, created_at, creator_id, max_participants) VALUES (?, ?, ?, ?, ?, ?, ?)";
>>>>>>> fd80a9a (final update)
        PreparedStatement ps = cnx.prepareStatement(req, Statement.RETURN_GENERATED_KEYS);
        ps.setString(1, event.getTitle());
        ps.setDate(2, event.getEventDate() != null ? Date.valueOf(event.getEventDate()) : null);
        ps.setString(3, event.getLocation());
        ps.setString(4, event.getLink());
        ps.setTimestamp(5, event.getCreatedAt() != null ? Timestamp.valueOf(event.getCreatedAt()) : null);
        ps.setInt(6, event.getCreator_id());
<<<<<<< HEAD
=======
        ps.setInt(7, event.getMaxParticipants());
>>>>>>> fd80a9a (final update)
        ps.executeUpdate();

        ResultSet rs = ps.getGeneratedKeys();
        if (rs.next()) event.setId(rs.getInt(1));
    }

    @Override
    public void updateOne(Event event) throws SQLException {
<<<<<<< HEAD
        String req = "UPDATE events SET title=?, event_date=?, location=?, link=?, created_at=?, creator_id=? WHERE id=?";
=======
        String req = "UPDATE events SET title=?, event_date=?, location=?, link=?, created_at=?, creator_id=?, max_participants=? WHERE id=?";
>>>>>>> fd80a9a (final update)
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, event.getTitle());
        ps.setDate(2, event.getEventDate() != null ? Date.valueOf(event.getEventDate()) : null);
        ps.setString(3, event.getLocation());
        ps.setString(4, event.getLink());
        ps.setTimestamp(5, event.getCreatedAt() != null ? Timestamp.valueOf(event.getCreatedAt()) : null);
        ps.setInt(6, event.getCreator_id());
<<<<<<< HEAD
        ps.setInt(7, event.getId());
=======
        ps.setInt(7, event.getMaxParticipants());
        ps.setInt(8, event.getId());
>>>>>>> fd80a9a (final update)
        ps.executeUpdate();
    }

    @Override
    public void deletOne(Event event) throws SQLException {
        String req = "DELETE FROM events WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, event.getId());
        ps.executeUpdate();
    }

    @Override
    public List<Event> selectAll() throws SQLException {
        List<Event> events = new ArrayList<>();
<<<<<<< HEAD
        String req = "SELECT * FROM events";
=======
        String req = "SELECT e.*, " +
                "(SELECT COUNT(*) FROM participations p WHERE p.event_id = e.id) as current_participants " +
                "FROM events e";
>>>>>>> fd80a9a (final update)
        Statement st = cnx.createStatement();
        ResultSet rs = st.executeQuery(req);

        while (rs.next()) {
            Event ev = new Event();
            ev.setId(rs.getInt("id"));
            ev.setTitle(rs.getString("title"));

            Date sqlDate = rs.getDate("event_date");
            if (sqlDate != null && !sqlDate.toString().equals("0000-00-00")) {
                ev.setEventDate(sqlDate.toLocalDate());
            }

            ev.setLocation(rs.getString("location"));
            ev.setLink(rs.getString("link"));

            Timestamp ts = rs.getTimestamp("created_at");
            if (ts != null && !ts.toString().startsWith("0000-00-00")) {
                ev.setCreatedAt(ts.toLocalDateTime());
            }

            ev.setCreator_id(rs.getInt("creator_id"));
<<<<<<< HEAD
=======
            ev.setMaxParticipants(rs.getInt("max_participants"));
            ev.setCurrentParticipants(rs.getInt("current_participants"));
>>>>>>> fd80a9a (final update)

            events.add(ev);
        }
        return events;
    }

    public Event getById(int id) throws SQLException {
        String req = "SELECT e.*, " +
                "(SELECT COUNT(*) FROM participations p WHERE p.event_id = e.id) as current_participants " +
                "FROM events e WHERE e.id = ?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setInt(1, id);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            Event ev = new Event();
            ev.setId(rs.getInt("id"));
            ev.setTitle(rs.getString("title"));

            Date sqlDate = rs.getDate("event_date");
            if (sqlDate != null && !sqlDate.toString().equals("0000-00-00")) {
                ev.setEventDate(sqlDate.toLocalDate());
            }

            ev.setLocation(rs.getString("location"));
            ev.setLink(rs.getString("link"));

            Timestamp ts = rs.getTimestamp("created_at");
            if (ts != null && !ts.toString().startsWith("0000-00-00")) {
                ev.setCreatedAt(ts.toLocalDateTime());
            }

            ev.setCreator_id(rs.getInt("creator_id"));
            ev.setMaxParticipants(rs.getInt("max_participants"));
            ev.setCurrentParticipants(rs.getInt("current_participants"));

            return ev;
        }
        return null;
    }
}