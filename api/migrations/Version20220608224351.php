<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608224351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achievement_media_object (achievement_id INT NOT NULL, media_object_id INT NOT NULL, PRIMARY KEY(achievement_id, media_object_id))');
        $this->addSql('CREATE INDEX IDX_742C0154B3EC99FE ON achievement_media_object (achievement_id)');
        $this->addSql('CREATE INDEX IDX_742C015464DE5A5 ON achievement_media_object (media_object_id)');
        $this->addSql('ALTER TABLE achievement_media_object ADD CONSTRAINT FK_742C0154B3EC99FE FOREIGN KEY (achievement_id) REFERENCES achievement (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE achievement_media_object ADD CONSTRAINT FK_742C015464DE5A5 FOREIGN KEY (media_object_id) REFERENCES media_object (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE achievement ADD hero_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achievement ADD portfolio_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achievement ADD CONSTRAINT FK_96737FF198BB94C5 FOREIGN KEY (hero_image_id) REFERENCES media_object (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE achievement ADD CONSTRAINT FK_96737FF1412F7FF5 FOREIGN KEY (portfolio_image_id) REFERENCES media_object (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_96737FF198BB94C5 ON achievement (hero_image_id)');
        $this->addSql('CREATE INDEX IDX_96737FF1412F7FF5 ON achievement (portfolio_image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE achievement_media_object');
        $this->addSql('ALTER TABLE achievement DROP CONSTRAINT FK_96737FF198BB94C5');
        $this->addSql('ALTER TABLE achievement DROP CONSTRAINT FK_96737FF1412F7FF5');
        $this->addSql('DROP INDEX IDX_96737FF198BB94C5');
        $this->addSql('DROP INDEX IDX_96737FF1412F7FF5');
        $this->addSql('ALTER TABLE achievement DROP hero_image_id');
        $this->addSql('ALTER TABLE achievement DROP portfolio_image_id');
    }
}
