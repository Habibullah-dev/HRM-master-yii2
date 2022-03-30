<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_immigration}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property string $document_type
 * @property string $number
 * @property string $issued_by
 * @property string $eligible_review_date
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property User $updatedBy
 */
class EmployeeImmigration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $immigrationAttachment;
    public static function tableName()
    {
        return '{{%employee_immigration}}';
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
            [['employee_id', 'document_type', 'number', 'issued_by', 'eligible_review_date'], 'required'],
            [['eligible_review_date'], 'date', 'format' => 'php:Y/m/d'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['employee_id', 'document_type'], 'string', 'max' => 55],
            [['number', 'issued_by'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
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
            'immigrationAttachment' => 'Immigration Attachment(optional)',
            'employee_id' => 'Employee ID',
            'document_type' => 'Document Type*',
            'number' => 'Number*',
            'issued_by' => 'Issued By',
            'eligible_review_date' => 'Eligible Review Date*',
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
     * @return \common\models\query\EmployeeImmigrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeImmigrationQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->immigrationAttachment) {
            $this->attachment = '/ImmigrationAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->immigrationAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->immigrationAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->immigrationAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
