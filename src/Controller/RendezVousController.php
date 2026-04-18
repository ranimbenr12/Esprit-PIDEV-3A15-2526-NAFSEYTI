<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RendezVouRepository;
use App\Entity\ReservationrendezVou;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\NotificationrendezVou;
use App\Repository\FicheConsultationRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/rendez-vous', name: 'rdv_')]
class RendezVousController extends AbstractController
{
   #[Route('', name: 'index', methods: ['GET'])]
public function index(
    UserRepository $userRepository,
    RendezVouRepository $rendezVouRepository,
    EntityManagerInterface $em
): Response {
    $professionals = $userRepository->findByRoles(['psychologue', 'coach_vie']);
    //tableau vide 
    $slots = [];
    //On récupère tous les rendez-vous libres.
    foreach ($professionals as $pro) {
        $slots[$pro->getId()] = $rendezVouRepository->findBy([
            'medecin' => $pro,
            'statut'  => 'Pas encore pris',
        ]);
    }
    

    // Récupérer toutes les réservations existantes
    //“donne-moi toutes les réservations enregistrées dans la base de données”
    $reservations = $em->getRepository(ReservationrendezVou::class)->findAll();
    
    // Construire un tableau : rdv_id => [date1, date2, ...]
    $reservedDates = [];
    foreach ($reservations as $res) {
        if ($res->getDateRdv()) {
            $rdvId = $res->getRendezVous()->getId();
            $reservedDates[$rdvId][] = $res->getDateRdv()->format('Y-m-d');
        }
    }

    return $this->render('home/rendez_vous.html.twig', [
        'professionals'  => $professionals,
        'slots'          => $slots,
        'reservedDates'  => $reservedDates,
    ]);
}

    /**
     * Traitement du formulaire de réservation (soumis depuis le modal)
     */
    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        // Validation du token CSRF
        if (!$this->isCsrfTokenValid('rdv', $request->request->get('_token'))) {
            $this->addFlash('error', 'Token de sécurité invalide. Veuillez réessayer.');
            return $this->redirectToRoute('rdv_index');
        }

        // Récupération des données du formulaire
        $firstname = $request->request->get('firstname');
        $lastname  = $request->request->get('lastname');
        $email     = $request->request->get('email');
        $date      = $request->request->get('date');
        $time      = $request->request->get('time');
        $type      = $request->request->get('type');
        $motif     = $request->request->get('motif');
        $proName   = $request->request->get('pro_name');
        $proId     = $request->request->get('pro_id'); // optionnel si tu passes l'id

        // Ici tu peux persister un entity RendezVous si tu en as un
        // Exemple :
        // $rdv = new RendezVous();
        // $rdv->setFirstname($firstname);
        // $rdv->setLastname($lastname);
        // $rdv->setEmail($email);
        // $rdv->setDate(new \DateTime($date . ' ' . substr($time, 0, 5)));
        // $rdv->setType($type);
        // $rdv->setMotif($motif);
        // $rdv->setProName($proName);
        // $em->persist($rdv);
        // $em->flush();

        $this->addFlash('success', sprintf(
            'Votre rendez-vous avec %s a bien été enregistré pour le %s à %s.',
            $proName,
            (new \DateTime($date))->format('d/m/Y'),
            $time
        ));

        return $this->redirectToRoute('rdv_index');
    }


#[Route('/reserve', name: 'reserve', methods: ['POST'])]
//Request $request Permet de lire les données envoyées par le formulaire.
public function reserve(
    Request $request,
    EntityManagerInterface $em,
    UserRepository $userRepo,
    RendezVouRepository $rendezVouRepository
): Response {
    $user = $this->getUser(); // ← remplace par $this->getUser() quand auth OK
    $medecin = $userRepo->find($request->request->get('pro_id'));
    $rdv     = $rendezVouRepository->find($request->request->get('rdv_id'));

    if (!$user || !$medecin || !$rdv) {
        $this->addFlash('error', 'Données invalides.');
        return $this->redirectToRoute('rdv_index');
    }

    // ── Calculer la vraie date à partir du nom du jour ──
    // ── Lire la date choisie par le patient depuis le formulaire ──
$dateRdvStr = $request->request->get('date_rdv');
$dateRdv = $dateRdvStr
    ? new \DateTime($dateRdvStr)
    : $this->getProchainJour($rdv->getDateRendezVous()); // fallback si pas de date

    $patient = $this->getUser();

$reservation = new ReservationrendezVou();
$reservation->setUser($patient);
$reservation->setMedecin($medecin);
$reservation->setRendezVous($rdv);
$reservation->setDateReservation(new \DateTime());
$reservation->setDateRdv($dateRdv);

$em->persist($reservation);

$notif = new NotificationrendezVou();
$notif->setDestinataire($medecin);
$notif->setReservation($reservation);
$notif->setType('rdv');

$message = sprintf(
    '%s %s a demandé un rendez-vous le %s de %s à %s.',
    $patient->getFirstname(),
    $patient->getLastname(),
    $rdv->getDateRendezVous(),
    $rdv->getHeureDebut()->format('H:i'),
    $rdv->getHeureFin()->format('H:i')
);

$notif->setMessage($message);

$em->persist($notif);
$em->flush();
    

    $this->addFlash('success', 'Rendez-vous réservé avec succès !');
    return $this->redirectToRoute('rdv_index');
}
    /////////////////////////////
    //entitymanager permet de   sauvegarder modifier supprimer lire depuis la base
