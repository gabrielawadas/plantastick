<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127155023 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colour (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE height (id INT AUTO_INCREMENT NOT NULL, number NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, number NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, image_source VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_colour (product_id INT NOT NULL, colour_id INT NOT NULL, INDEX IDX_9884246A4584665A (product_id), INDEX IDX_9884246A569C9B4C (colour_id), PRIMARY KEY(product_id, colour_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_height (product_id INT NOT NULL, height_id INT NOT NULL, INDEX IDX_9731A4AB4584665A (product_id), INDEX IDX_9731A4AB4679B87C (height_id), PRIMARY KEY(product_id, height_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_price (product_id INT NOT NULL, price_id INT NOT NULL, INDEX IDX_6B9459854584665A (product_id), INDEX IDX_6B945985D614C7E7 (price_id), PRIMARY KEY(product_id, price_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_colour ADD CONSTRAINT FK_9884246A4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_colour ADD CONSTRAINT FK_9884246A569C9B4C FOREIGN KEY (colour_id) REFERENCES colour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_height ADD CONSTRAINT FK_9731A4AB4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_height ADD CONSTRAINT FK_9731A4AB4679B87C FOREIGN KEY (height_id) REFERENCES height (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B9459854584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B945985D614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_colour DROP FOREIGN KEY FK_9884246A569C9B4C');
        $this->addSql('ALTER TABLE product_height DROP FOREIGN KEY FK_9731A4AB4679B87C');
        $this->addSql('ALTER TABLE product_price DROP FOREIGN KEY FK_6B945985D614C7E7');
        $this->addSql('ALTER TABLE product_colour DROP FOREIGN KEY FK_9884246A4584665A');
        $this->addSql('ALTER TABLE product_height DROP FOREIGN KEY FK_9731A4AB4584665A');
        $this->addSql('ALTER TABLE product_price DROP FOREIGN KEY FK_6B9459854584665A');
        $this->addSql('DROP TABLE colour');
        $this->addSql('DROP TABLE height');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_colour');
        $this->addSql('DROP TABLE product_height');
        $this->addSql('DROP TABLE product_price');
    }
}
