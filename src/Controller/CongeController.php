<?php

namespace App\Controller;

use App\Entity\CongeMaladie;
use App\Entity\NotificationrendezVou;
use App\Repository\CongeMaladieRepository;
use App\Repository\FicheConsultationRepository;
use App\Repository\UserRepository;
use App\Repository\RendezVouRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ReservationrendezVou;
use Knp\Component\Pager\PaginatorInterface;
// Ajouter cet import en haut du fichier
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/conge', name: 'conge_')]
class CongeController extends AbstractController
{
    // ══════════════════════════════════════════════
    //  PATIENT : Soumettre une demande de congé
    // ══════════════════════════════════════════════

    /**
     * Vérifie si le patient a au moins une fiche de consultation
     * avec ce psychologue avant d'autoriser la demande.
     */
    #[Route('/check-eligibilite/{psyId}', name: 'check_eligibilite', methods: ['GET'])]
    public function checkEligibilite(
        int $psyId,
        EntityManagerInterface $em,
        FicheConsultationRepository $ficheRepo,
        UserRepository $userRepo
    ): JsonResponse {
        $patient = $this->getUser();

        if (!$patient) {
            return new JsonResponse(['eligible' => false, 'message' => 'Non authentifié'], 401);
        }

        $psy = $userRepo->find($psyId);
        if (!$psy) {
            return new JsonResponse(['eligible' => false, 'message' => 'Psychologue introuvable'], 404);
        }

        // Le patient doit avoir au moins une réservation confirmée avec ce psy
        // ET cette réservation doit avoir une fiche de consultation
        $reservations = $em->getRepository(ReservationrendezVou::class)->findBy([
            'user'    => $patient,
            'medecin' => $psy,
            'statut'  => 'confirme',
        ]);

        if (empty($reservations)) {
            return new JsonResponse([
                'eligible' => false,
                'message'  => 'Vous devez avoir au moins une consultation confirmée avec ce professionnel pour faire une demande de congé maladie.',
            ]);
        }

        // Vérifier qu'au moins une fiche existe pour ces RDV
        $ficheExiste = false;
        foreach ($reservations as $res) {
            $fiches = $ficheRepo->findBy(['rendezVous' => $res->getRendezVous()]);
            if (!empty($fiches)) {
                $ficheExiste = true;
                break;
            }
        }

        if (!$ficheExiste) {
            return new JsonResponse([
                'eligible' => false,
                'message'  => 'Aucune fiche de consultation trouvée. Votre psychologue doit avoir créé au moins une fiche pour vous.',
            ]);
        }

        // Vérifier qu'il n'y a pas déjà une demande en attente avec ce psy
        $demandeEnAttente = $em->getRepository(CongeMaladie::class)->findOneBy([
            'patient' => $patient,
            'medecin' => $psy,
            'statut'  => 'en_attente',
        ]);

        if ($demandeEnAttente) {
            return new JsonResponse([
                'eligible' => false,
                'message'  => 'Vous avez déjà une demande en attente avec ce professionnel.',
            ]);
        }

        return new JsonResponse(['eligible' => true, 'psyName' => $psy->getFirstname() . ' ' . $psy->getLastname()]);
    }

