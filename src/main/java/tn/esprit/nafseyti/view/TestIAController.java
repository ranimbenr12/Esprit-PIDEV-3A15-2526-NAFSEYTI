package tn.esprit.nafseyti.view;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import javafx.scene.shape.Rectangle;
import javafx.stage.Stage;
import com.google.gson.*;

import java.io.*;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.util.*;

public class TestIAController implements Initializable {

    // ── FXML references ──────────────────────────────
    @FXML private StackPane  centerPane;
    @FXML private ImageView  bgImageView;
    @FXML private Rectangle  overlay;

    @FXML private VBox       questionsContainer;
    @FXML private VBox       resultBox;
    @FXML private TextArea   resultArea;
    @FXML private Button     btnBack;
    @FXML private Button     btnSubmit;

    // ── Data ─────────────────────────────────────────
    private final List<String> questions = Arrays.asList(
            "1. Vous sentez-vous souvent triste ou vide ?",
            "2. Avez-vous des difficultés à dormir ?",
            "3. Vous sentez-vous anxieux(se) sans raison claire ?",
            "4. Avez-vous perdu l'intérêt pour vos activités habituelles ?",
            "5. Avez-vous des difficultés à vous concentrer ?",
            "6. Vous sentez-vous fatigué(e) même après repos ?",
            "7. Vous évitez les interactions sociales ?",
            "8. Vous avez des pensées négatives fréquentes ?"
    );

    private final List<ToggleGroup> toggleGroups = new ArrayList<>();

    private static final String API_KEY = "AIzaSyAeCu_-1DWcnwX8S4Oi5seVzPjYYsCLVSQ";
    private static final String API_URL  =
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" + API_KEY;

    // ─────────────────────────────────────────────────
    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {

        // ★ Lier la taille de l'image et de l'overlay à celle du StackPane
        //   → l'image s'étire exactement sur tout le centre
        bgImageView.fitWidthProperty() .bind(centerPane.widthProperty());
        bgImageView.fitHeightProperty().bind(centerPane.heightProperty());

        overlay.widthProperty() .bind(centerPane.widthProperty());
        overlay.heightProperty().bind(centerPane.heightProperty());

        buildQuestionnaire();
        addHoverEffect();
    }

    // ─────────────────────────────────────────────────
    //  Navigation
    // ─────────────────────────────────────────────────
    @FXML
    private void handleBack() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/fxmlClient/MesRendezVous.fxml"));
            Parent root = loader.load();
            Stage stage = (Stage) btnBack.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // ─────────────────────────────────────────────────
    //  Hover effect sur le bouton Back
    // ─────────────────────────────────────────────────
    private void addHoverEffect() {
        String base  = "-fx-background-color: rgba(255,255,255,0.15);" +
                "-fx-text-fill: white; -fx-font-size: 13px; -fx-font-weight: bold;" +
                "-fx-background-radius: 20; -fx-padding: 7 18; -fx-cursor: hand;" +
                "-fx-border-color: rgba(255,255,255,0.45); -fx-border-radius: 20; -fx-border-width: 1.5;";
        String hover = "-fx-background-color: rgba(255,255,255,0.30);" +
                "-fx-text-fill: white; -fx-font-size: 13px; -fx-font-weight: bold;" +
                "-fx-background-radius: 20; -fx-padding: 7 18; -fx-cursor: hand;" +
                "-fx-border-color: rgba(255,255,255,0.70); -fx-border-radius: 20; -fx-border-width: 1.5;";

        btnBack.setOnMouseEntered(e -> btnBack.setStyle(hover));
        btnBack.setOnMouseExited (e -> btnBack.setStyle(base));
    }

    // ─────────────────────────────────────────────────
    //  Construction du questionnaire
    // ─────────────────────────────────────────────────
    private void buildQuestionnaire() {
        for (String question : questions) {

            VBox questionBox = new VBox(8);
            questionBox.setStyle(
                    "-fx-background-color: #f9fdf8;" +
                            "-fx-background-radius: 10;" +
                            "-fx-border-color: #d4edda;" +
                            "-fx-border-radius: 10;" +
                            "-fx-border-width: 1;" +
                            "-fx-padding: 12 16 12 16;"
            );

            Label qLabel = new Label(question);
            qLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13px; -fx-text-fill: #1a3a1a;");
            qLabel.setWrapText(true);

            ToggleGroup group = new ToggleGroup();

            HBox optionsBox = new HBox(16);
            optionsBox.setStyle("-fx-padding: 6 0 0 0;");
            optionsBox.getChildren().addAll(
                    styledRadio("Jamais",   group),
                    styledRadio("Parfois",  group),
                    styledRadio("Souvent",  group),
                    styledRadio("Toujours", group)
            );

            questionBox.getChildren().addAll(qLabel, optionsBox);
            questionsContainer.getChildren().add(questionBox);
            toggleGroups.add(group);
        }
    }

