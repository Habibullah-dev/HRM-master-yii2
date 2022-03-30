<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Company_Information}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_011334_create_Company_Information_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Company_Information}}', [
            'id' => $this->primaryKey(),
            'organization_name' => $this->string(255)->notNull(),
            'tax_id' => $this->string(55)->notNull(),
            'number_of_employees' => $this->integer(11)->notNull(),
            'registration_number' => $this->integer(11)->notNull(),
            'phone' => $this->integer(15)->notNull(),
            'fax' => $this->string(55),
            'email' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'city' => $this->string(55)->notNull(),
            'state' => $this->string(55)->notNull(),
            'zip_code' => $this->string(55),
            'country' => $this->string(55)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Company_Information-created_by}}',
            '{{%Company_Information}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Company_Information-created_by}}',
            '{{%Company_Information}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Company_Information-updated_by}}',
            '{{%Company_Information}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Company_Information-updated_by}}',
            '{{%Company_Information}}',
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
            '{{%fk-Company_Information-created_by}}',
            '{{%Company_Information}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Company_Information-created_by}}',
            '{{%Company_Information}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Company_Information-updated_by}}',
            '{{%Company_Information}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Company_Information-updated_by}}',
            '{{%Company_Information}}'
        );

        $this->dropTable('{{%Company_Information}}');
    }
}
