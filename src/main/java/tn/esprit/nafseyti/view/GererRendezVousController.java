package tn.esprit.nafseyti.view;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.scene.shape.Rectangle;
import javafx.stage.Stage;
import tn.esprit.nafseyti.google.GoogleCalendarService;
import tn.esprit.nafseyti.models.User;
import tn.esprit.nafseyti.utils.MyBDConnexion;

import java.io.IOException;
import java.net.URL;
import java.sql.*;
import java.time.*;
import java.time.format.DateTimeFormatter;
import java.util.*;

public class GererRendezVousController implements Initializable {

    // ── FXML ─────────────────────────────────────────
    @FXML private BorderPane mainBorderPane;
    @FXML private Label      psychologueNameLabel;
    @FXML private Label      monthYearLabel;
    @FXML private GridPane   dayHeaderGrid;
    @FXML private GridPane   calendarGrid;
    @FXML private Label      selectedDayLabel;
    @FXML private VBox       rdvDuJourContainer;
    @FXML private Label      formDateLabel;
    @FXML private TextField  fieldPatientId;
    @FXML private TextField  fieldHeureDebut;
    @FXML private TextField  fieldHeureFin;
    @FXML private ComboBox<String> comboTypeSeance;
    @FXML private Label      formMessage;
    @FXML private Label      syncStatusLabel;
    @FXML private Circle     syncDot;

    @FXML private VBox      googleAuthBox;
    @FXML private TextField fieldAuthCode;
    @FXML private Label     authErrorLabel;
    @FXML private Button    btnOuvrirGoogle;

    // ── État ─────────────────────────────────────────
    private int psychologueId; // sera surchargé via setPsychologueId()
    private YearMonth currentMonth;
    private LocalDate selectedDate;
    private User currentUser; // ← ajouter

    public void setUser(User user) {
        this.currentUser = user;
        if (user != null) {
            this.psychologueId = user.getId();
            loadPsychologueName();
            loadRdvFromDB();
            renderCalendar();
        }
    }
    // RDV en base : date → liste de statuts
    private final Map<LocalDate, List<String>> rdvMap = new HashMap<>();

    private static final DateTimeFormatter MONTH_FMT =
            DateTimeFormatter.ofPattern("MMMM yyyy", Locale.FRENCH);
    private static final DateTimeFormatter DAY_FMT =
            DateTimeFormatter.ofPattern("EEEE dd MMMM yyyy", Locale.FRENCH);

