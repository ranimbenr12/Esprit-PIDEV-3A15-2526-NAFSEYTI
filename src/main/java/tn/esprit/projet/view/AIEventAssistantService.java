package tn.esprit.projet.view;

import java.util.*;
import java.util.concurrent.CompletableFuture;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

public class AIEventAssistantService {

    // Comprehensive event categories database
    private static final Map<String, EventCategory> EVENT_CATEGORIES = new HashMap<>();

    static {
        // === BIEN-ÊTRE & DÉVELOPPEMENT PERSONNEL ===
        EventCategory selfLove = new EventCategory("self-love", "💖 Bien-être & Développement personnel");
        selfLove.addTheme(new EventTheme(
                "Le Jardin Intérieur",
                "Une journée de découverte de soi où les participants cultivent leur paix intérieure",
                Arrays.asList(
                        "🌸 Cercle d'accueil avec cérémonie de plantation de fleurs",
                        "🧘 Méditation guidée dans un cadre apaisant",
                        "📔 Atelier de journaling: 'Écrire des lettres d'amour à soi-même'",
                        "🎨 Session créative: Peindre son paysage intérieur",
                        "🍵 Cérémonie du thé en pleine conscience",
                        "💫 Cercle de clôture avec engagements personnels"
                ),
                Arrays.asList(
                        "Guirlandes lumineuses et lanternes créant une atmosphère magique",
                        "Coussins et plaids confortables au sol",
                        "Fleurs fraîches et plantes partout",
                        "Palette de couleurs douces et terreuses (vert sauge, rose pâle, lavande)",
                        "Diffuseurs d'aromathérapie avec des senteurs apaisantes"
                ),
                "Idéal pour: Groupes de femmes, sensibilisation à la santé mentale, journées bien-être en entreprise",
                50, 1000
        ));

        selfLove.addTheme(new EventTheme(
                "Rayonnement: Célébrez Votre Lumière",
                "Une soirée inspirante célébrant l'amour de soi, la confiance et la beauté intérieure",
                Arrays.asList(
                        "🌟 Arrivée sur tapis rouge avec affirmations positives",
                        "💃 Atelier de danse confiance",
                        "📸 Photobooth d'amour-propre avec accessoires inspirants",
                        "🎤 Micro ouvert: 'Ce que j'aime chez moi'",
                        "✨ Cérémonie des miroirs avec affirmations",
                        "💎 Sacs-cadeaux de soins personnels"
                ),
                Arrays.asList(
                        "Accents de paillettes et métalliques",
                        "Décorations de miroirs",
                        "Éclairage chaud et doré",
                        "Citations inspirantes sur les murs",
                        "Fond photo d'amour-propre"
                ),
                "Idéal pour: Anniversaires, Journée internationale des femmes, Ateliers confiance",
                30, 5000
        ));

        selfLove.addTheme(new EventTheme(
                "Matinées Mindfulness",
                "Commencez votre journée avec intention, mouvement et pleine conscience",
                Arrays.asList(
                        "🌅 Session de yoga au lever du soleil",
                        "🧘 Méditation guidée avec guérison par le son",
                        "🥗 Atelier petit-déjeuner santé",
                        "📖 Journaling d'intention",
                        "🚶 Marche méditative en nature",
                        "💬 Cercle de connexion avec des âmes partageant les mêmes valeurs"
                ),
                Arrays.asList(
                        "Lumière naturelle et espace ouvert",
                        "Décor minimaliste avec éléments naturels",
                        "Tapis de yoga et accessoires confortables",
                        "Station de tisanes",
                        "Fleurs fraîches et plantes"
                ),
                "Idéal pour: Retraites de week-end, Programmes bien-être en entreprise, Clubs de santé",
                20, 2000
        ));

        EVENT_CATEGORIES.put("self-love", selfLove);

        // === ENTREPRISE & PROFESSIONNEL ===
        EventCategory corporate = new EventCategory("corporate", "💼 Entreprise & Professionnel");
        corporate.addTheme(new EventTheme(
                "Sommet de l'Innovation 2025",
                "Où les leaders de l'industrie se réunissent pour façonner l'avenir",
                Arrays.asList(
                        "🎤 Discours d'ouverture de pionniers de l'industrie",
                        "💡 Ateliers d'innovation interactifs",
                        "🤝 Sessions de networking express",
                        "🏆 Cérémonie de remise de prix",
                        "🚀 Concours de pitchs startup",
                        "🍷 Gala en soirée avec divertissement"
                ),
                Arrays.asList(
                        "Design épuré et moderne avec murs LED",
                        "Fond photo aux couleurs de l'entreprise",
                        "Scène professionnelle avec éclairage dramatique",
                        "Espaces lounge confortables pour networking",
                        "Bornes d'enregistrement numériques"
                ),
                "Idéal pour: Anniversaires d'entreprise, Lancements de produits, Conférences sectorielles",
                100, 50000
        ));

        corporate.addTheme(new EventTheme(
                "Synergie d'Équipe",
                "Renforcer les liens d'équipe par le plaisir et la collaboration",
                Arrays.asList(
                        "🧩 Défis et jeux de team-building",
                        "🎯 Atelier vision et mission",
                        "🍳 Concours de cuisine (team cook-off)",
                        "🏹 Activités d'aventure en plein air",
                        "🎭 Atelier d'improvisation humoristique",
                        "🔥 Veillée au coin du feu avec histoires"
                ),
                Arrays.asList(
                        "Cadre extérieur décontracté et confortable",
                        "Drapeaux et couleurs d'équipe",
                        "Stations de jeux interactifs",
                        "Zones photo avec accessoires amusants",
                        "Cercles de sièges confortables"
                ),
                "Idéal pour: Retraites de département, Intégration de nouvelles équipes, Team building annuel",
                20, 8000
        ));

        EVENT_CATEGORIES.put("corporate", corporate);

        // === ÉVÉNEMENTS SOCIAUX & FÊTES ===
        EventCategory social = new EventCategory("social", "🎉 Événements sociaux & Fêtes");
        social.addTheme(new EventTheme(
                "Gala Masqué Enchanté",
                "Une soirée mystérieuse et élégante de masques et de magie",
                Arrays.asList(
                        "🎭 Station de décoration de masques à l'arrivée",
                        "💃 Orchestre live et danse",
                        "🍸 Bar à cocktails signature",
                        "📸 Photobooth mystique",
                        "🔮 Voyante pour divertissement",
                        "🏆 Concours du plus beau masque"
                ),
                Arrays.asList(
                        "Riches tons de bijoux (violet, or, émeraude)",
                        "Lustres et lumières de bougies",
                        "Tentures et mobilier en velours",
                        "Expositions de masques complexes",
                        "Surfaces en miroir pour le glamour"
                ),
                "Idéal pour: Réveillon du Nouvel An, Galas de collecte de fonds, Célébrations d'anniversaire",
                100, 15000
        ));

        social.addTheme(new EventTheme(
                "Retro Party: Années 80 & 90",
                "Voyage dans le temps avec cet événement nostalgique",
                Arrays.asList(
                        "🎤 Concours karaoké avec tubes classiques",
                        "👾 Stations de jeux d'arcade",
                        "🕺 Concours de danse avec chorégraphie rétro",
                        "📼 Photobooth souvenir avec accessoires vintage",
                        "🍔 Stations de restauration typique",
                        "🏆 Concours du meilleur déguisement"
                ),
                Arrays.asList(
                        "Couleurs néon et lumières noires",
                        "Décorations de cassettes audio et vinyles",
                        "Bornes d'arcade rétro",
                        "Boule à facettes et piste de danse",
                        "Expositions de vieux ghetto blasters"
                ),
                "Idéal pour: Anniversaires, Collectes de fonds, Événements communautaires",
                50, 5000
        ));

        EVENT_CATEGORIES.put("social", social);

        // === ATELIERS ÉDUCATIFS ===
        EventCategory educational = new EventCategory("educational", "📚 Ateliers éducatifs");
        educational.addTheme(new EventTheme(
                "Académie des Compétences du Futur",
                "Apprenez les compétences qui définiront le lieu de travail de demain",
                Arrays.asList(
                        "🤖 Atelier IA et Machine Learning",
                        "📊 Masterclass en visualisation de données",
                        "🗣️ Prise de parole en public et communication",
                        "💻 Sessions de codage pratiques",
                        "🧠 Sprint de design thinking",
                        "🎯 Panels de développement de carrière"
                ),
                Arrays.asList(
                        "Configuration de classe moderne avec technologie",
                        "Tableaux blancs interactifs",
                        "Sièges ergonomiques confortables",
                        "Salles de sous-commission pour travail en groupe",
                        "Murs avec citations inspirantes"
                ),
                "Idéal pour: Journées de développement professionnel, Ateliers étudiants, Formation continue",
                30, 3000
        ));

        educational.addTheme(new EventTheme(
                "Retraite d'Écriture Créative",
                "Libérez l'auteur qui sommeille en vous dans un cadre paisible et inspirant",
                Arrays.asList(
                        "✍️ Sessions d'écriture guidée",
                        "📖 Conférences d'auteurs et Q&A",
                        "🤝 Cercles de révision par les pairs",
                        "🌿 Promenades en nature pour l'inspiration",
                        "🔥 Contes au coin du feu",
                        "📚 Atelier d'édition"
                ),
                Arrays.asList(
                        "Coins de lecture douillets",
                        "Éclairage chaud et bougies",
                        "Citations littéraires inspirantes",
                        "Stations d'écriture confortables",
                        "Bar à boissons chaudes"
                ),
                "Idéal pour: Groupes d'écrivains, Retraites scolaires, Professionnels créatifs",
                15, 2500
        ));

        EVENT_CATEGORIES.put("educational", educational);

        // === ÉVÉNEMENTS CULTURELS & COMMUNAUTAIRES ===
        EventCategory cultural = new EventCategory("cultural", "🌍 Culturels & Communautaires");
        cultural.addTheme(new EventTheme(
                "Festival du Village Global",
                "Célébrer la diversité à travers la nourriture, l'art et la tradition",
                Arrays.asList(
                        "🍜 Village culinaire international",
                        "💃 Spectacles de danse traditionnelle",
                        "🎨 Expositions d'art culturel",
                        "👗 Défilé de mode en tenue traditionnelle",
                        "🥁 Cercles de tambours et musique",
                        "🤝 Cercle de connexion communautaire"
                ),
                Arrays.asList(
                        "Drapeaux du monde entier",
                        "Artéfacts culturels et expositions",
                        "Drapés de tissus colorés",
                        "Stations culturelles interactives",
                        "Carte du monde pour épingles des visiteurs"
                ),
                "Idéal pour: Festivals culturels, Événements d'unité communautaire, Célébrations scolaires",
                200, 10000
        ));

        cultural.addTheme(new EventTheme(
                "Nuit du Patrimoine",
                "Une soirée intime de contes et traditions",
                Arrays.asList(
                        "📖 Cercle de contes avec les aînés",
                        "🍲 Dégustation de recettes familiales traditionnelles",
                        "🎵 Performances musicales culturelles",
                        "🖼️ Exposition d'histoire familiale",
                        "📝 Atelier de généalogie",
                        "🤗 Activités de connexion intergénérationnelle"
                ),
                Arrays.asList(
                        "Expositions de photos vintage",
                        "Atmosphère chaleureuse comme à la maison",
                        "Textiles et artisanats traditionnels",
                        "Coin contes aux chandelles",
                        "Mur d'arbres généalogiques"
                ),
                "Idéal pour: Réunions de famille, Centres communautaires, Organisations culturelles",
                40, 2000
        ));

        EVENT_CATEGORIES.put("cultural", cultural);

        // === ÉVÉNEMENTS SAISONNIERS & FÊTES ===
        EventCategory seasonal = new EventCategory("seasonal", "🎪 Saisonniers & Fêtes");
        seasonal.addTheme(new EventTheme(
                "Gala du Pays des Merveilles Hivernales",
                "Une soirée magique de flocons, de paillettes et de joie des fêtes",
                Arrays.asList(
                        "❄️ Exposition de sculptures sur glace",
                        "☕ Bar à chocolat chaud et biscuits",
                        "🛷 Promenades en traîneau (selon météo)",
                        "🎄 Cérémonie d'illumination du sapin",
                        "🎁 Échange de cadeaux Secret Santa",
                        "📸 Photos avec le Père Noël dans un décor hivernal"
                ),
                Arrays.asList(
                        "Blanc neige et argent partout",
                        "Guirlandes lumineuses scintillantes",
                        "Fausse neige et cristaux de glace",
                        "Plaids en fausse fourrure douillette",
                        "Projections de flocons de neige"
                ),
                "Idéal pour: Fêtes de fin d'année, Célébrations de Noël, Collectes de fonds hivernales",
                75, 8000
        ));

        seasonal.addTheme(new EventTheme(
                "Soirée Coucher de Soleil Estival",
                "Profitez de l'heure dorée en bonne compagnie et bonne ambiance",
                Arrays.asList(
                        "🌅 Session de yoga au coucher du soleil",
                        "🍷 Dégustation de vin et fromage",
                        "🎵 Musique live acoustique",
                        "📸 Promenade photo à l'heure dorée",
                        "🧺 Dîner style pique-nique",
                        "✨ Cérémonie de lâcher de lanternes"
                ),
                Arrays.asList(
                        "Couleurs chaudes de coucher de soleil (orange, rose, or)",
                        "Guirlandes lumineuses et lanternes",
                        "Couvertures de pique-nique confortables",
                        "Éléments rustiques en bois",
                        "Centres de table floraux"
                ),
                "Idéal pour: Solstice d'été, Rassemblements en plein air, Événements romantiques",
                40, 3000
        ));

        EVENT_CATEGORIES.put("seasonal", seasonal);
    }

