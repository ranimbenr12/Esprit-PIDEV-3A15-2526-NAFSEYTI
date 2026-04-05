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

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/contenu-psychologique', name: 'contenu_psychologique')]
    public function contenuPsychologique(EntityManagerInterface $entityManager): Response
    {
        $forums = $entityManager->getRepository(Forum::class)->findBy(['statut' => 'actif']);
        $posts = $entityManager->getRepository(Post::class)->findBy(['statut' => 'publié'], ['date_creation' => 'DESC']);
        $commentaires = $entityManager->getRepository(Commentaire::class)->findAll();
        
        return $this->render('home/contenu_psy.html.twig', [
            'forums' => $forums,
            'posts' => $posts,
            'commentaires' => $commentaires,
        ]);
    }
    
    #[Route('/forum/{id}', name: 'forum_show')]
    public function forumShow(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        $forum = $entityManager->getRepository(Forum::class)->find($id);
        
        if (!$forum) {
            throw $this->createNotFoundException('Forum non trouvé');
        }
        
        // Récupérer les posts de ce forum
        $posts = $entityManager->getRepository(Post::class)->findBy(
            ['forum_id' => $id, 'statut' => 'publié'],
            ['date_creation' => 'DESC']
        );
        
        // Récupérer tous les commentaires pour ces posts
        $commentaires = $entityManager->getRepository(Commentaire::class)->findAll();
        
        // Traitement du formulaire d'ajout de post
        if ($request->isMethod('POST') && $request->request->get('action') === 'add_post') {
            $titre = $request->request->get('titre');
            $contenu = $request->request->get('contenu');
            $statut = $request->request->get('statut', 'publié');
            
            if (!empty($titre) && !empty($contenu)) {
                $post = new Post();
                $post->setTitre($titre);
                $post->setContenu($contenu);
                $post->setForum_id($forum->getId_forum());
                $post->setStatut($statut);
                $post->setDate_creation(new \DateTime());
                $post->setLike_count(0);
                $post->setDislike_count(0);
                
                $entityManager->persist($post);
                $entityManager->flush();
                
                $this->addFlash('success', 'Votre post a été publié avec succès !');
                return $this->redirectToRoute('forum_show', ['id' => $forum->getId_forum()]);
            } else {
                $this->addFlash('error', 'Le titre et le contenu sont obligatoires.');
            }
        }
        
        // Traitement du formulaire d'ajout de commentaire - CORRIGÉ
        if ($request->isMethod('POST') && $request->request->get('action') === 'add_comment') {
            $contenu = $request->request->get('contenu');
            $post_id = $request->request->get('post_id');
            
            if (!empty($contenu) && $post_id) {
                $commentaire = new Commentaire();
                $commentaire->setContenu($contenu);
                $commentaire->setId_post((int)$post_id);
                $commentaire->setDate_commentaire(new \DateTime());
                
                // Persist et flush séparément
                $entityManager->persist($commentaire);
                $entityManager->flush();
                
                $this->addFlash('success', 'Votre commentaire a été ajouté !');
                return $this->redirectToRoute('forum_show', ['id' => $forum->getId_forum()]);
            } else {
                $this->addFlash('error', 'Le commentaire ne peut pas être vide.');
            }
        }
        
        return $this->render('home/forum_show.html.twig', [
            'forum' => $forum,
            'posts' => $posts,
            'commentaires' => $commentaires,
        ]);
    }
    
    #[Route('/post/{id}/like', name: 'post_like', methods: ['POST'])]
    public function postLike(int $id, EntityManagerInterface $entityManager): Response
    {
        $post = $entityManager->getRepository(Post::class)->find($id);
        
        if (!$post) {
            return $this->json(['success' => false, 'error' => 'Post non trouvé'], 404);
        }
        
        $currentLikes = $post->getLike_count() ?? 0;
        $post->setLike_count($currentLikes + 1);
        $entityManager->flush();
        
        return $this->json(['success' => true, 'likes' => $post->getLike_count()]);
    }
}