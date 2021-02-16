<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212130641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_item_product_colour (order_item_id INT NOT NULL, product_colour_id INT NOT NULL, INDEX IDX_462FBBECE415FB15 (order_item_id), INDEX IDX_462FBBEC383C2DC1 (product_colour_id), PRIMARY KEY(order_item_id, product_colour_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_item_product_colour ADD CONSTRAINT FK_462FBBECE415FB15 FOREIGN KEY (order_item_id) REFERENCES order_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_item_product_colour ADD CONSTRAINT FK_462FBBEC383C2DC1 FOREIGN KEY (product_colour_id) REFERENCES product_colour (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE product_detail');
        $this->addSql('ALTER TABLE colour ADD CONSTRAINT FK_FAF865CE383C2DC1 FOREIGN KEY (product_colour_id) REFERENCES product_colour (id)');
        $this->addSql('CREATE INDEX IDX_FAF865CE383C2DC1 ON colour (product_colour_id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094679B87C FOREIGN KEY (height_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09D614C7E7 FOREIGN KEY (price_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F094584665A ON order_item (product_id)');
        $this->addSql('CREATE INDEX IDX_52EA1F094679B87C ON order_item (height_id)');
        $this->addSql('CREATE INDEX IDX_52EA1F09D614C7E7 ON order_item (price_id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD383C2DC1 FOREIGN KEY (product_colour_id) REFERENCES product_colour (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD383C2DC1 ON product (product_colour_id)');
        $this->addSql('ALTER TABLE product_colour MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE product_colour DROP FOREIGN KEY FK_9884246A569C9B4C');
        $this->addSql('DROP INDEX IDX_9884246A4584665A ON product_colour');
        $this->addSql('DROP INDEX IDX_9884246A569C9B4C ON product_colour');
        $this->addSql('ALTER TABLE product_colour DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE product_colour DROP product_id, DROP colour_id');
        $this->addSql('ALTER TABLE product_colour ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_detail (id INT AUTO_INCREMENT NOT NULL, name_id INT NOT NULL, height NUMERIC(5, 2) NOT NULL, colour VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, price NUMERIC(5, 2) NOT NULL, image_source VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_4C7A3E3771179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product_detail ADD CONSTRAINT FK_4C7A3E3771179CD6 FOREIGN KEY (name_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE order_item_product_colour');
        $this->addSql('ALTER TABLE colour DROP FOREIGN KEY FK_FAF865CE383C2DC1');
        $this->addSql('DROP INDEX IDX_FAF865CE383C2DC1 ON colour');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F094584665A');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F094679B87C');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09D614C7E7');
        $this->addSql('DROP INDEX IDX_52EA1F094584665A ON order_item');
        $this->addSql('DROP INDEX IDX_52EA1F094679B87C ON order_item');
        $this->addSql('DROP INDEX IDX_52EA1F09D614C7E7 ON order_item');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD383C2DC1');
        $this->addSql('DROP INDEX IDX_D34A04AD383C2DC1 ON product');
        $this->addSql('ALTER TABLE product_colour MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE product_colour DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE product_colour ADD product_id INT NOT NULL, ADD colour_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_colour ADD CONSTRAINT FK_9884246A569C9B4C FOREIGN KEY (colour_id) REFERENCES colour (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_9884246A4584665A ON product_colour (product_id)');
        $this->addSql('CREATE INDEX IDX_9884246A569C9B4C ON product_colour (colour_id)');
        $this->addSql('ALTER TABLE product_colour ADD PRIMARY KEY (id, product_id, colour_id)');
    }
}
