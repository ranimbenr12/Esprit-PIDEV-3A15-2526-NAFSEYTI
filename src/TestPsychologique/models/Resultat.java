package TestPsychologique.models;

import java.sql.Timestamp;

public class Resultat {
    private int id;
    private int userId;
    private int testId;
    private int scoreTotal;
    private Timestamp dateTest;

    // Constructeurs
    public Resultat() {
    }

    public Resultat(int userId, int testId, int scoreTotal) {
        this.userId = userId;
        this.testId = testId;
        this.scoreTotal = scoreTotal;
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

    public int getTestId() {
        return testId;
    }

    public void setTestId(int testId) {
        this.testId = testId;
    }

    public int getScoreTotal() {
        return scoreTotal;
    }

    public void setScoreTotal(int scoreTotal) {
        this.scoreTotal = scoreTotal;
    }

    public Timestamp getDateTest() {
        return dateTest;
    }

    public void setDateTest(Timestamp dateTest) {
        this.dateTest = dateTest;
    }

    @Override
    public String toString() {
        return "Resultat{" +
                "id=" + id +
                ", userId=" + userId +
                ", testId=" + testId +
                ", scoreTotal=" + scoreTotal +
                ", dateTest=" + dateTest +
                '}';
    }
}