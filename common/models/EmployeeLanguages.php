<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_languages}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property int|null $language_id
 * @property string $fluency
 * @property string $competency
 * @property string|null $comments
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property Languages $language
 * @property User $updatedBy
 */
class EmployeeLanguages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $languageAttachment;
    public static function tableName()
    {
        return '{{%employee_languages}}';
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
            [['employee_id', 'fluency', 'competency'], 'required'],
            [['language_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['comments'], 'string'],
            [['employee_id', 'fluency', 'competency'], 'string', 'max' => 55],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['language_id' => 'id']],
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
            'languageAttachment' => 'Language Attachment (optional)',
            'language_id' => 'Language ID(created by admin)*',
            'fluency' => 'Fluency*',
            'competency' => 'Competency*',
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
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LanguagesQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Languages::className(), ['id' => 'language_id']);
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
     * @return \common\models\query\EmployeeLanguagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeLanguagesQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->languageAttachment) {
            $this->attachment = '/LanguageAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->languageAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->languageAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->languageAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
