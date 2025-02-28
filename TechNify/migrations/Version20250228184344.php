<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250228184344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, address_line VARCHAR(255) NOT NULL, city VARCHAR(100) NOT NULL, postal_code VARCHAR(20) NOT NULL, country VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, INDEX IDX_880E0D76A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, product_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_68C58ED9A76ED395 (user_id), INDEX IDX_68C58ED94584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, user_order_id INT DEFAULT NULL, user_id INT DEFAULT NULL, total_amount NUMERIC(10, 2) NOT NULL, billing_address VARCHAR(255) NOT NULL, city VARCHAR(100) NOT NULL, postal_code VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_906517446D128938 (user_order_id), INDEX IDX_90651744A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE negotiation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, product_id INT DEFAULT NULL, base_price NUMERIC(10, 2) NOT NULL, negotiated_price NUMERIC(10, 2) NOT NULL, status VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_17989598A76ED395 (user_id), INDEX IDX_179895984584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_order_id INT DEFAULT NULL, quantity INT NOT NULL, unit_price NUMERIC(10, 2) NOT NULL, INDEX IDX_52EA1F094584665A (product_id), INDEX IDX_52EA1F096D128938 (user_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, transaction_id INT DEFAULT NULL, user_order_id INT DEFAULT NULL, payment_method VARCHAR(50) NOT NULL, status VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6D28840D2FC0CB0F (transaction_id), INDEX IDX_6D28840D6D128938 (user_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED94584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517446D128938 FOREIGN KEY (user_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE negotiation ADD CONSTRAINT FK_17989598A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE negotiation ADD CONSTRAINT FK_179895984584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F096D128938 FOREIGN KEY (user_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D2FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D6D128938 FOREIGN KEY (user_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE category ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE `order` ADD user_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON `order` (user_id)');
        $this->addSql('ALTER TABLE product ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user CHANGE username pseudo VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76A76ED395');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9A76ED395');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED94584665A');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517446D128938');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744A76ED395');
        $this->addSql('ALTER TABLE negotiation DROP FOREIGN KEY FK_17989598A76ED395');
        $this->addSql('ALTER TABLE negotiation DROP FOREIGN KEY FK_179895984584665A');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F094584665A');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F096D128938');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D2FC0CB0F');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D6D128938');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE negotiation');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE payment');
        $this->addSql('ALTER TABLE category DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('DROP INDEX IDX_F5299398A76ED395 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP user_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE user CHANGE pseudo username VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE product DROP created_at, DROP updated_at');
    }
}
