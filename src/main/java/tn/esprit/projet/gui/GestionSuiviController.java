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
import tn.esprit.projet.models.User;
import tn.esprit.projet.services.mediaObjectifService;
import tn.esprit.projet.services.objectifService;
import tn.esprit.projet.services.suiviService;
import tn.esprit.projet.services.UserService;
import tn.esprit.projet.utils.SessionManager;
import tn.esprit.projet.services.PointsService;
import java.awt.Desktop;
import java.io.File;
import java.io.IOException;
import java.time.LocalDate;
import java.util.List;
import java.util.ArrayList;

public class GestionSuiviController {

    // ===== SÉLECTION DU PATIENT =====
    @FXML private ComboBox<String> cmbPatients;
    @FXML private Label lblPatientSelectionne;

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

    // ===== FORMULAIRE OBJECTIF =====
    @FXML private VBox      vboxAjoutObjectif;
    @FXML private Label     lblTitreAjoutObj;
    @FXML private TextField txtObjTitre;
    @FXML private TextArea  txtObjDescription;
    @FXML private DatePicker dpObjDate;
    @FXML private Label lblTotalPoints;

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
    private UserService          userService = new UserService();
    private PointsService        pointsService = new PointsService();

    private ObservableList<suivi>         listeSuivis    = FXCollections.observableArrayList();
    private ObservableList<objectif>      listeObjectifs = FXCollections.observableArrayList();
    private ObservableList<mediaObjectif> listeMedias    = FXCollections.observableArrayList();

    private int idSuiviSelectionne    = 0;
    private int idObjectifSelectionne = 0;
    private int currentUserId = 0;
    private int selectedPatientId = 0;

    // Liste pour stocker tous les patients disponibles
    private List<User> listePatientsDisponibles = new ArrayList<>();

