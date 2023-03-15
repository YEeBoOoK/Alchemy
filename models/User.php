<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $email
 * @property string $username
 * @property string $password
 * @property int $admin
 *
 * @property UserResponse[] $userResponses
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password'], 'required'],
            [['admin'], 'integer'],
            [['email', 'username', 'password'], 'string', 'max' => 255],
            [['email', 'username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id Пользователя',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Пароль',
            // 'admin' => 'Admin',
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
