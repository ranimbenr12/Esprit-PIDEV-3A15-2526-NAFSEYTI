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
            return $a->getOrdre() <=> $b->getOrdre();
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
        
        foreach ($questions as $question) {
            $maxScore += $question->getPoints();
            $reponseValue = $request->request->get('reponse_' . $question->getId());
            
            if ($reponseValue !== null && $reponseValue !== '') {
                // Traiter la réponse selon le type de question
                if (is_array($reponseValue)) {
                    // Pour les choix multiples
                    $reponseValue = implode(', ', $reponseValue);
                }
                
                // Calculer le score (à personnaliser selon votre logique)
                // Pour l'instant, on donne les points si une réponse est fournie
                $score = $question->getPoints();
                $totalScore += $score;
                
                $reponsesData[] = [
                    'question' => $question,
                    'reponse' => $reponseValue,
                    'score' => $score
                ];
            }
        }
        
        // Calculer le pourcentage
        $percentage = $maxScore > 0 ? round(($totalScore / $maxScore) * 100) : 0;
        
        // Trouver l'interprétation selon le score
        $interpretation = $this->findInterpretation($test, $percentage);
        
        // Sauvegarder les réponses (optionnel)
        // Vous pouvez créer une entité SessionTest pour sauvegarder les résultats
        
        // Stocker en session pour l'affichage des résultats
        $session = $request->getSession();
        $session->set('last_test_result', [
            'test' => $test,
            'percentage' => $percentage,
            'totalScore' => $totalScore,
            'maxScore' => $maxScore,
            'interpretation' => $interpretation,
            'reponses' => $reponsesData
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
            'reponses' => $result['reponses']
        ]);
    }
    
    private function findInterpretation(Test $test, int $percentage): ?string
    {
        // À implémenter selon votre logique d'interprétation
        // Pour l'instant, retourne un message basé sur le pourcentage
        if ($percentage >= 80) {
            return "Excellent résultat ! Vous avez un très bon niveau dans ce domaine.";
        } elseif ($percentage >= 60) {
            return "Bon résultat ! Continuez vos efforts pour vous améliorer.";
        } elseif ($percentage >= 40) {
            return "Résultat moyen. Certains points méritent votre attention.";
        } else {
            return "Ce résultat mérite une attention particulière. N'hésitez pas à consulter nos ressources d'accompagnement.";
        }
    }
}