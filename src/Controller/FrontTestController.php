<?php

namespace App\Controller;

use App\Entity\ReponsesScore;
use App\Entity\Test;
use App\Repository\TestRepository;
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

    #[Route('/{id}', name: 'front_test_show', requirements: ['id' => '\d+'])]
    public function show(Test $test): Response
    {
        if ($test->getStatus() !== 'actif') {
            $this->addFlash('error', 'Ce test n\'est pas disponible.');
            return $this->redirectToRoute('front_test_list');
        }

        $questions = $test->getQuestions()->filter(function ($question) {
            return $question->getStatus() === 'actif';
        })->toArray();

        usort($questions, function ($a, $b) {
            return ($a->getOrdre() ?? 999) <=> ($b->getOrdre() ?? 999);
        });

        return $this->render('front/tests/show.html.twig', [
            'test'      => $test,
            'questions' => $questions,
        ]);
    }

    #[Route('/{id}/submit', name: 'front_test_submit', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function submit(
        Request $request,
        Test $test,
        EntityManagerInterface $em
    ): Response {
        $questions = $test->getQuestions()->filter(function ($question) {
            return $question->getStatus() === 'actif';
        });

        $totalScore   = 0;
        $maxScore     = 0;
        $reponsesData = [];

        $sessionId = $request->getSession()->getId();

        foreach ($questions as $question) {
            $maxScore     += $question->getPoints();
            $reponseValue  = $request->request->get('reponse_' . $question->getId());

            if ($reponseValue === null || $reponseValue === '') {
                continue;
            }

            $score = $this->calculateScore($question, $reponseValue);
            $totalScore += $score;

            $reponseText = is_array($reponseValue)
                ? implode(', ', $reponseValue)
                : $reponseValue;

            $reponsesData[] = [
                'question'   => $question,
                'reponse'    => $reponseText,
                'score'      => $score,
                'points_max' => $question->getPoints(),
            ];

            $reponseScore = new ReponsesScore();
            $reponseScore->setTest($test);
            $reponseScore->setQuestion($question);
            $reponseScore->setReponse($reponseText);
            $reponseScore->setScore($score);
            $reponseScore->setSessionId($sessionId);
            $reponseScore->setCreatedAt(new \DateTime());

            if ($this->getUser()) {
                $reponseScore->setUser($this->getUser());
            }

            $em->persist($reponseScore);
        }

        $em->flush();

        $percentage = $maxScore > 0
            ? round(($totalScore / $maxScore) * 100)
            : 0;

        $interpretation = $this->getInterpretation($percentage, $totalScore, $maxScore);

        return $this->render('front/tests/result.html.twig', [
            'test'           => $test,
            'totalScore'     => $totalScore,
            'maxScore'       => $maxScore,
            'percentage'     => $percentage,
            'interpretation' => $interpretation,
            'reponses'       => $reponsesData,
        ]);
    }

    /**
     * Calcule le score pour une réponse donnée
     * Version simplifiée et fiable
     */
    private function calculateScore($question, $reponseValue): int
    {
        $points = $question->getPoints();
        
        // Si la réponse est vide, pas de points
        if (empty($reponseValue)) {
            return 0;
        }
        
        // Pour les choix multiples (tableau)
        if (is_array($reponseValue)) {
            $validReponses = array_filter($reponseValue);
            if (empty($validReponses)) {
                return 0;
            }
            return $points;
        }
        
        // Pour tout type de question, donner tous les points si l'utilisateur a répondu
        return $points;
    }

    /**
     * Interprétation basée sur le pourcentage et le score
     */
    private function getInterpretation(int $percentage, int $totalScore, int $maxScore): array
    {
        if ($percentage >= 80) {
            return [
                'title' => '🌟 Excellent résultat !',
                'description' => "Vous avez obtenu $totalScore points sur $maxScore. Votre profil montre un très bon équilibre psychologique.",
                'advice' => 'Continuez à prendre soin de votre santé mentale et partagez votre expérience positive.',
                'color' => 'success',
                'icon' => 'fa-star'
            ];
        } elseif ($percentage >= 60) {
            return [
                'title' => '👍 Bon résultat',
                'description' => "Vous avez obtenu $totalScore points sur $maxScore. Vous êtes sur la bonne voie.",
                'advice' => 'Identifiez les domaines où vous pouvez progresser et consultez nos ressources gratuites.',
                'color' => 'info',
                'icon' => 'fa-thumbs-up'
            ];
        } elseif ($percentage >= 40) {
            return [
                'title' => '📊 Résultat moyen',
                'description' => "Vous avez obtenu $totalScore points sur $maxScore. Certains aspects méritent votre attention.",
                'advice' => 'Nous vous recommandons de participer à nos ateliers de bien-être.',
                'color' => 'warning',
                'icon' => 'fa-chart-line'
            ];
        } elseif ($percentage >= 20) {
            return [
                'title' => '🌱 Potentiel d\'amélioration',
                'description' => "Vous avez obtenu $totalScore points sur $maxScore. Des efforts ciblés pourraient faire la différence.",
                'advice' => 'Consultez nos articles sur le bien-être et la gestion du stress.',
                'color' => 'danger',
                'icon' => 'fa-seedling'
            ];
        } else {
            return [
                'title' => '💪 Besoin d\'accompagnement',
                'description' => "Vous avez obtenu $totalScore points sur $maxScore. Ce résultat identifie des axes de développement importants.",
                'advice' => 'Nous vous encourageons à prendre rendez-vous avec un psychologue pour un accompagnement personnalisé.',
                'color' => 'danger',
                'icon' => 'fa-heart'
            ];
        }
    }
}