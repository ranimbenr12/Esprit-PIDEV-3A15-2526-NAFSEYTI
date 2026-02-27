package tn.esprit.nafseyti.google;

import javafx.application.Platform;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.control.ProgressBar;
import javafx.scene.layout.VBox;
import javafx.scene.web.WebEngine;
import javafx.scene.web.WebView;
import javafx.stage.Modality;
import javafx.stage.Stage;

import java.util.concurrent.CountDownLatch;

public class GoogleAuthWebView {

    private volatile String authorizationCode = null;

    public String showAndWaitForCode(String authUrl, String redirectUri) {

        // Si on est déjà sur le thread JavaFX → appel direct
        // Sinon → Platform.runLater + attente via CountDownLatch
        CountDownLatch latch = new CountDownLatch(1);

        Runnable task = () -> {
            Stage authStage = new Stage();
            authStage.setTitle("🔐 Connexion Google Calendar — Nafseyti");
            authStage.initModality(Modality.APPLICATION_MODAL);
            authStage.setWidth(520);
            authStage.setHeight(620);

            WebView webView = new WebView();
            WebEngine engine = webView.getEngine();

            ProgressBar progressBar = new ProgressBar();
            progressBar.setMaxWidth(Double.MAX_VALUE);
            progressBar.progressProperty().bind(engine.getLoadWorker().progressProperty());
            progressBar.setStyle("-fx-accent: #285921;");

            Label statusLabel = new Label("Chargement de la page Google...");
            statusLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #888;");

            VBox root = new VBox(0, progressBar, webView, statusLabel);
            VBox.setVgrow(webView, javafx.scene.layout.Priority.ALWAYS);
            root.setPadding(new Insets(0));
            root.setAlignment(Pos.TOP_CENTER);

            engine.locationProperty().addListener((obs, oldUrl, newUrl) -> {
                if (newUrl == null) return;

                statusLabel.setText(newUrl.length() > 60
                        ? newUrl.substring(0, 60) + "..." : newUrl);

                if (newUrl.startsWith(redirectUri) || newUrl.contains("localhost:9999")) {
                    String code = extractCode(newUrl);
                    if (code != null) {
                        authorizationCode = code;
                        authStage.close();
                        latch.countDown(); // ✅ libérer le thread en attente
                    }
                }

                if (newUrl.contains("error=access_denied")) {
                    authStage.close();
                    latch.countDown();
                }
            });

            authStage.setOnCloseRequest(e -> latch.countDown()); // ✅ fermeture manuelle

            engine.load(authUrl);

            Scene scene = new Scene(root);
            authStage.setScene(scene);
            authStage.show();
        };

        if (Platform.isFxApplicationThread()) {
            // ⚠️ Déjà sur le thread JavaFX : appel direct, mais on ne peut pas bloquer !
            // Ce cas ne devrait pas arriver si appelé depuis un thread background
            task.run();
        } else {
            // ✅ Cas normal : on est sur un thread background
            Platform.runLater(task);
            try {
                latch.await(); // attend que la fenêtre se ferme
            } catch (InterruptedException e) {
                Thread.currentThread().interrupt();
            }
        }

        return authorizationCode;
    }

    private String extractCode(String url) {
        try {
            String[] parts = url.split("[?&]");
            for (String part : parts) {
                if (part.startsWith("code=")) {
                    return java.net.URLDecoder.decode(
                            part.substring(5), java.nio.charset.StandardCharsets.UTF_8);
                }
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
}