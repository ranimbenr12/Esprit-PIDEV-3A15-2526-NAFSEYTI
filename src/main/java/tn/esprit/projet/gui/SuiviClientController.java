package tn.esprit.projet.gui;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import tn.esprit.projet.models.*;
import tn.esprit.projet.services.*;
import tn.esprit.projet.utils.SessionManager;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.StandardCopyOption;
import java.time.format.DateTimeFormatter;
import java.util.List;

public class SuiviClientController {

    @FXML private Label lblTotalPoints;
    @FXML private Button btnRecompenses;

    @FXML private TableView<suivi> tableSuivis;
    @FXML private TableColumn<suivi, Integer> colIdSuivi;
    @FXML private TableColumn<suivi, String> colTitreSuivi;
    @FXML private TableColumn<suivi, String> colDescSuivi;

    @FXML private Label lblSuiviSelectionne;
    @FXML private TableView<objectif> tableObjectifs;
    @FXML private TableColumn<objectif, Integer> colIdObj;
    @FXML private TableColumn<objectif, String> colTitreObj;
    @FXML private TableColumn<objectif, String> colNbFichiers;
    @FXML private TableColumn<objectif, String> colValide;

    @FXML private Label lblObjectifSelectionne;
    @FXML private Label lblFichierChoisi;
    @FXML private ImageView imgPreview;
    @FXML private VBox vboxPreview;

    @FXML private Label lblMediasTitre;
    @FXML private TableView<mediaObjectif> tableMedias;
    @FXML private TableColumn<mediaObjectif, String> colTypeMedia;
    @FXML private TableColumn<mediaObjectif, String> colNomFichier;
    @FXML private TableColumn<mediaObjectif, String> colDateMedia;

    private User currentUser;
    private suiviService suiviService = new suiviService();
    private objectifService objectifService = new objectifService();
    private mediaObjectifService mediaService = new mediaObjectifService();
    private PointsService pointsService = new PointsService();
    private ReductionService reductionService = new ReductionService();

    private ObservableList<suivi> listeSuivis = FXCollections.observableArrayList();
    private ObservableList<objectif> listeObjectifs = FXCollections.observableArrayList();
    private ObservableList<mediaObjectif> listeMedias = FXCollections.observableArrayList();

    private int idSuiviSelectionne = 0;
    private int idObjectifSelectionne = 0;
    private File fichierSelectionne = null;

    @FXML
    public void initialize() {
        currentUser = SessionManager.getInstance().getCurrentUser();
        configurerTableaux();

        if (currentUser != null) {
            mettreAJourPoints();
            afficherSuivis();
        }
    }

    // ===== MÉTHODE POUR RECEVOIR L'UTILISATEUR =====
    public void setCurrentUser(User user) {
        this.currentUser = user;
        if (user != null) {
            System.out.println("✅ SuiviClient - Utilisateur connecté: " + user.getFullName());
            mettreAJourPoints();
            afficherSuivis();
        }
    }

