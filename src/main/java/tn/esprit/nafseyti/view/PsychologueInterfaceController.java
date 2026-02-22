package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
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
import java.util.ResourceBundle;

public class PsychologueInterfaceController implements Initializable {
    @FXML private BorderPane mainBorderPane;
    @FXML private VBox rendezVousContainer;
    @FXML private Label totalRdvLabel;
    @FXML private Label confirmedRdvLabel;
    @FXML private Label pendingRdvLabel;
    @FXML private Label totalFichesLabel;
    @FXML private Label psychologueNameLabel;

    private int psychologueId = 2; // TODO: Remplacer par l'ID du psychologue connecté

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        loadPsychologueName();
        loadRendezVous();
        loadStatistics();
    }

    private void loadPsychologueName() {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT firstname, lastname FROM users WHERE id = ?"
            );
            pst.setInt(1, psychologueId);
            ResultSet rs = pst.executeQuery();

            if (rs.next()) {
                String firstname = rs.getString("firstname");
                String lastname = rs.getString("lastname");
                psychologueNameLabel.setText("Dr. " + firstname + " " + lastname);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void loadStatistics() {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();

            PreparedStatement pstTotal = cnx.prepareStatement(
                    "SELECT COUNT(*) FROM reservationRendez_vous WHERE medecin_id = ?"
            );
            pstTotal.setInt(1, psychologueId);
            ResultSet rsTotal = pstTotal.executeQuery();
            if (rsTotal.next()) {
                totalRdvLabel.setText(String.valueOf(rsTotal.getInt(1)));
            }

            PreparedStatement pstConfirmed = cnx.prepareStatement(
                    "SELECT COUNT(*) FROM reservationRendez_vous rr " +
                            "INNER JOIN rendez_vous rv ON rr.rendez_vous_id = rv.id " +
                            "WHERE rr.medecin_id = ? AND rv.statut = 'Confirmé'"
            );
            pstConfirmed.setInt(1, psychologueId);
            ResultSet rsConfirmed = pstConfirmed.executeQuery();
            if (rsConfirmed.next()) {
                confirmedRdvLabel.setText(String.valueOf(rsConfirmed.getInt(1)));
            }

            PreparedStatement pstPending = cnx.prepareStatement(
                    "SELECT COUNT(*) FROM reservationRendez_vous rr " +
                            "INNER JOIN rendez_vous rv ON rr.rendez_vous_id = rv.id " +
                            "WHERE rr.medecin_id = ? AND rv.statut = 'En attente'"
            );
            pstPending.setInt(1, psychologueId);
            ResultSet rsPending = pstPending.executeQuery();
            if (rsPending.next()) {
                pendingRdvLabel.setText(String.valueOf(rsPending.getInt(1)));
            }

            PreparedStatement pstFiches = cnx.prepareStatement(
                    "SELECT COUNT(*) FROM fiche_consultation fc " +
                            "INNER JOIN rendez_vous rv ON fc.rendez_vous_id = rv.id " +
                            "WHERE rv.medecinId = ?"
            );
            pstFiches.setInt(1, psychologueId);
            ResultSet rsFiches = pstFiches.executeQuery();
            if (rsFiches.next()) {
                totalFichesLabel.setText(String.valueOf(rsFiches.getInt(1)));
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void loadRendezVous() {
        rendezVousContainer.getChildren().clear();

        String query =
                "SELECT " +
                        "    rr.id AS reservation_id, " +
                        "    rv.id AS rendez_vous_id, " +
                        "    rv.dateRendezVous, " +
                        "    rv.heureDebut, " +
                        "    rv.heureFin, " +
                        "    rv.type_seance, " +
                        "    rv.statut, " +
                        "    u.firstname AS patient_prenom, " +
                        "    u.lastname AS patient_nom, " +
                        "    rr.user_id AS patient_id " +
                        "FROM reservationRendez_vous rr " +
                        "INNER JOIN rendez_vous rv ON rr.rendez_vous_id = rv.id " +
                        "INNER JOIN users u ON rr.user_id = u.id " +
                        "WHERE rr.medecin_id = ? " +
                        "ORDER BY rv.dateRendezVous ASC, rv.heureDebut ASC";

        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(query);
            pst.setInt(1, psychologueId);
            ResultSet rs = pst.executeQuery();

            boolean hasRendezVous = false;

            while (rs.next()) {
                hasRendezVous = true;

                int reservationId = rs.getInt("reservation_id");
                int rendezVousId = rs.getInt("rendez_vous_id");
                LocalDate date = rs.getDate("dateRendezVous").toLocalDate();
                LocalTime heureDebut = rs.getTime("heureDebut").toLocalTime();
                LocalTime heureFin = rs.getTime("heureFin").toLocalTime();
                String typeSeance = rs.getString("type_seance");
                String statut = rs.getString("statut");
                String patientPrenom = rs.getString("patient_prenom");
                String patientNom = rs.getString("patient_nom");
                int patientId = rs.getInt("patient_id");

                VBox card = createRendezVousCard(
                        reservationId, rendezVousId, date, heureDebut, heureFin,
                        typeSeance, statut, patientPrenom, patientNom, patientId
                );

                rendezVousContainer.getChildren().add(card);
            }

            if (!hasRendezVous) {
                Label emptyLabel = new Label("Aucun rendez-vous pour le moment");
                emptyLabel.setStyle("-fx-text-fill: #888; -fx-font-style: italic; -fx-padding: 30; -fx-font-size: 14px;");
                rendezVousContainer.getChildren().add(emptyLabel);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private VBox createRendezVousCard(int reservationId, int rendezVousId, LocalDate date,
                                      LocalTime heureDebut, LocalTime heureFin,
                                      String typeSeance, String statut,
                                      String patientPrenom, String patientNom, int patientId) {

        VBox card = new VBox(12);
        card.setPadding(new Insets(15));
        card.setStyle(
                "-fx-background-color: white; " +
                        "-fx-background-radius: 15; " +
                        "-fx-border-color: #e0e0e0; " +
                        "-fx-border-radius: 15; " +
                        "-fx-border-width: 1; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 5, 0, 0, 2);"
        );

        HBox header = new HBox(10);
        header.setAlignment(Pos.CENTER_LEFT);

        DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("EEE dd MMM yyyy", Locale.FRENCH);
        Label dateLabel = new Label("📅 " + dateFormatter.format(date));
        dateLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        Label statusBadge = new Label(statut);
        statusBadge.setPadding(new Insets(4, 12, 4, 12));
        statusBadge.setStyle(getStatusStyle(statut));

        header.getChildren().addAll(dateLabel, spacer, statusBadge);

        Label patientLabel = new Label("👤 Patient: " + patientPrenom + " " + patientNom);
        patientLabel.setStyle(
                "-fx-font-size: 15px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-text-fill: #333;" +
                        "-fx-background-color: #ece6df; " +
                        "-fx-padding: 5 10; " +
                        "-fx-background-radius: 8;"
        );

        Label timeLabel = new Label("🕐 " + heureDebut.toString() + " - " + heureFin.toString());
        timeLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #666;");

        Label typeLabel = new Label("📝 Type: " + typeSeance);
        typeLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #666;");

        HBox buttonBox = new HBox(10);
        buttonBox.setAlignment(Pos.CENTER_LEFT);

        if (statut.equals("En attente")) {
            Button confirmBtn = new Button("✅ Confirmer");
            confirmBtn.setStyle(
                    "-fx-background-color: linear-gradient(to bottom right, #374535, #296f1f); " +
                            "-fx-text-fill: white; " +
                            "-fx-background-radius: 10; " +
                            "-fx-padding: 8 20; " +
                            "-fx-font-size: 12px; " +
                            "-fx-font-weight: bold; " +
                            "-fx-cursor: hand;"
            );
            confirmBtn.setOnAction(e -> {
                confirmerRendezVous(rendezVousId);
                loadRendezVous();
                loadStatistics();
            });

            Button cancelBtn = new Button("❌ Annuler");
            cancelBtn.setStyle(
                    "-fx-background-color: linear-gradient(to bottom right, #f5f5dc, #e0cda9); " +
                            "-fx-text-fill: #856404; " +
                            "-fx-background-radius: 10; " +
                            "-fx-padding: 8 20; " +
                            "-fx-font-size: 12px; " +
                            "-fx-font-weight: bold; " +
                            "-fx-cursor: hand;"
            );
            cancelBtn.setOnAction(e -> {
                annulerRendezVous(reservationId, rendezVousId);
                loadRendezVous();
                loadStatistics();
            });

            buttonBox.getChildren().addAll(confirmBtn, cancelBtn);
        } else if (statut.equalsIgnoreCase("Confirmé")) {
            Button ficheBtn = new Button("📋 Créer fiche");
            ficheBtn.setStyle(
                    "-fx-background-color: #4b5e82; " +
                            "-fx-text-fill: white; " +
                            "-fx-background-radius: 10; " +
                            "-fx-padding: 8 20; " +
                            "-fx-font-size: 12px; " +
                            "-fx-font-weight: bold; " +
                            "-fx-cursor: hand;"
            );
            ficheBtn.setOnAction(e -> openCreateFicheDialog(patientId, rendezVousId, patientPrenom, patientNom));

            buttonBox.getChildren().add(ficheBtn);
        }

        card.getChildren().addAll(header, patientLabel, timeLabel, typeLabel, buttonBox);

        return card;
    }

    private String getStatusStyle(String statut) {
        String baseStyle = "-fx-background-radius: 12; -fx-font-size: 11px; -fx-font-weight: bold;";
        switch (statut) {
            case "En attente":
                return baseStyle + " -fx-background-color: #FFF3CD; -fx-text-fill: #856404;";
            case "Confirmé":
            case "confirmé":
                return baseStyle + " -fx-background-color: #D4EDDA; -fx-text-fill: #155724;";
            case "Annulé":
            case "annulé":
                return baseStyle + " -fx-background-color: #F8D7DA; -fx-text-fill: #721C24;";
            default:
                return baseStyle + " -fx-background-color: #E2E3E5; -fx-text-fill: #383D41;";
        }
    }

    private void confirmerRendezVous(int rendezVousId) {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement("UPDATE rendez_vous SET statut = 'Confirmé' WHERE id = ?");
            pst.setInt(1, rendezVousId);
            pst.executeUpdate();
            System.out.println("✅ Rendez-vous confirmé");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void annulerRendezVous(int reservationId, int rendezVousId) {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement deleteStmt = cnx.prepareStatement("DELETE FROM reservationRendez_vous WHERE id = ?");
            deleteStmt.setInt(1, reservationId);
            deleteStmt.executeUpdate();

            PreparedStatement updateStmt = cnx.prepareStatement("UPDATE rendez_vous SET statut = 'Pas encore pris' WHERE id = ?");
            updateStmt.setInt(1, rendezVousId);
            updateStmt.executeUpdate();

            System.out.println("✅ Rendez-vous annulé");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    /**
     * Ouvrir la popup pour créer une fiche de consultation
     */
    private void openCreateFicheDialog(int patientId, int rendezVousId, String patientPrenom, String patientNom) {
        try {
            // Charger le fichier FXML de la popup
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlPsychologue/CreateFicheConsultation.fxml"));
            VBox root = loader.load();

            // Récupérer le contrôleur et passer les données
            CreateFicheConsultationController controller = loader.getController();
            controller.setData(psychologueId, patientId, rendezVousId, patientPrenom, patientNom);

            // Créer une nouvelle fenêtre (popup)
            Stage popupStage = new Stage();
            popupStage.setScene(new Scene(root));
            popupStage.setTitle("Créer une fiche de consultation");
            popupStage.setResizable(false);
            popupStage.centerOnScreen();

            // Afficher la popup et attendre qu'elle se ferme
            popupStage.showAndWait();

            // Recharger les statistiques après fermeture de la popup
            loadStatistics();
            loadRendezVous();

        } catch (IOException ex) {
            ex.printStackTrace();
            System.err.println("❌ Erreur lors de l'ouverture de la popup: " + ex.getMessage());
        }
    }
    @FXML
    private void handleBtnFichesConsultation() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlPsychologue/ListeFichesConsultation.fxml"));
            Parent root = loader.load();

            ListeFichesConsultationController controller = loader.getController();
            controller.setPsychologueId(psychologueId);

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }


}
