<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203101518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acces (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, autorisation_id INT NOT NULL, document VARCHAR(255) NOT NULL, INDEX IDX_D0F43B10FB88E14F (utilisateur_id), INDEX IDX_D0F43B1052C5E836 (autorisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autorisation (id INT AUTO_INCREMENT NOT NULL, lecture INT NOT NULL, ecriture INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acces ADD CONSTRAINT FK_D0F43B10FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE acces ADD CONSTRAINT FK_D0F43B1052C5E836 FOREIGN KEY (autorisation_id) REFERENCES autorisation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acces DROP FOREIGN KEY FK_D0F43B1052C5E836');
        $this->addSql('DROP TABLE acces');
        $this->addSql('DROP TABLE autorisation');
    }
}
