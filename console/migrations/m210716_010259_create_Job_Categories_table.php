<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Job_Categories}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_010259_create_Job_Categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Job_Categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Job_Categories-created_by}}',
            '{{%Job_Categories}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Job_Categories-created_by}}',
            '{{%Job_Categories}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Job_Categories-updated_by}}',
            '{{%Job_Categories}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Job_Categories-updated_by}}',
            '{{%Job_Categories}}',
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
            '{{%fk-Job_Categories-created_by}}',
            '{{%Job_Categories}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Job_Categories-created_by}}',
            '{{%Job_Categories}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Job_Categories-updated_by}}',
            '{{%Job_Categories}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Job_Categories-updated_by}}',
            '{{%Job_Categories}}'
        );

        $this->dropTable('{{%Job_Categories}}');
    }
}
