package tn.esprit.projet.gui;

import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.VBox;
import tn.esprit.projet.models.mediaObjectif;
import tn.esprit.projet.models.objectif;
import tn.esprit.projet.models.suivi;
import tn.esprit.projet.services.mediaObjectifService;
import tn.esprit.projet.services.objectifService;
import tn.esprit.projet.services.suiviService;

import java.awt.Desktop;
import java.io.File;
import java.io.IOException;
import java.time.LocalDate;

public class GestionSuiviController {

    // ===== FORMULAIRE SUIVI =====
    @FXML private TextField    txtTitre;
    @FXML private TextArea     txtDescription;
    @FXML private TextField    txtRecherche;
    @FXML private ComboBox<String> cmbTypeSuivi;

    // ===== TABLE SUIVI =====
    @FXML private TableView<suivi>            tableSuivis;
    @FXML private TableColumn<suivi, Integer> colId;
    @FXML private TableColumn<suivi, String>  colTitre;
    @FXML private TableColumn<suivi, String>  colDescription;
    @FXML private TableColumn<suivi, String>  colTypeSuivi;

    // ===== TABLE OBJECTIFS =====
    @FXML private TableView<objectif>            tableObjectifs;
    @FXML private TableColumn<objectif, Integer> colIdObj;
    @FXML private TableColumn<objectif, String>  colTitreObj;
    @FXML private TableColumn<objectif, String>  colDateObj;
    @FXML private TableColumn<objectif, String>  colFichiersObj;
    @FXML private TableColumn<objectif, String>  colValideObj;

    // ===== FORMULAIRE OBJECTIF (caché au départ) =====
    @FXML private VBox      vboxAjoutObjectif;
    @FXML private Label     lblTitreAjoutObj;
    @FXML private TextField txtObjTitre;
    @FXML private TextArea  txtObjDescription;
    @FXML private DatePicker dpObjDate;

    // ===== TABLE MÉDIAS =====
    @FXML private TableView<mediaObjectif>           tableMedias;
    @FXML private TableColumn<mediaObjectif, String> colTypeMedia;
    @FXML private TableColumn<mediaObjectif, String> colNomMedia;
    @FXML private TableColumn<mediaObjectif, String> colDateMedia;

    // ===== LABELS =====
    @FXML private Label lblSuiviSelectionne;
    @FXML private Label lblObjectifSelectionne;

    // ===== SERVICES =====
    private suiviService         service  = new suiviService();
    private objectifService      oService = new objectifService();
    private mediaObjectifService mService = new mediaObjectifService();

    private ObservableList<suivi>         listeSuivis    = FXCollections.observableArrayList();
    private ObservableList<objectif>      listeObjectifs = FXCollections.observableArrayList();
    private ObservableList<mediaObjectif> listeMedias    = FXCollections.observableArrayList();

    private int idSuiviSelectionne    = 0;
    private int idObjectifSelectionne = 0;

    // ===== INITIALISATION =====
    @FXML
    public void initialize() {
        if (cmbTypeSuivi != null) {
            cmbTypeSuivi.getItems().addAll("Psychologique", "Académique", "Social", "Comportemental");
            cmbTypeSuivi.setValue("Psychologique");
        }

        // Colonnes suivi
        colId.setCellValueFactory(new PropertyValueFactory<>("Idsuivi"));
        colTitre.setCellValueFactory(new PropertyValueFactory<>("Titre"));
        colDescription.setCellValueFactory(new PropertyValueFactory<>("Description"));
        if (colTypeSuivi != null)
            colTypeSuivi.setCellValueFactory(new PropertyValueFactory<>("Type_suivi"));

        // Colonnes objectifs
        colIdObj.setCellValueFactory(new PropertyValueFactory<>("Idobjectif"));
        colTitreObj.setCellValueFactory(new PropertyValueFactory<>("Titre"));
        colDateObj.setCellValueFactory(new PropertyValueFactory<>("Date_echeance"));

        if (colValideObj != null)
            colValideObj.setCellValueFactory(c ->
                    new SimpleStringProperty(c.getValue().getvalide() ? "✅ Validé" : "❌ Non validé"));

        if (colFichiersObj != null)
            colFichiersObj.setCellValueFactory(c -> {
                int nb = mService.getByObjectif(c.getValue().getidobjectif()).size();
                return new SimpleStringProperty(nb == 0 ? "—" : nb + " fichier(s)");
            });

        // Colonnes médias
        if (colTypeMedia != null)
            colTypeMedia.setCellValueFactory(c ->
                    new SimpleStringProperty(detecterEmoji(c.getValue().gettype_media())));
        if (colNomMedia != null)
            colNomMedia.setCellValueFactory(c ->
                    new SimpleStringProperty(c.getValue().getNomFichier()));
        if (colDateMedia != null)
            colDateMedia.setCellValueFactory(c -> {
                if (c.getValue().getdate_ajout() != null)
                    return new SimpleStringProperty(c.getValue().getdate_ajout().toString());
                return new SimpleStringProperty("—");
            });

        if (txtRecherche != null)
            txtRecherche.textProperty().addListener((obs, o, n) -> rechercherSuivi(n));

        // Formulaire objectif caché au départ
        if (vboxAjoutObjectif != null) {
            vboxAjoutObjectif.setVisible(false);
            vboxAjoutObjectif.setManaged(false);
        }

        afficherSuivis();
    }

