<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624132017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison_article_livre DROP FOREIGN KEY FK_6B7D9E4E37D925CB');
        $this->addSql('ALTER TABLE livraison_article_livre DROP FOREIGN KEY FK_6B7D9E4E96678892');
        $this->addSql('ALTER TABLE fournit_fournisseur DROP FOREIGN KEY FK_114D05B3670C757F');
        $this->addSql('ALTER TABLE fournit_fournisseur DROP FOREIGN KEY FK_114D05B3F86F5C3D');
        $this->addSql('ALTER TABLE encadre_utilisateur DROP FOREIGN KEY FK_2E553DABFB88E14F');
        $this->addSql('ALTER TABLE encadre_utilisateur DROP FOREIGN KEY FK_2E553DABB6CFF88D');
        $this->addSql('ALTER TABLE gere_personnel DROP FOREIGN KEY FK_CA2F2AC71C109075');
        $this->addSql('ALTER TABLE gere_personnel DROP FOREIGN KEY FK_CA2F2AC79DAE9B40');
        $this->addSql('ALTER TABLE fournit_article DROP FOREIGN KEY FK_93BB49FA7294869C');
        $this->addSql('ALTER TABLE fournit_article DROP FOREIGN KEY FK_93BB49FAF86F5C3D');
        $this->addSql('ALTER TABLE composer_de_article DROP FOREIGN KEY FK_D0A0E1704EF75CC7');
        $this->addSql('ALTER TABLE composer_de_article DROP FOREIGN KEY FK_D0A0E1707294869C');
        $this->addSql('ALTER TABLE livraison_article_article DROP FOREIGN KEY FK_3D9778E27294869C');
        $this->addSql('ALTER TABLE livraison_article_article DROP FOREIGN KEY FK_3D9778E296678892');
        $this->addSql('ALTER TABLE encadre_personnel DROP FOREIGN KEY FK_3AE4DFBAB6CFF88D');
        $this->addSql('ALTER TABLE encadre_personnel DROP FOREIGN KEY FK_3AE4DFBA1C109075');
        $this->addSql('ALTER TABLE gere_article DROP FOREIGN KEY FK_F184D8AE7294869C');
        $this->addSql('ALTER TABLE gere_article DROP FOREIGN KEY FK_F184D8AE9DAE9B40');
        $this->addSql('DROP TABLE livraison_article_livre');
        $this->addSql('DROP TABLE fournit_fournisseur');
        $this->addSql('DROP TABLE encadre_utilisateur');
        $this->addSql('DROP TABLE gere_personnel');
        $this->addSql('DROP TABLE fournit_article');
        $this->addSql('DROP TABLE composer_de_article');
        $this->addSql('DROP TABLE livraison_article_article');
        $this->addSql('DROP TABLE encadre_personnel');
        $this->addSql('DROP TABLE gere_article');
        $this->addSql('ALTER TABLE commande ADD id_utilisateur_id INT DEFAULT NULL, CHANGE date_facture date_facture DATE NOT NULL, CHANGE etat_facturation etat_facture VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DC6EE5C49 ON commande (id_utilisateur_id)');
        $this->addSql('ALTER TABLE composer_de ADD id_article_id INT DEFAULT NULL, CHANGE id_commande_id id_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE composer_de ADD CONSTRAINT FK_B82468FBD71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_B82468FBD71E064B ON composer_de (id_article_id)');
        $this->addSql('ALTER TABLE encadre ADD matricule_personnel_id INT DEFAULT NULL, ADD id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE encadre ADD CONSTRAINT FK_441BA2B2B5962610 FOREIGN KEY (matricule_personnel_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE encadre ADD CONSTRAINT FK_441BA2B2C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_441BA2B2B5962610 ON encadre (matricule_personnel_id)');
        $this->addSql('CREATE INDEX IDX_441BA2B2C6EE5C49 ON encadre (id_utilisateur_id)');
        $this->addSql('ALTER TABLE fournit ADD numéro_fournisseur_id INT DEFAULT NULL, ADD id_article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fournit ADD CONSTRAINT FK_DDB29F679151CA7 FOREIGN KEY (numéro_fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE fournit ADD CONSTRAINT FK_DDB29F67D71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_DDB29F679151CA7 ON fournit (numéro_fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_DDB29F67D71E064B ON fournit (id_article_id)');
        $this->addSql('ALTER TABLE gere ADD id_personnel_id INT DEFAULT NULL, ADD id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gere ADD CONSTRAINT FK_E97897CE3FD1E507 FOREIGN KEY (id_personnel_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE gere ADD CONSTRAINT FK_E97897CEC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_E97897CE3FD1E507 ON gere (id_personnel_id)');
        $this->addSql('CREATE INDEX IDX_E97897CEC6EE5C49 ON gere (id_utilisateur_id)');
        $this->addSql('ALTER TABLE livraison_article ADD id_article_id INT DEFAULT NULL, ADD id_livraison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison_article ADD CONSTRAINT FK_42CC6004D71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE livraison_article ADD CONSTRAINT FK_42CC6004AD958E57 FOREIGN KEY (id_livraison_id) REFERENCES livre (id)');
        $this->addSql('CREATE INDEX IDX_42CC6004D71E064B ON livraison_article (id_article_id)');
        $this->addSql('CREATE INDEX IDX_42CC6004AD958E57 ON livraison_article (id_livraison_id)');
        $this->addSql('ALTER TABLE personnel CHANGE adresse adresse VARCHAR(100) NOT NULL, CHANGE téléphone téléphone VARCHAR(50) NOT NULL, CHANGE prenom prénom VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livraison_article_livre (livraison_article_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_6B7D9E4E96678892 (livraison_article_id), INDEX IDX_6B7D9E4E37D925CB (livre_id), PRIMARY KEY(livraison_article_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fournit_fournisseur (fournit_id INT NOT NULL, fournisseur_id INT NOT NULL, INDEX IDX_114D05B3670C757F (fournisseur_id), INDEX IDX_114D05B3F86F5C3D (fournit_id), PRIMARY KEY(fournit_id, fournisseur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE encadre_utilisateur (encadre_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_2E553DABB6CFF88D (encadre_id), INDEX IDX_2E553DABFB88E14F (utilisateur_id), PRIMARY KEY(encadre_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gere_personnel (gere_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_CA2F2AC79DAE9B40 (gere_id), INDEX IDX_CA2F2AC71C109075 (personnel_id), PRIMARY KEY(gere_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fournit_article (fournit_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_93BB49FAF86F5C3D (fournit_id), INDEX IDX_93BB49FA7294869C (article_id), PRIMARY KEY(fournit_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE composer_de_article (composer_de_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_D0A0E1704EF75CC7 (composer_de_id), INDEX IDX_D0A0E1707294869C (article_id), PRIMARY KEY(composer_de_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livraison_article_article (livraison_article_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_3D9778E296678892 (livraison_article_id), INDEX IDX_3D9778E27294869C (article_id), PRIMARY KEY(livraison_article_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE encadre_personnel (encadre_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_3AE4DFBA1C109075 (personnel_id), INDEX IDX_3AE4DFBAB6CFF88D (encadre_id), PRIMARY KEY(encadre_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gere_article (gere_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_F184D8AE9DAE9B40 (gere_id), INDEX IDX_F184D8AE7294869C (article_id), PRIMARY KEY(gere_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE livraison_article_livre ADD CONSTRAINT FK_6B7D9E4E37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article_livre ADD CONSTRAINT FK_6B7D9E4E96678892 FOREIGN KEY (livraison_article_id) REFERENCES livraison_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_fournisseur ADD CONSTRAINT FK_114D05B3670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_fournisseur ADD CONSTRAINT FK_114D05B3F86F5C3D FOREIGN KEY (fournit_id) REFERENCES fournit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_utilisateur ADD CONSTRAINT FK_2E553DABFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_utilisateur ADD CONSTRAINT FK_2E553DABB6CFF88D FOREIGN KEY (encadre_id) REFERENCES encadre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_personnel ADD CONSTRAINT FK_CA2F2AC71C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_personnel ADD CONSTRAINT FK_CA2F2AC79DAE9B40 FOREIGN KEY (gere_id) REFERENCES gere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_article ADD CONSTRAINT FK_93BB49FA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournit_article ADD CONSTRAINT FK_93BB49FAF86F5C3D FOREIGN KEY (fournit_id) REFERENCES fournit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composer_de_article ADD CONSTRAINT FK_D0A0E1704EF75CC7 FOREIGN KEY (composer_de_id) REFERENCES composer_de (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composer_de_article ADD CONSTRAINT FK_D0A0E1707294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article_article ADD CONSTRAINT FK_3D9778E27294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article_article ADD CONSTRAINT FK_3D9778E296678892 FOREIGN KEY (livraison_article_id) REFERENCES livraison_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_personnel ADD CONSTRAINT FK_3AE4DFBAB6CFF88D FOREIGN KEY (encadre_id) REFERENCES encadre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encadre_personnel ADD CONSTRAINT FK_3AE4DFBA1C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_article ADD CONSTRAINT FK_F184D8AE7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gere_article ADD CONSTRAINT FK_F184D8AE9DAE9B40 FOREIGN KEY (gere_id) REFERENCES gere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_article DROP FOREIGN KEY FK_42CC6004D71E064B');
        $this->addSql('ALTER TABLE livraison_article DROP FOREIGN KEY FK_42CC6004AD958E57');
        $this->addSql('DROP INDEX IDX_42CC6004D71E064B ON livraison_article');
        $this->addSql('DROP INDEX IDX_42CC6004AD958E57 ON livraison_article');
        $this->addSql('ALTER TABLE livraison_article DROP id_article_id, DROP id_livraison_id');
        $this->addSql('ALTER TABLE gere DROP FOREIGN KEY FK_E97897CE3FD1E507');
        $this->addSql('ALTER TABLE gere DROP FOREIGN KEY FK_E97897CEC6EE5C49');
        $this->addSql('DROP INDEX IDX_E97897CE3FD1E507 ON gere');
        $this->addSql('DROP INDEX IDX_E97897CEC6EE5C49 ON gere');
        $this->addSql('ALTER TABLE gere DROP id_personnel_id, DROP id_utilisateur_id');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC6EE5C49');
        $this->addSql('DROP INDEX IDX_6EEAA67DC6EE5C49 ON commande');
        $this->addSql('ALTER TABLE commande DROP id_utilisateur_id, CHANGE date_facture date_facture DATETIME NOT NULL, CHANGE etat_facture etat_facturation VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE fournit DROP FOREIGN KEY FK_DDB29F679151CA7');
        $this->addSql('ALTER TABLE fournit DROP FOREIGN KEY FK_DDB29F67D71E064B');
        $this->addSql('DROP INDEX IDX_DDB29F679151CA7 ON fournit');
        $this->addSql('DROP INDEX IDX_DDB29F67D71E064B ON fournit');
        $this->addSql('ALTER TABLE fournit DROP numéro_fournisseur_id, DROP id_article_id');
        $this->addSql('ALTER TABLE composer_de DROP FOREIGN KEY FK_B82468FBD71E064B');
        $this->addSql('DROP INDEX IDX_B82468FBD71E064B ON composer_de');
        $this->addSql('ALTER TABLE composer_de DROP id_article_id, CHANGE id_commande_id id_commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE personnel CHANGE adresse adresse VARCHAR(100) DEFAULT NULL, CHANGE téléphone téléphone VARCHAR(50) DEFAULT NULL, CHANGE prénom prenom VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE encadre DROP FOREIGN KEY FK_441BA2B2B5962610');
        $this->addSql('ALTER TABLE encadre DROP FOREIGN KEY FK_441BA2B2C6EE5C49');
        $this->addSql('DROP INDEX IDX_441BA2B2B5962610 ON encadre');
        $this->addSql('DROP INDEX IDX_441BA2B2C6EE5C49 ON encadre');
        $this->addSql('ALTER TABLE encadre DROP matricule_personnel_id, DROP id_utilisateur_id');
    }
}
