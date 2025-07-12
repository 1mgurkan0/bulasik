<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250711062635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bulasik_sirasi (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, daily_date DATETIME NOT NULL, is_completed TINYINT(1) NOT NULL, note VARCHAR(1024) NOT NULL, INDEX IDX_B3B8E9E8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bulasik_sirasi ADD CONSTRAINT FK_B3B8E9E8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bulasik_sirasi DROP FOREIGN KEY FK_B3B8E9E8A76ED395');
        $this->addSql('DROP TABLE bulasik_sirasi');
    }
}
