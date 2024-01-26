<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240126174548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle CHANGE energy_type energy_types ENUM(\'Hybride\', \'Micro-Hybride\', \'Hybride SP95 rechargeable\', \'Hybride E85 rechargeable\', \'Hybride diesel rechargeable\', \'Essence\', \'Diesel\', \'GPL\', \'Hydrogène\', \'Autres énergies alternatives\', \'Électrique\') NOT NULL COMMENT \'(DC2Type:energy_types_enum)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle CHANGE energy_types energy_type ENUM(\'Hybride\', \'Micro-Hybride\', \'Hybride SP95 rechargeable\', \'Hybride E85 rechargeable\', \'Hybride diesel rechargeable\', \'Essence\', \'Diesel\', \'GPL\', \'Hydrogène\', \'Autres énergies alternatives\', \'Électrique\') NOT NULL COMMENT \'(DC2Type:energy_types_enum)\'');
    }
}
