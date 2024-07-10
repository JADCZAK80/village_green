<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\Commande;
use App\Entity\ComposerDe;
use App\Form\CommandeType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/commande', name: 'app_commande_')]
class CommandeController extends AbstractController
{
    #[Route('/ajout', name: 'ajout')]
    public function index(SessionInterface $session, ArticleRepository $articleRepository, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []);

        if($panier === []){
            $this->addFlash('message','Votre panier est vide');
            return $this->redirectToRoute('app_accueil');
        }
        $user = $this->getUser();
        
        if (!$user instanceof \App\Entity\Utilisateur) {
            throw $this->createNotFoundException('User not found');
        }

        // Récupérez la réduction
        $reduction = $user->getreduction();
        
        $commande = new Commande();
        $form = $this->createForm(CommandeType::class,$commande);
        $form->handleRequest($request);

        $data = [];
        $total = 0;

        foreach ($panier as $id => $quantity) {
            $article = $articleRepository->find($id);
            $data[] = [
                'article' => $article,
                'quantity' => $quantity,
            ];
            $total += $article->getPrixHT() * $quantity;
        }

        if ($form->isSubmitted() && $form->isValid()) {
            //si le panier n'est pas vide on crée la commande
            
            $commande->setIdUtilisateur($this->getUser());
            $commande->setDateCommande(new \DateTime());
            $commande->setDateFacture(new \DateTime());
            $commande->setIdFacture(random_int(1,1000000));
            $commande->setEtatFacture('Payer');
            $commande->setEtatLivraison('En attente');
            $commande->setTVA(20.00);
            
            
            
            foreach($panier as $item =>$quantity){
            $composerDe =new ComposerDe();
            
            $article = $articleRepository->find($item);
            
            $composerDe->setIdArticle($article);
            $composerDe->setNombreArticle($quantity);
            
            $commande->addComposerDe($composerDe);
        }
        $em->persist($commande);
        $em->flush();
        $session->remove('panier');

        $this->addFlash('message', 'Commande créée avec succès');
        return $this->redirectToRoute('app_accueil');
    }
    return $this->render('commande/index.html.twig', [
        'form' => $form,
        'panier' => $data,
        'total' => $total,
        'reduction' => $reduction,
    ]);
        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
}
