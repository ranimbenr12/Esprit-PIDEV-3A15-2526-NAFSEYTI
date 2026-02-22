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
public class NouvelleFicheController {
    @FXML
    private ComboBox<Integer> cmbRendezVousId;

    @FXML
    private TextArea txtProbleme, txtDiagnostic, txtTraitement, txtRecommandations, txtNotes;

    @FXML
    private Button btnAnnuler, btnEnregistrer;

    private fiche_consultationController fcController;

    public void initialize() {
        fcController = new fiche_consultationController();
        loadRendezVousIds();

        btnEnregistrer.setOnAction(e -> ajouterFiche());
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

    // Méthode de validation des champs
    private boolean validerChamps() {
        StringBuilder erreurs = new StringBuilder();

        // Vérifier le ComboBox
        if (cmbRendezVousId.getValue() == null) {
            erreurs.append("- Veuillez sélectionner un rendez-vous\n");
        }

        // Vérifier les champs texte
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

        // Afficher les erreurs s'il y en a
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

    // Ajouter une fiche
    private void ajouterFiche() {
        // Valider les champs avant l'insertion
        if (!validerChamps()) {
            return; // Arrêter si la validation échoue
        }

        try {
            int rvId = cmbRendezVousId.getValue();
            String probleme = txtProbleme.getText().trim();
            String diagnostic = txtDiagnostic.getText().trim();
            String traitement = txtTraitement.getText().trim();
            String recommandations = txtRecommandations.getText().trim();
            String notes = txtNotes.getText().trim();

            fiche_consultation fc = new fiche_consultation(
                    0, // id auto_increment
                    rvId,
                    notes,
                    probleme,
                    diagnostic,
                    recommandations,
                    traitement,
                    null // created_at auto
            );

            fcController.insertOne(fc);

            // Afficher un message de succès
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Succès");
            alert.setHeaderText(null);
            alert.setContentText("La fiche de consultation a été ajoutée avec succès !");
            alert.showAndWait();

            // Fermer popup après insertion
            btnEnregistrer.getScene().getWindow().hide();

        } catch (Exception e) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur");
            alert.setHeaderText("Erreur lors de l'ajout");
            alert.setContentText("Une erreur est survenue : " + e.getMessage());
            alert.showAndWait();
            e.printStackTrace();
        }
    }
}
