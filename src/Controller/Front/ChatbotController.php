<?php
namespace App\Controller\Front;

use App\Entity\AlertesSuicide;
use App\Entity\ChatbotMessage;
use App\Entity\User;
use App\Service\MessageAnalyserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/chatbot')]
class ChatbotController extends AbstractController
{
    // ── Envoyer un message et obtenir une réponse ──────────────────────────
    #[Route('/send', name: 'chatbot_send', methods: ['POST'])]
    public function send(
        Request $request,
        EntityManagerInterface $em,
        MessageAnalyserService $analyser
    ): JsonResponse {
        /** @var User $user */
        $user = $this->getUser();
        if (!$user) return new JsonResponse(['error' => 'Non authentifié'], 401);

        $data    = json_decode($request->getContent(), true);
        $message = trim($data['message'] ?? '');
        if (!$message) return new JsonResponse(['error' => 'Message vide'], 400);

        // 1. Analyser le message
        $analyse = $analyser->analyser($message);
        $niveau  = $analyse['niveau'];
        $mots    = $analyse['mots_detectes'];

        // 2. Appel API pour la réponse chatbot
        $reponse = $this->callOpenRouter($message, $niveau);

        // 3. Sauvegarder le message
        $msg = new ChatbotMessage();
        $msg->setId_utilisateur($user->getId());
        $msg->setMessage_utilisateur($message);
        $msg->setReponse_chatbot($reponse);
        $msg->setDate_envoi(new \DateTime());
        $em->persist($msg);

        // 4. Traitement selon le niveau
        if ($niveau === 'critique') {
            // Créer une alerte suicide
            $alerte = new AlertesSuicide();
            $alerte->setUser($user);
            $alerte->setMessage($message);
            $alerte->setMots_detectes(implode(', ', $mots));
            $alerte->setDate_alerte(new \DateTime());
            $alerte->setTraite(false);
            $em->persist($alerte);

            // Notifier uniquement le psychologue assigné à cet étudiant
            $conn = $em->getConnection();
            $psyIds = $conn->fetchFirstColumn(
                'SELECT DISTINCT id_psychologue FROM suivis WHERE id_utilisateur = ? AND id_psychologue IS NOT NULL',
                [$user->getId()]
            );
            if (empty($psyIds)) {
                // Fallback : notifier tous les psychologues si aucun assigné
                $psyIds = $conn->fetchFirstColumn('SELECT id FROM users WHERE role = ?', ['psychologue']);
            }
            foreach ($psyIds as $psyId) {
                $conn->executeStatement(
                    'INSERT INTO notification (id_psychologue, id_patient, message, type, lu, date_creation) VALUES (?, ?, ?, ?, 0, NOW())',
                    [
                        $psyId,
                        $user->getId(),
                        '🚨 ALERTE CRITIQUE — ' . $user->getFirstname() . ' ' . $user->getLastname() . ' a envoyé un message préoccupant. Mots détectés : ' . implode(', ', $mots),
                        'critique',
                    ]
                );
            }
        } elseif ($niveau === 'urgent') {
            $conn = $em->getConnection();
            $psyIds = $conn->fetchFirstColumn(
                'SELECT DISTINCT id_psychologue FROM suivis WHERE id_utilisateur = ? AND id_psychologue IS NOT NULL',
                [$user->getId()]
            );
            if (empty($psyIds)) {
                $psyIds = $conn->fetchFirstColumn('SELECT id FROM users WHERE role = ?', ['psychologue']);
            }
            foreach ($psyIds as $psyId) {
                $conn->executeStatement(
                    'INSERT INTO notification (id_psychologue, id_patient, message, type, lu, date_creation) VALUES (?, ?, ?, ?, 0, NOW())',
                    [
                        $psyId,
                        $user->getId(),
                        '⚠️ URGENT — ' . $user->getFirstname() . ' ' . $user->getLastname() . ' semble en difficulté. Un rendez-vous est recommandé.',
                        'urgent',
                    ]
                );
            }
        }

        $em->flush();

        return new JsonResponse([
            'success' => true,
            'reponse' => $reponse,
            'niveau'  => $niveau,
            'id'      => $msg->getId_message(),
            'date'    => $msg->getDate_envoi()->format('H:i'),
        ]);
    }

