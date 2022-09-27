<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220927195453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sport_room (id INT AUTO_INCREMENT NOT NULL, partner_id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(20) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, phone VARCHAR(30) NOT NULL, active TINYINT(1) NOT NULL, permissions LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_5407F679393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sport_room ADD CONSTRAINT FK_5407F679393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sport_room DROP FOREIGN KEY FK_5407F679393F8FE');
        $this->addSql('DROP TABLE sport_room');
    }
}
