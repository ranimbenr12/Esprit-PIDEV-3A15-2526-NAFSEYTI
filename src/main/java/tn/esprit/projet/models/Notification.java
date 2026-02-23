package tn.esprit.projet.models;

import java.sql.Timestamp;
import java.util.Objects;

public class Notification {
    private int id;
    private int userId;
    private String message;
    private String type;
    private int relatedId;
    private boolean isRead;
    private Timestamp createdAt;

    private User user;
    private Event event;
    private Participation participation;

    public Notification() {}

    // Getters and Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getUserId() { return userId; }
    public void setUserId(int userId) { this.userId = userId; }

    public String getMessage() { return message; }
    public void setMessage(String message) { this.message = message; }

    public String getType() { return type; }
    public void setType(String type) { this.type = type; }

    public int getRelatedId() { return relatedId; }
    public void setRelatedId(int relatedId) { this.relatedId = relatedId; }

    public boolean isRead() { return isRead; }
    public void setRead(boolean read) { isRead = read; }

    public Timestamp getCreatedAt() { return createdAt; }
    public void setCreatedAt(Timestamp createdAt) { this.createdAt = createdAt; }

    public User getUser() { return user; }
    public void setUser(User user) { this.user = user; }

    public Event getEvent() { return event; }
    public void setEvent(Event event) { this.event = event; }

    public Participation getParticipation() { return participation; }
    public void setParticipation(Participation participation) { this.participation = participation; }

    @Override
    public String toString() {
        return "Notification{" +
                "id=" + id +
                ", message='" + message + '\'' +
                ", type='" + type + '\'' +
                ", isRead=" + isRead +
                ", createdAt=" + createdAt +
                '}';
    }
}