package tn.esprit.projet.models;

import java.sql.Timestamp;

public class mediaObjectif {

    private int       id_media;
    private int       id_objectif;
    private String    type_media;
    private String    chemin_fichier;
    private Timestamp date_ajout;

    public mediaObjectif() {}

    // ===== Getters MAJUSCULE (PropertyValueFactory) =====
    public int       getId_media()       { return id_media; }
    public int       getId_objectif()    { return id_objectif; }
    public String    getType_media()     { return type_media; }
    public String    getChemin_fichier() { return chemin_fichier; }
    public Timestamp getDate_ajout()     { return date_ajout; }

    // ✅ Pour PropertyValueFactory("NomFichier")
    public String    getNomFichier()     {
        if (chemin_fichier == null) return "";
        return new java.io.File(chemin_fichier).getName();
    }

    // ===== Getters minuscule =====
    public int       getid_media()       { return id_media; }
    public int       getid_objectif()    { return id_objectif; }
    public String    gettype_media()     { return type_media; }
    public String    getchemin_fichier() { return chemin_fichier; }
    public Timestamp getdate_ajout()     { return date_ajout; }

    // ===== Setters =====
    public void setid_media(int id_media)           { this.id_media = id_media; }
    public void setid_objectif(int id_objectif)     { this.id_objectif = id_objectif; }
    public void settype_media(String type_media)    { this.type_media = type_media; }
    public void setchemin_fichier(String chemin)    { this.chemin_fichier = chemin; }
    public void setdate_ajout(Timestamp date_ajout) { this.date_ajout = date_ajout; }

    // ✅ Getter pour SuiviClientController
    public int    getid_media_val()  { return id_media; }

    @Override
    public String toString() {
        return "media{id=" + id_media
                + ", type=" + type_media
                + ", fichier=" + getNomFichier() + "}";
    }
}