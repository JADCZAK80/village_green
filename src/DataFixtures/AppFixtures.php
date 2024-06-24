<?php

namespace App\DataFixtures;

use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{



    public function load(ObjectManager $manager): void
    {
        // Définition des différents rubriques.

        $rubrique1 = new Rubrique();
        $rubrique1 -> setLibelleCourt("Percussion");
        $rubrique1 -> setLibelle("liste des instruments à percussion (membranophones et idiophones)");
        $rubrique1 -> setImage("percussion.png");
        
        $manager->persist($rubrique1);

        $rubrique2 = new Rubrique();
        $rubrique2 -> setLibelleCourt("Corde");
        $rubrique2 -> setLibelle("les instruments à cordes (frottées, pincées ou frappées)");
        $rubrique2 -> setImage("corde.png");
        
        $manager->persist($rubrique2);

        $rubrique3 = new Rubrique();
        $rubrique3 -> setLibelleCourt("Vent");
        $rubrique3 -> setLibelle("les instruments à vent (cuivres et bois)");
        $rubrique3 -> setImage("vent.png");

        $manager ->persist($rubrique3);

        //Fin des Rubrique.

        //Début des Sous-Rubriques.

        $sousRubrique1 = new SousRubrique();
        $sousRubrique1 -> setLibelleCourt("Les membraphones");
        $sousRubrique1 -> setLibelle("La famille d’instruments des membranophones.");
        $sousRubrique1 -> setImage("percussionM.png");
        $sousRubrique1 -> setIdRubrique($rubrique1);

        $manager ->persist($sousRubrique1);

        $manager->flush();
    }
    
}
