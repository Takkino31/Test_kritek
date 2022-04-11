<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220410152226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice_lines (id INT AUTO_INCREMENT NOT NULL, invoice_id_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, quantity INT NOT NULL, amount NUMERIC(4, 2) NOT NULL, vatamount NUMERIC(4, 0) NOT NULL, total_with_vat NUMERIC(10, 0) NOT NULL, INDEX IDX_72DBDC23429ECEE2 (invoice_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_lines ADD CONSTRAINT FK_72DBDC23429ECEE2 FOREIGN KEY (invoice_id_id) REFERENCES invoice (id)');
        $this->addSql('DROP TABLE facture');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE invoice_lines');
    }
}
