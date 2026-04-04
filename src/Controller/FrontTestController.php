<?php

namespace App\Controller;

use App\Entity\Test;
use App\Entity\ReponsesScore;
use App\Repository\TestRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tests')]
class FrontTestController extends AbstractController
{
    #[Route('/', name: 'front_test_list')]
    public function list(TestRepository $testRepository): Response
    {
        $tests = $testRepository->findBy(['status' => 'actif']);
        
        return $this->render('front/tests/list.html.twig', [
            'tests' => $tests,
        ]);
    }

    #[Route('/{id}', name: 'front_test_show')]
    public function show(Test $test): Response
    {
        // Vérifier si le test est actif
        if ($test->getStatus() !== 'actif') {
            $this->addFlash('error', 'Ce test n\'est pas disponible.');
            return $this->redirectToRoute('front_test_list');
        }
        
        // Récupérer les questions actives triées par ordre
        $questions = $test->getQuestions()->filter(function($question) {
            return $question->getStatus() === 'actif';
        })->toArray();
        
        // Trier par ordre
        usort($questions, function($a, $b) {
            return ($a->getOrdre() ?? 999) <=> ($b->getOrdre() ?? 999);
        });
        
        return $this->render('front/tests/show.html.twig', [
            'test' => $test,
            'questions' => $questions,
        ]);
    }

    #[Route('/{id}/submit', name: 'front_test_submit', methods: ['POST'])]
    public function submit(Request $request, Test $test, EntityManagerInterface $entityManager): Response
    {
        $questions = $test->getQuestions()->filter(function($question) {
            return $question->getStatus() === 'actif';
        });
        
        $totalScore = 0;
        $maxScore = 0;
        $reponsesData = [];
        $detailsByCategory = [];
        
        foreach ($questions as $question) {
            $maxScore += $question->getPoints();
            $reponseValue = $request->request->get('reponse_' . $question->getId());
            
            if ($reponseValue !== null && $reponseValue !== '') {
                $score = 0;
                
                // Traiter la réponse selon le type de question
                if (is_array($reponseValue)) {
                    // Pour les choix multiples, additionner les scores de chaque option
                    $reponseText = implode(', ', $reponseValue);
                    foreach ($reponseValue as $val) {
                        $score += $this->calculateScoreForResponse($question, $val);
                    }
                } else {
                    $reponseText = $reponseValue;
                    $score = $this->calculateScoreForResponse($question, $reponseValue);
                }
                
                $totalScore += $score;
                
                $reponsesData[] = [
                    'question' => $question,
                    'reponse' => $reponseText,
                    'score' => $score,
                    'points_max' => $question->getPoints()
                ];
                
                // Catégoriser pour analyse détaillée
                $category = $this->getQuestionCategory($question);
                if (!isset($detailsByCategory[$category])) {
                    $detailsByCategory[$category] = ['score' => 0, 'max' => 0, 'questions' => []];
                }
                $detailsByCategory[$category]['score'] += $score;
                $detailsByCategory[$category]['max'] += $question->getPoints();
                $detailsByCategory[$category]['questions'][] = $question;
            }
        }
        
        // Calculer le pourcentage
        $percentage = $maxScore > 0 ? round(($totalScore / $maxScore) * 100) : 0;
        
        // Trouver l'interprétation selon le score
        $interpretation = $this->findInterpretation($test, $percentage, $totalScore, $maxScore);
        
        // Stocker en session pour l'affichage des résultats
        $session = $request->getSession();
        $session->set('last_test_result', [
            'test' => $test,
            'percentage' => $percentage,
            'totalScore' => $totalScore,
            'maxScore' => $maxScore,
            'interpretation' => $interpretation,
            'reponses' => $reponsesData,
            'detailsByCategory' => $detailsByCategory
        ]);
        
        return $this->redirectToRoute('front_test_result', ['id' => $test->getId()]);
    }
    
    #[Route('/{id}/result', name: 'front_test_result')]
    public function result(Request $request, Test $test): Response
    {
        $session = $request->getSession();
        $result = $session->get('last_test_result');
        
        if (!$result || $result['test']->getId() !== $test->getId()) {
            return $this->redirectToRoute('front_test_show', ['id' => $test->getId()]);
        }
        
        return $this->render('front/tests/result.html.twig', [
            'test' => $test,
            'percentage' => $result['percentage'],
            'totalScore' => $result['totalScore'],
            'maxScore' => $result['maxScore'],
            'interpretation' => $result['interpretation'],
            'reponses' => $result['reponses'],
            'detailsByCategory' => $result['detailsByCategory'] ?? []
        ]);
    }
    
