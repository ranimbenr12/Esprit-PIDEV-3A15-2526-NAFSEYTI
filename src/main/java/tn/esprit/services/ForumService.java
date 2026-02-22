package tn.esprit.services;


import tn.esprit.models.Forum;
import tn.esprit.utils.MyDBConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ForumService implements CRUD <Forum> {

    Connection cnx;

    public ForumService() {
        cnx = MyDBConnexion.getInstance().getCnx();
    }

    // AJOUTER
    public void ajouter(Forum f) throws SQLException {
        String sql = "INSERT INTO Forum (nom_forum, description,statut) VALUES (?,?,?)";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setString(1, f.getNomForum());
        ps.setString(2, f.getDescription());
        ps.setString(3, f.getStatut());


        ps.executeUpdate();
    }

    // MODIFIER
    public void modifier(Forum f) throws SQLException {
        String sql = "UPDATE Forum SET nom_forum=?, description=?, statut=? WHERE id_forum=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setString(1, f.getNomForum());
        ps.setString(2, f.getDescription());
        ps.setString(4, f.getStatut());
        ps.setInt(5, f.getIdForum());
        ps.executeUpdate();
    }
    // SUPPRIMER
    public void supprimer(Forum f ) throws SQLException {
        String sql = "DELETE FROM Forum WHERE id_forum = ?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, f.getIdForum());
        ps.executeUpdate();
    }
    // AFFICHER
    public List<Forum> afficher() throws SQLException {
        List<Forum> list = new ArrayList<>();
        String sql = "SELECT * FROM Forum";
        Statement st = cnx.createStatement();
        ResultSet rs = st.executeQuery(sql);

        while (rs.next()) {
            Forum f = new Forum(
                    rs.getInt("id_forum"),
                    rs.getString("nom_forum"),
                    rs.getString("description"),
                    rs.getString("statut")
            );
            list.add(f);
        }
        return list;
    }



}
