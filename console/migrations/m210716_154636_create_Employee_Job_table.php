<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Job}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Job_Titles}}`
 * - `{{%Employment_Status}}`
 * - `{{%Job_Categories}}`
 * - `{{%Department}}`
 * - `{{%Company_Branch}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_154636_create_Employee_Job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Job}}', [
            'id' => $this->primaryKey(),
            'job_title_id' => $this->integer(11)->notNull(),
            'employment_status_id' => $this->integer(11)->notNull(),
            'job_category_id' => $this->integer(11)->notNull(),
            'joined_date' => $this->date()->notNull(),
            'department_id' => $this->integer(11)->notNull(),
            'company_branch_id' => $this->integer(11)->notNull(),
            'contract_start_date' => $this->date()->notNull(),
            'contract_end_date' => $this->date()->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `job_title_id`
        $this->createIndex(
            '{{%idx-Employee_Job-job_title_id}}',
            '{{%Employee_Job}}',
            'job_title_id'
        );

        // add foreign key for table `{{%Job_Titles}}`
        $this->addForeignKey(
            '{{%fk-Employee_Job-job_title_id}}',
            '{{%Employee_Job}}',
            'job_title_id',
            '{{%Job_Titles}}',
            'id',
            'CASCADE'
        );

        // creates index for column `employment_status_id`
        $this->createIndex(
            '{{%idx-Employee_Job-employment_status_id}}',
            '{{%Employee_Job}}',
            'employment_status_id'
        );

        // add foreign key for table `{{%Employment_Status}}`
        $this->addForeignKey(
            '{{%fk-Employee_Job-employment_status_id}}',
            '{{%Employee_Job}}',
            'employment_status_id',
            '{{%Employment_Status}}',
            'id',
            'CASCADE'
        );

        // creates index for column `job_category_id`
        $this->createIndex(
            '{{%idx-Employee_Job-job_category_id}}',
            '{{%Employee_Job}}',
            'job_category_id'
        );

        // add foreign key for table `{{%Job_Categories}}`
        $this->addForeignKey(
            '{{%fk-Employee_Job-job_category_id}}',
            '{{%Employee_Job}}',
            'job_category_id',
            '{{%Job_Categories}}',
            'id',
            'CASCADE'
        );

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-Employee_Job-department_id}}',
            '{{%Employee_Job}}',
            'department_id'
        );

        // add foreign key for table `{{%Department}}`
        $this->addForeignKey(
            '{{%fk-Employee_Job-department_id}}',
            '{{%Employee_Job}}',
            'department_id',
            '{{%Department}}',
            'id',
            'CASCADE'
        );

        // creates index for column `company_branch_id`
        $this->createIndex(
            '{{%idx-Employee_Job-company_branch_id}}',
            '{{%Employee_Job}}',
            'company_branch_id'
        );

        // add foreign key for table `{{%Company_Branch}}`
        $this->addForeignKey(
            '{{%fk-Employee_Job-company_branch_id}}',
            '{{%Employee_Job}}',
            'company_branch_id',
            '{{%Company_Branch}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Job-created_by}}',
            '{{%Employee_Job}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Job-created_by}}',
            '{{%Employee_Job}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Job-updated_by}}',
            '{{%Employee_Job}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Job-updated_by}}',
            '{{%Employee_Job}}',
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
        // drops foreign key for table `{{%Job_Titles}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Job-job_title_id}}',
            '{{%Employee_Job}}'
        );

        // drops index for column `job_title_id`
        $this->dropIndex(
            '{{%idx-Employee_Job-job_title_id}}',
            '{{%Employee_Job}}'
        );

        // drops foreign key for table `{{%Employment_Status}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Job-employment_status_id}}',
            '{{%Employee_Job}}'
        );

        // drops index for column `employment_status_id`
        $this->dropIndex(
            '{{%idx-Employee_Job-employment_status_id}}',
            '{{%Employee_Job}}'
        );

        // drops foreign key for table `{{%Job_Categories}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Job-job_category_id}}',
            '{{%Employee_Job}}'
        );

        // drops index for column `job_category_id`
        $this->dropIndex(
            '{{%idx-Employee_Job-job_category_id}}',
            '{{%Employee_Job}}'
        );

        // drops foreign key for table `{{%Department}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Job-department_id}}',
            '{{%Employee_Job}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-Employee_Job-department_id}}',
            '{{%Employee_Job}}'
        );

        // drops foreign key for table `{{%Company_Branch}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Job-company_branch_id}}',
            '{{%Employee_Job}}'
        );

        // drops index for column `company_branch_id`
        $this->dropIndex(
            '{{%idx-Employee_Job-company_branch_id}}',
            '{{%Employee_Job}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Job-created_by}}',
            '{{%Employee_Job}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Job-created_by}}',
            '{{%Employee_Job}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Job-updated_by}}',
            '{{%Employee_Job}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Job-updated_by}}',
            '{{%Employee_Job}}'
        );

        $this->dropTable('{{%Employee_Job}}');
    }
}
