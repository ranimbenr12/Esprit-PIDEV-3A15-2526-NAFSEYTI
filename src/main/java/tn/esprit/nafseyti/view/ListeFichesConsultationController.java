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
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import tn.esprit.nafseyti.utils.FicheConsultationPdfExporter;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.io.File;
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

    private int psychologueId = 6;
    private String medecinNomComplet = "Dr. Psychologue";

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        loadPsychologueName();
        loadFichesConsultation();
        setupSearch();
    }

    public void setPsychologueId(int psychologueId) {
        this.psychologueId = psychologueId;
        loadPsychologueName();
        loadFichesConsultation();
    }

    private void loadPsychologueName() {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement("SELECT firstname, lastname FROM users WHERE id = ?");
            pst.setInt(1, psychologueId);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                String prenom = rs.getString("firstname");
                String nom = rs.getString("lastname");
                medecinNomComplet = "Dr. " + prenom + " " + nom;
                psychologueNameLabel.setText(medecinNomComplet);
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
                        "INNER JOIN reservationRendez_vous rr ON rr.rendez_vous_id = rv.id " +
                        "INNER JOIN users u ON rr.user_id = u.id " +
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
                        "-fx-border-radius: 14; " +
                        "-fx-background-radius: 14; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.07), 10, 0, 0, 3);"
        );

        // ========== HEADER ==========
        HBox header = new HBox(15);
        header.setPadding(new Insets(16, 20, 16, 20));
        header.setAlignment(Pos.CENTER_LEFT);
        header.setStyle("-fx-background-color: #F5F1EC; -fx-background-radius: 14 14 0 0;");

        // Badge ID coloré à gauche
        Label idBadge = new Label("#" + ficheId);
        idBadge.setStyle(
                "-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: white; " +
                        "-fx-background-color: #285921; " +
                        "-fx-padding: 6 12; -fx-background-radius: 20;"
        );

        VBox patientBox = new VBox(3);
        Label patientName = new Label(patientPrenom + " " + patientNom);
        patientName.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #4A4542;");

        HBox contactRow = new HBox(10);
        if (patientEmail != null && !patientEmail.isEmpty()) {
            Label email = new Label("✉ " + patientEmail);
            email.setStyle("-fx-font-size: 10px; -fx-text-fill: #8B8580;");
            contactRow.getChildren().add(email);
        }
        if (patientPhone != null && !patientPhone.isEmpty()) {
            Label phone = new Label("📞 " + patientPhone);
            phone.setStyle("-fx-font-size: 10px; -fx-text-fill: #8B8580;");
            contactRow.getChildren().add(phone);
        }
        patientBox.getChildren().addAll(patientName, contactRow);

        Region spacer1 = new Region();
        HBox.setHgrow(spacer1, Priority.ALWAYS);

        // Date + type à droite
        VBox dateBox = new VBox(4);
        dateBox.setAlignment(Pos.CENTER_RIGHT);
        DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("dd MMM yyyy", Locale.FRENCH);
        Label dateLabel = new Label("📅 " + dateFormatter.format(dateConsultation));
        dateLabel.setStyle("-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: #6B5D52;");

        if (heureConsultation != null) {
            Label timeLabel = new Label("🕐 " + heureConsultation.toString());
            timeLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #8B8580;");
            dateBox.getChildren().add(timeLabel);
        }
        dateBox.getChildren().add(dateLabel);

        if (typeSeance != null && !typeSeance.isEmpty()) {
            Label typeLabel = new Label(typeSeance);
            typeLabel.setStyle(
                    "-fx-font-size: 9px; -fx-text-fill: #6B5D52; " +
                            "-fx-background-color: #E8E3DD; " +
                            "-fx-padding: 3 8; -fx-background-radius: 8; -fx-font-weight: bold;"
            );
            dateBox.getChildren().add(typeLabel);
        }

        header.getChildren().addAll(idBadge, patientBox, spacer1, dateBox);

        // ========== BODY : GRILLE 2 COLONNES ==========
        GridPane contentGrid = new GridPane();
        contentGrid.setPadding(new Insets(18, 20, 14, 20));
        contentGrid.setHgap(16);
        contentGrid.setVgap(10);
        contentGrid.setStyle("-fx-background-color: #FAF8F6;");

        int row = 0;

        if (notes != null && !notes.isEmpty()) {
            contentGrid.add(createCompactInfoBox("Notes", notes, "#C9B8A8"), 0, row);
        }
        if (problemePrincipal != null && !problemePrincipal.isEmpty()) {
            contentGrid.add(createCompactInfoBox("Problème principal", problemePrincipal, "#D4A373"), 1, row);
        }
        if (notes != null || problemePrincipal != null) row++;

        if (diagnostic != null && !diagnostic.isEmpty()) {
            contentGrid.add(createCompactInfoBox("Diagnostic", diagnostic, "#B8906D"), 0, row);
        }
        if (recommandations != null && !recommandations.isEmpty()) {
            contentGrid.add(createCompactInfoBox("Recommandations", recommandations, "#9C8470"), 1, row);
        }
        if (diagnostic != null || recommandations != null) row++;

        if (traitement != null && !traitement.isEmpty()) {
            contentGrid.add(createCompactInfoBox("Traitement", traitement, "#8B7865"), 0, row, 2, 1);
        }

        ColumnConstraints col1 = new ColumnConstraints();
        col1.setPercentWidth(50);
        ColumnConstraints col2 = new ColumnConstraints();
        col2.setPercentWidth(50);
        contentGrid.getColumnConstraints().addAll(col1, col2);

        // ========== FOOTER : BOUTONS ==========
        HBox footer = new HBox(10);
        footer.setPadding(new Insets(12, 20, 14, 20));
        footer.setAlignment(Pos.CENTER_RIGHT);
        footer.setStyle("-fx-background-color: #F0ECE7; -fx-background-radius: 0 0 14 14;");

        // Bouton PDF (prioritaire, mis en avant)
        Button pdfBtn = new Button("📄 Exporter PDF");
        pdfBtn.setStyle(
                "-fx-background-color: #fdb9ce; " +
                        "-fx-text-fill: white; " +
                        "-fx-font-size: 11px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-padding: 8 20; " +
                        "-fx-background-radius: 20; " +
                        "-fx-cursor: hand;"
        );
        pdfBtn.setOnMouseEntered(e -> pdfBtn.setStyle(
                "-fx-background-color: #374535; -fx-text-fill: white; -fx-font-size: 11px; " +
                        "-fx-font-weight: bold; -fx-padding: 8 20; -fx-background-radius: 20; -fx-cursor: hand;"
        ));
        pdfBtn.setOnMouseExited(e -> pdfBtn.setStyle(
                "-fx-background-color: #fdb9ce; -fx-text-fill: white; -fx-font-size: 11px; " +
                        "-fx-font-weight: bold; -fx-padding: 8 20; -fx-background-radius: 20; -fx-cursor: hand;"
        ));
        pdfBtn.setOnAction(e -> exporterEnPdf(
                ficheId, patientPrenom, patientNom, patientEmail, patientPhone,
                dateConsultation, heureConsultation, typeSeance,
                notes, problemePrincipal, diagnostic, recommandations, traitement
        ));

        Button editBtn = createActionButton("✏ Modifier", "#B8906D", ficheId, true);
        Button deleteBtn = createActionButton("🗑 Supprimer", "#A67C52", ficheId, false);

        footer.getChildren().addAll(pdfBtn, editBtn, deleteBtn);

        mainCard.getChildren().addAll(header, contentGrid, footer);

        // Effet hover sur la carte
        mainCard.setOnMouseEntered(e -> mainCard.setStyle(
                "-fx-background-color: #FAF8F6; -fx-border-color: #C9B8A8; " +
                        "-fx-border-width: 1; -fx-border-radius: 14; -fx-background-radius: 14; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.14), 14, 0, 0, 4);"
        ));
        mainCard.setOnMouseExited(e -> mainCard.setStyle(
                "-fx-background-color: #FAF8F6; -fx-border-color: #E8E3DD; " +
                        "-fx-border-width: 1; -fx-border-radius: 14; -fx-background-radius: 14; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.07), 10, 0, 0, 3);"
        ));

        return mainCard;
    }

    // ─────────────────────────────────────────────
    //  Export PDF
    // ─────────────────────────────────────────────
    private void exporterEnPdf(int ficheId, String patientPrenom, String patientNom,
                               String patientEmail, String patientPhone,
                               LocalDate dateConsultation, LocalTime heureConsultation,
                               String typeSeance, String notes, String problemePrincipal,
                               String diagnostic, String recommandations, String traitement) {
        try {
            String bureau = System.getProperty("user.home") + "/Desktop/";
            String nomFichier = bureau + "fiche_" + patientPrenom + "_" + patientNom + "_" + ficheId + ".pdf";

            FicheConsultationPdfExporter.exporterFiche(
                    nomFichier, ficheId, patientPrenom, patientNom,
                    patientEmail, patientPhone, dateConsultation,
                    heureConsultation, typeSeance, notes,
                    problemePrincipal, diagnostic, recommandations,
                    traitement, medecinNomComplet
            );

            showAlert(Alert.AlertType.INFORMATION, "Export réussi",
                    "✅ Fiche exportée sur le bureau :\n" + nomFichier);

        } catch (Exception ex) {
            ex.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Erreur d'export",
                    "❌ Impossible de générer le PDF : " + ex.getMessage());
        }
    }

    private VBox createCompactInfoBox(String title, String content, String borderColor) {
        VBox box = new VBox(6);
        box.setPadding(new Insets(10, 12, 10, 14));
        box.setStyle(
                "-fx-background-color: white; " +
                        "-fx-border-color: " + borderColor + "; " +
                        "-fx-border-width: 0 0 0 4; " +
                        "-fx-background-radius: 6;"
        );

        Label titleLabel = new Label(title.toUpperCase());
        titleLabel.setStyle(
                "-fx-font-size: 9px; -fx-font-weight: bold; " +
                        "-fx-text-fill: " + borderColor + ";"
        );

        Label contentLabel = new Label(content);
        contentLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #4A4542; -fx-line-spacing: 1px;");
        contentLabel.setWrapText(true);

        box.getChildren().addAll(titleLabel, contentLabel);
        return box;
    }

    private Button createActionButton(String text, String color, int ficheId, boolean isEdit) {
        Button button = new Button(text);
        String baseStyle = "-fx-background-color: transparent; -fx-text-fill: " + color +
                "; -fx-font-size: 11px; -fx-font-weight: bold; -fx-padding: 8 16; " +
                "-fx-background-radius: 20; -fx-cursor: hand; " +
                "-fx-border-color: " + color + "; -fx-border-width: 1; -fx-border-radius: 20;";
        String hoverStyle = "-fx-background-color: " + color + "; -fx-text-fill: white; " +
                "-fx-font-size: 11px; -fx-font-weight: bold; -fx-padding: 8 16; " +
                "-fx-background-radius: 20; -fx-cursor: hand;";

        button.setStyle(baseStyle);
        button.setOnMouseEntered(e -> button.setStyle(hoverStyle));
        button.setOnMouseExited(e -> button.setStyle(baseStyle));

        if (!isEdit) {
            button.setOnAction(e -> supprimerFiche(ficheId));
        }
        return button;
    }

    private void supprimerFiche(int ficheId) {
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Retirer cette fiche ?");
        confirmAlert.setContentText("Cette action est irréversible.");

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