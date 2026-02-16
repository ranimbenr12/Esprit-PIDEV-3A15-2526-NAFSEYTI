package tn.esprit.services;

import tn.esprit.models.Article;
import tn.esprit.utils.MyDBConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ArticleService implements CRUD<Article> {

    Connection cnx;


    public ArticleService() {
        cnx = MyDBConnexion.getInstance().getCnx();
    }

    // AJOUTER
    public void ajouter(Article a) throws SQLException {
        String sql = "INSERT INTO `post`(`titre`, `contenu`, `date_creation`, `statut`) VALUES (?,?,?,?)";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setString(1, a.getTitre());
        ps.setString(2, a.getContenu());
        ps.setObject(3, a.getDateCreation());
        ps.setString(4, a.getStatut());
        ps.executeUpdate();
    }

    // MODIFIER
    public void modifier(Article a) throws SQLException {
        String sql = "UPDATE `post` SET `titre`=?, `contenu`=?, `date_creation`=?, `statut`=? WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setString(1, a.getTitre());
        ps.setString(2, a.getContenu());
        ps.setTimestamp(3, Timestamp.valueOf(a.getDateCreation()));
        ps.setString(4, a.getStatut());
        ps.setInt(5, a.getIdPost());
        ps.executeUpdate();
    }

    // SUPPRIMER
    public void supprimer(Article a) throws SQLException {
        String sql = "DELETE FROM `post` WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, a.getIdPost());
        ps.executeUpdate();
    }

    // AFFICHER
    public List<Article> afficher() throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post";
        Statement st = cnx.createStatement();
        ResultSet rs = st.executeQuery(sql);

        while (rs.next()) {
            Article a = new Article();
            a.setIdPost(rs.getInt("id_post"));
            a.setTitre(rs.getString("titre"));
            a.setContenu(rs.getString("contenu"));
            a.setStatut(rs.getString("statut"));
            a.setDateCreation(rs.getTimestamp("date_creation").toLocalDateTime());
            a.setLikeCount(rs.getInt("like_count")); // si tu as cette colonne dans ta table

            list.add(a);
        }
        return list;
    }





}
