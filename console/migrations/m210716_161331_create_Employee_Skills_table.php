<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Skills}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Skills}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_161331_create_Employee_Skills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Skills}}', [
            'id' => $this->primaryKey(),
            'skill_id' => $this->integer(11)->notNull(),
            'years_of_experience' => $this->integer(11)->notNull(),
            'comments' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `skill_id`
        $this->createIndex(
            '{{%idx-Employee_Skills-skill_id}}',
            '{{%Employee_Skills}}',
            'skill_id'
        );

        // add foreign key for table `{{%Skills}}`
        $this->addForeignKey(
            '{{%fk-Employee_Skills-skill_id}}',
            '{{%Employee_Skills}}',
            'skill_id',
            '{{%Skills}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Skills-created_by}}',
            '{{%Employee_Skills}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Skills-created_by}}',
            '{{%Employee_Skills}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Skills-updated_by}}',
            '{{%Employee_Skills}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Skills-updated_by}}',
            '{{%Employee_Skills}}',
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
        // drops foreign key for table `{{%Skills}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Skills-skill_id}}',
            '{{%Employee_Skills}}'
        );

        // drops index for column `skill_id`
        $this->dropIndex(
            '{{%idx-Employee_Skills-skill_id}}',
            '{{%Employee_Skills}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Skills-created_by}}',
            '{{%Employee_Skills}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Skills-created_by}}',
            '{{%Employee_Skills}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Skills-updated_by}}',
            '{{%Employee_Skills}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Skills-updated_by}}',
            '{{%Employee_Skills}}'
        );

        $this->dropTable('{{%Employee_Skills}}');
    }
}
