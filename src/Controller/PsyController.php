<?php

namespace App\Controller;

use App\Entity\RendezVou;
use App\Entity\FicheConsultation;
use App\Repository\RendezVouRepository;
use App\Repository\FicheConsultationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ReservationrendezVou;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\NotificationrendezVouRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Nucleos\DompdfBundle\Factory\DompdfFactoryInterface;
use Nucleos\DompdfBundle\Wrapper\DompdfWrapperInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\CongeMaladieRepository;
use App\Entity\CongeMaladie;
// En haut, ajouter l'import :
use App\Service\GoogleCalendarService;
use App\Repository\ReservationrendezVouRepository;

#[Route('/psy', name: 'psy_')]
class PsyController extends AbstractController
{
    // ══════════════════════════════════════════════
    //  DASHBOARD PRINCIPAL
    // ══════════════════════════════════════════════
  
  #[Route('', name: 'dashboard', methods: ['GET'])]
public function dashboard(
    RendezVouRepository $rdvRepo,
    FicheConsultationRepository $ficheRepo,
    EntityManagerInterface $em,
    NotificationrendezVouRepository $notifRepo,
    PaginatorInterface $paginator,
    Request $request
): Response {
    $psy = $this->getUser();

    $mySlots = $rdvRepo->findBy(['medecin' => $psy]);

    // Liste complète pour les stats, sidebar, KPI, overview
    $myReservations = $em->getRepository(ReservationrendezVou::class)
                         ->findBy(['medecin' => $psy]);

    // Pagination des réservations pour la section "Rendez-vous reçus"
    $qbRes = $em->getRepository(ReservationrendezVou::class)
        ->createQueryBuilder('res')
        ->where('res.medecin = :psy')
        ->setParameter('psy', $psy)
        ->orderBy('res.id', 'DESC');

    $myReservationsPaginated = $paginator->paginate(
        $qbRes->getQuery(),
        $request->query->getInt('rdv_page', 1),
        6
    );

    $congesEnAttente = $em->getRepository(CongeMaladie::class)
    ->countEnAttenteByMedecin($psy->getId());


    $search = trim($request->query->get('search', ''));

    $qb = $ficheRepo->createQueryBuilder('f')
        ->join('f.rendezVous', 'r')
        ->join('App\Entity\ReservationrendezVou', 'res', 'WITH', 'res.rendezVous = r')
        ->join('res.user', 'u')
        ->where('r.medecin = :psy')
        ->setParameter('psy', $psy)
        ->orderBy('f.created_at', 'DESC');

    if ($search !== '') {
        $qb->andWhere(
            $qb->expr()->orX(
                $qb->expr()->like('LOWER(u.firstname)', ':search'),
                $qb->expr()->like('LOWER(u.lastname)',  ':search'),
                $qb->expr()->like(
                    "LOWER(CONCAT(u.firstname, ' ', u.lastname))",
                    ':search'
                )
            )
        )
        ->setParameter('search', '%' . strtolower($search) . '%');
    }

    $myFiches = $paginator->paginate(
        $qb->getQuery(),
        $request->query->getInt('page', 1),
        6
    );

    $notifications = $notifRepo->findBy(
        ['destinataire' => $psy],
        ['createdAt'    => 'DESC']
    );
    $notifCount = count(array_filter(
        $notifications,
        fn($n) => !$n->isLu()
    ));

    return $this->render('home/psy_dashboard.html.twig', [
        'mySlots'                 => $mySlots,
        'myReservations'          => $myReservations,
        'myReservationsPaginated' => $myReservationsPaginated,
        'myFiches'                => $myFiches,
        'notifications'           => $notifications,
        'notifCount'              => $notifCount,
        'search'                  => $search,
        'congesEnAttente' => $congesEnAttente,
    ]);
}
    // ══════════════════════════════════════════════
    //  GESTION DES CRÉNEAUX (SLOTS)
    // ══════════════════════════════════════════════