    // ── Historique des conversations de l'étudiant ─────────────────────────
    #[Route('/history', name: 'chatbot_history', methods: ['GET'])]
    public function history(EntityManagerInterface $em): JsonResponse
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $conn = $em->getConnection();
        $rows = $conn->fetchAllAssociative(
            'SELECT id_message, message_utilisateur, reponse_chatbot, date_envoi
             FROM chatbot_messages WHERE id_utilisateur = ?
             ORDER BY date_envoi ASC LIMIT 50',
            [$user->getId()]
        );
        return new JsonResponse($rows);
    }

    // ── Conversations d'un étudiant (pour le psychologue) ─────────────────
    #[Route('/etudiant/{id}', name: 'chatbot_etudiant', methods: ['GET'])]
    public function etudiantMessages(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $rows = $conn->fetchAllAssociative(
            'SELECT id_message, message_utilisateur, reponse_chatbot, date_envoi
             FROM chatbot_messages WHERE id_utilisateur = ?
             ORDER BY date_envoi ASC',
            [$id]
        );
        return new JsonResponse($rows);
    }

    // ── Export conversation en texte ───────────────────────────────────────
    #[Route('/export/{id}', name: 'chatbot_export', methods: ['GET'])]
    public function export(int $id, EntityManagerInterface $em): Response
    {
        $conn = $em->getConnection();
        $rows = $conn->fetchAllAssociative(
            'SELECT m.message_utilisateur, m.reponse_chatbot, m.date_envoi,
                    u.firstname, u.lastname
             FROM chatbot_messages m
             JOIN users u ON u.id = m.id_utilisateur
             WHERE m.id_utilisateur = ?
             ORDER BY m.date_envoi ASC',
            [$id]
        );

        $nom = !empty($rows) ? $rows[0]['firstname'] . '_' . $rows[0]['lastname'] : 'etudiant';
        $content = "=== Conversation Chatbot — $nom ===\n\n";
        foreach ($rows as $r) {
            $date = (new \DateTime($r['date_envoi']))->format('d/m/Y H:i');
            $content .= "[$date] Étudiant : {$r['message_utilisateur']}\n";
            $content .= "[$date] Chatbot  : {$r['reponse_chatbot']}\n\n";
        }

        return new Response($content, 200, [
            'Content-Type'        => 'text/plain; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="conversation_' . $nom . '.txt"',
        ]);
    }

    // ── Appel API Gemini ───────────────────────────────────────────────────
    private function callOpenRouter(string $message, string $niveau = 'normal'): string
    {
        $apiKey = $_ENV['GEMINI_API_KEY'] ?? '';

        $systemPrompt = match($niveau) {
            'critique' => 'Tu es un assistant psychologique d\'urgence. L\'étudiant semble en grande détresse. Réponds avec beaucoup d\'empathie, encourage-le à appeler le 190 (urgences Tunisie) ou à contacter immédiatement son psychologue. Reste calme et rassurant.',
            'urgent'   => 'Tu es un assistant psychologique bienveillant. L\'étudiant semble en difficulté. Encourage-le à prendre rendez-vous avec son psychologue et à ne pas rester seul.',
            default    => 'Tu es un assistant psychologique bienveillant pour des étudiants universitaires tunisiens. Réponds en français, de façon empathique, concise et positive. Ne donne jamais de diagnostic médical.',
        };

        if (!$apiKey || $apiKey === 'your-gemini-api-key-here') {
            return $this->fallbackResponse($message, $niveau);
        }

        $payload = json_encode([
            'contents' => [
                [
                    'role'  => 'user',
                    'parts' => [['text' => $systemPrompt . "\n\nMessage de l'étudiant : " . $message]],
                ],
            ],
            'generationConfig' => [
                'maxOutputTokens' => 300,
                'temperature'     => 0.7,
            ],
        ]);

        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $apiKey;

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_TIMEOUT        => 20,
        ]);

        $result = curl_exec($ch);
        $err    = curl_error($ch);
        curl_close($ch);

        if ($err || !$result) return $this->fallbackResponse($message, $niveau);

        $data = json_decode($result, true);
        return $data['candidates'][0]['content']['parts'][0]['text']
            ?? $this->fallbackResponse($message, $niveau);
    }

    // ── Réponses de secours sans API ───────────────────────────────────────
    private function fallbackResponse(string $message, string $niveau = 'normal'): string
    {
        if ($niveau === 'critique') {
            return "Je t'entends, et je suis là pour toi. 💚 Tu n'es pas seul(e) dans ce que tu traverses. Ton psychologue sera informé et pourra t'accompagner. Prends soin de toi.";
        }
        if ($niveau === 'urgent') {
            return "Je comprends que tu passes par un moment difficile. 🌿 C'est courageux de l'exprimer. Ton psychologue est là pour t'aider — pense à prendre rendez-vous avec lui.";
        }

        $msg = mb_strtolower($message);

        if (str_contains($msg, 'déprim') || str_contains($msg, 'triste') || str_contains($msg, 'mal')) {
            return "Je t'entends, et ce que tu ressens est tout à fait valide. La tristesse fait partie de la vie, mais tu n'as pas à la traverser seul(e). Ton psychologue est là pour t'accompagner. 💚";
        }
        if (str_contains($msg, 'stress') || str_contains($msg, 'anxieux') || str_contains($msg, 'angoiss')) {
            return "Le stress peut être épuisant. Essaie de prendre 3 respirations profondes : inspire 4 secondes, retiens 4 secondes, expire 4 secondes. Ça aide vraiment à calmer le système nerveux. 🌬️";
        }
        if (str_contains($msg, 'étudi') || str_contains($msg, 'cours') || str_contains($msg, 'exam') || str_contains($msg, 'travail')) {
            return "Les études peuvent être intenses. Essaie de découper ton travail en petites tâches et de faire des pauses régulières. Tu fais de ton mieux, et c'est ce qui compte. 📚";
        }
        if (str_contains($msg, 'seul') || str_contains($msg, 'isolé') || str_contains($msg, 'personne')) {
            return "Se sentir seul(e) est difficile. Sache que tu n'es pas invisible — ton psychologue et cette plateforme sont là pour toi. N'hésite pas à prendre rendez-vous. 🤝";
        }
        if (str_contains($msg, 'fatigué') || str_contains($msg, 'épuisé') || str_contains($msg, 'dormir') || str_contains($msg, 'sommeil')) {
            return "Le manque de sommeil affecte vraiment l'humeur et la concentration. Essaie de te coucher à heure fixe et d'éviter les écrans 30 min avant de dormir. Ton corps a besoin de récupérer. 😴";
        }
        if (str_contains($msg, 'famille') || str_contains($msg, 'parent') || str_contains($msg, 'ami')) {
            return "Les relations peuvent être source de joie mais aussi de tension. Parler de ce que tu vis avec quelqu'un de confiance — comme ton psychologue — peut vraiment aider à y voir plus clair. 💬";
        }
        if (str_contains($msg, 'bonjour') || str_contains($msg, 'salut') || str_contains($msg, 'hello') || str_contains($msg, 'bonsoir')) {
            return "Bonjour ! Je suis ton assistant Nafseyti 🌿 Je suis là pour t'écouter et t'accompagner. Comment tu te sens aujourd'hui ?";
        }
        if (str_contains($msg, 'merci') || str_contains($msg, 'super') || str_contains($msg, 'bien')) {
            return "Je suis content(e) que tu ailles bien ! N'oublie pas de prendre soin de toi au quotidien. Je suis là si tu as besoin de parler. 😊";
        }
        if (str_contains($msg, 'envie') || str_contains($msg, 'motivation') || str_contains($msg, 'courage')) {
            return "Parfois la motivation fluctue, c'est tout à fait normal. Commence par une toute petite action — même 5 minutes de travail peuvent relancer l'élan. Tu es capable ! 💪";
        }

        // Réponses variées par défaut (rotation basée sur l'heure)
        $defaults = [
            "Je t'écoute. Peux-tu me dire un peu plus comment tu te sens en ce moment ? 🌿",
            "Merci de partager ça avec moi. Chaque émotion que tu ressens mérite d'être entendue. Comment puis-je t'aider ?",
            "Je suis là pour toi. Si tu veux parler de ce qui te préoccupe, n'hésite pas. Ton bien-être est important. 💚",
            "C'est courageux de s'exprimer. Ton psychologue peut aussi t'accompagner plus en profondeur — pense à prendre rendez-vous si tu en ressens le besoin.",
        ];
        return $defaults[(int)date('s') % count($defaults)];
    }
}
