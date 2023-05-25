<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525143804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE famille famille LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE taille taille VARCHAR(100) NOT NULL, CHANGE color color VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE famille famille VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE nom nom VARCHAR(100) NOT NULL, CHANGE taille taille VARCHAR(50) NOT NULL, CHANGE color color VARCHAR(10) NOT NULL');
    }
}
