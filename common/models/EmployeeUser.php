<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%employee_user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $employee_id
 * @property string $accessKey
 * @property string $authKey
 */
class EmployeeUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%employee_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'accessKey', 'authKey'], 'required'],
            [['username', 'employee_id'], 'string', 'max' => 55],
            [['password', 'accessKey', 'authKey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'employee_id' => 'Employee ID',
            'accessKey' => 'Access Key',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EmployeeUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeUserQuery(get_called_class());
    }

         /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['accessToken' => $token])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
     return self::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

      /**
     * {@inheritdoc}
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password,$this->password);
    }
    
}




