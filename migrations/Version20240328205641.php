<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328205641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lego_collection (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lego ADD collection_id INT DEFAULT NULL, ADD lego_image VARCHAR(255) NOT NULL, DROP imagebox, DROP imagebg, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE price price INT NOT NULL, CHANGE collection box_image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE lego ADD CONSTRAINT FK_E9191FC5514956FD FOREIGN KEY (collection_id) REFERENCES lego_collection (id)');
        $this->addSql('CREATE INDEX IDX_E9191FC5514956FD ON lego (collection_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lego DROP FOREIGN KEY FK_E9191FC5514956FD');
        $this->addSql('DROP TABLE lego_collection');
        $this->addSql('DROP INDEX IDX_E9191FC5514956FD ON lego');
        $this->addSql('ALTER TABLE lego ADD imagebox VARCHAR(256) NOT NULL, ADD imagebg VARCHAR(256) NOT NULL, ADD collection VARCHAR(255) NOT NULL, DROP collection_id, DROP box_image, DROP lego_image, CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(256) NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE description description TEXT NOT NULL');
    }
}
