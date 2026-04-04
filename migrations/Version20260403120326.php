<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260403120326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY `fk_event_user`');
        $this->addSql('ALTER TABLE fiche_consultation DROP FOREIGN KEY `fiche_consultation_ibfk_1`');
        $this->addSql('ALTER TABLE objectifs DROP FOREIGN KEY `objectifs_ibfk_1`');
        $this->addSql('ALTER TABLE planification DROP FOREIGN KEY `fk_planification_event`');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY `questions_ibfk_1`');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY `rendez_vous_ibfk_1`');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY `rendez_vous_ibfk_2`');
        $this->addSql('ALTER TABLE suivis DROP FOREIGN KEY `suivis_ibfk_1`');
        $this->addSql('ALTER TABLE suivis DROP FOREIGN KEY `suivis_ibfk_2`');
        $this->addSql('ALTER TABLE tests DROP FOREIGN KEY `tests_ibfk_1`');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE fiche_consultation');
        $this->addSql('DROP TABLE interpretations');
        $this->addSql('DROP TABLE journal_entries');
        $this->addSql('DROP TABLE objectifs');
        $this->addSql('DROP TABLE planification');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE reponses_scores');
        $this->addSql('DROP TABLE reservationrendez_vous');
        $this->addSql('DROP TABLE resultats');
        $this->addSql('DROP TABLE suivis');
        $this->addSql('DROP TABLE tests');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, event_date DATE NOT NULL, location VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, is_new TINYINT DEFAULT 0, creator_id INT DEFAULT NULL, INDEX fk_event_user (creator_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fiche_consultation (id INT AUTO_INCREMENT NOT NULL, rendez_vous_id INT DEFAULT NULL, notes TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, probleme_principal TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, diagnostic TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, recommandations TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, traitement TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, duree INT DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX rendez_vous_id (rendez_vous_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE interpretations (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, score_min INT NOT NULL, score_max INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, conseils TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX test_id (test_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE journal_entries (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, humeur ENUM(\'excellent\', \'bien\', \'moyen\', \'difficile\', \'très_difficile\') CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, emotions TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, note_texte TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, energie INT NOT NULL, sommeil_qualite INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX unique_user_date (user_id, date), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE objectifs (id_objectif INT AUTO_INCREMENT NOT NULL, suivi_id INT NOT NULL, titre VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, statut VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'en_cours\' COLLATE `utf8mb4_general_ci`, date_creation DATETIME DEFAULT CURRENT_TIMESTAMP, date_echeance DATE DEFAULT NULL, valide TINYINT DEFAULT 0, INDEX suivi_id (suivi_id), PRIMARY KEY (id_objectif)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE planification (id_planification INT AUTO_INCREMENT NOT NULL, id_event INT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, duree INT DEFAULT NULL, INDEX fk_planification_event (id_event), PRIMARY KEY (id_planification)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, texte TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, type_question VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, reponses_possibles TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, points INT DEFAULT 1, ordre INT DEFAULT NULL, obligatoire TINYINT DEFAULT 1, status VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'actif\' COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX test_id (test_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, userId INT NOT NULL, medecinId INT NOT NULL, dateRendezVous DATE NOT NULL, heureDebut TIME NOT NULL, heureFin TIME NOT NULL, type_seance VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, statut VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'en_attente\' COLLATE `utf8mb4_general_ci`, INDEX user_id (userId), INDEX medecin_id (medecinId), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reponses_scores (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, lettre_reponse VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, points INT DEFAULT 0 NOT NULL, INDEX idx_question_reponse (question_id, lettre_reponse), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationrendez_vous (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, medecin_id INT NOT NULL, rendez_vous_id INT NOT NULL, date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX user_id (user_id), INDEX medecin_id (medecin_id), INDEX reservationrendez_vous_ibfk_3 (rendez_vous_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE resultats (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT 1 NOT NULL, test_id INT NOT NULL, score_total INT DEFAULT 0 NOT NULL, date_test DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_test (test_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE suivis (id_suivi INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, psychologue_id INT NOT NULL, titre VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_creation DATETIME DEFAULT CURRENT_TIMESTAMP, date_modification DATETIME DEFAULT CURRENT_TIMESTAMP, status VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'actif\' COLLATE `utf8mb4_general_ci`, INDEX user_id (user_id), INDEX psychologue_id (psychologue_id), PRIMARY KEY (id_suivi)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tests (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, categorie VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, niveau VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, duree INT DEFAULT NULL, score_max INT DEFAULT 0, created_by INT DEFAULT NULL, status VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'brouillon\' COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX created_by (created_by), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, profile_photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, firstname VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, lastname VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, address VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, location VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, phone_number VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, role ENUM(\'etudiant\', \'enseignant\', \'psychologue\', \'coach_vie\', \'administrateur\') CHARACTER SET utf8mb4 DEFAULT \'etudiant\' COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, status VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'actif\' COLLATE `utf8mb4_general_ci`, UNIQUE INDEX email (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT `fk_event_user` FOREIGN KEY (creator_id) REFERENCES users (id) ON UPDATE CASCADE ON DELETE SET NULL');
        $this->addSql('ALTER TABLE fiche_consultation ADD CONSTRAINT `fiche_consultation_ibfk_1` FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE objectifs ADD CONSTRAINT `objectifs_ibfk_1` FOREIGN KEY (suivi_id) REFERENCES suivis (id_suivi) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planification ADD CONSTRAINT `fk_planification_event` FOREIGN KEY (id_event) REFERENCES events (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (test_id) REFERENCES tests (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (userId) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (medecinId) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE suivis ADD CONSTRAINT `suivis_ibfk_1` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivis ADD CONSTRAINT `suivis_ibfk_2` FOREIGN KEY (psychologue_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tests ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (created_by) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
