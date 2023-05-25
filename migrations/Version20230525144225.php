<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525144225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D63BDC119');
        $this->addSql('DROP INDEX IDX_6EEAA67D63BDC119 ON commande');
        $this->addSql('ALTER TABLE commande DROP commande_paiement_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD commande_paiement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D63BDC119 FOREIGN KEY (commande_paiement_id) REFERENCES paiement (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D63BDC119 ON commande (commande_paiement_id)');
    }
}
