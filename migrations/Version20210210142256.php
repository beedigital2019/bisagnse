<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210142256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, pin_id INT DEFAULT NULL, numero_commande INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_6EEAA67DA76ED395 (user_id), INDEX IDX_6EEAA67D6C3B254C (pin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E6D6B297A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D6C3B254C FOREIGN KEY (pin_id) REFERENCES pin (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE commentaire ADD user_id INT DEFAULT NULL, ADD pin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC6C3B254C FOREIGN KEY (pin_id) REFERENCES pin (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCA76ED395 ON commentaire (user_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC6C3B254C ON commentaire (pin_id)');
        $this->addSql('ALTER TABLE jaime ADD user_id INT DEFAULT NULL, ADD pin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jaime ADD CONSTRAINT FK_3CB77805A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE jaime ADD CONSTRAINT FK_3CB778056C3B254C FOREIGN KEY (pin_id) REFERENCES pin (id)');
        $this->addSql('CREATE INDEX IDX_3CB77805A76ED395 ON jaime (user_id)');
        $this->addSql('CREATE INDEX IDX_3CB778056C3B254C ON jaime (pin_id)');
        $this->addSql('ALTER TABLE pin ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pin ADD CONSTRAINT FK_B5852DF3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B5852DF3A76ED395 ON pin (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE jaime DROP FOREIGN KEY FK_3CB77805A76ED395');
        $this->addSql('ALTER TABLE pin DROP FOREIGN KEY FK_B5852DF3A76ED395');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297A76ED395');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC6C3B254C');
        $this->addSql('DROP INDEX IDX_67F068BCA76ED395 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC6C3B254C ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP user_id, DROP pin_id');
        $this->addSql('ALTER TABLE jaime DROP FOREIGN KEY FK_3CB778056C3B254C');
        $this->addSql('DROP INDEX IDX_3CB77805A76ED395 ON jaime');
        $this->addSql('DROP INDEX IDX_3CB778056C3B254C ON jaime');
        $this->addSql('ALTER TABLE jaime DROP user_id, DROP pin_id');
        $this->addSql('DROP INDEX IDX_B5852DF3A76ED395 ON pin');
        $this->addSql('ALTER TABLE pin DROP user_id');
    }
}