    // ===================== CRUD SUIVI =====================
    @FXML
    public void ajouterSuivi() {
        if (!validerChamps()) return;
        suivi s = new suivi();
        s.settitre(txtTitre.getText().trim());
        s.setdescription(txtDescription.getText().trim());
        s.settype_suivi(cmbTypeSuivi != null && cmbTypeSuivi.getValue() != null
                ? cmbTypeSuivi.getValue() : "Psychologique");
        s.setidutilisateur(1);
        s.setidpsychologue(1);
        service.insertOne(s);
        afficherSuivis();
        viderChamps();
        showAlert("Succès", "✅ Suivi ajouté !", Alert.AlertType.INFORMATION);
    }

    @FXML
    public void modifierSuivi() {
        if (idSuiviSelectionne == 0) {
            showAlert("Attention", "⚠️ Sélectionnez un suivi !", Alert.AlertType.WARNING);
            return;
        }
        if (!validerChamps()) return;
        suivi s = new suivi();
        s.setidsuivi(idSuiviSelectionne);
        s.settitre(txtTitre.getText().trim());
        s.setdescription(txtDescription.getText().trim());
        s.settype_suivi(cmbTypeSuivi != null && cmbTypeSuivi.getValue() != null
                ? cmbTypeSuivi.getValue() : "Psychologique");
        service.updateOne(s);
        afficherSuivis();
        viderChamps();
        showAlert("Succès", "✅ Suivi modifié !", Alert.AlertType.INFORMATION);
    }

    @FXML
    public void supprimerSuivi() {
        suivi s = tableSuivis.getSelectionModel().getSelectedItem();
        if (s == null) {
            showAlert("Attention", "⚠️ Sélectionnez un suivi !", Alert.AlertType.WARNING);
            return;
        }
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setContentText("Supprimer \"" + s.gettitre() + "\" ?");
        confirm.showAndWait().ifPresent(r -> {
            if (r == ButtonType.OK) {
                service.deleteOne(s);
                afficherSuivis();
                viderChamps();
                listeObjectifs.clear();
                listeMedias.clear();
                idSuiviSelectionne = 0;
                // Cacher le formulaire objectif
                cacherFormulaireObjectif();
            }
        });
    }

    @FXML
    public void afficherSuivis() {
        listeSuivis.clear();
        listeSuivis.addAll(service.selectAll());
        tableSuivis.setItems(listeSuivis);
        tableSuivis.refresh();
    }

    // ===== CLIC SUR UN SUIVI =====
    @FXML
    public void chargerSuivi() {
        suivi s = tableSuivis.getSelectionModel().getSelectedItem();
        if (s != null) {
            idSuiviSelectionne = s.getidsuivi();
            txtTitre.setText(s.gettitre());
            txtDescription.setText(s.getdescription());
            if (cmbTypeSuivi != null) cmbTypeSuivi.setValue(s.gettype_suivi());

            if (lblSuiviSelectionne != null)
                lblSuiviSelectionne.setText("🎯 Objectifs de : " + s.gettitre());

            // Charger objectifs
            listeObjectifs.clear();
            listeObjectifs.addAll(oService.selectBySuivi(idSuiviSelectionne));
            if (tableObjectifs != null) {
                tableObjectifs.setItems(listeObjectifs);
                tableObjectifs.refresh();
            }

            // Vider médias
            listeMedias.clear();
            if (tableMedias != null) tableMedias.setItems(listeMedias);

            // Vider formulaire objectif
            viderFormulaireObjectif();
            cacherFormulaireObjectif();
        }
    }

