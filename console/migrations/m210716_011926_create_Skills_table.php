<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Skills}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_011926_create_Skills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Skills}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Skills-created_by}}',
            '{{%Skills}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Skills-created_by}}',
            '{{%Skills}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Skills-updated_by}}',
            '{{%Skills}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Skills-updated_by}}',
            '{{%Skills}}',
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
            '{{%fk-Skills-created_by}}',
            '{{%Skills}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Skills-created_by}}',
            '{{%Skills}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Skills-updated_by}}',
            '{{%Skills}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Skills-updated_by}}',
            '{{%Skills}}'
        );

        $this->dropTable('{{%Skills}}');
    }
}
