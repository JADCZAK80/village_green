<?php

namespace App\Controller;

use App\Entity\Rubrique;
use App\Repository\ArticleRepository;
use App\Repository\RubriqueRepository;
use App\Repository\SousRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(RubriqueRepository $rubriqueRepository): Response
    {
        $rubrique = $rubriqueRepository->findAll();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'rubrique' => $rubrique,
        ]);
    }

    #[Route('/sousRubrique/{id_rubrique}', name: 'app_sous_rubrique', methods: ['GET'])]
    public function sousR(RubriqueRepository $rubriqueRepository, SousRubriqueRepository $sousRubriqueRepository, int $id_rubrique): Response
    {
        $rubrique = $rubriqueRepository->find($id_rubrique);

        if(!$rubrique) {
            throw $this->createNotFoundException('Rubrique non trouvé');
        }

        $sousRubrique = $sousRubriqueRepository->findBy(['rubrique' => $id_rubrique]);

        return $this->render('accueil/sous_rubrique.html.twig', [
            'rubrique' => $rubrique,
            'sousRubrique' => $sousRubrique,
        ]);
    }

    #[Route('/produit/{id_sous_rubrique}', name: 'app_article', methods: ['GET'])]
    public function Article(SousRubriqueRepository $sousRubriqueRepository,ArticleRepository $articleRepository, int $id_sous_rubrique): Response
    {
        $sousRubrique = $sousRubriqueRepository->find($id_sous_rubrique);

        if(!$sousRubrique) {
            throw $this->createNotFoundException('Sous-rubrique non trouvé');
        }

        $article = $articleRepository->findBy(['sous_rubrique' => $id_sous_rubrique]);

        return $this->render('accueil/article_id.html.twig', [
            'sousRubrique' => $sousRubrique,
            'article' => $article,
        ]);
    }

    #[Route('/produit', name: 'app_produit')]
    public function Produit(ArticleRepository $articleRepository): Response
    {
        $produit = $articleRepository->findAll();

        return $this->render('accueil/produit.html.twig', [
            'controller_name' => 'AccueilController',
            'produit' => $produit,
        ]);
    }
    #[Route('/detail/{id_article}', name: 'app_detail', methods: ['GET'])]
    public function ArticleDetail(ArticleRepository $articleRepository, int $id_article): Response
    {
        $produit = $articleRepository->find($id_article);
    
        if(!$produit) {
            throw $this->createNotFoundException('article non trouvé');
        }
    
        $article = $articleRepository->findBy(['id' => $id_article]);
    
        return $this->render('accueil/detail.html.twig', [
            'article' => $article,
        ]);
    }

}
