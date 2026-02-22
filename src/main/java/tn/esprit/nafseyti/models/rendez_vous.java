package tn.esprit.nafseyti.models;
import java.time.LocalDate;
import java.time.LocalTime;
import java.util.Objects;

public class rendez_vous {

    private int id;
    private int userId;
    private int medecinId;
    private LocalDate dateRendezVous;
    private LocalTime heureDebut;
    private LocalTime heureFin;
    private String typeSeance;
    private String statut;

    public rendez_vous() {}

    public rendez_vous(int id, int userId, int medecinId, LocalDate dateRendezVous, LocalTime heureDebut, LocalTime heureFin, String typeSeance, String statut) {
        this.id = id;
        this.userId = userId;
        this.medecinId = medecinId;
        this.dateRendezVous = dateRendezVous;
        this.heureDebut = heureDebut;
        this.heureFin = heureFin;
        this.typeSeance = typeSeance;
        this.statut = statut;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getUserId() {
        return userId;
    }

    public void setUserId(int userId) {
        this.userId = userId;
    }

    public int getMedecinId() {
        return medecinId;
    }

    public void setMedecinId(int medecinId) {
        this.medecinId = medecinId;
    }

    public LocalDate getDateRendezVous() {
        return dateRendezVous;
    }

    public void setDateRendezVous(LocalDate dateRendezVous) {
        this.dateRendezVous = dateRendezVous;
    }

    public LocalTime getHeureDebut() {
        return heureDebut;
    }

    public void setHeureDebut(LocalTime heureDebut) {
        this.heureDebut = heureDebut;
    }

    public LocalTime getHeureFin() {
        return heureFin;
    }

    public void setHeureFin(LocalTime heureFin) {
        this.heureFin = heureFin;
    }

    public String getTypeSeance() {
        return typeSeance;
    }

    public void setTypeSeance(String typeSeance) {
        this.typeSeance = typeSeance;
    }

    public String getStatut() {
        return statut;
    }

    public void setStatut(String statut) {
        this.statut = statut;
    }

    @Override
    public String toString() {
        return "rendez_vous{" +
                "id=" + id +
                ", userId=" + userId +
                ", medecinId=" + medecinId +
                ", dateRendezVous=" + dateRendezVous +
                ", heureDebut=" + heureDebut +
                ", heureFin=" + heureFin +
                ", typeSeance='" + typeSeance + '\'' +
                ", statut='" + statut + '\'' +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof rendez_vous that)) return false;
        return id == that.id && userId == that.userId && medecinId == that.medecinId && Objects.equals(dateRendezVous, that.dateRendezVous) && Objects.equals(heureDebut, that.heureDebut) && Objects.equals(heureFin, that.heureFin) && Objects.equals(typeSeance, that.typeSeance) && Objects.equals(statut, that.statut);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, userId, medecinId, dateRendezVous, heureDebut, heureFin, typeSeance, statut);
    }
}
