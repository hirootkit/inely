<?php
namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $user = false;

    /**
     * Validation rules
     */
    public function rules()
    {
        return [

            [['username', 'password'], 'required'],

            ['rememberMe', 'boolean'],

            ['password', 'validatePassword'],
        ];
    }

    /**
     * Label
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username'),
            'password' => Yii::t('backend', 'Password'),
            'rememberMe' => Yii::t('backend', 'Remember Me')
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password))
                $this->addError('password', Yii::t('backend', 'Incorrect username or password.'));
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if (!$this->validate())
            return false;

        $duration = $this->rememberMe ? 84600 : 0;
        if (Yii::$app->user->login($this->getUser(), $duration))
            return true;

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->user == false) {
            $this->user = User::find()
                ->andWhere(['or', ['username' => $this->username], ['email' => $this->username]])
                ->one();
       }

        return $this->user;
    }
}