    private RadioButton styledRadio(String text, ToggleGroup group) {
        RadioButton rb = new RadioButton(text);
        rb.setToggleGroup(group);
        rb.setStyle("-fx-font-size: 12px; -fx-text-fill: #285921;");
        return rb;
    }

    // ─────────────────────────────────────────────────
    //  Soumission
    // ─────────────────────────────────────────────────
    @FXML
    private void handleSubmit() {
        StringBuilder summary = new StringBuilder();

        for (int i = 0; i < questions.size(); i++) {
            Toggle selected = toggleGroups.get(i).getSelectedToggle();
            if (selected == null) {
                showResult("⚠️ Veuillez répondre à toutes les questions.");
                return;
            }
            summary.append(questions.get(i)).append("\n");
            summary.append("Réponse: ").append(((RadioButton) selected).getText()).append("\n\n");
        }

        showResult("⏳ Analyse en cours...");
        analyzeWithGemini(summary.toString());
    }

    private void showResult(String text) {
        resultArea.setText(text);
        resultBox.setVisible(true);
        resultBox.setManaged(true);
    }

    // ─────────────────────────────────────────────────
    //  Appel Gemini
    // ─────────────────────────────────────────────────
    private void analyzeWithGemini(String summary) {
        new Thread(() -> {
            try {
                String prompt = "Tu es un psychologue professionnel.\n"
                        + "Analyse le questionnaire ci-dessous. Chaque réponse est : Jamais, Parfois, Souvent, Toujours.\n"
                        + "Attribue un score : Jamais=0, Parfois=1, Souvent=2, Toujours=3.\n"
                        + "Fais d'abord une petite analyse chiffrée (1-2 phrases max, ex: anxiété 40%, fatigue 30%).\n"
                        + "Ensuite :\n"
                        + "- Si score total >=15 : réponds uniquement 'Va voir un médecin'.\n"
                        + "- Sinon : un court paragraphe sur son état + 1 ou 2 recommandations simples.\n"
                        + "Sois concis, clair et direct.\n\n"
                        + summary;

                String response = callGeminiAPI(prompt);
                javafx.application.Platform.runLater(() -> showResult(response));

            } catch (Exception e) {
                e.printStackTrace();
                javafx.application.Platform.runLater(() ->
                        showResult("Erreur lors de l'analyse. Veuillez réessayer."));
            }
        }).start();
    }

    private String callGeminiAPI(String promptText) throws Exception {
        URL url = new URL(API_URL);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("POST");
        conn.setRequestProperty("Content-Type", "application/json; charset=UTF-8");
        conn.setDoOutput(true);

        String body = "{\"contents\": [{\"parts\":[{\"text\":\""
                + promptText.replace("\"", "\\\"").replace("\n", "\\n")
                + "\"}]}]}";

        try (OutputStream os = conn.getOutputStream()) {
            os.write(body.getBytes(StandardCharsets.UTF_8));
        }

        int responseCode = conn.getResponseCode();
        InputStream stream = (responseCode >= 200 && responseCode < 300)
                ? conn.getInputStream() : conn.getErrorStream();

        BufferedReader br = new BufferedReader(new InputStreamReader(stream, StandardCharsets.UTF_8));
        StringBuilder sb = new StringBuilder();
        String line;
        while ((line = br.readLine()) != null) sb.append(line);

        if (responseCode == 429) return "Erreur 429 : Quota API dépassé.";
        if (responseCode >= 400) return "Erreur API : " + responseCode + " - " + sb;

        JsonObject jsonObject = JsonParser.parseString(sb.toString()).getAsJsonObject();
        JsonArray candidates = jsonObject.getAsJsonArray("candidates");
        JsonObject content   = candidates.get(0).getAsJsonObject().getAsJsonObject("content");
        JsonArray parts      = content.getAsJsonArray("parts");
        return parts.get(0).getAsJsonObject().get("text").getAsString();
    }
}