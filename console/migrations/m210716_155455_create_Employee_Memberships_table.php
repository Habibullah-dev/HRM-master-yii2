<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Memberships}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Memberships}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_155455_create_Employee_Memberships_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Memberships}}', [
            'id' => $this->primaryKey(),
            'name' => $this->integer(11),
            'reporting_method' => $this->string(55)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `name`
        $this->createIndex(
            '{{%idx-Employee_Memberships-name}}',
            '{{%Employee_Memberships}}',
            'name'
        );

        // add foreign key for table `{{%Memberships}}`
        $this->addForeignKey(
            '{{%fk-Employee_Memberships-name}}',
            '{{%Employee_Memberships}}',
            'name',
            '{{%Memberships}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Memberships-created_by}}',
            '{{%Employee_Memberships}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Memberships-created_by}}',
            '{{%Employee_Memberships}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Memberships-updated_by}}',
            '{{%Employee_Memberships}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Memberships-updated_by}}',
            '{{%Employee_Memberships}}',
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
        // drops foreign key for table `{{%Memberships}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Memberships-name}}',
            '{{%Employee_Memberships}}'
        );

        // drops index for column `name`
        $this->dropIndex(
            '{{%idx-Employee_Memberships-name}}',
            '{{%Employee_Memberships}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Memberships-created_by}}',
            '{{%Employee_Memberships}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Memberships-created_by}}',
            '{{%Employee_Memberships}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Memberships-updated_by}}',
            '{{%Employee_Memberships}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Memberships-updated_by}}',
            '{{%Employee_Memberships}}'
        );

        $this->dropTable('{{%Employee_Memberships}}');
    }
}