#[Route('/mes-reservations', name: 'mes_reservations', methods: ['GET'])]
public function mesReservations(
    EntityManagerInterface $em,
    UserRepository $userRepo
): JsonResponse {
    try {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse([], 401);
        }

        // ← Sans tri pour éviter l'erreur de nom de champ
        $reservations = $em->getRepository(ReservationrendezVou::class)->findBy(
            ['user' => $user]
        );

        // ← Debug : combien de réservations ?
        if (empty($reservations)) {
            return new JsonResponse(['debug' => 'aucune réservation pour user id=1', 'count' => 0]);
        }

        $data = [];
        foreach ($reservations as $res) {
            $medecin = $res->getMedecin();
            $rdv     = $res->getRendezVous();

            if (!$medecin || !$rdv) {
                continue;
            }

            $isCoach = $medecin->getRole() === 'coach_vie';
            $avatar = $medecin->getProfile_photo()
            ? '/' . $medecin->getProfile_photo()
            : 'https://ui-avatars.com/api/?name=' . urlencode($medecin->getFirstname() . ' ' . $medecin->getLastname())
            . '&background=' . ($isCoach ? '6D8B74' : '5F7161') . '&color=fff&size=100';

            $data[] = [
                'doctorName'   => $medecin->getFirstname() . ' ' . $medecin->getLastname(),
                'doctorRole'   => $isCoach ? 'Coach de vie' : 'Psychologue',
                'doctorAvatar' => $avatar,
                'date'         => $res->getDateRdv()?->format('d/m/Y') ?? '—',
                'jourNom'      => $rdv->getDateRendezVous() ?? '—',
                'debut'        => $rdv->getHeureDebut()?->format('H:i') ?? '—',
                'fin'          => $rdv->getHeureFin()?->format('H:i') ?? '—',
                'type'         => $rdv->getTypeSeance(),
                'reservedAt'   => $res->getDateReservation()?->format('d/m/Y à H:i') ?? '—',
                'userName'     => $user->getFirstname() . ' ' . $user->getLastname(),
                'statut'       => $res->getStatut() ?? 'attente',
            ];
        }

        return new JsonResponse($data);

    } catch (\Exception $e) {
        return new JsonResponse([
            'error'   => $e->getMessage(),
            'file'    => $e->getFile(),
            'line'    => $e->getLine(),
        ], 500);
    }
}
//transformer un jour comme “Lundi” en vraie date
private function getProchainJour(string $jourNom): \DateTime
{
    $jours = [
        'Lundi'    => 1,
        'Mardi'    => 2,
        'Mercredi' => 3,
        'Jeudi'    => 4,
        'Vendredi' => 5,
        'Samedi'   => 6,
        'Dimanche' => 0,
    ];

    $cible      = $jours[$jourNom] ?? 1;
    $aujourdhui = new \DateTime('today');
    $jourActuel = (int) $aujourdhui->format('w'); // 0=dim, 1=lun...

    $diff = ($cible - $jourActuel + 7) % 7;
    if ($diff === 0) $diff = 7; // toujours la semaine prochaine si même jour

    $date = clone $aujourdhui;
    $date->modify("+{$diff} days");

    return $date;
}


    #[Route('/videos-humeur', name: 'videos_humeur', methods: ['POST'])]
