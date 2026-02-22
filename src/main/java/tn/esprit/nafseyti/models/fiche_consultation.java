package tn.esprit.nafseyti.models;

import java.time.LocalDateTime;
import java.util.Objects;

public class fiche_consultation {
    private int id;
    private int rendezVousId;

    private String notes;
    private String problemePrincipal;
    private String diagnostic;
    private String recommandations;
    private String traitement;
    private int duree;
    private LocalDateTime createdAt;

    public fiche_consultation() {}

    public fiche_consultation(int id, int rendezVousId, String notes, String problemePrincipal, String diagnostic, String recommandations, String traitement, LocalDateTime createdAt) {
        this.id = id;
        this.rendezVousId = rendezVousId;
        this.notes = notes;
        this.problemePrincipal = problemePrincipal;
        this.diagnostic = diagnostic;
        this.recommandations = recommandations;
        this.traitement = traitement;
        this.createdAt = createdAt;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getRendezVousId() {
        return rendezVousId;
    }

    public void setRendezVousId(int rendezVousId) {
        this.rendezVousId = rendezVousId;
    }

    public String getNotes() {
        return notes;
    }

    public void setNotes(String notes) {
        this.notes = notes;
    }

    public String getProblemePrincipal() {
        return problemePrincipal;
    }

    public void setProblemePrincipal(String problemePrincipal) {
        this.problemePrincipal = problemePrincipal;
    }

    public String getDiagnostic() {
        return diagnostic;
    }

    public void setDiagnostic(String diagnostic) {
        this.diagnostic = diagnostic;
    }

    public String getRecommandations() {
        return recommandations;
    }

    public void setRecommandations(String recommandations) {
        this.recommandations = recommandations;
    }

    public String getTraitement() {
        return traitement;
    }

    public void setTraitement(String traitement) {
        this.traitement = traitement;
    }

    public int getDuree() {
        return duree;
    }

    public void setDuree(int duree) {
        this.duree = duree;
    }

    public LocalDateTime getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }

    @Override
    public String toString() {
        return "fiche_consultation{" +
                "id=" + id +
                ", rendezVousId=" + rendezVousId +
                ", notes='" + notes + '\'' +
                ", problemePrincipal='" + problemePrincipal + '\'' +
                ", diagnostic='" + diagnostic + '\'' +
                ", recommandations='" + recommandations + '\'' +
                ", traitement='" + traitement + '\'' +
                ", duree=" + duree +
                ", createdAt=" + createdAt +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof fiche_consultation that)) return false;
        return id == that.id && rendezVousId == that.rendezVousId && duree == that.duree && Objects.equals(notes, that.notes) && Objects.equals(problemePrincipal, that.problemePrincipal) && Objects.equals(diagnostic, that.diagnostic) && Objects.equals(recommandations, that.recommandations) && Objects.equals(traitement, that.traitement) && Objects.equals(createdAt, that.createdAt);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, rendezVousId, notes, problemePrincipal, diagnostic, recommandations, traitement, duree, createdAt);
    }
}
