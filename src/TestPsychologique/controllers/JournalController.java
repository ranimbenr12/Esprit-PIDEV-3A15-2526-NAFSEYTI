package TestPsychologique.controllers;

import TestPsychologique.dao.JournalEntrydao;
import TestPsychologique.models.JournalEntry;
import TestPsychologique.utils.GeminiEmotionAPI;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.*;
import javafx.scene.shape.Circle;
import javafx.stage.Stage;

import java.io.File;
import java.sql.Date;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.*;

public class JournalController {

    @FXML private Label dateLabel;
    @FXML private Label streakLabel;

    @FXML private VBox btnExcellent;
    @FXML private VBox btnBien;
    @FXML private VBox btnMoyen;
    @FXML private VBox btnDifficile;
    @FXML private VBox btnTresDifficile;

    @FXML private FlowPane emotionsPane;

    @FXML private Slider energieSlider;
    @FXML private Label energieLabel;
    @FXML private Slider sommeilSlider;
    @FXML private Label sommeilLabel;

    @FXML private TextArea notesArea;
    @FXML private Label charCountLabel;

    private JournalEntrydao journalDao;
    private int userId = 1;
    private String selectedHumeur = null;
    private List<String> selectedEmotions = new ArrayList<>();
    private Map<String, VBox> humeurButtons = new HashMap<>();
    private Map<String, ToggleButton> emotionButtons = new HashMap<>();

    private final Map<String, String> emotionsDisponibles = new LinkedHashMap<String, String>() {{
        put("Heureux", "");
        put("Triste", "");
        put("Anxieux", "");
        put("Calme", "");
        put("Energique", "");
        put("Fatigue", "");
        put("Stresse", "");
        put("Optimiste", "");
        put("Confiant", "");
        put("Inquiet", "");
        put("Motive", "");
        put("Detendu", "");
    }};

    @FXML
    public void initialize() {
        journalDao = new JournalEntrydao();
        setupDateLabel();
        setupHumeurButtons();
        setupEmotionsButtons();
        setupSliders();
        setupNotesArea();
        loadStreakDays();
        loadTodayEntry();
    }

    private void setupDateLabel() {
        LocalDate today = LocalDate.now();
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("EEEE d MMMM yyyy", Locale.FRENCH);
        dateLabel.setText(today.format(formatter));
    }

    private void setupHumeurButtons() {
        humeurButtons.put("excellent", btnExcellent);
        humeurButtons.put("bien", btnBien);
        humeurButtons.put("moyen", btnMoyen);
        humeurButtons.put("difficile", btnDifficile);
        humeurButtons.put("très_difficile", btnTresDifficile);

        btnExcellent.setUserData("excellent");
        btnBien.setUserData("bien");
        btnMoyen.setUserData("moyen");
        btnDifficile.setUserData("difficile");
        btnTresDifficile.setUserData("très_difficile");
    }

    @FXML
    private void selectHumeur(MouseEvent event) {
        VBox clickedBox = (VBox) event.getSource();
        selectedHumeur = (String) clickedBox.getUserData();

        for (VBox box : humeurButtons.values()) {
            box.setStyle("-fx-background-color: #f8f5f2; -fx-background-radius: 12; "
                    + "-fx-padding: 14 8; -fx-pref-width: 130; -fx-min-height: 90; -fx-cursor: hand;");
        }
        clickedBox.setStyle("-fx-background-color: #e8f5e9; -fx-background-radius: 12; "
                + "-fx-padding: 14 8; -fx-pref-width: 130; -fx-min-height: 90; -fx-cursor: hand; "
                + "-fx-border-color: #285921; -fx-border-width: 2; -fx-border-radius: 12; "
                + "-fx-effect: dropshadow(gaussian, rgba(40,89,33,0.25), 8, 0, 0, 2);");
    }

