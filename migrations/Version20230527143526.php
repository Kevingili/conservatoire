<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230527143526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cour (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, prof_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, niveau INTEGER NOT NULL, CONSTRAINT FK_A71F964FABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_A71F964FABC1F7FE ON cour (prof_id)');
        $this->addSql('CREATE TABLE cour_eleve (cour_id INTEGER NOT NULL, eleve_id INTEGER NOT NULL, PRIMARY KEY(cour_id, eleve_id), CONSTRAINT FK_129C8F4EB7942F03 FOREIGN KEY (cour_id) REFERENCES cour (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_129C8F4EA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_129C8F4EB7942F03 ON cour_eleve (cour_id)');
        $this->addSql('CREATE INDEX IDX_129C8F4EA6CC7B2 ON cour_eleve (eleve_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cour');
        $this->addSql('DROP TABLE cour_eleve');
    }
}
