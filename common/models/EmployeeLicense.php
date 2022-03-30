<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_license}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property int|null $lincense_id
 * @property int $license_number
 * @property string $issued_date
 * @property string $expiry_date
 * @property string|null $comments
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property Licences $lincense
 * @property User $updatedBy
 */
class EmployeeLicense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $licenseAttachment;
    public static function tableName()
    {
        return '{{%employee_license}}';
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
            [['employee_id', 'license_number', 'issued_date', 'expiry_date'], 'required'],
            [['lincense_id', 'license_number', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['issued_date', 'expiry_date'], 'date', 'format' => 'php:Y/m/d'],
            [['comments'], 'string'],
            [['employee_id'], 'string', 'max' => 55],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['lincense_id'], 'exist', 'skipOnError' => true, 'targetClass' => Licences::className(), 'targetAttribute' => ['lincense_id' => 'id']],
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
            'licenseAttachment' => 'License Attachment(optional)',
            'employee_id' => 'Employee ID',
            'lincense_id' => 'Lincense ID (created by Admin)*',
            'license_number' => 'License Number*',
            'issued_date' => 'Issued Date*',
            'expiry_date' => 'Expiry Date*',
            'comments' => 'Comments',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
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
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * Gets query for [[Lincense]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LicencesQuery
     */
    public function getLincense()
    {
        return $this->hasOne(Licences::className(), ['id' => 'lincense_id']);
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
     * @return \common\models\query\EmployeeLicenseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeLicenseQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->licenseAttachment) {
            $this->attachment = '/LicenseAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->licenseAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->licenseAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->licenseAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
