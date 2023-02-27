<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224085533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom_contact VARCHAR(50) NOT NULL, prenom_contact VARCHAR(50) DEFAULT NULL, sujet_contact VARCHAR(255) NOT NULL, email_contact VARCHAR(255) DEFAULT NULL, telephone_contact VARCHAR(14) DEFAULT NULL, message_contact LONGTEXT NOT NULL, date_creation_prestation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, id_prof_id INT DEFAULT NULL, instrument_cours VARCHAR(255) NOT NULL, jour_cours VARCHAR(50) NOT NULL, heure_debut_cours VARCHAR(10) NOT NULL, heure_fin_cours VARCHAR(10) DEFAULT NULL, lieu_cours VARCHAR(255) NOT NULL, public_cours VARCHAR(255) DEFAULT NULL, ville_cours VARCHAR(255) NOT NULL, INDEX IDX_FDCA8C9C755C5E8E (id_prof_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_prestation (id INT AUTO_INCREMENT NOT NULL, nom_prestation VARCHAR(255) DEFAULT NULL, date_prestation DATE NOT NULL, heure_debut_prestation VARCHAR(10) NOT NULL, heure_fin_prestation VARCHAR(10) DEFAULT NULL, type_prestation VARCHAR(255) NOT NULL, informations_prestation LONGTEXT DEFAULT NULL, nb_minimum_sonneurs_prestation INT DEFAULT NULL, email_demandeur_prestation VARCHAR(255) DEFAULT NULL, telephone_demandeur_prestation VARCHAR(14) DEFAULT NULL, date_creation_prestation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom_evenement VARCHAR(255) NOT NULL, date_evenement DATE NOT NULL, heure_debut_evenement VARCHAR(10) NOT NULL, heure_fin_evenement VARCHAR(10) DEFAULT NULL, lieu_evenement VARCHAR(255) NOT NULL, photo_evenement VARCHAR(255) DEFAULT NULL, description_evenement LONGTEXT DEFAULT NULL, INDEX IDX_B26681E79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prof (id INT AUTO_INCREMENT NOT NULL, nom_prof VARCHAR(50) NOT NULL, prenom_prof VARCHAR(50) NOT NULL, pupitre_prof VARCHAR(255) NOT NULL, experience_prof LONGTEXT DEFAULT NULL, photo_prof VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_user VARCHAR(50) NOT NULL, prenom_user VARCHAR(50) NOT NULL, validation_adherent TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C755C5E8E FOREIGN KEY (id_prof_id) REFERENCES prof (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C755C5E8E');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E79F37AE5');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE demande_prestation');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE prof');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
