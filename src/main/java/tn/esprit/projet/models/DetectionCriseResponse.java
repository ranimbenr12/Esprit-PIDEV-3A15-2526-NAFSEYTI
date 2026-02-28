package tn.esprit.projet.models;

import java.util.List;

public class DetectionCriseResponse {
    private String risque;
    private String categorie;
    private double confiance;
    private List<String> actionsRecommandees;
    private String analyseDetaillee;
    private String timestamp;

    public DetectionCriseResponse() {}

    public DetectionCriseResponse(String risque, String categorie, double confiance,
                                  List<String> actionsRecommandees) {
        this.risque = risque;
        this.categorie = categorie;
        this.confiance = confiance;
        this.actionsRecommandees = actionsRecommandees;
        this.timestamp = java.time.LocalDateTime.now().toString();
    }

    // Getters et Setters
    public String getRisque() { return risque; }
    public void setRisque(String risque) { this.risque = risque; }

    public String getCategorie() { return categorie; }
    public void setCategorie(String categorie) { this.categorie = categorie; }

    public double getConfiance() { return confiance; }
    public void setConfiance(double confiance) { this.confiance = confiance; }

    public List<String> getActionsRecommandees() { return actionsRecommandees; }
    public void setActionsRecommandees(List<String> actionsRecommandees) {
        this.actionsRecommandees = actionsRecommandees;
    }

    public String getAnalyseDetaillee() { return analyseDetaillee; }
    public void setAnalyseDetaillee(String analyseDetaillee) {
        this.analyseDetaillee = analyseDetaillee;
    }

    public String getTimestamp() { return timestamp; }
    public void setTimestamp(String timestamp) { this.timestamp = timestamp; }
}