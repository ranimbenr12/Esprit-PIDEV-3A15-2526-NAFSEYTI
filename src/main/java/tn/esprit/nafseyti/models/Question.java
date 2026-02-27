package tn.esprit.nafseyti.models;

import java.sql.Timestamp;

public class Question {
    private int id;
    private int testId;
    private String testNom; // For display purposes
    private String texte;
    private String typeQuestion;
    private String reponsesPossibles;
    private int points;
    private int ordre;
    private boolean obligatoire;
    private String status;
    private Timestamp createdAt;

    // Constructors
    public Question() {
        this.points = 1;
        this.ordre = 1;
        this.obligatoire = true;
        this.status = "actif";
    }

    public Question(int id, int testId, String texte, String typeQuestion,
                    String reponsesPossibles, int points, int ordre,
                    boolean obligatoire, String status, Timestamp createdAt) {
        this.id = id;
        this.testId = testId;
        this.texte = texte;
        this.typeQuestion = typeQuestion;
        this.reponsesPossibles = reponsesPossibles;
        this.points = points;
        this.ordre = ordre;
        this.obligatoire = obligatoire;
        this.status = status;
        this.createdAt = createdAt;
    }

    // Getters and Setters
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getTestId() {
        return testId;
    }

    public void setTestId(int testId) {
        this.testId = testId;
    }

    public String getTestNom() {
        return testNom;
    }

    public void setTestNom(String testNom) {
        this.testNom = testNom;
    }

    public String getTexte() {
        return texte;
    }

    public void setTexte(String texte) {
        this.texte = texte;
    }

    public String getTypeQuestion() {
        return typeQuestion;
    }

    public void setTypeQuestion(String typeQuestion) {
        this.typeQuestion = typeQuestion;
    }

    public String getReponsesPossibles() {
        return reponsesPossibles;
    }

    public void setReponsesPossibles(String reponsesPossibles) {
        this.reponsesPossibles = reponsesPossibles;
    }

    public int getPoints() {
        return points;
    }

    public void setPoints(int points) {
        this.points = points;
    }

    public int getOrdre() {
        return ordre;
    }

    public void setOrdre(int ordre) {
        this.ordre = ordre;
    }

    public boolean isObligatoire() {
        return obligatoire;
    }

    public void setObligatoire(boolean obligatoire) {
        this.obligatoire = obligatoire;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Timestamp getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }

    @Override
    public String toString() {
        return "Question{" +
                "id=" + id +
                ", testId=" + testId +
                ", texte='" + texte + '\'' +
                ", typeQuestion='" + typeQuestion + '\'' +
                ", points=" + points +
                ", ordre=" + ordre +
                ", obligatoire=" + obligatoire +
                ", status='" + status + '\'' +
                '}';
    }
}
