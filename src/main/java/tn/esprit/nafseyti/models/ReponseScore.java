package tn.esprit.nafseyti.models;

public class ReponseScore {
    private int id;
    private int questionId;
    private String lettreReponse;  // "A", "B", "C", "D", "Vrai", "Faux", "ANY"
    private int points;

    // Constructeurs
    public ReponseScore() {}

    public ReponseScore(int questionId, String lettreReponse, int points) {
        this.questionId = questionId;
        this.lettreReponse = lettreReponse;
        this.points = points;
    }

    // Getters et Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getQuestionId() { return questionId; }
    public void setQuestionId(int questionId) { this.questionId = questionId; }

    public String getLettreReponse() { return lettreReponse; }
    public void setLettreReponse(String lettreReponse) { this.lettreReponse = lettreReponse; }

    public int getPoints() { return points; }
    public void setPoints(int points) { this.points = points; }

    @Override
    public String toString() {
        return "ReponseScore{questionId=" + questionId +
                ", lettre='" + lettreReponse + "', points=" + points + "}";
    }
}