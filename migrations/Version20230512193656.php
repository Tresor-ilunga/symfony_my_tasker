<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512193656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation entre les priorités et les tâches';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task ADD priorities_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25E1F1C329 FOREIGN KEY (priorities_id) REFERENCES priority (id)');
        $this->addSql('CREATE INDEX IDX_527EDB25E1F1C329 ON task (priorities_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25E1F1C329');
        $this->addSql('DROP INDEX IDX_527EDB25E1F1C329 ON task');
        $this->addSql('ALTER TABLE task DROP priorities_id');
    }
}
