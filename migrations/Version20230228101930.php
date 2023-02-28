<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228101930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD date_creation_contact DATETIME NOT NULL');
        $this->addSql('ALTER TABLE demande_prestation ADD date_creation_prestation DATETIME NOT NULL, ADD lieu_prestation VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP date_creation_contact');
        $this->addSql('ALTER TABLE demande_prestation DROP date_creation_prestation, DROP lieu_prestation');
    }
}
