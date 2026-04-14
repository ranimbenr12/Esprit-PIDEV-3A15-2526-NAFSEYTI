<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260414172141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY `FK_FD0FF1751E5D0459`');
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY `FK_FD0FF175FB88E14F`');
        $this->addSql('ALTER TABLE alertes_critiques CHANGE reponses_resume reponses_resume LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT FK_FD0FF1751E5D0459 FOREIGN KEY (test_id) REFERENCES tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT FK_FD0FF175FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES users (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY FK_FD0FF175FB88E14F');
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY FK_FD0FF1751E5D0459');
        $this->addSql('ALTER TABLE alertes_critiques CHANGE reponses_resume reponses_resume LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT `FK_FD0FF175FB88E14F` FOREIGN KEY (utilisateur_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT `FK_FD0FF1751E5D0459` FOREIGN KEY (test_id) REFERENCES tests (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
