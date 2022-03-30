<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Department}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_011840_create_Department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Department}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Department-created_by}}',
            '{{%Department}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Department-created_by}}',
            '{{%Department}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Department-updated_by}}',
            '{{%Department}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Department-updated_by}}',
            '{{%Department}}',
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
            '{{%fk-Department-created_by}}',
            '{{%Department}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Department-created_by}}',
            '{{%Department}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Department-updated_by}}',
            '{{%Department}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Department-updated_by}}',
            '{{%Department}}'
        );

        $this->dropTable('{{%Department}}');
    }
}
