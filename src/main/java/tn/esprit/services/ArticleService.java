package tn.esprit.services;

import tn.esprit.models.Article;
import tn.esprit.models.Commentaire;
import tn.esprit.utils.MyDBConnexion;

import java.sql.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class ArticleService implements CRUD<Article> {

    private Connection cnx;

    public ArticleService() {
        cnx = MyDBConnexion.getInstance().getCnx();
    }

    // ================= AJOUTER UN ARTICLE =================
    @Override
    public void ajouter(Article a) throws SQLException {
        if (a.getDateCreation() == null) {
            a.setDateCreation(LocalDateTime.now());
        }

        // Vérifier que le forum existe
        String checkForum = "SELECT COUNT(*) FROM forum WHERE id_forum=?";
        try (PreparedStatement psCheck = cnx.prepareStatement(checkForum)) {
            psCheck.setInt(1, a.getForumId());
            try (ResultSet rs = psCheck.executeQuery()) {
                if (rs.next() && rs.getInt(1) == 0) {
                    // Créer un forum par défaut si inexistant
                    String sqlForum = "INSERT INTO forum(nom_forum) VALUES(?)";
                    try (PreparedStatement psForum = cnx.prepareStatement(sqlForum, Statement.RETURN_GENERATED_KEYS)) {
                        psForum.setString(1, "Général");
                        psForum.executeUpdate();
                        try (ResultSet keys = psForum.getGeneratedKeys()) {
                            if (keys.next()) {
                                a.setForumId(keys.getInt(1));
                            }
                        }
                    }
                }
            }
        }

        // Insertion de l'article avec les champs like_count et dislike_count
        String sql = "INSERT INTO post(titre, contenu, date_creation, statut, forum_id, like_count, dislike_count) VALUES (?,?,?,?,?,?,?)";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, a.getTitre());
            ps.setString(2, a.getContenu());
            ps.setTimestamp(3, Timestamp.valueOf(a.getDateCreation()));
            ps.setString(4, a.getStatut());
            ps.setInt(5, a.getForumId());
            ps.setInt(6, a.getLikeCount());
            ps.setInt(7, a.getDislikeCount());
            ps.executeUpdate();
        }
    }

    // ================= MODIFIER UN ARTICLE =================
    @Override
    public void modifier(Article a) throws SQLException {
        if (a.getDateCreation() == null) {
            a.setDateCreation(LocalDateTime.now());
        }

        // Note: On ne modifie pas les compteurs de likes/dislikes ici
        String sql = "UPDATE post SET titre=?, contenu=?, date_creation=?, statut=?, forum_id=? WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, a.getTitre());
            ps.setString(2, a.getContenu());
            ps.setTimestamp(3, Timestamp.valueOf(a.getDateCreation()));
            ps.setString(4, a.getStatut());
            ps.setInt(5, a.getForumId());
            ps.setInt(6, a.getIdPost());
            ps.executeUpdate();
        }
    }

    // ================= SUPPRIMER UN ARTICLE =================
    @Override
    public void supprimer(Article a) throws SQLException {
        // D'abord supprimer les commentaires liés
        String deleteComments = "DELETE FROM commentaire WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(deleteComments)) {
            ps.setInt(1, a.getIdPost());
            ps.executeUpdate();
        }

        // Puis supprimer l'article
        String sql = "DELETE FROM post WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, a.getIdPost());
            ps.executeUpdate();
        }
    }

    // ================= AFFICHER TOUS LES ARTICLES =================
    @Override
    public List<Article> afficher() throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post ORDER BY date_creation DESC";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {

            while (rs.next()) {
                Article a = extractArticleFromResultSet(rs);
                list.add(a);
            }
        }
        return list;
    }

    // ================= AFFICHER LES ARTICLES D'UN FORUM =================
    public List<Article> getArticlesByForum(int forumId) throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post WHERE forum_id=? ORDER BY date_creation DESC";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, forumId);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Article a = extractArticleFromResultSet(rs);
                    list.add(a);
                }
            }
        }
        return list;
    }

    // ================= RÉCUPÉRER UN ARTICLE PAR ID =================
    public Article getArticleById(int id) throws SQLException {
        String sql = "SELECT * FROM post WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    return extractArticleFromResultSet(rs);
                }
            }
        }
        return null;
    }

    // ================= RÉCUPÉRER LES ARTICLES LES PLUS POPULAIRES =================
    public List<Article> getArticlesLesPlusPopulaires(int limite) throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT *, (like_count - dislike_count) as score FROM post ORDER BY score DESC LIMIT ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, limite);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Article a = extractArticleFromResultSet(rs);
                    list.add(a);
                }
            }
        }
        return list;
    }

    // ================= GESTION DES LIKES =================
    public void ajouterLike(int postId) throws SQLException {
        String sql = "UPDATE post SET like_count = like_count + 1 WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, postId);
            ps.executeUpdate();
        }
    }

    public void retirerLike(int postId) throws SQLException {
        String sql = "UPDATE post SET like_count = like_count - 1 WHERE id_post=? AND like_count > 0";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, postId);
            ps.executeUpdate();
        }
    }

    // ================= GESTION DES DISLIKES =================
    public void ajouterDislike(int postId) throws SQLException {
        String sql = "UPDATE post SET dislike_count = dislike_count + 1 WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, postId);
            ps.executeUpdate();
        }
    }

    public void retirerDislike(int postId) throws SQLException {
        String sql = "UPDATE post SET dislike_count = dislike_count - 1 WHERE id_post=? AND dislike_count > 0";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, postId);
            ps.executeUpdate();
        }
    }

    // ================= GESTION DES COMMENTAIRES =================
    public List<Commentaire> getCommentairesByPost(int postId) throws SQLException {
        List<Commentaire> commentaires = new ArrayList<>();
        String sql = "SELECT * FROM commentaire WHERE id_post=? ORDER BY date_creation DESC";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, postId);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Commentaire c = new Commentaire();
                    c.setIdCommentaire(rs.getInt("id_commentaire"));
                    c.setIdPost(rs.getInt("id_post"));
                    c.setContenu(rs.getString("contenu"));
                    c.setDateCreation(rs.getTimestamp("date_creation").toLocalDateTime());
                    commentaires.add(c);
                }
            }
        }
        return commentaires;
    }

    public void ajouterCommentaire(Commentaire c) throws SQLException {
        if (c.getDateCreation() == null) {
            c.setDateCreation(LocalDateTime.now());
        }
        String sql = "INSERT INTO commentaire(id_post, contenu, date_creation) VALUES(?,?,?)";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, c.getIdPost());
            ps.setString(2, c.getContenu());
            ps.setTimestamp(3, Timestamp.valueOf(c.getDateCreation()));
            ps.executeUpdate();
        }
    }

    public void supprimerCommentaire(int commentaireId) throws SQLException {
        String sql = "DELETE FROM commentaire WHERE id_commentaire=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, commentaireId);
            ps.executeUpdate();
        }
    }

    // ================= MÉTHODES UTILITAIRES =================
    private Article extractArticleFromResultSet(ResultSet rs) throws SQLException {
        Article a = new Article();
        a.setIdPost(rs.getInt("id_post"));
        a.setTitre(rs.getString("titre"));
        a.setContenu(rs.getString("contenu"));
        a.setStatut(rs.getString("statut"));

        Timestamp timestamp = rs.getTimestamp("date_creation");
        if (timestamp != null) {
            a.setDateCreation(timestamp.toLocalDateTime());
        }

        a.setForumId(rs.getInt("forum_id"));
        a.setLikeCount(rs.getInt("like_count"));

        // Gérer le cas où dislike_count n'existe pas encore dans la base
        try {
            a.setDislikeCount(rs.getInt("dislike_count"));
        } catch (SQLException e) {
            a.setDislikeCount(0); // Valeur par défaut si la colonne n'existe pas
        }

        return a;
    }

    public int getArticleScore(int postId) throws SQLException {
        String sql = "SELECT (like_count - dislike_count) as score FROM post WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, postId);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    return rs.getInt("score");
                }
            }
        }
        return 0;
    }

    // ================= STATISTIQUES =================
    public int getNombreTotalArticles() throws SQLException {
        String sql = "SELECT COUNT(*) FROM post";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            if (rs.next()) {
                return rs.getInt(1);
            }
        }
        return 0;
    }

    public int getNombreTotalLikes() throws SQLException {
        String sql = "SELECT SUM(like_count) FROM post";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            if (rs.next()) {
                return rs.getInt(1);
            }
        }
        return 0;
    }

    public int getNombreTotalDislikes() throws SQLException {
        String sql = "SELECT SUM(dislike_count) FROM post";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            if (rs.next()) {
                return rs.getInt(1);
            }
        }
        return 0;
    }
}