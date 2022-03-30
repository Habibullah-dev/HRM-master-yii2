<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Education}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_185342_create_Employee_Education_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Education}}', [
            'id' => $this->primaryKey(),
            'level' => $this->string(55)->notNull(),
            'institute' => $this->string(255)->notNull(),
            'major' => $this->string(255)->notNull(),
            'year' => $this->integer(11)->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'comments' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Education-created_by}}',
            '{{%Employee_Education}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Education-created_by}}',
            '{{%Employee_Education}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Education-updated_by}}',
            '{{%Employee_Education}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Education-updated_by}}',
            '{{%Employee_Education}}',
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
            '{{%fk-Employee_Education-created_by}}',
            '{{%Employee_Education}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Education-created_by}}',
            '{{%Employee_Education}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Education-updated_by}}',
            '{{%Employee_Education}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Education-updated_by}}',
            '{{%Employee_Education}}'
        );

        $this->dropTable('{{%Employee_Education}}');
    }
}
