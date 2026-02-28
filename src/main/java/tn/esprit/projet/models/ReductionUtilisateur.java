package tn.esprit.projet.models;

import java.sql.Timestamp;

public class ReductionUtilisateur {
    private int id;
    private int idUtilisateur;
    private int idReduction;
    private Timestamp dateObtention;
    private boolean utilise;
    private String codePromo;

    // Informations supplémentaires
    private String nomMarque;
    private String description;
    private int pointsRequis;
    private double pourcentageReduction;

    // Getters et Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getIdUtilisateur() { return idUtilisateur; }
    public void setIdUtilisateur(int idUtilisateur) { this.idUtilisateur = idUtilisateur; }

    public int getIdReduction() { return idReduction; }
    public void setIdReduction(int idReduction) { this.idReduction = idReduction; }

    public Timestamp getDateObtention() { return dateObtention; }
    public void setDateObtention(Timestamp dateObtention) { this.dateObtention = dateObtention; }

    public boolean isUtilise() { return utilise; }
    public void setUtilise(boolean utilise) { this.utilise = utilise; }

    public String getCodePromo() { return codePromo; }
    public void setCodePromo(String codePromo) { this.codePromo = codePromo; }

    public String getNomMarque() { return nomMarque; }
    public void setNomMarque(String nomMarque) { this.nomMarque = nomMarque; }

    public String getDescription() { return description; }
    public void setDescription(String description) { this.description = description; }

    public int getPointsRequis() { return pointsRequis; }
    public void setPointsRequis(int pointsRequis) { this.pointsRequis = pointsRequis; }

    public double getPourcentageReduction() { return pourcentageReduction; }
    public void setPourcentageReduction(double pourcentageReduction) { this.pourcentageReduction = pourcentageReduction; }
}