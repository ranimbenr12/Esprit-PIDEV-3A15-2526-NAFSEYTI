package tn.esprit.services;

import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.time.Duration;
import java.util.concurrent.CompletableFuture;

import org.json.JSONArray;
import org.json.JSONObject;

public class CopilotService {

    private static final String API_URL = "https://openrouter.ai/api/v1/chat/completions";
    // Remplacez par VOTRE clé OpenRouter (celle que vous avez copiée)
    private static final String API_KEY = "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";

    // ✅ MODÈLE QUI FONCTIONNE ACTUELLEMENT (février 2026)
    private static final String MODEL = "arcee-ai/trinity-large-preview:free";

    // Autres modèles disponibles si celui-ci ne fonctionne pas :
    // private static final String MODEL = "deepseek/deepseek-r1-distill-llama-70b:free";
    // private static final String MODEL = "meta-llama/llama-3.3-70b-instruct:free";
    // private static final String MODEL = "google/gemini-2.0-flash-exp:free";
    // private static final String MODEL = "qwen/qwen-2.5-72b-instruct:free";

    private static final int TIMEOUT_SECONDS = 30;

    private final HttpClient httpClient;

    public CopilotService() {
        this.httpClient = HttpClient.newBuilder()
                .connectTimeout(Duration.ofSeconds(TIMEOUT_SECONDS))
                .build();
    }

    /**
     * Génère un résumé du texte fourni
     * @param texte Le texte à résumer
     * @return Le résumé généré
     */
    public String generateSummary(String texte) {
        String prompt = "En tant qu'assistant spécialisé dans la synthèse, résume le texte suivant de manière claire, concise et en français. " +
                "Le résumé doit capturer les points principaux et ne pas dépasser 150 mots.\n\n" +
                "Texte à résumer :\n" + texte;

        return callOpenRouterAPI(prompt);
    }

    /**
     * Génère un titre suggestif à partir du contenu
     */
    public String generateTitle(String contenu) {
        String prompt = "À partir du texte suivant, génère un titre accrocheur et pertinent en français (maximum 10 mots) :\n\n" + contenu;
        return callOpenRouterAPI(prompt);
    }

    /**
     * Génère une réponse personnalisée avec un prompt spécifique
     */
    public String generateCustomPrompt(String prompt) {
        return callOpenRouterAPI(prompt);
    }

    /**
     * Analyse le sentiment du texte (positif/négatif/neutre)
     */
    public String analyzeSentiment(String texte) {
        String prompt = "Analyse le sentiment du texte suivant. Réponds uniquement par POSITIF, NÉGATIF ou NEUTRE, suivi d'une brève explication en français :\n\n" + texte;
        return callOpenRouterAPI(prompt);
    }

    /**
     * Appelle l'API OpenRouter avec le prompt fourni
     */
    private String callOpenRouterAPI(String prompt) {
        try {
            // Création du corps de la requête JSON
            JSONObject requestBody = new JSONObject();
            requestBody.put("model", MODEL);
            requestBody.put("messages", new JSONArray()
                    .put(new JSONObject()
                            .put("role", "system")
                            .put("content", "Vous êtes un assistant utile qui répond en français de manière concise et professionnelle."))
                    .put(new JSONObject()
                            .put("role", "user")
                            .put("content", prompt))
            );
            requestBody.put("temperature", 0.7);
            requestBody.put("max_tokens", 500);
            requestBody.put("top_p", 0.9);

            // Construction de la requête HTTP
            HttpRequest request = HttpRequest.newBuilder()
                    .uri(URI.create(API_URL))
                    .header("Content-Type", "application/json")
                    .header("Authorization", "Bearer " + API_KEY)
                    // En-têtes recommandés par OpenRouter (optionnels mais utiles)
                    .header("HTTP-Referer", "http://localhost:8080")
                    .header("X-Title", "Application Forum ESPRIT")
                    .timeout(Duration.ofSeconds(TIMEOUT_SECONDS))
                    .POST(HttpRequest.BodyPublishers.ofString(requestBody.toString()))
                    .build();

            // Envoi de la requête
            HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());

            // Vérification du code de statut
            if (response.statusCode() == 200) {
                return parseResponse(response.body());
            } else {
                return handleErrorResponse(response.statusCode(), response.body());
            }

        } catch (Exception e) {
            e.printStackTrace();
            return "Erreur lors de l'appel à OpenRouter : " + e.getMessage();
        }
    }

    /**
     * Parse la réponse JSON
     */
    private String parseResponse(String responseBody) {
        try {
            JSONObject jsonResponse = new JSONObject(responseBody);

            // Vérifier s'il y a une erreur
            if (jsonResponse.has("error")) {
                JSONObject error = jsonResponse.getJSONObject("error");
                return "Erreur OpenRouter : " + error.getString("message");
            }

            // Vérifier si la réponse a la structure attendue
            if (!jsonResponse.has("choices") || jsonResponse.getJSONArray("choices").isEmpty()) {
                return "Réponse inattendue de l'API";
            }

            // Extraire le message
            JSONArray choices = jsonResponse.getJSONArray("choices");
            JSONObject firstChoice = choices.getJSONObject(0);
            JSONObject message = firstChoice.getJSONObject("message");
            return message.getString("content").trim();

        } catch (Exception e) {
            e.printStackTrace();
            return "Erreur lors du parsing de la réponse : " + e.getMessage() + "\nRéponse brute : " + responseBody;
        }
    }

    /**
     * Gère les erreurs de l'API
     */
    private String handleErrorResponse(int statusCode, String responseBody) {
        try {
            // Essayer de parser l'erreur JSON
            JSONObject errorJson = new JSONObject(responseBody);
            if (errorJson.has("error")) {
                JSONObject error = errorJson.getJSONObject("error");
                String errorMessage = error.optString("message", "Erreur inconnue");
                return String.format("Erreur OpenRouter (code %d) : %s", statusCode, errorMessage);
            }
            return String.format("Erreur API (code %d) : %s", statusCode, responseBody);
        } catch (Exception e) {
            // Si ce n'est pas du JSON valide
            return String.format("Erreur API (code %d) : %s", statusCode, responseBody);
        }
    }

    /**
     * Version asynchrone avec callback
     */
    public void generateSummaryAsync(String texte, SummaryCallback callback) {
        new Thread(() -> {
            try {
                String result = generateSummary(texte);
                callback.onSuccess(result);
            } catch (Exception e) {
                callback.onError(e);
            }
        }).start();
    }

    /**
     * Version asynchrone avec CompletableFuture
     */
    public CompletableFuture<String> generateSummaryAsync(String texte) {
        return CompletableFuture.supplyAsync(() -> generateSummary(texte));
    }

    /**
     * Interface pour le callback asynchrone
     */
    public interface SummaryCallback {
        void onSuccess(String summary);
        void onError(Exception e);
    }

    /**
     * Méthode utilitaire pour tester la connexion
     */
    public static void main(String[] args) {
        CopilotService service = new CopilotService();
        String test = "Java est un langage de programmation orienté objet créé par Sun Microsystems en 1995. " +
                "Il est conçu pour avoir le moins de dépendances d'implémentation possible. " +
                "Les applications Java sont généralement compilées en bytecode qui peut s'exécuter sur toute machine virtuelle Java (JVM) indépendamment de l'architecture matérielle.";

        String resume = service.generateSummary(test);
        System.out.println("Résumé: " + resume);
    }
}