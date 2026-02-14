package TestPsychologique.models;

public class Interpretation {
    private int id;
    private int testId;
    private int scoreMin;
    private int scoreMax;
    private String titre;
    private String description;
    private String conseils;

    // Constructeurs
    public Interpretation() {
    }

    public Interpretation(int testId, int scoreMin, int scoreMax, String titre, String description, String conseils) {
        this.testId = testId;
        this.scoreMin = scoreMin;
        this.scoreMax = scoreMax;
        this.titre = titre;
        this.description = description;
        this.conseils = conseils;
    }

    // Getters et Setters
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

    public int getScoreMin() {
        return scoreMin;
    }

    public void setScoreMin(int scoreMin) {
        this.scoreMin = scoreMin;
    }

    public int getScoreMax() {
        return scoreMax;
    }

    public void setScoreMax(int scoreMax) {
        this.scoreMax = scoreMax;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getConseils() {
        return conseils;
    }

    public void setConseils(String conseils) {
        this.conseils = conseils;
    }

    @Override
    public String toString() {
        return "Interpretation{" +
                "id=" + id +
                ", testId=" + testId +
                ", scoreMin=" + scoreMin +
                ", scoreMax=" + scoreMax +
                ", titre='" + titre + '\'' +
                '}';
    }
}