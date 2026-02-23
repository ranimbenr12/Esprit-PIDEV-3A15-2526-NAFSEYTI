// ===============================================
// 🎨 AMÉLIORATION DU CALENDRIER ÉMOTIONNEL
// ===============================================

package TestPsychologique.controllers;

import TestPsychologique.dao.JournalEntrydao;
import TestPsychologique.models.JournalEntry;
import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.chart.LineChart;
import javafx.scene.chart.XYChart;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import javafx.scene.shape.Circle;
import javafx.stage.Stage;
import javafx.scene.effect.DropShadow;
import javafx.scene.paint.Color;

import java.sql.Date;
import java.time.LocalDate;
import java.time.YearMonth;
import java.time.format.DateTimeFormatter;
import java.util.*;

public class MoodCalendarController {

    @FXML private Label monthYearLabel;
    @FXML private Button btnPrevMonth;
    @FXML private Button btnNextMonth;

    // Statistiques
    @FXML private Label lblEntriesCount;
    @FXML private Label lblDominantMood;
    @FXML private Label lblDominantMoodText;
    @FXML private Label lblAvgEnergie;
    @FXML private VBox statsContainer;

    // Calendrier
    @FXML private GridPane calendarHeader;
    @FXML private GridPane calendarGrid;

    // Graphique
    @FXML private LineChart<String, Number> moodChart;

    // Émotions
    @FXML private FlowPane topEmotionsPane;

    private JournalEntrydao journalDao;
    private int userId;
    private YearMonth currentMonth;
    private Map<LocalDate, JournalEntry> entriesMap = new HashMap<>();

    @FXML
    public void initialize() {
        journalDao = new JournalEntrydao();
        currentMonth = YearMonth.now();

        setupCalendarHeader();
        setupChartStyle();
    }

    public void setUserId(int userId) {
        this.userId = userId;
        loadMonthData();
    }

    /**
     * ✅ Configuration du style du graphique
     */
    private void setupChartStyle() {
        moodChart.setCreateSymbols(true);
        moodChart.setLegendVisible(false);
        moodChart.setAnimated(true);
    }

    /**
     * Configuration des en-têtes du calendrier
     */
    private void setupCalendarHeader() {
        String[] jours = {"Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"};

        for (int i = 0; i < jours.length; i++) {
            Label label = new Label(jours[i]);
            label.setStyle("-fx-font-size: 14px; " +
                    "-fx-font-weight: bold; " +
                    "-fx-text-fill: #285921; " +
                    "-fx-alignment: center;");
            label.setPrefWidth(120);
            label.setAlignment(Pos.CENTER);
            calendarHeader.add(label, i, 0);
        }
    }

    /**
     * Charger les données du mois
     */
    private void loadMonthData() {
        // Mettre à jour le label du mois
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("MMMM yyyy", Locale.FRENCH);
        String monthText = currentMonth.format(formatter);
        monthYearLabel.setText(monthText.substring(0, 1).toUpperCase() + monthText.substring(1));

        // Récupérer les entrées du mois
        LocalDate firstDay = currentMonth.atDay(1);
        LocalDate lastDay = currentMonth.atEndOfMonth();

        Date startDate = Date.valueOf(firstDay);
        Date endDate = Date.valueOf(lastDay);

        List<JournalEntry> entries = journalDao.getEntriesByPeriod(userId, startDate, endDate);

        // Créer une map
        entriesMap.clear();
        for (JournalEntry entry : entries) {
            entriesMap.put(entry.getDate().toLocalDate(), entry);
        }

        // Mettre à jour
        updateStatisticsImproved(entries);
        buildCalendarImproved();
        buildMoodChartImproved(entries);
        updateTopEmotionsImproved(entries);
    }

