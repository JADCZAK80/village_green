<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Encadre;
use App\Entity\Fournisseur;
use App\Entity\Fournit;
use App\Entity\Gere;
use App\Entity\Personnel;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    //hashage du mot de passe.
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    //fin du hashage.

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
        //Début Fournisseur.

        $fournisseur1 = new Fournisseur();
        $fournisseur1 -> setNuméroFournisseur("272-06-5061");
        $fournisseur1 -> setNom("Omega Protein Corporation");
        $fournisseur1 -> setAdresse("Apt 1425");
        $fournisseur1 -> setPays("China");
        $fournisseur1 -> setVille("Lingbei");
        $fournisseur1 -> setTéléphone("988-523-1996");
        $fournisseur1 -> setCodePostal("");

        $manager ->persist($fournisseur1);

        $fournisseur2 = new Fournisseur();
        $fournisseur2 -> setNuméroFournisseur("314-44-1522");
        $fournisseur2 -> setNom("BP p.l.c.");
        $fournisseur2 -> setAdresse("17th Floor");
        $fournisseur2 -> setPays("Philippines");
        $fournisseur2 -> setVille("San Jose");
        $fournisseur2 -> setTéléphone("701-605-2925");
        $fournisseur2 -> setCodePostal("8427");

        $manager ->persist($fournisseur2);

        $fournisseur3 = new Fournisseur();
        $fournisseur3 -> setNuméroFournisseur("431-40-3894");
        $fournisseur3 -> setNom("Celestica, Inc.");
        $fournisseur3 -> setAdresse("Room 1572");
        $fournisseur3 -> setPays("China");
        $fournisseur3 -> setVille("Hengshan");
        $fournisseur3 -> setTéléphone("389-738-5886");
        $fournisseur3 -> setCodePostal("");

        $manager ->persist($fournisseur3);

        $fournisseur4 = new Fournisseur();
        $fournisseur4 -> setNuméroFournisseur("467-98-9455");
        $fournisseur4 -> setNom("Evertec, Inc.");
        $fournisseur4 -> setAdresse("Apt 709");
        $fournisseur4 -> setPays("China");
        $fournisseur4 -> setVille("Shanxi");
        $fournisseur4 -> setTéléphone("606-430-5957");
        $fournisseur4 -> setCodePostal("");

        $manager ->persist($fournisseur4);

        $fournisseur5 = new Fournisseur();
        $fournisseur5 -> setNuméroFournisseur("490-14-2726");
        $fournisseur5 -> setNom("Armstrong World Industries Inc");
        $fournisseur5 -> setAdresse("7th Floor");
        $fournisseur5 -> setPays("Poland");
        $fournisseur5 -> setVille("Dobra");
        $fournisseur5 -> setTéléphone("251-355-5618");
        $fournisseur5 -> setCodePostal("72-210");

        $manager ->persist($fournisseur5);

        $fournisseur6 = new Fournisseur();
        $fournisseur6 -> setNuméroFournisseur("663-72-8566");
        $fournisseur6 -> setNom("Richmont Mines, Inc.");
        $fournisseur6 -> setAdresse("PO Box 25724");
        $fournisseur6 -> setPays("Ukraine");
        $fournisseur6 -> setVille("Fontanka");
        $fournisseur6 -> setTéléphone("532-238-0234");
        $fournisseur6 -> setCodePostal("");

        $manager ->persist($fournisseur6);

        $fournisseur7 = new Fournisseur();
        $fournisseur7 -> setNuméroFournisseur("706-78-5806");
        $fournisseur7 -> setNom("Bonanza Creek Energy, Inc.");
        $fournisseur7 -> setAdresse("Apt 229");
        $fournisseur7 -> setPays("Russia");
        $fournisseur7 -> setVille("Novozavedennoye");
        $fournisseur7 -> setTéléphone("784-332-2536");
        $fournisseur7 -> setCodePostal("357813");

        $manager ->persist($fournisseur7);

        $fournisseur8 = new Fournisseur();
        $fournisseur8 -> setNuméroFournisseur("750-35-0406");
        $fournisseur8 -> setNom("TrueCar, Inc.");
        $fournisseur8 -> setAdresse("PO Box 22055");
        $fournisseur8 -> setPays("Mexico");
        $fournisseur8 -> setVille("Santiago");
        $fournisseur8 -> setTéléphone("774-708-5322");
        $fournisseur8 -> setCodePostal("54784");

        $manager ->persist($fournisseur8);

        $fournisseur9 = new Fournisseur();
        $fournisseur9 -> setNuméroFournisseur("801-59-9912");
        $fournisseur9 -> setNom("Kenon Holdings Ltd.");
        $fournisseur9 -> setAdresse("PO Box 65049");
        $fournisseur9 -> setPays("China");
        $fournisseur9 -> setVille("Shataping");
        $fournisseur9 -> setTéléphone("135-131-0684");
        $fournisseur9 -> setCodePostal("");

        $manager ->persist($fournisseur9);

        $fournisseur10 = new Fournisseur();
        $fournisseur10 -> setNuméroFournisseur("865-64-9469");
        $fournisseur10 -> setNom("Exxon Mobil Corporation");
        $fournisseur10 -> setAdresse("PO Box 53794");
        $fournisseur10 -> setPays("Sweden");
        $fournisseur10 -> setVille("Bollstabruk");
        $fournisseur10 -> setTéléphone("480-709-3122");
        $fournisseur10 -> setCodePostal("873 80");

        $manager ->persist($fournisseur10);

        //Fin des Fournisseurs.
        //Debut Fournit.

        $fournit1 = new Fournit();
        $fournit1 -> setNuméroFournisseur($fournisseur1);
        $fournit1 -> setIdArticle($article1);

        $manager -> persist($fournit1);

        $fournit2 = new Fournit();
        $fournit2 -> setNuméroFournisseur($fournisseur1);
        $fournit2 -> setIdArticle($article11);

        $manager -> persist($fournit2);

        $fournit3 = new Fournit();
        $fournit3 -> setNuméroFournisseur($fournisseur1);
        $fournit3 -> setIdArticle($article21);

        $manager -> persist($fournit3);

        $fournit4 = new Fournit();
        $fournit4 -> setNuméroFournisseur($fournisseur2);
        $fournit4 -> setIdArticle($article2);

        $manager -> persist($fournit4);

        $fournit5 = new Fournit();
        $fournit5 -> setNuméroFournisseur($fournisseur2);
        $fournit5 -> setIdArticle($article12);

        $manager -> persist($fournit5);

        $fournit6 = new Fournit();
        $fournit6 -> setNuméroFournisseur($fournisseur3);
        $fournit6 -> setIdArticle($article3);

        $manager -> persist($fournit6);

        $fournit7 = new Fournit();
        $fournit7 -> setNuméroFournisseur($fournisseur3);
        $fournit7 -> setIdArticle($article13);

        $manager -> persist($fournit7);

        $fournit8 = new Fournit();
        $fournit8 -> setNuméroFournisseur($fournisseur4);
        $fournit8 -> setIdArticle($article4);

        $manager -> persist($fournit8);

        $fournit9 = new Fournit();
        $fournit9 -> setNuméroFournisseur($fournisseur4);
        $fournit9 -> setIdArticle($article14);

        $manager -> persist($fournit9);

        $fournit10 = new Fournit();
        $fournit10 -> setNuméroFournisseur($fournisseur5);
        $fournit10 -> setIdArticle($article5);

        $manager -> persist($fournit10);

        //Mi-Fournit

        $fournit11 = new Fournit();
        $fournit11 -> setNuméroFournisseur($fournisseur5);
        $fournit11 -> setIdArticle($article15);

        $manager -> persist($fournit11);

        $fournit12 = new Fournit();
        $fournit12 -> setNuméroFournisseur($fournisseur6);
        $fournit12 -> setIdArticle($article6);

        $manager -> persist($fournit12);

        $fournit13 = new Fournit();
        $fournit13 -> setNuméroFournisseur($fournisseur6);
        $fournit13 -> setIdArticle($article16);

        $manager -> persist($fournit13);

        $fournit14 = new Fournit();
        $fournit14 -> setNuméroFournisseur($fournisseur7);
        $fournit14 -> setIdArticle($article7);

        $manager -> persist($fournit14);

        $fournit15 = new Fournit();
        $fournit15 -> setNuméroFournisseur($fournisseur7);
        $fournit15 -> setIdArticle($article17);

        $manager -> persist($fournit15);

        $fournit16 = new Fournit();
        $fournit16 -> setNuméroFournisseur($fournisseur8);
        $fournit16 -> setIdArticle($article8);

        $manager -> persist($fournit16);

        $fournit17 = new Fournit();
        $fournit17 -> setNuméroFournisseur($fournisseur8);
        $fournit17 -> setIdArticle($article18);

        $manager -> persist($fournit17);

        $fournit18 = new Fournit();
        $fournit18 -> setNuméroFournisseur($fournisseur9);
        $fournit18 -> setIdArticle($article9);

        $manager -> persist($fournit18);

        $fournit19 = new Fournit();
        $fournit19 -> setNuméroFournisseur($fournisseur9);
        $fournit19 -> setIdArticle($article19);

        $manager -> persist($fournit19);

        $fournit20 = new Fournit();
        $fournit20 -> setNuméroFournisseur($fournisseur10);
        $fournit20 -> setIdArticle($article10);

        $manager -> persist($fournit20);

        $fournit21 = new Fournit();
        $fournit21 -> setNuméroFournisseur($fournisseur10);
        $fournit21 -> setIdArticle($article20);

        $manager -> persist($fournit21);

        //Fin Des données Fournit.

        //Début des utilisateurs.

        $utilisateur1 = new Utilisateur();
        $utilisateur1 -> setEmail("marc.dupont@gmail.com");
        //hashage du mot de passe.
        $hashedPassword = $this->passwordHasher->hashPassword($utilisateur1,'1Tunnel');
        $utilisateur1 -> setPassword($hashedPassword);
        $utilisateur1 -> setRoles(['ROLE_USER']);
        $utilisateur1 -> setNom("DUPONT");
        $utilisateur1 -> setPrenom("Marc");
        $utilisateur1 -> setAdresse("9 rue des pont");
        $utilisateur1 -> setCodePostal("80090");
        $utilisateur1 -> setPays("FRANCE");
        $utilisateur1 -> setVille("AMIENS");
        $utilisateur1 -> setTelephone("06/12/69/85/12");
        $utilisateur1 -> setReduction(10.00);
        $utilisateur1 -> setType("spéciale");
        $utilisateur1 -> setVerified(true);

        $manager -> persist($utilisateur1);
        
        $utilisateur2 = new Utilisateur();
        $utilisateur2 -> setEmail("marie.dupond@gmail.fr");
        $hashedPassword = $this->passwordHasher->hashPassword($utilisateur2,'1Vortex');
        $utilisateur2 -> setPassword($hashedPassword);
        $utilisateur2 -> setRoles(['ROLE_USER']);
        $utilisateur2 -> setNom("DUPOND");
        $utilisateur2 -> setPrenom("Marie");
        $utilisateur2 -> setAdresse("94 rue des porcs-épique");
        $utilisateur2 -> setCodePostal("85090");
        $utilisateur2 -> setPays("FRANCE");
        $utilisateur2 -> setVille("DOUX");
        $utilisateur2 -> setTelephone("06/14/71/47/58");
        $utilisateur2 -> setType("particulier");
        $utilisateur2 -> setVerified(true);

        $manager -> persist($utilisateur2);

        $utilisateur3 = new Utilisateur();
        $utilisateur3 -> setEmail("cesar.cap@hotmail.fr");
        $hashedPassword = $this->passwordHasher->hashPassword($utilisateur3,'2Gaulois');
        $utilisateur3 -> setPassword($hashedPassword);
        $utilisateur3 -> setRoles(['ROLE_USER']);
        $utilisateur3 -> setNom("CAP");
        $utilisateur3 -> setPrenom("Cesar");
        $utilisateur3 -> setAdresse("45 rue des laurier");
        $utilisateur3 -> setCodePostal("84090");
        $utilisateur3 -> setPays("FRANCE");
        $utilisateur3 -> setVille("AMER");
        $utilisateur3 -> setTelephone("06/17/32/47/63");
        $utilisateur3 -> setReduction(30.00);
        $utilisateur3 -> setType("spéciale");
        $utilisateur3 -> setVerified(true);

        $manager -> persist($utilisateur3);

        $utilisateur4 = new Utilisateur();
        $utilisateur4 -> setEmail("didier.inconnu@gmail.com");
        $hashedPassword = $this->passwordHasher->hashPassword($utilisateur4,'1Connu');
        $utilisateur4 -> setPassword($hashedPassword);
        $utilisateur4 -> setRoles(['ROLE_USER']);
        $utilisateur4 -> setNom("INCONNU");
        $utilisateur4 -> setPrenom("Didier");
        $utilisateur4 -> setAdresse("9 rue des impasses");
        $utilisateur4 -> setCodePostal("90000");
        $utilisateur4 -> setPays("FRANCE");
        $utilisateur4 -> setVille("PARTER");
        $utilisateur4 -> setTelephone("06/10/80/00/00");
        $utilisateur4 -> setType("particulier");
        $utilisateur4 -> setVerified(true);

        $manager -> persist($utilisateur4);

        $utilisateur5 = new Utilisateur();
        $utilisateur5 -> setEmail("belle.bella@gmail.fr");
        $hashedPassword = $this->passwordHasher->hashPassword($utilisateur5,'1Bgelle');
        $utilisateur5 -> setPassword($hashedPassword);
        $utilisateur5 -> setRoles(['ROLE_USER']);
        $utilisateur5 -> setNom("BELLA");
        $utilisateur5 -> setPrenom("Belle");
        $utilisateur5 -> setAdresse("90 rue des champs");
        $utilisateur5 -> setCodePostal("60000");
        $utilisateur5 -> setPays("FRANCE");
        $utilisateur5 -> setVille("ROSE");
        $utilisateur5 -> setTelephone("06/18/50/77/88");
        $utilisateur5 -> setReduction(12.00);
        $utilisateur5 -> setType("spéciale");
        $utilisateur5 -> setVerified(true);

        $manager -> persist($utilisateur5);

        //Fin des Utilisateurs.

        //Début des membres du Personnel

        $personnel1 = new Personnel();
        $personnel1 -> setEmail("pedro.alcapone@villagegreen.com");
        $hashedPassword = $this->passwordHasher->hashPassword($personnel1,'M1tra1lette');
        $personnel1 -> setPassword($hashedPassword);
        $personnel1 -> setRoles(['ROLE_USER','ROLE_CHEF']);
        $personnel1 -> setMatriculePersonnel("FED-4868-FES");
        $personnel1 -> setNom("ALCAPONE");
        $personnel1 -> setPrenom("Pedro");
        $personnel1 -> setAdresse("4 rue des lilas");
        $personnel1 -> setTéléphone("07/15/82/72/89");
        $personnel1 -> setService("COMMERCIAL");
        $personnel1 -> setCodePostal("84450");

        $manager -> persist($personnel1);

        $personnel2 = new Personnel();
        $personnel2 -> setEmail("magalax.licorne@villagegreen.com");
        $hashedPassword = $this->passwordHasher->hashPassword($personnel2,'M@tr@que');
        $personnel2 -> setPassword($hashedPassword);
        $personnel2 -> setRoles(['ROLE_USER','ROLE_CHEF','ROLE_GESTION']);
        $personnel2 -> setMatriculePersonnel("MAX-6858-LUX");
        $personnel2 -> setNom("LICORNE");
        $personnel2 -> setPrenom("Magalax");
        $personnel2 -> setAdresse("13 rue des arc-en-ciel");
        $personnel2 -> setTéléphone("09/12/40/89/69");
        $personnel2 -> setService("GESTION");
        $personnel2 -> setCodePostal("84450");

        $manager -> persist($personnel2);

        $personnel3 = new Personnel();
        $personnel3 -> setEmail("eric.popo@villagegreen.com");
        $hashedPassword = $this->passwordHasher->hashPassword($personnel3,'1KaKa00');
        $personnel3 -> setPassword($hashedPassword);
        $personnel3 -> setRoles(['ROLE_USER']);
        $personnel3 -> setMatriculePersonnel("POP-0088-POP");
        $personnel3 -> setNom("POPO");
        $personnel3 -> setPrenom("Eric");
        $personnel3 -> setAdresse("67 rue des déchets");
        $personnel3 -> setTéléphone("07/18/69/71/29");
        $personnel3 -> setService("COMMERCIAL");
        $personnel3 -> setCodePostal("84450");

        $manager -> persist($personnel3);

        $personnel4 = new Personnel();
        $personnel4 -> setEmail("aline.unknow@villagegreen.com");
        $hashedPassword = $this->passwordHasher->hashPassword($personnel4,'JeSa1sPas');
        $personnel4 -> setPassword($hashedPassword);
        $personnel4 -> setRoles(['ROLE_USER']);
        $personnel4 -> setMatriculePersonnel("UNK-0000-NOW");
        $personnel4 -> setNom("UNKNOW");
        $personnel4 -> setPrenom("Aline");
        $personnel4 -> setAdresse("1 allée de la plage");
        $personnel4 -> setTéléphone("07/15/82/72/89");
        $personnel4 -> setService("COMMERCIAL");
        $personnel4 -> setCodePostal("84482");

        $manager -> persist($personnel4);

        $personnel5 = new Personnel();
        $personnel5 -> setEmail("pablo.escobar@villagegreen.com");
        $hashedPassword = $this->passwordHasher->hashPassword($personnel5,'1Traf1que');
        $personnel5 -> setPassword($hashedPassword);
        $personnel5 -> setRoles(['ROLE_USER','ROLE_CHEF','ROLE_GESTION','ROLE_ADMIN']);
        $personnel5 -> setMatriculePersonnel("ZDE-4568-AZE");
        $personnel5 -> setNom("ESCOBAR");
        $personnel5 -> setPrenom("Pablo");
        $personnel5 -> setAdresse("9 rue des coques");
        $personnel5 -> setTéléphone("07/01/02/52/87");
        $personnel5 -> setService("DIRECTION");
        $personnel5 -> setCodePostal("84550");

        $manager -> persist($personnel5);

        //Fin des membres du Personnel.
        //Début Encadre.

        $encadre1 = new Encadre();
        $encadre1 -> setMatriculePersonnel($personnel4);
        $encadre1 -> setIdUtilisateur($utilisateur1);

        $manager -> persist($encadre1);

        $encadre2 = new Encadre();
        $encadre2 -> setMatriculePersonnel($personnel3);
        $encadre2 -> setIdUtilisateur($utilisateur2);

        $manager -> persist($encadre2);

        $encadre3 = new Encadre();
        $encadre3 -> setMatriculePersonnel($personnel4);
        $encadre3 -> setIdUtilisateur($utilisateur3);

        $manager -> persist($encadre3);

        $encadre4 = new Encadre();
        $encadre4 -> setMatriculePersonnel($personnel3);
        $encadre4 -> setIdUtilisateur($utilisateur4);

        $manager -> persist($encadre4);

        $encadre5 = new Encadre();
        $encadre5 -> setMatriculePersonnel($personnel4);
        $encadre5 -> setIdUtilisateur($utilisateur5);

        $manager -> persist($encadre5);

        //Fin Encadre.
        //Début Gere.

        $gere1 = new Gere();
        $gere1 -> setArticle($article1);
        $gere1 -> setPersonnel($personnel2);

        $manager -> persist($gere1);

        $gere2 = new Gere();
        $gere2 -> setArticle($article2);
        $gere2 -> setPersonnel($personnel2);

        $manager -> persist($gere2);

        $gere3 = new Gere();
        $gere3 -> setArticle($article3);
        $gere3 -> setPersonnel($personnel2);

        $manager -> persist($gere3);

        $gere4 = new Gere();
        $gere4 -> setArticle($article4);
        $gere4 -> setPersonnel($personnel2);

        $manager -> persist($gere4);

        $gere5 = new Gere();
        $gere5 -> setArticle($article5);
        $gere5 -> setPersonnel($personnel2);

        $manager -> persist($gere5);

        $gere6 = new Gere();
        $gere6 -> setArticle($article6);
        $gere6 -> setPersonnel($personnel2);

        $manager -> persist($gere6);

        $gere7 = new Gere();
        $gere7 -> setArticle($article7);
        $gere7 -> setPersonnel($personnel2);

        $manager -> persist($gere7);

        $gere8 = new Gere();
        $gere8 -> setArticle($article8);
        $gere8 -> setPersonnel($personnel2);

        $manager -> persist($gere8);

        $gere9 = new Gere();
        $gere9 -> setArticle($article9);
        $gere9 -> setPersonnel($personnel2);

        $manager -> persist($gere9);

        $gere10 = new Gere();
        $gere10 -> setArticle($article10);
        $gere10 -> setPersonnel($personnel2);

        $manager -> persist($gere10);

        $gere11 = new Gere();
        $gere11 -> setArticle($article11);
        $gere11 -> setPersonnel($personnel2);

        $manager -> persist($gere11);

        $gere12 = new Gere();
        $gere12 -> setArticle($article12);
        $gere12 -> setPersonnel($personnel2);

        $manager -> persist($gere12);

        $gere13 = new Gere();
        $gere13 -> setArticle($article13);
        $gere13 -> setPersonnel($personnel2);

        $manager -> persist($gere13);

        $gere14 = new Gere();
        $gere14 -> setArticle($article14);
        $gere14 -> setPersonnel($personnel2);

        $manager -> persist($gere14);

        $gere15 = new Gere();
        $gere15 -> setArticle($article15);
        $gere15 -> setPersonnel($personnel2);

        $manager -> persist($gere15);

        $gere16 = new Gere();
        $gere16 -> setArticle($article16);
        $gere16 -> setPersonnel($personnel2);

        $manager -> persist($gere16);

        $gere17 = new Gere();
        $gere17 -> setArticle($article17);
        $gere17 -> setPersonnel($personnel2);

        $manager -> persist($gere17);

        $gere18 = new Gere();
        $gere18 -> setArticle($article18);
        $gere18 -> setPersonnel($personnel2);

        $manager -> persist($gere18);

        $gere19 = new Gere();
        $gere19 -> setArticle($article19);
        $gere19 -> setPersonnel($personnel2);

        $manager -> persist($gere19);

        $gere20 = new Gere();
        $gere20 -> setArticle($article20);
        $gere20 -> setPersonnel($personnel2);

        $manager -> persist($gere20);

        $gere21 = new Gere();
        $gere21 -> setArticle($article21);
        $gere21 -> setPersonnel($personnel2);

        $manager -> persist($gere21);

        //Fin Gere.

        $manager->flush();
    }
    
}
