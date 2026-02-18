package tn.esprit.projet.gui;

import javafx.application.Platform;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import tn.esprit.projet.models.mediaObjectif;
import tn.esprit.projet.models.objectif;
import tn.esprit.projet.models.suivi;
import tn.esprit.projet.services.mediaObjectifService;
import tn.esprit.projet.services.objectifService;
import tn.esprit.projet.services.suiviService;

import java.awt.Desktop;
import java.io.File;
import java.io.IOException;
import java.nio.file.*;
import java.util.List;

public class SuiviClientController {

    @FXML private TableView<suivi>            tableSuivis;
    @FXML private TableColumn<suivi, Integer> colIdSuivi;
    @FXML private TableColumn<suivi, String>  colTitreSuivi;
    @FXML private TableColumn<suivi, String>  colDescSuivi;

    @FXML private TableView<objectif>            tableObjectifs;
    @FXML private TableColumn<objectif, Integer> colIdObj;
    @FXML private TableColumn<objectif, String>  colTitreObj;
    @FXML private TableColumn<objectif, String>  colNbFichiers;
    @FXML private TableColumn<objectif, String>  colValide;

    @FXML private TableView<mediaObjectif>           tableMedias;
    @FXML private TableColumn<mediaObjectif, String> colTypeMedia;
    @FXML private TableColumn<mediaObjectif, String> colNomFichier;
    @FXML private TableColumn<mediaObjectif, String> colDateMedia;

    @FXML private Label     lblSuiviSelectionne;
    @FXML private Label     lblObjectifSelectionne;
    @FXML private Label     lblFichierChoisi;
    @FXML private Label     lblMediasTitre;
    @FXML private ImageView imgPreview;
    @FXML private VBox      vboxPreview;

    private suiviService         sService = new suiviService();
    private objectifService      oService = new objectifService();
    private mediaObjectifService mService = new mediaObjectifService();

    private ObservableList<suivi>         listeSuivis    = FXCollections.observableArrayList();
    private ObservableList<objectif>      listeObjectifs = FXCollections.observableArrayList();
    private ObservableList<mediaObjectif> listeMedias    = FXCollections.observableArrayList();

    private int  idSuiviSelectionne    = 0;
    private int  idObjectifSelectionne = 0;
    private File fichierSelectionne    = null;

    private static final String UPLOAD_DIR =
            System.getProperty("user.home") + File.separator + "nafseyti_uploads" + File.separator;

    @FXML
    public void initialize() {

        // ===== Colonnes Suivis =====
        colIdSuivi.setCellValueFactory(new PropertyValueFactory<>("Idsuivi"));
        colTitreSuivi.setCellValueFactory(new PropertyValueFactory<>("Titre"));
        colDescSuivi.setCellValueFactory(new PropertyValueFactory<>("Description"));

        // ===== Colonnes Objectifs =====
        colIdObj.setCellValueFactory(new PropertyValueFactory<>("Idobjectif"));
        colTitreObj.setCellValueFactory(new PropertyValueFactory<>("Titre"));

        // ✅ Affiche ✅ Validé ou ❌ Non validé
        if (colValide != null)
            colValide.setCellValueFactory(cellData ->
                    new SimpleStringProperty(
                            cellData.getValue().getvalide() ? "✅ Validé" : "❌ Non validé"
                    )
            );

        // ✅ Nombre de fichiers déposés
        if (colNbFichiers != null)
            colNbFichiers.setCellValueFactory(cellData -> {
                int nb = mService.getByObjectif(
                        cellData.getValue().getidobjectif()
                ).size();
                return new SimpleStringProperty(nb == 0 ? "—" : nb + " fichier(s)");
            });

        // ===== Colonnes Médias =====
        if (colTypeMedia != null)
            colTypeMedia.setCellValueFactory(cellData ->
                    new SimpleStringProperty(detecterEmoji(cellData.getValue().gettype_media()))
            );

        if (colNomFichier != null)
            colNomFichier.setCellValueFactory(cellData ->
                    new SimpleStringProperty(cellData.getValue().getNomFichier())
            );

        if (colDateMedia != null)
            colDateMedia.setCellValueFactory(cellData -> {
                if (cellData.getValue().getdate_ajout() != null)
                    return new SimpleStringProperty(
                            cellData.getValue().getdate_ajout().toString()
                    );
                return new SimpleStringProperty("—");
            });

        // ✅ Créer le dossier upload
        new File(UPLOAD_DIR).mkdirs();

        // ✅ Charger les suivis après rendu
        Platform.runLater(() -> afficherSuivis());
    }

