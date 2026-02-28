package tn.esprit.projet.models;

import java.sql.Date;

public class Reduction {
    // Le nom du champ doit correspondre à la colonne dans la base de données
    private int id_reduction;  // ← avec underscore comme dans la BD
    private String nom_marque;
    private String description;
    private int points_requis;
    private double pourcentage_reduction;
    private Date date_expiration;
    private String image_url;

    // Constructeurs
    public Reduction() {}

    public Reduction(String nom_marque, String description, int points_requis, double pourcentage_reduction) {
        this.nom_marque = nom_marque;
        this.description = description;
        this.points_requis = points_requis;
        this.pourcentage_reduction = pourcentage_reduction;
    }

    // Getters et Setters avec les noms de la base de données
    public int getId_reduction() {
        System.out.println("🔍 getId_reduction() = " + id_reduction);
        return id_reduction;
    }

    public void setId_reduction(int id_reduction) {
        System.out.println("🔍 setId_reduction(" + id_reduction + ")");
        this.id_reduction = id_reduction;
    }

    public String getNom_marque() {
        return nom_marque;
    }

    public void setNom_marque(String nom_marque) {
        this.nom_marque = nom_marque;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public int getPoints_requis() {
        return points_requis;
    }

    public void setPoints_requis(int points_requis) {
        this.points_requis = points_requis;
    }

    public double getPourcentage_reduction() {
        return pourcentage_reduction;
    }

    public void setPourcentage_reduction(double pourcentage_reduction) {
        this.pourcentage_reduction = pourcentage_reduction;
    }

    public Date getDate_expiration() {
        return date_expiration;
    }

    public void setDate_expiration(Date date_expiration) {
        this.date_expiration = date_expiration;
    }

    public String getImage_url() {
        return image_url;
    }

    public void setImage_url(String image_url) {
        this.image_url = image_url;
    }

    // Pour compatibilité avec ton code existant (getNomMarque, etc.)
    public int getIdReduction() {
        return id_reduction;
    }

    public void setIdReduction(int id_reduction) {
        this.id_reduction = id_reduction;
    }

    public String getNomMarque() {
        return nom_marque;
    }

    public void setNomMarque(String nom_marque) {
        this.nom_marque = nom_marque;
    }

    public int getPointsRequis() {
        return points_requis;
    }

    public void setPointsRequis(int points_requis) {
        this.points_requis = points_requis;
    }

    public double getPourcentageReduction() {
        return pourcentage_reduction;
    }

    public void setPourcentageReduction(double pourcentage_reduction) {
        this.pourcentage_reduction = pourcentage_reduction;
    }

    public Date getDateExpiration() {
        return date_expiration;
    }

    public void setDateExpiration(Date date_expiration) {
        this.date_expiration = date_expiration;
    }

    public String getImageUrl() {
        return image_url;
    }

    public void setImageUrl(String image_url) {
        this.image_url = image_url;
    }

    @Override
    public String toString() {
        return "Reduction{id=" + id_reduction + ", marque='" + nom_marque + "', points=" + points_requis + "}";
    }
}