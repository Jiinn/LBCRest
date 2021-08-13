<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811141951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_category_option');
        $this->addSql('ALTER TABLE category_option DROP FOREIGN KEY FK_556ECACB4584665A');
        $this->addSql('DROP INDEX IDX_556ECACB4584665A ON category_option');
        $this->addSql('ALTER TABLE category_option DROP product_id');
        $this->addSql('ALTER TABLE product ADD option1_id INT DEFAULT NULL, ADD option2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBC69547 FOREIGN KEY (option1_id) REFERENCES category_option (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD19733AA9 FOREIGN KEY (option2_id) REFERENCES category_option (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADBC69547 ON product (option1_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD19733AA9 ON product (option2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_category_option (product_id INT NOT NULL, category_option_id INT NOT NULL, INDEX IDX_67E5CF564584665A (product_id), INDEX IDX_67E5CF5660A4CF5F (category_option_id), PRIMARY KEY(product_id, category_option_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product_category_option ADD CONSTRAINT FK_67E5CF564584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category_option ADD CONSTRAINT FK_67E5CF5660A4CF5F FOREIGN KEY (category_option_id) REFERENCES category_option (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_option ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category_option ADD CONSTRAINT FK_556ECACB4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_556ECACB4584665A ON category_option (product_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBC69547');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD19733AA9');
        $this->addSql('DROP INDEX IDX_D34A04ADBC69547 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD19733AA9 ON product');
        $this->addSql('ALTER TABLE product DROP option1_id, DROP option2_id');
    }
}
