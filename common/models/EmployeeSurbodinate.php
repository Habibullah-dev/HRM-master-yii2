<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_surbodinate}}".
 *
 * @property int $id
 * @property int|null $name
 * @property string $reporting_method
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $name0
 * @property User $updatedBy
 */
class EmployeeSurbodinate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $surbodinateAttachment;
    public static function tableName()
    {
        return '{{%employee_surbodinate}}';
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
            [['name', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['reporting_method'], 'required'],
            [['reporting_method'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['name'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['name' => 'id']],
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
            'name' => 'Name*',
            'surbodinateAttachment' => 'Surbodinate Attachment (optional)',
            'reporting_method' => 'Reporting Method*',
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
     * Gets query for [[Name0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeQuery
     */
    public function getName0()
    {
        return $this->hasOne(Employee::className(), ['id' => 'name']);
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
     * @return \common\models\query\EmployeeSurbodinateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeSurbodinateQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->surbodinateAttachment) {
            $this->attachment = '/surbodinateAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->surbodinateAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->surbodinateAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->surbodinateAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
