<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211010001558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(10) NOT NULL, last_name VARCHAR(10) NOT NULL, biography VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, editor_id INT DEFAULT NULL, category_id INT DEFAULT NULL, title VARCHAR(20) NOT NULL, nbr_pages INT DEFAULT NULL, edition_date DATE DEFAULT NULL, nbr_copies INT NOT NULL, price INT DEFAULT NULL, isbn INT NOT NULL, INDEX IDX_CBE5A3316995AC4C (editor_id), INDEX IDX_CBE5A33112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookings (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, book_id INT NOT NULL, booking_date DATE NOT NULL, expected_return_date DATE NOT NULL, return_date DATE DEFAULT NULL, INDEX IDX_7A853C35A76ED395 (user_id), INDEX IDX_7A853C3516A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(10) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, country INT DEFAULT NULL, address VARCHAR(25) DEFAULT NULL, telephone INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, book_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C53D045F16A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, book_id INT NOT NULL, author_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_AF3C677916A2B381 (book_id), INDEX IDX_AF3C6779F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3316995AC4C FOREIGN KEY (editor_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C3516A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677916A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(10) DEFAULT NULL, ADD last_name VARCHAR(10) DEFAULT NULL, ADD birthday DATE DEFAULT NULL, ADD telephone INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779F675F31B');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C3516A2B381');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F16A2B381');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677916A2B381');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3316995AC4C');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33112469DE2');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE bookings');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE editor');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE publication');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, DROP birthday, DROP telephone');
    }
}
