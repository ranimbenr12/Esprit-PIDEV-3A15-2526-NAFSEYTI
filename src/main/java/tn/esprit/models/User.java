package tn.esprit.models;

import java.util.Objects;

public class User {
    private int id;
    private String nom, prenom;
    private double salaire;

    public User() {}



    public User( String nom, String prenom, double salaire) {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.salaire = salaire;

    }
    public int getId() {
        return id;
    }

    public String getPrenom() {
        return prenom;
    }

    public String getNom() {
        return nom;
    }

    public double getSalaire() {
        return salaire;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public void setSalaire(double salaire) {
        this.salaire = salaire;
    }

    @Override
    public String toString() {
        return "User{" +
                "id=" + id +
                ", nom='" + nom + '\'' +
                ", prenom='" + prenom + '\'' +
                ", salaire=" + salaire +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof User user)) return false;
        return id == user.id && Double.compare(salaire, user.salaire) == 0 && Objects.equals(nom, user.nom) && Objects.equals(prenom, user.prenom);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, nom, prenom, salaire);
    }
}
