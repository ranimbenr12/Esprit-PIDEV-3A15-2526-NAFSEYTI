// ===============================================
// 🚨 SYSTÈME DE DÉTECTION D'URGENCE
// Détection de contenu suicidaire/auto-destruction
// ===============================================

package TestPsychologique.utils;

import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;
import okhttp3.*;

import java.io.IOException;
import java.util.Arrays;
import java.util.List;
import java.util.concurrent.TimeUnit;

public class GeminiEmotionAPI {

    private static final String API_KEY = "AIzaSyBrQ1MXE9NVrnpDji8EzPOoXyHUok1uGwc";
    private static final String API_URL = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" + API_KEY;

    private static final OkHttpClient client = new OkHttpClient.Builder()
            .connectTimeout(30, TimeUnit.SECONDS)
            .readTimeout(30, TimeUnit.SECONDS)
            .build();

    // ===============================================
    // 🚨 MOTS-CLÉS D'URGENCE
    // ===============================================
    private static final List<String> EMERGENCY_KEYWORDS = Arrays.asList(
            // Suicide direct
            "suicide", "suicider", "me suicider", "tuer", "me tuer",
            "en finir", "finir ma vie", "mettre fin", "vie ne vaut",
            "plus envie de vivre", "envie de mourir", "mourir",

            // Auto-mutilation
            "me couper", "me faire mal", "automutilation", "scarification",
            "lame", "couteau", "saigner",

            // Désespoir extrême
            "rien ne sert", "plus d'espoir", "plus de raison", "abandonner tout",
            "tout perdre", "je ne peux plus", "trop dur", "insupportable",

            // Moyens
            "pilules", "surdose", "overdose", "pont", "sauter",
            "corde", "pendre", "voiture", "gaz"
    );

    /**
     * 🚨 VÉRIFICATION D'URGENCE (avant l'analyse IA)
     */
    public static boolean containsEmergencyContent(String text) {
        if (text == null || text.trim().isEmpty()) {
            return false;
        }

        String lowerText = text.toLowerCase();

        for (String keyword : EMERGENCY_KEYWORDS) {
            if (lowerText.contains(keyword)) {
                System.out.println("🚨 ALERTE URGENCE: Mot-clé détecté: " + keyword);
                return true;
            }
        }

        return false;
    }

    /**
     * Analyser le texte du journal
     */
    public static String analyzeJournalEntry(String journalText) {

        // ===============================================
        // 🚨 ÉTAPE 1: VÉRIFICATION D'URGENCE
        // ===============================================
        if (containsEmergencyContent(journalText)) {
            return generateEmergencyResponse();
        }

        // ===============================================
        // ÉTAPE 2: Analyse normale avec Gemini
        // ===============================================
        try {
            String prompt = createPromptWithSafety(journalText);
            String response = callGeminiAPI(prompt);

            // Double vérification dans la réponse
            if (response.toLowerCase().contains("urgence") ||
                    response.toLowerCase().contains("professionnel") ||
                    response.toLowerCase().contains("aide immédiate")) {
                return generateEmergencyResponse();
            }

            return response;

        } catch (Exception e) {
            System.err.println("❌ Erreur Gemini: " + e.getMessage());
            e.printStackTrace();
            return "Erreur lors de l'analyse. Votre entrée a été sauvegardée.";
        }
    }

    /**
     * 🚨 GÉNÉRER UNE RÉPONSE D'URGENCE
     */
    private static String generateEmergencyResponse() {
        return """
                🚨 AIDE IMMÉDIATE DISPONIBLE
                ═══════════════════════════════════════
                
                Vos pensées indiquent une grande souffrance. 
                Vous n'êtes pas seul(e) et de l'aide est disponible MAINTENANT.
                
                📞 NUMÉROS D'URGENCE (24h/24):
                
                🇹🇳 TUNISIE:
                • Centre d'Écoute Psychologique: 23 288 588
                • SAMU: 190
                • Urgences: 197
                
                🇫🇷 FRANCE:
                • Prévention Suicide: 3114 (gratuit)
                • SOS Amitié: 09 72 39 40 50
                • Urgences: 112
                
                🌍 INTERNATIONAL:
                • Liste complète: www.befrienders.org
                
                ⚠️ ACTIONS IMMÉDIATES:
                1. Appelez un de ces numéros MAINTENANT
                2. Contactez un proche de confiance
                3. Allez aux urgences si danger imminent
                4. N'hésitez PAS - votre vie a de la valeur
                
                💚 VOUS MÉRITEZ DE L'AIDE
                La souffrance est temporaire. L'aide est réelle.
                Des professionnels formés vous attendent.
                
                ═══════════════════════════════════════
                """;
    }

