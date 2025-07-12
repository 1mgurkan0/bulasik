<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250711063341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alisveris_sirasi (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, daily_date DATETIME NOT NULL, is_completed TINYINT(1) NOT NULL, note VARCHAR(1024) NOT NULL, INDEX IDX_E7EDF8E4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cop_sirasi (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, daily_date DATETIME NOT NULL, is_completed TINYINT(1) NOT NULL, note VARCHAR(1024) DEFAULT NULL, INDEX IDX_8286C124A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alisveris_sirasi ADD CONSTRAINT FK_E7EDF8E4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cop_sirasi ADD CONSTRAINT FK_8286C124A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bulasik_sirasi CHANGE note note VARCHAR(1024) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alisveris_sirasi DROP FOREIGN KEY FK_E7EDF8E4A76ED395');
        $this->addSql('ALTER TABLE cop_sirasi DROP FOREIGN KEY FK_8286C124A76ED395');
        $this->addSql('DROP TABLE alisveris_sirasi');
        $this->addSql('DROP TABLE cop_sirasi');
        $this->addSql('ALTER TABLE bulasik_sirasi CHANGE note note VARCHAR(1024) NOT NULL');
    }
}
