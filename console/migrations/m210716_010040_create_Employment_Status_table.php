<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employment_Status}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_010040_create_Employment_Status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employment_Status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employment_Status-created_by}}',
            '{{%Employment_Status}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employment_Status-created_by}}',
            '{{%Employment_Status}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employment_Status-updated_by}}',
            '{{%Employment_Status}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employment_Status-updated_by}}',
            '{{%Employment_Status}}',
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
            '{{%fk-Employment_Status-created_by}}',
            '{{%Employment_Status}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employment_Status-created_by}}',
            '{{%Employment_Status}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employment_Status-updated_by}}',
            '{{%Employment_Status}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employment_Status-updated_by}}',
            '{{%Employment_Status}}'
        );

        $this->dropTable('{{%Employment_Status}}');
    }
}
