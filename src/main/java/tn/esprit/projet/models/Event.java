package tn.esprit.projet.models;

import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.Objects;

public class Event {
    private int id;
    private String title;
    private LocalDate eventDate;
    private String location;
    private String link;
    private LocalDateTime createdAt;
    private int creator_id;
    private int maxParticipants;
    private int currentParticipants; // For display purposes

    public Event() {}

    public Event(int id, String title, LocalDate eventDate, String location, String link,
<<<<<<< HEAD
                 LocalDateTime createdAt, int creator_id) {
=======
                 LocalDateTime createdAt, int creator_id, int maxParticipants) {
>>>>>>> fd80a9a (final update)
        this.id = id;
        this.title = title;
        this.eventDate = eventDate;
        this.location = location;
        this.link = link;
        this.createdAt = createdAt;
        this.creator_id = creator_id;
        this.maxParticipants = maxParticipants;
    }

    // Getters
    public int getId() { return id; }
    public String getTitle() { return title; }
    public LocalDate getEventDate() { return eventDate; }
    public String getLocation() { return location; }
    public String getLink() { return link; }
    public LocalDateTime getCreatedAt() { return createdAt; }
    public int getCreator_id() { return creator_id; }
<<<<<<< HEAD
=======
    public int getMaxParticipants() { return maxParticipants; }
    public int getCurrentParticipants() { return currentParticipants; }
>>>>>>> fd80a9a (final update)

    // Setters
    public void setId(int id) { this.id = id; }
    public void setTitle(String title) { this.title = title; }
    public void setEventDate(LocalDate eventDate) { this.eventDate = eventDate; }
    public void setLocation(String location) { this.location = location; }
    public void setLink(String link) { this.link = link; }
    public void setCreatedAt(LocalDateTime createdAt) { this.createdAt = createdAt; }
    public void setCreator_id(int creator_id) { this.creator_id = creator_id; }
<<<<<<< HEAD
=======
    public void setMaxParticipants(int maxParticipants) { this.maxParticipants = maxParticipants; }
    public void setCurrentParticipants(int currentParticipants) { this.currentParticipants = currentParticipants; }
>>>>>>> fd80a9a (final update)

    @Override
    public String toString() {
        return "Event{" +
                "id=" + id +
                ", title='" + title + '\'' +
                ", eventDate=" + eventDate +
                ", location='" + location + '\'' +
                ", link='" + link + '\'' +
                ", createdAt=" + createdAt +
                ", creator_id=" + creator_id +
                ", maxParticipants=" + maxParticipants +
                ", currentParticipants=" + currentParticipants +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof Event e)) return false;
<<<<<<< HEAD
        return creator_id == e.creator_id &&
=======
        return creator_id == e.creator_id && maxParticipants == e.maxParticipants &&
>>>>>>> fd80a9a (final update)
                Objects.equals(title, e.title) &&
                Objects.equals(eventDate, e.eventDate) &&
                Objects.equals(location, e.location) &&
                Objects.equals(link, e.link) &&
                Objects.equals(createdAt, e.createdAt);
    }

    @Override
    public int hashCode() {
<<<<<<< HEAD
        return Objects.hash(id, title, eventDate, location, link, createdAt, creator_id);
=======
        return Objects.hash(id, title, eventDate, location, link, createdAt, creator_id, maxParticipants);
>>>>>>> fd80a9a (final update)
    }
}