    private void setupEmotionsButtons() {
        for (Map.Entry<String, String> entry : emotionsDisponibles.entrySet()) {
            String emotionName = entry.getKey();
            ToggleButton btn = new ToggleButton(emotionName);
            btn.setStyle("-fx-font-size: 12px; -fx-padding: 7 14; "
                    + "-fx-background-color: #f0f4f8; -fx-border-color: transparent; "
                    + "-fx-border-radius: 16; -fx-background-radius: 16; "
                    + "-fx-cursor: hand; -fx-text-fill: #555;");

            btn.selectedProperty().addListener((obs, wasSelected, isSelected) -> {
                if (isSelected) {
                    btn.setStyle("-fx-font-size: 12px; -fx-padding: 7 14; "
                            + "-fx-background-color: #285921; -fx-border-color: transparent; "
                            + "-fx-border-radius: 16; -fx-background-radius: 16; "
                            + "-fx-text-fill: white; -fx-font-weight: bold; -fx-cursor: hand;");
                    selectedEmotions.add(emotionName);
                } else {
                    btn.setStyle("-fx-font-size: 12px; -fx-padding: 7 14; "
                            + "-fx-background-color: #f0f4f8; -fx-border-color: transparent; "
                            + "-fx-border-radius: 16; -fx-background-radius: 16; "
                            + "-fx-cursor: hand; -fx-text-fill: #555;");
                    selectedEmotions.remove(emotionName);
                }
            });

            emotionButtons.put(emotionName, btn);
            emotionsPane.getChildren().add(btn);
        }
    }

    private void setupSliders() {
        energieSlider.valueProperty().addListener((obs, oldVal, newVal) -> {
            int value = newVal.intValue();
            energieLabel.setText(value + "/10");
        });
        sommeilSlider.valueProperty().addListener((obs, oldVal, newVal) -> {
            int value = newVal.intValue();
            sommeilLabel.setText(value + "/10");
        });
    }

    private void setupNotesArea() {
        notesArea.textProperty().addListener((obs, oldVal, newVal) -> {
            int count = newVal.length();
            charCountLabel.setText(count + " car.");
        });
    }

    private void loadStreakDays() {
        try {
            int streak = journalDao.getStreakDays(userId);
            streakLabel.setText(streak + " jour" + (streak > 1 ? "s" : ""));
        } catch (Exception e) {
            System.err.println("Erreur streak: " + e.getMessage());
        }
    }

    private void loadTodayEntry() {
        try {
            Date today = Date.valueOf(LocalDate.now());
            JournalEntry entry = journalDao.getEntryByDate(userId, today);
            if (entry != null) {
                selectedHumeur = entry.getHumeur();
                if (humeurButtons.containsKey(selectedHumeur)) {
                    humeurButtons.get(selectedHumeur).setStyle(
                            "-fx-background-color: #e8f5e9; -fx-background-radius: 12; "
                                    + "-fx-padding: 14 8; -fx-pref-width: 130; -fx-min-height: 90; "
                                    + "-fx-border-color: #285921; -fx-border-width: 2; -fx-border-radius: 12;");
                }
                selectedEmotions = entry.getEmotions();
                for (String emotion : selectedEmotions) {
                    if (emotionButtons.containsKey(emotion))
                        emotionButtons.get(emotion).setSelected(true);
                }
                energieSlider.setValue(entry.getEnergie());
                sommeilSlider.setValue(entry.getSommeilQualite());
                notesArea.setText(entry.getNoteTexte());
            }
        } catch (Exception e) {
            System.err.println("Erreur chargement: " + e.getMessage());
        }
    }

    // ═══════════════════════════════════════════════════
    // SAVE + ANALYSE
    // ═══════════════════════════════════════════════════
    @FXML
    private void saveEntry() {
        if (selectedHumeur == null) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Veuillez selectionner une humeur.");
            return;
        }