    /**
     * Soumettre une demande de congé maladie (patient)
     */
    #[Route('/soumettre', name: 'soumettre', methods: ['POST'])]
    public function soumettre(
        Request $request,
        EntityManagerInterface $em,
        UserRepository $userRepo,
        MailerInterface $mailer
    ): JsonResponse {
        $patient = $this->getUser();

        if (!$patient) {
            return new JsonResponse(['success' => false, 'message' => 'Non authentifié'], 401);
        }

        $psyId    = $request->request->get('psy_id');
        $dateDebut = $request->request->get('date_debut');
        $dateFin   = $request->request->get('date_fin');
        $motif     = trim($request->request->get('motif', ''));

        // Validations
        if (!$psyId || !$dateDebut || !$dateFin || !$motif) {
            return new JsonResponse(['success' => false, 'message' => 'Tous les champs sont requis.'], 400);
        }

        $psy = $userRepo->find($psyId);
        if (!$psy) {
            return new JsonResponse(['success' => false, 'message' => 'Psychologue introuvable.'], 404);
        }

        $debut = new \DateTime($dateDebut);
        $fin   = new \DateTime($dateFin);
        $today = new \DateTime('today');

        if ($debut < $today) {
            return new JsonResponse(['success' => false, 'message' => 'La date de début doit être aujourd\'hui ou dans le futur.'], 400);
        }

        if ($fin < $debut) {
            return new JsonResponse(['success' => false, 'message' => 'La date de fin doit être après la date de début.'], 400);
        }

        $duree = $debut->diff($fin)->days + 1;
        if ($duree > 30) {
            return new JsonResponse(['success' => false, 'message' => 'La durée maximale est de 30 jours.'], 400);
        }

        // Créer la demande
        $conge = new CongeMaladie();
        $conge->setPatient($patient);
        $conge->setMedecin($psy);
        $conge->setDateDebut($debut);
        $conge->setDateFin($fin);
        $conge->setMotif($motif);
        $conge->setStatut('en_attente');
        $conge->setCreatedAt(new \DateTime());

        $em->persist($conge);

        // Notification au psy
        $notif = new NotificationrendezVou();
        $notif->setDestinataire($psy);
        $notif->setType('conge');
        $notif->setMessage(sprintf(
            '%s %s a soumis une demande de congé maladie du %s au %s.',
            $patient->getFirstname(),
            $patient->getLastname(),
            $debut->format('d/m/Y'),
            $fin->format('d/m/Y')
        ));
        $em->persist($notif);

        $em->flush();

        // Email de confirmation au patient
        try {
            $email = (new Email())
                ->from('noreply@psycho-platform.com')
                ->to($patient->getEmail())
                ->subject('Demande de congé maladie soumise')
                ->html($this->renderView('emails/conge_soumis.html.twig', [
                    'patient'  => $patient,
                    'psy'      => $psy,
                    'conge'    => $conge,
                ]));
            $mailer->send($email);
        } catch (\Exception $e) {
            // L'envoi d'email ne doit pas bloquer la demande
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'Votre demande de congé a été soumise avec succès. Vous recevrez une réponse par email.',
        ]);
    }

    /**
     * Liste des congés du patient connecté
     */
    #[Route('/mes-conges', name: 'mes_conges', methods: ['GET'])]
    public function mesConges(EntityManagerInterface $em): JsonResponse
    {
        $patient = $this->getUser();

        if (!$patient) {
            return new JsonResponse([], 401);
        }

        $conges = $em->getRepository(CongeMaladie::class)->findBy(
            ['patient' => $patient],
            ['createdAt' => 'DESC']
        );

        $data = [];
        foreach ($conges as $c) {
            $data[] = [
                'id'         => $c->getId(),
                'psyName'    => $c->getMedecin()->getFirstname() . ' ' . $c->getMedecin()->getLastname(),
                'dateDebut'  => $c->getDateDebut()->format('d/m/Y'),
                'dateFin'    => $c->getDateFin()->format('d/m/Y'),
                'duree'      => $c->getDateDebut()->diff($c->getDateFin())->days + 1,
                'motif'      => $c->getMotif(),
                'statut'     => $c->getStatut(),
                'reponse'    => $c->getReponsePsy(),
                'createdAt'  => $c->getCreatedAt()->format('d/m/Y à H:i'),
                'canCancel'  => $c->getStatut() === 'en_attente',
            ];
        }

        return new JsonResponse($data);
    }

    /**
     * Patient annule sa propre demande (uniquement si en_attente)
     */
    #[Route('/{id}/annuler', name: 'annuler', methods: ['POST'])]
    public function annuler(int $id, EntityManagerInterface $em): JsonResponse
    {
        $patient = $this->getUser();
        $conge   = $em->getRepository(CongeMaladie::class)->find($id);

        if (!$conge || $conge->getPatient() !== $patient) {
            return new JsonResponse(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        if ($conge->getStatut() !== 'en_attente') {
            return new JsonResponse(['success' => false, 'message' => 'Impossible d\'annuler une demande déjà traitée.'], 400);
        }

        $conge->setStatut('annule_patient');
        $em->flush();

        return new JsonResponse(['success' => true]);
    }

    // ══════════════════════════════════════════════
    //  PSY : Gérer les demandes reçues
    // ══════════════════════════════════════════════

    /**
     * Liste paginée des demandes de congé reçues par le psy
     */
    #[Route('/psy/liste', name: 'psy_liste', methods: ['GET'])]
    public function psyListe(
        EntityManagerInterface $em,
        PaginatorInterface $paginator,
        Request $request
    ): JsonResponse {
        $psy = $this->getUser();

        $qb = $em->getRepository(CongeMaladie::class)
            ->createQueryBuilder('c')
            ->where('c.medecin = :psy')
            ->setParameter('psy', $psy)
            ->orderBy('c.createdAt', 'DESC');

        $statut = $request->query->get('statut');
        if ($statut) {
            $qb->andWhere('c.statut = :statut')->setParameter('statut', $statut);
        }

        $conges = $paginator->paginate(
            $qb->getQuery(),
            $request->query->getInt('page', 1),
            6
        );

        $data = [];
        foreach ($conges as $c) {
            $patient = $c->getPatient();
            $data[] = [
                'id'          => $c->getId(),
                'patientName' => $patient->getFirstname() . ' ' . $patient->getLastname(),
                'patientEmail'=> $patient->getEmail(),
                'dateDebut'   => $c->getDateDebut()->format('d/m/Y'),
                'dateFin'     => $c->getDateFin()->format('d/m/Y'),
                'duree'       => $c->getDateDebut()->diff($c->getDateFin())->days + 1,
                'motif'       => $c->getMotif(),
                'statut'      => $c->getStatut(),
                'reponse'     => $c->getReponsePsy(),
                'createdAt'   => $c->getCreatedAt()->format('d/m/Y à H:i'),
            ];
        }

        return new JsonResponse([
            'items'       => $data,
            'total'       => $conges->getTotalItemCount(),
            'currentPage' => $conges->getCurrentPageNumber(),
            'pageCount'   => ceil($conges->getTotalItemCount() / 6),
        ]);
    }

    /**
     * Psy : accepter ou refuser une demande
     */
  
#[Route('/{id}/traiter', name: 'traiter', methods: ['POST'])]
public function traiter(
    int $id,
    Request $request,
    EntityManagerInterface $em,
    FicheConsultationRepository $ficheRepo,
    MailerInterface $mailer,
    \Knp\Snappy\Pdf $snappy
): JsonResponse {
    $psy = $this->getUser();
    $conge = $em->getRepository(CongeMaladie::class)->find($id);

    if (!$conge || $conge->getMedecin() !== $psy) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Non autorisé'
        ], 403);
    }

    if ($conge->getStatut() !== 'en_attente') {
        return new JsonResponse([
            'success' => false,
            'message' => 'Cette demande a déjà été traitée.'
        ], 400);
    }

    // Récupération des données envoyées
    $data = json_decode($request->getContent(), true);

    $decision = $data['decision'] ?? null;
    $reponse = trim($data['reponse'] ?? '');
    $signaturePsy = $data['signaturePsy'] ?? null;

    if (!in_array($decision, ['valide', 'refuse'])) {
        return new JsonResponse([
            'success' => false,
            'message' => 'Décision invalide'
        ], 400);
    }

    // Mise à jour du congé
    $conge->setSignaturePsy($signaturePsy);
    $conge->setStatut($decision);
    $conge->setReponsePsy($reponse ?: null);
    $conge->setTraiteAt(new \DateTime());

    // Notification
    $notif = new NotificationrendezVou();
    $notif->setDestinataire($conge->getPatient());
    $notif->setType('conge_reponse');

    if ($decision === 'valide') {
        $notif->setMessage(sprintf(
            'Votre demande de congé maladie du %s au %s a été acceptée par %s %s.',
            $conge->getDateDebut()->format('d/m/Y'),
            $conge->getDateFin()->format('d/m/Y'),
            $psy->getFirstname(),
            $psy->getLastname()
        ));

        // Token sécurisé
        $token = hash(
            'sha256',
            $conge->getId() .
            $conge->getPatient()->getEmail() .
            $_ENV['APP_SECRET']
        );

        // URL du certificat
        $certificatUrl = $this->generateUrl(
            'conge_telecharger_certificat',
            [
                'id' => $conge->getId(),
                'token' => $token
            ],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        // Génération PDF
        $pdfContent = null;

        try {
            $htmlAttestation = $this->renderView(
                'emails/conge_attestation.html.twig',
                [
                    'conge' => $conge,
                    'patient' => $conge->getPatient(),
                    'psy' => $psy,
                    'signaturePsy' => $signaturePsy,
                ]
            );

            $pdfContent = $snappy->getOutputFromHtml($htmlAttestation);
        } catch (\Exception $e) {
            $pdfContent = null;
        }

        // Email validation
        try {
            $email = (new Email())
                ->from('noreply@psycho-platform.com')
                ->to($conge->getPatient()->getEmail())
                ->subject('✅ Congé maladie validé – Attestation jointe')
                ->html($this->renderView(
                    'emails/conge_valide.html.twig',
                    [
                        'conge' => $conge,
                        'patient' => $conge->getPatient(),
                        'psy' => $psy,
                        'token' => $token,
                        'certificatUrl' => $certificatUrl,
                    ]
                ));

            if ($pdfContent) {
                $email->attach(
                    $pdfContent,
                    'attestation-conge-' . $conge->getId() . '.pdf',
                    'application/pdf'
                );
            }

            $mailer->send($email);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur email : ' . $e->getMessage()
            ], 500);
        }

    } else {
        // REFUS
        $notif->setMessage(sprintf(
            'Votre demande de congé maladie du %s au %s a été refusée par %s %s.%s',
            $conge->getDateDebut()->format('d/m/Y'),
            $conge->getDateFin()->format('d/m/Y'),
            $psy->getFirstname(),
            $psy->getLastname(),
            $reponse ? ' Motif : ' . $reponse : ''
        ));

        try {
            $email = (new Email())
                ->from('noreply@psycho-platform.com')
                ->to($conge->getPatient()->getEmail())
                ->subject('Demande de congé maladie refusée')
                ->html($this->renderView(
                    'emails/conge_refuse.html.twig',
                    [
                        'conge' => $conge,
                        'patient' => $conge->getPatient(),
                        'psy' => $psy,
                        'reponse' => $reponse,
                    ]
                ));

            $mailer->send($email);
        } catch (\Exception $e) {
            // silencieux
        }
    }

    $em->persist($notif);
    $em->flush();

    return new JsonResponse([
        'success' => true,
        'decision' => $decision
    ]);
}
    /**
     * Commande console (ou route CRON) : archiver les congés expirés
     * Appeler via : GET /conge/archiver-expires (protégé par IP ou clé)
     */
    #[Route('/archiver-expires', name: 'archiver_expires', methods: ['GET'])]
    public function archiverExpires(EntityManagerInterface $em): JsonResponse
    {
        // Sécurité basique : appel uniquement depuis le serveur
        $today = new \DateTime('today');

        $congesExpires = $em->getRepository(CongeMaladie::class)
            ->createQueryBuilder('c')
            ->where('c.statut = :statut')
            ->andWhere('c.dateFin < :today')
            ->setParameter('statut', 'valide')
            ->setParameter('today', $today)
            ->getQuery()
            ->getResult();

        $count = 0;
        foreach ($congesExpires as $c) {
            $c->setStatut('termine');
            $count++;
        }

        $em->flush();

        return new JsonResponse(['success' => true, 'archived' => $count]);
    }

    /**
     * PSY : voir le dossier complet d'un patient (historique fiches + demande)
     */
    #[Route('/{id}/dossier-patient', name: 'dossier_patient', methods: ['GET'])]
    public function dossierPatient(
        int $id,
        EntityManagerInterface $em,
        FicheConsultationRepository $ficheRepo
    ): JsonResponse {
        $psy   = $this->getUser();
        $conge = $em->getRepository(CongeMaladie::class)->find($id);

        if (!$conge || $conge->getMedecin() !== $psy) {
            return new JsonResponse(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        $patient = $conge->getPatient();

        // Récupérer toutes les réservations du patient avec ce psy
        $reservations = $em->getRepository(ReservationrendezVou::class)->findBy([
            'user'    => $patient,
            'medecin' => $psy,
        ]);

        $fiches = [];
        foreach ($reservations as $res) {
            $ff = $ficheRepo->findBy(['rendezVous' => $res->getRendezVous()], ['created_at' => 'DESC']);
            foreach ($ff as $f) {
                $fiches[] = [
                    'date'              => $f->getCreatedAt()?->format('d/m/Y') ?? '—',
                    'probleme'          => $f->getProblemePrincipal(),
                    'diagnostic'        => $f->getDiagnostic(),
                    'notes'             => $f->getNotes(),
                    'traitement'        => $f->getTraitement(),
                    'recommandations'   => $f->getRecommandations(),
                ];
            }
        }

        // Historique des demandes de congé
        $autresConges = $em->getRepository(CongeMaladie::class)->findBy([
            'patient' => $patient,
            'medecin' => $psy,
        ], ['createdAt' => 'DESC']);

        $historiqueConges = [];
        foreach ($autresConges as $c) {
            $historiqueConges[] = [
                'id'        => $c->getId(),
                'dateDebut' => $c->getDateDebut()->format('d/m/Y'),
                'dateFin'   => $c->getDateFin()->format('d/m/Y'),
                'statut'    => $c->getStatut(),
                'motif'     => $c->getMotif(),
                'reponse'   => $c->getReponsePsy(),
            ];
        }

        return new JsonResponse([
            'success'         => true,
            'patientName'     => $patient->getFirstname() . ' ' . $patient->getLastname(),
            'patientEmail'    => $patient->getEmail(),
            'ficheCount'      => count($fiches),
            'fiches'          => $fiches,
            'historiqueConges'=> $historiqueConges,
            'demandeActuelle' => [
                'id'        => $conge->getId(),
                'dateDebut' => $conge->getDateDebut()->format('d/m/Y'),
                'dateFin'   => $conge->getDateFin()->format('d/m/Y'),
                'duree'     => $conge->getDateDebut()->diff($conge->getDateFin())->days + 1,
                'motif'     => $conge->getMotif(),
                'statut'    => $conge->getStatut(),
                'createdAt' => $conge->getCreatedAt()->format('d/m/Y à H:i'),
            ],
        ]);
    }

    /**
 * Patient télécharge son certificat via le lien email (token sécurisé)
 */
#[Route('/{id}/certificat/{token}', name: 'telecharger_certificat', methods: ['GET'])]
public function telechargerCertificat(
    int $id,
    string $token,
    EntityManagerInterface $em,
    \Knp\Snappy\Pdf $snappy
): Response {
    $conge = $em->getRepository(CongeMaladie::class)->find($id);

    // Vérifier existence + statut + token
    if (!$conge || $conge->getStatut() !== 'valide') {
        throw $this->createNotFoundException('Certificat introuvable.');
    }

    $expectedToken = hash('sha256', $conge->getId() . $conge->getPatient()->getEmail() . $_ENV['APP_SECRET']);
    if (!hash_equals($expectedToken, $token)) {
        throw $this->createAccessDeniedException('Lien invalide.');
    }

    $html = $this->renderView('emails/conge_attestation.html.twig', [
        'conge'   => $conge,
        'patient' => $conge->getPatient(),
        'psy'     => $conge->getMedecin(),
       'signaturePsy' => $conge->getSignaturePsy() ?? null,
    ]);

    $pdf = $snappy->getOutputFromHtml($html);

    return new Response($pdf, 200, [
        'Content-Type'        => 'application/pdf',
        'Content-Disposition' => 'inline; filename="certificat-conge-' . $conge->getId() . '.pdf"',
    ]);
}
}