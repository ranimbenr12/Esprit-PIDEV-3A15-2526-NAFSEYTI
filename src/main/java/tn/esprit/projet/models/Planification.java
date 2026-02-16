package tn.esprit.projet.models;

import java.util.Objects;

public class Planification {

    private int idPlanification;
    private int idEvent;
    private String description;
    private String duree;

    // Relation objet avec Event
    private Event event;

    public Planification() {}

    public Planification(int idPlanification, int idEvent, String description, String duree) {
        this.idPlanification = idPlanification;
        this.idEvent = idEvent;
        this.description = description;
        this.duree = duree;
    }

    public int getIdPlanification() { return idPlanification; }
    public void setIdPlanification(int idPlanification) { this.idPlanification = idPlanification; }

    public int getIdEvent() { return idEvent; }
    public void setIdEvent(int idEvent) { this.idEvent = idEvent; }

    public String getDescription() { return description; }
    public void setDescription(String description) { this.description = description; }

    public String getDuree() { return duree; }
    public void setDuree(String duree) { this.duree = duree; }

    public Event getEvent() { return event; }
    public void setEvent(Event event) { this.event = event; }

    @Override
    public String toString() {
        return "Planification{" +
                "idPlanification=" + idPlanification +
                ", idEvent=" + idEvent +
                ", description='" + description + '\'' +
                ", duree='" + duree + '\'' +
                ", event=" + event +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof Planification that)) return false;
        return idPlanification == that.idPlanification && idEvent == that.idEvent &&
                Objects.equals(description, that.description) && Objects.equals(duree, that.duree);
    }

    @Override
    public int hashCode() {
        return Objects.hash(idPlanification, idEvent, description, duree);
    }
}
