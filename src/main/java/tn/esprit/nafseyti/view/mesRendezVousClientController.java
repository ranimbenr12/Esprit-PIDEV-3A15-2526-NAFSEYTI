package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Cursor;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.effect.DropShadow;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.scene.shape.Rectangle;
import javafx.stage.Stage;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;

public class mesRendezVousClientController implements Initializable {

    @FXML private VBox doctorContainer;  // Changé de FlowPane à VBox
    @FXML private TextField searchField;
    @FXML private ComboBox<String> specialtyFilter;
    @FXML private Label totalDoctorsLabel;
    @FXML private Button btnTestIA;
    private User currentUser;

    public void setUser(User user) {
        this.currentUser = user;
    }

    @FXML
    private BorderPane mainBorderPane;
    // Couleurs de fond pour les cartes
    private final String[] CARD_COLORS = {
            "#C8E6C9",  // Vert clair
            "#B2DFDB",  // Turquoise clair
            "#FFCCBC",  // Orange clair
            "#F8BBD0",  // Rose clair
            "#D1C4E9",  // Violet clair
            "#DCEDC8"   // Vert lime clair
    };

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        loadDoctors();
        setupSearchAndFilter();
    }

    private void setupSearchAndFilter() {
        if (searchField != null) {
            searchField.textProperty().addListener((obs, oldVal, newVal) -> loadDoctors());
        }

        if (specialtyFilter != null) {
            specialtyFilter.setOnAction(e -> loadDoctors());
        }
    }

    private void loadDoctors() {
        doctorContainer.getChildren().clear();

        // Construction de la requête avec filtres
        StringBuilder query = new StringBuilder(
                "SELECT id, firstname, lastname, address, profile_photo, role FROM users " +
                        "WHERE role IN ('coach_vie', 'psychologue')"
        );


        String searchText = searchField != null ? searchField.getText() : "";
        if (!searchText.isEmpty()) {
            query.append(" AND (LOWER(firstname) LIKE LOWER(?) OR LOWER(lastname) LIKE LOWER(?))");
        }

        String selectedSpecialty = specialtyFilter != null ? specialtyFilter.getValue() : "";
        if (selectedSpecialty != null && !selectedSpecialty.isEmpty() &&
                !selectedSpecialty.equals("Tous les spécialistes")) {

            String roleFilter = selectedSpecialty.equals("Psychologue") ? "psychologue" : "coach_vie";
            query.append(" AND role = '").append(roleFilter).append("'");
        }

        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(query.toString());

            if (!searchText.isEmpty()) {
                String searchPattern = "%" + searchText + "%";
                pst.setString(1, searchPattern);
                pst.setString(2, searchPattern);
            }

            ResultSet rs = pst.executeQuery();

            // Liste temporaire pour stocker toutes les cartes
            List<VBox> allCards = new ArrayList<>();
            int colorIndex = 0;

            while (rs.next()) {
                String firstname = rs.getString("firstname");
                String lastname = rs.getString("lastname");
                String address = rs.getString("address");
                String photo = rs.getString("profile_photo");
                String role = rs.getString("role");
                int doctorId = rs.getInt("id"); // <-- important

                VBox card = createModernDoctorCard(
                        firstname,
                        lastname,
                        address,
                        role,
                        photo,
                        CARD_COLORS[colorIndex % CARD_COLORS.length],
                        doctorId  // <-- ici
                );


                allCards.add(card);
                colorIndex++;
            }

            // Mettre à jour le compteur
            if (totalDoctorsLabel != null) {
                totalDoctorsLabel.setText(String.valueOf(allCards.size()));
            }

            // Organiser les cartes en lignes de 3
            arrangeCardsInRows(allCards);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    /**
     * Organise les cartes en lignes de 3
     */
    private void arrangeCardsInRows(List<VBox> cards) {
        int cardsPerRow = 3;

        for (int i = 0; i < cards.size(); i += cardsPerRow) {
            HBox row = new HBox(25);  // Espacement de 25px entre les cartes
            row.setAlignment(Pos.CENTER_LEFT);
            row.setPadding(new Insets(0, 0, 0, 0));

            // Ajouter jusqu'à 3 cartes par ligne
            for (int j = 0; j < cardsPerRow && (i + j) < cards.size(); j++) {
                row.getChildren().add(cards.get(i + j));
            }

            // Si la dernière ligne a moins de 3 cartes, ajouter des espaceurs
            if (row.getChildren().size() < cardsPerRow) {
                int missingCards = cardsPerRow - row.getChildren().size();
                for (int k = 0; k < missingCards; k++) {
                    Region spacer = new Region();
                    spacer.setPrefWidth(280);  // Même largeur qu'une carte
                    row.getChildren().add(spacer);
                }
            }

            doctorContainer.getChildren().add(row);
        }
    }

    private VBox createModernDoctorCard(String firstname, String lastname, String address,
                                        String role, String photoPath, String bgColor, int doctorId)
    {

        // Carte principale
        VBox card = new VBox(15);
        card.setPrefWidth(280);
        card.setPrefHeight(320);
        card.setAlignment(Pos.TOP_CENTER);
        card.setPadding(new Insets(20, 20, 20, 20));

        // Style avec couleur de fond
        card.setStyle(
                "-fx-background-color: " + bgColor + ";" +
                        "-fx-background-radius: 25;" +
                        "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.15), 12, 0, 0, 4);"
        );

        // ================= PHOTO DANS UN RECTANGLE ARRONDI =================
        StackPane photoContainer = new StackPane();
        photoContainer.setPrefSize(140, 140);
        photoContainer.setMaxSize(140, 140);

        // Rectangle blanc de fond
        Rectangle photoBackground = new Rectangle(140, 140);
        photoBackground.setArcWidth(20);
        photoBackground.setArcHeight(20);
        photoBackground.setFill(Color.WHITE);

        // ImageView pour la photo
        ImageView imageView = new ImageView();
        imageView.setFitWidth(130);
        imageView.setFitHeight(130);
        imageView.setPreserveRatio(true);

        // Clip arrondi pour l'image
        Rectangle clip = new Rectangle(130, 130);
        clip.setArcWidth(15);
        clip.setArcHeight(15);
        imageView.setClip(clip);

        try {
            Image image;
            if (photoPath != null && !photoPath.isEmpty()) {
                try {
                    image = new Image(getClass().getResourceAsStream("/images/" + photoPath));
                } catch (Exception e) {
                    image = new Image("file:" + photoPath);
                }
            } else {
                image = new Image(getClass().getResourceAsStream("/images/default-avatar.png"));
            }
            imageView.setImage(image);
        } catch (Exception e) {
            System.out.println("⚠️ Image non trouvée : " + photoPath);
            imageView.setImage(null);
        }

        photoContainer.getChildren().addAll(photoBackground, imageView);

        // ================= INFORMATIONS =================
        VBox infoBox = new VBox(8);
        infoBox.setAlignment(Pos.CENTER);
        infoBox.setPadding(new Insets(10, 0, 0, 0));

        // Nom
        Label nameLabel = new Label("Dr. " + firstname + " " + lastname);
        nameLabel.setStyle(
                "-fx-font-size: 18px;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: #2E7D32;" +
                        "-fx-text-alignment: center;"
        );
        nameLabel.setWrapText(true);
        nameLabel.setMaxWidth(240);

        // Spécialité
        String specialtyText = role.equals("psychologue") ? "Psychologue" : "Coach de vie";
        Label specialtyLabel = new Label("Spécialité: " + specialtyText);
        specialtyLabel.setStyle(
                "-fx-font-size: 14px;" +
                        "-fx-font-weight: bold;" +
                        "-fx-text-fill: #1B5E20;" +
                        "-fx-text-alignment: center;"
        );
        specialtyLabel.setWrapText(true);
        specialtyLabel.setMaxWidth(240);

        infoBox.getChildren().addAll(nameLabel, specialtyLabel);

        // Adresse (optionnel)
        if (address != null && !address.isEmpty()) {
            Label addressLabel = new Label("📍 " + (address.length() > 30 ? address.substring(0, 27) + "..." : address));
            addressLabel.setStyle(
                    "-fx-font-size: 12px;" +
                            "-fx-text-fill: #455A64;" +
                            "-fx-text-alignment: center;"
            );
            addressLabel.setWrapText(true);
            addressLabel.setMaxWidth(240);
            infoBox.getChildren().add(addressLabel);
        }

        // ================= BOUTON "VOIR PROFIL" =================
        Button viewProfileBtn = new Button("👁️ plus de détails");
        viewProfileBtn.setPrefWidth(200);
        viewProfileBtn.setPrefHeight(35);
        viewProfileBtn.setStyle(
                "-fx-background-color: #2E7D32;" +
                        "-fx-text-fill: white;" +
                        "-fx-font-size: 14px;" +
                        "-fx-font-weight: bold;" +
                        "-fx-background-radius: 20;" +
                        "-fx-cursor: hand;"
        );

        // Effet hover
        viewProfileBtn.setOnMouseEntered(e -> {
            viewProfileBtn.setStyle(
                    "-fx-background-color: #1B5E20;" +
                            "-fx-text-fill: white;" +
                            "-fx-font-size: 14px;" +
                            "-fx-font-weight: bold;" +
                            "-fx-background-radius: 20;" +
                            "-fx-cursor: hand;" +
                            "-fx-scale-x: 1.05;" +
                            "-fx-scale-y: 1.05;"
            );
        });

        viewProfileBtn.setOnMouseExited(e -> {
            viewProfileBtn.setStyle(
                    "-fx-background-color: #2E7D32;" +
                            "-fx-text-fill: white;" +
                            "-fx-font-size: 14px;" +
                            "-fx-font-weight: bold;" +
                            "-fx-background-radius: 20;" +
                            "-fx-cursor: hand;"
            );
        });

        viewProfileBtn.setOnAction(e -> {
            try {
                FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlClient/doctorDetails.fxml"));
                VBox root = loader.load();

                DoctorDetailsController controller = loader.getController();
                controller.setDoctorId(doctorId);
                controller.setUser(currentUser); // ← ajouter cette ligne

                Stage stage = new Stage();
                Scene scene = new Scene(root);
                stage.setScene(scene);
                stage.setTitle("Détails du docteur");
                stage.setResizable(false);
                stage.setWidth(420);
                stage.setHeight(600);
                stage.centerOnScreen();
                stage.show();

            } catch (IOException ex) {
                ex.printStackTrace();
            }
        });




        // Espaceur pour pousser le bouton en bas
        Region spacer = new Region();
        VBox.setVgrow(spacer, Priority.ALWAYS);

        // Assembler la carte
        card.getChildren().addAll(photoContainer, infoBox, spacer, viewProfileBtn);

        // Effet hover sur toute la carte
        card.setOnMouseEntered(e -> {
            card.setStyle(
                    "-fx-background-color: " + adjustBrightness(bgColor, -0.05) + ";" +
                            "-fx-background-radius: 25;" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.25), 15, 0, 0, 6);" +
                            "-fx-scale-x: 1.03;" +
                            "-fx-scale-y: 1.03;"
            );
        });

        card.setOnMouseExited(e -> {
            card.setStyle(
                    "-fx-background-color: " + bgColor + ";" +
                            "-fx-background-radius: 25;" +
                            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.15), 12, 0, 0, 4);"
            );
        });

        return card;
    }

    /**
     * Ajuster la luminosité d'une couleur hexadécimale
     */
    private String adjustBrightness(String hex, double factor) {
        try {
            Color color = Color.web(hex);
            double red = Math.max(0, Math.min(1, color.getRed() + factor));
            double green = Math.max(0, Math.min(1, color.getGreen() + factor));
            double blue = Math.max(0, Math.min(1, color.getBlue() + factor));

            return String.format("#%02X%02X%02X",
                    (int)(red * 255),
                    (int)(green * 255),
                    (int)(blue * 255)
            );
        } catch (Exception e) {
            return hex;
        }
    }
    //boutton back
    @FXML
    private void handleBtnAccueil() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlClient/interfacePricClient.fxml"));
            Parent root = loader.load();

            interfacePricClient ctrl = loader.getController();
            ctrl.setUser(currentUser); // ← ne pas perdre le user au retour

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            Scene scene = new Scene(root);
            stage.setScene(scene);
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    private int getDoctorIdFromDatabase(String firstname, String lastname) {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT id FROM users WHERE firstname = ? AND lastname = ?"
            );
            pst.setString(1, firstname);
            pst.setString(2, lastname);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                return rs.getInt("id");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return -1; // pas trouvé
    }

    @FXML
    private void handleBtnMesRendezVous() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlClient/MyAppointments.fxml"));
            VBox root = loader.load();

            MyAppointmentsController controller = loader.getController();
            controller.setUserId(currentUser.getId()); // ← ID réel au lieu de 1

            Stage stage = new Stage();
            Scene scene = new Scene(root);
            stage.setScene(scene);
            stage.setTitle("Mes rendez-vous");
            stage.setResizable(false);
            stage.centerOnScreen();
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void handleBtnTestIA() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxmlClient/testIA.fxml"));
            Parent testView = loader.load();

            // Remplacer seulement le centre
            mainBorderPane.setCenter(testView);

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void handleDeconnexion() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlUser/Login.fxml"));
            Parent root = loader.load();

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            Scene scene = new Scene(root);
            scene.getStylesheets().add(
                    getClass().getResource("/css/styles.css").toExternalForm());
            stage.setScene(scene);
            stage.setTitle("NAFSEYTI — Connexion");
            stage.sizeToScene();
            stage.centerOnScreen();
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}
