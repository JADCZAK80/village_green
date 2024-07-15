<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FooterController extends AbstractController
{
    #[Route('/politique', name: 'app_politique')]
    public function index(): Response
    {
        return $this->render('footer/politique.html.twig', [
            'controller_name' => 'FooterController',
        ]);
    }

    #[Route('/mention', name: 'app_mention')]
    public function mention(): Response
    {
        return $this->render('footer/mention.html.twig', [
            'controller_name' => 'FooterController',
        ]);
    }
}
