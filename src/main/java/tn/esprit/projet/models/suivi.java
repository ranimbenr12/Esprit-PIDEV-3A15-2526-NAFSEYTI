package tn.esprit.projet.models;

import java.time.LocalDateTime;

public class suivi {
    private int idsuivi;
    private int idutilisateur;
    private int idpsychologue;
    private String titre;
    private String description;
    private LocalDateTime datecreation;
    private LocalDateTime datemodification;
    private String statut; // "actif", "termine", "suspendu"

    // constructeur vide
    public suivi() {
    }

    // constructeur complet
    public suivi(int idsuivi, int idutilisateur, int idpsychologue, String titre,
                 String description, LocalDateTime datecreation, LocalDateTime datemodification,
                 String statut) {
        this.idsuivi = idsuivi;
        this.idutilisateur = idutilisateur;
        this.idpsychologue = idpsychologue;
        this.titre = titre;
        this.description = description;
        this.datecreation = datecreation;
        this.datemodification = datemodification;
        this.statut = statut;
    }

    // constructeur sans id (pour création)
    public suivi(int idutilisateur, int idpsychologue, String titre, String description, String statut) {
        this.idutilisateur = idutilisateur;
        this.idpsychologue = idpsychologue;
        this.titre = titre;
        this.description = description;
        this.statut = statut;
    }

    // getters et setters
    public int getidsuivi() {
        return idsuivi;
    }

    public void setidsuivi(int idsuivi) {
        this.idsuivi = idsuivi;
    }

    public int getidutilisateur() {
        return idutilisateur;
    }

    public void setidutilisateur(int idutilisateur) {
        this.idutilisateur = idutilisateur;
    }

    public int getidpsychologue() {
        return idpsychologue;
    }

    public void setidpsychologue(int idpsychologue) {
        this.idpsychologue = idpsychologue;
    }

    public String gettitre() {
        return titre;
    }

    public void settitre(String titre) {
        this.titre = titre;
    }

    public String getdescription() {
        return description;
    }

    public void setdescription(String description) {
        this.description = description;
    }

    public LocalDateTime getdatecreation() {
        return datecreation;
    }

    public void setdatecreation(LocalDateTime datecreation) {
        this.datecreation = datecreation;
    }

    public LocalDateTime getdatemodification() {
        return datemodification;
    }

    public void setdatemodification(LocalDateTime datemodification) {
        this.datemodification = datemodification;
    }

    public String getstatut() {
        return statut;
    }

    public void setstatut(String statut) {
        this.statut = statut;
    }

    @Override
    public String toString() {
        return "suivi{" +
                "idsuivi=" + idsuivi +
                ", idutilisateur=" + idutilisateur +
                ", idpsychologue=" + idpsychologue +
                ", titre='" + titre + '\'' +
                ", description='" + description + '\'' +
                ", datecreation=" + datecreation +
                ", datemodification=" + datemodification +
                ", statut='" + statut + '\'' +
                '}';
    }
}