    /**
     * Créer un prompt avec instructions de sécurité
     */
    private static String createPromptWithSafety(String journalText) {
        return String.format("""
            🚨 INSTRUCTIONS CRITIQUES DE SÉCURITÉ:
            
            AVANT TOUTE ANALYSE, vérifiez SI le texte contient:
            - Pensées suicidaires (suicide, se tuer, en finir, mourir)
            - Auto-mutilation (se couper, se faire mal, lame)
            - Désespoir extrême (plus d'espoir, abandonner tout)
            
            SI DÉTECTÉ → Répondez UNIQUEMENT:
            "🚨 URGENCE DÉTECTÉE. Ce contenu nécessite une aide professionnelle immédiate. 
            Contactez le 23 288 588 (Tunisie) ou le 3114 (France) maintenant."
            
            NE DONNEZ PAS de conseils généraux pour ce type de contenu.
            
            ───────────────────────────────────────
            
            SI AUCUN CONTENU D'URGENCE:
            Analysez cette entrée de journal émotionnel et fournissez:
            
            1. 📊 ANALYSE ÉMOTIONNELLE (2-3 phrases)
               - Émotions principales détectées
               - Ton général (positif/négatif/mixte)
            
            2. 💡 OBSERVATIONS (2-3 points)
               - Patterns comportementaux
               - Points positifs relevés
            
            3. 🌱 SUGGESTIONS BIENVEILLANTES (2-3 conseils)
               - Actions concrètes et réalistes
               - Encouragements personnalisés
            
            Ton: Empathique, bienveillant, non-jugeant
            Format: Clair avec emojis
            Longueur: Maximum 200 mots
            
            ───────────────────────────────────────
            TEXTE DU JOURNAL:
            %s
            """, journalText);
    }

    /**
     * Appeler l'API Gemini
     */
    private static String callGeminiAPI(String prompt) throws IOException {

        // Construire le JSON de requête
        JsonObject content = new JsonObject();
        JsonArray parts = new JsonArray();
        JsonObject part = new JsonObject();
        part.addProperty("text", prompt);
        parts.add(part);

        JsonObject contentObj = new JsonObject();
        contentObj.add("parts", parts);

        JsonArray contents = new JsonArray();
        contents.add(contentObj);

        JsonObject requestBody = new JsonObject();
        requestBody.add("contents", contents);

        // Ajouter les paramètres de sécurité
        JsonArray safetySettings = new JsonArray();

        String[] categories = {
                "HARM_CATEGORY_HARASSMENT",
                "HARM_CATEGORY_HATE_SPEECH",
                "HARM_CATEGORY_SEXUALLY_EXPLICIT",
                "HARM_CATEGORY_DANGEROUS_CONTENT"
        };

        for (String category : categories) {
            JsonObject setting = new JsonObject();
            setting.addProperty("category", category);
            setting.addProperty("threshold", "BLOCK_NONE"); // Ne pas bloquer pour détecter
            safetySettings.add(setting);
        }

        requestBody.add("safetySettings", safetySettings);

        // Créer la requête
        RequestBody body = RequestBody.create(
                requestBody.toString(),
                MediaType.parse("application/json")
        );

        Request request = new Request.Builder()
                .url(API_URL)
                .post(body)
                .build();

        // Exécuter
        try (Response response = client.newCall(request).execute()) {
            if (!response.isSuccessful()) {
                throw new IOException("Erreur API: " + response.code());
            }

            String responseBody = response.body().string();
            JsonObject jsonResponse = JsonParser.parseString(responseBody).getAsJsonObject();

            // Extraire le texte
            return jsonResponse
                    .getAsJsonArray("candidates")
                    .get(0).getAsJsonObject()
                    .getAsJsonObject("content")
                    .getAsJsonArray("parts")
                    .get(0).getAsJsonObject()
                    .get("text").getAsString();
        }
    }

    /**
     * 🧪 TEST
     */
    public static void main(String[] args) {
        System.out.println("🧪 TEST 1: Contenu normal");
        System.out.println(analyzeJournalEntry("Aujourd'hui était une bonne journée."));

        System.out.println("\n🧪 TEST 2: Contenu d'urgence");
        System.out.println(analyzeJournalEntry("Je veux me suicider"));

        System.out.println("\n🧪 TEST 3: Autre contenu d'urgence");
        System.out.println(analyzeJournalEntry("Je n'ai plus envie de vivre"));
    }
}