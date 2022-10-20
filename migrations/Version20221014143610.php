<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221014143610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, partner_id INT NOT NULL, sport_room_id INT NOT NULL, surname VARCHAR(100) NOT NULL, fistname VARCHAR(100) NOT NULL, gender VARCHAR(20) NOT NULL, phone VARCHAR(40) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, job_title VARCHAR(100) DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_4C62E6389393F8FE (partner_id), INDEX IDX_4C62E638F5A23C39 (sport_room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(10) NOT NULL, city VARCHAR(90) NOT NULL, country VARCHAR(90) NOT NULL, phone VARCHAR(20) NOT NULL, description LONGTEXT DEFAULT NULL, logo_url VARCHAR(255) DEFAULT NULL, website_url VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, default_perms LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport_room (id INT AUTO_INCREMENT NOT NULL, partner_id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(20) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, phone VARCHAR(30) NOT NULL, active TINYINT(1) NOT NULL, permissions LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_5407F679393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, uuid VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, surname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, gender VARCHAR(20) NOT NULL, phone VARCHAR(40) NOT NULL, email VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6389393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638F5A23C39 FOREIGN KEY (sport_room_id) REFERENCES sport_room (id)');
        $this->addSql('ALTER TABLE sport_room ADD CONSTRAINT FK_5407F679393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6389393F8FE');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638F5A23C39');
        $this->addSql('ALTER TABLE sport_room DROP FOREIGN KEY FK_5407F679393F8FE');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE sport_room');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
