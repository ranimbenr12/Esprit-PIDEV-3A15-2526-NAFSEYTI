package tn.esprit.nafseyti.controllers;

import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.chart.PieChart;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.Tooltip;
import javafx.scene.layout.*;
import javafx.stage.Stage;
import tn.esprit.nafseyti.models.JournalEntry;
import tn.esprit.nafseyti.utils.JournalEntrydao;

import java.sql.Date;
import java.time.LocalDate;
import java.time.YearMonth;
import java.time.format.DateTimeFormatter;
import java.util.*;

/**
 * 📊 Contrôleur Calendrier - Version Ultra Moderne
 */
public class MoodCalendarController {

    @FXML private Label monthYearLabel;
    @FXML private Button btnPrevMonth;
    @FXML private Button btnNextMonth;

    // Stats
    @FXML private Label lblEntriesCount;
    @FXML private Label lblDominantMood;
    @FXML private Label lblDominantMoodText;
    @FXML private Label lblAvgEnergie;
    @FXML private Label lblAvgSommeil;

    // Calendrier
    @FXML private GridPane calendarHeader;
    @FXML private GridPane calendarGrid;

    // Charts
    @FXML private PieChart moodPieChart;

    // Émotions
    @FXML private VBox topEmotionsPane;

    private JournalEntrydao journalDao;
    private int userId = 1;
    private YearMonth currentMonth;
    private Map<LocalDate, JournalEntry> entriesMap = new HashMap<>();

    @FXML
    public void initialize() {
        journalDao = new JournalEntrydao();
        currentMonth = YearMonth.now();
        setupCalendarHeader();
    }

    public void setUserId(int userId) {
        this.userId = userId;
        loadMonthData();
    }

    /**
     * En-têtes jours
     */
    private void setupCalendarHeader() {
        String[] jours = {"L", "M", "M", "J", "V", "S", "D"};

        for (int i = 0; i < jours.length; i++) {
            Label label = new Label(jours[i]);
            label.setStyle("-fx-font-size: 11px; -fx-font-weight: 600; -fx-text-fill: #999;");
            label.setPrefWidth(70);
            label.setAlignment(Pos.CENTER);
            calendarHeader.add(label, i, 0);
        }
    }

    /**
     * Charger données
     */
    private void loadMonthData() {
        // Label mois
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("MMMM yyyy", Locale.FRENCH);
        String monthText = currentMonth.format(formatter);
        monthYearLabel.setText(monthText.substring(0, 1).toUpperCase() + monthText.substring(1));

        // Récupérer entrées
        LocalDate firstDay = currentMonth.atDay(1);
        LocalDate lastDay = currentMonth.atEndOfMonth();
        Date startDate = Date.valueOf(firstDay);
        Date endDate = Date.valueOf(lastDay);

        List<JournalEntry> entries = journalDao.getEntriesByPeriod(userId, startDate, endDate);

        entriesMap.clear();
        for (JournalEntry entry : entries) {
            entriesMap.put(entry.getDate().toLocalDate(), entry);
        }

        updateStatistics(entries);
        buildCalendar();
        buildPieChart(entries);
        updateTopEmotions(entries);
    }

    /**
     * Stats
     */
    private void updateStatistics(List<JournalEntry> entries) {
        lblEntriesCount.setText(String.valueOf(entries.size()));

        if (entries.isEmpty()) {
            lblDominantMood.setText("😐");
            lblDominantMoodText.setText("Aucune");
            lblAvgEnergie.setText("0.0");
            lblAvgSommeil.setText("0.0");
            return;
        }

        Map<String, Integer> humeurCount = new HashMap<>();
        double totalEnergie = 0, totalSommeil = 0;

        for (JournalEntry entry : entries) {
            humeurCount.put(entry.getHumeur(), humeurCount.getOrDefault(entry.getHumeur(), 0) + 1);
            totalEnergie += entry.getEnergie();
            totalSommeil += entry.getSommeilQualite();
        }

        String dominant = Collections.max(humeurCount.entrySet(), Map.Entry.comparingByValue()).getKey();
        lblDominantMood.setText(getHumeurEmoji(dominant));
        lblDominantMoodText.setText(getHumeurText(dominant));

        lblAvgEnergie.setText(String.format("%.1f", totalEnergie / entries.size()));
        lblAvgSommeil.setText(String.format("%.1f", totalSommeil / entries.size()));
    }

    /**
     * Calendrier
     */
    private void buildCalendar() {
        calendarGrid.getChildren().clear();

        LocalDate firstDay = currentMonth.atDay(1);
        int firstDayOfWeek = firstDay.getDayOfWeek().getValue();
        int daysInMonth = currentMonth.lengthOfMonth();

        int row = 0, col = firstDayOfWeek - 1;

        for (int day = 1; day <= daysInMonth; day++) {
            LocalDate date = currentMonth.atDay(day);
            StackPane cell = createDayCell(date);
            calendarGrid.add(cell, col, row);

            col++;
            if (col > 6) {
                col = 0;
                row++;
            }
        }
    }

