<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810155755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_category_category_option (product_category_id INT NOT NULL, category_option_id INT NOT NULL, INDEX IDX_BD7E253ABE6903FD (product_category_id), INDEX IDX_BD7E253A60A4CF5F (category_option_id), PRIMARY KEY(product_category_id, category_option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_category_category_option ADD CONSTRAINT FK_BD7E253ABE6903FD FOREIGN KEY (product_category_id) REFERENCES product_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category_category_option ADD CONSTRAINT FK_BD7E253A60A4CF5F FOREIGN KEY (category_option_id) REFERENCES category_option (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_category_category_option');
    }
}
