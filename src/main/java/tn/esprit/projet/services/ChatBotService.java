package tn.esprit.projet.services;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Timestamp;
import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import java.util.Properties;
import java.util.concurrent.TimeUnit;

import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

import org.json.JSONArray;
import org.json.JSONObject;

import tn.esprit.projet.models.ChatBotConfig;
import tn.esprit.projet.models.ChatBotMessage;
import tn.esprit.projet.utils.MyBDConnexion;

public class ChatBotService {

    private static String API_KEY;
    private static final String API_URL = "https://openrouter.ai/api/v1/chat/completions";

    // ✅ Modèles gratuits disponibles sur OpenRouter (FÉVRIER 2026)
    private static final String[] FREE_MODELS = {
            "google/gemma-3-27b-it:free",              // ⭐ RECOMMANDÉ - Stable
            "meta-llama/llama-3.3-70b-instruct:free",  // Très bon pour dialogue
            "mistralai/mistral-small-3.1-24b-instruct:free", // Rapide
            "nvidia/llama-3.1-nemotron-nano-8b-v1:free",      // Léger
            "arcee-ai/trinity-large-preview:free"       // Bon pour création
    };

    private Connection cnx;
    private final OkHttpClient client;

    public ChatBotService() {
        try {
            // Configuration du client HTTP avec timeouts
            this.client = new OkHttpClient.Builder()
                    .connectTimeout(30, TimeUnit.SECONDS)
                    .writeTimeout(30, TimeUnit.SECONDS)
                    .readTimeout(60, TimeUnit.SECONDS)
                    .build();

            loadApiKey();
            this.cnx = MyBDConnexion.getInstance().getCnx();

            if (this.cnx == null) {
                System.err.println("❌ ERREUR : Connexion BDD null");
            } else {
                System.out.println("✅ ChatBotService : Connexion BDD OK");
                System.out.println("🔑 Clé API chargée: " + (API_KEY != null ? "✓" : "✗"));
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur init ChatBotService : " + e.getMessage());
            e.printStackTrace();
            throw new RuntimeException("Impossible d'initialiser ChatBotService", e);
        }
    }

    private void loadApiKey() {
        try (InputStream input = getClass().getClassLoader().getResourceAsStream("config.properties")) {
            if (input == null) {
                System.err.println("❌ Fichier config.properties non trouvé dans resources!");
                return;
            }

            Properties prop = new Properties();
            prop.load(input);
            API_KEY = prop.getProperty("openrouter.api.key");

            if (API_KEY == null || API_KEY.isEmpty()) {
                System.err.println("❌ Clé API non trouvée dans config.properties");
            } else {
                System.out.println("✅ Clé API chargée avec succès");
            }

        } catch (IOException e) {
            System.err.println("❌ Erreur chargement config: " + e.getMessage());
            e.printStackTrace();
        }
    }

    public List<ChatBotMessage> getHistorique(int idUtilisateur) {
        List<ChatBotMessage> messages = new ArrayList<>();

        if (cnx == null) {
            System.err.println("❌ Connexion BDD non initialisée");
            return messages;
        }

        String req = "SELECT * FROM chatbot_messages WHERE id_utilisateur = ? ORDER BY date_envoi ASC";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);

            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    ChatBotMessage msg = new ChatBotMessage();
                    msg.setid_message(rs.getInt("id_message"));
                    msg.setid_utilisateur(rs.getInt("id_utilisateur"));
                    msg.setmessage_utilisateur(rs.getString("message_utilisateur"));
                    msg.setreponse_chatbot(rs.getString("reponse_chatbot"));
                    msg.setdate_envoi(rs.getTimestamp("date_envoi"));
                    messages.add(msg);
                }
            }

            System.out.println("✅ Historique chargé : " + messages.size() + " messages pour l'utilisateur " + idUtilisateur);

        } catch (SQLException e) {
            System.err.println("❌ Erreur SQL dans getHistorique: " + e.getMessage());
        }

        return messages;
    }

    public String envoyerMessageIA(int idUtilisateur, String messageUtilisateur) {
        if (API_KEY == null || API_KEY.isEmpty()) {
            return "❌ Erreur de configuration : clé API manquante";
        }

        List<String> modelesEssayes = new ArrayList<>();

        // Essayer chaque modèle jusqu'à succès
        for (String modele : FREE_MODELS) {
            modelesEssayes.add(modele);
            System.out.println("📤 Essai du modèle: " + modele);

            String reponse = envoyerMessageAvecModele(idUtilisateur, messageUtilisateur, modele);

            if (reponse != null) {
                System.out.println("✅ Modèle fonctionnel: " + modele);
                return reponse;
            }
        }

        System.err.println("❌ Aucun modèle n'a fonctionné parmi: " + modelesEssayes);
        return "Je suis désolé, je rencontre des difficultés techniques. Veuillez réessayer dans quelques instants. 🙏";
    }

    private String envoyerMessageAvecModele(int idUtilisateur, String messageUtilisateur, String modele) {
        try {
            // Récupérer l'historique et la config
            List<ChatBotMessage> historique = getHistorique(idUtilisateur);
            ChatBotConfig config = getConfig(idUtilisateur);

            // Construction du prompt système
            StringBuilder systemPrompt = new StringBuilder();
            systemPrompt.append("Tu es NafseytiBot, un assistant psychologique bienveillant. ");
            systemPrompt.append("Tu aides les étudiants avec des conseils de bien-être mental. ");
            systemPrompt.append("Reste empathique, professionnel et réponds en français. ");

            if (config != null && config.getsuggestion_personnalisee() != null &&
                    !config.getsuggestion_personnalisee().trim().isEmpty()) {
                systemPrompt.append("\n\n📌 INSTRUCTIONS DU PSYCHOLOGUE :\n");
                systemPrompt.append(config.getsuggestion_personnalisee());
            }

            // Construction des messages
            JSONArray messages = new JSONArray();
            messages.put(new JSONObject().put("role", "system").put("content", systemPrompt.toString()));

            int start = Math.max(0, historique.size() - 10);
            for (int i = start; i < historique.size(); i++) {
                ChatBotMessage h = historique.get(i);
                messages.put(new JSONObject().put("role", "user").put("content", h.getmessage_utilisateur()));
                messages.put(new JSONObject().put("role", "assistant").put("content", h.getreponse_chatbot()));
            }

            messages.put(new JSONObject().put("role", "user").put("content", messageUtilisateur));

            // Corps de la requête
            JSONObject requestBody = new JSONObject()
                    .put("model", modele)
                    .put("messages", messages)
                    .put("max_tokens", 500)
                    .put("temperature", 0.7);

            RequestBody body = RequestBody.create(
                    requestBody.toString(),
                    MediaType.parse("application/json")
            );

            Request request = new Request.Builder()
                    .url(API_URL)
                    .header("Authorization", "Bearer " + API_KEY)
                    .header("Content-Type", "application/json")
                    .header("HTTP-Referer", "https://nafseyti.tn")
                    .header("X-Title", "NAFSEYTI ChatBot")
                    .post(body)
                    .build();

            // Exécution de la requête
            try (Response response = client.newCall(request).execute()) {
                if (!response.isSuccessful()) {
                    String errorBody = response.body() != null ? response.body().string() : "";

                    // Ignorer silencieusement les erreurs 429 (rate limiting)
                    if (response.code() == 429) {
                        return null;
                    }

                    // Ignorer les erreurs 404 (modèle non trouvé)
                    if (response.code() == 404) {
                        return null;
                    }

                    System.err.println("❌ Erreur API " + response.code() + " pour " + modele + ": " + errorBody);
                    return null;
                }

                String responseBody = response.body().string();
                JSONObject jsonResponse = new JSONObject(responseBody);

                if (!jsonResponse.has("choices") || jsonResponse.getJSONArray("choices").length() == 0) {
                    return null;
                }

                String reponseIA = jsonResponse
                        .getJSONArray("choices")
                        .getJSONObject(0)
                        .getJSONObject("message")
                        .getString("content")
                        .trim();

                // Sauvegarder le message dans la base de données
                ChatBotMessage nouveauMessage = new ChatBotMessage(
                        idUtilisateur,
                        messageUtilisateur,
                        reponseIA
                );

                try {
                    sauvegarderMessage(nouveauMessage);
                } catch (Exception e) {
                    System.err.println("⚠️ Message non sauvegardé (base de données): " + e.getMessage());
                }

                return reponseIA;
            }

        } catch (IOException e) {
            // Ignorer silencieusement les timeouts
            if (e.getMessage() != null && e.getMessage().contains("timeout")) {
                return null;
            }
            System.err.println("❌ Erreur réseau pour " + modele + ": " + e.getMessage());
            return null;
        } catch (Exception e) {
            System.err.println("❌ Erreur inattendue pour " + modele + ": " + e.getMessage());
            return null;
        }
    }

    public void sauvegarderMessage(ChatBotMessage message) {
        if (cnx == null) {
            System.err.println("❌ Connexion BDD non initialisée - message non sauvegardé");
            return;
        }

        String req = "INSERT INTO chatbot_messages (id_utilisateur, message_utilisateur, reponse_chatbot, date_envoi) VALUES (?, ?, ?, ?)";

        try (PreparedStatement ps = cnx.prepareStatement(req, PreparedStatement.RETURN_GENERATED_KEYS)) {
            ps.setInt(1, message.getid_utilisateur());
            ps.setString(2, message.getmessage_utilisateur());
            ps.setString(3, message.getreponse_chatbot());
            ps.setTimestamp(4, new Timestamp(System.currentTimeMillis()));

            int affectedRows = ps.executeUpdate();

            if (affectedRows > 0) {
                // Récupérer l'ID généré automatiquement
                try (ResultSet generatedKeys = ps.getGeneratedKeys()) {
                    if (generatedKeys.next()) {
                        message.setid_message(generatedKeys.getInt(1));
                        System.out.println("✅ Message sauvegardé (ID: " + message.getid_message() + ")");
                    }
                }
            }

        } catch (SQLException e) {
            if (e.getMessage().contains("Field 'id_message' doesn't have a default value")) {
                System.err.println("⚠️ La table chatbot_messages doit être modifiée: id_message AUTO_INCREMENT");
                System.err.println("👉 Exécute: ALTER TABLE chatbot_messages MODIFY id_message INT AUTO_INCREMENT;");
            } else {
                System.err.println("❌ Erreur sauvegarde message: " + e.getMessage());
            }
        }
    }

    public ChatBotConfig getConfig(int idUtilisateur) {
        if (cnx == null) return null;

        String req = "SELECT * FROM chatbot_config WHERE id_utilisateur=? LIMIT 1";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);

            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    ChatBotConfig config = new ChatBotConfig();
                    config.setid_config(rs.getInt("id_config"));
                    config.setid_psychologue(rs.getInt("id_psychologue"));
                    config.setid_utilisateur(rs.getInt("id_utilisateur"));
                    config.setsuggestion_personnalisee(rs.getString("suggestion_personnalisee"));
                    config.setfrequence_rappel(rs.getString("frequence_rappel"));
                    return config;
                }
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getConfig pour utilisateur " + idUtilisateur + ": " + e.getMessage());
        }

        return null;
    }

    public void reinitialiserHistorique(int idUtilisateur) {
        if (cnx == null) return;

        String req = "DELETE FROM chatbot_messages WHERE id_utilisateur=?";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);
            int deleted = ps.executeUpdate();
            System.out.println("✅ Historique réinitialisé: " + deleted + " messages supprimés pour l'utilisateur " + idUtilisateur);
        } catch (SQLException e) {
            System.err.println("❌ Erreur réinitialisation historique: " + e.getMessage());
        }
    }

    public String[] getSuggestionsRapides() {
        return new String[] {
                "🧠 Comment gérer le stress des examens ?",
                "😴 J'ai du mal à dormir, des conseils ?",
                "🎯 Je n'arrive pas à me concentrer",
                "😟 Je me sens anxieux(se)",
                "🧘 Exercices de respiration rapides"
        };
    }
}