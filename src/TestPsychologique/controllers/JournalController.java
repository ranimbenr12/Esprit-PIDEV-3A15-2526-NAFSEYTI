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
            box.setStyle("-fx-background-color: white; -fx-background-radius: 15; -fx-padding: 20 15; "
                    + "-fx-pref-width: 100; -fx-pref-height: 110; -fx-cursor: hand; "
                    + "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 8, 0, 0, 2);");
        }

        clickedBox.setStyle("-fx-background-color: linear-gradient(to bottom, #e8f5e9, #c8e6c9); "
                + "-fx-background-radius: 15; -fx-padding: 20 15; "
                + "-fx-pref-width: 100; -fx-pref-height: 110; -fx-cursor: hand; "
                + "-fx-border-color: #2e7d32; -fx-border-width: 3; -fx-border-radius: 15; "
                + "-fx-effect: dropshadow(gaussian, rgba(46,125,50,0.4), 15, 0, 0, 5);");
    }

    private void setupEmotionsButtons() {
        for (Map.Entry<String, String> entry : emotionsDisponibles.entrySet()) {
            String emotionName = entry.getKey();

            ToggleButton btn = new ToggleButton(emotionName);
            btn.setStyle("-fx-font-size: 12px; -fx-padding: 8 14; "
                    + "-fx-background-color: #f0f4f8; -fx-border-color: transparent; "
                    + "-fx-border-radius: 18; -fx-background-radius: 18; "
                    + "-fx-cursor: hand; -fx-text-fill: #555;");

            btn.selectedProperty().addListener((obs, wasSelected, isSelected) -> {
                if (isSelected) {
                    btn.setStyle("-fx-font-size: 12px; -fx-padding: 8 14; "
                            + "-fx-background-color: #2e7d32; -fx-border-color: transparent; "
                            + "-fx-border-radius: 18; -fx-background-radius: 18; "
                            + "-fx-text-fill: white; -fx-font-weight: bold; -fx-cursor: hand;");
                    selectedEmotions.add(emotionName);
                } else {
                    btn.setStyle("-fx-font-size: 12px; -fx-padding: 8 14; "
                            + "-fx-background-color: #f0f4f8; -fx-border-color: transparent; "
                            + "-fx-border-radius: 18; -fx-background-radius: 18; "
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
            updateSliderColor(energieSlider, value);
        });

        sommeilSlider.valueProperty().addListener((obs, oldVal, newVal) -> {
            int value = newVal.intValue();
            sommeilLabel.setText(value + "/10");
            updateSliderColor(sommeilSlider, value);
        });

        updateSliderColor(energieSlider, 5);
        updateSliderColor(sommeilSlider, 5);
    }

    private void updateSliderColor(Slider slider, int value) {
        String color;
        if (value <= 3) color = "#ef4444";
        else if (value <= 6) color = "#fbbf24";
        else color = "#2e7d32";
        slider.setStyle("-fx-control-inner-background: " + color + "33;");
    }

    private void setupNotesArea() {
        notesArea.textProperty().addListener((obs, oldVal, newVal) -> {
            int count = newVal.length();
            charCountLabel.setText(count + " caractere" + (count > 1 ? "s" : ""));
        });
    }

    private void loadStreakDays() {
        try {
            int streak = journalDao.getStreakDays(userId);
            streakLabel.setText(streak + " jour" + (streak > 1 ? "s" : ""));
        } catch (Exception e) {
            System.err.println("Erreur chargement streak: " + e.getMessage());
        }
    }

    private void loadTodayEntry() {
        try {
            Date today = Date.valueOf(LocalDate.now());
            JournalEntry entry = journalDao.getEntryByDate(userId, today);

            if (entry != null) {
                selectedHumeur = entry.getHumeur();
                if (humeurButtons.containsKey(selectedHumeur)) {
                    VBox box = humeurButtons.get(selectedHumeur);
                    box.setStyle("-fx-background-color: linear-gradient(to bottom, #e8f5e9, #c8e6c9); "
                            + "-fx-background-radius: 15; -fx-padding: 20 15; "
                            + "-fx-pref-width: 100; -fx-pref-height: 110; -fx-cursor: hand; "
                            + "-fx-border-color: #2e7d32; -fx-border-width: 3; -fx-border-radius: 15; "
                            + "-fx-effect: dropshadow(gaussian, rgba(46,125,50,0.4), 15, 0, 0, 5);");
                }

                selectedEmotions = entry.getEmotions();
                for (String emotion : selectedEmotions) {
                    if (emotionButtons.containsKey(emotion)) {
                        emotionButtons.get(emotion).setSelected(true);
                    }
                }

                energieSlider.setValue(entry.getEnergie());
                sommeilSlider.setValue(entry.getSommeilQualite());
                notesArea.setText(entry.getNoteTexte());
            }
        } catch (Exception e) {
            System.err.println("Erreur chargement entree: " + e.getMessage());
        }
    }

    @FXML
    private void saveEntry() {
        if (selectedHumeur == null) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Veuillez selectionner une humeur");
            return;
        }

        // =============================================
        // ANALYSE GEMINI avant enregistrement
        // =============================================
        String notes = notesArea.getText();
        if (notes != null && !notes.trim().isEmpty() && notes.length() > 10) {
            // Popup "chargement" pendant l'appel Gemini
            Stage loadingStage = afficherChargement();

            new Thread(() -> {
                // Appel Gemini dans un thread séparé
                String analyse = GeminiEmotionAPI.analyserEmotion(notes);

                javafx.application.Platform.runLater(() -> {
                    loadingStage.close();
                    afficherAnalyseGemini(analyse);
                    // Enregistrement après fermeture du popup
                    enregistrerJournal();
                });
            }).start();

        } else {
            // Pas de notes → enregistrer directement
            enregistrerJournal();
        }
    }

    /**
     * Popup de chargement pendant l'appel Gemini
     */
    private Stage afficherChargement() {
        Stage stage = new Stage();
        stage.setTitle("Analyse en cours...");
        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        VBox box = new VBox(15);
        box.setAlignment(Pos.CENTER);
        box.setPadding(new Insets(40));
        box.setStyle("-fx-background-color: #f8f5f2;");

        ProgressIndicator progress = new ProgressIndicator();
        progress.setPrefSize(60, 60);

        Label label = new Label("Gemini analyse votre ecriture...");
        label.setStyle("-fx-font-size: 14px; -fx-text-fill: #285921; -fx-font-weight: bold;");

        Label sub = new Label("Veuillez patienter quelques secondes");
        sub.setStyle("-fx-font-size: 12px; -fx-text-fill: #666;");

        box.getChildren().addAll(progress, label, sub);

        Scene scene = new Scene(box, 350, 180);
        stage.setScene(scene);
        stage.setResizable(false);
        stage.show();
        return stage;
    }

    /**
     * Popup d'analyse Gemini - design propre sans emojis problematiques
     */
    private void afficherAnalyseGemini(String analyse) {
        Stage popupStage = new Stage();
        popupStage.setTitle("Analyse Gemini - Journal");
        popupStage.initModality(javafx.stage.Modality.APPLICATION_MODAL);

        // ===== CONTAINER PRINCIPAL =====
        VBox container = new VBox(0);
        container.setStyle("-fx-background-color: #f0f4f8;");

        // ===== HEADER VERT =====
        VBox header = new VBox(8);
        header.setAlignment(Pos.CENTER);
        header.setPadding(new Insets(25, 30, 25, 30));
        header.setStyle("-fx-background-color: linear-gradient(to right, #285921, #2e7d32);");

        Label titleLabel = new Label("Analyse de votre ecriture");
        titleLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: white;");

        Label subtitleLabel = new Label("Powered by Google Gemini AI");
        subtitleLabel.setStyle("-fx-font-size: 12px; -fx-text-fill: rgba(255,255,255,0.8);");

        header.getChildren().addAll(titleLabel, subtitleLabel);

        // ===== CONTENU - parsing ligne par ligne =====
        VBox contentBox = new VBox(10);
        contentBox.setPadding(new Insets(20, 25, 10, 25));
        contentBox.setStyle("-fx-background-color: #f0f4f8;");

        // Parser chaque ligne de la réponse Gemini
        String[] lignes = analyse.split("\n");
        for (String ligneStr : lignes) {
            ligneStr = ligneStr.trim();
            if (ligneStr.isEmpty()) continue;

            if (ligneStr.startsWith("EMOTION DOMINANTE") || ligneStr.startsWith("INTENSITE")
                    || ligneStr.startsWith("SENTIMENT")) {
                // Ligne clé:valeur → carte colorée
                HBox row = new HBox(10);
                row.setAlignment(Pos.CENTER_LEFT);
                row.setPadding(new Insets(10, 15, 10, 15));
                row.setStyle("-fx-background-color: white; -fx-background-radius: 8; "
                        + "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.07), 4, 0, 0, 1);");

                String[] parts = ligneStr.split(":", 2);
                if (parts.length == 2) {
                    Label keyLabel = new Label(parts[0].trim() + " :");
                    keyLabel.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: #285921; -fx-min-width: 160;");

                    Label valLabel = new Label(parts[1].trim());
                    valLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #333; -fx-font-weight: bold;");
                    valLabel.setWrapText(true);

                    row.getChildren().addAll(keyLabel, valLabel);
                } else {
                    Label l = new Label(ligneStr);
                    l.setStyle("-fx-font-size: 13px; -fx-text-fill: #333;");
                    l.setWrapText(true);
                    row.getChildren().add(l);
                }
                contentBox.getChildren().add(row);

            } else if (ligneStr.startsWith("ANALYSE")) {
                // Bloc analyse
                VBox analyseBox = new VBox(6);
                analyseBox.setPadding(new Insets(12, 15, 12, 15));
                analyseBox.setStyle("-fx-background-color: #e8f5e9; -fx-background-radius: 8;");

                String[] parts = ligneStr.split(":", 2);
                Label keyLbl = new Label("Analyse psychologique");
                keyLbl.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: #285921;");

                Label valLbl = new Label(parts.length == 2 ? parts[1].trim() : ligneStr);
                valLbl.setStyle("-fx-font-size: 13px; -fx-text-fill: #333;");
                valLbl.setWrapText(true);
                valLbl.setMaxWidth(430);

                analyseBox.getChildren().addAll(keyLbl, valLbl);
                contentBox.getChildren().add(analyseBox);

            } else if (ligneStr.startsWith("CONSEIL")) {
                // Bloc conseil
                VBox conseilBox = new VBox(6);
                conseilBox.setPadding(new Insets(12, 15, 12, 15));
                conseilBox.setStyle("-fx-background-color: #e3f2fd; -fx-background-radius: 8;");

                String[] parts = ligneStr.split(":", 2);
                Label keyLbl = new Label("Conseil personnalise");
                keyLbl.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: #1565c0;");

                Label valLbl = new Label(parts.length == 2 ? parts[1].trim() : ligneStr);
                valLbl.setStyle("-fx-font-size: 13px; -fx-text-fill: #333;");
                valLbl.setWrapText(true);
                valLbl.setMaxWidth(430);

                conseilBox.getChildren().addAll(keyLbl, valLbl);
                contentBox.getChildren().add(conseilBox);

            } else {
                // Ligne normale
                Label l = new Label(ligneStr);
                l.setStyle("-fx-font-size: 13px; -fx-text-fill: #555;");
                l.setWrapText(true);
                l.setMaxWidth(450);
                contentBox.getChildren().add(l);
            }
        }

        // ===== BOUTON =====
        VBox btnBox = new VBox();
        btnBox.setAlignment(Pos.CENTER);
        btnBox.setPadding(new Insets(15, 25, 25, 25));
        btnBox.setStyle("-fx-background-color: #f0f4f8;");

        Button closeBtn = new Button("Compris, enregistrer");
        closeBtn.setPrefWidth(250);
        closeBtn.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 14px; "
                + "-fx-font-weight: bold; -fx-padding: 13 30; -fx-background-radius: 25; -fx-cursor: hand;");
        closeBtn.setOnAction(e -> popupStage.close());

        btnBox.getChildren().add(closeBtn);

        // ===== SCROLL pour contenu long =====
        ScrollPane scroll = new ScrollPane(contentBox);
        scroll.setFitToWidth(true);
        scroll.setStyle("-fx-background: #f0f4f8; -fx-background-color: #f0f4f8;");
        scroll.setPrefHeight(320);

        container.getChildren().addAll(header, scroll, btnBox);

        Scene scene = new Scene(container, 500, 500);
        popupStage.setScene(scene);
        popupStage.setResizable(false);
        popupStage.showAndWait();
    }

    /**
     * Enregistrement du journal (appele apres fermeture du popup)
     */
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

                boolean success = journalDao.updateEntry(existingEntry);
                if (success) showSuccessMessage("Entree mise a jour avec succes !");
            } else {
                JournalEntry entry = new JournalEntry(
                        userId, today, selectedHumeur, notesArea.getText(),
                        (int) energieSlider.getValue(), (int) sommeilSlider.getValue()
                );
                entry.setEmotions(new ArrayList<>(selectedEmotions));
                int id = journalDao.createEntry(entry);
                if (id > 0) {
                    showSuccessMessage("Entree enregistree avec succes !");
                    loadStreakDays();
                }
            }
        } catch (Exception e) {
            System.err.println("Erreur enregistrement: " + e.getMessage());
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible d'enregistrer l'entree");
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
            System.err.println("Erreur ouverture calendrier: " + e.getMessage());
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