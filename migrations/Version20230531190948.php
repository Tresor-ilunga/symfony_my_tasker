<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230531190948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Cration de la relation entre la table priority et la table user';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE priority ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE priority ADD CONSTRAINT FK_62A6DC27A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_62A6DC27A76ED395 ON priority (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE priority DROP FOREIGN KEY FK_62A6DC27A76ED395');
        $this->addSql('DROP INDEX IDX_62A6DC27A76ED395 ON priority');
        $this->addSql('ALTER TABLE priority DROP user_id');
    }
}
