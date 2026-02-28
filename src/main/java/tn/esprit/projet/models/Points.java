package tn.esprit.projet.models;

import java.sql.Timestamp;

public class Points {
    private int idPoint;
    private int idUtilisateur;
    private int idObjectif;
    private int nombrePoints;
    private Timestamp dateAttribution;

    // Constructeurs
    public Points() {}

    public Points(int idUtilisateur, int idObjectif, int nombrePoints) {
        this.idUtilisateur = idUtilisateur;
        this.idObjectif = idObjectif;
        this.nombrePoints = nombrePoints;
    }

    // Getters et Setters
    public int getIdPoint() { return idPoint; }
    public void setIdPoint(int idPoint) { this.idPoint = idPoint; }

    public int getIdUtilisateur() { return idUtilisateur; }
    public void setIdUtilisateur(int idUtilisateur) { this.idUtilisateur = idUtilisateur; }

    public int getIdObjectif() { return idObjectif; }
    public void setIdObjectif(int idObjectif) { this.idObjectif = idObjectif; }

    public int getNombrePoints() { return nombrePoints; }
    public void setNombrePoints(int nombrePoints) { this.nombrePoints = nombrePoints; }

    public Timestamp getDateAttribution() { return dateAttribution; }
    public void setDateAttribution(Timestamp dateAttribution) { this.dateAttribution = dateAttribution; }
}