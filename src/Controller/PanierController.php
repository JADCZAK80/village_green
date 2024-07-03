<?php
namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, ArticleRepository $articleRepository){
        $panier = $session->get('panier', []);

        //initialisation variable
        $data = [];
        $total = 0;

        foreach($panier as $id => $quantity){
            $article = $articleRepository->find($id);

            $data[] = [
                'article' => $article,
                'quantity' => $quantity
            ];
            $total += $article->getPrixHT() * $quantity;
        }
        return $this->render('panier/index.html.twig', compact('data', 'total'));
    }

    #[Route('/ajouter/{id}', name: 'ajouter')]
    public function ajouter(Article $article, SessionInterface $session){
        //recuperer l'id de l'article.
        $id = $article->getId();

        //recupere le panier existant
        $panier = $session->get('panier', []);

        // rajoute dans le panier sinon on incremente
        if(empty($panier[$id])){
            $panier[$id] = 1;
        }else{
            $panier[$id]++;
        }
        $session->set('panier', $panier);
        //on redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/retirer/{id}', name: 'retirer')]
    public function retirer(Article $article, SessionInterface $session){
        //recuperer l'id de l'article.
        $id = $article->getId();

        //recupere le panier existant
        $panier = $session->get('panier', []);

        // retirer le produit du panier si un seul exemplaire on décremente
        if(!empty($panier[$id])){
            if($panier[$id] >1 ){
            $panier[$id]--;
        }else{
            unset($panier[$id]);
        }
    }
        $session->set('panier', $panier);
        //on redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/supprimer/{id}', name: 'supprimer')]
    public function supprimer(Article $article, SessionInterface $session){
        //recuperer l'id de l'article.
        $id = $article->getId();

        //recupere le panier existant
        $panier = $session->get('panier', []);

        // retirer le produit du panier si un seul exemplaire on décremente
        if(!empty($panier[$id])){
            unset($panier[$id]);
    }
        $session->set('panier', $panier);
        //on redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/vider', name: 'vider')]
    public function vider(SessionInterface $session)
    {
        $session->remove('panier');

        return $this->redirectToRoute('panier_index');
    }
}