    // ── Créer un créneau ──
   #[Route('/slot/create', name: 'slot_create', methods: ['POST'])]
    public function createSlot(
        Request $request,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ): Response {
        $psy = $this->getUser();

        $slot = new RendezVou();
        $slot->setMedecin($psy);
        $slot->setDateRendezVous($request->request->get('dateRendezVous'));
        $slot->setTypeSeance($request->request->get('typeSeance'));
        $slot->setStatut($request->request->get('statut', 'Pas encore pris'));

        // vérifier avant DateTime
        $heureDebut = $request->request->get('heureDebut');
        $heureFin   = $request->request->get('heureFin');

        if (!empty($heureDebut)) {
            $slot->setHeureDebut(new \DateTime($heureDebut));
        }

        if (!empty($heureFin)) {
            $slot->setHeureFin(new \DateTime($heureFin));
        }

        $errors = $validator->validate($slot);

        if (count($errors) > 0) {
            $fieldErrors = [];

            foreach ($errors as $error) {
                $field = $error->getPropertyPath(); // ex: heureDebut
                $fieldErrors[$field] = $error->getMessage();
            }

            // récupérer les données du dashboard
            $mySlots = $em->getRepository(RendezVou::class)
                ->findBy(['medecin' => $psy]);

            $myReservations = $em->getRepository(ReservationrendezVou::class)
                ->findBy(['medecin' => $psy]);

            $myFiches = $em->getRepository(FicheConsultation::class)
                ->findBy(
                    ['rendezVous' => $mySlots],
                    ['created_at' => 'DESC']
                );

            return $this->render('home/psy_dashboard.html.twig', [
                'mySlots'         => $mySlots,
                'myReservations'  => $myReservations,
                'myFiches'        => $myFiches,
                'fieldErrors'     => $fieldErrors,
                'showCreateModal' => true,
            ]);
        }

        $em->persist($slot);
        $em->flush();

        $this->addFlash('success', 'Créneau ajouté avec succès.');
        return $this->redirect(
    $this->generateUrl('psy_dashboard', [
        'section' => 'horaires'
    ])
);
    }
    // ── Modifier un créneau ──
    #[Route('/slot/{id}/edit', name: 'slot_edit', methods: ['POST'])]
    public function editSlot(
        int $id,
        Request $request,
        RendezVouRepository $rdvRepo,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ): Response {
        $psy  = $this->getUser();
        $slot = $rdvRepo->find($id);

        if (!$slot || $slot->getMedecin() !== $psy) {
            $this->addFlash('error', 'Créneau introuvable ou accès refusé.');
            return $this->redirectToRoute('psy_dashboard');
        }

        $slot->setDateRendezVous($request->request->get('dateRendezVous'));
        $slot->setTypeSeance($request->request->get('typeSeance'));
        $slot->setStatut($request->request->get('statut', 'Pas encore pris'));

        $heureDebut = $request->request->get('heureDebut');
        $heureFin   = $request->request->get('heureFin');

        if (!empty($heureDebut)) {
            $slot->setHeureDebut(new \DateTime($heureDebut));
        } else {
            $slot->setHeureDebut(null);
        }

        if (!empty($heureFin)) {
            $slot->setHeureFin(new \DateTime($heureFin));
        } else {
            $slot->setHeureFin(null);
        }

        $errors = $validator->validate($slot);

       if (count($errors) > 0) {
        $fieldErrorsEdit = [];
        foreach ($errors as $error) {
            $fieldErrorsEdit[$error->getPropertyPath()] = $error->getMessage();
        }

        $mySlots        = $rdvRepo->findBy(['medecin' => $psy]);
        $myReservations = $em->getRepository(ReservationrendezVou::class)->findBy(['medecin' => $psy]);
        $myFiches       = $em->getRepository(FicheConsultation::class)
                            ->findBy(['rendezVous' => $mySlots], ['created_at' => 'DESC']);

        return $this->render('home/psy_dashboard.html.twig', [
            'mySlots'         => $mySlots,
            'myReservations'  => $myReservations,
            'myFiches'        => $myFiches,
            'fieldErrorsEdit' => $fieldErrorsEdit,
            'showEditModal'   => true,
            'editSlot'        => $slot,      // ← pour pré-remplir les champs
        ]);
    }

        $em->flush();

        $this->addFlash('success', 'Créneau mis à jour.');
              return $this->redirect(
    $this->generateUrl('psy_dashboard', [
        'section' => 'horaires'
    ])
);
    }

