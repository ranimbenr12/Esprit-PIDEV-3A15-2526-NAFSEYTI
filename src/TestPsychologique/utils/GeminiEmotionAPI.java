package TestPsychologique.utils;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.*;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.util.Arrays;
import java.util.List;

/**
 * Analyse emotionnelle avec Google Gemini API
 * Inclut detection de crise suicidaire et affichage des numeros d'urgence
 */
public class GeminiEmotionAPI {

    private static final String API_KEY = "AIzaSyCzdH5H_vC6MVUwSF7jrQXb7Sopdd32GhA";
    private static final String API_URL =
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" + API_KEY;

    // ═══════════════════════════════════════════════════
    // MOTS-CLES DE CRISE - Detection locale AVANT Gemini
    // ═══════════════════════════════════════════════════
    private static final List<String> MOTS_CRISE = Arrays.asList(
            "suicide", "suicider", "me suicider", "tuer", "me tuer", "mourir",
            "envie de mourir", "veux mourir", "plus vivre", "en finir",
            "mettre fin", "fin a ma vie", "fin a mes jours", "plus envie de vivre",
            "me faire du mal", "me blesser", "disparaitre", "disparaître",
            "tout arreter", "tout arrêter", "je vais mourir", "je veux mourir",
            "je ne veux plus vivre", "je pense a la mort", "pensees suicidaires",
            "idees noires", "idées noires", "j en peux plus", "j'en peux plus",
            "insupportable", "sans issue", "plus d'espoir", "plus despoir",
            "me pendre", "sauter", "avaler des medicaments", "overdose"
    );

    // Resultat contenant l'analyse ET le flag de crise
    public static class ResultatAnalyse {
        public final String analyse;
        public final boolean estCrise;

        public ResultatAnalyse(String analyse, boolean estCrise) {
            this.analyse = analyse;
            this.estCrise = estCrise;
        }
    }

    // ═══════════════════════════════════════════════════
    // METHODE PRINCIPALE
    // ═══════════════════════════════════════════════════
    public static ResultatAnalyse analyserAvecDetection(String texte) {
        if (texte == null || texte.trim().isEmpty()) {
            return new ResultatAnalyse("Texte vide, impossible d'analyser.", false);
        }

        // 1. Detection locale de crise (instantanee, sans API)
        boolean criseDetectee = detecterCrise(texte);

        // 2. Appel Gemini avec prompt adapte
        String analyse = appelGemini(texte, criseDetectee);

        return new ResultatAnalyse(analyse, criseDetectee);
    }

    // ═══════════════════════════════════════════════════
    // DETECTION LOCALE DE MOTS-CLES DE CRISE
    // ═══════════════════════════════════════════════════
    private static boolean detecterCrise(String texte) {
        String texteLower = texte.toLowerCase()
                .replace("é", "e").replace("è", "e").replace("ê", "e")
                .replace("à", "a").replace("â", "a")
                .replace("î", "i").replace("ô", "o").replace("û", "u")
                .replace("'", " ").replace("'", " ");

        for (String mot : MOTS_CRISE) {
            if (texteLower.contains(mot)) {
                System.out.println("ALERTE CRISE detectee: mot-cle = " + mot);
                return true;
            }
        }
        return false;
    }