    // ===================== BOUTON "GÉRER LES OBJECTIFS" =====================
    // Ce bouton apparaît dans la colonne Actions du tableau suivis (via cellFactory dans initialize)
    // OU peut être un bouton normal — ici on l'expose comme méthode FXML
    @FXML
    public void afficherFormulaireObjectif() {
        if (idSuiviSelectionne == 0) {
            showAlert("Attention", "⚠️ Sélectionnez d'abord un suivi !", Alert.AlertType.WARNING);
            return;
        }
        if (vboxAjoutObjectif != null) {
            vboxAjoutObjectif.setVisible(true);
            vboxAjoutObjectif.setManaged(true);
            if (lblTitreAjoutObj != null)
                lblTitreAjoutObj.setText("➕ Ajouter un objectif pour : "
                        + tableSuivis.getSelectionModel().getSelectedItem().gettitre());
        }
        idObjectifSelectionne = 0;
        viderFormulaireObjectif();
    }

    // ===================== CRUD OBJECTIF =====================
    @FXML
    public void ajouterObjectif() {
        if (idSuiviSelectionne == 0) {
            showAlert("Attention", "⚠️ Sélectionnez d'abord un suivi !", Alert.AlertType.WARNING);
            return;
        }
        if (txtObjTitre == null || txtObjTitre.getText().trim().isEmpty()) {
            showAlert("Erreur", "❌ Le titre de l'objectif est obligatoire !", Alert.AlertType.ERROR);
            return;
        }
        objectif o = new objectif();
        o.setidsuivi(idSuiviSelectionne);
        o.settitre(txtObjTitre.getText().trim());
        o.setdescription(txtObjDescription != null ? txtObjDescription.getText().trim() : "");
        if (dpObjDate != null && dpObjDate.getValue() != null)
            o.setdate_echeance(java.sql.Date.valueOf(dpObjDate.getValue()));

        oService.insertOne(o);

        // Rafraîchir table objectifs
        listeObjectifs.clear();
        listeObjectifs.addAll(oService.selectBySuivi(idSuiviSelectionne));
        tableObjectifs.setItems(listeObjectifs);
        tableObjectifs.refresh();

        viderFormulaireObjectif();
        showAlert("Succès", "✅ Objectif ajouté !", Alert.AlertType.INFORMATION);
    }

    @FXML
    public void modifierObjectif() {
        if (idObjectifSelectionne == 0) {
            showAlert("Attention", "⚠️ Sélectionnez d'abord un objectif dans le tableau !", Alert.AlertType.WARNING);
            return;
        }
        if (txtObjTitre == null || txtObjTitre.getText().trim().isEmpty()) {
            showAlert("Erreur", "❌ Le titre est obligatoire !", Alert.AlertType.ERROR);
            return;
        }
        objectif o = new objectif();
        o.setidobjectif(idObjectifSelectionne);
        o.settitre(txtObjTitre.getText().trim());
        o.setdescription(txtObjDescription != null ? txtObjDescription.getText().trim() : "");
        if (dpObjDate != null && dpObjDate.getValue() != null)
            o.setdate_echeance(java.sql.Date.valueOf(dpObjDate.getValue()));

        oService.updateOne(o);

        listeObjectifs.clear();
        listeObjectifs.addAll(oService.selectBySuivi(idSuiviSelectionne));
        tableObjectifs.setItems(listeObjectifs);
        tableObjectifs.refresh();

        viderFormulaireObjectif();
        idObjectifSelectionne = 0;
        showAlert("Succès", "✅ Objectif modifié !", Alert.AlertType.INFORMATION);
    }

    @FXML
    public void supprimerObjectif() {
        if (tableObjectifs == null) return;
        objectif o = tableObjectifs.getSelectionModel().getSelectedItem();
        if (o == null) {
            showAlert("Attention", "⚠️ Sélectionnez un objectif !", Alert.AlertType.WARNING);
            return;
        }
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setContentText("Supprimer l'objectif \"" + o.gettitre() + "\" ?");
        confirm.showAndWait().ifPresent(r -> {
            if (r == ButtonType.OK) {
                oService.deleteOne(o);
                listeObjectifs.clear();
                listeObjectifs.addAll(oService.selectBySuivi(idSuiviSelectionne));
                tableObjectifs.setItems(listeObjectifs);
                tableObjectifs.refresh();
                viderFormulaireObjectif();
                idObjectifSelectionne = 0;
            }
        });
    }

