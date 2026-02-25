package TestPsychologique.utils;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.*;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;

/**
 * Analyse emotionnelle avec Google Gemini API
 */
public class GeminiEmotionAPI {

    private static final String API_KEY = "AIzaSyDfTV7XP6ZmtMsLHWpygXnpWMlq_gGe1Y4";
    private static final String API_URL =
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" + API_KEY;

    public static String analyserEmotion(String texte) {
        if (texte == null || texte.trim().isEmpty()) {
            return "Texte vide, impossible d'analyser.";
        }

        try {
            System.out.println("Appel Gemini API...");

            // 1. Construire le prompt
            String prompt = "Tu es un psychologue expert. Analyse le texte suivant ecrit par un etudiant "
                    + "dans son journal psychologique. Reponds en francais uniquement.\n\n"
                    + "Texte : \"" + texte + "\"\n\n"
                    + "Donne une analyse structuree avec exactement ce format :\n"
                    + "EMOTION DOMINANTE : [une emotion principale]\n"
                    + "INTENSITE : [Faible / Moderee / Elevee]\n"
                    + "SENTIMENT : [Positif / Negatif / Neutre / Mixte]\n"
                    + "ANALYSE : [2-3 phrases d'analyse psychologique]\n"
                    + "CONSEIL : [1 conseil pratique bienveillant pour l'etudiant]\n";

            // 2. Construire le JSON de la requete
            JSONObject requestBody = new JSONObject();
            JSONArray contents = new JSONArray();
            JSONObject content = new JSONObject();
            JSONArray parts = new JSONArray();
            JSONObject part = new JSONObject();

            part.put("text", prompt);
            parts.put(part);
            content.put("parts", parts);
            contents.put(content);
            requestBody.put("contents", contents);

            // 3. Connexion HTTP
            URL url = new URL(API_URL);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("POST");
            conn.setDoOutput(true);
            conn.setRequestProperty("Content-Type", "application/json");
            conn.setConnectTimeout(10000);
            conn.setReadTimeout(10000);

            // 4. Envoyer la requete
            try (OutputStream os = conn.getOutputStream()) {
                os.write(requestBody.toString().getBytes(StandardCharsets.UTF_8));
            }

            // 5. Lire la reponse
            int responseCode = conn.getResponseCode();
            InputStream inputStream = (responseCode == 200)
                    ? conn.getInputStream()
                    : conn.getErrorStream();

            BufferedReader reader = new BufferedReader(new InputStreamReader(inputStream, StandardCharsets.UTF_8));
            StringBuilder response = new StringBuilder();
            String line;
            while ((line = reader.readLine()) != null) {
                response.append(line);
            }
            reader.close();

            if (responseCode != 200) {
                System.err.println("Erreur Gemini HTTP " + responseCode + ": " + response);
                return "Erreur API (" + responseCode + "). Veuillez reessayer.";
            }

            // 6. Parser la reponse JSON
            JSONObject json = new JSONObject(response.toString());
            String texteReponse = json
                    .getJSONArray("candidates")
                    .getJSONObject(0)
                    .getJSONObject("content")
                    .getJSONArray("parts")
                    .getJSONObject(0)
                    .getString("text");

            System.out.println("Analyse Gemini recue !");
            return texteReponse.trim();

        } catch (Exception e) {
            System.err.println("Erreur Gemini: " + e.getMessage());
            e.printStackTrace();
            return "EMOTION DOMINANTE : Indeterminee\n"
                    + "INTENSITE : Indeterminee\n"
                    + "SENTIMENT : Indetermine\n"
                    + "ANALYSE : Impossible de contacter Gemini. Verifiez votre connexion internet.\n"
                    + "CONSEIL : Reessayez dans quelques instants.";
        }
    }
}