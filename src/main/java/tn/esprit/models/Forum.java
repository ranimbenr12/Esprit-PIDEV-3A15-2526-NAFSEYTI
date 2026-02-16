package tn.esprit.models;

import java.time.LocalDateTime;
import java.util.Objects;

public class Forum {

    private int idForum;
    private String nomForum;
    private String description;

    private String statut;

    public Forum() {
    }

    public Forum(int idForum, String nomForum, String description, String statut) {
        this.idForum = idForum;
        this.nomForum = nomForum;
        this.description = description;

        this.statut = statut;
    }
    public Forum(String nomForum, String description) {
        this.nomForum = nomForum;
        this.description = description;
        this.statut = "actif";
    }


    // Getters & Setters

    public int getIdForum() {
        return idForum;
    }

    public void setIdForum(int idForum) {
        this.idForum = idForum;
    }

    public String getNomForum() {
        return nomForum;
    }

    public void setNomForum(String nomForum) {
        this.nomForum = nomForum;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }



    public String getStatut() {
        return statut;
    }

    public void setStatut(String statut) {
        this.statut = statut;
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof Forum forum)) return false;
        return idForum == forum.idForum && Objects.equals(nomForum, forum.nomForum) && Objects.equals(description, forum.description)  && Objects.equals(statut, forum.statut);
    }

    @Override
    public int hashCode() {
        return Objects.hash(idForum, nomForum, description, statut);
    }

    @Override
    public String toString() {
        return "Forum{" +
                "idForum=" + idForum +
                ", nomForum='" + nomForum + '\'' +
                ", description='" + description + '\'' +

                ", statut='" + statut + '\'' +
                '}';
    }


}