    // ── Supprimer un créneau ──
    #[Route('/slot/{id}/delete', name: 'slot_delete', methods: ['POST'])]
    public function deleteSlot(
        int $id,
        RendezVouRepository $rdvRepo,
        EntityManagerInterface $em
    ): Response {
        $psy  = $this->getUser();
        $slot = $rdvRepo->find($id);

        if (!$slot || $slot->getMedecin() !== $psy) {
            $this->addFlash('error', 'Créneau introuvable ou accès refusé.');
            return $this->redirectToRoute('psy_dashboard');
        }

        $em->remove($slot);
        $em->flush();

        $this->addFlash('success', 'Créneau supprimé.');
               return $this->redirect(
    $this->generateUrl('psy_dashboard', [
        'section' => 'horaires'
    ])
);
    }

    // ══════════════════════════════════════════════
    //  GESTION DES FICHES DE CONSULTATION
    // ══════════════════════════════════════════════

    // ── Créer une fiche ──
   #[Route('/fiche/create', name: 'fiche_create', methods: ['POST'])]
public function createFiche(
    Request $request,
    EntityManagerInterface $em,
    ValidatorInterface $validator,
    RendezVouRepository $rdvRepo,
    FicheConsultationRepository $ficheRepo
): Response {
    $psy = $this->getUser();

    $rdvId = $request->request->get('rendezVous');

    $rdv = $em->getRepository(RendezVou::class)->find($rdvId);

    $fiche = new FicheConsultation();
    $fiche->setRendezVous($rdv);
    $fiche->setNotes($request->request->get('notes'));
    $fiche->setProblemePrincipal($request->request->get('probleme_principal'));
    $fiche->setDiagnostic($request->request->get('diagnostic'));
    $fiche->setRecommandations($request->request->get('recommandations'));
    $fiche->setTraitement($request->request->get('traitement'));
    $fiche->setCreatedAt(new \DateTime());

    $errors = $validator->validate($fiche);

    if (count($errors) > 0) {
        $ficheErrors = [];

        foreach ($errors as $error) {
            $ficheErrors[$error->getPropertyPath()] = $error->getMessage();
        }

        $mySlots = $rdvRepo->findBy(['medecin' => $psy]);

        $myReservations = $em->getRepository(ReservationrendezVou::class)
            ->findBy(['medecin' => $psy]);

        $myFiches = $ficheRepo->findBy(
            ['rendezVous' => $mySlots],
            ['created_at' => 'DESC']
        );

        return $this->render('home/psy_dashboard.html.twig', [
            'mySlots'         => $mySlots,
            'myReservations'  => $myReservations,
            'myFiches'        => $myFiches,
            'ficheErrors'     => $ficheErrors,
            'showCreateFiche' => true,
            'ficheOldInput'   => $request->request->all(),
        ]);
    }

    $em->persist($fiche);
    $em->flush();

    $this->addFlash('success', 'Fiche créée avec succès.');

    return $this->redirect(
    $this->generateUrl('psy_dashboard', [
        'section' => 'fiches'
    ])
);
}
    // ── Modifier une fiche ──
    #[Route('/fiche/{id}/edit', name: 'fiche_edit', methods: ['POST'])]
public function editFiche(
    int $id,
    Request $request,
    FicheConsultationRepository $ficheRepo,
    EntityManagerInterface $em,
    ValidatorInterface $validator
): Response {
    $psy   = $this->getUser();
    $fiche = $ficheRepo->find($id);

    if (!$fiche || $fiche->getRendezVous()->getMedecin() !== $psy) {
        $this->addFlash('error', 'Fiche introuvable ou accès refusé.');
        return $this->redirectToRoute('psy_dashboard');
    }

    $fiche->setProblemePrincipal($request->request->get('probleme_principal'));
    $fiche->setNotes($request->request->get('notes'));
    $fiche->setDiagnostic($request->request->get('diagnostic'));
    $fiche->setTraitement($request->request->get('traitement'));
    $fiche->setRecommandations($request->request->get('recommandations'));

    $errors = $validator->validate($fiche);

    if (count($errors) > 0) {
    $ficheErrorsEdit = [];

    foreach ($errors as $error) {
        $ficheErrorsEdit[$error->getPropertyPath()] = $error->getMessage();
    }

    $mySlots = $em->getRepository(RendezVou::class)
        ->findBy(['medecin' => $psy]);

    $myReservations = $em->getRepository(ReservationrendezVou::class)
        ->findBy(['medecin' => $psy]);

    $myFiches = $ficheRepo->findBy(
        ['rendezVous' => $mySlots],
        ['created_at' => 'DESC']
    );

    return $this->render('home/psy_dashboard.html.twig', [
        'mySlots'          => $mySlots,
        'myReservations'   => $myReservations,
        'myFiches'         => $myFiches,
        'ficheErrorsEdit'  => $ficheErrorsEdit,
        'showEditFiche'    => true,
        'editFiche'        => $fiche
    ]);
}
    $em->flush();

    $this->addFlash('success', 'Fiche mise à jour avec succès.');
    return $this->redirect(
    $this->generateUrl('psy_dashboard', [
        'section' => 'fiches'
    ])
);
}

