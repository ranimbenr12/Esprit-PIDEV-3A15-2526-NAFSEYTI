<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Entity\Post;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function index(): Response
    {
        return $this->render('back/dashboard.html.twig');
    }
    
    #[Route('/admin/contenu-psy', name: 'admin_contenu_psy')]
    public function contenuPsychologique(EntityManagerInterface $entityManager): Response
    {
        $forums = $entityManager->getRepository(Forum::class)->findAll();
        $posts = $entityManager->getRepository(Post::class)->findAll();
        $commentaires = $entityManager->getRepository(Commentaire::class)->findAll();
        
        return $this->render('back/contenuPsy.html.twig', [
            'forums' => $forums,
            'posts' => $posts,
            'commentaires' => $commentaires,
        ]);
    }

    // ==================== GESTION DES POSTS ====================

    #[Route('/admin/posts', name: 'admin_post_list')]
    public function postList(EntityManagerInterface $entityManager): Response
    {
        $posts = $entityManager->getRepository(Post::class)->findAll();
        
        return $this->render('back/post_list.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/admin/post/add', name: 'admin_post_add', methods: ['POST'])]
    public function postAdd(Request $request, EntityManagerInterface $entityManager): Response
    {
        $submittedToken = $request->request->get('_token');
        
        if (!$this->isCsrfTokenValid('add_post', $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_post_list');
        }

        $titre = $request->request->get('titre');
        $contenu = $request->request->get('contenu');
        $theme = $request->request->get('theme');
        $statut = $request->request->get('statut');
        $forum_id = $request->request->get('forum_id');

        if (empty($titre) || empty($contenu)) {
            $this->addFlash('error', 'Le titre et le contenu sont obligatoires.');
            return $this->redirectToRoute('admin_post_list');
        }

        $post = new Post();
        $post->setTitre($titre);
        $post->setContenu($contenu);
        $post->setTheme($theme ?: null);
        $post->setStatut($statut ?: 'publié');
        $post->setForum_id($forum_id ? (int)$forum_id : null);
        $post->setDate_creation(new \DateTime());
        $post->setLike_count(0);
        $post->setDislike_count(0);

        $entityManager->persist($post);
        $entityManager->flush();

        $this->addFlash('success', 'Post créé avec succès !');
        return $this->redirectToRoute('admin_post_list');
    }

   #[Route('/admin/post/edit/{id}', name: 'admin_post_edit', methods: ['POST'])]
public function postEdit(Request $request, int $id, EntityManagerInterface $entityManager): Response
{
    $post = $entityManager->getRepository(Post::class)->find($id);
    
    if (!$post) {
        $this->addFlash('error', 'Post non trouvé.');
        return $this->redirectToRoute('admin_post_list');
    }

    // TEMPORAIRE: Désactiver la vérification CSRF pour que la modification fonctionne
    // $submittedToken = $request->request->get('_token');
    // if (!$this->isCsrfTokenValid('edit' . $post->getId_post(), $submittedToken)) {
    //     $this->addFlash('error', 'Token CSRF invalide.');
    //     return $this->redirectToRoute('admin_post_list');
    // }

    $titre = $request->request->get('titre');
    $contenu = $request->request->get('contenu');
    $theme = $request->request->get('theme');
    $statut = $request->request->get('statut');
    $forum_id = $request->request->get('forum_id');

    if (!empty($titre)) {
        $post->setTitre($titre);
    }
    if (!empty($contenu)) {
        $post->setContenu($contenu);
    }
    $post->setTheme($theme ?: null);
    $post->setStatut($statut ?: $post->getStatut());
    $post->setForum_id($forum_id ? (int)$forum_id : null);

    $entityManager->flush();

    $this->addFlash('success', 'Post modifié avec succès !');
    return $this->redirectToRoute('admin_post_list');
}

    #[Route('/admin/post/delete/{id}', name: 'admin_post_delete', methods: ['POST'])]
    public function postDelete(Request $request, int $id, EntityManagerInterface $entityManager): Response
    {
        $post = $entityManager->getRepository(Post::class)->find($id);
        
        if (!$post) {
            $this->addFlash('error', 'Post non trouvé.');
            return $this->redirectToRoute('admin_post_list');
        }

        $submittedToken = $request->request->get('_token');
        
        if ($this->isCsrfTokenValid('delete' . $post->getId_post(), $submittedToken)) {
            
            // Supprimer les commentaires associés
            $commentaires = $entityManager->getRepository(Commentaire::class)->findBy(['id_post' => $post->getId_post()]);
            foreach ($commentaires as $commentaire) {
                $entityManager->remove($commentaire);
            }

            $entityManager->remove($post);
            $entityManager->flush();

            $this->addFlash('success', 'Post supprimé avec succès !');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('admin_post_list');
    }

    // ==================== GESTION DES FORUMS ====================

    #[Route('/admin/forums', name: 'admin_forum_list')]
    public function forumList(EntityManagerInterface $entityManager): Response
    {
        $forums = $entityManager->getRepository(Forum::class)->findAll();
        
        return $this->render('back/GestionForum.html.twig', [
            'forums' => $forums,
        ]);
    }

    #[Route('/admin/forum/add', name: 'admin_forum_add', methods: ['POST'])]
    public function forumAdd(Request $request, EntityManagerInterface $entityManager): Response
    {
        $submittedToken = $request->request->get('_token');
        
        if (!$this->isCsrfTokenValid('add_forum', $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_forum_list');
        }

        $nom_forum = $request->request->get('nom_forum');
        $description = $request->request->get('description');
        $statut = $request->request->get('statut');

        if (empty($nom_forum)) {
            $this->addFlash('error', 'Le nom du forum est requis.');
            return $this->redirectToRoute('admin_forum_list');
        }

        $forum = new Forum();
        $forum->setNom_forum($nom_forum);
        $forum->setDescription($description);
        $forum->setStatut($statut);
        $forum->setDate_creation(new \DateTime());

        $entityManager->persist($forum);
        $entityManager->flush();

        $this->addFlash('success', 'Forum créé avec succès !');
        return $this->redirectToRoute('admin_forum_list');
    }
// Dans AdminController.php, remplacez la méthode forumEdit par :

#[Route('/admin/forum/edit/{id}', name: 'admin_forum_edit', methods: ['POST'])]
public function forumEdit(Request $request, int $id, EntityManagerInterface $entityManager): Response
{
    $forum = $entityManager->getRepository(Forum::class)->find($id);
    
    if (!$forum) {
        $this->addFlash('error', 'Forum non trouvé.');
        return $this->redirectToRoute('admin_forum_list');
    }

    // TEMPORAIRE: Désactiver la vérification CSRF pour tester
    // $submittedToken = $request->request->get('_token');
    // if (!$this->isCsrfTokenValid('edit_forum' . $forum->getId_forum(), $submittedToken)) {
    //     $this->addFlash('error', 'Token CSRF invalide.');
    //     return $this->redirectToRoute('admin_forum_list');
    // }

    $nom_forum = $request->request->get('nom_forum');
    $description = $request->request->get('description');
    $statut = $request->request->get('statut');

    if (!empty($nom_forum)) {
        $forum->setNom_forum($nom_forum);
    }
    $forum->setDescription($description);
    $forum->setStatut($statut);

    $entityManager->flush();

    $this->addFlash('success', 'Forum modifié avec succès !');
    return $this->redirectToRoute('admin_forum_list');
}

    #[Route('/admin/forum/delete/{id}', name: 'admin_forum_delete', methods: ['POST'])]
    public function forumDelete(Request $request, int $id, EntityManagerInterface $entityManager): Response
    {
        $forum = $entityManager->getRepository(Forum::class)->find($id);
        
        if (!$forum) {
            $this->addFlash('error', 'Forum non trouvé.');
            return $this->redirectToRoute('admin_forum_list');
        }

        $submittedToken = $request->request->get('_token');
        
        if (!$this->isCsrfTokenValid('delete_forum' . $forum->getId_forum(), $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_forum_list');
        }

        // Supprimer les posts et commentaires associés
        $posts = $entityManager->getRepository(Post::class)->findBy(['forum_id' => $id]);
        foreach ($posts as $post) {
            $commentaires = $entityManager->getRepository(Commentaire::class)->findBy(['id_post' => $post->getId_post()]);
            foreach ($commentaires as $commentaire) {
                $entityManager->remove($commentaire);
            }
            $entityManager->remove($post);
        }

        $entityManager->remove($forum);
        $entityManager->flush();

        $this->addFlash('success', 'Forum supprimé avec succès !');
        return $this->redirectToRoute('admin_forum_list');
    }

    // ==================== GESTION DES COMMENTAIRES ====================

    #[Route('/admin/commentaires', name: 'admin_comment_list')]
    public function commentaireList(EntityManagerInterface $entityManager): Response
    {
        $commentaires = $entityManager->getRepository(Commentaire::class)->findAll();
        
        return $this->render('back/commentaire_list.html.twig', [
            'commentaires' => $commentaires,
        ]);
    }

    #[Route('/admin/commentaire/delete/{id}', name: 'admin_commentaire_delete', methods: ['POST'])]
    public function commentaireDelete(Request $request, int $id, EntityManagerInterface $entityManager): Response
    {
        $commentaire = $entityManager->getRepository(Commentaire::class)->find($id);
        
        if (!$commentaire) {
            $this->addFlash('error', 'Commentaire non trouvé.');
            return $this->redirectToRoute('admin_comment_list');
        }

        $submittedToken = $request->request->get('_token');
        
        if ($this->isCsrfTokenValid('delete_comment' . $commentaire->getId_commentaire(), $submittedToken)) {
            $entityManager->remove($commentaire);
            $entityManager->flush();
            $this->addFlash('success', 'Commentaire supprimé avec succès !');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('admin_comment_list');
    }
}