    /**
     * Calcule le score pour une réponse donnée selon le barème de la question
     */
    private function calculateScoreForResponse($question, string $reponse): int
    {
        // Récupérer le barème de la question
        $bareme = $question->getBareme();
        
        // Si un barème spécifique existe pour cette réponse
        if ($bareme && isset($bareme[$reponse])) {
            return (int)$bareme[$reponse];
        }
        
        // Pour les questions Vrai/Faux
        if ($question->getTypeQuestion() === 'vrai_faux') {
            if ($reponse === 'Vrai') {
                return $question->getPoints();
            }
            return 0;
        }
        
        // Pour les QCM, vérifier si la réponse est dans les options
        $options = $question->getReponsesPossiblesArray();
        if (in_array($reponse, $options)) {
            // Par défaut, donner tous les points si la réponse est valide
            return $question->getPoints();
        }
        
        // Pour les questions texte libre, donner tous les points si une réponse est fournie
        if ($question->getTypeQuestion() === 'texte_libre' && !empty($reponse)) {
            return $question->getPoints();
        }
        
        return 0;
    }
    
    /**
     * Détermine la catégorie d'une question pour l'analyse
     */
    private function getQuestionCategory($question): string
    {
        $texte = strtolower($question->getTexte());
        
        if (strpos($texte, 'stress') !== false || strpos($texte, 'calme') !== false || strpos($texte, 'pression') !== false) {
            return 'Gestion du stress';
        } elseif (strpos($texte, 'seul') !== false || strpos($texte, 'foule') !== false || strpos($texte, 'soirée') !== false) {
            return 'Sociabilité';
        } elseif (strpos($texte, 'sentiment') !== false || strpos($texte, 'triste') !== false || strpos($texte, 'émotion') !== false) {
            return 'Empathie';
        } elseif (strpos($texte, 'présent') !== false || strpos($texte, 'avenir') !== false) {
            return 'Orientation temporelle';
        } elseif (strpos($texte, 'concentrer') !== false || strpos($texte, 'attention') !== false) {
            return 'Concentration';
        } elseif (strpos($texte, 'sommeil') !== false || strpos($texte, 'dormir') !== false) {
            return 'Qualité du sommeil';
        } else {
            return 'Personnalité';
        }
    }
    
    /**
     * Trouve l'interprétation basée sur le pourcentage et le score
     */
    private function findInterpretation(Test $test, int $percentage, int $totalScore, int $maxScore): array
    {
        // Interprétations basées sur le pourcentage
        if ($percentage >= 80) {
            return [
                'title' => '🌟 Excellent résultat !',
                'description' => 'Vous avez un très bon profil psychologique. Votre équilibre émotionnel est remarquable et vous gérez bien les situations.',
                'advice' => 'Continuez à prendre soin de votre santé mentale. Partagez vos stratégies avec les autres et restez attentif à votre bien-être.',
                'color' => 'success',
                'icon' => 'fa-star'
            ];
        } elseif ($percentage >= 60) {
            return [
                'title' => '👍 Bon résultat',
                'description' => 'Vous êtes sur la bonne voie. La plupart des aspects sont bien gérés, mais quelques points méritent votre attention.',
                'advice' => 'Identifiez les domaines où vous pouvez vous améliorer et travaillez-les progressivement. Consultez nos ressources gratuites.',
                'color' => 'info',
                'icon' => 'fa-thumbs-up'
            ];
        } elseif ($percentage >= 40) {
            return [
                'title' => '📊 Résultat moyen',
                'description' => 'Certains aspects de votre bien-être méritent une attention particulière. Des efforts ciblés pourraient faire la différence.',
                'advice' => 'Nous vous recommandons de consulter nos articles sur le bien-être et de participer à nos ateliers de gestion du stress.',
                'color' => 'warning',
                'icon' => 'fa-chart-line'
            ];
        } else {
            return [
                'title' => '🌱 Potentiel d\'amélioration',
                'description' => 'Ce résultat identifie des axes de développement importants. Ne vous inquiétez pas, c\'est le point de départ pour progresser.',
                'advice' => 'Nous vous encourageons vivement à prendre rendez-vous avec un de nos psychologues pour un accompagnement personnalisé et bienveillant.',
                'color' => 'danger',
                'icon' => 'fa-seedling'
            ];
        }
    }
}