    // ── Supprimer une fiche ──
    #[Route('/fiche/{id}/delete', name: 'fiche_delete', methods: ['POST'])]
    public function deleteFiche(
        int $id,
        FicheConsultationRepository $ficheRepo,
        EntityManagerInterface $em
    ): Response {
        $psy   = $this->getUser();
        $fiche = $ficheRepo->find($id);

        if (!$fiche || $fiche->getRendezVous()->getMedecin() !== $psy) {
            $this->addFlash('error', 'Fiche introuvable ou accès refusé.');
            return $this->redirectToRoute('psy_dashboard');
        }

        $em->remove($fiche);
        $em->flush();

        $this->addFlash('success', 'Fiche supprimée.');
       return $this->redirect(
    $this->generateUrl('psy_dashboard', [
        'section' => 'fiches'
    ])
);
    }

 #[Route('/fiche/{id}/pdf', name: 'fiche_pdf', methods: ['GET'])]
public function fichePdf(
    int $id,
    FicheConsultationRepository $ficheRepo,
    DompdfWrapperInterface $dompdf
): Response {
    $psy   = $this->getUser();
    $fiche = $ficheRepo->find($id);

    if (!$fiche || $fiche->getRendezVous()->getMedecin() !== $psy) {
        throw $this->createNotFoundException('Fiche introuvable.');
    }

    $html = $this->renderView('home/psy_fiche_pdf.html.twig', [
        'fiche' => $fiche,
        'psy'   => $psy,
    ]);

    return $dompdf->getStreamResponse($html, 'fiche-' . $id . '.pdf', [
        'Attachment' => false,
    ]);
}
  #[Route('/reservation/{id}/statut', name: 'reservation_statut', methods: ['POST'])]
public function updateStatut(
    int $id,
    Request $request,
    EntityManagerInterface $em
): JsonResponse {
    try {
        $data   = json_decode($request->getContent(), true);
        $statut = $data['statut'] ?? null;

        if (!in_array($statut, ['confirme', 'annule'])) {
            return new JsonResponse(['success' => false, 'message' => 'Statut invalide'], 400);
        }

        $reservation = $em->getRepository(ReservationrendezVou::class)->find($id);

        if (!$reservation) {
            return new JsonResponse(['success' => false, 'message' => 'Réservation introuvable'], 404);
        }

        $psy = $this->getUser();
        if ($reservation->getMedecin() !== $psy) {
            return new JsonResponse(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        $reservation->setStatut($statut);
        $em->flush();

        // ── Envoi SMS si confirmé ──
        if ($statut === 'confirme') {
            $patient = $reservation->getUser();
            $rdv     = $reservation->getRendezVous();

            /*
            // ── DÉCOMMENTER POUR ACTIVER L'ENVOI SMS ──
            $telephone = $patient->getPhone_number();

            if ($telephone) {
                try {
                    $date  = $reservation->getDateRdv()?->format('d/m/Y') ?? '';
                    $heure = $rdv->getHeureDebut()?->format('H:i') ?? '';
                    $type  = $rdv->getTypeSeance() === 'en_ligne' ? 'En ligne' : 'Présentiel';

                    $body = "Bonjour {$patient->getFirstname()}, "
                          . "votre rendez-vous du {$date} a {$heure} ({$type}) est confirme. "
                          . "Merci de votre confiance.";

                    $twilio = new \Twilio\Rest\Client(
                        $_ENV['TWILIO_ACCOUNT_SID'],
                        $_ENV['TWILIO_AUTH_TOKEN']
                    );

                    $twilio->messages->create(
                        $telephone,
                        ['from' => $_ENV['TWILIO_PHONE'], 'body' => $body]
                    );

                } catch (\Exception $e) {
                    // SMS échoué, on continue quand même
                }
            }
            // ── FIN BLOC SMS ──
            */

            return new JsonResponse(['success' => true, 'statut' => $statut]);
        }

        return new JsonResponse(['success' => true, 'statut' => $statut]);

    } catch (\Exception $e) {
        return new JsonResponse([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}
     // ══════════════════════════════════════════════
    //  NOTIFICATIONS
    // ══════════════════════════════════════════════

    #[Route('/notification/{id}/lue', name: 'notification_lue', methods: ['POST'])]
    public function marquerLue(
        int $id,
        EntityManagerInterface $em,
        NotificationrendezVouRepository $notifRepo
    ): JsonResponse {
        $notif = $notifRepo->find($id);
        $psy   = $this->getUser();

        if (!$notif || $notif->getDestinataire() !== $psy) {
            return new JsonResponse(['success' => false], 403);
        }

        $notif->setLu(true);
        $em->flush();

        return new JsonResponse(['success' => true]);
    }

    #[Route('/notifications/tout-lire', name: 'notifications_tout_lire', methods: ['POST'])]
    public function toutMarquerLu(
        EntityManagerInterface $em,
        NotificationrendezVouRepository $notifRepo
    ): JsonResponse {
        $psy    = $this->getUser();
        $notifs = $notifRepo->findNonLues($psy->getId());

        foreach ($notifs as $n) {
            $n->setLu(true);
        }
        $em->flush();

        return new JsonResponse(['success' => true]);
    }

  #[Route('/fiche/{id}/traduire', name: 'fiche_traduire', methods: ['POST'])]
public function traduireFiche(
    int $id,
    Request $request,
    FicheConsultationRepository $ficheRepo
): JsonResponse {
    $psy   = $this->getUser();
    $fiche = $ficheRepo->find($id);

    if (!$fiche || $fiche->getRendezVous()->getMedecin() !== $psy) {
        return new JsonResponse(['success' => false, 'message' => 'Accès refusé'], 403);
    }

    // Mapping langue → code ISO
    $langues = [
        'arabe'    => 'ar',
        'anglais'  => 'en',
        'français' => 'fr',
        'espagnol' => 'es',
        'allemand' => 'de',
    ];

    $langue     = $request->request->get('langue', 'arabe');
    $codeLangue = $langues[$langue] ?? 'ar';

    try {
        $tr = new GoogleTranslate($codeLangue);

       $traduction = [
        'probleme_principal' => $tr->translate($fiche->getProblemePrincipal()),
        'notes'              => $tr->translate($fiche->getNotes()),
        'diagnostic'         => $tr->translate($fiche->getDiagnostic()),
        'traitement'         => $tr->translate($fiche->getTraitement()),
        'recommandations'    => $tr->translate($fiche->getRecommandations()),

        // ← Ajouter les titres traduits
        'titre_probleme'       => $tr->translate('Problème principal'),
        'titre_notes'          => $tr->translate('Notes cliniques'),
        'titre_diagnostic'     => $tr->translate('Diagnostic'),
        'titre_traitement'     => $tr->translate('Traitement'),
        'titre_recommandations'=> $tr->translate('Recommandations'),
    ];
        return new JsonResponse(['success' => true, 'traduction' => $traduction]);

    } catch (\Exception $e) {
        return new JsonResponse(['success' => false, 'message' => $e->getMessage()], 500);
    }
}
   #[Route('/ia/analyse-patient', name: 'ia_analyse_patient', methods: ['POST'])]
public function iaAnalysePatient(
    Request $request,
    EntityManagerInterface $em,
    FicheConsultationRepository $ficheRepo,
    HttpClientInterface $httpClient
): JsonResponse {
    // ── 1. Authentification ──
    $psy = $this->getUser();

    if (!$psy) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Non authentifié'
        ], 401);
    }

    // ── 2. Paramètre ──
    $data = json_decode($request->getContent(), true);
    $nomRecherche = trim($data['patient'] ?? '');

    if (!$nomRecherche) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Nom du patient requis'
        ], 400);
    }

