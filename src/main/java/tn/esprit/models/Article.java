package tn.esprit.models;

import java.time.LocalDateTime;
import java.util.Objects;

public class Article {

    private int idPost;
    private String titre;
    private String contenu;
    private LocalDateTime dateCreation;
    private int forumId;
    private int likeCount;
    private int dislikeCount;
    private String statut;
    private String theme;  // Nouveau champ pour le thème

    // Constructeurs
    public Article() {
        this.likeCount = 0;
        this.dislikeCount = 0;
        this.theme = "Général"; // Valeur par défaut
    }

    public Article(String titre, String contenu) {
        this.titre = titre;
        this.contenu = contenu;
        this.likeCount = 0;
        this.dislikeCount = 0;
        this.theme = "Général";
    }

    public Article(String titre, String contenu, String theme) {
        this.titre = titre;
        this.contenu = contenu;
        this.theme = theme;
        this.likeCount = 0;
        this.dislikeCount = 0;
    }

    public Article(int idPost, String titre, String contenu, LocalDateTime dateCreation,
                   int likeCount, int dislikeCount, String statut, int forumId, String theme) {
        this.idPost = idPost;
        this.titre = titre;
        this.contenu = contenu;
        this.dateCreation = dateCreation;
        this.statut = statut;
        this.likeCount = likeCount;
        this.dislikeCount = dislikeCount;
        this.forumId = forumId;
        this.theme = theme;
    }

    // Getters & Setters
    public int getIdPost() { return idPost; }
    public void setIdPost(int idPost) { this.idPost = idPost; }

    public String getTitre() { return titre; }
    public void setTitre(String titre) { this.titre = titre; }

    public String getContenu() { return contenu; }
    public void setContenu(String contenu) { this.contenu = contenu; }

    public LocalDateTime getDateCreation() { return dateCreation; }
    public void setDateCreation(LocalDateTime dateCreation) { this.dateCreation = dateCreation; }

    public int getLikeCount() { return likeCount; }
    public void setLikeCount(int likeCount) { this.likeCount = likeCount; }

    public int getDislikeCount() { return dislikeCount; }
    public void setDislikeCount(int dislikeCount) { this.dislikeCount = dislikeCount; }

    public String getStatut() { return statut; }
    public void setStatut(String statut) { this.statut = statut; }

    public int getForumId() { return forumId; }
    public void setForumId(int forumId) { this.forumId = forumId; }

    public String getTheme() { return theme; }
    public void setTheme(String theme) { this.theme = theme; }

    // Méthodes utilitaires pour les votes
    public void incrementLike() {
        this.likeCount++;
    }

    public void decrementLike() {
        if (this.likeCount > 0) {
            this.likeCount--;
        }
    }

    public void incrementDislike() {
        this.dislikeCount++;
    }

    public void decrementDislike() {
        if (this.dislikeCount > 0) {
            this.dislikeCount--;
        }
    }

    // Méthode pour obtenir le score total (likes - dislikes)
    public int getScore() {
        return this.likeCount - this.dislikeCount;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (!(o instanceof Article)) return false;
        Article article = (Article) o;
        return idPost == article.idPost &&
                forumId == article.forumId &&
                likeCount == article.likeCount &&
                dislikeCount == article.dislikeCount &&
                Objects.equals(titre, article.titre) &&
                Objects.equals(contenu, article.contenu) &&
                Objects.equals(dateCreation, article.dateCreation) &&
                Objects.equals(statut, article.statut) &&
                Objects.equals(theme, article.theme);
    }

    @Override
    public int hashCode() {
        return Objects.hash(idPost, titre, contenu, dateCreation, forumId, likeCount, dislikeCount, statut, theme);
    }

    @Override
    public String toString() {
        return "Article{" +
                "idPost=" + idPost +
                ", titre='" + titre + '\'' +
                ", contenu='" + contenu + '\'' +
                ", theme='" + theme + '\'' +
                ", statut='" + statut + '\'' +
                ", dateCreation=" + dateCreation +
                ", forumId=" + forumId +
                ", likeCount=" + likeCount +
                ", dislikeCount=" + dislikeCount +
                ", score=" + getScore() +
                '}';
    }
}