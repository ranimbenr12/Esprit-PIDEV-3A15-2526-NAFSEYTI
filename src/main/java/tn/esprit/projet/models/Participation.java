package tn.esprit.projet.models;

import java.sql.Timestamp;
import java.util.Objects;

public class Participation {
    private int id;
    private int userId;
    private int eventId;
    private Timestamp participationDate;
    private String status;

    // Relations
    private User user;
    private Event event;

    public Participation() {}

    public Participation(int id, int userId, int eventId, Timestamp participationDate, String status) {
        this.id = id;
        this.userId = userId;
        this.eventId = eventId;
        this.participationDate = participationDate;
        this.status = status;
    }

    // Getters and Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getUserId() { return userId; }
    public void setUserId(int userId) { this.userId = userId; }

    public int getEventId() { return eventId; }
    public void setEventId(int eventId) { this.eventId = eventId; }

    public Timestamp getParticipationDate() { return participationDate; }
    public void setParticipationDate(Timestamp participationDate) { this.participationDate = participationDate; }

    public String getStatus() { return status; }
    public void setStatus(String status) { this.status = status; }

    public User getUser() { return user; }
    public void setUser(User user) { this.user = user; }

    public Event getEvent() { return event; }
    public void setEvent(Event event) { this.event = event; }

    @Override
    public String toString() {
        return "Participation{" +
                "id=" + id +
                ", userId=" + userId +
                ", eventId=" + eventId +
                ", participationDate=" + participationDate +
                ", status='" + status + '\'' +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof Participation that)) return false;
        return id == that.id && userId == that.userId && eventId == that.eventId &&
                Objects.equals(status, that.status);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, userId, eventId, status);
    }
}