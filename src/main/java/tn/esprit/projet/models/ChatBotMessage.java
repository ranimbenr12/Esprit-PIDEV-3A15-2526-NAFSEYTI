package tn.esprit.projet.models;

import java.sql.Timestamp;

public class ChatBotMessage {
    private int id_message;
    private int id_utilisateur;
    private String message_utilisateur;
    private String reponse_chatbot;
    private Timestamp date_envoi;

    // Constructeurs
    public ChatBotMessage() {}

    public ChatBotMessage(int id_utilisateur, String message_utilisateur, String reponse_chatbot) {
        this.id_utilisateur = id_utilisateur;
        this.message_utilisateur = message_utilisateur;
        this.reponse_chatbot = reponse_chatbot;
    }

    // Getters normaux (pour les services)
    public int getid_message() {
        return id_message;
    }

    public int getid_utilisateur() {
        return id_utilisateur;
    }

    public String getmessage_utilisateur() {
        return message_utilisateur;
    }

    public String getreponse_chatbot() {
        return reponse_chatbot;
    }

    public Timestamp getdate_envoi() {
        return date_envoi;
    }

    // Getters majuscules (pour PropertyValueFactory)
    public int getId_message() {
        return id_message;
    }

    public int getId_utilisateur() {
        return id_utilisateur;
    }

    public String getMessage_utilisateur() {
        return message_utilisateur;
    }

    public String getReponse_chatbot() {
        return reponse_chatbot;
    }

    public Timestamp getDate_envoi() {
        return date_envoi;
    }

    // Setters
    public void setid_message(int id_message) {
        this.id_message = id_message;
    }

    public void setid_utilisateur(int id_utilisateur) {
        this.id_utilisateur = id_utilisateur;
    }

    public void setmessage_utilisateur(String message_utilisateur) {
        this.message_utilisateur = message_utilisateur;
    }

    public void setreponse_chatbot(String reponse_chatbot) {
        this.reponse_chatbot = reponse_chatbot;
    }

    public void setdate_envoi(Timestamp date_envoi) {
        this.date_envoi = date_envoi;
    }
}
