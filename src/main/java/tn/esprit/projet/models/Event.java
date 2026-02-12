package tn.esprit.projet.models;

import java.sql.Date;
import java.sql.Timestamp;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.Objects;

public class Event {
    private int id;
    private String title;
    private LocalDate  eventDate;
    private String location;
    private String link;
    private LocalDateTime createdAt;
    private boolean isNew;
    private int creator_id;

    public Event(){}
    public Event(int id, String title, LocalDate  eventDate, String location, String link, LocalDateTime createdAt, boolean isNew, int creator_id) {
        this.id = id;
        this.title = title;
        this.eventDate = eventDate;
        this.location = location;
        this.link = link;
        this.createdAt = createdAt;
        this.isNew = isNew;
        this.creator_id = creator_id;
    }

    public int getId() {
        return id;
    }

    public String getTitle() {
        return title;
    }

    public LocalDate  getEventDate() {
        return eventDate;
    }

    public String getLocation() {
        return location;
    }

    public String getLink() {
        return link;
    }

    public LocalDateTime getCreatedAt() {
        return createdAt;
    }

    public boolean isNew() {
        return isNew;
    }

    public int getCreator_id() {
        return creator_id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public void setEventDate(LocalDate  eventDate) {
        this.eventDate = eventDate;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public void setLink(String link) {
        this.link = link;
    }

    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }

    public void setNew(boolean aNew) {
        isNew = aNew;
    }

    public void setCreator_id(int creator_id) {
        this.creator_id = creator_id;
    }

    @Override
    public String toString() {
        return "Events{" +
                "id=" + id +
                ", title='" + title + '\'' +
                ", eventDate=" + eventDate +
                ", location='" + location + '\'' +
                ", link='" + link + '\'' +
                ", createdAt=" + createdAt +
                ", isNew=" + isNew +
                ", creator_id=" + creator_id +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof Event events)) return false;
        return id == events.id && isNew == events.isNew && creator_id == events.creator_id && Objects.equals(title, events.title) && Objects.equals(eventDate, events.eventDate) && Objects.equals(location, events.location) && Objects.equals(link, events.link) && Objects.equals(createdAt, events.createdAt);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, title, eventDate, location, link, createdAt, isNew, creator_id);
    }
}
