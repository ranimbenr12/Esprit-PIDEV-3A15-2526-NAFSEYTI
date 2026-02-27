package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.stage.Stage;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ResourceBundle;
public class DoctorDetailsController implements Initializable {
    @FXML private ImageView doctorPhoto;
    @FXML private Circle photoCircle;
    @FXML private Label doctorNameLabel;
    @FXML private Label specialtyLabel;
    @FXML private Label addressLabel;
    @FXML private Label phoneLabel;
    @FXML private VBox availabilityContainer;
    @FXML private Button btnBookAppointment;
    @FXML private Button btnClose;
    @FXML private Label confirmationLabel;

    private int doctorId; // id du docteur sélectionné
    private int selectedRendezVousId = -1;
    private User currentUser; // ← ajouter

    public void setUser(User user) {
        this.currentUser = user;
    }// id du créneau sélectionné

    public void setDoctorId(int doctorId) {
        this.doctorId = doctorId;
        loadDoctorDetails();
        loadDoctorAvailability();
    }

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        btnClose.setOnAction(e -> ((Stage) btnClose.getScene().getWindow()).close());

        btnBookAppointment.setOnAction(e -> {
            if (currentUser != null) {
                bookSelectedSlot(currentUser.getId()); // ← ID réel
            } else {
                confirmationLabel.setText("Erreur : utilisateur non connecté !");
            }
        });
    }

    private void loadDoctorDetails() {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT firstname, lastname, address, phone_number, role, profile_photo FROM users WHERE id = ?"
            );
            pst.setInt(1, doctorId);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                String firstname = rs.getString("firstname");
                String lastname = rs.getString("lastname");
                String address = rs.getString("address");
                String phone = rs.getString("phone_number");
                String role = rs.getString("role");
                String photoPath = rs.getString("profile_photo");

                doctorNameLabel.setText("Dr. " + firstname + " " + lastname);
                specialtyLabel.setText(role.equals("psychologue") ? "Psychologue" : "Coach de vie");
                addressLabel.setText(address);
                phoneLabel.setText(phone);

                Image image;
                try {
                    if (photoPath != null && !photoPath.isEmpty()) {
                        image = new Image(getClass().getResourceAsStream("/images/" + photoPath));
                    } else {
                        image = new Image(getClass().getResourceAsStream("/images/default-avatar.png"));
                    }
                } catch (Exception e) {
                    image = new Image("file:" + photoPath);
                }

                doctorPhoto.setImage(image);
                double radius = 55;
                doctorPhoto.setFitWidth(radius * 2);
                doctorPhoto.setFitHeight(radius * 2);
                doctorPhoto.setPreserveRatio(false);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void loadDoctorAvailability() {
        availabilityContainer.getChildren().clear();
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT id, dateRendezVous, heureDebut, heureFin, type_seance, statut " +
                            "FROM rendez_vous WHERE medecinId = ? ORDER BY dateRendezVous, heureDebut"
            );
            pst.setInt(1, doctorId);
            ResultSet rs = pst.executeQuery();

            boolean hasAvailability = false;

            while (rs.next()) {
                int rvId = rs.getInt("id");
                String date = rs.getString("dateRendezVous");
                String start = rs.getString("heureDebut");
                String end = rs.getString("heureFin");
                String type = rs.getString("type_seance");
                String statut = rs.getString("statut");

                Label slot = new Label(date + " | " + start + " - " + end + " | " + type + " | " + statut);
                slot.setStyle("-fx-background-color: #e0f7fa; -fx-padding: 8; -fx-background-radius: 10; -fx-font-size: 13px;");

                // désactiver les slots déjà réservés
                if (!statut.equals("Pas encore pris")) {
                    slot.setTextFill(Color.GRAY);
                    slot.setDisable(true);
                }

                // clic pour sélectionner un slot
                slot.setOnMouseClicked(e -> {
                    // réinitialiser les autres
                    availabilityContainer.getChildren().forEach(node -> node.setStyle("-fx-background-color: #e0f7fa; -fx-padding: 8; -fx-background-radius: 10; -fx-font-size: 13px;"));
                    // surligner le sélectionné
                    slot.setStyle("-fx-background-color: #4B0082; -fx-text-fill: white; -fx-padding: 8; -fx-background-radius: 10; -fx-font-size: 13px;");
                    selectedRendezVousId = rvId;
                });

                availabilityContainer.getChildren().add(slot);
                hasAvailability = true;
            }

            if (!hasAvailability) {
                Label emptyLabel = new Label("Aucune disponibilité pour le moment");
                emptyLabel.setStyle("-fx-text-fill: #888; -fx-font-style: italic;");
                availabilityContainer.getChildren().add(emptyLabel);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void bookSelectedSlot(int userId) {
        if (selectedRendezVousId == -1) {
            confirmationLabel.setText("Veuillez sélectionner un créneau !");
            return;
        }

        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();

            // 1️⃣ Insérer dans reservationRendez_vous
            PreparedStatement insertStmt = cnx.prepareStatement(
                    "INSERT INTO reservationRendez_vous (user_id, medecin_id, rendez_vous_id) VALUES (?, ?, ?)"
            );
            insertStmt.setInt(1, userId);
            insertStmt.setInt(2, doctorId);
            insertStmt.setInt(3, selectedRendezVousId);
            insertStmt.executeUpdate();

            // 2️⃣ Mettre à jour le statut du rendez-vous
            PreparedStatement updateStmt = cnx.prepareStatement(
                    "UPDATE rendez_vous SET statut = 'En attente', userId = ? WHERE id = ?"
            );

            updateStmt.setInt(1, userId);
            updateStmt.setInt(2, selectedRendezVousId);
            updateStmt.executeUpdate();

            // 3️⃣ Confirmer
            confirmationLabel.setText("Rendez-vous réservé avec succès !");
            loadDoctorAvailability(); // recharger les slots pour griser le réservé

        } catch (Exception e) {
            e.printStackTrace();
            confirmationLabel.setText("Erreur lors de la réservation !");
        }
    }

}
