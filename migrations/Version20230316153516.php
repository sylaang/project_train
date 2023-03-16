<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316153516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD user_id_id INT NOT NULL, ADD produit_id_id INT NOT NULL, DROP user_id, DROP produit_id');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC4FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC9D86650F ON commentaire (user_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67F068BC4FD8F9C3 ON commentaire (produit_id_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC279D86650F');
        $this->addSql('DROP INDEX UNIQ_29A5EC279D86650F ON produit');
        $this->addSql('ALTER TABLE produit DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC9D86650F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC4FD8F9C3');
        $this->addSql('DROP INDEX IDX_67F068BC9D86650F ON commentaire');
        $this->addSql('DROP INDEX UNIQ_67F068BC4FD8F9C3 ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD user_id INT NOT NULL, ADD produit_id INT NOT NULL, DROP user_id_id, DROP produit_id_id');
        $this->addSql('ALTER TABLE produit ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC279D86650F FOREIGN KEY (user_id) REFERENCES commentaire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC279D86650F ON produit (user_id)');
    }
}
