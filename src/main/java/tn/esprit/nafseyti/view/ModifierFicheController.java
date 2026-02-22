package tn.esprit.nafseyti.view;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import tn.esprit.nafseyti.controllers.fiche_consultationController;
import tn.esprit.nafseyti.models.fiche_consultation;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class ModifierFicheController {
    @FXML
    private ComboBox<Integer> cmbRendezVousId;

    @FXML
    private TextArea txtProbleme, txtDiagnostic, txtTraitement, txtRecommandations, txtNotes;

    @FXML
    private Button btnAnnuler, btnEnregistrer;

    private fiche_consultationController fcController;
    private fiche_consultation ficheAModifier; // Stocker la fiche à modifier

    public void initialize() {
        fcController = new fiche_consultationController();
        loadRendezVousIds();

        btnEnregistrer.setOnAction(e -> modifierFiche());
        btnAnnuler.setOnAction(e -> btnAnnuler.getScene().getWindow().hide());
    }

    // Charger tous les IDs de rendez_vous
    private void loadRendezVousIds() {
        ObservableList<Integer> listIds = FXCollections.observableArrayList();
        String req = "SELECT id FROM rendez_vous";

        Connection cnx = MyBDConnexion.getInstance().getCnx();
        try (PreparedStatement pst = cnx.prepareStatement(req);
             ResultSet rs = pst.executeQuery()) {

            while (rs.next()) {
                listIds.add(rs.getInt("id"));
            }
            cmbRendezVousId.setItems(listIds);

        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }

    // Méthode appelée depuis GestionFicheConsultationController pour pré-remplir les champs
    public void setFicheConsultation(fiche_consultation fiche) {
        this.ficheAModifier = fiche;

        // Pré-remplir les champs avec les données de la fiche
        cmbRendezVousId.setValue(fiche.getRendezVousId());
        txtProbleme.setText(fiche.getProblemePrincipal());
        txtDiagnostic.setText(fiche.getDiagnostic());
        txtTraitement.setText(fiche.getTraitement());
        txtRecommandations.setText(fiche.getRecommandations());
        txtNotes.setText(fiche.getNotes());
    }

    // Méthode de validation des champs
    private boolean validerChamps() {
        StringBuilder erreurs = new StringBuilder();

        if (cmbRendezVousId.getValue() == null) {
            erreurs.append("- Veuillez sélectionner un rendez-vous\n");
        }

        if (txtProbleme.getText() == null || txtProbleme.getText().trim().isEmpty()) {
            erreurs.append("- Le champ 'Problème principal' est obligatoire\n");
        }

        if (txtDiagnostic.getText() == null || txtDiagnostic.getText().trim().isEmpty()) {
            erreurs.append("- Le champ 'Diagnostic' est obligatoire\n");
        }

        if (txtTraitement.getText() == null || txtTraitement.getText().trim().isEmpty()) {
            erreurs.append("- Le champ 'Traitement' est obligatoire\n");
        }

        if (txtRecommandations.getText() == null || txtRecommandations.getText().trim().isEmpty()) {
            erreurs.append("- Le champ 'Recommandations' est obligatoire\n");
        }

        if (txtNotes.getText() == null || txtNotes.getText().trim().isEmpty()) {
            erreurs.append("- Le champ 'Notes' est obligatoire\n");
        }

        if (erreurs.length() > 0) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur de validation");
            alert.setHeaderText("Veuillez corriger les erreurs suivantes :");
            alert.setContentText(erreurs.toString());
            alert.showAndWait();
            return false;
        }

        return true;
    }

    // Modifier la fiche
    private void modifierFiche() {
        if (!validerChamps()) {
            return;
        }

        try {
            // Mettre à jour les valeurs de la fiche
            ficheAModifier.setRendezVousId(cmbRendezVousId.getValue());
            ficheAModifier.setProblemePrincipal(txtProbleme.getText().trim());
            ficheAModifier.setDiagnostic(txtDiagnostic.getText().trim());
            ficheAModifier.setTraitement(txtTraitement.getText().trim());
            ficheAModifier.setRecommandations(txtRecommandations.getText().trim());
            ficheAModifier.setNotes(txtNotes.getText().trim());

            // Appeler la méthode updateOne du controller
            fcController.updateOne(ficheAModifier);

            // Afficher un message de succès
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Succès");
            alert.setHeaderText(null);
            alert.setContentText("La fiche de consultation a été modifiée avec succès !");
            alert.showAndWait();

            // Fermer la popup
            btnEnregistrer.getScene().getWindow().hide();

        } catch (Exception e) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur");
            alert.setHeaderText("Erreur lors de la modification");
            alert.setContentText("Une erreur est survenue : " + e.getMessage());
            alert.showAndWait();
            e.printStackTrace();
        }
    }
}
