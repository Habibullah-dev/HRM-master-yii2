<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Depandant}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_152812_create_Employee_Depandant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Depandant}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'relationship' => $this->string(255)->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Depandant-created_by}}',
            '{{%Employee_Depandant}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Depandant-created_by}}',
            '{{%Employee_Depandant}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Depandant-updated_by}}',
            '{{%Employee_Depandant}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Depandant-updated_by}}',
            '{{%Employee_Depandant}}',
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
            '{{%fk-Employee_Depandant-created_by}}',
            '{{%Employee_Depandant}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Depandant-created_by}}',
            '{{%Employee_Depandant}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Depandant-updated_by}}',
            '{{%Employee_Depandant}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Depandant-updated_by}}',
            '{{%Employee_Depandant}}'
        );

        $this->dropTable('{{%Employee_Depandant}}');
    }
}