    // ── 3. Recherche des fiches du patient ──
    $reservations = $em->getRepository(ReservationrendezVou::class)
        ->findBy(['medecin' => $psy]);

    $fichesPatient = [];
    $patientTrouve = null;
    $mots = array_filter(explode(' ', strtolower($nomRecherche)));

    foreach ($reservations as $res) {
        $user = $res->getUser();
        $fullName = strtolower(
            trim($user->getFirstname() . ' ' . $user->getLastname())
        );

        $match = true;

        foreach ($mots as $mot) {
            if (!str_contains($fullName, $mot)) {
                $match = false;
                break;
            }
        }

        if (!$match) {
            continue;
        }

        $patientTrouve = $user->getFirstname() . ' ' . $user->getLastname();

        $rdv = $res->getRendezVous();
        if (!$rdv) {
            continue;
        }

        $fiches = $ficheRepo->findBy(
            ['rendezVous' => $rdv],
            ['created_at' => 'ASC']
        );

        foreach ($fiches as $f) {
            $fichesPatient[] = $f;
        }
    }

    if (!$patientTrouve) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Patient introuvable : ' . $nomRecherche
        ], 404);
    }

    if (empty($fichesPatient)) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Aucune fiche trouvée pour ce patient'
        ], 404);
    }

    // ── 4. Construire le contexte ──
    $contexte = '';
    $dates = [];

    foreach ($fichesPatient as $i => $f) {
        $dateStr = $f->getCreatedAt()
            ? $f->getCreatedAt()->format('d/m/Y')
            : 'Date inconnue';

        $dates[] = $f->getCreatedAt();

        $contexte .= "\n\n--- FICHE #" . ($i + 1) . " du $dateStr ---\n";

        if ($f->getProblemePrincipal()) {
            $contexte .= "Problème principal : " . $f->getProblemePrincipal() . "\n";
        }

        if ($f->getDiagnostic()) {
            $contexte .= "Diagnostic : " . $f->getDiagnostic() . "\n";
        }

        if ($f->getNotes()) {
            $contexte .= "Notes cliniques : " . $f->getNotes() . "\n";
        }

        if ($f->getTraitement()) {
            $contexte .= "Traitement : " . $f->getTraitement() . "\n";
        }

        if ($f->getRecommandations()) {
            $contexte .= "Recommandations : " . $f->getRecommandations() . "\n";
        }
    }

    // ── 5. Durée du suivi (CORRIGÉE) ──
