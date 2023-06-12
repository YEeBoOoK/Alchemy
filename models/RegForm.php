<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string|null $photo
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
            [['email', 'username', 'password', 'passwordConfirm', 'agree'], 'required', 'message' => 'Поле обязательно для заполнения'],
            [['admin'], 'integer'],
            [['email', 'username', 'password'], 'string', 'max' => 255],
            ['agree', 'boolean'],

            [['email'], 'unique', 'message' => 'Данный email-адрес уже используется'],
            [['username'], 'unique', 'message' => 'Данное имя пользователя уже занято'],
            ['email', 'email', 'message' => 'Введите корректный email-адрес (например: test@gmail.com)'],
            [['username'], 'match', 'pattern' => '/^[a-zA-Z0-9_-]{4,}$/', 'message' => 'Имя пользователя может содержать только буквы латинского алфавита, можно использовать цифры, дефисы и подчеркивания. Минимум 4 символов'],
            ['password', 'match', 'pattern' => '/^[a-zA-Z0-9_-]{8,}$/u', 'message' => 'Пароль должен содержать буквы латинского алфавита, можно использовать цифры, дефисы и подчеркивания. Минимум 8 символов'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'compare', 'compareValue' => true, 'message' => ''],

            [['photo'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'maxSize' => 5*1024*1024, 'skipOnEmpty' => true, 'message' => 'Разрешенные типы файла: png, jpg, gif, jpeg. Максимальный допустимый размер файла 5 МБ'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'photo' => 'Фотография (не обязательно)',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Пароль',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Я даю согласие на обработку данных',
            // 'admin' => 'Admin',
        ];
    }
}

