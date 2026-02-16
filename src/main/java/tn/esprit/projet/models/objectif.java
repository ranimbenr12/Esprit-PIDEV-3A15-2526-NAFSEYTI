package tn.esprit.projet.models;

import java.sql.Date;
import java.sql.Timestamp;

public class objectif {

    private int idobjectif;
    private int idsuivi;
    private String titre;
    private String description;
    private String statut;
    private Date date_echeance;
    private Timestamp date_creation;
    private boolean valide;
    // ✅ Champs pour les fichiers uploadés par le client
    private String fichier_path;
    private String fichier_nom;
    private String fichier_type;

    public objectif() {}

    // ===== Getters MAJUSCULE (pour PropertyValueFactory) =====
    public int getIdobjectif()          { return idobjectif; }
    public int getIdsuivi()             { return idsuivi; }
    public String getTitre()            { return titre; }
    public String getDescription()      { return description; }
    public String getStatut()           { return statut; }
    public Date getDate_echeance()      { return date_echeance; }
    public Timestamp getDate_creation() { return date_creation; }
    public boolean isValide()           { return valide; }
    public String getFichier_path()     { return fichier_path; }
    public String getFichier_nom()      { return fichier_nom; }
    public String getFichier_type()     { return fichier_type; }

    // ===== Getters minuscule (pour service/controller) =====
    public int getidobjectif()          { return idobjectif; }
    public int getidsuivi()             { return idsuivi; }
    public String gettitre()            { return titre; }
    public String getdescription()      { return description; }
    public String getstatut()           { return statut; }
    public Date getdate_echeance()      { return date_echeance; }
    public Timestamp getdate_creation() { return date_creation; }
    public boolean getvalide()          { return valide; }
    public String getfichier_path()     { return fichier_path; }
    public String getfichier_nom()      { return fichier_nom; }
    public String getfichier_type()     { return fichier_type; }

    // ===== Setters =====
    public void setidobjectif(int idobjectif)             { this.idobjectif = idobjectif; }
    public void setidsuivi(int idsuivi)                   { this.idsuivi = idsuivi; }
    public void settitre(String titre)                    { this.titre = titre; }
    public void setdescription(String description)        { this.description = description; }
    public void setstatut(String statut)                  { this.statut = statut; }
    public void setdate_echeance(Date date_echeance)      { this.date_echeance = date_echeance; }
    public void setdate_creation(Timestamp date_creation) { this.date_creation = date_creation; }
    public void setvalide(boolean valide)                 { this.valide = valide; }
    public void setfichier_path(String fichier_path)      { this.fichier_path = fichier_path; }
    public void setfichier_nom(String fichier_nom)        { this.fichier_nom = fichier_nom; }
    public void setfichier_type(String fichier_type)      { this.fichier_type = fichier_type; }

    @Override
    public String toString() {
        return "objectif{id=" + idobjectif + ", titre='" + titre + "'}";
    }
}
