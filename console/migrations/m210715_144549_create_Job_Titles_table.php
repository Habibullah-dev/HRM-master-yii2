<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Job_Titles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210715_144549_create_Job_Titles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Job_Titles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Job_Titles-created_by}}',
            '{{%Job_Titles}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Job_Titles-created_by}}',
            '{{%Job_Titles}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Job_Titles-updated_by}}',
            '{{%Job_Titles}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Job_Titles-updated_by}}',
            '{{%Job_Titles}}',
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
            '{{%fk-Job_Titles-created_by}}',
            '{{%Job_Titles}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Job_Titles-created_by}}',
            '{{%Job_Titles}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Job_Titles-updated_by}}',
            '{{%Job_Titles}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Job_Titles-updated_by}}',
            '{{%Job_Titles}}'
        );

        $this->dropTable('{{%Job_Titles}}');
    }
}
