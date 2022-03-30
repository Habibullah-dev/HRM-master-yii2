<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Company_Branch}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_011733_create_Company_Branch_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Company_Branch}}', [
            'id' => $this->primaryKey(),
            'location_name' => $this->string(255)->notNull(),
            'city' => $this->string(55)->notNull(),
            'country' => $this->string(55)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Company_Branch-created_by}}',
            '{{%Company_Branch}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Company_Branch-created_by}}',
            '{{%Company_Branch}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Company_Branch-updated_by}}',
            '{{%Company_Branch}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Company_Branch-updated_by}}',
            '{{%Company_Branch}}',
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
            '{{%fk-Company_Branch-created_by}}',
            '{{%Company_Branch}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Company_Branch-created_by}}',
            '{{%Company_Branch}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Company_Branch-updated_by}}',
            '{{%Company_Branch}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Company_Branch-updated_by}}',
            '{{%Company_Branch}}'
        );

        $this->dropTable('{{%Company_Branch}}');
    }
}
