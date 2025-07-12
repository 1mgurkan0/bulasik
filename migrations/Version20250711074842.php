<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250711074842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE task_assignment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, task_type_id INT NOT NULL, assigned_date DATE NOT NULL, created_a DATETIME NOT NULL, note VARCHAR(1024) DEFAULT NULL, INDEX IDX_2CD60F15A76ED395 (user_id), INDEX IDX_2CD60F15DAADA679 (task_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE task_assignment ADD CONSTRAINT FK_2CD60F15A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE task_assignment ADD CONSTRAINT FK_2CD60F15DAADA679 FOREIGN KEY (task_type_id) REFERENCES task_type (id)');
        $this->addSql('ALTER TABLE alisveris_sirasi DROP FOREIGN KEY FK_E7EDF8E4A76ED395');
        $this->addSql('ALTER TABLE bulasik_sirasi DROP FOREIGN KEY FK_B3B8E9E8A76ED395');
        $this->addSql('ALTER TABLE cop_sirasi DROP FOREIGN KEY FK_8286C124A76ED395');
        $this->addSql('DROP TABLE alisveris_sirasi');
        $this->addSql('DROP TABLE bulasik_sirasi');
        $this->addSql('DROP TABLE cop_sirasi');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alisveris_sirasi (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, daily_date DATETIME NOT NULL, is_completed TINYINT(1) NOT NULL, note VARCHAR(1024) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_E7EDF8E4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE bulasik_sirasi (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, daily_date DATETIME NOT NULL, is_completed TINYINT(1) NOT NULL, note VARCHAR(1024) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B3B8E9E8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cop_sirasi (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, daily_date DATETIME NOT NULL, is_completed TINYINT(1) NOT NULL, note VARCHAR(1024) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_8286C124A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE alisveris_sirasi ADD CONSTRAINT FK_E7EDF8E4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bulasik_sirasi ADD CONSTRAINT FK_B3B8E9E8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cop_sirasi ADD CONSTRAINT FK_8286C124A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE task_assignment DROP FOREIGN KEY FK_2CD60F15A76ED395');
        $this->addSql('ALTER TABLE task_assignment DROP FOREIGN KEY FK_2CD60F15DAADA679');
        $this->addSql('DROP TABLE task_assignment');
        $this->addSql('DROP TABLE task_type');
    }
}
