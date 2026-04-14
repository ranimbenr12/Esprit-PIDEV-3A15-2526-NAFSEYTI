<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260414144943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alertes_critiques (id INT AUTO_INCREMENT NOT NULL, reponses_resume LONGTEXT DEFAULT NULL, statut VARCHAR(20) NOT NULL, notes_admin LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, traite_le DATETIME DEFAULT NULL, traite_par VARCHAR(255) DEFAULT NULL, utilisateur_id INT NOT NULL, test_id INT NOT NULL, INDEX IDX_FD0FF175FB88E14F (utilisateur_id), INDEX IDX_FD0FF1751E5D0459 (test_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT FK_FD0FF175FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT FK_FD0FF1751E5D0459 FOREIGN KEY (test_id) REFERENCES tests (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY FK_FD0FF175FB88E14F');
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY FK_FD0FF1751E5D0459');
        $this->addSql('DROP TABLE alertes_critiques');
    }
}
