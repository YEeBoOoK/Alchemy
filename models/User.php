<?php

namespace app\models;
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
 *
 * @property UserResponse[] $userResponses
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    // public $agree;
    // public $passwordConfirm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password'], 'required'],
            [['admin'], 'integer'],
            [['email', 'username', 'password'], 'string', 'max' => 255],
            [['email'], 'unique', 'message' => 'Данный email-адрес уже используется'],
            ['email', 'email', 'message' => 'Введите корректный email-адрес (например: test@gmail.com)'],
            [['username'], 'unique', 'message' => 'Данное имя пользователя уже занято'],
            [['username'], 'match', 'pattern' => '/^[a-zA-Z0-9_-]{4,}$/', 'message' => 'Имя пользователя может содержать только буквы латинского алфавита, можно использовать цифры, дефисы и подчеркивания. Минимум 4 символов'],

            [['photo'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'maxSize' => 5*1024*1024, 'skipOnEmpty' => true, 'message' => 'Разрешенные типы файла: png, jpg, gif, jpeg. Максимальный допустимый размер файла 5 МБ'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Идентификатор Пользователя',
            'photo' => 'Фотография (не обязательно)',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Пароль',
            // 'userPhoto' => 'Фотография (не обязательно)',
            // 'admin' => 'Админ',
        ];
    }



    // Реализация интерфейса 

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id_user)
    {
        return self::findOne($id_user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

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
        // return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {

    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }


    /**
     * Gets query for [[UserResponses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserResponses()
    {
        return $this->hasMany(UserResponse::class, ['user_id' => 'id_user']);
    }
}
