package tn.esprit.services;

import tn.esprit.models.Commentaire;
import tn.esprit.utils.MyDBConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class CommentaireService {

    private Connection cnx;

    public CommentaireService() {
        cnx = MyDBConnexion.getInstance().getCnx();
    }

    // ================= AJOUTER UN COMMENTAIRE =================
    public void ajouter(Commentaire c) throws SQLException {
        String sql = "INSERT INTO commentaire(id_post, contenu, date_commentaire) VALUES (?, ?, ?)";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, c.getIdPost());
        ps.setString(2, c.getContenu());
        ps.setTimestamp(3, Timestamp.valueOf(c.getDateCreation()));
        ps.executeUpdate();
    }

    // ================= MODIFIER UN COMMENTAIRE =================
    public void modifier(Commentaire c) throws SQLException {
        String sql = "UPDATE commentaire SET contenu=? WHERE id_commentaire=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setString(1, c.getContenu());
        ps.setInt(2, c.getIdCommentaire());
        ps.executeUpdate();
    }

    // ================= SUPPRIMER UN COMMENTAIRE =================
    public void supprimer(int idCommentaire) throws SQLException {
        String sql = "DELETE FROM commentaire WHERE id_commentaire=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, idCommentaire);
        ps.executeUpdate();
    }

    // ================= AFFICHER LES COMMENTAIRES D’UN POST =================
    public List<Commentaire> getCommentairesByPost(int postId) throws SQLException {
        List<Commentaire> list = new ArrayList<>();
        String sql = "SELECT * FROM commentaire WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, postId);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            Commentaire c = new Commentaire();
            c.setIdCommentaire(rs.getInt("id_commentaire"));
            c.setIdPost(rs.getInt("id_post"));
            c.setContenu(rs.getString("contenu"));
            c.setDateCreation(rs.getTimestamp("date_commentaire").toLocalDateTime());
            list.add(c);
        }
        return list;
    }
}