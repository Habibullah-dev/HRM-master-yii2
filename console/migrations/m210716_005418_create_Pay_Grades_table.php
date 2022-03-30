<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Pay_Grades}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_005418_create_Pay_Grades_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Pay_Grades}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'currency' => $this->string(55)->notNull(),
            'minimum_salary' => $this->string(255)->notNull(),
            'maximum_salary' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Pay_Grades-created_by}}',
            '{{%Pay_Grades}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Pay_Grades-created_by}}',
            '{{%Pay_Grades}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Pay_Grades-updated_by}}',
            '{{%Pay_Grades}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Pay_Grades-updated_by}}',
            '{{%Pay_Grades}}',
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
            '{{%fk-Pay_Grades-created_by}}',
            '{{%Pay_Grades}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Pay_Grades-created_by}}',
            '{{%Pay_Grades}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Pay_Grades-updated_by}}',
            '{{%Pay_Grades}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Pay_Grades-updated_by}}',
            '{{%Pay_Grades}}'
        );

        $this->dropTable('{{%Pay_Grades}}');
    }
}
