<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Memberships}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_012230_create_Memberships_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Memberships}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Memberships-created_by}}',
            '{{%Memberships}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Memberships-created_by}}',
            '{{%Memberships}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Memberships-updated_by}}',
            '{{%Memberships}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Memberships-updated_by}}',
            '{{%Memberships}}',
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
            '{{%fk-Memberships-created_by}}',
            '{{%Memberships}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Memberships-created_by}}',
            '{{%Memberships}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Memberships-updated_by}}',
            '{{%Memberships}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Memberships-updated_by}}',
            '{{%Memberships}}'
        );

        $this->dropTable('{{%Memberships}}');
    }
}
