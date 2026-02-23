package TestPsychologique.controllers;

import TestPsychologique.dao.JournalEntrydao;
import TestPsychologique.models.JournalEntry;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.FlowPane;
import javafx.stage.Stage;

import java.io.File;
import java.sql.Date;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.*;

public class JournalController {

    @FXML private Label dateLabel;
    @FXML private Label streakLabel;

    // Boutons humeur
    @FXML private Button btnExcellent;
    @FXML private Button btnBien;
    @FXML private Button btnMoyen;
    @FXML private Button btnDifficile;
    @FXML private Button btnTresDifficile;

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
    private int userId = 1; // TODO: Remplacer par SessionManager
    private String selectedHumeur = null;
    private List<String> selectedEmotions = new ArrayList<>();
    private Map<String, Button> humeurButtons = new HashMap<>();
    private Map<String, ToggleButton> emotionButtons = new HashMap<>();

    // Émotions disponibles avec emojis
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

    /**
     * Configuration de la date
     */
    private void setupDateLabel() {
        LocalDate today = LocalDate.now();
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("EEEE d MMMM yyyy", Locale.FRENCH);
        dateLabel.setText(today.format(formatter));
    }

    /**
     * Configuration des boutons d'humeur
     */
    private void setupHumeurButtons() {
        humeurButtons.put("excellent", btnExcellent);
        humeurButtons.put("bien", btnBien);
        humeurButtons.put("moyen", btnMoyen);
        humeurButtons.put("difficile", btnDifficile);
        humeurButtons.put("très_difficile", btnTresDifficile);

        // Associer les données utilisateur
        btnExcellent.setUserData("excellent");
        btnBien.setUserData("bien");
        btnMoyen.setUserData("moyen");
        btnDifficile.setUserData("difficile");
        btnTresDifficile.setUserData("très_difficile");
    }

    /**
     * Sélectionner une humeur
     */
    @FXML
    private void selectHumeur(javafx.event.ActionEvent event) {
        Button clickedButton = (Button) event.getSource();
        selectedHumeur = (String) clickedButton.getUserData();

        // Réinitialiser tous les boutons
        for (Button btn : humeurButtons.values()) {
            btn.setStyle(btn.getStyle().replace("-fx-background-color: #e8f5e9;", "-fx-background-color: transparent;")
                    .replace("-fx-border-color: #2e7d32;", "-fx-border-color: #e0e0e0;")
                    .replace("-fx-border-width: 3;", "-fx-border-width: 2;"));
        }

        // Mettre en surbrillance le bouton sélectionné
        clickedButton.setStyle(clickedButton.getStyle()
                .replace("-fx-background-color: transparent;", "-fx-background-color: #e8f5e9;")
                .replace("-fx-border-color: #e0e0e0;", "-fx-border-color: #2e7d32;")
                .replace("-fx-border-width: 2;", "-fx-border-width: 3;"));

        System.out.println("✅ Humeur sélectionnée: " + selectedHumeur);
    }

    /**
     * Configuration des boutons d'émotions
     */
    private void setupEmotionsButtons() {
        for (Map.Entry<String, String> entry : emotionsDisponibles.entrySet()) {
            String emotionName = entry.getKey();
            String emoji = entry.getValue();

            ToggleButton btn = new ToggleButton(emoji + " " + emotionName);
            btn.setStyle("-fx-font-size: 13px; -fx-padding: 10 15; -fx-background-color: white; " +
                    "-fx-border-color: #e0e0e0; -fx-border-width: 2; -fx-border-radius: 20; " +
                    "-fx-background-radius: 20; -fx-cursor: hand;");

            btn.selectedProperty().addListener((obs, wasSelected, isSelected) -> {
                if (isSelected) {
                    btn.setStyle("-fx-font-size: 13px; -fx-padding: 10 15; -fx-background-color: #e8f5e9; " +
                            "-fx-border-color: #2e7d32; -fx-border-width: 2; -fx-border-radius: 20; " +
                            "-fx-background-radius: 20; -fx-text-fill: #285921; -fx-font-weight: bold; -fx-cursor: hand;");
                    selectedEmotions.add(emotionName);
                } else {
                    btn.setStyle("-fx-font-size: 13px; -fx-padding: 10 15; -fx-background-color: white; " +
                            "-fx-border-color: #e0e0e0; -fx-border-width: 2; -fx-border-radius: 20; " +
                            "-fx-background-radius: 20; -fx-cursor: hand;");
                    selectedEmotions.remove(emotionName);
                }
            });

            emotionButtons.put(emotionName, btn);
            emotionsPane.getChildren().add(btn);
        }
    }

    /**
     * Configuration des sliders
     */
    private void setupSliders() {
        // Slider énergie
        energieSlider.valueProperty().addListener((obs, oldVal, newVal) -> {
            int value = newVal.intValue();
            energieLabel.setText(value + "/10");
            updateSliderColor(energieSlider, value);
        });

        // Slider sommeil
        sommeilSlider.valueProperty().addListener((obs, oldVal, newVal) -> {
            int value = newVal.intValue();
            sommeilLabel.setText(value + "/10");
            updateSliderColor(sommeilSlider, value);
        });

        // Initialiser les couleurs
        updateSliderColor(energieSlider, 5);
        updateSliderColor(sommeilSlider, 5);
    }