    // ===== CONFIGURATION DES TABLEAUX =====
    private void configurerTableaux() {
        // Tableau des suivis
        colIdSuivi.setCellValueFactory(new PropertyValueFactory<>("idsuivi"));
        colTitreSuivi.setCellValueFactory(new PropertyValueFactory<>("titre"));
        colDescSuivi.setCellValueFactory(new PropertyValueFactory<>("description"));

        // Tableau des objectifs
        colIdObj.setCellValueFactory(new PropertyValueFactory<>("idobjectif"));
        colTitreObj.setCellValueFactory(new PropertyValueFactory<>("titre"));

        colNbFichiers.setCellValueFactory(cellData -> {
            int nb = mediaService.getByObjectif(cellData.getValue().getidobjectif()).size();
            return new javafx.beans.property.SimpleStringProperty(nb == 0 ? "—" : nb + " fichier(s)");
        });

        colValide.setCellValueFactory(cellData ->
                new javafx.beans.property.SimpleStringProperty(
                        cellData.getValue().getvalide() ? "✅ Validé" : "❌ Non validé"
                )
        );

        // Tableau des médias
        colTypeMedia.setCellValueFactory(new PropertyValueFactory<>("type_media"));
        colNomFichier.setCellValueFactory(cellData -> {
            // Extraire le nom du fichier depuis le chemin
            String chemin = cellData.getValue().getchemin_fichier();
            if (chemin != null) {
                File file = new File(chemin);
                return new javafx.beans.property.SimpleStringProperty(file.getName());
            }
            return new javafx.beans.property.SimpleStringProperty("—");
        });
        colDateMedia.setCellValueFactory(cellData -> {
            if (cellData.getValue().getdate_ajout() != null) {
                return new javafx.beans.property.SimpleStringProperty(
                        cellData.getValue().getdate_ajout().toLocalDateTime()
                                .format(DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm"))
                );
            }
            return new javafx.beans.property.SimpleStringProperty("—");
        });

        // Lier les listes aux tableaux
        tableSuivis.setItems(listeSuivis);
        tableObjectifs.setItems(listeObjectifs);
        tableMedias.setItems(listeMedias);
    }

    // ===== GESTION DES POINTS =====
    private void mettreAJourPoints() {
        if (currentUser != null && lblTotalPoints != null) {
            int totalPoints = pointsService.getTotalPoints(currentUser.getId());
            lblTotalPoints.setText("🎯 " + totalPoints + " pts");
        }
    }

    // ===== AFFICHER LES SUIVIS =====
    private void afficherSuivis() {
        if (currentUser == null) return;

        listeSuivis.clear();
        listeSuivis.addAll(suiviService.selectByUserId(currentUser.getId()));
        tableSuivis.setItems(listeSuivis);
        tableSuivis.refresh();
        System.out.println("📊 " + listeSuivis.size() + " suivis chargés");
    }

    // ===== CHARGER LES OBJECTIFS D'UN SUIVI =====
    @FXML
    public void chargerObjectifs() {
        suivi s = tableSuivis.getSelectionModel().getSelectedItem();
        if (s != null) {
            idSuiviSelectionne = s.getidsuivi();
            lblSuiviSelectionne.setText("📌 Objectifs du suivi : " + s.gettitre());

            listeObjectifs.clear();
            listeObjectifs.addAll(objectifService.selectBySuivi(idSuiviSelectionne));
            tableObjectifs.setItems(listeObjectifs);
            tableObjectifs.refresh();

            // Vider la sélection d'objectif
            idObjectifSelectionne = 0;
            lblObjectifSelectionne.setText("← Cliquez sur un objectif");
            listeMedias.clear();
        }
    }

    // ===== SÉLECTIONNER UN OBJECTIF =====
    @FXML
    public void selectionnerObjectif() {
        objectif o = tableObjectifs.getSelectionModel().getSelectedItem();
        if (o != null) {
            idObjectifSelectionne = o.getidobjectif();
            lblObjectifSelectionne.setText("Objectif : " + o.gettitre());

            // Charger les fichiers de cet objectif
            listeMedias.clear();
            listeMedias.addAll(mediaService.getByObjectif(idObjectifSelectionne));
            tableMedias.setItems(listeMedias);
            tableMedias.refresh();

            lblMediasTitre.setText("🗂️ Fichiers pour : " + o.gettitre());
        }
    }

    // ===== CHOISIR UN FICHIER =====
    @FXML
    public void choisirFichier() {
        if (idObjectifSelectionne == 0) {
            showAlert("Attention", "Veuillez d'abord sélectionner un objectif", Alert.AlertType.WARNING);
            return;
        }

        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Choisir un fichier");

        // Ajouter des filtres pour les types de fichiers
        fileChooser.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Tous les fichiers", "*.*"),
                new FileChooser.ExtensionFilter("Images", "*.jpg", "*.jpeg", "*.png", "*.gif"),
                new FileChooser.ExtensionFilter("Documents", "*.pdf", "*.docx", "*.txt"),
                new FileChooser.ExtensionFilter("Vidéos", "*.mp4", "*.avi", "*.mov")
        );

        File file = fileChooser.showOpenDialog(null);
        if (file != null) {
            fichierSelectionne = file;
            lblFichierChoisi.setText(file.getName());

            // Prévisualisation pour les images
            String fileName = file.getName().toLowerCase();
            if (fileName.endsWith(".jpg") || fileName.endsWith(".jpeg") ||
                    fileName.endsWith(".png") || fileName.endsWith(".gif")) {
                try {
                    Image image = new Image(file.toURI().toString());
                    imgPreview.setImage(image);
                    vboxPreview.setVisible(true);
                    vboxPreview.setManaged(true);
                } catch (Exception e) {
                    vboxPreview.setVisible(false);
                    vboxPreview.setManaged(false);
                }
            } else {
                vboxPreview.setVisible(false);
                vboxPreview.setManaged(false);
            }
        }
    }

