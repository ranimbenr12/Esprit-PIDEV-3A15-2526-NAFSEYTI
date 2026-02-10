package TestPsychologique.models;

import java.time.LocalDateTime;

/**
 * Classe représentant un test psychologique
 */
public class Test {

    // Attributs correspondant aux colonnes de la table 'tests'
    private int id;
    private String titre;
    private String description;
    private String categorie;
    private String niveau;
    private int duree;
    private int scoreMax;
    private int createdBy;
    private String status;
    private LocalDateTime createdAt;
    private LocalDateTime updatedAt;

    // ========== CONSTRUCTEURS ==========

    /**
     * Constructeur vide
     */
    public Test() {
        this.status = "brouillon";
        this.scoreMax = 0;
    }

    /**
     * Constructeur avec 7 paramètres (status par défaut = "brouillon")
     */
    public Test(String titre, String description, String categorie, String niveau,
                int duree, int scoreMax, int createdBy) {
        this.titre = titre;
        this.description = description;
        this.categorie = categorie;
        this.niveau = niveau;
        this.duree = duree;
        this.scoreMax = scoreMax;
        this.createdBy = createdBy;
        this.status = "brouillon";
    }

    /**
     * ✅ NOUVEAU : Constructeur avec 8 paramètres (incluant status)
     */
    public Test(String titre, String description, String categorie, String niveau,
                int duree, int scoreMax, int createdBy, String status) {
        this.titre = titre;
        this.description = description;
        this.categorie = categorie;
        this.niveau = niveau;
        this.duree = duree;
        this.scoreMax = scoreMax;
        this.createdBy = createdBy;
        this.status = status;
    }

    // ========== GETTERS et SETTERS ==========

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getCategorie() {
        return categorie;
    }

    public void setCategorie(String categorie) {
        this.categorie = categorie;
    }

    public String getNiveau() {
        return niveau;
    }

    public void setNiveau(String niveau) {
        this.niveau = niveau;
    }

    public int getDuree() {
        return duree;
    }

    public void setDuree(int duree) {
        this.duree = duree;
    }

    public int getScoreMax() {
        return scoreMax;
    }

    public void setScoreMax(int scoreMax) {
        this.scoreMax = scoreMax;
    }

    public int getCreatedBy() {
        return createdBy;
    }

    public void setCreatedBy(int createdBy) {
        this.createdBy = createdBy;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public LocalDateTime getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }

    public LocalDateTime getUpdatedAt() {
        return updatedAt;
    }

    public void setUpdatedAt(LocalDateTime updatedAt) {
        this.updatedAt = updatedAt;
    }

    /**
     * Méthode toString pour affichage amélioré
     */
    @Override
    public String toString() {
        return "Test{" +
                "id=" + id +
                ", titre='" + titre + '\'' +
                ", categorie='" + categorie + '\'' +
                ", niveau='" + niveau + '\'' +
                ", duree=" + duree + " min" +
                ", scoreMax=" + scoreMax +
                ", status='" + status + '\'' +
                '}';
    }
}