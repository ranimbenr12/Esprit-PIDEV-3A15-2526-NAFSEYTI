package TestPsychologique.controllers;

import TestPsychologique.dao.JournalEntrydao;
import TestPsychologique.models.JournalEntry;
import TestPsychologique.utils.GeminiEmotionAPI;
import javafx.concurrent.Task;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.VBox;
import javafx.stage.Modality;
import javafx.stage.Stage;

import java.io.File;
import java.sql.Date;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.*;

/**
 * 📔 Contrôleur du Journal Émotionnel avec Gemini AI
 */
public class JournalController {

    @FXML private Label dateLabel;
    @FXML private Label streakLabel;

    // Boutons humeur (VBox)
    @FXML private VBox btnExcellent;
    @FXML private VBox btnBien;
    @FXML private VBox btnMoyen;
    @FXML private VBox btnDifficile;
    @FXML private VBox btnTresDifficile;

    // Émotions
    @FXML private FlowPane emotionsPane;

    // Énergie et Sommeil
    @FXML private Slider energieSlider;
    @FXML private Label energieLabel;
    @FXML private Slider sommeilSlider;
    @FXML private Label sommeilLabel;

    // Notes
    @FXML private TextArea notesArea;
    @FXML private Label charCountLabel;

    private JournalEntrydao journalDao;
    private int userId = 1;
    private String selectedHumeur = null;
    private List<String> selectedEmotions = new ArrayList<>();
    private Map<String, VBox> humeurButtons = new HashMap<>();
    private Map<String, ToggleButton> emotionButtons = new HashMap<>();

    // Émotions disponibles
    private final Map<String, String> emotionsDisponibles = new LinkedHashMap<String, String>() {{
        put("Heureux", "😊");
        put("Triste", "😢");
        put("Anxieux", "😰");
        put("Calme", "😌");
        put("Énergique", "💪");
        put("Fatigué", "😴");
        put("Stressé", "😤");
        put("Optimiste", "🌟");
        put("Confiant", "💯");
        put("Inquiet", "😟");
        put("Motivé", "🔥");
        put("Détendu", "🧘");
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
            box.setStyle("-fx-background-color: white; -fx-background-radius: 12; -fx-padding: 15 10; " +
                    "-fx-pref-width: 85; -fx-pref-height: 95; -fx-cursor: hand; " +
                    "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 6, 0, 0, 2);");
        }

        clickedBox.setStyle("-fx-background-color: linear-gradient(to bottom, #e8f5e9, #c8e6c9); " +
                "-fx-background-radius: 12; -fx-padding: 15 10; " +
                "-fx-pref-width: 85; -fx-pref-height: 95; -fx-cursor: hand; " +
                "-fx-border-color: #2e7d32; -fx-border-width: 3; -fx-border-radius: 12; " +
                "-fx-effect: dropshadow(gaussian, rgba(46,125,50,0.4), 10, 0, 0, 4);");

        System.out.println("✅ Humeur: " + selectedHumeur);
    }

