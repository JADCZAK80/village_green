<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CommandeRepository;
use App\Repository\ComposerDeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoriqueController extends AbstractController
{
    #[Route('/historique', name: 'app_historique')]
    public function index(CommandeRepository $commandeRepository, ComposerDeRepository $composerDeRepository, ArticleRepository $articleRepository): Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour accéder à cette page.');
        }

        $commandes = $commandeRepository->findBy(['utilisateur' => $user]);

        if (!$commandes) {
            $this->addFlash('message','Pas de commande passée');
            return $this->redirectToRoute('app_accueil');

        }

        foreach ($commandes as $commande) {
            $composerDe = $composerDeRepository->findBy(['commande' => $commande]);
            $commandeDetails = []; // Liste des articles avec quantité
            foreach ($composerDe as $composition) {
                $article = $composition->getIdArticle();
                if ($article) {
                    $commandeDetails[] = [
                        'article' => $article,
                        'quantite' => $composition->getNombreArticle()
                    ];
                }
            }
            $commande->commandeDetails = $commandeDetails; // Associer les détails de la commande (articles + quantités)
        }

        return $this->render('historique/index.html.twig', [
            'commandes' => $commandes,
        ]);
    }
}