    /**
     * ✅ AMÉLIORATION: Statistiques avec animations
     */
    private void updateStatisticsImproved(List<JournalEntry> entries) {
        // Nombre d'entrées avec animation
        animateNumber(lblEntriesCount, 0, entries.size(), 800);

        if (entries.isEmpty()) {
            lblDominantMood.setText("😐");
            lblDominantMoodText.setText("Aucune");
            lblAvgEnergie.setText("0.0");
            return;
        }

        // Humeur dominante
        Map<String, Integer> humeurCount = new HashMap<>();
        double totalEnergie = 0;

        for (JournalEntry entry : entries) {
            humeurCount.put(entry.getHumeur(),
                    humeurCount.getOrDefault(entry.getHumeur(), 0) + 1);
            totalEnergie += entry.getEnergie();
        }

        String dominantHumeur = Collections.max(
                humeurCount.entrySet(),
                Map.Entry.comparingByValue()
        ).getKey();

        lblDominantMood.setText(getHumeurEmoji(dominantHumeur));
        lblDominantMoodText.setText(getHumeurText(dominantHumeur));

        // Énergie moyenne avec animation
        double avgEnergie = totalEnergie / entries.size();
        animateNumber(lblAvgEnergie, 0, avgEnergie, 1000);
    }

    /**
     * ✅ AMÉLIORATION: Animation des nombres
     */
    private void animateNumber(Label label, double start, double end, int duration) {
        javafx.animation.Timeline timeline = new javafx.animation.Timeline();
        int steps = 30;
        double increment = (end - start) / steps;

        for (int i = 0; i <= steps; i++) {
            final double value = start + (increment * i);
            javafx.animation.KeyFrame keyFrame = new javafx.animation.KeyFrame(
                    javafx.util.Duration.millis(duration * i / steps),
                    e -> {
                        if (end % 1 == 0) {
                            label.setText(String.valueOf((int)value));
                        } else {
                            label.setText(String.format("%.1f", value));
                        }
                    }
            );
            timeline.getKeyFrames().add(keyFrame);
        }

        timeline.play();
    }

    /**
     * ✅ AMÉLIORATION: Calendrier avec meilleur design
     */
    private void buildCalendarImproved() {
        calendarGrid.getChildren().clear();

        LocalDate firstDay = currentMonth.atDay(1);
        int firstDayOfWeek = firstDay.getDayOfWeek().getValue();
        int daysInMonth = currentMonth.lengthOfMonth();

        int row = 0;
        int col = firstDayOfWeek - 1;

        for (int day = 1; day <= daysInMonth; day++) {
            LocalDate date = currentMonth.atDay(day);
            StackPane dayPane = createDayCellImproved(date);

            calendarGrid.add(dayPane, col, row);

            col++;
            if (col > 6) {
                col = 0;
                row++;
            }
        }
    }

