package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.stage.Stage;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.Locale;
import java.util.Optional;
import java.util.ResourceBundle;

public class ListeFichesConsultationController implements Initializable {

    @FXML private BorderPane mainBorderPane;
    @FXML private VBox fichesContainer;
    @FXML private TextField searchField;
    @FXML private Label psychologueNameLabel;

    private int psychologueId = 2;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        loadPsychologueName();
        loadFichesConsultation();
        setupSearch();
    }

    public void setPsychologueId(int psychologueId) {
        this.psychologueId = psychologueId;
        loadFichesConsultation();
    }

    private void loadPsychologueName() {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement("SELECT firstname, lastname FROM users WHERE id = ?");
            pst.setInt(1, psychologueId);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                psychologueNameLabel.setText("Dr. " + rs.getString("firstname") + " " + rs.getString("lastname"));
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void setupSearch() {
        if (searchField != null) {
            searchField.textProperty().addListener((obs, oldVal, newVal) -> loadFichesConsultation());
        }
    }

    private void loadFichesConsultation() {
        fichesContainer.getChildren().clear();

        StringBuilder query = new StringBuilder(
                "SELECT " +
                        "    fc.id, " +
                        "    fc.rendez_vous_id, " +
                        "    rv.dateRendezVous AS date_consultation, " +
                        "    rv.heureDebut AS heure_consultation, " +
                        "    rv.type_seance, " +
                        "    fc.notes, " +
                        "    fc.probleme_principal, " +
                        "    fc.diagnostic, " +
                        "    fc.recommandations, " +
                        "    fc.traitement, " +
                        "    fc.created_at, " +
                        "    u.firstname AS patient_prenom, " +
                        "    u.lastname AS patient_nom, " +
                        "    u.email AS patient_email, " +
                        "    u.phone_number AS patient_phone " +
                        "FROM fiche_consultation fc " +
                        "INNER JOIN rendez_vous rv ON fc.rendez_vous_id = rv.id " +
                        "INNER JOIN users u ON rv.userId = u.id " +
                        "WHERE rv.medecinId = ? "
        );

        String searchText = searchField != null ? searchField.getText().trim() : "";
        if (!searchText.isEmpty()) {
            query.append("AND (LOWER(u.firstname) LIKE LOWER(?) OR LOWER(u.lastname) LIKE LOWER(?)) ");
        }

        query.append("ORDER BY rv.dateRendezVous DESC");

        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(query.toString());
            pst.setInt(1, psychologueId);

            if (!searchText.isEmpty()) {
                String searchPattern = "%" + searchText + "%";
                pst.setString(2, searchPattern);
                pst.setString(3, searchPattern);
            }

            ResultSet rs = pst.executeQuery();
            boolean hasFiches = false;

            while (rs.next()) {
                hasFiches = true;

                int ficheId = rs.getInt("id");
                LocalDate dateConsultation = rs.getDate("date_consultation").toLocalDate();
                LocalTime heureConsultation = rs.getTime("heure_consultation") != null
                        ? rs.getTime("heure_consultation").toLocalTime() : null;
                String typeSeance = rs.getString("type_seance");
                String notes = rs.getString("notes");
                String problemePrincipal = rs.getString("probleme_principal");
                String diagnostic = rs.getString("diagnostic");
                String recommandations = rs.getString("recommandations");
                String traitement = rs.getString("traitement");
                String patientPrenom = rs.getString("patient_prenom");
                String patientNom = rs.getString("patient_nom");
                String patientEmail = rs.getString("patient_email");
                String patientPhone = rs.getString("patient_phone");

                VBox ficheCard = createOrganizedFicheCard(
                        ficheId, dateConsultation, heureConsultation, typeSeance,
                        notes, problemePrincipal, diagnostic, recommandations, traitement,
                        patientPrenom, patientNom, patientEmail, patientPhone
                );
                fichesContainer.getChildren().add(ficheCard);
            }

            if (!hasFiches) {
                Label emptyLabel = new Label(
                        searchText.isEmpty()
                                ? "Aucune fiche de consultation pour le moment"
                                : "Aucune fiche trouvée pour cette recherche"
                );
                emptyLabel.setStyle("-fx-text-fill: #888; -fx-font-style: italic; -fx-padding: 30; -fx-font-size: 14px;");
                fichesContainer.getChildren().add(emptyLabel);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    /**
     * Créer une carte organisée avec couleurs nude
     */
    private VBox createOrganizedFicheCard(int ficheId, LocalDate dateConsultation,
                                          LocalTime heureConsultation, String typeSeance,
                                          String notes, String problemePrincipal, String diagnostic,
                                          String recommandations, String traitement,
                                          String patientPrenom, String patientNom,
                                          String patientEmail, String patientPhone) {

        VBox mainCard = new VBox(0);
        mainCard.setStyle(
                "-fx-background-color: #FAF8F6; " +
                        "-fx-border-color: #E8E3DD; " +
                        "-fx-border-width: 1; " +
                        "-fx-border-radius: 12; " +
                        "-fx-background-radius: 12; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.06), 8, 0, 0, 2);"
        );

        // ========== HEADER COMPACT ==========
        HBox header = new HBox(15);
        header.setPadding(new Insets(15, 20, 15, 20));
        header.setAlignment(Pos.CENTER_LEFT);
        header.setStyle("-fx-background-color: #F5F1EC; -fx-background-radius: 12 12 0 0;");

        // Colonne 1 : Patient
        VBox patientBox = new VBox(3);
        Label patientName = new Label(patientPrenom + " " + patientNom);
        patientName.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #4A4542;");

        HBox contactRow = new HBox(10);
        if (patientEmail != null && !patientEmail.isEmpty()) {
            Label email = new Label(patientEmail);
            email.setStyle("-fx-font-size: 10px; -fx-text-fill: #8B8580;");
            contactRow.getChildren().add(email);
        }
        if (patientPhone != null && !patientPhone.isEmpty()) {
            Label phone = new Label("• " + patientPhone);
            phone.setStyle("-fx-font-size: 10px; -fx-text-fill: #8B8580;");
            contactRow.getChildren().add(phone);
        }
        patientBox.getChildren().addAll(patientName, contactRow);

        Region spacer1 = new Region();
        HBox.setHgrow(spacer1, Priority.ALWAYS);

        // Colonne 2 : Date/Heure
        VBox dateBox = new VBox(2);
        dateBox.setAlignment(Pos.CENTER_RIGHT);
        DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("dd/MM/yyyy", Locale.FRENCH);
        Label dateLabel = new Label(dateFormatter.format(dateConsultation));
        dateLabel.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: #6B5D52;");

        if (heureConsultation != null) {
            Label timeLabel = new Label(heureConsultation.toString());
            timeLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #8B8580;");
            dateBox.getChildren().add(timeLabel);
        }
        dateBox.getChildren().add(dateLabel);

        // Colonne 3 : Type + Badge ID
        VBox badgeBox = new VBox(3);
        badgeBox.setAlignment(Pos.CENTER_RIGHT);

        if (typeSeance != null && !typeSeance.isEmpty()) {
            Label typeLabel = new Label(typeSeance);
            typeLabel.setStyle(
                    "-fx-font-size: 9px; -fx-text-fill: #8B8580; " +
                            "-fx-background-color: #E8E3DD; " +
                            "-fx-padding: 3 8; -fx-background-radius: 8;"
            );
            badgeBox.getChildren().add(typeLabel);
        }

        Label idBadge = new Label("#" + ficheId);
        idBadge.setStyle(
                "-fx-font-size: 10px; -fx-font-weight: bold; -fx-text-fill: #6B5D52; " +
                        "-fx-background-color: #D9D3CC; " +
                        "-fx-padding: 3 10; -fx-background-radius: 10;"
        );
        badgeBox.getChildren().add(idBadge);

        header.getChildren().addAll(patientBox, spacer1, dateBox, badgeBox);

        // ========== BODY : GRILLE 2 COLONNES ==========
        GridPane contentGrid = new GridPane();
        contentGrid.setPadding(new Insets(18, 20, 18, 20));
        contentGrid.setHgap(20);
        contentGrid.setVgap(12);
        contentGrid.setStyle("-fx-background-color: #FAF8F6;");

        int row = 0;

        // Ligne 1 : Notes | Problème principal
        if (notes != null && !notes.isEmpty()) {
            VBox notesBox = createCompactInfoBox("Notes", notes, "#C9B8A8");
            contentGrid.add(notesBox, 0, row);
        }
        if (problemePrincipal != null && !problemePrincipal.isEmpty()) {
            VBox problemeBox = createCompactInfoBox("Problème", problemePrincipal, "#D4A373");
            contentGrid.add(problemeBox, 1, row);
        }
        if (notes != null || problemePrincipal != null) row++;

        // Ligne 2 : Diagnostic | Recommandations
        if (diagnostic != null && !diagnostic.isEmpty()) {
            VBox diagBox = createCompactInfoBox("Diagnostic", diagnostic, "#B8906D");
            contentGrid.add(diagBox, 0, row);
        }
        if (recommandations != null && !recommandations.isEmpty()) {
            VBox recoBox = createCompactInfoBox("Recommandations", recommandations, "#9C8470");
            contentGrid.add(recoBox, 1, row);
        }
        if (diagnostic != null || recommandations != null) row++;

        // Ligne 3 : Traitement (pleine largeur)
        if (traitement != null && !traitement.isEmpty()) {
            VBox traitBox = createCompactInfoBox("Traitement", traitement, "#8B7865");
            contentGrid.add(traitBox, 0, row, 2, 1);
        }

        // Contraintes colonnes égales
        ColumnConstraints col1 = new ColumnConstraints();
        col1.setPercentWidth(50);
        ColumnConstraints col2 = new ColumnConstraints();
        col2.setPercentWidth(50);
        contentGrid.getColumnConstraints().addAll(col1, col2);

        // ========== FOOTER : ACTIONS ==========
        HBox footer = new HBox(10);
        footer.setPadding(new Insets(12, 20, 15, 20));
        footer.setAlignment(Pos.CENTER_RIGHT);
        footer.setStyle("-fx-background-color: #F5F1EC; -fx-background-radius: 0 0 12 12;");

        Button editBtn = createNudeButton("Modifier", "#B8906D", ficheId, true);
        Button deleteBtn = createNudeButton("Supprimer", "#A67C52", ficheId, false);

        footer.getChildren().addAll(editBtn, deleteBtn);

        // Assemblage
        mainCard.getChildren().addAll(header, contentGrid, footer);

        // Effet hover
        mainCard.setOnMouseEntered(e -> mainCard.setStyle(
                "-fx-background-color: #FAF8F6; " +
                        "-fx-border-color: #D9D3CC; " +
                        "-fx-border-width: 1; " +
                        "-fx-border-radius: 12; " +
                        "-fx-background-radius: 12; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.12), 12, 0, 0, 3);"
        ));
        mainCard.setOnMouseExited(e -> mainCard.setStyle(
                "-fx-background-color: #FAF8F6; " +
                        "-fx-border-color: #E8E3DD; " +
                        "-fx-border-width: 1; " +
                        "-fx-border-radius: 12; " +
                        "-fx-background-radius: 12; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.06), 8, 0, 0, 2);"
        ));

        return mainCard;
    }

    /**
     * Créer une box d'information compacte
     */
    private VBox createCompactInfoBox(String title, String content, String borderColor) {
        VBox box = new VBox(6);
        box.setPadding(new Insets(10, 12, 10, 12));
        box.setStyle(
                "-fx-background-color: white; " +
                        "-fx-border-color: " + borderColor + "; " +
                        "-fx-border-width: 0 0 0 3; " +
                        "-fx-border-radius: 0; " +
                        "-fx-background-radius: 6;"
        );

        Label titleLabel = new Label(title);
        titleLabel.setStyle(
                "-fx-font-size: 10px; -fx-font-weight: bold; " +
                        "-fx-text-fill: " + borderColor + "; " +
                        "-fx-text-transform: uppercase;"
        );

        Label contentLabel = new Label(content);
        contentLabel.setStyle(
                "-fx-font-size: 12px; -fx-text-fill: #4A4542; " +
                        "-fx-line-spacing: 1px;"
        );
        contentLabel.setWrapText(true);

        box.getChildren().addAll(titleLabel, contentLabel);
        return box;
    }

    /**
     * Créer un bouton nude minimaliste
     */
    private Button createNudeButton(String text, String color, int ficheId, boolean isEdit) {
        Button button = new Button(text);
        button.setStyle(
                "-fx-background-color: " + color + "; " +
                        "-fx-text-fill: white; " +
                        "-fx-font-size: 11px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-padding: 8 18; " +
                        "-fx-background-radius: 20; " +
                        "-fx-cursor: hand; " +
                        "-fx-border-color: transparent;"
        );

        if (isEdit) {
           /* button.setOnAction(e -> modifierFiche(ficheId));*/
        } else {
            button.setOnAction(e -> supprimerFiche(ficheId));
        }

        button.setOnMouseEntered(e -> button.setStyle(
                "-fx-background-color: " + color + "; " +
                        "-fx-text-fill: white; " +
                        "-fx-font-size: 11px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-padding: 8 18; " +
                        "-fx-background-radius: 20; " +
                        "-fx-cursor: hand; " +
                        "-fx-opacity: 0.85;"
        ));

        button.setOnMouseExited(e -> button.setStyle(
                "-fx-background-color: " + color + "; " +
                        "-fx-text-fill: white; " +
                        "-fx-font-size: 11px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-padding: 8 18; " +
                        "-fx-background-radius: 20; " +
                        "-fx-cursor: hand; " +
                        "-fx-border-color: transparent;"
        ));

        return button;
    }

    /*private void modifierFiche(int ficheId) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlPsychologue/ModifierFicheConsultation.fxml"));
            VBox root = loader.load();

            ModifierFicheConsultationController controller = loader.getController();
            controller.setFicheId(ficheId);

            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.setTitle("Modifier la fiche de consultation");
            stage.setResizable(false);
            stage.centerOnScreen();
            stage.showAndWait();

            loadFichesConsultation();

        } catch (IOException e) {
            e.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible d'ouvrir la fenêtre de modification");
        }
    }*/

    private void supprimerFiche(int ficheId) {
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Retirer cette fiche ?");
        confirmAlert.setContentText("Cette action est irréversible. Voulez-vous vraiment retirer cette fiche de consultation ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                Connection cnx = MyBDConnexion.getInstance().getCnx();
                PreparedStatement pst = cnx.prepareStatement("DELETE FROM fiche_consultation WHERE id = ?");
                pst.setInt(1, ficheId);
                int deleted = pst.executeUpdate();

                if (deleted > 0) {
                    showAlert(Alert.AlertType.INFORMATION, "Succès", "Fiche retirée avec succès");
                    loadFichesConsultation();
                }
            } catch (Exception e) {
                e.printStackTrace();
                showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de retirer la fiche");
            }
        }
    }

    @FXML
    private void handleBtnRendezVous() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlPsychologue/PsychologueInterface.fxml"));
            Parent root = loader.load();
            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void showAlert(Alert.AlertType type, String title, String content) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
}