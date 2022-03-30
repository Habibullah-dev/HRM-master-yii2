<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Supervisor}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Employee}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_195933_create_Employee_Supervisor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Supervisor}}', [
            'id' => $this->primaryKey(),
            'name' => $this->integer(11),
            'reporting_method' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `name`
        $this->createIndex(
            '{{%idx-Employee_Supervisor-name}}',
            '{{%Employee_Supervisor}}',
            'name'
        );

        // add foreign key for table `{{%Employee}}`
        $this->addForeignKey(
            '{{%fk-Employee_Supervisor-name}}',
            '{{%Employee_Supervisor}}',
            'name',
            '{{%Employee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Supervisor-created_by}}',
            '{{%Employee_Supervisor}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Supervisor-created_by}}',
            '{{%Employee_Supervisor}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Supervisor-updated_by}}',
            '{{%Employee_Supervisor}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Supervisor-updated_by}}',
            '{{%Employee_Supervisor}}',
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
        // drops foreign key for table `{{%Employee}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Supervisor-name}}',
            '{{%Employee_Supervisor}}'
        );

        // drops index for column `name`
        $this->dropIndex(
            '{{%idx-Employee_Supervisor-name}}',
            '{{%Employee_Supervisor}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Supervisor-created_by}}',
            '{{%Employee_Supervisor}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Supervisor-created_by}}',
            '{{%Employee_Supervisor}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Supervisor-updated_by}}',
            '{{%Employee_Supervisor}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Supervisor-updated_by}}',
            '{{%Employee_Supervisor}}'
        );

        $this->dropTable('{{%Employee_Supervisor}}');
    }
}