    private void setupEmotionsButtons() {
        for (Map.Entry<String, String> entry : emotionsDisponibles.entrySet()) {
            String emotionName = entry.getKey();
            String emoji = entry.getValue();

            ToggleButton btn = new ToggleButton(emoji + " " + emotionName);
            btn.setStyle("-fx-font-size: 12px; -fx-padding: 8 14; -fx-background-color: #f0f4f8; " +
                    "-fx-border-color: transparent; -fx-border-radius: 18; -fx-background-radius: 18; " +
                    "-fx-cursor: hand; -fx-text-fill: #555;");

            btn.selectedProperty().addListener((obs, wasSelected, isSelected) -> {
                if (isSelected) {
                    btn.setStyle("-fx-font-size: 12px; -fx-padding: 8 14; -fx-background-color: #2e7d32; " +
                            "-fx-border-color: transparent; -fx-border-radius: 18; -fx-background-radius: 18; " +
                            "-fx-text-fill: white; -fx-font-weight: bold; -fx-cursor: hand;");
                    selectedEmotions.add(emotionName);
                } else {
                    btn.setStyle("-fx-font-size: 12px; -fx-padding: 8 14; -fx-background-color: #f0f4f8; " +
                            "-fx-border-color: transparent; -fx-border-radius: 18; -fx-background-radius: 18; " +
                            "-fx-cursor: hand; -fx-text-fill: #555;");
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
            charCountLabel.setText(count + " caractère" + (count > 1 ? "s" : ""));
        });
    }

    private void loadStreakDays() {
        try {
            int streak = journalDao.getStreakDays(userId);
            streakLabel.setText("🔥 " + streak + " jour" + (streak > 1 ? "s" : ""));
        } catch (Exception e) {
            System.err.println("❌ Erreur streak: " + e.getMessage());
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
                    box.setStyle("-fx-background-color: linear-gradient(to bottom, #e8f5e9, #c8e6c9); " +
                            "-fx-background-radius: 12; -fx-padding: 15 10; -fx-pref-width: 85; " +
                            "-fx-pref-height: 95; -fx-cursor: hand; -fx-border-color: #2e7d32; " +
                            "-fx-border-width: 3; -fx-border-radius: 12;");
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
            System.err.println("❌ Erreur chargement: " + e.getMessage());
        }
    }

    @FXML
    private void saveEntry() {
        if (selectedHumeur == null) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Veuillez sélectionner une humeur");
            return;
        }

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
                if (success) {
                    showSuccessMessage("💾 Entrée mise à jour !");
                    analyserAvecGemini();
                }
            } else {
                JournalEntry entry = new JournalEntry(
                        userId, today, selectedHumeur, notesArea.getText(),
                        (int) energieSlider.getValue(), (int) sommeilSlider.getValue()
                );
                entry.setEmotions(new ArrayList<>(selectedEmotions));

                int id = journalDao.createEntry(entry);
                if (id > 0) {
                    showSuccessMessage("✅ Entrée enregistrée !");
                    loadStreakDays();
                    analyserAvecGemini();
                }
            }

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible d'enregistrer");
        }
    }

    /**
     * 🤖 Analyser avec Gemini AI
     */
    private void analyserAvecGemini() {
        String notes = notesArea.getText();
        if (notes == null || notes.trim().length() < 10) {
            return; // Pas assez de contenu
        }

        // Créer une tâche asynchrone
        Task<String> task = new Task<String>() {
            @Override
            protected String call() throws Exception {

                // 🚨 VÉRIFICATION D'URGENCE D'ABORD
                if (GeminiEmotionAPI.containsEmergencyContent(notes)) {
                    System.out.println("🚨 CONTENU D'URGENCE DÉTECTÉ!");
                    return GeminiEmotionAPI.generateEmergencyResponse();
                }

                // Si pas d'urgence, analyse normale
                String journalText = String.format(
                        "Humeur: %s\nÉmotions: %s\nÉnergie: %d/10\nSommeil: %d/10\nNotes: %s",
                        selectedHumeur,
                        String.join(", ", selectedEmotions),
                        (int) energieSlider.getValue(),
                        (int) sommeilSlider.getValue(),
                        notes
                );

                return GeminiEmotionAPI.analyzeJournalEntry(journalText);
            }
        };

        task.setOnSucceeded(event -> {
            String analyse = task.getValue();
            afficherAnalysePopup(analyse);
        });

        task.setOnFailed(event -> {
            System.err.println("❌ Analyse échouée: " + task.getException().getMessage());
        });

        Thread thread = new Thread(task);
        thread.setDaemon(true);
        thread.start();
    }

    /**
     * 🤖 Afficher l'analyse en popup
     */
    private void afficherAnalysePopup(String analyse) {
        Stage popup = new Stage();
        popup.setTitle("🤖 Analyse Gemini AI");
        popup.initModality(Modality.APPLICATION_MODAL);

        VBox container = new VBox(15);
        container.setPadding(new Insets(25));
        container.setStyle("-fx-background-color: #f8f5f2;");
        container.setAlignment(Pos.CENTER);

        Label icon = new Label("🤖");
        icon.setStyle("-fx-font-size: 42px;");

        Label title = new Label("Analyse de votre journal");
        title.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: #285921;");

        VBox resultBox = new VBox(10);
        resultBox.setStyle("-fx-background-color: white; -fx-background-radius: 10; -fx-padding: 18; " +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 6, 0, 0, 2);");

        Label resultLabel = new Label(analyse);
        resultLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #333; -fx-line-spacing: 3px;");
        resultLabel.setWrapText(true);
        resultLabel.setMaxWidth(380);
        resultBox.getChildren().add(resultLabel);

        Button closeBtn = new Button("✓ Compris");
        closeBtn.setStyle("-fx-background-color: #2e7d32; -fx-text-fill: white; -fx-font-size: 13px; " +
                "-fx-font-weight: bold; -fx-padding: 10 25; -fx-background-radius: 18; -fx-cursor: hand;");
        closeBtn.setOnAction(e -> popup.close());

        container.getChildren().addAll(icon, title, resultBox, closeBtn);

        Scene scene = new Scene(container, 450, 350);
        popup.setScene(scene);
        popup.showAndWait();
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
            stage.setTitle("📊 Calendrier Émotionnel");
            stage.setScene(new Scene(root, 1000, 700));
            stage.show();

        } catch (Exception e) {
            System.err.println("❌ Erreur calendrier: " + e.getMessage());
            e.printStackTrace();
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
            stage.setTitle("NAFSEYTI - Espace Étudiant");

        } catch (Exception e) {
            System.err.println("❌ Erreur retour: " + e.getMessage());
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

    private void showSuccessMessage(String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Succès");
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}