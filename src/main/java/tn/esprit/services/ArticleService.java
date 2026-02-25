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
        if (a.getTheme() == null || a.getTheme().isEmpty()) {
            a.setTheme("Général");
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

        String sql = "INSERT INTO post(titre, contenu, date_creation, statut, forum_id, like_count, dislike_count, theme) VALUES (?,?,?,?,?,?,?,?)";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, a.getTitre());
            ps.setString(2, a.getContenu());
            ps.setTimestamp(3, Timestamp.valueOf(a.getDateCreation()));
            ps.setString(4, a.getStatut());
            ps.setInt(5, a.getForumId());
            ps.setInt(6, a.getLikeCount());
            ps.setInt(7, a.getDislikeCount());
            ps.setString(8, a.getTheme());
            ps.executeUpdate();
        }
    }

    // ================= MODIFIER UN ARTICLE =================
    @Override
    public void modifier(Article a) throws SQLException {
        if (a.getDateCreation() == null) {
            a.setDateCreation(LocalDateTime.now());
        }

        String sql = "UPDATE post SET titre=?, contenu=?, date_creation=?, statut=?, forum_id=?, theme=? WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, a.getTitre());
            ps.setString(2, a.getContenu());
            ps.setTimestamp(3, Timestamp.valueOf(a.getDateCreation()));
            ps.setString(4, a.getStatut());
            ps.setInt(5, a.getForumId());
            ps.setString(6, a.getTheme());
            ps.setInt(7, a.getIdPost());
            ps.executeUpdate();
        }
    }

    // ================= SUPPRIMER UN ARTICLE =================
    @Override
    public void supprimer(Article a) throws SQLException {
        String deleteComments = "DELETE FROM commentaire WHERE id_post=?";
        try (PreparedStatement ps = cnx.prepareStatement(deleteComments)) {
            ps.setInt(1, a.getIdPost());
            ps.executeUpdate();
        }

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

    // ================= RECHERCHE PAR THÈME =================
    public List<Article> rechercherParTheme(String theme) throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post WHERE LOWER(theme) LIKE LOWER(?) ORDER BY date_creation DESC";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, "%" + theme + "%");
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Article a = extractArticleFromResultSet(rs);
                    list.add(a);
                }
            }
        }
        return list;
    }

    // ================= RECHERCHE PAR THÈME ET FORUM =================
    public List<Article> rechercherParThemeEtForum(String theme, int forumId) throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post WHERE LOWER(theme) LIKE LOWER(?) AND forum_id=? ORDER BY date_creation DESC";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, "%" + theme + "%");
            ps.setInt(2, forumId);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Article a = extractArticleFromResultSet(rs);
                    list.add(a);
                }
            }
        }
        return list;
    }

    // ================= RECHERCHE AVANCÉE (CORRIGÉE - 4 PARAMÈTRES) =================
    public List<Article> rechercherAvancee(String motCle, String theme, String statut, int forumId) throws SQLException {
        List<Article> list = new ArrayList<>();
        StringBuilder sql = new StringBuilder("SELECT * FROM post WHERE forum_id=?");
        List<Object> params = new ArrayList<>();
        params.add(forumId);

        if (motCle != null && !motCle.isEmpty()) {
            sql.append(" AND (LOWER(titre) LIKE LOWER(?) OR LOWER(contenu) LIKE LOWER(?))");
            params.add("%" + motCle + "%");
            params.add("%" + motCle + "%");
        }

        if (theme != null && !theme.isEmpty() && !"Tous les thèmes".equals(theme)) {
            sql.append(" AND LOWER(theme) LIKE LOWER(?)");
            params.add("%" + theme + "%");
        }

        if (statut != null && !statut.isEmpty() && !"Tous".equals(statut)) {
            sql.append(" AND statut = ?");
            params.add(statut);
        }

        sql.append(" ORDER BY date_creation DESC");

        try (PreparedStatement ps = cnx.prepareStatement(sql.toString())) {
            for (int i = 0; i < params.size(); i++) {
                ps.setObject(i + 1, params.get(i));
            }

            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Article a = extractArticleFromResultSet(rs);
                    list.add(a);
                }
            }
        }
        return list;
    }

    // ================= RECHERCHE PAR MOT CLÉ =================
    public List<Article> rechercherParMotCle(String motCle) throws SQLException {
        List<Article> list = new ArrayList<>();
        String sql = "SELECT * FROM post WHERE LOWER(titre) LIKE LOWER(?) OR LOWER(contenu) LIKE LOWER(?) ORDER BY date_creation DESC";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            String searchPattern = "%" + motCle + "%";
            ps.setString(1, searchPattern);
            ps.setString(2, searchPattern);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Article a = extractArticleFromResultSet(rs);
                    list.add(a);
                }
            }
        }
        return list;
    }

    // ================= RÉCUPÉRER LES THÈMES UNIQUES =================
    public List<String> getThemesUniques() throws SQLException {
        List<String> themes = new ArrayList<>();
        String sql = "SELECT DISTINCT theme FROM post WHERE theme IS NOT NULL ORDER BY theme";
        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) {
                themes.add(rs.getString("theme"));
            }
        }
        return themes;
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

    // ================= MÉTHODE UTILITAIRE =================
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

        try {
            a.setDislikeCount(rs.getInt("dislike_count"));
        } catch (SQLException e) {
            a.setDislikeCount(0);
        }

        try {
            a.setTheme(rs.getString("theme"));
        } catch (SQLException e) {
            a.setTheme("Général");
        }

        return a;
    }
}