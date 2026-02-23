package tn.esprit.services;

import tn.esprit.models.Article;
import tn.esprit.models.Commentaire;
import tn.esprit.utils.MyDBConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ArticleService implements CRUD<Article> {

    private Connection cnx;

    public ArticleService() {
        cnx = MyDBConnexion.getInstance().getCnx();
    }

    // ================= AJOUTER UN ARTICLE =================
    public void ajouter(Article a) throws SQLException {
        if(a.getDateCreation() == null){
            a.setDateCreation(java.time.LocalDateTime.now()); // éviter NullPointerException
        }

        // Vérifier que le forum existe
        String checkForum = "SELECT COUNT(*) FROM forum WHERE id_forum=?";
        PreparedStatement psCheck = cnx.prepareStatement(checkForum);
        psCheck.setInt(1, a.getForumId());
        ResultSet rs = psCheck.executeQuery();
        if(rs.next() && rs.getInt(1) == 0){
            // créer forum par défaut si inexistant
            String sqlForum = "INSERT INTO forum(nom_forum) VALUES(?)";
            PreparedStatement psForum = cnx.prepareStatement(sqlForum, Statement.RETURN_GENERATED_KEYS);
            psForum.setString(1, "Général");
            psForum.executeUpdate();
            ResultSet keys = psForum.getGeneratedKeys();
            if(keys.next()){
                a.setForumId(keys.getInt(1));
            }
        }

        // Insertion de l'article
        String sql = "INSERT INTO post(titre, contenu, date_creation, statut, forum_id, like_count) VALUES (?,?,?,?,?,?)";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setString(1, a.getTitre());
        ps.setString(2, a.getContenu());
        ps.setTimestamp(3, Timestamp.valueOf(a.getDateCreation()));
        ps.setString(4, a.getStatut());
        ps.setInt(5, a.getForumId());
        ps.setInt(6, a.getLikeCount());
        ps.executeUpdate();
    }

    // ================= MODIFIER UN ARTICLE =================
    public void modifier(Article a) throws SQLException {
        if(a.getDateCreation() == null){
            a.setDateCreation(java.time.LocalDateTime.now());
        }
        String sql = "UPDATE post SET titre=?, contenu=?, date_creation=?, statut=?, forum_id=?, like_count=? WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setString(1, a.getTitre());
        ps.setString(2, a.getContenu());
        ps.setTimestamp(3, Timestamp.valueOf(a.getDateCreation()));
        ps.setString(4, a.getStatut());
        ps.setInt(5, a.getForumId());
        ps.setInt(6, a.getLikeCount());
        ps.setInt(7, a.getIdPost());
        ps.executeUpdate();
    }

    // ================= SUPPRIMER UN ARTICLE =================
    public void supprimer(Article a) throws SQLException {
        String sql = "DELETE FROM post WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, a.getIdPost());
        ps.executeUpdate();
    }

    // ================= AFFICHER TOUS LES ARTICLES =================
    public List<Article> afficher() throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post";
        Statement st = cnx.createStatement();
        ResultSet rs = st.executeQuery(sql);

        while(rs.next()){
            Article a = new Article();
            a.setIdPost(rs.getInt("id_post"));
            a.setTitre(rs.getString("titre"));
            a.setContenu(rs.getString("contenu"));
            a.setStatut(rs.getString("statut"));
            a.setDateCreation(rs.getTimestamp("date_creation").toLocalDateTime());
            a.setForumId(rs.getInt("forum_id"));
            a.setLikeCount(rs.getInt("like_count"));
            list.add(a);
        }
        return list;
    }

    // ================= AFFICHER LES ARTICLES D’UN FORUM =================
    public List<Article> getArticlesByForum(int forumId) throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post WHERE forum_id=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, forumId);
        ResultSet rs = ps.executeQuery();

        while(rs.next()){
            Article a = new Article();
            a.setIdPost(rs.getInt("id_post"));
            a.setTitre(rs.getString("titre"));
            a.setContenu(rs.getString("contenu"));
            a.setStatut(rs.getString("statut"));
            a.setDateCreation(rs.getTimestamp("date_creation").toLocalDateTime());
            a.setForumId(rs.getInt("forum_id"));
            a.setLikeCount(rs.getInt("like_count"));
            list.add(a);
        }
        return list;
    }

    // ================= RÉCUPÉRER LES COMMENTAIRES D’UN ARTICLE =================
    public List<Commentaire> getCommentairesByPost(int postId) throws SQLException {
        List<Commentaire> commentaires = new ArrayList<>();
        String sql = "SELECT * FROM commentaire WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, postId);
        ResultSet rs = ps.executeQuery();

        while(rs.next()){
            Commentaire c = new Commentaire();
            c.setIdCommentaire(rs.getInt("id_commentaire"));
            c.setIdPost(rs.getInt("id_post"));
            c.setContenu(rs.getString("contenu"));
            c.setDateCreation(rs.getTimestamp("date_creation").toLocalDateTime());
            commentaires.add(c);
        }
        return commentaires;
    }

    // ================= AJOUTER UN COMMENTAIRE =================
    public void ajouterCommentaire(Commentaire c) throws SQLException {
        if(c.getDateCreation() == null){
            c.setDateCreation(java.time.LocalDateTime.now());
        }
        String sql = "INSERT INTO commentaire(id_post, contenu, date_creation) VALUES(?,?,?)";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, c.getIdPost());
        ps.setString(2, c.getContenu());
        ps.setTimestamp(3, Timestamp.valueOf(c.getDateCreation()));
        ps.executeUpdate();
    }

    // ================= AJOUTER / RETIRER UN LIKE =================
    public void ajouterLike(int postId) throws SQLException {
        String sql = "UPDATE post SET like_count = like_count + 1 WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, postId);
        ps.executeUpdate();
    }

    public void retirerLike(int idPost) throws SQLException {
        String sql = "UPDATE post SET like_count = like_count - 1 WHERE id_post=?";
        PreparedStatement ps = cnx.prepareStatement(sql);
        ps.setInt(1, idPost);
        ps.executeUpdate();
    }
}