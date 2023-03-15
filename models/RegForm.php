<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property int $age
 * @property string $email
 * @property string $username
 * @property string $password
 * @property int $admin
 */
class RegForm extends User
{

    // Объявляем 2 новые публичные переменные для подтверждения пароля и согласия на обработку данных
    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password', 'passwordConfirm', 'agree'], 'required'],
            [['admin'], 'integer'],
            [['email', 'username', 'password', 'passwordConfirm'], 'string', 'max' => 255],
            [['email', 'username'], 'unique'],
            ['agree', 'boolean'],
            
            [['email'], 'email'],
            ['username', 'match', 'pattern' => '/^[A-Za-z0-9]{5,}$/u', 'message' => 'Имя пользователя может содержать только буквы латинского алфавита и цифры, минимум 5 символов'],
            ['password', 'match', 'pattern' => '/^[a-zA-Z0-9]{8,}$/u', 'message' => 'Пароль должен содержать буквы латинского алфавита и цифры, минимум 8 символов'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'compare', 'compareValue' => true, 'message' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Пароль',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Я даю согласие на обработку данных',
            // 'admin' => 'Admin',
        ];
    }
}

