<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Article;
use App\Entity\Utilisateur;

class CommandeControllerTest extends WebTestCase
{
    public function testRedirectIfPanierIsEmpty(): void
    {
        $client = static::createClient();
        
        // Simule une session utilisateur avec un panier vide
        $session = $client->getContainer()->get('session');
        $session->set('panier', []);
        $session->save();

        // Simule un utilisateur connecté
        $client->loginUser($this->createMockUser());

        $client->request('GET', '/commande/ajout');
        
        $this->assertResponseRedirects('/app_accueil');
        $client->followRedirect();

        $this->assertSelectorTextContains('.flash-message', 'Votre panier est vide');
    }

    public function testCommandeWithValidData(): void
    {
        $client = static::createClient();

        // Simule une session utilisateur avec un panier rempli
        $session = $client->getContainer()->get('session');
        $session->set('panier', [
            1 => 2, // Article ID => Quantity
        ]);
        $session->save();

        // Simule un utilisateur connecté
        $client->loginUser($this->createMockUser());

        $crawler = $client->request('GET', '/commande/ajout');

        $form = $crawler->selectButton('Submit')->form();
        $client->submit($form);

        $this->assertResponseRedirects('/app_accueil');
        $client->followRedirect();

        $this->assertSelectorTextContains('.flash-message', 'Commande créée avec succès');
    }

    private function createMockUser(): Utilisateur
    {
        $user = new Utilisateur();
        $user->setUsername('testuser');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('password');
        $user->setReduction(10);
        return $user;
    }
}
