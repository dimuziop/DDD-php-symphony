<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190505192050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Creates `user` table';
    }
    
    public function up(Schema $schema) : void
    {
        $this->addSql(
            'CREATE TABLE users (
              id CHAR(36) PRIMARY KEY NOT NULL,
              name VARCHAR(100) NOT NULL,
              email VARCHAR(100) DEFAULT NULL,
              password BINARY(60) NOT NULL,
              roles VARCHAR(100) NOT NULL,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
              updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB'
        );
    }
    
    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE user');
    }
}
