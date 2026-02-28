package tn.esprit.projet.models;
public class DetectionCriseRequest {
    private String message;
    private Integer patientId; // Optionnel

    public DetectionCriseRequest() {}

    public DetectionCriseRequest(String message) {
        this.message = message;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public Integer getPatientId() {
        return patientId;
    }

    public void setPatientId(Integer patientId) {
        this.patientId = patientId;
    }
}