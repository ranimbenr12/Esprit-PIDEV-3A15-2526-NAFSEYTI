package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ResourceBundle;
public class CreateFicheConsultationController implements Initializable {

    @FXML private Label patientNameLabel;
    @FXML private Label dateLabel;
    @FXML private TextArea motifTextArea;
    @FXML private TextArea symptomesTextArea;
    @FXML private TextArea diagnosticTextArea;
    @FXML private TextArea recommandationsTextArea;
    @FXML private TextArea traitementTextArea;
    @FXML private TextField prochainSeanceField;  // Peut être null si absent du FXML
    @FXML private Label messageLabel;
    @FXML private Button btnSave;
    @FXML private Button btnCancel;

    private int psychologueId;
    private int patientId;
    private int rendezVousId;
    private String patientPrenom;
    private String patientNom;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        btnCancel.setOnAction(e -> closeWindow());
        btnSave.setOnAction(e -> saveFicheConsultation());

        // Afficher la date du jour
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
        dateLabel.setText("Date: " + LocalDate.now().format(formatter));
    }

    public void setData(int psychologueId, int patientId, int rendezVousId,
                        String patientPrenom, String patientNom) {
        this.psychologueId = psychologueId;
        this.patientId = patientId;
        this.rendezVousId = rendezVousId;
        this.patientPrenom = patientPrenom;
        this.patientNom = patientNom;

        patientNameLabel.setText("Patient: " + patientPrenom + " " + patientNom);
    }

    private void saveFicheConsultation() {
        // Récupération des champs
        String motif = motifTextArea.getText().trim();
        String symptomes = symptomesTextArea.getText().trim();
        String diagnostic = diagnosticTextArea.getText().trim();
        String recommandations = recommandationsTextArea.getText().trim();

        // Vérifier si traitementTextArea existe (pour compatibilité)
        String traitement = "";
        if (traitementTextArea != null) {
            traitement = traitementTextArea.getText().trim();
        }

        // Validation des champs obligatoires
        if (motif.isEmpty() || symptomes.isEmpty() || diagnostic.isEmpty() || recommandations.isEmpty()) {
            messageLabel.setStyle("-fx-text-fill: red;");
            messageLabel.setText("⚠️ Veuillez remplir tous les champs obligatoires");
            return;
        }

        // Si le champ traitement existe et est vide, demander de le remplir
        if (traitementTextArea != null && traitement.isEmpty()) {
            messageLabel.setStyle("-fx-text-fill: red;");
            messageLabel.setText("⚠️ Veuillez remplir le champ Traitement");
            return;
        }

        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();

            // Préparer le traitement final
            String traitementFinal = traitement;

            // Ajouter la prochaine séance si le champ existe ET est rempli
            if (prochainSeanceField != null) {
                String prochainSeance = prochainSeanceField.getText().trim();
                if (!prochainSeance.isEmpty()) {
                    traitementFinal += (traitementFinal.isEmpty() ? "" : "\n\n")
                            + "📅 Prochaine séance prévue le: " + prochainSeance;
                }
            }

            // Si traitement est vide (ancien FXML), utiliser une valeur par défaut
            if (traitementFinal.isEmpty()) {
                traitementFinal = "Traitement à définir";
            }

            // Insertion dans la base de données
            String insertQuery =
                    "INSERT INTO fiche_consultation " +
                            "(rendez_vous_id, notes, probleme_principal, diagnostic, recommandations, traitement) " +
                            "VALUES (?, ?, ?, ?, ?, ?)";

            PreparedStatement insertStmt = cnx.prepareStatement(insertQuery);
            insertStmt.setInt(1, rendezVousId);
            insertStmt.setString(2, motif);
            insertStmt.setString(3, symptomes);
            insertStmt.setString(4, diagnostic);
            insertStmt.setString(5, recommandations);
            insertStmt.setString(6, traitementFinal);

            int result = insertStmt.executeUpdate();

            if (result > 0) {
                messageLabel.setStyle("-fx-text-fill: green;");
                messageLabel.setText("✅ Fiche de consultation enregistrée avec succès !");

                // Fermer après 2 secondes
                new Thread(() -> {
                    try {
                        Thread.sleep(2000);
                        javafx.application.Platform.runLater(() -> closeWindow());
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                }).start();
            }

        } catch (com.mysql.cj.jdbc.exceptions.MysqlDataTruncation e) {
            messageLabel.setStyle("-fx-text-fill: red;");
            messageLabel.setText("❌ Erreur : Un des champs contient trop de texte !");
            e.printStackTrace();
        } catch (java.sql.SQLIntegrityConstraintViolationException e) {
            messageLabel.setStyle("-fx-text-fill: orange;");
            messageLabel.setText("⚠️ Une fiche existe déjà pour ce rendez-vous !");
            e.printStackTrace();
        } catch (Exception e) {
            messageLabel.setStyle("-fx-text-fill: red;");
            messageLabel.setText("❌ Erreur lors de l'enregistrement : " + e.getMessage());
            e.printStackTrace();
            System.err.println("Détails de l'erreur:");
            System.err.println("- rendezVousId: " + rendezVousId);
            System.err.println("- motif length: " + motif.length());
            System.err.println("- symptomes length: " + symptomes.length());
        }
    }

    private void closeWindow() {
        Stage stage = (Stage) btnCancel.getScene().getWindow();
        stage.close();
    }
}