    // ===================== AFFICHER SUIVIS =====================
    private void afficherSuivis() {
        List<suivi> result = sService.selectAll();
        System.out.println("=== Suivis : " + result.size() + " ===");
        listeSuivis.clear();
        listeSuivis.addAll(result);
        tableSuivis.setItems(listeSuivis);
        tableSuivis.refresh();
        System.out.println("✅ Suivis affichés !");
    }

    // ===================== CLIC SUR UN SUIVI =====================
    @FXML
    public void chargerObjectifs() {
        suivi s = tableSuivis.getSelectionModel().getSelectedItem();
        if (s != null) {
            idSuiviSelectionne = s.getidsuivi();
            if (lblSuiviSelectionne != null)
                lblSuiviSelectionne.setText("📌 Objectifs du suivi : " + s.gettitre());

            List<objectif> objList = oService.selectBySuivi(idSuiviSelectionne);
            System.out.println("=== Objectifs : " + objList.size() + " ===");
            listeObjectifs.clear();
            listeObjectifs.addAll(objList);
            tableObjectifs.setItems(listeObjectifs);
            tableObjectifs.refresh();

            // Vider les médias
            listeMedias.clear();
            if (tableMedias != null) tableMedias.setItems(listeMedias);
            resetUpload();
        }
    }

    // ===================== CLIC SUR UN OBJECTIF =====================
    @FXML
    public void selectionnerObjectif() {
        objectif o = tableObjectifs.getSelectionModel().getSelectedItem();
        if (o != null) {
            idObjectifSelectionne = o.getidobjectif();

            if (lblObjectifSelectionne != null)
                lblObjectifSelectionne.setText(o.gettitre());

            // ✅ Charger les médias de cet objectif
            listeMedias.clear();
            listeMedias.addAll(mService.getByObjectif(idObjectifSelectionne));
            System.out.println("=== Médias : " + listeMedias.size() + " ===");

            if (tableMedias != null) {
                tableMedias.setItems(listeMedias);
                tableMedias.refresh();
            }

            if (lblMediasTitre != null)
                lblMediasTitre.setText("🗂️ Fichiers pour : " + o.gettitre()
                        + " (" + listeMedias.size() + ")");

            if (lblFichierChoisi != null)
                lblFichierChoisi.setText("Aucun nouveau fichier choisi");

            if (vboxPreview != null)
                vboxPreview.setVisible(false);
        }
    }

    // ===================== CLIC SUR UN MEDIA =====================
    @FXML
    public void selectionnerMedia() {
        if (tableMedias == null) return;
        mediaObjectif m = tableMedias.getSelectionModel().getSelectedItem();
        if (m != null && "image".equals(m.gettype_media()))
            afficherPreview(m.getchemin_fichier());
        else if (vboxPreview != null)
            vboxPreview.setVisible(false);
    }