    // Helper classes for better organization
    static class EventTheme {
        String name;
        String description;
        List<String> activities;
        List<String> decor;
        String targetAudience;
        int minAttendees;
        int estimatedBudget;

        EventTheme(String name, String description, List<String> activities,
                   List<String> decor, String targetAudience, int minAttendees, int estimatedBudget) {
            this.name = name;
            this.description = description;
            this.activities = activities;
            this.decor = decor;
            this.targetAudience = targetAudience;
            this.minAttendees = minAttendees;
            this.estimatedBudget = estimatedBudget;
        }
    }

    static class EventCategory {
        String id;
        String displayName;
        List<EventTheme> themes = new ArrayList<>();

        EventCategory(String id, String displayName) {
            this.id = id;
            this.displayName = displayName;
        }

        void addTheme(EventTheme theme) {
            themes.add(theme);
        }
    }

    // Main method to generate ideas
    public static CompletableFuture<String> generateThemeIdeas(String userInput) {
        return CompletableFuture.supplyAsync(() -> {
            StringBuilder response = new StringBuilder();

            // Parse user intent
            String lowerInput = userInput.toLowerCase();

            // Welcome header with cool ASCII art
            response.append("╔══════════════════════════════════════════════════════════════╗\n");
            response.append("║                    🤖  ASSISTANT ÉVÉNEMENTIEL  🤖            ║\n");
            response.append("╚══════════════════════════════════════════════════════════════╝\n\n");

            response.append("✨ **Bonjour Créateur d'Événements!** Je suis là pour vous aider à planifier quelque chose d'extraordinaire.\n");
            response.append("Vous avez dit: \"").append(userInput).append("\"\n\n");

            // Check if user wants inspiration (no specific idea)
            if (isAskingForInspiration(lowerInput)) {
                response.append(generateInspirationSection());
            }
            // Check if user wants help with a specific category
            else {
                String category = detectCategory(lowerInput);
                if (category != null && EVENT_CATEGORIES.containsKey(category)) {
                    response.append(generateCategoryIdeas(EVENT_CATEGORIES.get(category)));
                } else {
                    // Show mixed ideas from multiple categories
                    response.append(generateMixedCategoryIdeas(lowerInput));
                }
            }

            // Add planning tools section
            response.append(generatePlanningToolsSection());

            // Add quick tips
            response.append(generateQuickTips());

            // Add interactive prompt
            response.append("\n" + "─".repeat(70) + "\n");
            response.append("💬 **De quoi aimeriez-vous parler ensuite?**\n");
            response.append("   • Tapez 'budget' pour la planification budgétaire\n");
            response.append("   • Tapez 'calendrier' pour le calendrier d'événement\n");
            response.append("   • Tapez 'marketing' pour des idées de promotion\n");
            response.append("   • Tapez 'activités' pour plus d'idées d'activités\n");
            response.append("   • Tapez 'lieux' pour des suggestions de lieux\n");
            response.append("   • Ou décrivez simplement une autre idée d'événement!\n");

            return response.toString();
        });
    }

