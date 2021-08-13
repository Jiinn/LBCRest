<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811141424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_option ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category_option ADD CONSTRAINT FK_556ECACB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_556ECACB4584665A ON category_option (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_option DROP FOREIGN KEY FK_556ECACB4584665A');
        $this->addSql('DROP INDEX IDX_556ECACB4584665A ON category_option');
        $this->addSql('ALTER TABLE category_option DROP product_id');
    }
}
