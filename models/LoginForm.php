<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $verifyCode;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['verifyCode', 'captcha'],

            [['username'], 'match', 'pattern' => '/^[a-zA-Z0-9_-]{5,}$/', 'message' => 'Имя пользователя может содержать только буквы латинского алфавита, можно использовать цифры, дефисы и подчеркивания. Минимум 5 символов'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
            'verifyCode' => 'Введите текст с картинки',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            // if (!$user || !$user->validatePassword($this->password)) {
            //     $this->addError($attribute, 'Неправильный логин или пароль');
            // }

            if ($user && Yii::$app->security->validatePassword($this->password, $user->password)) {
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            } else {
                $this->addError($attribute, 'Неправильный логин или пароль');
            }
        }
    }
    

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
