<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624110026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, id_sous_rubrique_id INT DEFAULT NULL, libelle_court VARCHAR(30) NOT NULL, libelle VARCHAR(100) NOT NULL, image VARCHAR(100) DEFAULT NULL, prix_ht DOUBLE PRECISION NOT NULL, INDEX IDX_23A0E669860AED1 (id_sous_rubrique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, date_commande DATE NOT NULL, montant_commande_ht DOUBLE PRECISION NOT NULL, montant_commande_ttc DOUBLE PRECISION NOT NULL, tva DOUBLE PRECISION DEFAULT NULL, id_facture INT NOT NULL, date_facture DATETIME NOT NULL, moyen_paiement VARCHAR(20) NOT NULL, adresse_facturation VARCHAR(100) NOT NULL, etat_facturation VARCHAR(20) NOT NULL, adresse_livraison VARCHAR(100) NOT NULL, etat_livraison VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composer_de (id INT AUTO_INCREMENT NOT NULL, id_commande_id INT NOT NULL, nombre_article INT NOT NULL, INDEX IDX_B82468FB9AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composer_de_article (composer_de_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_D0A0E1704EF75CC7 (composer_de_id), INDEX IDX_D0A0E1707294869C (article_id), PRIMARY KEY(composer_de_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encadre (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encadre_utilisateur (encadre_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_2E553DABB6CFF88D (encadre_id), INDEX IDX_2E553DABFB88E14F (utilisateur_id), PRIMARY KEY(encadre_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encadre_personnel (encadre_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_3AE4DFBAB6CFF88D (encadre_id), INDEX IDX_3AE4DFBA1C109075 (personnel_id), PRIMARY KEY(encadre_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, numéro_fournisseur VARCHAR(20) NOT NULL, nom VARCHAR(50) NOT NULL, adresse VARCHAR(200) NOT NULL, pays VARCHAR(30) NOT NULL, ville VARCHAR(50) NOT NULL, téléphone VARCHAR(20) NOT NULL, code_postal VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournit_fournisseur (fournit_id INT NOT NULL, fournisseur_id INT NOT NULL, INDEX IDX_114D05B3F86F5C3D (fournit_id), INDEX IDX_114D05B3670C757F (fournisseur_id), PRIMARY KEY(fournit_id, fournisseur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournit_article (fournit_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_93BB49FAF86F5C3D (fournit_id), INDEX IDX_93BB49FA7294869C (article_id), PRIMARY KEY(fournit_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gere (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gere_article (gere_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_F184D8AE9DAE9B40 (gere_id), INDEX IDX_F184D8AE7294869C (article_id), PRIMARY KEY(gere_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gere_personnel (gere_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_CA2F2AC79DAE9B40 (gere_id), INDEX IDX_CA2F2AC71C109075 (personnel_id), PRIMARY KEY(gere_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison_article (id INT AUTO_INCREMENT NOT NULL, quantité_livré INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison_article_article (livraison_article_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_3D9778E296678892 (livraison_article_id), INDEX IDX_3D9778E27294869C (article_id), PRIMARY KEY(livraison_article_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison_article_livre (livraison_article_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_6B7D9E4E96678892 (livraison_article_id), INDEX IDX_6B7D9E4E37D925CB (livre_id), PRIMARY KEY(livraison_article_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, id_commande_id INT DEFAULT NULL, date_livraison DATE DEFAULT NULL, url_transporteur VARCHAR(50) DEFAULT NULL, nom_transporteur VARCHAR(50) DEFAULT NULL, INDEX IDX_AC634F999AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, matricule_personnel VARCHAR(30) NOT NULL, prenom VARCHAR(50) DEFAULT NULL, nom VARCHAR(50) NOT NULL, adresse VARCHAR(100) DEFAULT NULL, téléphone VARCHAR(50) DEFAULT NULL, service VARCHAR(20) NOT NULL, code_postal VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubrique (id INT AUTO_INCREMENT NOT NULL, libelle_court VARCHAR(30) NOT NULL, libelle VARCHAR(100) NOT NULL, image VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_rubrique (id INT AUTO_INCREMENT NOT NULL, id_rubrique_id INT DEFAULT NULL, libelle_court VARCHAR(30) NOT NULL, libelle VARCHAR(100) NOT NULL, image VARCHAR(100) DEFAULT NULL, INDEX IDX_87EA3D2923C145C4 (id_rubrique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prénom VARCHAR(50) NOT NULL, adresse VARCHAR(100) NOT NULL, code_postal VARCHAR(20) NOT NULL, pays VARCHAR(30) NOT NULL, ville VARCHAR(50) NOT NULL, téléphone VARCHAR(20) NOT NULL, réduction DOUBLE PRECISION DEFAULT NULL, type VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669860AED1 FOREIGN KEY (id_sous_rubrique_id) REFERENCES sous_rubrique (id)');
        $this->addSql('ALTER TABLE composer_de ADD CONSTRAINT FK_B82468FB9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE composer_de_article ADD CONSTRAINT FK_D0A0E1704EF75CC7 FOREIGN KEY (composer_de_id) REFERENCES composer_de (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composer_de_article ADD CONSTRAINT FK_D0A0E1707294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_utilisateur ADD CONSTRAINT FK_2E553DABB6CFF88D FOREIGN KEY (encadre_id) REFERENCES encadre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_utilisateur ADD CONSTRAINT FK_2E553DABFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_personnel ADD CONSTRAINT FK_3AE4DFBAB6CFF88D FOREIGN KEY (encadre_id) REFERENCES encadre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_personnel ADD CONSTRAINT FK_3AE4DFBA1C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_fournisseur ADD CONSTRAINT FK_114D05B3F86F5C3D FOREIGN KEY (fournit_id) REFERENCES fournit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_fournisseur ADD CONSTRAINT FK_114D05B3670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_article ADD CONSTRAINT FK_93BB49FAF86F5C3D FOREIGN KEY (fournit_id) REFERENCES fournit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_article ADD CONSTRAINT FK_93BB49FA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_article ADD CONSTRAINT FK_F184D8AE9DAE9B40 FOREIGN KEY (gere_id) REFERENCES gere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_article ADD CONSTRAINT FK_F184D8AE7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_personnel ADD CONSTRAINT FK_CA2F2AC79DAE9B40 FOREIGN KEY (gere_id) REFERENCES gere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_personnel ADD CONSTRAINT FK_CA2F2AC71C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article_article ADD CONSTRAINT FK_3D9778E296678892 FOREIGN KEY (livraison_article_id) REFERENCES livraison_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article_article ADD CONSTRAINT FK_3D9778E27294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article_livre ADD CONSTRAINT FK_6B7D9E4E96678892 FOREIGN KEY (livraison_article_id) REFERENCES livraison_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article_livre ADD CONSTRAINT FK_6B7D9E4E37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F999AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE sous_rubrique ADD CONSTRAINT FK_87EA3D2923C145C4 FOREIGN KEY (id_rubrique_id) REFERENCES rubrique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E669860AED1');
        $this->addSql('ALTER TABLE composer_de DROP FOREIGN KEY FK_B82468FB9AF8E3A3');
        $this->addSql('ALTER TABLE composer_de_article DROP FOREIGN KEY FK_D0A0E1704EF75CC7');
        $this->addSql('ALTER TABLE composer_de_article DROP FOREIGN KEY FK_D0A0E1707294869C');
        $this->addSql('ALTER TABLE encadre_utilisateur DROP FOREIGN KEY FK_2E553DABB6CFF88D');
        $this->addSql('ALTER TABLE encadre_utilisateur DROP FOREIGN KEY FK_2E553DABFB88E14F');
        $this->addSql('ALTER TABLE encadre_personnel DROP FOREIGN KEY FK_3AE4DFBAB6CFF88D');
        $this->addSql('ALTER TABLE encadre_personnel DROP FOREIGN KEY FK_3AE4DFBA1C109075');
        $this->addSql('ALTER TABLE fournit_fournisseur DROP FOREIGN KEY FK_114D05B3F86F5C3D');
        $this->addSql('ALTER TABLE fournit_fournisseur DROP FOREIGN KEY FK_114D05B3670C757F');
        $this->addSql('ALTER TABLE fournit_article DROP FOREIGN KEY FK_93BB49FAF86F5C3D');
        $this->addSql('ALTER TABLE fournit_article DROP FOREIGN KEY FK_93BB49FA7294869C');
        $this->addSql('ALTER TABLE gere_article DROP FOREIGN KEY FK_F184D8AE9DAE9B40');
        $this->addSql('ALTER TABLE gere_article DROP FOREIGN KEY FK_F184D8AE7294869C');
        $this->addSql('ALTER TABLE gere_personnel DROP FOREIGN KEY FK_CA2F2AC79DAE9B40');
        $this->addSql('ALTER TABLE gere_personnel DROP FOREIGN KEY FK_CA2F2AC71C109075');
        $this->addSql('ALTER TABLE livraison_article_article DROP FOREIGN KEY FK_3D9778E296678892');
        $this->addSql('ALTER TABLE livraison_article_article DROP FOREIGN KEY FK_3D9778E27294869C');
        $this->addSql('ALTER TABLE livraison_article_livre DROP FOREIGN KEY FK_6B7D9E4E96678892');
        $this->addSql('ALTER TABLE livraison_article_livre DROP FOREIGN KEY FK_6B7D9E4E37D925CB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F999AF8E3A3');
        $this->addSql('ALTER TABLE sous_rubrique DROP FOREIGN KEY FK_87EA3D2923C145C4');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE composer_de');
        $this->addSql('DROP TABLE composer_de_article');
        $this->addSql('DROP TABLE encadre');
        $this->addSql('DROP TABLE encadre_utilisateur');
        $this->addSql('DROP TABLE encadre_personnel');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE fournit');
        $this->addSql('DROP TABLE fournit_fournisseur');
        $this->addSql('DROP TABLE fournit_article');
        $this->addSql('DROP TABLE gere');
        $this->addSql('DROP TABLE gere_article');
        $this->addSql('DROP TABLE gere_personnel');
        $this->addSql('DROP TABLE livraison_article');
        $this->addSql('DROP TABLE livraison_article_article');
        $this->addSql('DROP TABLE livraison_article_livre');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE rubrique');
        $this->addSql('DROP TABLE sous_rubrique');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
