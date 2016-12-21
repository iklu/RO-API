<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161221132413 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE producer_has_models');
        $this->addSql('ALTER TABLE carmodel ADD producers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carmodel ADD CONSTRAINT FK_41DA166EBDFDD466 FOREIGN KEY (producers_id) REFERENCES carproducer (id)');
        $this->addSql('CREATE INDEX IDX_41DA166EBDFDD466 ON carmodel (producers_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE producer_has_models (model_id INT NOT NULL, producer_id INT NOT NULL, INDEX IDX_E89FECBC89B658FE (producer_id), INDEX IDX_E89FECBC7975B7E7 (model_id), PRIMARY KEY(model_id, producer_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producer_has_models ADD CONSTRAINT FK_E89FECBC7975B7E7 FOREIGN KEY (model_id) REFERENCES carmodel (id)');
        $this->addSql('ALTER TABLE producer_has_models ADD CONSTRAINT FK_E89FECBC89B658FE FOREIGN KEY (producer_id) REFERENCES carproducer (id)');
        $this->addSql('ALTER TABLE carmodel DROP FOREIGN KEY FK_41DA166EBDFDD466');
        $this->addSql('DROP INDEX IDX_41DA166EBDFDD466 ON carmodel');
        $this->addSql('ALTER TABLE carmodel DROP producers_id');
    }
}
