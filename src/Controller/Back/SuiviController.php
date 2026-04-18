<?php
namespace App\Controller\Back;

use App\Entity\Suivi;
use App\Entity\User;
use App\Repository\SuiviRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back/suivi')]
class SuiviController extends AbstractController
{
    private function validateSuivi(string $titre, ?string $description, ?string $typeSuivi): array
    {
        $errors = [];
        $titre = trim($titre);
        if ($titre === '') {
            $errors['titre'] = 'Le titre est obligatoire.';
        } elseif (mb_strlen($titre) < 3) {
            $errors['titre'] = 'Le titre doit contenir au moins 3 caractères.';
        } elseif (mb_strlen($titre) > 255) {
            $errors['titre'] = 'Le titre ne peut pas dépasser 255 caractères.';
        }
        if ($description !== null && mb_strlen(trim($description)) > 1000) {
            $errors['description'] = 'La description ne peut pas dépasser 1000 caractères.';
        }
        $typesValides = ['Psychologique', 'Académique', 'Social', 'Comportemental'];
        if ($typeSuivi && !in_array($typeSuivi, $typesValides, true)) {
            $errors['type_suivi'] = 'Le type de suivi sélectionné est invalide.';
        }
        return $errors;
    }

    #[Route('/', name: 'back_suivi_index', methods: ['GET'])]
    public function index(SuiviRepository $repo, UserRepository $userRepo): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        $isAdmin = in_array('ROLE_ADMIN', $currentUser->getRoles(), true);

        // Admin voit tout, psychologue voit les suivis qui lui sont assignés (par ID brut ou relation)
        if ($isAdmin) {
            $suivis = $repo->findAll();
        } elseif ($currentUser->getRole() === 'psychologue') {
            $suivis = $repo->findByPsychologueId($currentUser->getId());
        } else {
            $suivis = $repo->findByUtilisateurId($currentUser->getId());
        }

        $psychologues = $userRepo->findBy(['role' => 'psychologue']);
        $etudiants    = $userRepo->findBy(['role' => 'etudiant']);

        // Mapping id → nom pour affichage dans le template
        $allUsers = $userRepo->findAll();
        $usersMap = [];
        foreach ($allUsers as $u) {
            $usersMap[$u->getId()] = $u->getFirstname() . ' ' . $u->getLastname();
        }

        return $this->render('back/suivi/index.html.twig', [
            'suivis'       => $suivis,
            'psychologues' => $psychologues,
            'etudiants'    => $etudiants,
            'currentUser'  => $currentUser,
            'usersMap'     => $usersMap,
        ]);
    }

    #[Route('/new', name: 'back_suivi_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $em, UserRepository $userRepo): JsonResponse
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();

        $titre       = (string) $request->get('titre', '');
        $description = (string) $request->get('description', '');
        $typeSuivi   = (string) $request->get('type_suivi', '');

        $errors = $this->validateSuivi($titre, $description, $typeSuivi);
        if ($errors) {
            return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        }

        try {
            $suivi = new Suivi();
            $suivi->setTitre(trim($titre));
            $suivi->setDescription(trim($description));
            $suivi->setTypeSuivi($typeSuivi);

            // Étudiant assigné
            $etudiantId = $request->get('idutilisateur');
            if ($etudiantId) {
                $etudiant = $userRepo->find((int)$etudiantId);
                if ($etudiant) $suivi->setUtilisateur($etudiant);
            } else {
                $suivi->setUtilisateur($currentUser);
            }

            // Psychologue assigné (optionnel)
            $psyId = $request->get('idpsychologue');
            if ($psyId) {
                $psy = $userRepo->find((int)$psyId);
                if ($psy) $suivi->setPsychologue($psy);
            }

            $em->persist($suivi);
            $em->flush();
            return new JsonResponse(['success' => true, 'id' => $suivi->getIdsuivi()]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/{id}/edit', name: 'back_suivi_edit', methods: ['POST'])]
    public function edit(Request $request, int $id, SuiviRepository $repo, EntityManagerInterface $em, UserRepository $userRepo): JsonResponse
    {
        $suivi = $repo->find($id);
        if (!$suivi) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => 'Suivi non trouvé.']], 404);
        }

        $titre       = (string) $request->get('titre', '');
        $description = (string) $request->get('description', '');
        $typeSuivi   = (string) $request->get('type_suivi', '');

        $errors = $this->validateSuivi($titre, $description, $typeSuivi);
        if ($errors) {
            return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        }

        try {
            $suivi->setTitre(trim($titre));
            $suivi->setDescription(trim($description));
            $suivi->setTypeSuivi($typeSuivi);
            $suivi->setDateModification(new \DateTime());

            $etudiantId = $request->get('idutilisateur');
            if ($etudiantId) {
                $etudiant = $userRepo->find((int)$etudiantId);
                if ($etudiant) $suivi->setUtilisateur($etudiant);
            }

            $psyId = $request->get('idpsychologue');
            if ($psyId) {
                $psy = $userRepo->find((int)$psyId);
                if ($psy) $suivi->setPsychologue($psy);
            }

            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/{id}/delete', name: 'back_suivi_delete', methods: ['POST'])]
    public function delete(int $id, SuiviRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $suivi = $repo->find($id);
            if (!$suivi) {
                return new JsonResponse(['success' => false, 'error' => 'Suivi non trouvé'], 404);
            }
            $em->remove($suivi);
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/show', name: 'back_suivi_show', methods: ['GET'])]
    public function show(int $id, SuiviRepository $repo): Response
    {
        $suivi = $repo->find($id);
        if (!$suivi) throw $this->createNotFoundException('Suivi non trouvé');
        return $this->render('back/suivi/_details.html.twig', ['suivi' => $suivi]);
    }

    #[Route('/{id}/json', name: 'back_suivi_json', methods: ['GET'])]
    public function getSuiviJson(int $id, SuiviRepository $repo): JsonResponse
    {
        $suivi = $repo->find($id);
        if (!$suivi) {
            return new JsonResponse(['success' => false, 'error' => 'Suivi non trouvé'], 404);
        }
        return new JsonResponse([
            'id'            => $suivi->getIdsuivi(),
            'titre'         => $suivi->getTitre(),
            'description'   => $suivi->getDescription(),
            'type_suivi'    => $suivi->getTypeSuivi(),
            'idutilisateur' => $suivi->getIdutilisateur(),
            'idpsychologue' => $suivi->getIdpsychologue(),
            'utilisateur'   => $suivi->getUtilisateur()
                ? $suivi->getUtilisateur()->getFirstname() . ' ' . $suivi->getUtilisateur()->getLastname()
                : null,
            'psychologue'   => $suivi->getPsychologue()
                ? $suivi->getPsychologue()->getFirstname() . ' ' . $suivi->getPsychologue()->getLastname()
                : null,
        ]);
    }
}
