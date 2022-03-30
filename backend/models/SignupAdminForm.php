<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\User;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupAdminForm extends Model
{
    public $username;
    public $email;
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
            ['username', 'unique', 'targetClass' => '\backend\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\backend\models\User', 'message' => 'This email address has already been taken.'],

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
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->accessToken = Yii::$app->security->generateRandomString();
        $user->authKey = Yii::$app->security->generateRandomString();

        if($user->save()) {
            return true;
        }
        Yii::error("User not saved " . VarDumper::dump( $user->errors));
        return false;
    }

}
