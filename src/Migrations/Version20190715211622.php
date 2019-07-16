<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190715211622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Article DROP FOREIGN KEY Article_ibfk_1');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, text VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE Article');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Article (Id INT AUTO_INCREMENT NOT NULL, userId INT DEFAULT NULL, title VARCHAR(100) DEFAULT NULL COLLATE latin1_swedish_ci, text TINYTEXT DEFAULT NULL COLLATE latin1_swedish_ci, INDEX userId (userId), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (Id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL COLLATE latin1_swedish_ci, surname VARCHAR(20) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE Article ADD CONSTRAINT Article_ibfk_1 FOREIGN KEY (userId) REFERENCES users (Id)');
        $this->addSql('DROP TABLE post');
    }
}
