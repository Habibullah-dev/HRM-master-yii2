<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Nationalities}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_012454_create_Nationalities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Nationalities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Nationalities-created_by}}',
            '{{%Nationalities}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Nationalities-created_by}}',
            '{{%Nationalities}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Nationalities-updated_by}}',
            '{{%Nationalities}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Nationalities-updated_by}}',
            '{{%Nationalities}}',
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
            '{{%fk-Nationalities-created_by}}',
            '{{%Nationalities}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Nationalities-created_by}}',
            '{{%Nationalities}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Nationalities-updated_by}}',
            '{{%Nationalities}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Nationalities-updated_by}}',
            '{{%Nationalities}}'
        );

        $this->dropTable('{{%Nationalities}}');
    }
}
