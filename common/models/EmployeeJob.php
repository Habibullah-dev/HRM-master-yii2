<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_job}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property int $job_title_id
 * @property int $employment_status_id
 * @property int $job_category_id
 * @property string $joined_date
 * @property int $department_id
 * @property int $company_branch_id
 * @property string $contract_start_date
 * @property string $contract_end_date
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CompanyBranch $companyBranch
 * @property User $createdBy
 * @property Department $department
 * @property Employee $employee
 * @property EmploymentStatus $employmentStatus
 * @property JobCategories $jobCategory
 * @property JobTitles $jobTitle
 * @property User $updatedBy
 */
class EmployeeJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $jobAttachment;
    public static function tableName()
    {
        return '{{%employee_job}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'job_title_id', 'employment_status_id', 'job_category_id', 'joined_date', 'department_id', 'company_branch_id', 'contract_start_date', 'contract_end_date'], 'required'],
            [['job_title_id', 'employment_status_id', 'job_category_id', 'department_id', 'company_branch_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['joined_date', 'contract_start_date', 'contract_end_date'], 'date', 'format' => 'php:Y/m/d'],
            [['employee_id'], 'string', 'max' => 55],
            [['company_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyBranch::className(), 'targetAttribute' => ['company_branch_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['employment_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmploymentStatus::className(), 'targetAttribute' => ['employment_status_id' => 'id']],
            [['job_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobCategories::className(), 'targetAttribute' => ['job_category_id' => 'id']],
            [['job_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobTitles::className(), 'targetAttribute' => ['job_title_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'jobAttachment' => 'Job Attachment (optional)',
            'job_title_id' => 'Job Title ID',
            'employment_status_id' => 'Employment Status ID',
            'job_category_id' => 'Job Category ID',
            'joined_date' => 'Joined Date',
            'department_id' => 'Department ID',
            'company_branch_id' => 'Company Branch ID',
            'contract_start_date' => 'Contract Start Date',
            'contract_end_date' => 'Contract End Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CompanyBranch]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CompanyBranchQuery
     */
    public function getCompanyBranch()
    {
        return $this->hasOne(CompanyBranch::className(), ['id' => 'company_branch_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\DepartmentQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmploymentStatus]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmploymentStatusQuery
     */
    public function getEmploymentStatus()
    {
        return $this->hasOne(EmploymentStatus::className(), ['id' => 'employment_status_id']);
    }

    /**
     * Gets query for [[JobCategory]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\JobCategoriesQuery
     */
    public function getJobCategory()
    {
        return $this->hasOne(JobCategories::className(), ['id' => 'job_category_id']);
    }

    /**
     * Gets query for [[JobTitle]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\JobTitlesQuery
     */
    public function getJobTitle()
    {
        return $this->hasOne(JobTitles::className(), ['id' => 'job_title_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EmployeeJobQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeJobQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->jobAttachment) {
            $this->attachment = '/JobAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->jobAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->jobAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->jobAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
