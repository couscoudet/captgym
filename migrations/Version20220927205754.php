<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220927205754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD partner_id INT NOT NULL, ADD sport_room_id INT NOT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6389393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638F5A23C39 FOREIGN KEY (sport_room_id) REFERENCES sport_room (id)');
        $this->addSql('CREATE INDEX IDX_4C62E6389393F8FE ON contact (partner_id)');
        $this->addSql('CREATE INDEX IDX_4C62E638F5A23C39 ON contact (sport_room_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6389393F8FE');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638F5A23C39');
        $this->addSql('DROP INDEX IDX_4C62E6389393F8FE ON contact');
        $this->addSql('DROP INDEX IDX_4C62E638F5A23C39 ON contact');
        $this->addSql('ALTER TABLE contact DROP partner_id, DROP sport_room_id');
    }
}