$dateMin = null;
$dateMax = null;

foreach ($dates as $d) {
    if (!$d) {
        continue;
    }

    if (!$dateMin || $d < $dateMin) {
        $dateMin = $d;
    }

    if (!$dateMax || $d > $dateMax) {
        $dateMax = $d;
    }
}

$dureeTexte = '';

if ($dateMin && $dateMax) {
    if ($dateMin == $dateMax) {
        // Une seule fiche
        $dureeTexte = 'Première consultation';
    } else {
        $diff = $dateMin->diff($dateMax);
        
        if ($diff->y > 0) {
            $dureeTexte = $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
        } elseif ($diff->m > 0) {
            $dureeTexte = $diff->m . ' mois';
        } elseif ($diff->d >= 7) {
            $semaines = floor($diff->d / 7);
            $dureeTexte = $semaines . ' semaine' . ($semaines > 1 ? 's' : '');
        } elseif ($diff->d > 0) {
            $dureeTexte = $diff->d . ' jour' . ($diff->d > 1 ? 's' : '');
        } else {
            $dureeTexte = 'Même jour';
        }
    }
}

// Si toujours vide, mettre une valeur par défaut
if (!$dureeTexte) {
    $dureeTexte = count($fichesPatient) . ' consultation' . (count($fichesPatient) > 1 ? 's' : '');
}

    // ── 6. Prompt IA ──
    $prompt = <<<PROMPT
