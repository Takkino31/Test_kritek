<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220410164812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice_lines CHANGE amount amount NUMERIC(10, 2) NOT NULL, CHANGE vatamount vatamount NUMERIC(10, 2) NOT NULL, CHANGE total_with_vat total_with_vat NUMERIC(10, 2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice_lines CHANGE amount amount NUMERIC(4, 2) NOT NULL, CHANGE vatamount vatamount NUMERIC(4, 0) NOT NULL, CHANGE total_with_vat total_with_vat NUMERIC(10, 0) NOT NULL');
    }
}