    /**
     * ✅ AMÉLIORATION: Cellule de jour avec meilleur design
     */
    private StackPane createDayCellImproved(LocalDate date) {
        StackPane pane = new StackPane();
        pane.setPrefSize(120, 110);
        pane.setPadding(new Insets(8));

        VBox content = new VBox(5);
        content.setAlignment(Pos.TOP_CENTER);

        // Numéro du jour
        Label dayLabel = new Label(String.valueOf(date.getDayOfMonth()));
        dayLabel.setStyle("-fx-font-size: 13px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: #285921;");

        JournalEntry entry = entriesMap.get(date);
        boolean isToday = date.equals(LocalDate.now());

        if (entry != null) {
            // ✅ Jour avec entrée - Design amélioré
            String bgColor = isToday ? "#c8e6c9" : "#e8f5e9";
            String borderColor = isToday ? "#1b5e20" : "#2e7d32";
            int borderWidth = isToday ? 3 : 2;

            pane.setStyle(String.format(
                    "-fx-background-color: %s; " +
                            "-fx-border-color: %s; " +
                            "-fx-border-width: %d; " +
                            "-fx-border-radius: 10; " +
                            "-fx-background-radius: 10; " +
                            "-fx-cursor: hand; " +
                            "-fx-effect: dropshadow(gaussian, rgba(46,125,50,0.3), 8, 0, 0, 2);",
                    bgColor, borderColor, borderWidth
            ));

            // Emoji plus grand
            Label moodLabel = new Label(entry.getHumeurEmoji());
            moodLabel.setStyle("-fx-font-size: 40px;");

            // Indicateur d'énergie
            HBox energyBar = createEnergyBar(entry.getEnergie());

            content.getChildren().addAll(dayLabel, moodLabel, energyBar);

            // Effet hover
            pane.setOnMouseEntered(e -> {
                pane.setStyle(pane.getStyle() +
                        "-fx-scale-x: 1.05; -fx-scale-y: 1.05;");
            });

            pane.setOnMouseExited(e -> {
                pane.setStyle(String.format(
                        "-fx-background-color: %s; " +
                                "-fx-border-color: %s; " +
                                "-fx-border-width: %d; " +
                                "-fx-border-radius: 10; " +
                                "-fx-background-radius: 10; " +
                                "-fx-cursor: hand; " +
                                "-fx-effect: dropshadow(gaussian, rgba(46,125,50,0.3), 8, 0, 0, 2);",
                        bgColor, borderColor, borderWidth
                ));
            });

            // Tooltip amélioré
            Tooltip tooltip = createImprovedTooltip(entry);
            Tooltip.install(pane, tooltip);

            // Click pour détails
            pane.setOnMouseClicked(e -> showEntryDetailsImproved(entry));

        } else {
            // Jour sans entrée
            if (date.isAfter(LocalDate.now())) {
                // Jour futur
                pane.setStyle("-fx-background-color: #fafafa; " +
                        "-fx-border-color: #e0e0e0; " +
                        "-fx-border-width: 1; " +
                        "-fx-border-radius: 10; " +
                        "-fx-background-radius: 10;");
                dayLabel.setStyle("-fx-font-size: 13px; " +
                        "-fx-font-weight: bold; " +
                        "-fx-text-fill: #bbb;");
            } else if (isToday) {
                // Aujourd'hui sans entrée
                pane.setStyle("-fx-background-color: #fff9c4; " +
                        "-fx-border-color: #fbc02d; " +
                        "-fx-border-width: 2; " +
                        "-fx-border-radius: 10; " +
                        "-fx-background-radius: 10;");
                Label addLabel = new Label("➕");
                addLabel.setStyle("-fx-font-size: 30px; " +
                        "-fx-text-fill: #f57c00;");
                content.getChildren().addAll(dayLabel, addLabel);

                // Tooltip pour ajouter
                Tooltip.install(pane, new Tooltip("Cliquez pour ajouter une entrée"));
            } else {
                // Jour passé sans entrée
                pane.setStyle("-fx-background-color: white; " +
                        "-fx-border-color: #e0e0e0; " +
                        "-fx-border-width: 1; " +
                        "-fx-border-radius: 10; " +
                        "-fx-background-radius: 10;");
                Label emptyLabel = new Label("–");
                emptyLabel.setStyle("-fx-font-size: 24px; " +
                        "-fx-text-fill: #ddd;");
                content.getChildren().addAll(dayLabel, emptyLabel);
            }
        }

        pane.getChildren().add(content);
        return pane;
    }

    /**
     * ✅ NOUVEAU: Barre d'énergie visuelle
     */
    private HBox createEnergyBar(int energie) {
        HBox bar = new HBox(2);
        bar.setAlignment(Pos.CENTER);
        bar.setPrefHeight(6);
        bar.setMaxWidth(60);

        int filledBars = (int)Math.ceil(energie / 2.0); // 10 points = 5 barres

        for (int i = 0; i < 5; i++) {
            Region segment = new Region();
            segment.setPrefSize(10, 6);
            segment.setStyle(i < filledBars ?
                    "-fx-background-color: #4caf50; -fx-background-radius: 2;" :
                    "-fx-background-color: #e0e0e0; -fx-background-radius: 2;");
            bar.getChildren().add(segment);
        }

        return bar;
    }