    // ===================== CHOISIR UN FICHIER =====================
    @FXML
    public void choisirFichier() {
        if (idObjectifSelectionne == 0) {
            showAlert("Attention",
                    "⚠️ Sélectionnez d'abord un objectif !",
                    Alert.AlertType.WARNING);
            return;
        }
        FileChooser fc = new FileChooser();
        fc.setTitle("Choisir un fichier pour valider l'objectif");
        fc.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Images",    "*.jpg","*.jpeg","*.png","*.gif","*.bmp"),
                new FileChooser.ExtensionFilter("Vidéos",    "*.mp4","*.avi","*.mkv","*.mov"),
                new FileChooser.ExtensionFilter("Documents", "*.pdf","*.doc","*.docx","*.txt"),
                new FileChooser.ExtensionFilter("Tous",      "*.*")
        );
        Stage stage = (Stage) tableSuivis.getScene().getWindow();
        fichierSelectionne = fc.showOpenDialog(stage);
        if (fichierSelectionne != null) {
            if (lblFichierChoisi != null)
                lblFichierChoisi.setText("📎 " + fichierSelectionne.getName());
            if (detecterType(fichierSelectionne.getName()).equals("image"))
                afficherPreview(fichierSelectionne.getAbsolutePath());
            else if (vboxPreview != null)
                vboxPreview.setVisible(false);
        }
    }

    // ===================== ENVOYER LE FICHIER =====================
    @FXML
    public void uploadFichier() {
        if (fichierSelectionne == null) {
            showAlert("Attention",
                    "⚠️ Choisissez d'abord un fichier !",
                    Alert.AlertType.WARNING);
            return;
        }
        if (idObjectifSelectionne == 0) {
            showAlert("Attention",
                    "⚠️ Sélectionnez d'abord un objectif !",
                    Alert.AlertType.WARNING);
            return;
        }
        try {
            // ✅ Copier le fichier dans le dossier uploads
            String nomFichier  = System.currentTimeMillis() + "_" + fichierSelectionne.getName();
            Path   destination = Paths.get(UPLOAD_DIR + nomFichier);
            Files.copy(fichierSelectionne.toPath(), destination,
                    StandardCopyOption.REPLACE_EXISTING);

            System.out.println("✅ Fichier copié : " + destination);

            // ✅ Enregistrer dans la base de données
            mediaObjectif m = new mediaObjectif();
            m.setid_objectif(idObjectifSelectionne);
            m.settype_media(detecterType(fichierSelectionne.getName()));
            m.setchemin_fichier(destination.toString());
            mService.insertOne(m);

            System.out.println("✅ Média enregistré en BD !");

            // ✅ Rafraîchir
            selectionnerObjectif();
            tableObjectifs.refresh();

            // ✅ Réinitialiser
            fichierSelectionne = null;
            if (lblFichierChoisi != null)
                lblFichierChoisi.setText("Aucun nouveau fichier choisi");
            if (vboxPreview != null)
                vboxPreview.setVisible(false);

            showAlert("Succès",
                    "✅ Fichier envoyé au psychologue !",
                    Alert.AlertType.INFORMATION);

        } catch (IOException e) {
            System.err.println("❌ Erreur upload : " + e.getMessage());
            showAlert("Erreur", "❌ " + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    // ===================== OUVRIR UN FICHIER =====================
    @FXML
    public void ouvrirFichier() {
        if (tableMedias == null) return;
        mediaObjectif m = tableMedias.getSelectionModel().getSelectedItem();
        if (m == null) {
            showAlert("Attention", "⚠️ Sélectionnez un fichier !", Alert.AlertType.WARNING);
            return;
        }
        try {
            File f = new File(m.getchemin_fichier());
            if (f.exists())
                Desktop.getDesktop().open(f);
            else
                showAlert("Erreur", "❌ Fichier introuvable !", Alert.AlertType.ERROR);
        } catch (IOException e) {
            showAlert("Erreur", "❌ Impossible d'ouvrir !", Alert.AlertType.ERROR);
        }
    }

    // ===================== SUPPRIMER UN FICHIER =====================
    @FXML
    public void supprimerMedia() {
        if (tableMedias == null) return;
        mediaObjectif m = tableMedias.getSelectionModel().getSelectedItem();
        if (m == null) {
            showAlert("Attention", "⚠️ Sélectionnez un fichier !", Alert.AlertType.WARNING);
            return;
        }
        Alert c = new Alert(Alert.AlertType.CONFIRMATION);
        c.setTitle("Confirmation");
        c.setContentText("Supprimer : " + m.getNomFichier() + " ?");
        c.showAndWait().ifPresent(r -> {
            if (r == ButtonType.OK) {
                // ✅ Supprimer de la BD
                mService.deleteOne(m.getid_media());
                // ✅ Supprimer le fichier physique
                new File(m.getchemin_fichier()).delete();
                // ✅ Rafraîchir
                selectionnerObjectif();
                tableObjectifs.refresh();
                if (vboxPreview != null) vboxPreview.setVisible(false);
                System.out.println("✅ Média supprimé !");
            }
        });
    }

    // ===================== PRÉVISUALISATION =====================
    private void afficherPreview(String path) {
        if (imgPreview != null && vboxPreview != null) {
            try {
                imgPreview.setImage(new Image(new File(path).toURI().toString()));
                vboxPreview.setVisible(true);
            } catch (Exception e) {
                vboxPreview.setVisible(false);
            }
        }
    }

    // ===================== DÉTECTER TYPE =====================
    private String detecterType(String nom) {
        nom = nom.toLowerCase();
        if (nom.endsWith(".jpg") || nom.endsWith(".jpeg") ||
                nom.endsWith(".png") || nom.endsWith(".gif")  ||
                nom.endsWith(".bmp"))
            return "image";
        if (nom.endsWith(".mp4") || nom.endsWith(".avi") ||
                nom.endsWith(".mkv") || nom.endsWith(".mov"))
            return "video";
        return "document";
    }

    // ✅ Emoji selon le type
    private String detecterEmoji(String type) {
        if (type == null) return "📄";
        switch (type) {
            case "image":    return "🖼️ image";
            case "video":    return "🎥 video";
            case "document": return "📄 document";
            default:         return "📄 " + type;
        }
    }

    // ===================== RESET UPLOAD =====================
    private void resetUpload() {
        idObjectifSelectionne = 0;
        fichierSelectionne    = null;
        if (lblObjectifSelectionne != null)
            lblObjectifSelectionne.setText(
                    "← Cliquez d'abord sur un objectif dans le tableau ci-dessus"
            );
        if (lblFichierChoisi != null)
            lblFichierChoisi.setText("Aucun fichier choisi");
        if (vboxPreview != null)
            vboxPreview.setVisible(false);
    }

    // ===================== ALERTE =====================
    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
