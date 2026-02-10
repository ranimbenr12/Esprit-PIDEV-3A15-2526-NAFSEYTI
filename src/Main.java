import TestPsychologique.dao.Testdao;
import TestPsychologique.models.Test;
import java.util.List;
public class Main {
    public static void main(String[] args) {
        System.out.println("═══════════════════════════════════════════════");
        System.out.println("    TEST D'AJOUT DE TESTS PSYCHOLOGIQUES");
        System.out.println("═══════════════════════════════════════════════\n");

        // Créer une instance de TestDAO
        Testdao testDAO = new Testdao();

        // ═══ TEST 1 : Test d'Anxiété ═══
        System.out.println(" Création du Test 1 : Test d'Anxiété GAD-7");
        Test test1 = new Test(
                "Test d'Anxiété GAD-7",
                "Évaluation du niveau d'anxiété généralisée",
                "Anxiété",
                "Débutant",
                15,
                21,
                1,
                "actif"
        );

        boolean succes1 = testDAO.ajouterTest(test1);
        if (succes1) {
            System.out.println(" Test 1 ajouté avec succès !");
            System.out.println("   ID généré : " + test1.getId());
            System.out.println("   " + test1);
        } else {
            System.out.println(" Échec de l'ajout du Test 1");
        }

        System.out.println("\n───────────────────────────────────────────────\n");

        // ═══ TEST 2 : Test de Dépression ═══
        System.out.println(" Création du Test 2 : Test de Dépression PHQ-9");
        Test test2 = new Test(
                "Test de Dépression PHQ-9",
                "Questionnaire de santé du patient pour la dépression",
                "Dépression",
                "Intermédiaire",
                20,
                27,
                1,
                "actif"
        );

        boolean succes2 = testDAO.ajouterTest(test2);
        if (succes2) {
            System.out.println(" Test 2 ajouté avec succès !");
            System.out.println("   ID généré : " + test2.getId());
            System.out.println("   " + test2);
        } else {
            System.out.println(" Échec de l'ajout du Test 2");
        }

        System.out.println("\n═══════════════════════════════════════════════");
        System.out.println("           RÉSUMÉ DES OPÉRATIONS");
        System.out.println("═══════════════════════════════════════════════");

        int nbSucces = (succes1 ? 1 : 0) + (succes2 ? 1 : 0);
        int nbEchecs = 2 - nbSucces;

        System.out.println(" Tests ajoutés avec succès : " + nbSucces);
        System.out.println(" Échecs : " + nbEchecs);
        System.out.println("═══════════════════════════════════════════════\n");
        System.out.println("═══════════════════════════════════════════════");
        System.out.println(" ÉTAPE 2 : READ ALL (Afficher tous les tests)");
        System.out.println("───────────────────────────────────────────────\n");

        List<Test> tousLesTests = testDAO.getAllTests();

        if (tousLesTests.isEmpty()) {
            System.out.println(" Aucun test dans la base de données");
        } else {
            System.out.println(" Liste de tous les tests :");
            for (Test t : tousLesTests) {
                System.out.println("   • " + t);
            }
        }
        System.out.println("\n═══════════════════════════════════════════════");
        System.out.println(" ÉTAPE 3 : READ BY ID (Rechercher par ID)");
        System.out.println("───────────────────────────────────────────────\n");

        if (test1.getId() > 0) {
            Test testRecupere = testDAO.getTestById(test1.getId());
            if (testRecupere != null) {
                System.out.println("Test trouvé :");
                System.out.println("   ID : " + testRecupere.getId());
                System.out.println("   Titre : " + testRecupere.getTitre());
                System.out.println("   Catégorie : " + testRecupere.getCategorie());
                System.out.println("   Durée : " + testRecupere.getDuree() + " min");
                System.out.println("   Score max : " + testRecupere.getScoreMax());
            }
        }

        System.out.println("\n═══════════════════════════════════════════════");
        System.out.println("✏ ÉTAPE 5 : UPDATE (Modifier un test)");
        System.out.println("───────────────────────────────────────────────\n");

        if (test1 != null && test1.getId() > 0) {
            System.out.println("Avant modification : " + test1.getTitre());

            test1.setTitre("Test d'Anxiété level high  MODIFIÉ");
            test1.setDuree(31);
            test1.setStatus("archivé");

            boolean modificationReussie = testDAO.modifierTest(test1);

            if (modificationReussie) {
                Test testModifie = testDAO.getTestById(test1.getId());
                System.out.println("Après modification : " + testModifie.getTitre());
                System.out.println("Nouvelle durée : " + testModifie.getDuree() + " min");
                System.out.println("Nouveau status : " + testModifie.getStatus());
            }
        }

       /* System.out.println("\n═══════════════════════════════════════════════");
        System.out.println("🗑 ÉTAPE 6 : DELETE (Supprimer un test)");
        System.out.println("───────────────────────────────────────────────\n");

        if (test2.getId() > 0) {
            System.out.println("Suppression du test : " + test2.getTitre() + " (ID: " + test2.getId() + ")");

            boolean suppressionReussie = testDAO.supprimerTest(test2.getId());

            if (suppressionReussie) {
                // Vérifier que le test n'existe plus
                Test testSupprime = testDAO.getTestById(test2.getId());
                if (testSupprime == null) {
                    System.out.println(" Confirmation : Le test a bien été supprimé de la base");
                }
            }
        }*/


        // Fermer la connexion
        TestPsychologique.dao.DataBaseConnection.closeConnection();
    }
}