    // ===== INITIALISATION =====
    @FXML
    public void initialize() {
        // Récupérer l'utilisateur connecté (le psychologue)
        if (SessionManager.getInstance().isLoggedIn()) {
            currentUserId = SessionManager.getInstance().getCurrentUser().getId();
            System.out.println("✅ Psychologue connecté: ID=" + currentUserId);

            // Charger la liste des patients (étudiants et enseignants)
            chargerListePatients();
        }

        if (cmbTypeSuivi != null) {
            cmbTypeSuivi.getItems().addAll("Psychologique", "Académique", "Social", "Comportemental");
            cmbTypeSuivi.setValue("Psychologique");
        }

        // Configuration des colonnes SUIVI
        colId.setCellValueFactory(new PropertyValueFactory<>("idsuivi"));
        colTitre.setCellValueFactory(new PropertyValueFactory<>("Titre"));
        colDescription.setCellValueFactory(new PropertyValueFactory<>("Description"));
        if (colTypeSuivi != null)
            colTypeSuivi.setCellValueFactory(new PropertyValueFactory<>("Type_suivi"));

        // Configuration des colonnes OBJECTIFS
        colIdObj.setCellValueFactory(new PropertyValueFactory<>("idobjectif"));
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

        // Configuration des colonnes MÉDIAS
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
            System.out.println("ℹ️ Formulaire objectif initialisé: caché");
        }
    }

    // ===== Charger tous les étudiants et enseignants =====
    private void chargerListePatients() {
        try {
            listePatientsDisponibles.clear();
            cmbPatients.getItems().clear();

            // Récupérer les étudiants
            List<User> etudiants = userService.getUsersByRole("etudiant");
            for (User etudiant : etudiants) {
                listePatientsDisponibles.add(etudiant);
                cmbPatients.getItems().add(etudiant.getId() + " - " + etudiant.getFullName() + " (Étudiant)");
            }

            // Récupérer les enseignants
            List<User> enseignants = userService.getUsersByRole("enseignant");
            for (User enseignant : enseignants) {
                listePatientsDisponibles.add(enseignant);
                cmbPatients.getItems().add(enseignant.getId() + " - " + enseignant.getFullName() + " (Enseignant)");
            }

            System.out.println("✅ " + (etudiants.size() + enseignants.size()) + " patients disponibles chargés");

            // Optionnel : Ajouter une option pour voir tous
            cmbPatients.getItems().add(0, "--- Sélectionnez un patient ---");

        } catch (Exception e) {
            System.err.println("❌ Erreur chargement patients: " + e.getMessage());
            e.printStackTrace();

            // Données de test en cas d'erreur
            cmbPatients.getItems().addAll(
                    "1 - Patient Test (Étudiant)",
                    "2 - Alice Dupont (Étudiante)",
                    "3 - Bob Martin (Enseignant)",
                    "4 - Sophie Turner (Étudiante)"
            );
        }
    }

    // ===== Sélectionner un patient =====
    @FXML
    public void selectionnerPatient() {
        String selection = cmbPatients.getValue();
        if (selection != null && !selection.isEmpty() && !selection.startsWith("---")) {
            try {
                // Extraire l'ID du patient (format "ID - Nom (Rôle)")
                String idPart = selection.split(" - ")[0];
                selectedPatientId = Integer.parseInt(idPart);

                // Trouver le nom complet du patient
                String patientName = selection.substring(selection.indexOf(" - ") + 3);
                lblPatientSelectionne.setText("Patient: " + patientName);

                System.out.println("✅ Patient sélectionné: ID=" + selectedPatientId + " - " + patientName);

                // Charger les suivis de ce patient
                afficherSuivisPatient();

            } catch (Exception e) {
                System.err.println("❌ Erreur sélection patient: " + e.getMessage());
                showAlert("Erreur", "Format de sélection invalide", Alert.AlertType.ERROR);
            }
        } else {
            selectedPatientId = 0;
            lblPatientSelectionne.setText("Aucun patient sélectionné");
            listeSuivis.clear();
            tableSuivis.setItems(listeSuivis);
        }
    }

    // ===== Afficher les suivis du patient sélectionné =====
    private void afficherSuivisPatient() {
        if (selectedPatientId == 0) {
            showAlert("Attention", "Veuillez d'abord sélectionner un patient", Alert.AlertType.WARNING);
            return;
        }

        listeSuivis.clear();
        List<suivi> tousLesSuivis = service.selectByUserId(selectedPatientId);
        listeSuivis.addAll(tousLesSuivis);
        tableSuivis.setItems(listeSuivis);
        tableSuivis.refresh();

        System.out.println("📊 " + listeSuivis.size() + " suivis trouvés pour le patient " + selectedPatientId);
    }

    // ===== AJOUTER UN SUIVI =====
    @FXML
    public void ajouterSuivi() {
        if (selectedPatientId == 0) {
            showAlert("Attention", "⚠️ Veuillez d'abord sélectionner un patient !", Alert.AlertType.WARNING);
            return;
        }

        if (!validerChamps()) return;

        suivi s = new suivi();
        s.settitre(txtTitre.getText().trim());
        s.setdescription(txtDescription.getText().trim());
        s.settype_suivi(cmbTypeSuivi != null && cmbTypeSuivi.getValue() != null
                ? cmbTypeSuivi.getValue() : "Psychologique");

        // Lier le suivi au patient sélectionné
        s.setidutilisateur(selectedPatientId);
        s.setidpsychologue(currentUserId);

        service.insertOne(s);
        afficherSuivisPatient();
        viderChamps();
        showAlert("Succès", "✅ Suivi ajouté pour " + cmbPatients.getValue(), Alert.AlertType.INFORMATION);
    }

    // ===== MODIFIER UN SUIVI =====
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
        s.setidutilisateur(selectedPatientId);
        s.setidpsychologue(currentUserId);

        service.updateOne(s);
        afficherSuivisPatient();
        viderChamps();
        showAlert("Succès", "✅ Suivi modifié !", Alert.AlertType.INFORMATION);
    }

    // ===== SUPPRIMER UN SUIVI =====
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
                afficherSuivisPatient();
                viderChamps();
                listeObjectifs.clear();
                listeMedias.clear();
                idSuiviSelectionne = 0;
                cacherFormulaireObjectif();
            }
        });
    }

    // ===== AFFICHER TOUS LES SUIVIS =====
    @FXML
    public void afficherSuivis() {
        if (selectedPatientId > 0) {
            afficherSuivisPatient();
        } else {
            listeSuivis.clear();
            tableSuivis.setItems(listeSuivis);
        }
    }

    // ===== CHARGER UN SUIVI SÉLECTIONNÉ =====
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

            // Charger les objectifs de ce suivi
            listeObjectifs.clear();
            listeObjectifs.addAll(oService.selectBySuivi(idSuiviSelectionne));
            if (tableObjectifs != null) {
                tableObjectifs.setItems(listeObjectifs);
                tableObjectifs.refresh();
            }

            listeMedias.clear();
            if (tableMedias != null) tableMedias.setItems(listeMedias);

            viderFormulaireObjectif();
            cacherFormulaireObjectif();
        }
    }

    // ===== RECHERCHER UN SUIVI =====
    private void rechercherSuivi(String motCle) {
        if (selectedPatientId == 0) return;

        if (motCle == null || motCle.trim().isEmpty()) {
            afficherSuivisPatient();
        } else {
            listeSuivis.clear();
            List<suivi> resultats = service.rechercher(motCle.trim());

            // Filtrer pour ne garder que les suivis du patient sélectionné
            for (suivi s : resultats) {
                if (s.getidutilisateur() == selectedPatientId) {
                    listeSuivis.add(s);
                }
            }

            tableSuivis.setItems(listeSuivis);
            tableSuivis.refresh();
        }
    }

    // ===== AFFICHER FORMULAIRE OBJECTIF =====
    @FXML
    public void afficherFormulaireObjectif() {
        System.out.println("\n🟠🟠🟠 DÉBUT afficherFormulaireObjectif() 🟠🟠🟠");

        // === VÉRIFICATION 1 : ID du suivi ===
        System.out.println("📌 Vérification 1 - idSuiviSelectionne = " + idSuiviSelectionne);
        if (idSuiviSelectionne == 0) {
            System.out.println("❌ ÉCHEC: pas de suivi sélectionné");
            showAlert("Attention", "⚠️ Sélectionnez d'abord un suivi !", Alert.AlertType.WARNING);
            return;
        }
        System.out.println("✅ idSuiviSelectionne OK");

        // === VÉRIFICATION 2 : VBox ===
        System.out.println("📌 Vérification 2 - vboxAjoutObjectif = " + vboxAjoutObjectif);
        if (vboxAjoutObjectif == null) {
            System.out.println("❌ ÉCHEC CRITIQUE: vboxAjoutObjectif est NULL !");
            System.out.println("   👉 Vérifie que fx:id='vboxAjoutObjectif' existe dans le FXML");
            showAlert("Erreur", "Formulaire objectif introuvable dans le FXML", Alert.AlertType.ERROR);
            return;
        }
        System.out.println("✅ vboxAjoutObjectif existe");

        // === VÉRIFICATION 3 : État avant modification ===
        System.out.println("📌 État avant - visible = " + vboxAjoutObjectif.isVisible());
        System.out.println("📌 État avant - managed = " + vboxAjoutObjectif.isManaged());

        // === ACTION : Rendre visible ===
        System.out.println("📌 ACTION: setVisible(true) et setManaged(true)");
        vboxAjoutObjectif.setVisible(true);
        vboxAjoutObjectif.setManaged(true);

        // === VÉRIFICATION 4 : État après modification ===
        System.out.println("📌 État après - visible = " + vboxAjoutObjectif.isVisible());
        System.out.println("📌 État après - managed = " + vboxAjoutObjectif.isManaged());

        // === VÉRIFICATION 5 : Suivi sélectionné ===
        suivi suiviActuel = tableSuivis.getSelectionModel().getSelectedItem();
        System.out.println("📌 Suivi sélectionné = " + (suiviActuel != null ? suiviActuel.gettitre() : "NULL"));

        // === MISE À JOUR DU TITRE ===
        if (lblTitreAjoutObj != null && suiviActuel != null) {
            lblTitreAjoutObj.setText("➕ Ajouter un objectif pour : " + suiviActuel.gettitre());
            System.out.println("✅ Titre mis à jour: " + suiviActuel.gettitre());
        } else {
            System.out.println("⚠️ lblTitreAjoutObj = " + lblTitreAjoutObj + ", suiviActuel = " + suiviActuel);
        }

        idObjectifSelectionne = 0;
        viderFormulaireObjectif();
        System.out.println("🟠🟠🟠 FIN afficherFormulaireObjectif() 🟠🟠🟠\n");
    }

    // ===== AJOUTER UN OBJECTIF =====
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

        listeObjectifs.clear();
        listeObjectifs.addAll(oService.selectBySuivi(idSuiviSelectionne));
        tableObjectifs.setItems(listeObjectifs);
        tableObjectifs.refresh();

        viderFormulaireObjectif();
        showAlert("Succès", "✅ Objectif ajouté !", Alert.AlertType.INFORMATION);
    }

    // ===== MODIFIER UN OBJECTIF =====
    @FXML
    public void modifierObjectif() {
        if (idObjectifSelectionne == 0) {
            showAlert("Attention", "⚠️ Sélectionnez d'abord un objectif !", Alert.AlertType.WARNING);
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

    // ===== SUPPRIMER UN OBJECTIF =====
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

    // ===== VOIR LES FICHIERS D'UN OBJECTIF =====
    @FXML
    public void voirFichiersClient() {
        if (tableObjectifs == null) return;
        objectif o = tableObjectifs.getSelectionModel().getSelectedItem();
        if (o != null) {
            idObjectifSelectionne = o.getidobjectif();

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

    // ===== OUVRIR UN FICHIER =====
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

    // ===== VALIDER UN OBJECTIF =====
    @FXML
    public void validerObjectif() {
        if (tableObjectifs == null) return;

        objectif o = tableObjectifs.getSelectionModel().getSelectedItem();
        if (o == null) {
            showAlert("Attention", "⚠️ Sélectionnez un objectif !", Alert.AlertType.WARNING);
            return;
        }

        // ✅ Vérifier si l'objectif est déjà validé
        if (o.getvalide()) {
            showAlert("Information", "ℹ️ Cet objectif est déjà validé !", Alert.AlertType.INFORMATION);
            return;
        }

        try {
            // Valider l'objectif
            oService.validerObjectif(o.getidobjectif());

            // Calculer et ajouter les points
            int pointsGagnes = calculerPointsPourObjectif(o);
            pointsService.ajouterPoints(selectedPatientId, o.getidobjectif(), pointsGagnes);

            // ✅ Récupérer le total des points pour confirmation
            int totalPoints = pointsService.getTotalPoints(selectedPatientId);

            // Afficher une confirmation détaillée
            showAlert("Succès",
                    "✅ Objectif validé : " + o.gettitre() + "\n" +
                            "🎁 Points gagnés : " + pointsGagnes + " points\n" +
                            "💰 Total des points : " + totalPoints + " points",
                    Alert.AlertType.INFORMATION);

            // Rafraîchir l'affichage
            chargerSuivi();

            // ✅ Mettre à jour le label de points
            mettreAJourAffichagePoints(totalPoints);

        } catch (Exception e) {
            System.err.println("❌ Erreur validation objectif: " + e.getMessage());
            e.printStackTrace();
            showAlert("Erreur", "Impossible de valider l'objectif : " + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    // ===== ACTUALISER LES POINTS =====
    @FXML
    public void actualiserPoints() {
        if (selectedPatientId == 0) {
            showAlert("Attention", "Veuillez d'abord sélectionner un patient", Alert.AlertType.WARNING);
            return;
        }

        try {
            int totalPoints = pointsService.getTotalPoints(selectedPatientId);
            mettreAJourAffichagePoints(totalPoints);

            // Afficher l'historique des points
            List<tn.esprit.projet.models.Points> historique = pointsService.getHistoriquePoints(selectedPatientId);

            if (historique.isEmpty()) {
                showAlert("Information", "Aucun point pour ce patient", Alert.AlertType.INFORMATION);
                return;
            }

            StringBuilder details = new StringBuilder("Historique des points:\n\n");
            for (tn.esprit.projet.models.Points p : historique) {
                details.append("• ").append(p.getNombrePoints())
                        .append(" pts - ")
                        .append(p.getDateAttribution())
                        .append("\n");
            }

            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Points du patient");
            alert.setHeaderText("💰 Total: " + totalPoints + " points");
            alert.setContentText(details.toString());
            alert.showAndWait();

        } catch (Exception e) {
            System.err.println("❌ Erreur actualisation points: " + e.getMessage());
            showAlert("Erreur", "Impossible d'actualiser les points", Alert.AlertType.ERROR);
        }
    }

    // Méthode pour calculer les points selon l'objectif
    private int calculerPointsPourObjectif(objectif o) {
        // Points de base
        int points = 10;

        try {
            // Bonus si l'objectif a été atteint avant la date d'échéance
            if (o.getdate_echeance() != null) {
                java.util.Date today = new java.util.Date();
                if (o.getdate_echeance().after(today)) {
                    points += 5; // Bonus pour avance
                    System.out.println("✅ Bonus avance: +5 points");
                }
            }

            // Bonus basé sur le titre (mots clés)
            if (o.gettitre() != null) {
                String titre = o.gettitre().toLowerCase();
                if (titre.contains("important") || titre.contains("urgent")) {
                    points += 10;
                    System.out.println("✅ Bonus important: +10 points");
                }
                if (titre.contains("difficile") || titre.contains("challenge") || titre.contains("complexe")) {
                    points += 15;
                    System.out.println("✅ Bonus difficulté: +15 points");
                }
            }

        } catch (Exception e) {
            System.err.println("⚠️ Erreur calcul points: " + e.getMessage());
            // En cas d'erreur, garder les points de base
        }

        return points;
    }

    // ✅ Méthode pour mettre à jour l'affichage des points
    private void mettreAJourAffichagePoints(int totalPoints) {
        // Chercher un label pour afficher les points
        if (lblTotalPoints != null) {
            lblTotalPoints.setText("💰 Total points: " + totalPoints);
        }

        // Log dans la console
        System.out.println("💰 Total points du patient " + selectedPatientId + ": " + totalPoints);
    }

    // ===== VOIR LES POINTS DU PATIENT =====
    @FXML
    public void voirPointsPatient() {
        if (selectedPatientId == 0) {
            showAlert("Attention", "Veuillez d'abord sélectionner un patient", Alert.AlertType.WARNING);
            return;
        }

        int totalPoints = pointsService.getTotalPoints(selectedPatientId);

        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Points du patient");
        alert.setHeaderText("🎯 Total des points: " + totalPoints);

        // Récupérer l'historique
        List<tn.esprit.projet.models.Points> historique = pointsService.getHistoriquePoints(selectedPatientId);
        StringBuilder details = new StringBuilder("Détail des points gagnés :\n\n");

        for (tn.esprit.projet.models.Points p : historique) {
            details.append("• ").append(p.getNombrePoints())
                    .append(" pts - ").append(p.getDateAttribution())
                    .append("\n");
        }

        alert.setContentText(details.toString());
        alert.showAndWait();
    }

    // ===== SETTER POUR L'ID DU PSYCHOLOGUE =====
    public void setCurrentUserId(int userId) {
        this.currentUserId = userId;
        chargerListePatients();
    }

    // ===== UTILITAIRES =====
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

    // ===== MÉTHODE DE DIAGNOSTIC =====
    @FXML
    public void diagnostiquer() {
        System.out.println("\n🔍 ===== DIAGNOSTIC =====");
        System.out.println("1. selectedPatientId = " + selectedPatientId);
        System.out.println("2. currentUserId = " + currentUserId);
        System.out.println("3. idSuiviSelectionne = " + idSuiviSelectionne);
        System.out.println("4. vboxAjoutObjectif = " + (vboxAjoutObjectif != null ? "existe" : "NULL"));
        if (vboxAjoutObjectif != null) {
            System.out.println("   - visible = " + vboxAjoutObjectif.isVisible());
            System.out.println("   - managed = " + vboxAjoutObjectif.isManaged());
        }
        System.out.println("5. tableObjectifs = " + (tableObjectifs != null ? "existe" : "NULL"));
        System.out.println("6. listeObjectifs size = " + listeObjectifs.size());

        // Tester la connexion BDD
        try {
            List<suivi> tous = service.selectAll();
            System.out.println("7. Total suivis dans BDD: " + tous.size());
        } catch (Exception e) {
            System.err.println("❌ Erreur diagnostic: " + e.getMessage());
        }
        System.out.println("🔍 ===== FIN DIAGNOSTIC =====\n");
    }
}