    private static boolean isAskingForInspiration(String input) {
        return input.contains("idée") || input.contains("idées") ||
                input.contains("inspire") || input.contains("inspiration") ||
                input.contains("suggestion") || input.contains("suggestions") ||
                input.contains("quel événement") ||
                input.contains("je ne sais pas") ||
                input.contains("pas d'idée") ||
                input.contains("aide-moi") ||
                input.contains("recommande");
    }

    private static String generateInspirationSection() {
        StringBuilder inspo = new StringBuilder();

        inspo.append("🌈 **BESOIN D'INSPIRATION? VOICI QUELQUES IDÉES GÉNIALES!**\n");
        inspo.append("══════════════════════════════════════════════════════\n\n");

        // Generate random themes from different categories
        Random rand = new Random();
        List<EventCategory> categories = new ArrayList<>(EVENT_CATEGORIES.values());
        Collections.shuffle(categories);

        for (int i = 0; i < Math.min(4, categories.size()); i++) {
            EventCategory category = categories.get(i);
            if (!category.themes.isEmpty()) {
                EventTheme theme = category.themes.get(rand.nextInt(category.themes.size()));
                inspo.append("🎯 **").append(theme.name).append("**\n");
                inspo.append("   ").append(theme.description).append("\n");
                inspo.append("   📍 Idéal pour: ").append(theme.targetAudience).append("\n");
                inspo.append("   💰 Budget estimé: ").append(formatBudget(theme.estimatedBudget)).append("\n\n");
            }
        }

        // Add creative combination ideas
        inspo.append("🎨 **COMBINAISONS CRÉATIVES QUE VOUS POURRIEZ AIMER:**\n\n");
        inspo.append("   • **Bien-être + Tech** = \"Bien-être Connecté : Retraite de Bien-être Digital\"\n");
        inspo.append("   • **Gastronomie + Art** = \"Chefs-d'Œuvre Comestibles : Festival de l'Art Culinaire\"\n");
        inspo.append("   • **Musique + Nature** = \"Symphonie en Forêt : Concert en Plein Air\"\n");
        inspo.append("   • **Mode + Durabilité** = \"Éco-Chic : Défilé de Mode Durable\"\n");
        inspo.append("   • **Livres + Vin** = \"Siroter et Lire : Dégustation Littéraire\"\n\n");

        return inspo.toString();
    }

