<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Currencies}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_010450_create_Currencies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Currencies}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'currency_code' => $this->string(55)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Currencies-created_by}}',
            '{{%Currencies}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Currencies-created_by}}',
            '{{%Currencies}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Currencies-updated_by}}',
            '{{%Currencies}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Currencies-updated_by}}',
            '{{%Currencies}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Currencies-created_by}}',
            '{{%Currencies}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Currencies-created_by}}',
            '{{%Currencies}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Currencies-updated_by}}',
            '{{%Currencies}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Currencies-updated_by}}',
            '{{%Currencies}}'
        );

        $this->dropTable('{{%Currencies}}');
    }
}