    // ─────────────────────────────────────────────────
    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        currentMonth = YearMonth.now();
        comboTypeSeance.getItems().addAll(
                "Présentiel", "En ligne");
        buildDayHeaders();
        loadRdvFromDB();
        renderCalendar();
        loadPsychologueName();
    }

    /** Appelé depuis PsychologueInterfaceController pour passer l'ID connecté */
    public void setPsychologueId(int id) {
        this.psychologueId = id;
        loadPsychologueName();
        loadRdvFromDB();
        renderCalendar();
    }

    // ─────────────────────────────────────────────────
    //  Nom du psychologue
    // ─────────────────────────────────────────────────
    private void loadPsychologueName() {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT firstname, lastname FROM users WHERE id = ?");
            pst.setInt(1, psychologueId);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                psychologueNameLabel.setText(
                        "Dr. " + rs.getString("firstname") + " " + rs.getString("lastname"));
            }
        } catch (Exception e) { e.printStackTrace(); }
    }

    // ─────────────────────────────────────────────────
    //  En-têtes des jours (Lun … Dim)
    // ─────────────────────────────────────────────────
    private void buildDayHeaders() {
        String[] jours = {"Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"};
        for (int i = 0; i < 7; i++) {
            Label lbl = new Label(jours[i]);
            lbl.setMaxWidth(Double.MAX_VALUE);
            lbl.setAlignment(Pos.CENTER);
            lbl.setStyle("-fx-font-size: 11px; -fx-font-weight: bold; -fx-text-fill: #285921; -fx-padding: 4 0;");
            GridPane.setHgrow(lbl, Priority.ALWAYS);
            dayHeaderGrid.add(lbl, i, 0);
            ColumnConstraints cc = new ColumnConstraints();
            cc.setHgrow(Priority.ALWAYS);
            if (dayHeaderGrid.getColumnConstraints().size() <= i)
                dayHeaderGrid.getColumnConstraints().add(cc);
        }
    }

    // ─────────────────────────────────────────────────
    //  Charger les RDV depuis MySQL pour le mois courant
    // ─────────────────────────────────────────────────
    private void loadRdvFromDB() {
        rdvMap.clear();
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT dateRendezVous, statut, google_event_id FROM rendez_vous " +
                            "WHERE medecinId = ? " +
                            "AND YEAR(dateRendezVous) = ? AND MONTH(dateRendezVous) = ?");
            pst.setInt(1, psychologueId);
            pst.setInt(2, currentMonth.getYear());
            pst.setInt(3, currentMonth.getMonthValue());
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
                LocalDate d = rs.getDate("dateRendezVous").toLocalDate();
                String statut = rs.getString("google_event_id") != null
                        ? rs.getString("statut") + "_synced"  // marqueur spécial
                        : rs.getString("statut");
                rdvMap.computeIfAbsent(d, k -> new ArrayList<>()).add(statut);
            }

        } catch (Exception e) { e.printStackTrace(); }
    }

    // ─────────────────────────────────────────────────
    //  Rendu de la grille calendrier
    // ─────────────────────────────────────────────────
    private void renderCalendar() {
        calendarGrid.getChildren().clear();
        calendarGrid.getColumnConstraints().clear();
        calendarGrid.getRowConstraints().clear();

        monthYearLabel.setText(currentMonth.format(MONTH_FMT).toUpperCase());

        // 7 colonnes égales
        for (int i = 0; i < 7; i++) {
            ColumnConstraints cc = new ColumnConstraints();
            cc.setHgrow(Priority.ALWAYS);
            cc.setFillWidth(true);
            calendarGrid.getColumnConstraints().add(cc);
        }

        LocalDate firstDay = currentMonth.atDay(1);
        // DayOfWeek : MONDAY=1, on veut col 0=Lundi
        int startCol = firstDay.getDayOfWeek().getValue() - 1;
        int daysInMonth = currentMonth.lengthOfMonth();
        int row = 0, col = startCol;

        for (int day = 1; day <= daysInMonth; day++) {
            LocalDate date = currentMonth.atDay(day);
            VBox cell = buildDayCell(date, day);
            calendarGrid.add(cell, col, row);
            col++;
            if (col == 7) { col = 0; row++; }
        }

        // Lignes de hauteur uniforme
        int totalRows = row + (col > 0 ? 1 : 0);
        for (int r = 0; r <= totalRows; r++) {
            RowConstraints rc = new RowConstraints();
            rc.setVgrow(Priority.ALWAYS);
            rc.setFillHeight(true);
            rc.setMinHeight(60);
            calendarGrid.getRowConstraints().add(rc);
        }
    }

    /** Construit une cellule jour du calendrier */
    private VBox buildDayCell(LocalDate date, int dayNum) {
        VBox cell = new VBox(3);
        cell.setAlignment(Pos.TOP_CENTER);
        cell.setPadding(new Insets(5, 3, 5, 3));
        cell.setMaxSize(Double.MAX_VALUE, Double.MAX_VALUE);

        boolean isToday    = date.equals(LocalDate.now());
        boolean isSelected = date.equals(selectedDate);
        boolean hasRdv     = rdvMap.containsKey(date);

        // Style corrigé de la cellule
        String bgColor = isSelected ? "#285921"
                : isToday    ? "#eef5ee"
                : "white";

        String borderColor = isSelected ? "#1a4a15"
                : isToday    ? "#285921"
                : "#f0ebe5";

        String borderWidth = isSelected || isToday ? "2" : "1"; // largeur en pixels

        cell.setStyle("-fx-background-color: " + bgColor + ";" +
                "-fx-border-color: " + borderColor + ";" +
                "-fx-border-width: " + borderWidth + ";" +
                "-fx-border-style: solid;" +
                "-fx-border-radius: 10; -fx-background-radius: 10; -fx-cursor: hand;");

        // Numéro du jour
        Label numLabel = new Label(String.valueOf(dayNum));
        numLabel.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: "
                + (isSelected ? "white" : isToday ? "#285921" : "#333") + ";");
        cell.getChildren().add(numLabel);

        // Points colorés pour chaque RDV
        if (hasRdv) {
            HBox dots = new HBox(3);
            dots.setAlignment(Pos.CENTER);
            for (String statut : rdvMap.get(date)) {
                Circle dot = new Circle(4, getStatutColor(statut));
                dots.getChildren().add(dot);
            }
            cell.getChildren().add(dots);
        }

        // Clic → sélectionner le jour
        cell.setOnMouseClicked(e -> {
            selectedDate = date;
            selectedDayLabel.setText(date.format(DAY_FMT).toUpperCase());
            formDateLabel.setText(date.format(DateTimeFormatter.ofPattern("dd/MM/yyyy")));
            renderCalendar();
            loadRdvDuJour(date);
        });

        return cell;
    }

    private Color getStatutColor(String statut) {
        if (statut == null) return Color.GRAY;
        return switch (statut.toLowerCase()) {
            case "confirmé" -> Color.web("#285921");
            case "en_attente", "en attente" -> Color.web("#FFC107");
            case "annulé" -> Color.web("#E53935");
            case "pas encore pris" -> Color.web("#B0BEC5");
            case "confirmé_synced", "en_attente_synced", "pas encore pris_synced" -> Color.web("#4285F4"); // bleu Google
            default -> Color.web("#4285F4");
        };
    }

    // ─────────────────────────────────────────────────
    //  Charger les RDV d'un jour spécifique (panel droite)
    // ─────────────────────────────────────────────────
    private void loadRdvDuJour(LocalDate date) {
        rdvDuJourContainer.getChildren().clear();
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "SELECT rv.id, rv.heureDebut, rv.heureFin, rv.type_seance, rv.statut,\n" +
                            "       u.firstname AS patient_prenom, u.lastname AS patient_nom,\n" +
                            "       m.firstname AS medecin_prenom, m.lastname AS medecin_nom\n" + // ← médecin
                            "FROM rendez_vous rv\n" +
                            "LEFT JOIN users u ON rv.userId = u.id\n" +       // ← patient (peut être null)
                            "JOIN users m ON rv.medecinId = m.id\n" +          // ← médecin
                            "WHERE rv.medecinId = ? AND rv.dateRendezVous = ?\n" +
                            "ORDER BY rv.heureDebut"
            );

            pst.setInt(1, psychologueId);
            pst.setDate(2, java.sql.Date.valueOf(date));
            ResultSet rs = pst.executeQuery();

            boolean found = false;
            while (rs.next()) {
                found = true;
                HBox item = new HBox(10);
                item.setAlignment(Pos.CENTER_LEFT);
                item.setPadding(new Insets(8, 12, 8, 12));
                item.setStyle("-fx-background-color: #f9fdf8; -fx-background-radius: 10;" +
                        "-fx-border-color: #d4edda; -fx-border-radius: 10; -fx-border-width: 1;");

                Rectangle bar = new Rectangle(4, 50, getStatutColor(rs.getString("statut")));
                bar.setArcWidth(4); bar.setArcHeight(4);

                VBox info = new VBox(3);

                // ── Nom du médecin ──
                String medecinPrenom = rs.getString("medecin_prenom");
                String medecinNom    = rs.getString("medecin_nom");
                Label medecinLabel = new Label("🩺 Dr. " + medecinPrenom + " " + medecinNom);
                medecinLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 12px; -fx-text-fill: #285921;");

                // ── Nom du patient (peut être null si pas encore réservé) ──
                String patientPrenom = rs.getString("patient_prenom");
                String patientNom    = rs.getString("patient_nom");
                Label nameLabel;
                if (patientPrenom != null) {
                    nameLabel = new Label("👤 " + patientPrenom + " " + patientNom);
                    nameLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #1a3a1a;");
                } else {
                    nameLabel = new Label("👤 Pas encore réservé");
                    nameLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #aaa; -fx-font-style: italic;");
                }

                Label timeLabel = new Label("🕐 " + rs.getString("heureDebut") +
                        " → " + rs.getString("heureFin") + "   📝 " + rs.getString("type_seance"));
                timeLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #666;");

                info.getChildren().addAll(medecinLabel, nameLabel, timeLabel);

                Label statutLabel = new Label(rs.getString("statut"));
                statutLabel.setStyle("-fx-font-size: 10px; -fx-font-weight: bold; -fx-padding: 2 8;" +
                        "-fx-background-radius: 8; -fx-background-color: #eef5ee; -fx-text-fill: #285921;");

                Region sp = new Region(); HBox.setHgrow(sp, Priority.ALWAYS);

                Button btnDel = new Button("🗑");
                int rdvId = rs.getInt("id");
                btnDel.setStyle("-fx-background-color: #fde8e8; -fx-background-radius: 8;" +
                        "-fx-cursor: hand; -fx-padding: 4 8;");
                btnDel.setOnAction(e -> supprimerRdv(rdvId, date));

                item.getChildren().addAll(bar, info, sp, statutLabel, btnDel);
                rdvDuJourContainer.getChildren().add(item);
            }

            if (!found) {
                Label empty = new Label("Aucun rendez-vous ce jour.");
                empty.setStyle("-fx-text-fill: #aaa; -fx-font-style: italic; -fx-padding: 10;");
                rdvDuJourContainer.getChildren().add(empty);
            }

        } catch (Exception e) { e.printStackTrace(); }
    }

    // ─────────────────────────────────────────────────
    //  Navigation mois
    // ─────────────────────────────────────────────────
    @FXML private void handlePrevMonth() {
        currentMonth = currentMonth.minusMonths(1);
        loadRdvFromDB();
        renderCalendar();
        rdvDuJourContainer.getChildren().clear();
    }

    @FXML private void handleNextMonth() {
        currentMonth = currentMonth.plusMonths(1);
        loadRdvFromDB();
        renderCalendar();
        rdvDuJourContainer.getChildren().clear();
    }

    // ─────────────────────────────────────────────────
    //  Enregistrer un RDV (base + Google Calendar)
    // ─────────────────────────────────────────────────
    @FXML
    private void handleEnregistrerRdv() {
        formMessage.setText("");

        if (selectedDate == null) {
            showFormError("⚠️ Cliquez d'abord sur un jour dans le calendrier.");
            return;
        }


        String heureDebutStr = fieldHeureDebut.getText().trim();
        String heureFinStr   = fieldHeureFin.getText().trim();
        String typeSeance    = comboTypeSeance.getValue();

        if ( heureDebutStr.isEmpty() || heureFinStr.isEmpty() || typeSeance == null) {
            showFormError("⚠️ Veuillez remplir tous les champs.");
            return;
        }

        try {

            LocalTime debut   = LocalTime.parse(heureDebutStr);
            LocalTime fin     = LocalTime.parse(heureFinStr);

            if (!fin.isAfter(debut)) {
                showFormError("⚠️ L'heure de fin doit être après l'heure de début.");
                return;
            }

            // 1️⃣ Insérer en base MySQL
            Connection cnx = MyBDConnexion.getInstance().getCnx();
            PreparedStatement pst = cnx.prepareStatement(
                    "INSERT INTO rendez_vous (medecinId, dateRendezVous, heureDebut, heureFin, type_seance, statut) " +
                            "VALUES (?, ?, ?, ?, ?, 'Pas encore pris')",
                    Statement.RETURN_GENERATED_KEYS);
            pst.setInt(1, psychologueId);
            pst.setDate(2, java.sql.Date.valueOf(selectedDate));
            pst.setTime(3, java.sql.Time.valueOf(debut));
            pst.setTime(4, java.sql.Time.valueOf(fin));
            pst.setString(5, typeSeance);
            pst.executeUpdate();

            ResultSet keys = pst.getGeneratedKeys();
            int newId = keys.next() ? keys.getInt(1) : -1;

            // 2️⃣ Sync Google Calendar en arrière-plan
            LocalDate dateRdv   = selectedDate;
            LocalTime debutFinal = debut;
            LocalTime finFinal   = fin;


            // 2️⃣ Pas de sync automatique — attendre le clic sur "Sync avec Google"
            syncStatusLabel.setText("💾 RDV enregistré — non encore synchronisé");
            syncDot.setFill(Color.web("#B0BEC5"));
            // 3️⃣ Rafraîchir l'UI
            clearForm();
            showFormSuccess("✅ Rendez-vous ajouté avec succès !");
            loadRdvFromDB();
            renderCalendar();
            loadRdvDuJour(selectedDate);

        } catch (NumberFormatException e) {
            showFormError("⚠️ ID patient invalide.");
        } catch (Exception e) {
            e.printStackTrace();
            showFormError("❌ Erreur base de données : " + e.getMessage());
        }
    }

    // ─────────────────────────────────────────────────
    //  Supprimer un RDV (base + Google)
    // ─────────────────────────────────────────────────
    private void supprimerRdv(int rdvId, LocalDate date) {
        try {
            Connection cnx = MyBDConnexion.getInstance().getCnx();

            // Récupérer google_event_id avant suppression
            PreparedStatement sel = cnx.prepareStatement(
                    "SELECT google_event_id FROM rendez_vous WHERE id = ?");
            sel.setInt(1, rdvId);
            ResultSet rs = sel.executeQuery();
            String googleId = rs.next() ? rs.getString("google_event_id") : null;

            // Supprimer de la base
            PreparedStatement del = cnx.prepareStatement(
                    "DELETE FROM rendez_vous WHERE id = ?");
            del.setInt(1, rdvId);
            del.executeUpdate();

            // Supprimer de Google Calendar
            if (googleId != null) {
                String gId = googleId;
                new Thread(() -> {
                    try { GoogleCalendarService.deleteEvent(gId); }
                    catch (Exception ex) { System.err.println("⚠️ Suppression Google échouée"); }
                }).start();
            }

            // Rafraîchir
            loadRdvFromDB();
            renderCalendar();
            loadRdvDuJour(date);

        } catch (Exception e) { e.printStackTrace(); }
    }

    // ─────────────────────────────────────────────────
    //  Sync Google → afficher RDV Google sur calendrier
    // ─────────────────────────────────────────────────
    @FXML
    private void handleSyncGoogle() {
        syncStatusLabel.setText("🔄 Vérification...");
        syncDot.setFill(Color.web("#FFC107"));

        new Thread(() -> {
            try {
                if (!GoogleCalendarService.isAuthenticated()) {
                    Platform.runLater(() -> {
                        showGoogleAuthBox(true); // ← méthode sécurisée
                        syncStatusLabel.setText("⏳ Connexion Google requise...");
                        syncDot.setFill(Color.web("#FFC107"));
                    });
                    return;
                }

                Connection cnx = MyBDConnexion.getInstance().getCnx();
                PreparedStatement pst = cnx.prepareStatement(
                        "SELECT rv.id, rv.dateRendezVous, rv.heureDebut, rv.heureFin, rv.type_seance, " +
                                "       m.firstname AS medecin_prenom, m.lastname AS medecin_nom " + // ← ajouter
                                "FROM rendez_vous rv " +
                                "JOIN users m ON rv.medecinId = m.id " +                             // ← ajouter
                                "WHERE rv.medecinId = ? AND rv.google_event_id IS NULL");
                pst.setInt(1, psychologueId);
                ResultSet rs = pst.executeQuery();

                int synced = 0;
                int failed = 0;

                while (rs.next()) {
                    int rdvId         = rs.getInt("id");
                    LocalDate dateRdv = rs.getDate("dateRendezVous").toLocalDate();
                    LocalTime debut   = rs.getTime("heureDebut").toLocalTime();
                    LocalTime fin     = rs.getTime("heureFin").toLocalTime();
                    String typeSeance = rs.getString("type_seance");
                    String medecinNom = "Dr. " + rs.getString("medecin_prenom") + " " + rs.getString("medecin_nom"); // ← récupérer

                    try {
                        String titre = "🩺 Dr. " + rs.getString("medecin_prenom") + " " +
                                rs.getString("medecin_nom") + " — " + typeSeance; // ← titre avec médecin
                        String googleId = GoogleCalendarService.createEvent(
                                titre, dateRdv, debut, fin, typeSeance, medecinNom); // ← passer medecinNom

                        if (googleId != null) {
                            PreparedStatement upd = cnx.prepareStatement(
                                    "UPDATE rendez_vous SET google_event_id = ? WHERE id = ?");
                            upd.setString(1, googleId);
                            upd.setInt(2, rdvId);
                            upd.executeUpdate();
                            synced++;
                        }
                    } catch (Exception ex) {
                        String msg = ex.getMessage();
                        System.err.println("⚠️ Erreur RDV id=" + rdvId + " : " + msg);

                        if (msg != null && msg.contains("401")) {
                            GoogleCalendarService.forceReAuthenticate();
                            Platform.runLater(() -> {
                                showGoogleAuthBox(true);
                                syncStatusLabel.setText("⚠️ Session expirée — reconnectez-vous");
                                syncDot.setFill(Color.web("#E53935"));
                            });
                            return;
                        }
                        failed++;
                    }
                }

                int total  = synced;
                int errors = failed;
                Platform.runLater(() -> {
                    String msg = "✅ " + total + " RDV synchronisé(s)";
                    if (errors > 0) msg += " ⚠️ " + errors + " échoué(s)";
                    syncStatusLabel.setText(msg);
                    syncDot.setFill(errors > 0 ? Color.web("#FFC107") : Color.web("#285921"));
                    showGoogleAuthBox(false);
                    loadRdvFromDB();
                    renderCalendar();
                    if (selectedDate != null) loadRdvDuJour(selectedDate);
                });

            } catch (Exception e) {
                Platform.runLater(() -> {
                    syncStatusLabel.setText("❌ Erreur : " + e.getMessage());
                    syncDot.setFill(Color.web("#E53935"));
                });
                e.printStackTrace();
            }
        }).start();
    }

    // ✅ Méthode sécurisée — vérifie null avant d'accéder au VBox
    private void showGoogleAuthBox(boolean visible) {
        if (googleAuthBox != null) {
            googleAuthBox.setVisible(visible);
            googleAuthBox.setManaged(visible);
        } else {
            System.out.println("ℹ️ googleAuthBox absent du FXML — auth via console");
        }
    }
    @FXML
    private void handleOuvrirCalendar() {
        try {
            // Si un jour est sélectionné → ouvrir Google Calendar sur ce jour
            if (selectedDate != null) {
                String url = "https://calendar.google.com/calendar/r/day/"
                        + selectedDate.getYear() + "/"
                        + selectedDate.getMonthValue() + "/"
                        + selectedDate.getDayOfMonth();
                java.awt.Desktop.getDesktop().browse(new java.net.URI(url));
            } else {
                // Sinon → ouvrir sur le mois courant
                String url = "https://calendar.google.com/calendar/r/month/"
                        + currentMonth.getYear() + "/"
                        + currentMonth.getMonthValue();
                java.awt.Desktop.getDesktop().browse(new java.net.URI(url));
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    // ── Ouvrir le navigateur avec l'URL Google ────────
    @FXML
    private void handleOuvrirGoogle() {
        new Thread(() -> {
            try {
                String authUrl = GoogleCalendarService.generateAuthUrl();
                // Ouvrir dans le navigateur système
                Platform.runLater(() -> {
                    try {
                        java.awt.Desktop.getDesktop().browse(new java.net.URI(authUrl));
                        authErrorLabel.setText("✅ Navigateur ouvert — copiez le code affiché");
                        authErrorLabel.setStyle("-fx-text-fill: #285921; -fx-font-size: 11px;");
                    } catch (Exception ex) {
                        authErrorLabel.setText("⚠️ Copiez ce lien dans votre navigateur :\n" + authUrl);
                        authErrorLabel.setStyle("-fx-text-fill: #c0392b; -fx-font-size: 10px; -fx-wrap-text: true;");
                    }
                });
            } catch (Exception e) {
                Platform.runLater(() ->
                        authErrorLabel.setText("❌ Erreur : " + e.getMessage()));
            }
        }).start();
    }

    // ── Valider le code collé par l'utilisateur ───────
    @FXML
    private void handleValiderCode() {
        String code = fieldAuthCode.getText().trim();
        if (code.isEmpty()) {
            authErrorLabel.setText("⚠️ Collez d'abord le code reçu de Google.");
            return;
        }

        authErrorLabel.setText("🔄 Validation...");

        new Thread(() -> {
            try {
                GoogleCalendarService.resetService(); // ← reset avant nouvelle auth
                GoogleCalendarService.authenticateWithCode(code);

                var events = GoogleCalendarService.getEventsThisMonth();

                Platform.runLater(() -> {
                    googleAuthBox.setVisible(false);
                    googleAuthBox.setManaged(false);
                    fieldAuthCode.clear();
                    authErrorLabel.setText("");
                    syncStatusLabel.setText("✅ Connecté — " + events.size() + " événement(s)");
                    syncDot.setFill(Color.web("#285921"));
                });

            } catch (Exception e) {
                Platform.runLater(() -> {
                    authErrorLabel.setText("❌ Code invalide ou expiré. Réessayez.");
                    authErrorLabel.setStyle("-fx-text-fill: #c0392b;");
                    syncStatusLabel.setText("❌ Échec");
                    syncDot.setFill(Color.web("#E53935"));
                });
                e.printStackTrace();
            }
        }).start();
    }

    // ─────────────────────────────────────────────────
    //  Navigation sidebar
    // ─────────────────────────────────────────────────
    @FXML
    private void handleBtnAccueil() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlPsychologue/PsychologueInterface.fxml"));
            Parent root = loader.load();

            PsychologueInterfaceController ctrl = loader.getController();
            ctrl.setUser(currentUser); // ← passer le user

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) { e.printStackTrace(); }
    }

    @FXML
    private void handleBtnMesRdv() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlPsychologue/PsychologueInterface.fxml"));
            Parent root = loader.load();

            PsychologueInterfaceController ctrl = loader.getController();
            ctrl.setUser(currentUser); // ← passer le user

            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) { e.printStackTrace(); }
    }

    @FXML
    private void handleBtnFiches() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlPsychologue/ListeFichesConsultation.fxml"));
            Parent root = loader.load();

            ListeFichesConsultationController ctrl = loader.getController();
            ctrl.setPsychologueId(psychologueId); // déjà correct
            ctrl.setUser(currentUser);
            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) { e.printStackTrace(); }
    }

    private void navigateTo(String fxmlPath) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource(fxmlPath));
            Stage stage = (Stage) mainBorderPane.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) { e.printStackTrace(); }
    }

    // ─────────────────────────────────────────────────
    //  Helpers formulaire
    // ─────────────────────────────────────────────────
    @FXML
    private void handleAnnulerForm() { clearForm(); }

    private void clearForm() {

        fieldHeureDebut.clear();
        fieldHeureFin.clear();
        comboTypeSeance.setValue(null);

    }

    private void showFormError(String msg) {
        formMessage.setStyle("-fx-text-fill: #c0392b; -fx-font-size: 12px; -fx-font-weight: bold;");
        formMessage.setText(msg);
    }

    private void showFormSuccess(String msg) {
        formMessage.setStyle("-fx-text-fill: #285921; -fx-font-size: 12px; -fx-font-weight: bold;");
        formMessage.setText(msg);
    }
    @FXML
    private void handleNettoyerGoogle() {
        syncStatusLabel.setText("🔄 Nettoyage en cours...");
        syncDot.setFill(Color.web("#FFC107"));

        new Thread(() -> {
            try {
                if (!GoogleCalendarService.isAuthenticated()) {
                    Platform.runLater(() -> {
                        syncStatusLabel.setText("⏳ Connexion Google requise...");
                        showGoogleAuthBox(true);
                    });
                    return;
                }

                // 1️⃣ Récupérer tous les google_event_id encore présents en base
                Connection cnx = MyBDConnexion.getInstance().getCnx();
                PreparedStatement pst = cnx.prepareStatement(
                        "SELECT google_event_id FROM rendez_vous WHERE medecinId = ? AND google_event_id IS NOT NULL");
                pst.setInt(1, psychologueId);
                ResultSet rs = pst.executeQuery();

                Set<String> idsEnBase = new HashSet<>();
                while (rs.next()) {
                    idsEnBase.add(rs.getString("google_event_id"));
                }
                rs.close();
                pst.close();

                // 2️⃣ Récupérer tous les événements Google Calendar ce mois
                var eventsGoogle = GoogleCalendarService.getEventsThisMonth();

                // 3️⃣ Supprimer de Google ceux qui ne sont plus en base
                int deleted = 0;
                for (var event : eventsGoogle) {
                    String googleId = event.getId();
                    if (!idsEnBase.contains(googleId)) {
                        try {
                            GoogleCalendarService.deleteEvent(googleId);
                            deleted++;
                            System.out.println("🗑 Supprimé de Google : " + googleId);
                        } catch (Exception ex) {
                            System.err.println("⚠️ Impossible de supprimer : " + googleId);
                        }
                    }
                }

                int totalDeleted = deleted;
                Platform.runLater(() -> {
                    syncStatusLabel.setText("✅ " + totalDeleted + " événement(s) supprimé(s) de Google");
                    syncDot.setFill(Color.web("#285921"));
                });

            } catch (Exception e) {
                Platform.runLater(() -> {
                    syncStatusLabel.setText("❌ Erreur : " + e.getMessage());
                    syncDot.setFill(Color.web("#E53935"));
                });
            }
        }).start();
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