    private static String formatBudget(int budget) {
        if (budget >= 1000) {
            return (budget / 1000) + "k €";
        }
        return budget + " €";
    }

    private static String generateCategoryIdeas(EventCategory category) {
        StringBuilder ideas = new StringBuilder();

        ideas.append("🎪 **EXPLORATION: ").append(category.displayName).append("**\n");
        ideas.append("══════════════════════════════════════════════════════\n\n");

        for (EventTheme theme : category.themes) {
            ideas.append("✨ **").append(theme.name).append("**\n");
            ideas.append("   📝 ").append(theme.description).append("\n");
            ideas.append("\n   **🎯 Activités principales:**\n");
            for (String activity : theme.activities.subList(0, Math.min(4, theme.activities.size()))) {
                ideas.append("      • ").append(activity).append("\n");
            }
            ideas.append("\n   **🏛️ Idées de décoration:**\n");
            for (String decor : theme.decor.subList(0, Math.min(3, theme.decor.size()))) {
                ideas.append("      • ").append(decor).append("\n");
            }
            ideas.append("\n   **👥 Public cible:** ").append(theme.targetAudience);
            ideas.append(" | **💰 Budget:** ").append(formatBudget(theme.estimatedBudget)).append("\n");
            ideas.append("\n" + "─".repeat(50) + "\n\n");
        }

        return ideas.toString();
    }