public function videosHumeur(
    Request $request,
    EntityManagerInterface $em,
    FicheConsultationRepository $ficheRepo,
    HttpClientInterface $httpClient
): JsonResponse {
    $patient = $this->getUser();

    // Récupérer la dernière fiche du patient
    $reservation = $em->getRepository(ReservationrendezVou::class)
        ->findOneBy(['user' => $patient], ['id' => 'DESC']);

    $diagnostic = '';
    $recommandations = '';

    if ($reservation) {
        $fiche = $ficheRepo->findOneBy(
            ['rendezVous' => $reservation->getRendezVous()],
            ['created_at' => 'DESC']
        );
        if ($fiche) {
            $diagnostic      = $fiche->getDiagnostic() ?? '';
            $recommandations = $fiche->getRecommandations() ?? '';
        }
    }

    $humeur = $request->request->get('humeur', 'stresse');
    $apiKey = $_ENV['OPENROUTER_API_KEY'] ?? '';

    $prompt = "Tu es un assistant bien-être pour étudiants en psychologie.
Humeur actuelle du patient : {$humeur}.
Diagnostic de sa dernière fiche : {$diagnostic}.
Recommandations du psy : {$recommandations}.

Propose 3 vidéos YouTube réelles et adaptées à son état.
Réponds UNIQUEMENT en JSON valide :
{
  \"conseil\": \"Un conseil court et bienveillant\",
  \"videos\": [
    {
      \"titre\": \"Titre de la vidéo\",
      \"url\": \"https://www.youtube.com/watch?v=XXXXX\",
      \"duree\": \"8 min\",
      \"tag\": \"Respiration\"
    }
  ]
}";

    try {
        $response = $httpClient->request('POST',
            'https://openrouter.ai/api/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'model'    => 'anthropic/claude-3.7-sonnet',
                'messages' => [
                    ['role' => 'system', 'content' => 'Réponds uniquement en JSON valide.'],
                    ['role' => 'user',   'content' => $prompt]
                ],
                'max_tokens'  => 800,
                'temperature' => 0.4,
            ]
        ]);

        $result   = $response->toArray();
        $jsonBrut = $result['choices'][0]['message']['content'] ?? '{}';
        $jsonBrut = preg_replace('/^```json\s*/i', '', trim($jsonBrut));
        $jsonBrut = preg_replace('/```$/', '', $jsonBrut);
        $data     = json_decode($jsonBrut, true);

        return new JsonResponse(['success' => true, 'data' => $data]);

    } catch (\Exception $e) {
        return new JsonResponse(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

   #[Route('/pros-proches', name: 'pros_proches', methods: ['GET'])]
public function prosProches(
    Request $request,
    UserRepository $userRepo,
    EntityManagerInterface $em
): JsonResponse {
    try {
        $lat   = (float) $request->query->get('lat');
        $lng   = (float) $request->query->get('lng');
        $rayon = (float) ($request->query->get('rayon', 50));

        $professionals = $userRepo->findByRoles(['psychologue', 'coach_vie']);
        $geoapifyKey   = '598a68002dde4d0f8efb17679aa53ea7';

        $data = [];
        foreach ($professionals as $pro) {
            $proLat = $pro->getLatitude();
            $proLng = $pro->getLongitude();

            // ── Auto-géocodage si coords manquantes ──
            if ((!$proLat || !$proLng) && $pro->getLocation()) {
                $geoUrl = 'https://api.geoapify.com/v1/geocode/search?text='
                    . urlencode($pro->getLocation())
                    . '&lang=fr&limit=1&apiKey=' . $geoapifyKey;

                $geoRes  = file_get_contents($geoUrl);
                $geoData = json_decode($geoRes, true);

                if (!empty($geoData['features'][0]['geometry']['coordinates'])) {
                    [$proLng, $proLat] = $geoData['features'][0]['geometry']['coordinates'];
                    $pro->setLatitude($proLat);
                    $pro->setLongitude($proLng);
                    $em->flush(); // ← sauvegarde en base pour la prochaine fois
                }
            }

            if (!$proLat || !$proLng) continue;

            $distance = $this->haversine($lat, $lng, $proLat, $proLng);

            if ($distance <= $rayon) {
                $isCoach = $pro->getRole() === 'coach_vie';
                $data[] = [
                    'id'       => $pro->getId(),
                    'name'     => $pro->getFirstname() . ' ' . $pro->getLastname(),
                    'role'     => $isCoach ? 'Coach de vie' : 'Psychologue',
                    'location' => $pro->getLocation(),
                    'lat'      => $proLat,
                    'lng'      => $proLng,
                    'distance' => round($distance, 1),
                    'avatar'   => $pro->getProfile_photo()
                        ? '/' . $pro->getProfile_photo()
                        : 'https://ui-avatars.com/api/?name=' . urlencode($pro->getFirstname() . ' ' . $pro->getLastname())
                          . '&background=' . ($isCoach ? '6D8B74' : '5F7161') . '&color=fff&size=100',
                ];
            }
        }

        usort($data, fn($a, $b) => $a['distance'] <=> $b['distance']);

        return new JsonResponse(['success' => true, 'data' => $data]);

    } catch (\Exception $e) {
        return new JsonResponse([
            'error' => $e->getMessage(),
            'file'  => $e->getFile(),
            'line'  => $e->getLine(),
        ], 500);
    }
}
//map
private function haversine(float $lat1, float $lng1, float $lat2, float $lng2): float
{
    $R = 6371; // Rayon Terre en km
    $dLat = deg2rad($lat2 - $lat1);
    $dLng = deg2rad($lng2 - $lng1);
    $a = sin($dLat/2) * sin($dLat/2)
       + cos(deg2rad($lat1)) * cos(deg2rad($lat2))
       * sin($dLng/2) * sin($dLng/2);
    return $R * 2 * atan2(sqrt($a), sqrt(1-$a));
}
}