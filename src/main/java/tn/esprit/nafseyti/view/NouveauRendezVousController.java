package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.nafseyti.controllers.rendez_vousController;
import tn.esprit.nafseyti.models.rendez_vous;

import java.sql.SQLException;
import java.time.LocalTime;
public class NouveauRendezVousController {
    @FXML
    private TextField txtHeureDebut, txtHeureFin;
    @FXML
    private ComboBox<String> txtMedecinId; // au lieu de TextField

    @FXML
    private DatePicker datePicker;

    @FXML
    private ComboBox<String> cmbTypeSeance, cmbStatut;

    @FXML
    private Button btnAnnuler, btnEnregistrer;

    private rendez_vousController rvController = new rendez_vousController();

    // Reference au controller parent pour rafraîchir le tableau
    private GestionRendezVousController parentController;

    @FXML
    public void initialize() {
        // Charger les médecins dans le ComboBox
        try {
            var medecins = rvController.getMedecinsDisponibles();
            txtMedecinId.getItems().clear();
            for (Integer id : medecins) {
                txtMedecinId.getItems().add(String.valueOf(id)); // Si tu veux juste l'ID
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        // Bouton Annuler ferme la popup
        btnAnnuler.setOnAction(e -> ((Stage) btnAnnuler.getScene().getWindow()).close());

        // Bouton Enregistrer
        btnEnregistrer.setOnAction(e -> enregistrerRendezVous());
    }

    public void setParentController(GestionRendezVousController parent) {
        this.parentController = parent;
    }

    private void enregistrerRendezVous() {
        // 1️⃣ Contrôle de saisie (tu peux enlever heure/debut si nécessaire)
        // Vérifier qu'une valeur a été sélectionnée
        if (txtMedecinId.getValue() == null ||
                datePicker.getValue() == null || cmbTypeSeance.getValue() == null ||
                cmbStatut.getValue() == null) {
            showAlert(Alert.AlertType.ERROR, "Erreur de saisie", "Tous les champs doivent être remplis !");
            return;
        }

        int medecinId;
        try {
            medecinId = Integer.parseInt(txtMedecinId.getValue()); // getValue() retourne la String sélectionnée
        } catch (NumberFormatException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur de saisie", "Les ID doivent être des nombres entiers !");
            return;
        }

        LocalTime heureDebut = null, heureFin = null;
        try {
            if (!txtHeureDebut.getText().isEmpty())
                heureDebut = LocalTime.parse(txtHeureDebut.getText());
            if (!txtHeureFin.getText().isEmpty())
                heureFin = LocalTime.parse(txtHeureFin.getText());
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur de saisie", "Le format des heures doit être HH:mm !");
            return;
        }

        // 2️⃣ Créer l'objet rendez_vous
        rendez_vous rv = new rendez_vous();

        rv.setMedecinId(medecinId);
        rv.setDateRendezVous(datePicker.getValue());
        rv.setHeureDebut(heureDebut);
        rv.setHeureFin(heureFin);
        rv.setTypeSeance(cmbTypeSeance.getValue());
        rv.setStatut(cmbStatut.getValue());

        // 3️⃣ Insérer dans la base
        try {
            rvController.insertOne(rv);
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Le rendez-vous a été ajouté avec succès !");
            // Rafraîchir le tableau dans le parent
            if (parentController != null) {
                parentController.loadRendezVous();
            }
            // fermer la popup
            ((Stage) btnEnregistrer.getScene().getWindow()).close();
        } catch (SQLException e) {
            e.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible d'ajouter le rendez-vous.");
        }
    }

    private void showAlert(Alert.AlertType type, String titre, String message) {
        Alert alert = new Alert(type);
        alert.setTitle(titre);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