    private static String generateMixedCategoryIdeas(String input) {
        StringBuilder mixed = new StringBuilder();

        mixed.append("🎯 **VOICI QUELQUES IDÉES D'ÉVÉNEMENTS SELON VOS INTÉRÊTS**\n");
        mixed.append("══════════════════════════════════════════════════════\n\n");

        // Analyze keywords in input
        boolean hasWellness = input.contains("bien-être") || input.contains("santé") || input.contains("soi") || input.contains("amour");
        boolean hasCorporate = input.contains("entreprise") || input.contains("business") || input.contains("professionnel");
        boolean hasSocial = input.contains("fête") || input.contains("célébration") || input.contains("social");
        boolean hasEducational = input.contains("apprendre") || input.contains("atelier") || input.contains("formation");

        // Select relevant categories
        List<EventCategory> relevantCats = new ArrayList<>();
        if (hasWellness) relevantCats.add(EVENT_CATEGORIES.get("self-love"));
        if (hasCorporate) relevantCats.add(EVENT_CATEGORIES.get("corporate"));
        if (hasSocial) relevantCats.add(EVENT_CATEGORIES.get("social"));
        if (hasEducational) relevantCats.add(EVENT_CATEGORIES.get("educational"));

        // If no specific keywords, show a mix
        if (relevantCats.isEmpty()) {
            relevantCats.add(EVENT_CATEGORIES.get("self-love"));
            relevantCats.add(EVENT_CATEGORIES.get("social"));
            relevantCats.add(EVENT_CATEGORIES.get("seasonal"));
        }

        Random rand = new Random();
        for (EventCategory cat : relevantCats) {
            if (!cat.themes.isEmpty()) {
                EventTheme theme = cat.themes.get(rand.nextInt(cat.themes.size()));
                mixed.append("💡 **").append(theme.name).append("**\n");
                mixed.append("   ").append(theme.description).append("\n");
                mixed.append("   ✨ Points forts:\n");
                for (int i = 0; i < Math.min(3, theme.activities.size()); i++) {
                    mixed.append("      • ").append(theme.activities.get(i)).append("\n");
                }
                mixed.append("\n");
            }
        }

        return mixed.toString();
    }