    // ===== CLIC SUR UN OBJECTIF → remplir formulaire + voir fichiers =====
    @FXML
    public void voirFichiersClient() {
        if (tableObjectifs == null) return;
        objectif o = tableObjectifs.getSelectionModel().getSelectedItem();
        if (o != null) {
            idObjectifSelectionne = o.getidobjectif();

            // Remplir le formulaire objectif
            if (vboxAjoutObjectif != null) {
                vboxAjoutObjectif.setVisible(true);
                vboxAjoutObjectif.setManaged(true);
                if (lblTitreAjoutObj != null)
                    lblTitreAjoutObj.setText("✏️ Modifier l'objectif : " + o.gettitre());
            }
            if (txtObjTitre != null)        txtObjTitre.setText(o.gettitre());
            if (txtObjDescription != null)  txtObjDescription.setText(o.getdescription() != null ? o.getdescription() : "");
            if (dpObjDate != null && o.getdate_echeance() != null)
                dpObjDate.setValue(o.getdate_echeance().toLocalDate());

            // Charger fichiers client
            if (lblObjectifSelectionne != null)
                lblObjectifSelectionne.setText("📎 Fichiers pour : " + o.gettitre());
            listeMedias.clear();
            listeMedias.addAll(mService.getByObjectif(idObjectifSelectionne));
            if (tableMedias != null) {
                tableMedias.setItems(listeMedias);
                tableMedias.refresh();
            }
        }
    }

    // ===== OUVRIR FICHIER CLIENT =====
    @FXML
    public void ouvrirFichierClient() {
        if (tableMedias == null) return;
        mediaObjectif m = tableMedias.getSelectionModel().getSelectedItem();
        if (m == null) {
            showAlert("Attention", "⚠️ Sélectionnez un fichier !", Alert.AlertType.WARNING);
            return;
        }
        try {
            File f = new File(m.getchemin_fichier());
            if (f.exists()) Desktop.getDesktop().open(f);
            else showAlert("Erreur", "❌ Fichier introuvable !", Alert.AlertType.ERROR);
        } catch (IOException e) {
            showAlert("Erreur", "❌ Impossible d'ouvrir !", Alert.AlertType.ERROR);
        }
    }

    // ===== VALIDER OBJECTIF =====
    @FXML
    public void validerObjectif() {
        if (tableObjectifs == null) return;
        objectif o = tableObjectifs.getSelectionModel().getSelectedItem();
        if (o == null) {
            showAlert("Attention", "⚠️ Sélectionnez un objectif !", Alert.AlertType.WARNING);
            return;
        }
        oService.validerObjectif(o.getidobjectif());
        chargerSuivi();
        showAlert("Succès", "✅ Objectif validé !", Alert.AlertType.INFORMATION);
    }

    // ===== UTILITAIRES =====
    private void rechercherSuivi(String motCle) {
        if (motCle == null || motCle.trim().isEmpty()) afficherSuivis();
        else {
            listeSuivis.clear();
            listeSuivis.addAll(service.rechercher(motCle.trim()));
            tableSuivis.setItems(listeSuivis);
            tableSuivis.refresh();
        }
    }

    private void viderChamps() {
        txtTitre.clear();
        txtDescription.clear();
        if (cmbTypeSuivi != null) cmbTypeSuivi.setValue("Psychologique");
        tableSuivis.getSelectionModel().clearSelection();
        idSuiviSelectionne = 0;
    }

    private void viderFormulaireObjectif() {
        if (txtObjTitre != null)       txtObjTitre.clear();
        if (txtObjDescription != null) txtObjDescription.clear();
        if (dpObjDate != null)         dpObjDate.setValue(null);
    }

    private void cacherFormulaireObjectif() {
        if (vboxAjoutObjectif != null) {
            vboxAjoutObjectif.setVisible(false);
            vboxAjoutObjectif.setManaged(false);
        }
        idObjectifSelectionne = 0;
    }

    private boolean validerChamps() {
        if (txtTitre.getText() == null || txtTitre.getText().trim().isEmpty()) {
            showAlert("Erreur", "❌ Le titre est obligatoire !", Alert.AlertType.ERROR);
            return false;
        }
        return true;
    }

    private String detecterEmoji(String type) {
        if (type == null) return "📄";
        switch (type) {
            case "image":    return "🖼️ image";
            case "video":    return "🎥 video";
            case "document": return "📄 document";
            default:         return "📄 " + type;
        }
    }

    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
