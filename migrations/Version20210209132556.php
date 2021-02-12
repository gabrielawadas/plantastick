<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209132556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09569C9B4C FOREIGN KEY (colour_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094679B87C FOREIGN KEY (height_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09D614C7E7 FOREIGN KEY (price_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F094584665A ON order_item (product_id)');
        $this->addSql('CREATE INDEX IDX_52EA1F09569C9B4C ON order_item (colour_id)');
        $this->addSql('CREATE INDEX IDX_52EA1F094679B87C ON order_item (height_id)');
        $this->addSql('CREATE INDEX IDX_52EA1F09D614C7E7 ON order_item (price_id)');
        $this->addSql('ALTER TABLE product_colour DROP FOREIGN KEY FK_9884246A4584665A');
        $this->addSql('ALTER TABLE product_colour DROP FOREIGN KEY FK_9884246A569C9B4C');
        $this->addSql('ALTER TABLE product_colour ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE product_colour ADD CONSTRAINT FK_9884246A4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_colour ADD CONSTRAINT FK_9884246A569C9B4C FOREIGN KEY (colour_id) REFERENCES colour (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F094584665A');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09569C9B4C');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F094679B87C');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09D614C7E7');
        $this->addSql('DROP INDEX IDX_52EA1F094584665A ON order_item');
        $this->addSql('DROP INDEX IDX_52EA1F09569C9B4C ON order_item');
        $this->addSql('DROP INDEX IDX_52EA1F094679B87C ON order_item');
        $this->addSql('DROP INDEX IDX_52EA1F09D614C7E7 ON order_item');
        $this->addSql('ALTER TABLE product_colour MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE product_colour DROP FOREIGN KEY FK_9884246A4584665A');
        $this->addSql('ALTER TABLE product_colour DROP FOREIGN KEY FK_9884246A569C9B4C');
        $this->addSql('ALTER TABLE product_colour DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE product_colour ADD PRIMARY KEY id');
        $this->addSql('ALTER TABLE product_colour ADD CONSTRAINT FK_9884246A4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_colour ADD CONSTRAINT FK_9884246A569C9B4C FOREIGN KEY (colour_id) REFERENCES colour (id) ON UPDATE NO ACTION ON DELETE CASCADE, ALTER TABLE product_colour ADD PRIMARY KEY (product_id, colour_id)');
    }
}
