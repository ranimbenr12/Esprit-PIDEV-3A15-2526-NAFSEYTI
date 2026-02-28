package tn.esprit.projet.models;

public class ChatBotConfig {
    private int id_config;
    private int id_psychologue;
    private int id_utilisateur;
    private String suggestion_personnalisee;
    private String frequence_rappel;

    // Constructeurs
    public ChatBotConfig() {}

    public ChatBotConfig(int id_psychologue, int id_utilisateur,
                         String suggestion_personnalisee, String frequence_rappel) {
        this.id_psychologue = id_psychologue;
        this.id_utilisateur = id_utilisateur;
        this.suggestion_personnalisee = suggestion_personnalisee;
        this.frequence_rappel = frequence_rappel;
    }

    // Getters normaux
    public int getid_config() {
        return id_config;
    }

    public int getid_psychologue() {
        return id_psychologue;
    }

    public int getid_utilisateur() {
        return id_utilisateur;
    }

    public String getsuggestion_personnalisee() {
        return suggestion_personnalisee;
    }

    public String getfrequence_rappel() {
        return frequence_rappel;
    }

    // Getters majuscules
    public int getId_config() {
        return id_config;
    }

    public int getId_psychologue() {
        return id_psychologue;
    }

    public int getId_utilisateur() {
        return id_utilisateur;
    }

    public String getSuggestion_personnalisee() {
        return suggestion_personnalisee;
    }

    public String getFrequence_rappel() {
        return frequence_rappel;
    }

    // Setters
    public void setid_config(int id_config) {
        this.id_config = id_config;
    }

    public void setid_psychologue(int id_psychologue) {
        this.id_psychologue = id_psychologue;
    }

    public void setid_utilisateur(int id_utilisateur) {
        this.id_utilisateur = id_utilisateur;
    }

    public void setsuggestion_personnalisee(String suggestion_personnalisee) {
        this.suggestion_personnalisee = suggestion_personnalisee;
    }

    public void setfrequence_rappel(String frequence_rappel) {
        this.frequence_rappel = frequence_rappel;
    }
}