    // ═══════════════════════════════════════════════════
    // APPEL GEMINI AVEC PROMPT ADAPTE
    // ═══════════════════════════════════════════════════
    private static String appelGemini(String texte, boolean estCrise) {
        try {
            System.out.println("Appel Gemini API...");

            String prompt;

            if (estCrise) {
                // Prompt de crise - Gemini analyse en mode urgence
                prompt = "Tu es un psychologue clinicien specialise en prevention du suicide. "
                        + "Le texte suivant a ete ecrit par un etudiant dans son journal. "
                        + "Il contient des elements preoccupants. Reponds en francais uniquement avec bienveillance.\n\n"
                        + "Texte : \"" + texte + "\"\n\n"
                        + "Reponds avec exactement ce format :\n"
                        + "NIVEAU URGENCE : [CRITIQUE]\n"
                        + "EMOTION DOMINANTE : [emotion principale detectee]\n"
                        + "ANALYSE : [2-3 phrases d'analyse clinique bienveillante, reconnaissant la souffrance]\n"
                        + "MESSAGE : [Un message chaleureux et direct pour cette personne en crise, lui disant qu'elle n'est pas seule]\n"
                        + "CONSEIL : [Action immediate et concrete a faire maintenant]\n";
            } else {
                // Prompt normal
                prompt = "Tu es un psychologue expert. Analyse le texte suivant ecrit par un etudiant "
                        + "dans son journal psychologique. Reponds en francais uniquement.\n\n"
                        + "Texte : \"" + texte + "\"\n\n"
                        + "Donne une analyse structuree avec exactement ce format :\n"
                        + "NIVEAU URGENCE : [NORMAL]\n"
                        + "EMOTION DOMINANTE : [une emotion principale]\n"
                        + "INTENSITE : [Faible / Moderee / Elevee]\n"
                        + "SENTIMENT : [Positif / Negatif / Neutre / Mixte]\n"
                        + "ANALYSE : [2-3 phrases d'analyse psychologique]\n"
                        + "CONSEIL : [1 conseil pratique bienveillant pour l'etudiant]\n";
            }

            // Construire le JSON
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

            // Connexion HTTP
            URL url = new URL(API_URL);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("POST");
            conn.setDoOutput(true);
            conn.setRequestProperty("Content-Type", "application/json");
            conn.setConnectTimeout(10000);
            conn.setReadTimeout(15000);

            try (OutputStream os = conn.getOutputStream()) {
                os.write(requestBody.toString().getBytes(StandardCharsets.UTF_8));
            }

            int responseCode = conn.getResponseCode();
            InputStream inputStream = (responseCode == 200)
                    ? conn.getInputStream()
                    : conn.getErrorStream();

            BufferedReader reader = new BufferedReader(
                    new InputStreamReader(inputStream, StandardCharsets.UTF_8));
            StringBuilder response = new StringBuilder();
            String line;
            while ((line = reader.readLine()) != null) {
                response.append(line);
            }
            reader.close();

            if (responseCode != 200) {
                System.err.println("Erreur Gemini HTTP " + responseCode + ": " + response);
                // Fallback selon le type
                if (estCrise) {
                    return "NIVEAU URGENCE : CRITIQUE\n"
                            + "EMOTION DOMINANTE : Detresse\n"
                            + "ANALYSE : Analyse indisponible momentanement.\n"
                            + "MESSAGE : Vous n'etes pas seul(e). De l'aide est disponible maintenant.\n"
                            + "CONSEIL : Appelez immediatement le numero d'urgence.";
                } else {
                    return "NIVEAU URGENCE : NORMAL\n"
                            + "EMOTION DOMINANTE : Indeterminee\n"
                            + "INTENSITE : Indeterminee\n"
                            + "SENTIMENT : Indetermine\n"
                            + "ANALYSE : Impossible de contacter Gemini. Verifiez votre connexion.\n"
                            + "CONSEIL : Reessayez dans quelques instants.";
                }
            }

            // Parser la reponse
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
            if (estCrise) {
                return "NIVEAU URGENCE : CRITIQUE\n"
                        + "EMOTION DOMINANTE : Detresse\n"
                        + "ANALYSE : Une detresse importante a ete detectee dans votre ecriture.\n"
                        + "MESSAGE : Vous n'etes pas seul(e). Des personnes sont la pour vous.\n"
                        + "CONSEIL : Contactez immediatement une ligne d'ecoute.";
            }
            return "NIVEAU URGENCE : NORMAL\n"
                    + "EMOTION DOMINANTE : Indeterminee\n"
                    + "INTENSITE : Indeterminee\n"
                    + "SENTIMENT : Indetermine\n"
                    + "ANALYSE : Erreur de connexion.\n"
                    + "CONSEIL : Verifiez votre connexion internet.";
        }
    }

    // Methode de compatibilite (gardee pour eviter les erreurs)
    public static String analyserEmotion(String texte) {
        return analyserAvecDetection(texte).analyse;
    }
}