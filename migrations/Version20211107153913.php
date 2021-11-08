<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211107153913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE borrowing (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, book_id INT NOT NULL, booking_date DATE NOT NULL, expected_return_date DATE NOT NULL, return_date DATE DEFAULT NULL, INDEX IDX_226E5897A76ED395 (user_id), INDEX IDX_226E589716A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E589716A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('DROP TABLE bookings');
        $this->addSql('ALTER TABLE editor CHANGE name name VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookings (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, book_id INT NOT NULL, booking_date DATE NOT NULL, expected_return_date DATE NOT NULL, return_date DATE DEFAULT NULL, INDEX IDX_7A853C35A76ED395 (user_id), INDEX IDX_7A853C3516A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C3516A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE borrowing');
        $this->addSql('ALTER TABLE editor CHANGE name name VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
