<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Surbodinate}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Employee}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_195833_create_Employee_Surbodinate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Surbodinate}}', [
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
            '{{%idx-Employee_Surbodinate-name}}',
            '{{%Employee_Surbodinate}}',
            'name'
        );

        // add foreign key for table `{{%Employee}}`
        $this->addForeignKey(
            '{{%fk-Employee_Surbodinate-name}}',
            '{{%Employee_Surbodinate}}',
            'name',
            '{{%Employee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Surbodinate-created_by}}',
            '{{%Employee_Surbodinate}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Surbodinate-created_by}}',
            '{{%Employee_Surbodinate}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Surbodinate-updated_by}}',
            '{{%Employee_Surbodinate}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Surbodinate-updated_by}}',
            '{{%Employee_Surbodinate}}',
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
            '{{%fk-Employee_Surbodinate-name}}',
            '{{%Employee_Surbodinate}}'
        );

        // drops index for column `name`
        $this->dropIndex(
            '{{%idx-Employee_Surbodinate-name}}',
            '{{%Employee_Surbodinate}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Surbodinate-created_by}}',
            '{{%Employee_Surbodinate}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Surbodinate-created_by}}',
            '{{%Employee_Surbodinate}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Surbodinate-updated_by}}',
            '{{%Employee_Surbodinate}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Surbodinate-updated_by}}',
            '{{%Employee_Surbodinate}}'
        );

        $this->dropTable('{{%Employee_Surbodinate}}');
    }
}