    /**
     * Cellule jour
     */
    private StackPane createDayCell(LocalDate date) {
        StackPane pane = new StackPane();
        pane.setPrefSize(70, 65);

        VBox content = new VBox(3);
        content.setAlignment(Pos.TOP_CENTER);
        content.setPadding(new Insets(5));

        Label dayLabel = new Label(String.valueOf(date.getDayOfMonth()));
        dayLabel.setStyle("-fx-font-size: 10px; -fx-font-weight: 600; -fx-text-fill: #555;");

        JournalEntry entry = entriesMap.get(date);

        if (entry != null) {
            pane.setStyle("-fx-background-color: #e8f5e9; -fx-border-color: #81c784; " +
                    "-fx-border-width: 2; -fx-border-radius: 8; -fx-background-radius: 8; -fx-cursor: hand;");

            Label moodLabel = new Label(entry.getHumeurEmoji());
            moodLabel.setStyle("-fx-font-size: 24px;");

            content.getChildren().addAll(dayLabel, moodLabel);

            Tooltip tooltip = new Tooltip(
                    getHumeurText(entry.getHumeur()) + "\n" +
                            "⚡ " + entry.getEnergie() + "/10\n" +
                            "😴 " + entry.getSommeilQualite() + "/10"
            );
            Tooltip.install(pane, tooltip);

            pane.setOnMouseClicked(e -> showEntryDetails(entry));

        } else {
            if (date.isAfter(LocalDate.now())) {
                pane.setStyle("-fx-background-color: #fafafa; -fx-border-color: #e0e0e0; " +
                        "-fx-border-width: 1; -fx-border-radius: 8; -fx-background-radius: 8;");
                dayLabel.setStyle("-fx-font-size: 10px; -fx-font-weight: 600; -fx-text-fill: #ccc;");
            } else {
                pane.setStyle("-fx-background-color: white; -fx-border-color: #e0e0e0; " +
                        "-fx-border-width: 1; -fx-border-radius: 8; -fx-background-radius: 8;");
            }
            content.getChildren().add(dayLabel);
        }

        pane.getChildren().add(content);
        return pane;
    }

    /**
     * PieChart
     */
    private void buildPieChart(List<JournalEntry> entries) {
        moodPieChart.getData().clear();

        if (entries.isEmpty()) return;

        Map<String, Integer> humeurCount = new HashMap<>();
        for (JournalEntry entry : entries) {
            humeurCount.put(entry.getHumeur(), humeurCount.getOrDefault(entry.getHumeur(), 0) + 1);
        }

        for (Map.Entry<String, Integer> entry : humeurCount.entrySet()) {
            PieChart.Data data = new PieChart.Data(
                    getHumeurEmoji(entry.getKey()) + " " + entry.getValue(),
                    entry.getValue()
            );
            moodPieChart.getData().add(data);
        }
    }

    /**
     * Top émotions
     */
    private void updateTopEmotions(List<JournalEntry> entries) {
        topEmotionsPane.getChildren().clear();

        if (entries.isEmpty()) {
            Label noData = new Label("Aucune donnée");
            noData.setStyle("-fx-font-size: 12px; -fx-text-fill: #999;");
            topEmotionsPane.getChildren().add(noData);
            return;
        }

        Map<String, Integer> emotionCount = new HashMap<>();
        for (JournalEntry entry : entries) {
            for (String emotion : entry.getEmotions()) {
                emotionCount.put(emotion, emotionCount.getOrDefault(emotion, 0) + 1);
            }
        }

        List<Map.Entry<String, Integer>> sorted = new ArrayList<>(emotionCount.entrySet());
        sorted.sort((a, b) -> b.getValue().compareTo(a.getValue()));

        int count = Math.min(5, sorted.size());
        for (int i = 0; i < count; i++) {
            Map.Entry<String, Integer> entry = sorted.get(i);

            HBox box = new HBox(8);
            box.setAlignment(Pos.CENTER_LEFT);
            box.setStyle("-fx-background-color: #f5f7fa; -fx-padding: 8 12; -fx-background-radius: 6;");

            Label emotionLabel = new Label(entry.getKey());
            emotionLabel.setStyle("-fx-font-size: 12px; -fx-font-weight: 600; -fx-text-fill: #333;");

            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);

            Label countLabel = new Label(entry.getValue() + "×");
            countLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #666; -fx-font-weight: 600;");

            box.getChildren().addAll(emotionLabel, spacer, countLabel);
            topEmotionsPane.getChildren().add(box);
        }
    }

    /**
     * Détails
     */
    private void showEntryDetails(JournalEntry entry) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Détails");
        alert.setHeaderText(entry.getHumeurEmoji() + " " + getHumeurText(entry.getHumeur()));

        StringBuilder content = new StringBuilder();
        content.append("⚡ Énergie: ").append(entry.getEnergie()).append("/10\n");
        content.append("😴 Sommeil: ").append(entry.getSommeilQualite()).append("/10\n\n");

        if (!entry.getEmotions().isEmpty()) {
            content.append("💭 ").append(String.join(", ", entry.getEmotions())).append("\n\n");
        }

        if (entry.getNoteTexte() != null && !entry.getNoteTexte().isEmpty()) {
            content.append("📝 ").append(entry.getNoteTexte());
        }

        alert.setContentText(content.toString());
        alert.showAndWait();
    }

    @FXML
    private void previousMonth() {
        currentMonth = currentMonth.minusMonths(1);
        loadMonthData();
    }

    @FXML
    private void nextMonth() {
        currentMonth = currentMonth.plusMonths(1);
        loadMonthData();
    }

    @FXML
    private void handleBack() {
        Stage stage = (Stage) monthYearLabel.getScene().getWindow();
        stage.close();
    }

    private String getHumeurEmoji(String humeur) {
        switch (humeur) {
            case "excellent": return "😊";
            case "bien": return "🙂";
            case "moyen": return "😐";
            case "difficile": return "😔";
            case "très_difficile": return "😰";
            default: return "😐";
        }
    }

    private String getHumeurText(String humeur) {
        switch (humeur) {
            case "excellent": return "Excellent";
            case "bien": return "Bien";
            case "moyen": return "Moyen";
            case "difficile": return "Difficile";
            case "très_difficile": return "Très difficile";
            default: return "Moyen";
        }
    }
}