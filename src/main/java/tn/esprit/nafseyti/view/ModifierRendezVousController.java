package tn.esprit.nafseyti.view;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.stage.Stage;
import tn.esprit.nafseyti.controllers.rendez_vousController;
import tn.esprit.nafseyti.models.rendez_vous;

import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalTime;
public class ModifierRendezVousController {

    @FXML private ComboBox<Integer> cmbMedecin;
    @FXML private DatePicker datePicker;
    @FXML private TextField txtHeureDebut;
    @FXML private TextField txtHeureFin;
    @FXML private ComboBox<String> cmbTypeSeance;
    @FXML private ComboBox<String> cmbStatut;

    private rendez_vous rendezVous;
    private GestionRendezVousController parentController;

    private rendez_vousController rvController = new rendez_vousController();

    @FXML
    public void initialize() {
        try {
            cmbMedecin.getItems().addAll(rvController.getMedecinsDisponibles());
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // 🔹 recevoir données sélectionnées
    public void setRendezVous(rendez_vous rv) {
        this.rendezVous = rv;


        cmbMedecin.setValue(rv.getMedecinId());

        datePicker.setValue(rv.getDateRendezVous());
        txtHeureDebut.setText(rv.getHeureDebut().toString());
        txtHeureFin.setText(rv.getHeureFin().toString());
        cmbTypeSeance.setValue(rv.getTypeSeance());
        cmbStatut.setValue(rv.getStatut());
    }

    public void setParentController(GestionRendezVousController controller) {
        this.parentController = controller;
    }

    @FXML
    private void handleModifier(ActionEvent event) {

        try {

            rendezVous.setMedecinId(cmbMedecin.getValue());

            rendezVous.setDateRendezVous(datePicker.getValue());
            rendezVous.setHeureDebut(LocalTime.parse(txtHeureDebut.getText()));
            rendezVous.setHeureFin(LocalTime.parse(txtHeureFin.getText()));
            rendezVous.setTypeSeance(cmbTypeSeance.getValue());
            rendezVous.setStatut(cmbStatut.getValue());

            rvController.updateOne(rendezVous);

            parentController.loadRendezVous(); // refresh table
            // 🔥 FERMER LE POPUP
            Stage stage = (Stage) cmbMedecin.getScene().getWindow();
            stage.close();


        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleAnnuler(ActionEvent event) {
        Stage stage = (Stage) cmbMedecin.getScene().getWindow();
        stage.close();
    }
}
