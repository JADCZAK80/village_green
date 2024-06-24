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
        //Rubrique 1.

        $sousRubrique1 = new SousRubrique();
        $sousRubrique1 -> setLibelleCourt("Les membraphones");
        $sousRubrique1 -> setLibelle("La famille d’instruments des membranophones.");
        $sousRubrique1 -> setImage("percussionM.png");
        $sousRubrique1 -> setIdRubrique($rubrique1);

        $manager ->persist($sousRubrique1);

        $sousRubrique2 = new SousRubrique();
        $sousRubrique2 -> setLibelleCourt("Les idiophones");
        $sousRubrique2 -> setLibelle("La famille des idiophones.");
        $sousRubrique2 -> setImage("percussionI.png");
        $sousRubrique2 -> setIdRubrique($rubrique1);

        $manager ->persist($sousRubrique2);

        //Rubrique 2.

        $sousRubrique3 = new SousRubrique();
        $sousRubrique3 -> setLibelleCourt("Les cordes frottées");
        $sousRubrique3 -> setLibelle("Dans cette famille, on a le violon, l’alto, le violoncelle.");
        $sousRubrique3 -> setImage("cordesF.png");
        $sousRubrique3 -> setIdRubrique($rubrique2);

        $manager ->persist($sousRubrique3);

        $sousRubrique4 = new SousRubrique();
        $sousRubrique4 -> setLibelleCourt("Les cordes pincées");
        $sousRubrique4 -> setLibelle("Dans cette famille, on a par exemple la basse, la guitare.");
        $sousRubrique4 -> setImage("cordesP.png");
        $sousRubrique4 -> setIdRubrique($rubrique2);

        $manager ->persist($sousRubrique4);

        $sousRubrique5 = new SousRubrique();
        $sousRubrique5 -> setLibelleCourt("Les cordes frappées");
        $sousRubrique5 -> setLibelle("La famille des cordes frappées, les cordes sont frappées soit manuellement soit mécaniquement.");
        $sousRubrique5 -> setImage("cordesFrap.png");
        $sousRubrique5 -> setIdRubrique($rubrique2);

        $manager ->persist($sousRubrique5);

        //Rubrique 3.

        $sousRubrique6 = new SousRubrique();
        $sousRubrique6 -> setLibelleCourt("Les cuivres");
        $sousRubrique6 -> setLibelle("La famille des cuivres regroupe les instruments comme le trombone, la trompette à pistons, le tuba.");
        $sousRubrique6 -> setImage("cuivres.png");
        $sousRubrique6 -> setIdRubrique($rubrique3);

        $manager ->persist($sousRubrique6);

        $sousRubrique7 = new SousRubrique();
        $sousRubrique7 -> setLibelleCourt("Les bois");
        $sousRubrique7 -> setLibelle("Parmi les bois, on connaît bien le saxophone, la clarinette, le basson.");
        $sousRubrique7 -> setImage("bois.png");
        $sousRubrique7 -> setIdRubrique($rubrique3);

        $manager ->persist($sousRubrique7);

        //Fin des Sous-Rubriques.

        $manager->flush();
    }
    
}
