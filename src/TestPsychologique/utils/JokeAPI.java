package TestPsychologique.utils;

import org.json.JSONObject;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class JokeAPI {

    public static String getJoke() {
        try {
            System.out.println("🔄 Appel à l'API Joke...");

            // 1. URL de l'API
            String urlString = "https://official-joke-api.appspot.com/random_joke";
            URL url = new URL(urlString);

            // 2. Connexion
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            conn.setConnectTimeout(5000);
            conn.setReadTimeout(5000);

            // 3. Lire la réponse
            BufferedReader reader = new BufferedReader(
                    new InputStreamReader(conn.getInputStream())
            );

            StringBuilder response = new StringBuilder();
            String line;
            while ((line = reader.readLine()) != null) {
                response.append(line);
            }
            reader.close();

            // 4. Parser JSON
            JSONObject json = new JSONObject(response.toString());
            String setup = json.getString("setup");
            String punchline = json.getString("punchline");

            System.out.println("✅ Blague reçue!");

            // 5. Retourner la blague
            return "😄 " + setup + "\n\n😂 " + punchline;

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();
            return "Oops! Impossible de récupérer une blague.";
        }
    }

    // Test
    public static void main(String[] args) {
        System.out.println("TEST API:");
        System.out.println(getJoke());
    }
}