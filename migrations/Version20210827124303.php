<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210827124303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD start_date DATE DEFAULT NULL, ADD project_owner VARCHAR(255) DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD telephone INT DEFAULT NULL, ADD status VARCHAR(255) DEFAULT NULL, ADD currency VARCHAR(3) DEFAULT NULL, ADD hours_estimated DOUBLE PRECISION DEFAULT NULL, ADD price_reduction DOUBLE PRECISION DEFAULT NULL, ADD additional_cost DOUBLE PRECISION DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP start_date, DROP project_owner, DROP email, DROP telephone, DROP status, DROP currency, DROP hours_estimated, DROP price_reduction, DROP additional_cost, DROP created_at, DROP updated_at');
    }
}
