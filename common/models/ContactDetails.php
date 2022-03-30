<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%contact_details}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property int|null $home_telephone
 * @property int $mobile
 * @property int|null $work_telephone
 * @property string $work_email
 * @property string|null $other_email
 * @property int $phone
 * @property string|null $fax
 * @property string|null $email
 * @property string $address
 * @property string $city
 * @property string $state
 * @property int|null $zip_code
 * @property string $country
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property User $updatedBy
 */
class ContactDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $contactAttachment ;
    public static function tableName()
    {
        return '{{%contact_details}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'mobile', 'work_email', 'phone', 'address', 'city', 'state', 'country'], 'required'], 
            [['home_telephone', 'mobile', 'work_telephone', 'phone', 'zip_code', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['employee_id', 'fax', 'city', 'state', 'country'], 'string', 'max' => 55],
            [['work_email', 'other_email', 'email', 'address'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
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
            'contactAttachment' => 'Contact Attactment (optional)',
            'employee_id' => 'Employee ID',
            'home_telephone' => 'Home Telephone',
            'mobile' => 'Mobile*',
            'work_telephone' => 'Work Telephone',
            'work_email' => 'Work Email*',
            'other_email' => 'Other Email',
            'phone' => 'Phone*',
            'fax' => 'Fax',
            'email' => 'Email*',
            'address' => 'Address*',
            'city' => 'City*',
            'state' => 'State*',
            'zip_code' => 'Zip Code',
            'country' => 'Country*',
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
     * @return \common\models\query\ContactDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ContactDetailsQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        
        if($this->contactAttachment) {
            $this->attachment = '/ContactAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->contactAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);

            $transaction = Yii::$app->db->beginTransaction();
           

            if($this->contactAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->contactAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }
        }
    
            return $ok;
        }

}
