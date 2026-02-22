package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.Region;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.Locale;
import java.util.ResourceBundle;
public class MyAppointmentsController implements Initializable {
    @FXML private VBox appointmentsContainer;
    @FXML private Button btnClose;
    @FXML private Label totalRdvLabel;
    @FXML private Label upcomingRdvLabel;
    @FXML private Label completedRdvLabel;
    @FXML
    private Label connectedUserLabel;

    private int userId; // ID de l'utilisateur connecté

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        if (btnClose != null) {
            btnClose.setOnAction(e -> {
                Stage stage = (Stage) btnClose.getScene().getWindow();
                stage.close();
            });
        }
    }

    /**
     * Définir l'ID de l'utilisateur et charger ses rendez-vous
     */
    public void setUserId(int userId) {
        this.userId = userId;
        loadConnectedUser();    // <-- afficher le nom de l'utilisateur
        loadUserAppointments();
    }

    /**
     * Charger les rendez-vous de l'utilisateur depuis la BD
     */
    private void loadUserAppointments() {
        if (appointmentsContainer == null) {
            System.err.println("❌ appointmentsContainer est null");
            return;
        }

        appointmentsContainer.getChildren().clear();

        String query =
                "SELECT " +
                        "    rr.id, " +
                        "    rv.dateRendezVous, " +
                        "    rv.heureDebut, " +
                        "    rv.heureFin, " +
                        "    rv.type_seance, " +
                        "    rv.statut, " +
                        "    u.firstname AS medecin_prenom, " +
                        "    u.lastname AS medecin_nom, " +
                        "    u.role AS medecin_role " +
                        "FROM reservationRendez_vous rr " +
                        "INNER JOIN rendez_vous rv ON rr.rendez_vous_id = rv.id " +
                        "INNER JOIN users u ON rr.medecin_id = u.id " +
                        "WHERE rr.user_id = ? " +
                        "ORDER BY rv.dateRendezVous DESC, rv.heureDebut DESC";

        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(query);
            pst.setInt(1, userId);

            ResultSet rs = pst.executeQuery();

            int total = 0;
            int enAttente = 0;
            int confirme = 0;

            boolean hasAppointments = false;

            while (rs.next()) {
                hasAppointments = true;
                total++;

                // Récupérer les données
                int reservationId = rs.getInt("id");
                LocalDate date = rs.getDate("dateRendezVous").toLocalDate();
                LocalTime heureDebut = rs.getTime("heureDebut").toLocalTime();
                LocalTime heureFin = rs.getTime("heureFin").toLocalTime();
                String typeSeance = rs.getString("type_seance");
                String statut = rs.getString("statut");
                String medecinPrenom = rs.getString("medecin_prenom");
                String medecinNom = rs.getString("medecin_nom");
                String medecinRole = rs.getString("medecin_role");

                // Compter par statut
                if (statut.equalsIgnoreCase("En attente")) {
                    enAttente++;
                } else if (statut.equalsIgnoreCase("confirmé") || statut.equals("Confirmé")) {
                    confirme++;
                }

                // Créer la carte de rendez-vous
                VBox appointmentCard = createAppointmentCard(
                        reservationId,
                        date,
                        heureDebut,
                        heureFin,
                        typeSeance,
                        statut,
                        medecinPrenom,
                        medecinNom,
                        medecinRole
                );

                appointmentsContainer.getChildren().add(appointmentCard);
            }

            // Mettre à jour les statistiques
            if (totalRdvLabel != null) {
                totalRdvLabel.setText(String.valueOf(total));
            }
            if (upcomingRdvLabel != null) {
                upcomingRdvLabel.setText(String.valueOf(enAttente));
            }
            if (completedRdvLabel != null) {
                completedRdvLabel.setText(String.valueOf(confirme));
            }

            // Si aucun rendez-vous
            if (!hasAppointments) {
                Label emptyLabel = new Label("Vous n'avez aucun rendez-vous pour le moment");
                emptyLabel.setStyle(
                        "-fx-text-fill: #888; " +
                                "-fx-font-style: italic; " +
                                "-fx-padding: 30; " +
                                "-fx-font-size: 14px;"
                );
                appointmentsContainer.getChildren().add(emptyLabel);
            }

        } catch (Exception e) {
            e.printStackTrace();
            System.err.println("❌ Erreur chargement rendez-vous : " + e.getMessage());

            Label errorLabel = new Label("Erreur de chargement des rendez-vous");
            errorLabel.setStyle("-fx-text-fill: #ff5252; -fx-font-style: italic;");
            appointmentsContainer.getChildren().add(errorLabel);
        }
    }

    /**
     * Créer une carte pour un rendez-vous
     */
    private VBox createAppointmentCard(int reservationId, LocalDate date, LocalTime heureDebut, LocalTime heureFin,
                                       String typeSeance, String statut, String medecinPrenom, String medecinNom, String medecinRole) {

        VBox card = new VBox(10);
        card.setPadding(new Insets(15));
        card.setStyle(
                "-fx-background-color: white; " +
                        "-fx-background-radius: 15; " +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 8, 0, 0, 2);"
        );

        // ================= HEADER : Date + Badge Statut =================
        HBox header = new HBox(10);
        header.setAlignment(Pos.CENTER_LEFT);

        // Date formatée
        DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("EEE dd MMM yyyy", Locale.FRENCH);
        Label dateLabel = new Label("📅 " + dateFormatter.format(date));
        dateLabel.setStyle(
                "-fx-font-size: 14px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-text-fill: #285921;"
        );

        // Espaceur
        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        // Badge statut
        Label statusBadge = new Label(statut);
        statusBadge.setPadding(new Insets(4, 12, 4, 12));
        statusBadge.setStyle(getStatusStyle(statut));

        header.getChildren().addAll(dateLabel, spacer, statusBadge);

        // ================= NOM DU MÉDECIN =================
        String specialite = medecinRole.equals("psychologue") ? "Psychologue" : "Coach de vie";
        Label doctorLabel = new Label("👨‍⚕️ Dr. " + medecinPrenom + " " + medecinNom + " - " + specialite);
        doctorLabel.setStyle(
                "-fx-font-size: 15px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-text-fill: #333;"
        );

        // ================= HORAIRE =================
        Label timeLabel = new Label("🕐 " + heureDebut.toString() + " - " + heureFin.toString());
        timeLabel.setStyle(
                "-fx-font-size: 13px; " +
                        "-fx-text-fill: #666;"
        );

        // ================= TYPE DE SÉANCE =================
        Label typeLabel = new Label("📝 Type: " + typeSeance);
        typeLabel.setStyle(
                "-fx-font-size: 12px; " +
                        "-fx-text-fill: #666;"
        );

        // ================= BOUTON ANNULER (si en attente) =================
        if (statut.equals("En attente")) {
            Button cancelBtn = new Button("❌ Annuler");
            cancelBtn.setStyle(
                    "-fx-background-color: #FF5252; " +
                            "-fx-text-fill: white; " +
                            "-fx-background-radius: 10; " +
                            "-fx-padding: 6 15; " +
                            "-fx-font-size: 12px; " +
                            "-fx-cursor: hand;"
            );

            cancelBtn.setOnAction(e -> {
                cancelAppointment(reservationId);
                loadUserAppointments(); // Recharger la liste
            });

            card.getChildren().addAll(header, doctorLabel, timeLabel, typeLabel, cancelBtn);
        } else {
            card.getChildren().addAll(header, doctorLabel, timeLabel, typeLabel);
        }

        return card;
    }

    /**
     * Obtenir le style CSS pour le badge de statut
     */
    private String getStatusStyle(String statut) {
        String baseStyle =
                "-fx-background-radius: 12; " +
                        "-fx-font-size: 11px; " +
                        "-fx-font-weight: bold;";

        switch (statut) {
            case "En attente":
                return baseStyle + " -fx-background-color: #FFF3CD; -fx-text-fill: #856404;";
            case "Confirmé":
            case "confirmé":
                return baseStyle + " -fx-background-color: #D4EDDA; -fx-text-fill: #155724;";
            case "Annulé":
            case "annulé":
                return baseStyle + " -fx-background-color: #F8D7DA; -fx-text-fill: #721C24;";
            case "Terminé":
            case "terminé":
                return baseStyle + " -fx-background-color: #D1ECF1; -fx-text-fill: #0C5460;";
            default:
                return baseStyle + " -fx-background-color: #E2E3E5; -fx-text-fill: #383D41;";
        }
    }

    /**
     * Annuler un rendez-vous
     */
    private void cancelAppointment(int reservationId) {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();

            // 1. Récupérer le rendez_vous_id
            PreparedStatement getIdStmt = cnx.prepareStatement(
                    "SELECT rendez_vous_id FROM reservationRendez_vous WHERE id = ?"
            );
            getIdStmt.setInt(1, reservationId);
            ResultSet rs = getIdStmt.executeQuery();

            if (rs.next()) {
                int rendezVousId = rs.getInt("rendez_vous_id");

                // 2. Supprimer la réservation
                PreparedStatement deleteStmt = cnx.prepareStatement(
                        "DELETE FROM reservationRendez_vous WHERE id = ?"
                );
                deleteStmt.setInt(1, reservationId);
                deleteStmt.executeUpdate();

                // 3. Remettre le rendez-vous en "Pas encore pris"
                PreparedStatement updateStmt = cnx.prepareStatement(
                        "UPDATE rendez_vous SET statut = 'Pas encore pris' WHERE id = ?"
                );
                updateStmt.setInt(1, rendezVousId);
                updateStmt.executeUpdate();

                System.out.println("✅ Rendez-vous annulé avec succès");
            }

        } catch (Exception e) {
            e.printStackTrace();
            System.err.println("❌ Erreur lors de l'annulation : " + e.getMessage());
        }
    }
    private void loadConnectedUser() {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT firstname, lastname FROM users WHERE id = ?"
            );
            pst.setInt(1, userId);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                String firstname = rs.getString("firstname");
                String lastname = rs.getString("lastname");
                connectedUserLabel.setText( firstname + " " + lastname + " !");
            }
        } catch (Exception e) {
            e.printStackTrace();
            connectedUserLabel.setText("Bonjour !");
        }
    }


}
