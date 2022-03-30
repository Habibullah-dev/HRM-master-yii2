<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Licences}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_012042_create_Licences_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Licences}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Licences-created_by}}',
            '{{%Licences}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Licences-created_by}}',
            '{{%Licences}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Licences-updated_by}}',
            '{{%Licences}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Licences-updated_by}}',
            '{{%Licences}}',
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
            '{{%fk-Licences-created_by}}',
            '{{%Licences}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Licences-created_by}}',
            '{{%Licences}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Licences-updated_by}}',
            '{{%Licences}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Licences-updated_by}}',
            '{{%Licences}}'
        );

        $this->dropTable('{{%Licences}}');
    }
}
