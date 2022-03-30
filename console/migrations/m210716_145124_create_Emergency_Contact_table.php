<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Emergency_Contact}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210716_145124_create_Emergency_Contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Emergency_Contact}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(55)->notNull(),
            'relationship' => $this->string(55)->notNull(),
            'home_telephone' => $this->integer(15),
            'mobile' => $this->integer(15)->notNull(),
            'work_telephone' => $this->integer(15),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Emergency_Contact-created_by}}',
            '{{%Emergency_Contact}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Emergency_Contact-created_by}}',
            '{{%Emergency_Contact}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
          // creates index for column `updated_by`
          $this->createIndex(
            '{{%idx-Emergency_Contact-updated_by}}',
            '{{%Emergency_Contact}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Emergency_Contact-updated_by}}',
            '{{%Emergency_Contact}}',
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
            '{{%fk-Emergency_Contact-created_by}}',
            '{{%Emergency_Contact}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Emergency_Contact-created_by}}',
            '{{%Emergency_Contact}}'
        );
            // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Emergency_Contact-updated_by}}',
            '{{%Emergency_Contact}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Emergency_Contact-updated_by}}',
            '{{%Emergency_Contact}}'
        );

        $this->dropTable('{{%Emergency_Contact}}');
    }
}