    /**
     * ✅ AMÉLIORATION: Tooltip avec meilleur design
     */
    private Tooltip createImprovedTooltip(JournalEntry entry) {
        String emotionsText = entry.getEmotions().isEmpty() ?
                "Aucune" : String.join(", ", entry.getEmotions());

        Tooltip tooltip = new Tooltip(
                "🗓 " + entry.getDate().toLocalDate().format(
                        DateTimeFormatter.ofPattern("dd MMMM yyyy", Locale.FRENCH)
                ) + "\n\n" +
                        "😊 Humeur: " + getHumeurText(entry.getHumeur()) + "\n" +
                        "⚡ Énergie: " + entry.getEnergie() + "/10\n" +
                        "😴 Sommeil: " + entry.getSommeilQualite() + "/10\n" +
                        "💭 Émotions: " + emotionsText
        );

        tooltip.setStyle("-fx-background-color: rgba(40,89,33,0.95); " +
                "-fx-text-fill: white; " +
                "-fx-font-size: 13px; " +
                "-fx-padding: 12; " +
                "-fx-background-radius: 8;");

        return tooltip;
    }

    /**
     * ✅ AMÉLIORATION: Graphique avec meilleur style
     */
    private void buildMoodChartImproved(List<JournalEntry> entries) {
        moodChart.getData().clear();

        if (entries.isEmpty()) {
            return;
        }

        entries.sort(Comparator.comparing(JournalEntry::getDate));

        XYChart.Series<String, Number> series = new XYChart.Series<>();
        series.setName("Humeur");

        for (JournalEntry entry : entries) {
            int day = entry.getDate().toLocalDate().getDayOfMonth();
            int score = entry.getHumeurScore();
            series.getData().add(new XYChart.Data<>(String.valueOf(day), score));
        }

        moodChart.getData().add(series);

        // Style du graphique
        moodChart.lookupAll(".chart-series-line")
                .forEach(node -> node.setStyle("-fx-stroke: #2e7d32; -fx-stroke-width: 3px;"));

        moodChart.lookupAll(".chart-line-symbol")
                .forEach(node -> node.setStyle("-fx-background-color: #2e7d32, white; " +
                        "-fx-background-insets: 0, 2; " +
                        "-fx-background-radius: 5px; " +
                        "-fx-padding: 5px;"));
    }

    /**
     * ✅ AMÉLIORATION: Émotions avec design moderne
     */
    private void updateTopEmotionsImproved(List<JournalEntry> entries) {
        topEmotionsPane.getChildren().clear();

        if (entries.isEmpty()) {
            VBox emptyBox = new VBox(10);
            emptyBox.setAlignment(Pos.CENTER);
            emptyBox.setStyle("-fx-padding: 30;");

            Label icon = new Label("💭");
            icon.setStyle("-fx-font-size: 48px;");

            Label text = new Label("Aucune émotion enregistrée ce mois");
            text.setStyle("-fx-font-size: 14px; -fx-text-fill: #999;");

            emptyBox.getChildren().addAll(icon, text);
            topEmotionsPane.getChildren().add(emptyBox);
            return;
        }

        // Compter les émotions
        Map<String, Integer> emotionCount = new HashMap<>();
        for (JournalEntry entry : entries) {
            for (String emotion : entry.getEmotions()) {
                emotionCount.put(emotion,
                        emotionCount.getOrDefault(emotion, 0) + 1);
            }
        }

        // Trier et prendre le top 5
        List<Map.Entry<String, Integer>> sortedEmotions =
                new ArrayList<>(emotionCount.entrySet());
        sortedEmotions.sort((a, b) -> b.getValue().compareTo(a.getValue()));

        int count = Math.min(5, sortedEmotions.size());

        for (int i = 0; i < count; i++) {
            Map.Entry<String, Integer> entry = sortedEmotions.get(i);

            VBox emotionCard = new VBox(8);
            emotionCard.setAlignment(Pos.CENTER);
            emotionCard.setPrefWidth(150);
            emotionCard.setStyle("-fx-background-color: white; " +
                    "-fx-padding: 15; " +
                    "-fx-background-radius: 12; " +
                    "-fx-border-color: #e8f5e9; " +
                    "-fx-border-width: 2; " +
                    "-fx-border-radius: 12; " +
                    "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 8, 0, 0, 2);");

            // Médaille pour le top 3
            String medal = i == 0 ? "🥇" : i == 1 ? "🥈" : i == 2 ? "🥉" : "📍";
            Label medalLabel = new Label(medal);
            medalLabel.setStyle("-fx-font-size: 24px;");

            Label emotionLabel = new Label(entry.getKey());
            emotionLabel.setStyle("-fx-font-size: 15px; " +
                    "-fx-font-weight: bold; " +
                    "-fx-text-fill: #285921;");
            emotionLabel.setWrapText(true);

            Label countLabel = new Label(entry.getValue() + " fois");
            countLabel.setStyle("-fx-font-size: 13px; " +
                    "-fx-text-fill: #666;");

            // Pourcentage
            int totalEntries = entries.size();
            int percentage = (entry.getValue() * 100) / totalEntries;
            Label percentLabel = new Label(percentage + "%");
            percentLabel.setStyle("-fx-font-size: 18px; " +
                    "-fx-font-weight: bold; " +
                    "-fx-text-fill: #2e7d32;");

            emotionCard.getChildren().addAll(
                    medalLabel,
                    emotionLabel,
                    percentLabel,
                    countLabel
            );

            topEmotionsPane.getChildren().add(emotionCard);
        }
    }

