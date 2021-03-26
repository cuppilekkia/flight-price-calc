<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303224800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Setup the required tables with some dummy data';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE airport (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(3) NOT NULL, lat DOUBLE PRECISION NOT NULL, lng DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, code_departure VARCHAR(3) NOT NULL, code_arrival VARCHAR(3) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('INSERT INTO flight (code_departure, code_arrival, price) VALUES ("BRI", "MPS", "39"), ("BRI", "LND", "99"), ("MPS", "AMS", "59"), ("MPS", "LND", "49"), ("LND", "AMS", "39"), ("LND", "MPS", "39"), ("AMS", "MPS", "69"), ("LND", "BRI", "89"), ("MPS", "BRI", "49"); ');

        $this->addSql('INSERT INTO airport (name, code, lat, lng) VALUES ("Bari", "BRI", "1", "1"), ("Milano", "MPS", "2", "1"), ("Amsterdam", "AMS", "2", "3"), ("Londra", "LND", "3", "3"); ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE airport');
        $this->addSql('DROP TABLE flight');
    }
}
