<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\RendezVouRepository;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\RendezVou;
use App\Form\RendezVousType;
use App\Entity\FicheConsultation;
use App\Form\FicheConsultationType;
use App\Repository\FicheConsultationRepository;
use Dompdf\Dompdf;
use Dompdf\Options;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function index(): Response
    {
        return $this->render('back/dashboard.html.twig');
    }

    #[Route('/admin/rendezvous', name: 'admin_rendezvous')]
    public function rendezVous(): Response
    {
        return $this->render('back/rendez-vous.html.twig');
    }

    #[Route('/admin/tableau', name: 'admin_tableau')]
    public function tableau(): Response
    {
        return $this->render('back/dashboard.html.twig');
    }

    // ── Liste + Créer ──
    #[Route('/admin/liste_rendezvous', name: 'admin_liste_rendezvous', methods: ['GET', 'POST'])]
    public function liste_rendez_vous(
        Request $request,
        RendezVouRepository $repository,
        EntityManagerInterface $em
    ): Response {
        $rendezvous = $repository->findAllOrderedByDate();
        $newRdv = new RendezVou();
        $createForm = $this->createForm(RendezVousType::class, $newRdv);
        $createForm->handleRequest($request);

        $showCreateModal = false; // ← pour rouvrir la modale si erreurs

        if ($createForm->isSubmitted()) {
            if ($createForm->isValid()) {
                $em->persist($newRdv);
                $em->flush();
                return $this->redirectToRoute('admin_liste_rendezvous');
            }
            $showCreateModal = true; // ← erreurs → rouvrir la modale
        }

        return $this->render('back/rendezvous_liste.html.twig', [
            'rendezvous'      => $rendezvous,
            'createForm'      => $createForm->createView(),
            'showCreateModal' => $showCreateModal,
        ]);
    }

    // ── Modifier ──
    #[Route('/admin/liste_rendezvous/{id}/edit', name: 'admin_rendezvous_edit', methods: ['GET', 'POST'])]
    public function edit_rendez_vous(
        int $id,
        Request $request,
        RendezVouRepository $repository,
        EntityManagerInterface $em
    ): Response {
        $rdv = $repository->find($id);

        if (!$rdv) {
            throw $this->createNotFoundException('Rendez-vous introuvable');
        }

        $editForm = $this->createForm(RendezVousType::class, $rdv);
        $editForm->handleRequest($request);

        $showEditModal = true; // ← toujours ouvrir la modale edit sur cette route

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_liste_rendezvous');
        }

        $rendezvous = $repository->findAllOrderedByDate();
        $newRdv = new RendezVou();
        $createForm = $this->createForm(RendezVousType::class, $newRdv);

        return $this->render('back/rendezvous_liste.html.twig', [
            'rendezvous'    => $rendezvous,
            'createForm'    => $createForm->createView(),
            'editForm'      => $editForm->createView(),
            'editRdvId'     => $id,
            'showEditModal' => $showEditModal,
        ]);
    }

    // ── Supprimer ──
    #[Route('/admin/rendezvous/{id}/delete', name: 'admin_rendezvous_delete', methods: ['POST'])]
    public function deleteRendezVous(
        RendezVou $rdv,
        EntityManagerInterface $em
    ): Response {
        $em->remove($rdv);
        $em->flush();

        return $this->redirectToRoute('admin_liste_rendezvous');
    }
    // ── Liste + Créer fiches ──
#[Route('/admin/fiches', name: 'admin_fiches', methods: ['GET', 'POST'])]
public function liste_fiches(
    Request $request,
    FicheConsultationRepository $repository,
    EntityManagerInterface $em
): Response {
    $fiches = $repository->findAllOrderedByDate();

    $newFiche = new FicheConsultation();
    $newFiche->setCreatedAt(new \DateTime());
    $createForm = $this->createForm(FicheConsultationType::class, $newFiche);
    $createForm->handleRequest($request);

    $showCreateModal = false;

    if ($createForm->isSubmitted()) {
        if ($createForm->isValid()) {
            $em->persist($newFiche);
            $em->flush();
            return $this->redirectToRoute('admin_fiches');
        }
        $showCreateModal = true;
    }

    return $this->render('back/fiches_liste.html.twig', [
        'fiches'          => $fiches,
        'createForm'      => $createForm->createView(),
        'showCreateModal' => $showCreateModal,
    ]);
}

// ── Modifier fiche ──
#[Route('/admin/fiches/{id}/edit', name: 'admin_fiche_edit', methods: ['GET', 'POST'])]
public function edit_fiche(
    int $id,
    Request $request,
    FicheConsultationRepository $repository,
    EntityManagerInterface $em
): Response {
    $fiche = $repository->find($id);
    if (!$fiche) {
        throw $this->createNotFoundException('Fiche introuvable');
    }

    $editForm = $this->createForm(FicheConsultationType::class, $fiche);
    $editForm->handleRequest($request);

    if ($editForm->isSubmitted() && $editForm->isValid()) {
        $em->flush();
        return $this->redirectToRoute('admin_fiches');
    }

    $fiches = $repository->findAllOrderedByDate();
    $newFiche = new FicheConsultation();
    $newFiche->setCreatedAt(new \DateTime());
    $createForm = $this->createForm(FicheConsultationType::class, $newFiche);

    return $this->render('back/fiches_liste.html.twig', [
        'fiches'        => $fiches,
        'createForm'    => $createForm->createView(),
        'editForm'      => $editForm->createView(),
        'editFicheId'   => $id,
        'showEditModal' => true,
    ]);
    //////////////////////////////////////////
    ////////////////////////////////////////
}

    // ── Supprimer fiche ──
    #[Route('/admin/fiches/{id}/delete', name: 'admin_fiche_delete', methods: ['POST'])]
    public function deleteFiche(
        FicheConsultation $fiche,
        EntityManagerInterface $em
    ): Response {
        $em->remove($fiche);
        $em->flush();
        return $this->redirectToRoute('admin_fiches');
    }
    // Dans AdminController.php, ajoute cette route :

    #[Route('/admin/liste_rendezvous/search', name: 'admin_rendezvous_search', methods: ['GET'])]
    public function searchRendezVous(
        Request $request,
        RendezVouRepository $repository
    ): Response {
        $search = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');

        $rendezvous = $repository->searchByCriteria($search, $statut);

        return $this->render('back/_rendezvous_rows.html.twig', [
            'rendezvous' => $rendezvous,
        ]);
    }
    #[Route('/admin/fiches/{id}/pdf', name: 'admin_fiche_pdf', methods: ['GET'])]
    public function downloadFichePdf(
        int $id,
        FicheConsultationRepository $repository
    ): Response {
        $fiche = $repository->find($id);
        if (!$fiche) {
            throw $this->createNotFoundException('Fiche introuvable');
        }

        $html = $this->renderView('back/fiche_pdf.html.twig', [
            'fiche' => $fiche,
        ]);

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = 'fiche-consultation-' . $fiche->getId() . '.pdf';

        return new Response(
            $dompdf->output(),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );
    }
}