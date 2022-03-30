<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string $photograph
 * @property string $gender
 * @property string $nationality
 * @property string $marital_status
 * @property string $date_of_birth
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property EmergencyContact[] $emergencyContacts
 * @property User $createdBy
 * @property User $updatedBy
 * @property EmployeeDepandant[] $employeeDepandants
 * @property EmployeeEducation[] $employeeEducations
 * @property EmployeeImmigration[] $employeeImmigrations
 * @property EmployeeJob[] $employeeJobs
 * @property EmployeeLanguages[] $employeeLanguages
 * @property EmployeeLicense[] $employeeLicenses
 * @property EmployeeMemberships[] $employeeMemberships
 * @property EmployeeSalary[] $employeeSalaries
 * @property EmployeeSkills[] $employeeSkills
 * @property EmployeeSupervisor[] $employeeSupervisors
 * @property EmployeeSurbodinate[] $employeeSurbodinates
 * @property EmployeeWorkExperience[] $employeeWorkExperiences
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @var \use yii\web\UploadedFile
     */
    public $employeeImage;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'first_name', 'last_name', 'photograph', 'gender', 'nationality', 'marital_status', 'date_of_birth','employeeImage'], 'required'],
            [['date_of_birth'], 'date', 'format' => 'php:Y/m/d'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['employee_id', 'first_name', 'middle_name', 'last_name', 'gender', 'nationality', 'marital_status'], 'string', 'max' => 55],
            [['photograph'], 'string', 'max' => 255],
            [['employee_id'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID*',
            'employeeImage' => 'Employee Image*',
            'first_name' => 'First Name*',
            'middle_name' => 'Middle Name*',
            'last_name' => 'Last Name*',
            'photograph' => 'Photograph',
            'gender' => 'Gender*',
            'nationality' => 'Nationality*',
            'marital_status' => 'Marital Status*',
            'date_of_birth' => 'Date Of Birth*',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[EmergencyContacts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmergencyContactQuery
     */
    public function getEmergencyContacts()
    {
        return $this->hasMany(EmergencyContact::className(), ['employee_id' => 'employee_id']);
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
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[EmployeeDepandants]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeDepandantQuery
     */
    public function getEmployeeDepandants()
    {
        return $this->hasMany(EmployeeDepandant::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeEducations]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeEducationQuery
     */
    public function getEmployeeEducations()
    {
        return $this->hasMany(EmployeeEducation::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeImmigrations]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeImmigrationQuery
     */
    public function getEmployeeImmigrations()
    {
        return $this->hasMany(EmployeeImmigration::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeJobs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeJobQuery
     */
    public function getEmployeeJobs()
    {
        return $this->hasMany(EmployeeJob::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeLanguages]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeLanguagesQuery
     */
    public function getEmployeeLanguages()
    {
        return $this->hasMany(EmployeeLanguages::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeLicenses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeLicenseQuery
     */
    public function getEmployeeLicenses()
    {
        return $this->hasMany(EmployeeLicense::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeMemberships]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeMembershipsQuery
     */
    public function getEmployeeMemberships()
    {
        return $this->hasMany(EmployeeMemberships::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeSalaries]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeSalaryQuery
     */
    public function getEmployeeSalaries()
    {
        return $this->hasMany(EmployeeSalary::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeSkills]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeSkillsQuery
     */
    public function getEmployeeSkills()
    {
        return $this->hasMany(EmployeeSkills::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[EmployeeSupervisors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeSupervisorQuery
     */
    public function getEmployeeSupervisors()
    {
        return $this->hasMany(EmployeeSupervisor::className(), ['name' => 'id']);
    }

    /**
     * Gets query for [[EmployeeSurbodinates]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeSurbodinateQuery
     */
    public function getEmployeeSurbodinates()
    {
        return $this->hasMany(EmployeeSurbodinate::className(), ['name' => 'id']);
    }

    /**
     * Gets query for [[EmployeeWorkExperiences]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeWorkExperienceQuery
     */
    public function getEmployeeWorkExperiences()
    {
        return $this->hasMany(EmployeeWorkExperience::className(), ['employee_id' => 'employee_id']);
    }

    public function findIdByEmployeeId($employee_id) {
        return self::findOne(['employee_id' => $employee_id]);

    }


    public function getContactDetail($employee_id) {
      return  ContactDetails::findOne(['employee_id' => $employee_id]);
    }

    public function getEducation($employee_id) {
        return  EmployeeEducation::findOne(['employee_id' => $employee_id]);
      }

      public function getExperience($employee_id) {
        return  EmployeeWorkExperience::findOne(['employee_id' => $employee_id]);
      }
      public function getSkill($employee_id) {
        return  EmployeeSkills::findOne(['employee_id' => $employee_id]);
      }
      public function getLanguage($employee_id) {
        return  EmployeeLanguages::findOne(['employee_id' => $employee_id]);
      }
      public function getLicense($employee_id) {
        return  EmployeeLicense::findOne(['employee_id' => $employee_id]);
      }
      public function getSalary($employee_id) {
        return  EmployeeSalary::findOne(['employee_id' => $employee_id]);
      }
      public function getMembership($employee_id) {
        return  EmployeeMemberships::findOne(['employee_id' => $employee_id]);
      }
      public function getJob($employee_id) {
        return  EmployeeJob::findOne(['employee_id' => $employee_id]);
      }
      public function getImmigration($employee_id) {
        return  EmployeeImmigration::findOne(['employee_id' => $employee_id]);
      }
      public function getSupervisor($employee_id) {
        return  EmployeeSupervisor::findOne(['employee_id' => $employee_id]);
      }
      public function getSurbodinate($employee_id) {
        return  EmployeeSurbodinate::findOne(['employee_id' => $employee_id]);
      }
      public function getEmmergency($employee_id) {
        return  EmergencyContact::findAll(['employee_id' => $employee_id]);
      }
      public function getDependants($employee_id) {
        return  EmployeeDepandant::findAll(['employee_id' => $employee_id]);
      }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        if($this->employeeImage) {
            $this->photograph = '/employeePhotos/' . Yii::$app->security->generateRandomString(10) .'/'.$this->employeeImage->name;
        }
        $transaction = Yii::$app->db->beginTransaction();
        $ok = parent::save($runValidation,$attributeNames);
        
        if($ok) {
            $fullpath = Yii::getAlias('@backend/web/storage' . $this->photograph);
            $dir = dirname($fullpath);
            if(!FileHelper::createDirectory($dir) || !$this->employeeImage->saveAs($fullpath)) {
                $transaction->rollBack();
                return false;
            }
            $transaction->commit();
          
        }

        return $ok;
        
       

    }

    public function getPhotographUrl() {
        return Yii::$app->request->baseUrl . '/storage' . $this->photograph;

    }
}
