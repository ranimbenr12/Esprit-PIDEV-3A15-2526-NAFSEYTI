package tn.esprit.projet.models;

public class suivi {

    private int idsuivi;
    private int idutilisateur;
    private int idpsychologue;
    private String titre;
    private String description;
    private String type_suivi;

    // ===================== Constructeurs =====================
    public suivi() {}

    public suivi(int idutilisateur, int idpsychologue, String titre, String description, String type_suivi) {
        this.idutilisateur = idutilisateur;
        this.idpsychologue = idpsychologue;
        this.titre = titre;
        this.description = description;
        this.type_suivi = type_suivi;
    }

    // ===================== Getters MAJUSCULE (obligatoires pour PropertyValueFactory) =====================
    public int getIdsuivi()        { return idsuivi; }
    public int getIdutilisateur()  { return idutilisateur; }
    public int getIdpsychologue()  { return idpsychologue; }
    public String getTitre()       { return titre; }
    public String getDescription() { return description; }
    public String getType_suivi()  { return type_suivi; }

    // ===================== Getters minuscule (pour service et controller) =====================
    public int getidsuivi()        { return idsuivi; }
    public int getidutilisateur()  { return idutilisateur; }
    public int getidpsychologue()  { return idpsychologue; }
    public String gettitre()       { return titre; }
    public String getdescription() { return description; }
    public String gettype_suivi()  { return type_suivi; }

    // ===================== Setters =====================
    public void setidsuivi(int idsuivi)             { this.idsuivi = idsuivi; }
    public void setidutilisateur(int idutilisateur) { this.idutilisateur = idutilisateur; }
    public void setidpsychologue(int idpsychologue) { this.idpsychologue = idpsychologue; }
    public void settitre(String titre)              { this.titre = titre; }
    public void setdescription(String description)  { this.description = description; }
    public void settype_suivi(String type_suivi)    { this.type_suivi = type_suivi; }

    @Override
    public String toString() {
        return "suivi{id=" + idsuivi + ", titre='" + titre + "', type_suivi='" + type_suivi + "'}";
    }
}