package tn.esprit.projet.services;

import org.springframework.stereotype.Service;
import tn.esprit.projet.models.DetectionCriseRequest;
import tn.esprit.projet.models.DetectionCriseResponse;
import tn.esprit.projet.services.ChatBotService;
import tn.esprit.projet.services.AlerteService;

import java.util.ArrayList;
import java.util.List;

@Service
public class DetectionCriseService {

    private final ChatBotService chatBotService;
    private final AlerteService alerteService;

    public DetectionCriseService(ChatBotService chatBotService, AlerteService alerteService) {
        this.chatBotService = chatBotService;
        this.alerteService = alerteService;
    }

    public DetectionCriseResponse detecterCrise(DetectionCriseRequest request) {
        String message = request.getMessage();

        // 1. Analyser avec OpenRouter
        String analyse = analyserAvecOpenRouter(message);

        // 2. Déterminer le niveau de risque
        String risque = determinerRisque(analyse, message);

        // 3. Déterminer la catégorie
        String categorie = determinerCategorie(analyse, message);

        // 4. Calculer la confiance
        double confiance = calculerConfiance(analyse, message);

        // 5. Générer les actions
        List<String> actions = genererActions(risque, categorie);

        // 6. Créer la réponse
        DetectionCriseResponse response = new DetectionCriseResponse(
                risque, categorie, confiance, actions
        );
        response.setAnalyseDetaillee(analyse);

        // 7. Déclencher l'alerte si nécessaire
        if (request.getPatientId() != null && ("élevé".equals(risque) || "critique".equals(risque))) {
            alerteService.enregistrerAlerte(request.getPatientId(), message);
            alerteService.notifierPsychologue(request.getPatientId(), message);
        }

        return response;
    }

    private String analyserAvecOpenRouter(String message) {
        String prompt = "Analyse ce message d'un patient en détresse psychologique: \"" + message + "\".\n\n" +
                "Identifie les éléments suivants:\n" +
                "- Niveau de risque (bas/moyen/élevé/critique)\n" +
                "- Catégorie (dépression, anxiété, idées suicidaires, solitude, etc.)\n" +
                "- Pourcentage de confiance (0-100%)\n" +
                "- 3 actions recommandées immédiates\n\n" +
                "Format de réponse:\n" +
                "RISQUE: [niveau]\n" +
                "CATÉGORIE: [catégorie]\n" +
                "CONFIANCE: [0-100]%\n" +
                "ACTIONS: [action1, action2, action3]\n" +
                "ANALYSE: [explication détaillée]";

        try {
            return chatBotService.envoyerMessageIA(0, prompt);
        } catch (Exception e) {
            e.printStackTrace();
            return "ERREUR: Impossible d'analyser";
        }
    }

    private String determinerRisque(String analyse, String message) {
        String msgLower = message.toLowerCase();
        if (msgLower.contains("suicide") || msgLower.contains("mourir") || msgLower.contains("en finir")) {
            return "critique";
        }
        if (analyse.toLowerCase().contains("risque: critique")) return "critique";
        if (analyse.toLowerCase().contains("risque: élevé")) return "élevé";
        if (analyse.toLowerCase().contains("risque: moyen")) return "moyen";
        return "bas";
    }

    private String determinerCategorie(String analyse, String message) {
        String msgLower = message.toLowerCase();
        if (msgLower.contains("suicide")) return "idées suicidaires";
        if (msgLower.contains("triste") || msgLower.contains("vide")) return "dépression";
        if (msgLower.contains("peur") || msgLower.contains("stress")) return "anxiété";
        if (msgLower.contains("seul")) return "solitude";

        if (analyse.toLowerCase().contains("catégorie: dépression")) return "dépression";
        if (analyse.toLowerCase().contains("catégorie: anxiété")) return "anxiété";
        if (analyse.toLowerCase().contains("catégorie: idées suicidaires")) return "idées suicidaires";

        return "non spécifié";
    }

    private double calculerConfiance(String analyse, String message) {
        try {
            String[] lignes = analyse.split("\n");
            for (String ligne : lignes) {
                if (ligne.toLowerCase().contains("confiance:")) {
                    String conf = ligne.replaceAll("[^0-9]", "");
                    if (!conf.isEmpty()) {
                        return Double.parseDouble(conf) / 100.0;
                    }
                }
            }
        } catch (Exception e) {}

        if (message.length() > 50) return 0.85;
        if (message.length() > 20) return 0.75;
        return 0.65;
    }

    private List<String> genererActions(String risque, String categorie) {
        List<String> actions = new ArrayList<>();

        if ("critique".equals(risque)) {
            actions.add("🚨 URGENCE - Contacter les urgences (15)");
            actions.add("📞 Appeler immédiatement le psychologue");
            actions.add("🏥 Proposer une hospitalisation d'urgence");
            actions.add("📱 Rester en ligne avec le patient");
        } else if ("élevé".equals(risque)) {
            actions.add("📅 Planifier une consultation urgente (24h)");
            actions.add("📧 Envoyer une alerte au psychologue");
            actions.add("📞 Proposer la ligne d'écoute 3114");
            actions.add("💬 Envoyer des ressources de soutien");
        } else if ("moyen".equals(risque)) {
            actions.add("📅 Planifier une consultation cette semaine");
            actions.add("📧 Notifier le psychologue");
            actions.add("📚 Recommander des exercices de bien-être");
        } else {
            actions.add("📚 Proposer des ressources de prévention");
            actions.add("💬 Encourager à parler à son psychologue");
            actions.add("🎯 Suggérer des objectifs positifs");
        }

        return actions;
    }
}