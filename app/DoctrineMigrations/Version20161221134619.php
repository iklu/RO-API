<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161221134619 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE auto_sub_category_has_producers');
        $this->addSql('DROP TABLE category_has_auto_subcategory');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auto_sub_category_has_producers (id INT AUTO_INCREMENT NOT NULL, subcategory_id INT DEFAULT NULL, producer_id INT DEFAULT NULL, INDEX IDX_8A77E93B5DC6FE57 (subcategory_id), INDEX IDX_8A77E93B89B658FE (producer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_has_auto_subcategory (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, subcategory_id INT DEFAULT NULL, INDEX IDX_A197610F12469DE2 (category_id), INDEX IDX_A197610F5DC6FE57 (subcategory_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auto_sub_category_has_producers ADD CONSTRAINT FK_8A77E93B5DC6FE57 FOREIGN KEY (subcategory_id) REFERENCES auto_sub_category (id)');
        $this->addSql('ALTER TABLE auto_sub_category_has_producers ADD CONSTRAINT FK_8A77E93B89B658FE FOREIGN KEY (producer_id) REFERENCES carproducer (id)');
        $this->addSql('ALTER TABLE category_has_auto_subcategory ADD CONSTRAINT FK_A197610F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE category_has_auto_subcategory ADD CONSTRAINT FK_A197610F5DC6FE57 FOREIGN KEY (subcategory_id) REFERENCES auto_sub_category (id)');
    }
}
