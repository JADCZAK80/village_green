<?php

namespace App\DataFixtures;

use App\Entity\Article;
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

        //Début des articles.
        //Sous-Rubrique 1.

        $article1 = new Article();
        $article1 -> setLibelleCourt("Tambourin");
        $article1 -> setLibelle("Diamètre: 10\", Corps en bois, Peau naturelle clouée (non accordable), 9 paires de cymbalette");
        $article1 -> setImage("tambourin.png");
        $article1 -> setPrixHT(11.90);
        $article1 -> setIdSousRubrique($sousRubrique1);

        $manager -> persist($article1);

        $article2 = new Article();
        $article2 -> setLibelleCourt("Timbale");
        $article2 -> setLibelle("Fût parabolique en fibre de verre, Pédale d'accordage fixe, Accordage fin");
        $article2 -> setImage("timbale.png");
        $article2 -> setPrixHT(2100.90);
        $article2 -> setIdSousRubrique($sousRubrique1);

        $manager -> persist($article2);

        $article3 = new Article();
        $article3 -> setLibelleCourt("Djembé");
        $article3 -> setLibelle("Modèle 38241095, Hauteur: env. 500 mm, Diamètre: 240-260 mm, Fût en acajou, Peau de chèvre naturelle");
        $article3 -> setImage("djembe.png");
        $article3 -> setPrixHT(70.99);
        $article3 -> setIdSousRubrique($sousRubrique1);

        $manager -> persist($article3);

        //Sous-Rubrique 2.

        $article4 = new Article();
        $article4 -> setLibelleCourt("Xylophone");
        $article4 -> setLibelle("Format de table, 3 octaves, Tessiture: Do5 - Do8, La = 442 Hz, Cadre en bois");
        $article4 -> setImage("xylophone.png");
        $article4 -> setPrixHT(298.99);
        $article4 -> setIdSousRubrique($sousRubrique2);

        $manager -> persist($article4);

        $article5 = new Article();
        $article5 -> setLibelleCourt("Carillons tubulaires");
        $article5 -> setLibelle("1 1/2 octave, Tessiture: Do5 - Fa6, La = 442 Hz, Tubes standards 1,25\"");
        $article5 -> setImage("carillons.png");
        $article5 -> setPrixHT(5499.00);
        $article5 -> setIdSousRubrique($sousRubrique2);

        $manager -> persist($article5);

        $article6 = new Article();
        $article6 -> setLibelleCourt("Triangle");
        $article6 -> setLibelle("Triangle 15cm, Batte incl.");
        $article6 -> setImage("triangle.png");
        $article6 -> setPrixHT(5499.00);
        $article6 -> setIdSousRubrique($sousRubrique2);

        $manager -> persist($article6);

        //Sous-Rubrique 3.

        $article7 = new Article();
        $article7 -> setLibelleCourt("Contrebasse");
        $article7 -> setLibelle("Fabriquée en Europe, Table en épicéa massif, Fond bombé en érable massif, Touche ronde en ébène");
        $article7 -> setImage("contrebasse.png");
        $article7 -> setPrixHT(2490.00);
        $article7 -> setIdSousRubrique($sousRubrique3);

        $manager -> persist($article7);

        $article8 = new Article();
        $article8 -> setLibelleCourt("Violoncelle");
        $article8 -> setLibelle("Table et fond en contreplaqué, Manche en érable, Touche en érable teinté noir");
        $article8 -> setImage("violoncelle.png");
        $article8 -> setPrixHT(410.49);
        $article8 -> setIdSousRubrique($sousRubrique3);

        $manager -> persist($article8);

        $article9 = new Article();
        $article9 -> setLibelleCourt("Violon");
        $article9 -> setLibelle("Set bon marché comprenant un violon étudiant, un archet et un étui, Table en épicéa massif");
        $article9 -> setImage("violon.png");
        $article9 -> setPrixHT(70.00);
        $article9 -> setIdSousRubrique($sousRubrique3);

        $manager -> persist($article9);

        //Sous-Rubrique 4.

        $article10 = new Article();
        $article10 -> setLibelleCourt("Harpe");
        $article10 -> setLibelle("29 cordes, Tessiture: Sol3 - Sol, Corps et cadre en hêtre, Leviers de demi-ton");
        $article10 -> setImage("harpe.png");
        $article10 -> setPrixHT(550.00);
        $article10 -> setIdSousRubrique($sousRubrique4);

        $manager -> persist($article10);

        $article11 = new Article();
        $article11 -> setLibelleCourt("Harpe celtique");
        $article11 -> setLibelle("36 cordes, 31 leviers de demi-ton, Tessiture: Do1 - Do6, Corps en frêne");
        $article11 -> setImage("harpeC.png");
        $article11 -> setPrixHT(550.00);
        $article11 -> setIdSousRubrique($sousRubrique4);

        $manager -> persist($article11);

        $article12 = new Article();
        $article12 -> setLibelleCourt("Ukulélé");
        $article12 -> setLibelle("Electro-acoustique, Série Custom Line Kahuna, Pan coupé, Corps en acacia");
        $article12 -> setImage("ukulele.png");
        $article12 -> setPrixHT(111.15);
        $article12 -> setIdSousRubrique($sousRubrique4);

        $manager -> persist($article12);

        //Sous-Rubrique 5.

        $article13 = new Article();
        $article13 -> setLibelleCourt("Piano numérique");
        $article13 -> setLibelle("Avec accompagnement automatique, 88 touches lestées, Mécanique à marteaux, 500 sons");
        $article13 -> setImage("pianoNum.png");
        $article13 -> setPrixHT(555.55);
        $article13 -> setIdSousRubrique($sousRubrique5);

        $manager -> persist($article13);

        $article14 = new Article();
        $article14 -> setLibelleCourt("Piano droit");
        $article14 -> setLibelle("Equipé du système Aures,Mécanique Millennium III avec pièces en carbone ABS, Pupitre de 100 cm");
        $article14 -> setImage("pianoDroit.png");
        $article14 -> setPrixHT(13100.90);
        $article14 -> setIdSousRubrique($sousRubrique5);

        $manager -> persist($article14);

        $article15 = new Article();
        $article15 -> setLibelleCourt("Piano à queue");
        $article15 -> setLibelle("Mécanique Millennium III avec pièces en ABS Styran, Pédale sostenuto, Têtes des marteaux avec feutre");
        $article15 -> setImage("pianoAQue.png");
        $article15 -> setPrixHT(10100.99);
        $article15 -> setIdSousRubrique($sousRubrique5);

        $manager -> persist($article15);

        //Sous-Rubrique 6.

        $article16 = new Article();
        $article16 -> setLibelleCourt("Tuba");
        $article16 -> setLibelle("Modèle \"Student\", Tuba 4/4 compact, 4 palettes, Rotules");
        $article16 -> setImage("tuba.png");
        $article16 -> setPrixHT(1800.99);
        $article16 -> setIdSousRubrique($sousRubrique6);

        $manager -> persist($article16);

        $article17 = new Article();
        $article17 -> setLibelleCourt("Trompette");
        $article17 -> setLibelle("Branche d'embouchure en laiton doré, Pistons en acier inoxydable, Perce: ML");
        $article17 -> setImage("trompette.png");
        $article17 -> setPrixHT(149.99);
        $article17 -> setIdSousRubrique($sousRubrique6);

        $manager -> persist($article17);

        $article18 = new Article();
        $article18 -> setLibelleCourt("Trombone");
        $article18 -> setLibelle("Corps en laiton, Perce ML: 12,2 mm, Diamètre du pavillon: 205 mm");
        $article18 -> setImage("trombone.png");
        $article18 -> setPrixHT(189.99);
        $article18 -> setIdSousRubrique($sousRubrique6);

        $manager -> persist($article18);

        //Sous-Rubrique 7.

        $article19 = new Article();
        $article19 -> setLibelleCourt("Saxophone");
        $article19 -> setLibelle("Clé de Fa avant, Clé de Fa# aigu, Corps, bocal et clétage en laiton");
        $article19 -> setImage("saxophone.png");
        $article19 -> setPrixHT(555.55);
        $article19 -> setIdSousRubrique($sousRubrique7);

        $manager -> persist($article19);

        $article20 = new Article();
        $article20 -> setLibelleCourt("Clarinette");
        $article20 -> setLibelle("Nouvelle version améliorée, En grenadille, Système allemand");
        $article20 -> setImage("clarinette.png");
        $article20 -> setPrixHT(889.99);
        $article20 -> setIdSousRubrique($sousRubrique7);

        $manager -> persist($article20);

        $article21 = new Article();
        $article21 -> setLibelleCourt("Flûte traversière");
        $article21 -> setLibelle("Tête, corps et mécanique en maillechort argenté, Mi mécanique, Plateaux creux");
        $article21 -> setImage("flûteT.png");
        $article21 -> setPrixHT(889.99);
        $article21 -> setIdSousRubrique($sousRubrique7);

        $manager -> persist($article21);

        //Fin des articles.

        $manager->flush();
    }
    
}