    // ===== UPLOADER LE FICHIER =====
    @FXML
    public void uploadFichier() {
        if (idObjectifSelectionne == 0) {
            showAlert("Attention", "Veuillez d'abord sélectionner un objectif", Alert.AlertType.WARNING);
            return;
        }

        if (fichierSelectionne == null) {
            showAlert("Attention", "Veuillez d'abord choisir un fichier", Alert.AlertType.WARNING);
            return;
        }

        try {
            // Créer le dossier uploads s'il n'existe pas
            String uploadDir = "uploads";
            File dir = new File(uploadDir);
            if (!dir.exists()) {
                dir.mkdirs();
            }

            // Copier le fichier
            String fileName = System.currentTimeMillis() + "_" + fichierSelectionne.getName();
            Path destination = Path.of(uploadDir, fileName);
            Files.copy(fichierSelectionne.toPath(), destination, StandardCopyOption.REPLACE_EXISTING);

            // Déterminer le type de média
            String type = "document";
            String ext = fichierSelectionne.getName().toLowerCase();
            if (ext.endsWith(".jpg") || ext.endsWith(".jpeg") || ext.endsWith(".png") || ext.endsWith(".gif")) {
                type = "image";
            } else if (ext.endsWith(".mp4") || ext.endsWith(".avi") || ext.endsWith(".mov") || ext.endsWith(".mkv")) {
                type = "video";
            } else if (ext.endsWith(".pdf") || ext.endsWith(".docx") || ext.endsWith(".txt")) {
                type = "document";
            }

            // Utiliser les méthodes du service
            mediaObjectif media = new mediaObjectif();
            media.setid_objectif(idObjectifSelectionne);
            media.settype_media(type);
            media.setchemin_fichier(destination.toString());

            mediaService.insertOne(media);

            // Rafraîchir la liste
            listeMedias.clear();
            listeMedias.addAll(mediaService.getByObjectif(idObjectifSelectionne));
            tableMedias.setItems(listeMedias);
            tableMedias.refresh();

            // Réinitialiser
            fichierSelectionne = null;
            lblFichierChoisi.setText("Aucun fichier choisi");
            vboxPreview.setVisible(false);
            vboxPreview.setManaged(false);

            showAlert("Succès", "✅ Fichier envoyé avec succès !", Alert.AlertType.INFORMATION);

        } catch (IOException e) {
            showAlert("Erreur", "Impossible d'uploader le fichier: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    // ===== OUVRIR UN FICHIER =====
    @FXML
    public void ouvrirFichier() {
        mediaObjectif media = tableMedias.getSelectionModel().getSelectedItem();
        if (media == null) {
            showAlert("Attention", "Veuillez sélectionner un fichier", Alert.AlertType.WARNING);
            return;
        }

        try {
            File file = new File(media.getchemin_fichier());
            if (file.exists()) {
                java.awt.Desktop.getDesktop().open(file);
            } else {
                showAlert("Erreur", "Fichier introuvable", Alert.AlertType.ERROR);
            }
        } catch (IOException e) {
            showAlert("Erreur", "Impossible d'ouvrir le fichier", Alert.AlertType.ERROR);
        }
    }

    // ===== SUPPRIMER UN FICHIER =====
    @FXML
    public void supprimerMedia() {
        mediaObjectif media = tableMedias.getSelectionModel().getSelectedItem();
        if (media == null) {
            showAlert("Attention", "Veuillez sélectionner un fichier", Alert.AlertType.WARNING);
            return;
        }

        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText(null);
        confirm.setContentText("Voulez-vous vraiment supprimer ce fichier ?");

        confirm.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                try {
                    // Supprimer le fichier physique
                    File file = new File(media.getchemin_fichier());
                    if (file.exists()) {
                        file.delete();
                    }

                    // Utiliser getid_media()
                    mediaService.deleteOne(media.getid_media());

                    // Rafraîchir la liste
                    listeMedias.remove(media);
                    tableMedias.refresh();

                    showAlert("Succès", "✅ Fichier supprimé", Alert.AlertType.INFORMATION);

                } catch (Exception e) {
                    showAlert("Erreur", "Impossible de supprimer le fichier", Alert.AlertType.ERROR);
                }
            }
        });
    }

    // ===== SÉLECTIONNER UN MÉDIA =====
    @FXML
    public void selectionnerMedia() {
        // Rien à faire, la sélection est gérée par le bouton Ouvrir/Supprimer
    }

