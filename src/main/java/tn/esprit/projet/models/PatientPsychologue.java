package tn.esprit.projet.models;

import java.time.LocalDate;

public class PatientPsychologue {
    private int id;
    private int patientId;
    private int psychologueId;
    private LocalDate dateDebut;
    private LocalDate dateFin;
    private String statut;

    // Informations supplémentaires pour l'affichage
    private String patientNom;
    private String patientPrenom;
    private String patientEmail;
    private String psychologueNom;
    private String psychologuePrenom;

    // Constructeurs
    public PatientPsychologue() {}

    public PatientPsychologue(int patientId, int psychologueId) {
        this.patientId = patientId;
        this.psychologueId = psychologueId;
        this.dateDebut = LocalDate.now();
        this.statut = "actif";
    }

    // Getters et Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getPatientId() { return patientId; }
    public void setPatientId(int patientId) { this.patientId = patientId; }

    public int getPsychologueId() { return psychologueId; }
    public void setPsychologueId(int psychologueId) { this.psychologueId = psychologueId; }

    public LocalDate getDateDebut() { return dateDebut; }
    public void setDateDebut(LocalDate dateDebut) { this.dateDebut = dateDebut; }

    public LocalDate getDateFin() { return dateFin; }
    public void setDateFin(LocalDate dateFin) { this.dateFin = dateFin; }

    public String getStatut() { return statut; }
    public void setStatut(String statut) { this.statut = statut; }

    public String getPatientNom() { return patientNom; }
    public void setPatientNom(String patientNom) { this.patientNom = patientNom; }

    public String getPatientPrenom() { return patientPrenom; }
    public void setPatientPrenom(String patientPrenom) { this.patientPrenom = patientPrenom; }

    public String getPatientEmail() { return patientEmail; }
    public void setPatientEmail(String patientEmail) { this.patientEmail = patientEmail; }

    public String getPsychologueNom() { return psychologueNom; }
    public void setPsychologueNom(String psychologueNom) { this.psychologueNom = psychologueNom; }

    public String getPsychologuePrenom() { return psychologuePrenom; }
    public void setPsychologuePrenom(String psychologuePrenom) { this.psychologuePrenom = psychologuePrenom; }

    public String getPatientFullName() {
        return patientPrenom + " " + patientNom;
    }

    public String getPsychologueFullName() {
        return psychologuePrenom + " " + psychologueNom;
    }
}