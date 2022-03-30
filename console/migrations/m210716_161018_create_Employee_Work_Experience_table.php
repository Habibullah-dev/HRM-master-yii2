<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Work_Experience}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_161018_create_Employee_Work_Experience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Work_Experience}}', [
            'id' => $this->primaryKey(),
            'company_name' => $this->string(55)->notNull(),
            'job_title' => $this->string(255)->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'comment' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Work_Experience-created_by}}',
            '{{%Employee_Work_Experience}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Work_Experience-created_by}}',
            '{{%Employee_Work_Experience}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Work_Experience-updated_by}}',
            '{{%Employee_Work_Experience}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Work_Experience-updated_by}}',
            '{{%Employee_Work_Experience}}',
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
            '{{%fk-Employee_Work_Experience-created_by}}',
            '{{%Employee_Work_Experience}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Work_Experience-created_by}}',
            '{{%Employee_Work_Experience}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Work_Experience-updated_by}}',
            '{{%Employee_Work_Experience}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Work_Experience-updated_by}}',
            '{{%Employee_Work_Experience}}'
        );

        $this->dropTable('{{%Employee_Work_Experience}}');
    }
}
