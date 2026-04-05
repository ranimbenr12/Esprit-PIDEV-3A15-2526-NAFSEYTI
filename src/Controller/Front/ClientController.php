<?php
namespace App\Controller\Front;

use App\Entity\MediasObjectif;
use App\Repository\SuiviRepository;
use App\Repository\ObjectifRepository;
use App\Repository\MediasObjectifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client')]
class ClientController extends AbstractController
{
    // ── SUIVIS (lecture seule) ─────────────────────────────────────────────
    #[Route('/suivis', name: 'client_suivi_index', methods: ['GET'])]
    public function index(SuiviRepository $repo, ObjectifRepository $or): Response
    {
        $suivis = $repo->findAll();

        // Pour chaque suivi, compter les objectifs sans média uploadé
        $alertes = [];
        foreach ($suivis as $suivi) {
            $count = 0;
            foreach ($or->findBySuivi($suivi->getIdsuivi()) as $objectif) {
                if (!$objectif->isValide() && $objectif->getMedias()->isEmpty()) {
                    $count++;
                }
            }
            $alertes[$suivi->getIdsuivi()] = $count;
        }

        return $this->render('front/client/suivis.html.twig', [
            'suivis'  => $suivis,
            'alertes' => $alertes,
        ]);
    }

    // ── OBJECTIFS (lecture + upload) ───────────────────────────────────────
    #[Route('/suivis/{idSuivi}/objectifs', name: 'client_objectif_index', methods: ['GET'])]
    public function objectifs(int $idSuivi, SuiviRepository $sr, ObjectifRepository $or): Response
    {
        $suivi = $sr->find($idSuivi);
        if (!$suivi) throw $this->createNotFoundException();
        return $this->render('front/client/objectifs.html.twig', [
            'suivi'    => $suivi,
            'objectifs' => $or->findBySuivi($idSuivi),
        ]);
    }

    // ── UPLOAD FICHIER ─────────────────────────────────────────────────────
    #[Route('/objectifs/{id}/upload', name: 'client_media_upload', methods: ['POST'])]
    public function upload(int $id, Request $request, ObjectifRepository $or, EntityManagerInterface $em): JsonResponse
    {
        $objectif = $or->find($id);
        if (!$objectif) {
            return new JsonResponse(['success' => false, 'error' => 'Objectif non trouvé'], 404);
        }

        $file = $request->files->get('fichier');
        if (!$file) {
            return new JsonResponse(['success' => false, 'error' => 'Aucun fichier reçu.'], 400);
        }

        // Validation taille (max 10 Mo)
        if ($file->getSize() > 10 * 1024 * 1024) {
            return new JsonResponse(['success' => false, 'error' => 'Fichier trop volumineux (max 10 Mo).'], 400);
        }

        // Validation type MIME
        $mimeType = $file->getMimeType();
        $allowedMimes = [
            'image/jpeg', 'image/png', 'image/gif', 'image/webp',
            'video/mp4', 'video/avi', 'video/quicktime', 'video/webm',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];
        if (!in_array($mimeType, $allowedMimes, true)) {
            return new JsonResponse(['success' => false, 'error' => 'Type de fichier non autorisé.'], 400);
        }

        // Déterminer le type média
        $typeMedia = match(true) {
            str_starts_with($mimeType, 'image/') => 'image',
            str_starts_with($mimeType, 'video/') => 'video',
            default => 'document',
        };

        try {
            $ext      = $file->guessExtension() ?? 'bin';
            $nomFichier = uniqid('media_') . '.' . $ext;
            $uploadDir  = $this->getParameter('kernel.project_dir') . '/public/uploads/objectifs';
            $file->move($uploadDir, $nomFichier);

            $media = new MediasObjectif();
            $media->setObjectif($objectif)
                  ->setTypeMedia($typeMedia)
                  ->setCheminFichier('uploads/objectifs/' . $nomFichier);
            $em->persist($media);
            $em->flush();

            return new JsonResponse([
                'success' => true,
                'id'      => $media->getIdMedia(),
                'type'    => $typeMedia,
                'nom'     => $nomFichier,
                'chemin'  => 'uploads/objectifs/' . $nomFichier,
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // ── LISTE MÉDIAS d'un objectif ─────────────────────────────────────────
    #[Route('/objectifs/{id}/medias', name: 'client_media_list', methods: ['GET'])]
    public function medias(int $id, ObjectifRepository $or): JsonResponse
    {
        $o = $or->find($id);
        if (!$o) return new JsonResponse([], 404);
        $data = [];
        foreach ($o->getMedias() as $m) {
            $data[] = [
                'id'     => $m->getIdMedia(),
                'type'   => $m->getTypeMedia(),
                'nom'    => $m->getNomFichier(),
                'chemin' => $m->getCheminFichier(),
                'date'   => $m->getDateAjout()->format('d/m/Y H:i'),
            ];
        }
        return new JsonResponse($data);
    }

    // ── SUPPRIMER un média (client peut supprimer avant validation) ────────
    #[Route('/medias/{id}/delete', name: 'client_media_delete', methods: ['POST'])]
    public function deleteMedia(int $id, MediasObjectifRepository $mr, EntityManagerInterface $em): JsonResponse
    {
        try {
            $m = $mr->find($id);
            if (!$m) return new JsonResponse(['success' => false, 'error' => 'Fichier non trouvé'], 404);

            // Bloquer si l'objectif est déjà validé
            if ($m->getObjectif() && $m->getObjectif()->isValide()) {
                return new JsonResponse(['success' => false, 'error' => 'Objectif validé — suppression impossible.'], 403);
            }

            $chemin = $this->getParameter('kernel.project_dir') . '/public/' . $m->getCheminFichier();
            if (file_exists($chemin)) unlink($chemin);
            $em->remove($m);
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