        String notes = notesArea.getText();
        if (notes != null && !notes.trim().isEmpty() && notes.length() > 10) {

            Stage loadingStage = afficherChargement();

            new Thread(() -> {
                GeminiEmotionAPI.ResultatAnalyse resultat =
                        GeminiEmotionAPI.analyserAvecDetection(notes);

                javafx.application.Platform.runLater(() -> {
                    loadingStage.close();

                    if (resultat.estCrise) {
                        // Popup ROUGE d'urgence
                        afficherPopupCrise(resultat.analyse);
                    } else {
                        // Popup VERT normal
                        afficherAnalyseNormale(resultat.analyse);
                    }

                    enregistrerJournal();
                });
            }).start();

        } else {
            enregistrerJournal();
        }
    }

    // ═══════════════════════════════════════════════════
    // POPUP CHARGEMENT
    // ═══════════════════════════════════════════════════
    private Stage afficherChargement() {
        Stage stage = new Stage();
        stage.setTitle("Analyse en cours...");
        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        VBox box = new VBox(15);
        box.setAlignment(Pos.CENTER);
        box.setPadding(new Insets(40));
        box.setStyle("-fx-background-color: #f8f5f2;");

        ProgressIndicator progress = new ProgressIndicator();
        progress.setPrefSize(55, 55);

        Label label = new Label("Gemini analyse votre ecriture...");
        label.setStyle("-fx-font-size: 14px; -fx-text-fill: #285921; -fx-font-weight: bold;");

        Label sub = new Label("Veuillez patienter quelques secondes");
        sub.setStyle("-fx-font-size: 12px; -fx-text-fill: #888;");

        box.getChildren().addAll(progress, label, sub);
        stage.setScene(new Scene(box, 340, 170));
        stage.setResizable(false);
        stage.show();
        return stage;
    }

    // ═══════════════════════════════════════════════════
    // POPUP CRISE - ROUGE AVEC NUMEROS D'URGENCE
    // ═══════════════════════════════════════════════════
    private void afficherPopupCrise(String analyse) {
        Stage stage = new Stage();
        stage.setTitle("ALERTE - Soutien psychologique urgent");
        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        VBox container = new VBox(0);
        container.setStyle("-fx-background-color: #fff5f5;");

        // Header rouge
        VBox header = new VBox(6);
        header.setAlignment(Pos.CENTER);
        header.setPadding(new Insets(22, 30, 22, 30));
        header.setStyle("-fx-background-color: linear-gradient(to right, #c62828, #e53935);");

        Label alerte = new Label("SOUTIEN DISPONIBLE");
        alerte.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: white;");

        Label sub = new Label("Votre bien-etre est notre priorite");
        sub.setStyle("-fx-font-size: 12px; -fx-text-fill: rgba(255,255,255,0.85);");

        header.getChildren().addAll(alerte, sub);

        // Contenu
        VBox content = new VBox(12);
        content.setPadding(new Insets(18, 25, 10, 25));

        // Analyse Gemini parsee
        String[] lignes = analyse.split("\n");
        for (String ligneStr : lignes) {
            ligneStr = ligneStr.trim();
            if (ligneStr.isEmpty()) continue;

            if (ligneStr.startsWith("NIVEAU URGENCE")) continue; // deja dans le header

            HBox row = new HBox(10);
            row.setAlignment(Pos.CENTER_LEFT);
            row.setPadding(new Insets(9, 14, 9, 14));
            row.setStyle("-fx-background-color: white; -fx-background-radius: 8;");

            String[] parts = ligneStr.split(":", 2);
            if (parts.length == 2) {
                Label key = new Label(parts[0].trim() + " :");
                key.setStyle("-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: #c62828; -fx-min-width: 90;");
                Label val = new Label(parts[1].trim());
                val.setStyle("-fx-font-size: 12px; -fx-text-fill: #333;");
                val.setWrapText(true);
                val.setMaxWidth(360);
                row.getChildren().addAll(key, val);
            } else {
                Label l = new Label(ligneStr);
                l.setStyle("-fx-font-size: 12px; -fx-text-fill: #333;");
                l.setWrapText(true);
                row.getChildren().add(l);
            }
            content.getChildren().add(row);
        }

        // ══ NUMEROS D'URGENCE ══
        VBox urgenceBox = new VBox(10);
        urgenceBox.setPadding(new Insets(14, 14, 14, 14));
        urgenceBox.setStyle("-fx-background-color: #ffebee; -fx-background-radius: 10; "
                + "-fx-border-color: #ef9a9a; -fx-border-width: 1; -fx-border-radius: 10;");

        Label titreUrgence = new Label("Numeros d'aide disponibles maintenant :");
        titreUrgence.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: #c62828;");

        // Tunisie uniquement
        String[][] numeros = {
                {"SAMU - Urgences medicales", "190"},
                {"Police secours", "197"},
                {"Pompiers", "198"},
                {"Hopital Razi (Sante mentale)", "71 578 000"},
                {"Hopital La Rabta (Urgences)", "71 562 600"},
                {"SOS Detresse Tunisie", "80 101 100"}
        };

        urgenceBox.getChildren().add(titreUrgence);

        for (String[] num : numeros) {
            HBox numRow = new HBox(10);
            numRow.setAlignment(Pos.CENTER_LEFT);
            numRow.setPadding(new Insets(7, 12, 7, 12));
            numRow.setStyle("-fx-background-color: white; -fx-background-radius: 6;");

            Label nomLabel = new Label(num[0]);
            nomLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: #555;");
            nomLabel.setMinWidth(200);

            Label numLabel = new Label(num[1]);
            numLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #c62828;");

            numRow.getChildren().addAll(nomLabel, numLabel);
            urgenceBox.getChildren().add(numRow);
        }

        // Message de soutien
        Label messageBox = new Label(
                "Vous n'etes pas seul(e). Parler a quelqu'un peut tout changer. "
                        + "Ces personnes sont formees pour vous ecouter sans jugement.");
        messageBox.setWrapText(true);
        messageBox.setStyle("-fx-font-size: 12px; -fx-text-fill: #555; -fx-font-style: italic; "
                + "-fx-padding: 8; -fx-background-color: #fce4e4; -fx-background-radius: 6;");
        messageBox.setMaxWidth(Double.MAX_VALUE);

        // Bouton fermer
        VBox btnBox = new VBox();
        btnBox.setAlignment(Pos.CENTER);
        btnBox.setPadding(new Insets(12, 25, 18, 25));
        btnBox.setStyle("-fx-background-color: #fff5f5;");

        Button closeBtn = new Button("J'ai lu, je vais contacter de l'aide");
        closeBtn.setPrefWidth(300);
        closeBtn.setStyle("-fx-background-color: #c62828; -fx-text-fill: white; "
                + "-fx-font-size: 13px; -fx-font-weight: bold; "
                + "-fx-padding: 13 20; -fx-background-radius: 20; -fx-cursor: hand;");
        closeBtn.setOnAction(e -> stage.close());
        btnBox.getChildren().add(closeBtn);

        ScrollPane scroll = new ScrollPane(content);
        scroll.setFitToWidth(true);
        scroll.setStyle("-fx-background: #fff5f5; -fx-background-color: #fff5f5;");
        scroll.setPrefHeight(200);

        VBox urgenceSection = new VBox(10);
        urgenceSection.setPadding(new Insets(0, 25, 12, 25));
        urgenceSection.setStyle("-fx-background-color: #fff5f5;");
        urgenceSection.getChildren().addAll(urgenceBox, messageBox);

        container.getChildren().addAll(header, scroll, urgenceSection, btnBox);

        Scene scene = new Scene(container, 520, 620);
        stage.setScene(scene);
        stage.setResizable(false);
        stage.showAndWait();
    }

    // ═══════════════════════════════════════════════════
    // POPUP NORMAL - VERT
    // ═══════════════════════════════════════════════════
    private void afficherAnalyseNormale(String analyse) {
        Stage stage = new Stage();
        stage.setTitle("Analyse Gemini - Journal");
        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        VBox container = new VBox(0);
        container.setStyle("-fx-background-color: #f0f4f8;");

        // Header vert
        VBox header = new VBox(6);
        header.setAlignment(Pos.CENTER);
        header.setPadding(new Insets(22, 30, 22, 30));
        header.setStyle("-fx-background-color: linear-gradient(to right, #285921, #43a047);");

        Label title = new Label("Analyse de votre ecriture");
        title.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: white;");
        Label sub = new Label("Powered by Google Gemini AI");
        sub.setStyle("-fx-font-size: 11px; -fx-text-fill: rgba(255,255,255,0.75);");
        header.getChildren().addAll(title, sub);

        // Contenu
        VBox content = new VBox(10);
        content.setPadding(new Insets(18, 25, 15, 25));

        String[] lignes = analyse.split("\n");
        for (String ligneStr : lignes) {
            ligneStr = ligneStr.trim();
            if (ligneStr.isEmpty() || ligneStr.contains("NIVEAU URGENCE")) continue;

            if (ligneStr.startsWith("ANALYSE") || ligneStr.startsWith("CONSEIL")) {
                VBox bloc = new VBox(5);
                bloc.setPadding(new Insets(11, 14, 11, 14));
                String bg = ligneStr.startsWith("ANALYSE") ? "#e8f5e9" : "#e3f2fd";
                String couleur = ligneStr.startsWith("ANALYSE") ? "#285921" : "#1565c0";
                bloc.setStyle("-fx-background-color: " + bg + "; -fx-background-radius: 8;");

                String[] parts = ligneStr.split(":", 2);
                Label key = new Label(parts[0].trim());
                key.setStyle("-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: " + couleur + ";");
                Label val = new Label(parts.length == 2 ? parts[1].trim() : "");
                val.setStyle("-fx-font-size: 12px; -fx-text-fill: #333;");
                val.setWrapText(true);
                val.setMaxWidth(440);
                bloc.getChildren().addAll(key, val);
                content.getChildren().add(bloc);

            } else {
                HBox row = new HBox(10);
                row.setAlignment(Pos.CENTER_LEFT);
                row.setPadding(new Insets(9, 14, 9, 14));
                row.setStyle("-fx-background-color: white; -fx-background-radius: 8;");

                String[] parts = ligneStr.split(":", 2);
                if (parts.length == 2) {
                    Label key = new Label(parts[0].trim() + " :");
                    key.setStyle("-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: #285921; -fx-min-width: 150;");
                    Label val = new Label(parts[1].trim());
                    val.setStyle("-fx-font-size: 12px; -fx-text-fill: #333; -fx-font-weight: bold;");
                    row.getChildren().addAll(key, val);
                } else {
                    Label l = new Label(ligneStr);
                    l.setStyle("-fx-font-size: 12px; -fx-text-fill: #555;");
                    row.getChildren().add(l);
                }
                content.getChildren().add(row);
            }
        }

        // Bouton
        VBox btnBox = new VBox();
        btnBox.setAlignment(Pos.CENTER);
        btnBox.setPadding(new Insets(12, 25, 18, 25));
        btnBox.setStyle("-fx-background-color: #f0f4f8;");

        Button closeBtn = new Button("Compris, enregistrer");
        closeBtn.setPrefWidth(240);
        closeBtn.setStyle("-fx-background-color: #285921; -fx-text-fill: white; "
                + "-fx-font-size: 13px; -fx-font-weight: bold; "
                + "-fx-padding: 13 20; -fx-background-radius: 22; -fx-cursor: hand;");
        closeBtn.setOnAction(e -> stage.close());
        btnBox.getChildren().add(closeBtn);

        ScrollPane scroll = new ScrollPane(content);
        scroll.setFitToWidth(true);
        scroll.setStyle("-fx-background: #f0f4f8; -fx-background-color: #f0f4f8;");
        scroll.setPrefHeight(310);

        container.getChildren().addAll(header, scroll, btnBox);

        Scene scene = new Scene(container, 500, 470);
        stage.setScene(scene);
        stage.setResizable(false);
        stage.showAndWait();
    }

    // ═══════════════════════════════════════════════════
    // ENREGISTREMENT
    // ═══════════════════════════════════════════════════
    private void enregistrerJournal() {
        try {
            Date today = Date.valueOf(LocalDate.now());
            JournalEntry existingEntry = journalDao.getEntryByDate(userId, today);

            if (existingEntry != null) {
                existingEntry.setHumeur(selectedHumeur);
                existingEntry.setEmotions(new ArrayList<>(selectedEmotions));
                existingEntry.setEnergie((int) energieSlider.getValue());
                existingEntry.setSommeilQualite((int) sommeilSlider.getValue());
                existingEntry.setNoteTexte(notesArea.getText());
                if (journalDao.updateEntry(existingEntry))
                    showSuccessMessage("Entree mise a jour !");
            } else {
                JournalEntry entry = new JournalEntry(userId, today, selectedHumeur,
                        notesArea.getText(), (int) energieSlider.getValue(), (int) sommeilSlider.getValue());
                entry.setEmotions(new ArrayList<>(selectedEmotions));
                int id = journalDao.createEntry(entry);
                if (id > 0) {
                    showSuccessMessage("Entree enregistree !");
                    loadStreakDays();
                }
            }
        } catch (Exception e) {
            System.err.println("Erreur enregistrement: " + e.getMessage());
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible d'enregistrer l'entree.");
        }
    }

    @FXML
    private void showCalendar() {
        try {
            File fxmlFile = new File("src/TestPsychologique/views/MoodCalendarView.fxml");
            FXMLLoader loader = new FXMLLoader(fxmlFile.toURI().toURL());
            Parent root = loader.load();
            MoodCalendarController controller = loader.getController();
            controller.setUserId(userId);
            Stage stage = new Stage();
            stage.setTitle("Calendrier Emotionnel");
            stage.setScene(new Scene(root, 1000, 700));
            stage.show();
        } catch (Exception e) {
            System.err.println("Erreur calendrier: " + e.getMessage());
        }
    }

    @FXML
    private void handleBack() {
        try {
            File fxmlFile = new File("src/TestPsychologique/views/UserInterface.fxml");
            FXMLLoader loader = new FXMLLoader(fxmlFile.toURI().toURL());
            Parent root = loader.load();
            Stage stage = (Stage) dateLabel.getScene().getWindow();
            stage.setScene(new Scene(root, 1500, 900));
            stage.setTitle("NAFSEYTI - Espace Etudiant");
        } catch (Exception e) {
            System.err.println("Erreur retour: " + e.getMessage());
        }
    }

    private void showAlert(Alert.AlertType type, String title, String content) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }

    private void showSuccessMessage(String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Succes");
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}