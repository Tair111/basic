<?php

use yii\db\Migration;

class m160305_115241_create_table_calendar extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `evrnt_note` (
              `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
              `text` TEXT NOT NULL COMMENT '',
              `creator` INT NOT NULL COMMENT '',
              `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
              PRIMARY KEY (`id`)  COMMENT '',
              INDEX `fk_evrnt_note_1_idx` (`creator` ASC)  COMMENT '')
            ENGINE = InnoDB CHARACTER SET UTF8
        ");
    }

    public function safeDown()
    {
        $this->execute("
            DROP TABLE IF EXISTS `evrnt_note`;
        ");
    }
}
