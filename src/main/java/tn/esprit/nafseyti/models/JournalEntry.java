package tn.esprit.nafseyti.models;

import java.sql.Timestamp;
import java.util.ArrayList;
import java.util.List;

public class JournalEntry {
    private int id;
    private int userId;
    private java.sql.Date date;
    private String humeur; // "excellent", "bien", "moyen", "difficile", "très_difficile"
    private List<String> emotions; // Liste d'émotions
    private String noteTexte;
    private int energie; // 1-10
    private int sommeilQualite; // 1-10
    private Timestamp createdAt;

    // Constructeurs
    public JournalEntry() {
        this.emotions = new ArrayList<>();
    }

    public JournalEntry(int userId, java.sql.Date date, String humeur, String noteTexte, int energie, int sommeilQualite) {
        this.userId = userId;
        this.date = date;
        this.humeur = humeur;
        this.noteTexte = noteTexte;
        this.energie = energie;
        this.sommeilQualite = sommeilQualite;
        this.emotions = new ArrayList<>();
    }

    // Getters et Setters
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

    public java.sql.Date getDate() {
        return date;
    }

    public void setDate(java.sql.Date date) {
        this.date = date;
    }

    public String getHumeur() {
        return humeur;
    }

    public void setHumeur(String humeur) {
        this.humeur = humeur;
    }

    public List<String> getEmotions() {
        return emotions;
    }

    public void setEmotions(List<String> emotions) {
        this.emotions = emotions;
    }

    public void addEmotion(String emotion) {
        if (!this.emotions.contains(emotion)) {
            this.emotions.add(emotion);
        }
    }

    public String getEmotionsAsString() {
        return String.join(",", emotions);
    }

    public void setEmotionsFromString(String emotionsStr) {
        this.emotions.clear();
        if (emotionsStr != null && !emotionsStr.isEmpty()) {
            String[] emotionArray = emotionsStr.split(",");
            for (String emotion : emotionArray) {
                this.emotions.add(emotion.trim());
            }
        }
    }

    public String getNoteTexte() {
        return noteTexte;
    }

    public void setNoteTexte(String noteTexte) {
        this.noteTexte = noteTexte;
    }

    public int getEnergie() {
        return energie;
    }

    public void setEnergie(int energie) {
        this.energie = Math.max(1, Math.min(10, energie)); // Limiter entre 1 et 10
    }

    public int getSommeilQualite() {
        return sommeilQualite;
    }

    public void setSommeilQualite(int sommeilQualite) {
        this.sommeilQualite = Math.max(1, Math.min(10, sommeilQualite)); // Limiter entre 1 et 10
    }

    public Timestamp getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }

    // Méthodes utilitaires
    public String getHumeurEmoji() {
        switch (humeur) {
            case "excellent": return "😊";
            case "bien": return "🙂";
            case "moyen": return "😐";
            case "difficile": return "😔";
            case "très_difficile": return "😰";
            default: return "😐";
        }
    }

    public int getHumeurScore() {
        switch (humeur) {
            case "excellent": return 5;
            case "bien": return 4;
            case "moyen": return 3;
            case "difficile": return 2;
            case "très_difficile": return 1;
            default: return 3;
        }
    }

    @Override
    public String toString() {
        return "JournalEntry{" +
                "id=" + id +
                ", userId=" + userId +
                ", date=" + date +
                ", humeur='" + humeur + '\'' +
                ", emotions=" + emotions +
                ", energie=" + energie +
                ", sommeil=" + sommeilQualite +
                '}';
    }
}