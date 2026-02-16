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
        String req = "INSERT INTO events(title, event_date, location, link, created_at, creator_id) VALUES (?, ?, ?, ?, ?, ?)";
        PreparedStatement ps = cnx.prepareStatement(req, Statement.RETURN_GENERATED_KEYS);
        ps.setString(1, event.getTitle());
        ps.setDate(2, event.getEventDate() != null ? Date.valueOf(event.getEventDate()) : null);
        ps.setString(3, event.getLocation());
        ps.setString(4, event.getLink());
        ps.setTimestamp(5, event.getCreatedAt() != null ? Timestamp.valueOf(event.getCreatedAt()) : null);
        ps.setInt(6, event.getCreator_id());
        ps.executeUpdate();

        ResultSet rs = ps.getGeneratedKeys();
        if (rs.next()) event.setId(rs.getInt(1));
    }

    @Override
    public void updateOne(Event event) throws SQLException {
        String req = "UPDATE events SET title=?, event_date=?, location=?, link=?, created_at=?, creator_id=? WHERE id=?";
        PreparedStatement ps = cnx.prepareStatement(req);
        ps.setString(1, event.getTitle());
        ps.setDate(2, event.getEventDate() != null ? Date.valueOf(event.getEventDate()) : null);
        ps.setString(3, event.getLocation());
        ps.setString(4, event.getLink());
        ps.setTimestamp(5, event.getCreatedAt() != null ? Timestamp.valueOf(event.getCreatedAt()) : null);
        ps.setInt(6, event.getCreator_id());
        ps.setInt(7, event.getId());
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
        String req = "SELECT * FROM events";
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

            events.add(ev);
        }
        return events;
    }
}
