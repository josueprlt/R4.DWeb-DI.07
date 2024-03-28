<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328205801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lego (id INT AUTO_INCREMENT NOT NULL, collection_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, pieces INT NOT NULL, description LONGTEXT NOT NULL, box_image VARCHAR(255) NOT NULL, lego_image VARCHAR(255) NOT NULL, INDEX IDX_E9191FC5514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lego_collection (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lego ADD CONSTRAINT FK_E9191FC5514956FD FOREIGN KEY (collection_id) REFERENCES lego_collection (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lego DROP FOREIGN KEY FK_E9191FC5514956FD');
        $this->addSql('DROP TABLE lego');
        $this->addSql('DROP TABLE lego_collection');
    }
}
