<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\EmployeeUser;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class EmployeeSignupForm extends Model
{
    public $username;
    public $employee_id;
    public $password;
    public $password_repeat;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'common\models\EmployeeUser', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['employee_id', 'unique', 'targetClass' => 'common\models\EmployeeUser', 'message' => 'This employee id has already been taken.'],

            [['password','password_repeat'], 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['password_repeat','compare','compareAttribute' => 'password']

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new EmployeeUser();
        $user->username = $this->username;
        $user->employee_id = 'EMP' . Yii::$app->security->generateRandomString(8);
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->accessKey = Yii::$app->security->generateRandomString();
        $user->authKey = Yii::$app->security->generateRandomString();

        if($user->save()) {
            return true;
        }
        Yii::error("User not saved " . VarDumper::dump( $user->errors));
        return false;
    }

}
