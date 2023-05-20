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
 * @property string $passwordConfirm
 * @property int $agree
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

    // public $userPhoto;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password', 'passwordConfirm'], 'required'],
            [['agree', 'admin'], 'integer'],
            [['email', 'username', 'password'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['username'], 'unique'],

            [['photo'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'skipOnEmpty' => true, 'message' => 'Разрешенные типы файла: png, jpg, gif, jpeg'],
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
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Я даю согласие на обработку данных',
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