    private static String generatePlanningToolsSection() {
        StringBuilder tools = new StringBuilder();

        tools.append("\n📋 **BOÎTE À OUTILS DE PLANIFICATION**\n");
        tools.append("═══════════════════════════\n\n");

        // Checklist
        tools.append("✅ **Liste de contrôle essentielle:**\n");
        tools.append("   [ ] Définir les objectifs de l'événement\n");
        tools.append("   [ ] Établir le budget\n");
        tools.append("   [ ] Choisir la date et l'heure\n");
        tools.append("   [ ] Trouver et réserver le lieu\n");
        tools.append("   [ ] Créer l'image de marque et le thème\n");
        tools.append("   [ ] Planifier les activités et le programme\n");
        tools.append("   [ ] Organiser la restauration\n");
        tools.append("   [ ] Réserver les animateurs/conférenciers\n");
        tools.append("   [ ] Mettre en place le système d'inscription\n");
        tools.append("   [ ] Créer un plan marketing\n");
        tools.append("   [ ] Recruter des bénévoles/personnel\n");
        tools.append("   [ ] Prévoir des solutions de secours\n\n");

        // Budget breakdown template
        tools.append("💰 **Répartition budgétaire type:**\n");
        tools.append("   • Lieu: 25-30% du budget\n");
        tools.append("   • Restauration: 20-25%\n");
        tools.append("   • Animateurs/Conférenciers: 15-20%\n");
        tools.append("   • Marketing: 10-15%\n");
        tools.append("   • Décoration/Production: 10-15%\n");
        tools.append("   • Personnel/Bénévoles: 5-10%\n");
        tools.append("   • Imprévus: 5-10%\n\n");

        return tools.toString();
    }

    private static String generateQuickTips() {
        StringBuilder tips = new StringBuilder();

        tips.append("💡 **CONSEILS POUR UN ÉVÉNEMENT RÉUSSI**\n");
        tips.append("══════════════════════════════\n\n");

        tips.append("   🎯 **Engagement:** Utilisez des applications pour sondages en direct et networking\n");
        tips.append("   📸 **Réseaux sociaux:** Créez un hashtag unique et des moments photo\n");
        tips.append("   🌟 **Premières impressions:** Accueillez les invités avec une touche signature\n");
        tips.append("   🔄 **Flux:** Concevez des transitions fluides entre les activités\n");
        tips.append("   🎁 **Mémorabilité:** Offrez des cadeaux significatifs à emporter\n");
        tips.append("   📝 **Feedback:** Recueillez toujours les retours pour vous améliorer\n");
        tips.append("   🤝 **Suivi:** Restez en contact avec les participants après l'événement\n");

        return tips.toString();
    }

    private static String detectCategory(String input) {
        if (input.contains("soi") || input.contains("amour") || input.contains("bien-être") ||
                input.contains("soin") || input.contains("esprit") || input.contains("mindfulness")) {
            return "self-love";
        } else if (input.contains("entreprise") || input.contains("business") ||
                input.contains("société") || input.contains("professionnel")) {
            return "corporate";
        } else if (input.contains("fête") || input.contains("célébration") ||
                input.contains("social") || input.contains("gala")) {
            return "social";
        } else if (input.contains("apprendre") || input.contains("atelier") ||
                input.contains("formation") || input.contains("éducatif")) {
            return "educational";
        } else if (input.contains("culture") || input.contains("communautaire") ||
                input.contains("patrimoine") || input.contains("traditionnel")) {
            return "cultural";
        } else if (input.contains("saisonnier") || input.contains("fête") ||
                input.contains("été") || input.contains("hiver")) {
            return "seasonal";
        }
        return null;
    }
}