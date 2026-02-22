package tn.esprit.models;

import java.time.LocalDateTime;

public class Commentaire {
    private int idCommentaire;
    private int idPost;
    private String contenu;
    private LocalDateTime dateCreation;

    public Commentaire() {}

    public Commentaire(int idPost, String contenu) {
        this.idPost = idPost;
        this.contenu = contenu;
        this.dateCreation = LocalDateTime.now();
    }

    public int getIdCommentaire() { return idCommentaire; }
    public void setIdCommentaire(int idCommentaire) { this.idCommentaire = idCommentaire; }

    public int getIdPost() { return idPost; }
    public void setIdPost(int idPost) { this.idPost = idPost; }

    public String getContenu() { return contenu; }
    public void setContenu(String contenu) { this.contenu = contenu; }

    public LocalDateTime getDateCreation() { return dateCreation; }
    public void setDateCreation(LocalDateTime dateCreation) { this.dateCreation = dateCreation; }
}