package tn.esprit.models;


import java.time.LocalDateTime;
import java.util.Objects;

public class Article {

    private int idPost;
    private String titre;
    private String contenu;
    private LocalDateTime dateCreation;
    private int idTheme;
    private int likeCount;
    private String statut;

    public Article(String titre, String contenu) {
        this.titre = titre;
        this.contenu = contenu;
    }

    public Article(int idPost, String titre, String contenu, LocalDateTime dateCreation,
                   String statut) {
        this.idPost = idPost;
        this.titre = titre;
        this.contenu = contenu;
        this.dateCreation =  dateCreation;
        this.statut = statut;
    }

    public Article() {

    }


    // Getters & Setters

    public int  getIdPost() { return idPost; }
    public void setIdPost(int idPost) { this.idPost = idPost; }

    public String getTitre() { return titre; }
    public void setTitre(String titre) { this.titre = titre; }

    public String getContenu() { return contenu; }
    public void setContenu(String contenu) { this.contenu = contenu; }

    public LocalDateTime getDateCreation() { return dateCreation; }
    public void setDateCreation(LocalDateTime dateCreation) { this.dateCreation = dateCreation; }

    public int getIdTheme() { return idTheme; }
    public void setIdTheme(int idTheme) { this.idTheme = idTheme; }

    public int getLikeCount() { return likeCount; }
    public void setLikeCount(int likeCount) { this.likeCount = likeCount; }

    public String getStatut() { return statut; }
    public void setStatut(String statut) { this.statut = statut; }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof Article article)) return false;
        return idPost == article.idPost && idTheme == article.idTheme && likeCount == article.likeCount && Objects.equals(titre, article.titre) && Objects.equals(contenu, article.contenu) && Objects.equals(dateCreation, article.dateCreation) && Objects.equals(statut, article.statut);
    }

    @Override
    public int hashCode() {
        return Objects.hash(idPost, titre, contenu, dateCreation, idTheme, likeCount, statut);
    }

    @Override
    public String toString() {
        return "Article{" +
                "idPost=" + idPost +
                ", titre='" + titre + '\'' +
                ", contenu='" + contenu + '\'' +
                ", dateCreation=" + dateCreation +
                ", idTheme=" + idTheme +
                ", likeCount=" + likeCount +
                ", statut='" + statut + '\'' +
                '}';
    }


}
