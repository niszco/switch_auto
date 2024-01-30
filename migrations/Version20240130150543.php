<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240130150543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brands (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, company_name VARCHAR(255) DEFAULT NULL, type_of_customers ENUM(\'Particulier\', \'Professionnel\', \'Entreprise\') NOT NULL COMMENT \'(DC2Type:type_of_customers_enum)\', UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, vehicle_condition VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, price INT NOT NULL, localisation VARCHAR(255) NOT NULL, color ENUM(\'Orange\', \'Noir\', \'Gris clair\', \'Rouge\', \'Vert\', \'Bleu\', \'Jaune\', \'Violet\', \'Rose\', \'Marron\', \'Blanc\', \'Gris foncé\', \'Turquoise\', \'Saumon\', \'Beige\', \'Argent\', \'Doré\', \'Indigo\', \'Azur\', \'Brun\', \'Cyan\', \'Personnalisé\', \'Covering\') NOT NULL COMMENT \'(DC2Type:color_enum)\', type_of_vehicle ENUM(\'4X4\', \'SUV\', \'Citadine\', \'Monospace\', \'Berline\', \'Break\', \'Utilitaires\', \'Sans Permis\', \'Sportive\', \'Supercar\') NOT NULL COMMENT \'(DC2Type:type_of_vehicle_enum)\', car_mileage VARCHAR(255) NOT NULL, gearbox_type ENUM(\'Boîte Manuelle\', \'Boîte Automatique\', \'Boîte Automatique Pilotée\') NOT NULL COMMENT \'(DC2Type:gearbox_type_enum)\', finishes VARCHAR(255) NOT NULL, length VARCHAR(50) DEFAULT NULL, width VARCHAR(50) DEFAULT NULL, tire_spec VARCHAR(150) DEFAULT NULL, year INT NOT NULL, images VARCHAR(255) DEFAULT NULL, number_of_seats VARCHAR(30) NOT NULL, number_of_doors VARCHAR(30) NOT NULL, horsepower VARCHAR(30) NOT NULL, fiscal_horse_power VARCHAR(30) NOT NULL, co2_emissions VARCHAR(30) DEFAULT NULL, energy_consumption VARCHAR(30) NOT NULL, energy_types ENUM(\'Hybride\', \'Micro-Hybride\', \'Hybride SP95 rechargeable\', \'Hybride E85 rechargeable\', \'Hybride diesel rechargeable\', \'Essence\', \'Diesel\', \'GPL\', \'Hydrogène\', \'Autres énergies alternatives\', \'Électrique\') NOT NULL COMMENT \'(DC2Type:energy_types_enum)\', INDEX IDX_1B80E48644F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48644F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48644F5D008');
        $this->addSql('DROP TABLE brands');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
