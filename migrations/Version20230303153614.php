<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303153614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact CHANGE telephone_contact telephone_contact VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_prestation CHANGE telephone_demandeur_prestation telephone_demandeur_prestation VARCHAR(25) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact CHANGE telephone_contact telephone_contact VARCHAR(14) DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_prestation CHANGE telephone_demandeur_prestation telephone_demandeur_prestation VARCHAR(14) DEFAULT NULL');
    }
}
