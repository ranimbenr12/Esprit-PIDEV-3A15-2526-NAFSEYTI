package tn.esprit.projet.view;

import tn.esprit.projet.models.Event;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class EventService implements CRUD<Event>{
    private Connection cnx ;

    public EventService(){
        cnx = MyBDConnexion.getInstance().getCnx();
    }


    public void insertOne(Event event) throws SQLException {
        String req="INSERT INTO `events`(`id`, `title`, `event_date`, `location`, `link`, `created_at`, `is_new`, `creator_id`) VALUES (?,?,?,?,?,?,?,?)";

        PreparedStatement ps = cnx.prepareStatement(req);

        ps.setInt(1,event.getId());
        ps.setString(2,event.getTitle());
        ps.setDate(3, Date.valueOf(event.getEventDate()));
        ps.setString(4,event.getLocation());
        ps.setString(5,event.getLink());
        ps.setTimestamp(6, Timestamp.valueOf(event.getCreatedAt())); // FIX
        ps.setBoolean(7,event.isNew());
        ps.setInt(8,event.getCreator_id());

        System.out.println(ps.executeUpdate()); // FIX
    }

    @Override
    public void updateOne(Event event) throws SQLException {
        String req="UPDATE `events` SET `title`=?,`event_date`=?,`location`=?,`link`=?,`created_at`=?,`is_new`=?,`creator_id`=? WHERE id =?";

        PreparedStatement ps = cnx.prepareStatement(req);

        ps.setString(1,event.getTitle());
        ps.setDate(2, Date.valueOf(event.getEventDate())); // FIX
        ps.setString(3,event.getLocation());
        ps.setString(4,event.getLink());
        ps.setTimestamp(5, Timestamp.valueOf(event.getCreatedAt())); // FIX
        ps.setBoolean(6,event.isNew());
        ps.setInt(7,event.getCreator_id());
        ps.setInt(8,event.getId());

        ps.executeUpdate(); // FIX
    }

    @Override
    public void deletOne(Event event) throws SQLException{
        String req="DELETE FROM `events` WHERE id =?";

        PreparedStatement ps = cnx.prepareStatement(req);

        ps.setInt(1,event.getId());
        ps.executeUpdate(); // FIX
    }

    @Override
    public List<Event> selectAll() throws SQLException{

        List<Event> events = new ArrayList<>();

        String req = "SELECT * FROM events";
        Statement st = cnx.createStatement();
        ResultSet rs= st.executeQuery(req);

        while (rs.next()){
            Event ev = new Event();
            ev.setId(rs.getInt(1));
            ev.setTitle(rs.getString(2));
            ev.setEventDate(rs.getDate(3).toLocalDate());
            ev.setLocation(rs.getString(4));
            ev.setLink(rs.getString(5));
            ev.setCreatedAt(rs.getTimestamp(6).toLocalDateTime());
            ev.setNew(rs.getBoolean(7));
            ev.setCreator_id(rs.getInt(8));
            events.add(ev);
        }

        return events; // FIX
    }
}