Tu es un assistant clinique aidant un psychologue à analyser l'évolution d'un patient.

Voici les fiches de consultation du patient "{$patientTrouve}" dans l'ordre chronologique :

{$contexte}

Analyse ces fiches et réponds UNIQUEMENT en JSON valide avec cette structure exacte :

{
  "evolution": {
    "type": "positive",
    "label": "En amélioration",
    "score": "+72%"
  },
  "tendances": [
    { "symptome": "Anxiété", "type": "pos", "label": "En régression" }
  ],
  "synthese": "Synthèse clinique objective",
  "recommandations": [
    "Première recommandation",
    "Deuxième recommandation",
    "Troisième recommandation"
  ]
}

Réponds uniquement en JSON.
PROMPT;

    // ── 7. Appel OpenRouter ──
    try {
        $apiKey = $_ENV['OPENROUTER_API_KEY'] ?? getenv('OPENROUTER_API_KEY');

        if (!$apiKey) {
            throw new \RuntimeException('OPENROUTER_API_KEY non configurée');
        }

        $response = $httpClient->request(
            'POST',
            'https://openrouter.ai/api/v1/chat/completions',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                    'HTTP-Referer' => 'http://localhost',
                    'X-Title' => 'Psy Dashboard AI',
                ],
                'json' => [
                    'model' => 'anthropic/claude-3.7-sonnet',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Tu es un assistant clinique expert. Réponds uniquement en JSON valide.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => 0.3,
                    'max_tokens' => 1200
                ]
            ]
        );

        $result = $response->toArray();

        $jsonBrut = $result['choices'][0]['message']['content'] ?? '';

        $jsonBrut = trim($jsonBrut);
        $jsonBrut = preg_replace('/^```json\s*/i', '', $jsonBrut);
        $jsonBrut = preg_replace('/```$/', '', $jsonBrut);

        $analyse = json_decode($jsonBrut, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException(
                'Réponse IA invalide : ' . $jsonBrut
            );
        }

        return new JsonResponse([
            'success' => true,
            'patient' => $patientTrouve,
            'fichesCount' => count($fichesPatient),
            'duree' => $dureeTexte,
            'evolution' => $analyse['evolution'] ?? [
                'type' => 'stable',
                'label' => '—',
                'score' => '—'
            ],
            'tendances' => $analyse['tendances'] ?? [],
            'synthese' => $analyse['synthese'] ?? '',
            'recommandations' => $analyse['recommandations'] ?? [],
        ]);

    } catch (\Exception $e) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Erreur OpenRouter : ' . $e->getMessage(),
        ], 500);
    }
}

        // ══════════════════════════════════════════════
//  GOOGLE CALENDAR
// ══════════════════════════════════════════════

#[Route('/google/connect', name: 'google_connect', methods: ['GET'])]
public function googleConnect(GoogleCalendarService $gcal, Request $request): Response
{
    // Sauvegarder la page d'origine
    $request->getSession()->set('google_referer', $request->headers->get('referer'));
    return $this->redirect($gcal->getAuthUrl());
}

