<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260414150942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY `FK_FD0FF175FB88E14F`');
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY `FK_ALERTE_USER`');
        $this->addSql('DROP INDEX IDX_FD0FF175FB88E14F ON alertes_critiques');
        $this->addSql('ALTER TABLE alertes_critiques ADD utilisateur_id INT NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT FK_FD0FF175FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_FD0FF175FB88E14F ON alertes_critiques (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alertes_critiques DROP FOREIGN KEY FK_FD0FF175FB88E14F');
        $this->addSql('DROP INDEX IDX_FD0FF175FB88E14F ON alertes_critiques');
        $this->addSql('ALTER TABLE alertes_critiques ADD user_id INT DEFAULT NULL, DROP utilisateur_id');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT `FK_FD0FF175FB88E14F` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alertes_critiques ADD CONSTRAINT `FK_ALERTE_USER` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_FD0FF175FB88E14F ON alertes_critiques (user_id)');
    }
}
