<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307081414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE parametre (id INT AUTO_INCREMENT NOT NULL, annee_scolaire_en_cours_parametre VARCHAR(50) NOT NULL, moment_repetition_parametre VARCHAR(255) NOT NULL, lieu_repetition_parametre VARCHAR(255) NOT NULL, categorie_bagad_parametre VARCHAR(50) NOT NULL, prix_cours_parametre VARCHAR(50) NOT NULL, prix_adhesion_parametre LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact CHANGE telephone_contact telephone_contact VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_prestation CHANGE telephone_demandeur_prestation telephone_demandeur_prestation VARCHAR(25) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE parametre');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('ALTER TABLE contact CHANGE telephone_contact telephone_contact VARCHAR(14) DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_prestation CHANGE telephone_demandeur_prestation telephone_demandeur_prestation VARCHAR(14) DEFAULT NULL');
    }
}