#[Route('/google/callback', name: 'google_callback', methods: ['GET'])]
public function googleCallback(
    Request $request,
    GoogleCalendarService $gcal,
    EntityManagerInterface $em
): Response {
    $code  = $request->query->get('code');
    $error = $request->query->get('error');

    if ($error || !$code) {
        $this->addFlash('error', 'Connexion Google annulée.');
        return $this->redirectToRoute('psy_dashboard');
    }

    $token = $gcal->fetchAccessToken($code);

    if (isset($token['error'])) {
        $this->addFlash('error', 'Erreur Google : ' . $token['error']);
        return $this->redirectToRoute('psy_dashboard');
    }

    // ✅ Stocker en BDD au lieu de la session
    $psy = $this->getUser();
    $psy->setGoogleCalendarToken($token);
    $em->flush();

    $this->addFlash('success', '✅ Google Calendar connecté avec succès !');
    return $this->redirectToRoute('psy_dashboard', ['section' => 'rendez-vous']);
}
//calendrier + twilio dans confirmer
#[Route('/reservation/{id}/sync-calendar', name: 'reservation_sync_calendar', methods: ['POST'])]
public function syncToCalendar(
    int $id,
    Request $request,
    EntityManagerInterface $em,
    GoogleCalendarService $gcal
): JsonResponse {
    $psy         = $this->getUser();
    $reservation = $em->getRepository(ReservationrendezVou::class)->find($id);

    if (!$reservation || $reservation->getMedecin() !== $psy) {
        return new JsonResponse(['success' => false, 'message' => 'Non autorisé'], 403);
    }

    // ✅ Lire depuis la BDD au lieu de la session
    $token = $psy->getGoogleCalendarToken();

    if (!$token) {
        return new JsonResponse([
            'success'   => false,
            'need_auth' => true,
            'auth_url'  => $this->generateUrl('psy_google_connect'),
            'message'   => 'Connexion Google requise',
        ], 401);
    }

    $rdv     = $reservation->getRendezVous();
    $patient = $reservation->getUser();

    // ✅ Utiliser la vraie date de réservation du patient
    $dateRdv = $reservation->getDateRdv();
    $dateFormatted = $dateRdv instanceof \DateTimeInterface
        ? $dateRdv->format('Y-m-d')
        : date('Y-m-d');

    $summary = sprintf(
        '🧠 Consultation : %s %s',
        $patient->getFirstname(),
        $patient->getLastname()
    );

    $description = sprintf(
        "Patient : %s %s\nEmail : %s\nType : %s\nStatut : Confirmé",
        $patient->getFirstname(),
        $patient->getLastname(),
        $patient->getEmail(),
        $rdv->getTypeSeance() === 'en_ligne' ? 'En ligne' : 'Présentiel'
    );

    try {
        $heureDebut = $rdv->getHeureDebut()?->format('H:i:s') ?? '09:00:00';
        $heureFin   = $rdv->getHeureFin()?->format('H:i:s')   ?? '10:00:00';

        $eventId = $gcal->createEvent(
            token:        $token,
            summary:      $summary,
            description:  $description,
            date:         $dateFormatted,
            heureDebut:   $heureDebut,
            heureFin:     $heureFin,
            type:         $rdv->getTypeSeance(),
            patientEmail: $patient->getEmail(),
            psyEmail:     $psy->getEmail(),
        );
    $reservation->setGoogleEventId($eventId);
    $em->flush(); // ← persister

 return new JsonResponse([
    'success'    => true,
    'event_id'   => $eventId,
    'event_link' => 'https://calendar.google.com/calendar/u/0/r/day/' 
        . $dateRdv->format('Y') . '/' 
        . $dateRdv->format('m') . '/' 
        . $dateRdv->format('d'),
    'message'    => 'Événement ajouté à Google Calendar !',
]);

    } catch (\Exception $e) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Erreur : ' . $e->getMessage(),
        ], 500);
    }
}
}