    /**
     * Mettre à jour la couleur du slider selon la valeur
     */
    private void updateSliderColor(Slider slider, int value) {
        String color;
        if (value <= 3) {
            color = "#ef4444"; // Rouge
        } else if (value <= 6) {
            color = "#fbbf24"; // Orange
        } else {
            color = "#2e7d32"; // Vert
        }

        slider.setStyle("-fx-control-inner-background: " + color + "33;"); // 33 = 20% opacity
    }

    /**
     * Configuration de la zone de notes
     */
    private void setupNotesArea() {
        notesArea.textProperty().addListener((obs, oldVal, newVal) -> {
            int count = newVal.length();
            charCountLabel.setText(count + " caractère" + (count > 1 ? "s" : ""));
        });
    }

    /**
     * Charger le nombre de jours consécutifs
     */
    private void loadStreakDays() {
        try {
            int streak = journalDao.getStreakDays(userId);
            String emoji = streak >= 7 ? "🔥🔥🔥" : streak >= 3 ? "🔥🔥" : "🔥";
            streakLabel.setText(emoji + " " + streak + " jour(s) consécutif(s)");

            if (streak >= 7) {
                streakLabel.setStyle(streakLabel.getStyle() + "-fx-font-weight: bold;");
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement streak: " + e.getMessage());
        }
    }

    /**
     * Charger l'entrée du jour si elle existe
     */
    private void loadTodayEntry() {
        try {
            Date today = Date.valueOf(LocalDate.now());
            JournalEntry entry = journalDao.getEntryByDate(userId, today);

            if (entry != null) {
                System.out.println("📖 Entrée existante trouvée pour aujourd'hui");

                // Charger l'humeur
                selectedHumeur = entry.getHumeur();
                if (humeurButtons.containsKey(selectedHumeur)) {
                    Button btn = humeurButtons.get(selectedHumeur);
                    btn.setStyle(btn.getStyle()
                            .replace("-fx-background-color: transparent;", "-fx-background-color: #e8f5e9;")
                            .replace("-fx-border-color: #e0e0e0;", "-fx-border-color: #2e7d32;")
                            .replace("-fx-border-width: 2;", "-fx-border-width: 3;"));
                }

                // Charger les émotions
                selectedEmotions = entry.getEmotions();
                for (String emotion : selectedEmotions) {
                    if (emotionButtons.containsKey(emotion)) {
                        emotionButtons.get(emotion).setSelected(true);
                    }
                }

                // Charger énergie et sommeil
                energieSlider.setValue(entry.getEnergie());
                sommeilSlider.setValue(entry.getSommeilQualite());

                // Charger les notes
                notesArea.setText(entry.getNoteTexte());
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement entrée: " + e.getMessage());
        }
    }

    /**
     * Enregistrer l'entrée du journal
     */
    @FXML
    private void saveEntry() {
        // Validation
        if (selectedHumeur == null) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Veuillez sélectionner une humeur");
            return;
        }

        try {
            Date today = Date.valueOf(LocalDate.now());

            // Vérifier si une entrée existe déjà
            JournalEntry existingEntry = journalDao.getEntryByDate(userId, today);

            if (existingEntry != null) {
                // Mise à jour
                existingEntry.setHumeur(selectedHumeur);
                existingEntry.setEmotions(new ArrayList<>(selectedEmotions));
                existingEntry.setEnergie((int) energieSlider.getValue());
                existingEntry.setSommeilQualite((int) sommeilSlider.getValue());
                existingEntry.setNoteTexte(notesArea.getText());

                boolean success = journalDao.updateEntry(existingEntry);

                if (success) {
                    showSuccessMessage("💾 Entrée mise à jour avec succès !");
                }
            } else {
                // Nouvelle entrée
                JournalEntry entry = new JournalEntry(
                        userId,
                        today,
                        selectedHumeur,
                        notesArea.getText(),
                        (int) energieSlider.getValue(),
                        (int) sommeilSlider.getValue()
                );
                entry.setEmotions(new ArrayList<>(selectedEmotions));

                int id = journalDao.createEntry(entry);

                if (id > 0) {
                    showSuccessMessage("✅ Entrée enregistrée avec succès !");
                    loadStreakDays(); // Recharger le streak
                }
            }

        } catch (Exception e) {
            System.err.println("❌ Erreur enregistrement: " + e.getMessage());
            e.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible d'enregistrer l'entrée");
        }
    }

    /**
     * Afficher le calendrier des humeurs
     */
    @FXML
    private void showCalendar() {
        try {
            File fxmlFile = new File("src/TestPsychologique/views/MoodCalendarView.fxml");
            FXMLLoader loader = new FXMLLoader(fxmlFile.toURI().toURL());
            Parent root = loader.load();



            Stage stage = new Stage();
            stage.setTitle("📊 Calendrier Émotionnel");
            stage.setScene(new Scene(root, 1000, 700));
            stage.show();

        } catch (Exception e) {
            System.err.println("❌ Erreur ouverture calendrier: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Retour à l'interface principale
     */
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

    /**
     * Afficher une alerte
     */
    private void showAlert(Alert.AlertType type, String title, String content) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }

    /**
     * Afficher un message de succès
     */
    private void showSuccessMessage(String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Succès");
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}