    /**
     * ✅ AMÉLIORATION: Fenêtre de détails moderne
     */
    private void showEntryDetailsImproved(JournalEntry entry) {
        Stage stage = new Stage();
        stage.setTitle("📖 Détails du " +
                entry.getDate().toLocalDate().format(
                        DateTimeFormatter.ofPattern("dd MMMM yyyy", Locale.FRENCH)
                )
        );
        stage.initModality(javafx.stage.Modality.APPLICATION_MODAL);
        stage.setMinWidth(600);
        stage.setMinHeight(500);

        // VBox principal
        VBox mainBox = new VBox(20);
        mainBox.setPadding(new Insets(30));
        mainBox.setStyle("-fx-background-color: #f8f5f2;");

        // Header avec humeur
        VBox headerBox = new VBox(10);
        headerBox.setAlignment(Pos.CENTER);
        headerBox.setStyle("-fx-background-color: linear-gradient(to right, #285921, #2e7d32); " +
                "-fx-padding: 25; " +
                "-fx-background-radius: 12;");

        Label emojiLabel = new Label(entry.getHumeurEmoji());
        emojiLabel.setStyle("-fx-font-size: 60px;");

        Label humeurLabel = new Label(getHumeurText(entry.getHumeur()));
        humeurLabel.setStyle("-fx-font-size: 28px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: white;");

        headerBox.getChildren().addAll(emojiLabel, humeurLabel);

        // Indicateurs
        HBox indicateursBox = new HBox(15);
        indicateursBox.setAlignment(Pos.CENTER);

        indicateursBox.getChildren().addAll(
                createStatBox("⚡", "Énergie", entry.getEnergie() + "/10"),
                createStatBox("😴", "Sommeil", entry.getSommeilQualite() + "/10")
        );

        // Émotions
        VBox emotionsBox = new VBox(12);
        emotionsBox.setStyle("-fx-background-color: white; " +
                "-fx-padding: 20; " +
                "-fx-background-radius: 10;");

        Label emotionsTitleLabel = new Label("💭 Émotions");
        emotionsTitleLabel.setStyle("-fx-font-size: 18px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: #285921;");

        FlowPane emotionsFlow = new FlowPane(10, 10);

        if (entry.getEmotions().isEmpty()) {
            Label noEmotions = new Label("Aucune émotion enregistrée");
            noEmotions.setStyle("-fx-text-fill: #999;");
            emotionsFlow.getChildren().add(noEmotions);
        } else {
            for (String emotion : entry.getEmotions()) {
                Label emotionTag = new Label(emotion);
                emotionTag.setStyle("-fx-background-color: #e8f5e9; " +
                        "-fx-text-fill: #285921; " +
                        "-fx-padding: 8 16; " +
                        "-fx-background-radius: 15; " +
                        "-fx-font-size: 13px;");
                emotionsFlow.getChildren().add(emotionTag);
            }
        }

        emotionsBox.getChildren().addAll(emotionsTitleLabel, emotionsFlow);

        // Notes
        if (entry.getNoteTexte() != null && !entry.getNoteTexte().isEmpty()) {
            VBox notesBox = new VBox(12);
            notesBox.setStyle("-fx-background-color: white; " +
                    "-fx-padding: 20; " +
                    "-fx-background-radius: 10;");

            Label notesTitleLabel = new Label("📝 Notes");
            notesTitleLabel.setStyle("-fx-font-size: 18px; " +
                    "-fx-font-weight: bold; " +
                    "-fx-text-fill: #285921;");

            TextArea notesArea = new TextArea(entry.getNoteTexte());
            notesArea.setEditable(false);
            notesArea.setWrapText(true);
            notesArea.setPrefRowCount(4);
            notesArea.setStyle("-fx-background-color: #f5f5f5; " +
                    "-fx-border-color: #e0e0e0; " +
                    "-fx-border-radius: 8; " +
                    "-fx-background-radius: 8;");

            notesBox.getChildren().addAll(notesTitleLabel, notesArea);
            mainBox.getChildren().add(notesBox);
        }

        // Bouton fermer
        Button closeBtn = new Button("✖ Fermer");
        closeBtn.setStyle("-fx-background-color: #f44336; " +
                "-fx-text-fill: white; " +
                "-fx-font-size: 14px; " +
                "-fx-padding: 12 30; " +
                "-fx-background-radius: 8;");
        closeBtn.setOnAction(e -> stage.close());

        HBox buttonBox = new HBox(closeBtn);
        buttonBox.setAlignment(Pos.CENTER);

        mainBox.getChildren().addAll(
                headerBox,
                indicateursBox,
                emotionsBox,
                buttonBox
        );

        ScrollPane scrollPane = new ScrollPane(mainBox);
        scrollPane.setFitToWidth(true);
        scrollPane.setStyle("-fx-background: transparent; " +
                "-fx-background-color: transparent;");

        javafx.scene.Scene scene = new javafx.scene.Scene(scrollPane, 600, 600);
        stage.setScene(scene);
        stage.show();
    }

