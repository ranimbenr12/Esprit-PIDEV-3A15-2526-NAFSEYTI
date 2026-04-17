<?php

namespace App\Controller\teste;

use App\Entity\ReponsesScore;
use App\Entity\Test;
use App\Repository\TestRepository;
use App\Service\GeminiService;
use App\Service\FaceppService;
use App\Service\PdfService;
use App\Service\AlerteService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use App\Service\ScoringService;
#[Route('/tests')]
class FrontTestController extends AbstractController
{
      public function __construct(
        private AlerteService $alerteService  // ← AJOUTE CETTE LIGNE
    ) {
    }
    #[Route('/', name: 'front_test_list')]
    public function list(TestRepository $testRepository): Response
    {
        $tests = $testRepository->findBy(['status' => 'actif']);
        return $this->render('front/tests/list.html.twig', ['tests' => $tests]);
    }

    #[Route('/{id}', name: 'front_test_show', requirements: ['id' => '\d+'])]
    public function show(
        Test $test,
        Request $request,
        RateLimiterFactory $testViewLimiter
    ): Response {
        // ── RATE LIMITER ──
        $identifier = 'ip_' . $request->getClientIp();
        $limiter    = $testViewLimiter->create($identifier);
        $limit      = $limiter->consume(1);

        if (!$limit->isAccepted()) {
            $retryAfter = $limit->getRetryAfter()->getTimestamp() - time();
            $minutes    = ceil($retryAfter / 60);

            return $this->render('front/tests/rate_limit.html.twig', [
                'minutes'   => $minutes,
                'test'      => $test,
                'remaining' => 0,
            ]);
        }

        if ($test->getStatus() !== 'actif') {
            $this->addFlash('error', 'Ce test n\'est pas disponible.');
            return $this->redirectToRoute('front_test_list');
        }

        $questions = $test->getQuestions()->filter(function ($q) {
            return $q->getStatus() === 'actif';
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
        EntityManagerInterface $em,
        GeminiService $gemini,
        RateLimiterFactory $testSubmissionLimiter,
        ScoringService $scoringService
    ): Response {
        // ── RATE LIMITER ──
        $identifier = 'ip_' . $request->getClientIp();
        $limiter    = $testSubmissionLimiter->create($identifier);
        $limit      = $limiter->consume(1);

      if (!$limit->isAccepted()) {
            $retryAfter = $limit->getRetryAfter()->getTimestamp() - time();
            $minutes    = ceil($retryAfter / 60);

            return $this->render('front/tests/rate_limit.html.twig', [
                'minutes'   => $minutes,
                'test'      => $test,
                'remaining' => $limit->getRemainingTokens(),
            ]);
        }

        // ── TRAITEMENT ──
        $questions = $test->getQuestions()->filter(function ($q) {
            return $q->getStatus() === 'actif';
        });

        $totalScore        = 0;
        $maxScore          = 0;
        $reponsesData      = [];
        $questionsReponses = [];
        $sessionId         = $request->getSession()->getId();

        $emotionVisage = $request->getSession()->get('emotion_visage', null);

       foreach ($questions as $question) {
    $scoreMax     = $scoringService->getScoreMax($question);
    $maxScore    += $scoreMax;
    $reponseValue = $request->request->get('reponse_' . $question->getId());

    if ($reponseValue === null || $reponseValue === '') {
        continue;
    }

    $score       = $scoringService->calculerScore($question, $reponseValue);
    $totalScore += $score;

    $reponseText = is_array($reponseValue)
        ? implode(', ', $reponseValue)
        : $reponseValue;

    $reponsesData[] = [
        'question'   => $question,
        'reponse'    => $reponseText,
        'score'      => $score,
        'score_max'  => $scoreMax,   // ← ajouté
        'points_max' => $scoreMax,
    ];

    $questionsReponses[] = [
        'question' => $question->getTexte(),
        'reponse'  => $reponseText,
        'type'     => $question->getTypeQuestion(),
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

        $percentage     = $maxScore > 0 ? round(($totalScore / $maxScore) * 100) : 0;
        $interpretation = $this->getInterpretation($percentage, $totalScore, $maxScore);
        $badge      = $scoringService->calculerNiveauBadge($percentage);
$categories = $scoringService->calculerScoresParCategorie($reponsesData);


        // ── Appel Gemini ──
        $analyseGemini = $gemini->analyserReponses(
            $questionsReponses,
            $test->getTitre(),
            $emotionVisage
        );
        $motsCritiques = $gemini->detecterMotsCritiques($questionsReponses);
        $isCritique    = $motsCritiques || ($analyseGemini['niveau_risque'] ?? 'normal') === 'critique';

// 🚨 DEBUG
error_log('=== AVANT IF ===');
error_log('isCritique value: ' . ($isCritique ? 'true' : 'false'));

if ($isCritique) {
    error_log('=== DANS LE IF ===');
    $this->alerteService->creerAlerte($this->getUser(), $test, $questionsReponses);
    $this->addFlash('warning', '⚠️ Alerte critique détectée et envoyée à l\'administrateur !');
    error_log('=== FLASH AJOUTÉ ===');
} else {
    error_log('=== PAS DANS LE IF ===');
}

        if ($isCritique) {
    error_log('CRÉATION ALERTE - Début');
    try {
        $this->alerteService->creerAlerte(
              $this->getUser(),  // Pas d'utilisateur pour l'instant
            $test,
            $questionsReponses
        );
        error_log('CRÉATION ALERTE - Succès');
        error_log('=== DEBUG ALERTE ===');
error_log('isCritique: ' . ($isCritique ? 'true' : 'false'));
error_log('motsCritiques: ' . ($motsCritiques ? 'true' : 'false'));
error_log('niveau_risque: ' . ($analyseGemini['niveau_risque'] ?? 'normal'));
        $this->addFlash('warning', 'Une alerte critique a été détectée et signalée.');
    } catch (\Exception $e) {
        error_log('CRÉATION ALERTE - Erreur: ' . $e->getMessage());
    }
}
        // ── Sauvegarder pour le PDF ──
        $request->getSession()->set('rapport_test_' . $test->getId(), [
            'test'           => $test,
            'percentage'     => $percentage,
            'totalScore'     => $totalScore,
            'maxScore'       => $maxScore,
            'interpretation' => $interpretation,
            'gemini'         => $analyseGemini,
            'reponses'       => $reponsesData,
        ]);

        return $this->render('front/tests/result.html.twig', [
            'test'           => $test,
            'totalScore'     => $totalScore,
            'maxScore'       => $maxScore,
            'percentage'     => $percentage,
            'interpretation' => $interpretation,
            'reponses'       => $reponsesData,
            'gemini'         => $analyseGemini,
            'isCritique'     => $isCritique,
             'badge'          => $badge,
              'categories'     => $categories,

        ]);
    }

    #[Route('/{id}/analyse-visage', name: 'front_test_analyse_visage', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function analyseVisage(Request $request, FaceppService $facepp): JsonResponse
    {
        $data        = json_decode($request->getContent(), true);
        $base64Image = $data['image'] ?? '';

        if (empty($base64Image)) {
            return $this->json(['success' => false, 'message' => 'Aucune image reçue']);
        }

        $resultat = $facepp->analyserEmotion($base64Image);
        $request->getSession()->set('emotion_visage', $resultat);

        return $this->json($resultat);
    }

    #[Route('/{id}/pdf', name: 'front_test_pdf', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function telechargerPdf(
        Request $request,
        Test $test,
        PdfService $pdfService
    ): Response {
        $sessionData = $request->getSession()->get('rapport_test_' . $test->getId());

        if (!$sessionData) {
            $this->addFlash('error', 'Session expirée, veuillez refaire le test.');
            return $this->redirectToRoute('front_test_show', ['id' => $test->getId()]);
        }

        $pdfContent = $pdfService->genererRapportTest($sessionData);

        $response = new Response($pdfContent);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment; filename="rapport-' . $test->getId() . '-' . date('Y-m-d') . '.pdf"');

        return $response;
    }

    private function calculateScore($question, $reponseValue): int
    {
        if (empty($reponseValue)) return 0;
        if (is_array($reponseValue)) {
            return empty(array_filter($reponseValue)) ? 0 : $question->getPoints();
        }
        return $question->getPoints();
    }

    private function getInterpretation(int $percentage, int $totalScore, int $maxScore): array
    {
        if ($percentage >= 80) {
            return ['title' => '🌟 Excellent résultat !', 'description' => "Vous avez obtenu $totalScore points sur $maxScore. Votre profil montre un très bon équilibre psychologique.", 'advice' => 'Continuez à prendre soin de votre santé mentale.', 'color' => 'success', 'icon' => 'fa-star'];
        } elseif ($percentage >= 60) {
            return ['title' => '👍 Bon résultat', 'description' => "Vous avez obtenu $totalScore points sur $maxScore. Vous êtes sur la bonne voie.", 'advice' => 'Identifiez les domaines où vous pouvez progresser.', 'color' => 'info', 'icon' => 'fa-thumbs-up'];
        } elseif ($percentage >= 40) {
            return ['title' => '📊 Résultat moyen', 'description' => "Vous avez obtenu $totalScore points sur $maxScore. Certains aspects méritent votre attention.", 'advice' => 'Nous vous recommandons de participer à nos ateliers.', 'color' => 'warning', 'icon' => 'fa-chart-line'];
        } elseif ($percentage >= 20) {
            return ['title' => '🌱 Potentiel d\'amélioration', 'description' => "Vous avez obtenu $totalScore points sur $maxScore.", 'advice' => 'Consultez nos articles sur le bien-être.', 'color' => 'danger', 'icon' => 'fa-seedling'];
        } else {
            return ['title' => '💪 Besoin d\'accompagnement', 'description' => "Vous avez obtenu $totalScore points sur $maxScore.", 'advice' => 'Prenez rendez-vous avec un psychologue.', 'color' => 'danger', 'icon' => 'fa-heart'];
        }
    }
}