    // ===== BOUTON RÉCOMPENSES (AVEC LOGS DE DÉBOGAGE) =====
    @FXML
    public void handleBtnRecompenses() {
        if (currentUser == null) return;

        int totalPoints = pointsService.getTotalPoints(currentUser.getId());

        // Créer une nouvelle fenêtre pour la boutique
        Stage stage = new Stage();
        stage.setTitle("🎁 Boutique de récompenses");

        VBox root = new VBox(15);
        root.setPadding(new Insets(20));
        root.setStyle("-fx-background-color: white;");

        // En-tête avec les points
        HBox header = new HBox(10);
        header.setAlignment(Pos.CENTER_LEFT);
        Label title = new Label("🎁 Boutique de récompenses");
        title.setStyle("-fx-font-size: 22px; -fx-font-weight: bold; -fx-text-fill: #6c5ce7;");

        Label pointsLabel = new Label("Vos points: " + totalPoints);
        pointsLabel.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #27ae60; -fx-padding: 5 15; -fx-background-color: #e8f5e9; -fx-background-radius: 20;");

        Region spacer = new Region();
        HBox.setHgrow(spacer, javafx.scene.layout.Priority.ALWAYS);
        header.getChildren().addAll(title, spacer, pointsLabel);

        // Liste des réductions disponibles
        ListView<Reduction> listView = new ListView<>();
        listView.setPrefHeight(400);

        try {
            // Récupérer TOUTES les réductions
            ObservableList<Reduction> reductions = FXCollections.observableArrayList(
                    reductionService.getAllReductions()
            );
            listView.setItems(reductions);

            listView.setCellFactory(lv -> new ListCell<Reduction>() {
                @Override
                protected void updateItem(Reduction item, boolean empty) {
                    super.updateItem(item, empty);
                    if (empty || item == null) {
                        setText(null);
                        setGraphic(null);
                    } else {
                        HBox cellBox = new HBox(10);
                        cellBox.setPadding(new Insets(15));
                        cellBox.setAlignment(Pos.CENTER_LEFT);
                        cellBox.setPrefHeight(80);

                        // Partie gauche avec les infos principales
                        VBox leftBox = new VBox(5);

                        // Nom de la marque en grand
                        Label marqueLabel = new Label(item.getNomMarque());
                        marqueLabel.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #2c3e50;");

                        // Description
                        Label descLabel = new Label(item.getDescription());
                        descLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #666;");

                        leftBox.getChildren().addAll(marqueLabel, descLabel);

                        // Partie droite avec les points et pourcentage
                        VBox rightBox = new VBox(5);
                        rightBox.setAlignment(Pos.CENTER_RIGHT);

                        // Points requis en grand
                        Label pointsReqLabel = new Label(item.getPointsRequis() + " pts");
                        pointsReqLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #e67e22;");

                        // Pourcentage de réduction
                        Label pourcLabel = new Label(item.getPourcentageReduction() + "% de réduction");
                        pourcLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #27ae60;");

                        rightBox.getChildren().addAll(pointsReqLabel, pourcLabel);

                        // Indicateur de disponibilité
                        Label dispoLabel = new Label();
                        if (totalPoints >= item.getPointsRequis()) {
                            dispoLabel.setText("✅ DISPONIBLE");
                            dispoLabel.setStyle("-fx-text-fill: #27ae60; -fx-font-size: 12px; -fx-font-weight: bold;");
                            cellBox.setStyle("-fx-background-color: #f0fff0; -fx-background-radius: 8;");
                        } else {
                            int manque = item.getPointsRequis() - totalPoints;
                            dispoLabel.setText("❌ IL MANQUE " + manque + " PTS");
                            dispoLabel.setStyle("-fx-text-fill: #e74c3c; -fx-font-size: 12px; -fx-font-weight: bold;");
                            cellBox.setStyle("-fx-background-color: #fff0f0; -fx-background-radius: 8;");
                        }

                        // Organiser l'affichage
                        HBox topRow = new HBox(10);
                        topRow.setAlignment(Pos.CENTER_LEFT);
                        topRow.getChildren().addAll(leftBox, new Region(), rightBox);
                        HBox.setHgrow(topRow.getChildren().get(1), javafx.scene.layout.Priority.ALWAYS);

                        VBox mainBox = new VBox(5);
                        mainBox.getChildren().addAll(topRow, dispoLabel);

                        cellBox.getChildren().add(mainBox);
                        setGraphic(cellBox);
                    }
                }
            });
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement réductions: " + e.getMessage());
        }

        // Bouton d'achat
        Button btnAcheter = new Button("🎁 Échanger mes points");
        btnAcheter.setStyle("-fx-background-color: #6c5ce7; -fx-text-fill: white; -fx-font-weight: bold; -fx-font-size: 14px; -fx-padding: 12 25; -fx-background-radius: 8; -fx-cursor: hand;");
        btnAcheter.setMaxWidth(200);

        Label lblMessage = new Label();
        lblMessage.setStyle("-fx-font-size: 12px;");

        btnAcheter.setOnAction(e -> {
            Reduction selected = listView.getSelectionModel().getSelectedItem();
            if (selected == null) {
                lblMessage.setStyle("-fx-text-fill: red; -fx-font-weight: bold;");
                lblMessage.setText("❌ Veuillez sélectionner une réduction");
                return;
            }

            // ✅ LOGS DE DÉBOGAGE ULTRA-DÉTAILLÉS
            int reductionId = selected.getIdReduction();
            System.out.println("\n🔍🔍🔍 VÉRIFICATION ID 🔍🔍🔍");
            System.out.println("   selected.getClass() = " + selected.getClass().getName());
            System.out.println("   selected.toString() = " + selected.toString());
            System.out.println("   selected.getIdReduction() = " + reductionId);
            System.out.println("   selected.getNomMarque() = " + selected.getNomMarque());
            System.out.println("   selected.getPointsRequis() = " + selected.getPointsRequis());
            System.out.println("   selected.getPourcentageReduction() = " + selected.getPourcentageReduction());
            System.out.println("🔍🔍🔍 FIN VÉRIFICATION 🔍🔍🔍\n");

            // Vérifier que l'ID est valide
            if (reductionId <= 0) {
                lblMessage.setStyle("-fx-text-fill: red; -fx-font-weight: bold;");
                lblMessage.setText("❌ Erreur: ID de réduction invalide (" + reductionId + ")");
                System.err.println("❌ ERREUR: ID de réduction = " + reductionId);
                return;
            }

            // Afficher les détails dans la console
            System.out.println("\n🔍 RÉDUCTION SÉLECTIONNÉE:");
            System.out.println("   Nom: " + selected.getNomMarque());
            System.out.println("   ID: " + reductionId);
            System.out.println("   Points requis: " + selected.getPointsRequis());
            System.out.println("   Pourcentage: " + selected.getPourcentageReduction() + "%");
            System.out.println("   Vos points: " + totalPoints);

            // Vérifier si l'utilisateur a assez de points
            if (totalPoints < selected.getPointsRequis()) {
                int pointsManquants = selected.getPointsRequis() - totalPoints;
                lblMessage.setStyle("-fx-text-fill: red; -fx-font-weight: bold;");
                lblMessage.setText("❌ " + selected.getNomMarque() + " nécessite " + selected.getPointsRequis() +
                        " points. Il vous manque " + pointsManquants + " points !");
                return;
            }

            boolean success = reductionService.acheterReduction(currentUser.getId(), reductionId);
            if (success) {
                lblMessage.setStyle("-fx-text-fill: green; -fx-font-weight: bold;");
                String code = genererCodePromo();
                lblMessage.setText("✅ Félicitations ! Code: " + code);
                mettreAJourPoints();
                stage.close();

                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Succès");
                alert.setHeaderText("🎉 Réduction obtenue !");
                alert.setContentText("Votre code promo: " + code + "\n\nPrésentez ce code à " + selected.getNomMarque() + " pour bénéficier de " + selected.getPourcentageReduction() + "% de réduction.");
                alert.showAndWait();
            } else {
                lblMessage.setStyle("-fx-text-fill: red;");
                lblMessage.setText("❌ Erreur lors de l'échange");
            }
        });

        HBox buttonBox = new HBox(10);
        buttonBox.setAlignment(Pos.CENTER);
        buttonBox.getChildren().addAll(btnAcheter);

        root.getChildren().addAll(header, listView, buttonBox, lblMessage);

        Scene scene = new Scene(root, 900, 650);
        stage.setScene(scene);
        stage.show();
    }

    private String genererCodePromo() {
        String chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        StringBuilder code = new StringBuilder();
        for (int i = 0; i < 8; i++) {
            int index = (int)(Math.random() * chars.length());
            code.append(chars.charAt(index));
        }
        return "NAFSEYTI-" + code.toString();
    }

    // ===== UTILITAIRE =====
    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}