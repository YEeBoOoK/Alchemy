<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_response".
 *
 * @property int $id_response
 * @property int $user_id
 * @property int $level_id
 * @property string $response
 *
 * @property Level $level
 * @property User $user
 */
class UserResponse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'level_id', 'response'], 'required'],
            [['user_id', 'level_id'], 'integer'],
            [['response'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id_user']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::class, 'targetAttribute' => ['level_id' => 'id_level']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_response' => 'Id Response',
            'user_id' => 'Пользователь ID',
            'level_id' => 'Уровень ID',
            'response' => 'Ответ пользователя',
        ];
    }

    /**
     * Gets query for [[Level]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::class, ['id_level' => 'level_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'user_id']);
    }
}
