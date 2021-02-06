<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206125158 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item ADD height_id INT NOT NULL');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09569C9B4C FOREIGN KEY (colour_id) REFERENCES colour (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094679B87C FOREIGN KEY (height_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F09569C9B4C ON order_item (colour_id)');
        $this->addSql('CREATE INDEX IDX_52EA1F094679B87C ON order_item (height_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09569C9B4C');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F094679B87C');
        $this->addSql('DROP INDEX IDX_52EA1F09569C9B4C ON order_item');
        $this->addSql('DROP INDEX IDX_52EA1F094679B87C ON order_item');
        $this->addSql('ALTER TABLE order_item DROP height_id');
    }
}
