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

#[Route('/rendez-vous', name: 'rdv_')]
class RendezVousController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(
        UserRepository $userRepository,
        RendezVouRepository $rendezVouRepository
    ): Response {
        $professionals = $userRepository->findByRoles(['psychologue', 'coach_vie']);

        // Pour chaque professionnel, récupère ses créneaux "Pas encore pris"
        $slots = [];
        foreach ($professionals as $pro) {
            $slots[$pro->getId()] = $rendezVouRepository->findBy([
                'medecin' => $pro,
                'statut'  => 'Pas encore pris',
            ]);
        }

        return $this->render('home/rendez_vous.html.twig', [
            'professionals' => $professionals,
            'slots'         => $slots,
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
public function reserve(
    Request $request,
    EntityManagerInterface $em,
    UserRepository $userRepo,
    RendezVouRepository $rendezVouRepository
): Response {
    $user    = $userRepo->find(1);
    $medecin = $userRepo->find($request->request->get('pro_id'));
    $rdv     = $rendezVouRepository->find($request->request->get('rdv_id'));

    if (!$user || !$medecin || !$rdv) {
        $this->addFlash('error', 'Données invalides.');
        return $this->redirectToRoute('rdv_index');
    }

    $reservation = new ReservationrendezVou();
    $reservation->setUser($user);
    $reservation->setMedecin($medecin);
    $reservation->setRendezVous($rdv);
    $reservation->setDateReservation(new \DateTime());

    // ← Changer le statut du créneau
    $rdv->setStatut('en attente');

    $em->persist($reservation);
    $em->flush();

    $this->addFlash('success', 'Rendez-vous réservé avec succès !');
    return $this->redirectToRoute('rdv_index');
}

#[Route('/mes-reservations', name: 'mes_reservations', methods: ['GET'])]
public function mesReservations(
    EntityManagerInterface $em,
    UserRepository $userRepo
): JsonResponse {
    try {
        $user = $userRepo->find(1);

        if (!$user) {
            return new JsonResponse([]);
        }

        $reservations = $em->getRepository(ReservationrendezVou::class)->findBy(
            ['user' => $user],
            ['date_reservation' => 'DESC']
        );

        $data = [];
        foreach ($reservations as $res) {
            $medecin = $res->getMedecin();
            $rdv     = $res->getRendezVous();

            if (!$medecin || !$rdv) {
                continue;
            }

            $isCoach = $medecin->getRole() === 'coach_vie';
            $avatar  = $medecin->getProfile_photo()
                ? '/uploads/photos/' . $medecin->getProfile_photo()
                : 'https://ui-avatars.com/api/?name=' . urlencode($medecin->getFirstname() . ' ' . $medecin->getLastname())
                . '&background=' . ($isCoach ? '6D8B74' : '5F7161') . '&color=fff&size=100';

           $data[] = [
            'doctorName'   => $medecin->getFirstname() . ' ' . $medecin->getLastname(),
            'doctorRole'   => $isCoach ? 'Coach de vie' : 'Psychologue',
            'doctorAvatar' => $avatar,
            'date'         => $rdv->getDateRendezVous()?->format('d/m/Y') ?? '—',
            'debut'        => $rdv->getHeureDebut()?->format('H:i') ?? '—',
            'fin'          => $rdv->getHeureFin()?->format('H:i') ?? '—',
            'type'         => $rdv->getTypeSeance(),
            'reservedAt'   => $res->getDateReservation()?->format('d/m/Y à H:i') ?? '—',
        ];
        }

        return new JsonResponse($data);

    } catch (\Exception $e) {
        return new JsonResponse(['error' => $e->getMessage()], 500);
    }
}
}