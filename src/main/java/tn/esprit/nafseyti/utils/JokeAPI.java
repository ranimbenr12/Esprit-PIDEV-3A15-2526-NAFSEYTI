package tn.esprit.nafseyti.utils;

import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class JokeAPI {

    public static String getJoke() {
        try {
            System.out.println("🔄 Appel à l'API Joke...");

            // 1. URL avec langue française + type two-part (setup/punchline)
            String urlString = "https://v2.jokeapi.dev/joke/Any?lang=fr&type=twopart";
            URL url = new URL(urlString);

            // 2. Connexion
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            conn.setRequestProperty("Accept", "application/json");
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

            // Vérifier s'il y a une erreur retournée par l'API
            if (json.getBoolean("error")) {
                return "⚠️ Aucune blague trouvée en français pour le moment.";
            }

            String setup = json.getString("setup");
            String delivery = json.getString("delivery"); // "delivery" et non "punchline" sur cette API

            System.out.println("✅ Blague reçue !");

            // 5. Retourner la blague
            return "😄 " + setup + "\n\n😂 " + delivery;

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