    /**
     * ✅ NOUVEAU: Créer une box de statistique
     */
    private VBox createStatBox(String icon, String label, String value) {
        VBox box = new VBox(5);
        box.setAlignment(Pos.CENTER);
        box.setStyle("-fx-background-color: white; " +
                "-fx-padding: 15; " +
                "-fx-background-radius: 10; " +
                "-fx-min-width: 120;");

        Label iconLabel = new Label(icon);
        iconLabel.setStyle("-fx-font-size: 32px;");

        Label valueLabel = new Label(value);
        valueLabel.setStyle("-fx-font-size: 20px; " +
                "-fx-font-weight: bold; " +
                "-fx-text-fill: #285921;");

        Label descLabel = new Label(label);
        descLabel.setStyle("-fx-font-size: 12px; " +
                "-fx-text-fill: #666;");

        box.getChildren().addAll(iconLabel, valueLabel, descLabel);
        return box;
    }

    /**
     * Mois précédent
     */
    @FXML
    private void previousMonth() {
        currentMonth = currentMonth.minusMonths(1);
        loadMonthData();
    }

    /**
     * Mois suivant
     */
    @FXML
    private void nextMonth() {
        currentMonth = currentMonth.plusMonths(1);
        loadMonthData();
    }

    /**
     * Retour
     */
    @FXML
    private void handleBack() {
        Stage stage = (Stage) monthYearLabel.getScene().getWindow();
        stage.close();
    }

    // Méthodes utilitaires
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