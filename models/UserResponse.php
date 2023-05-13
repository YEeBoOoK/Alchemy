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
 * @property int $is_correct
 * 
 * @property Level $level
 * @property Level[] $levels
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
            [['user_id', 'level_id', 'is_correct'], 'integer'],
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
            'id_response' => 'Идентификатор ответа',
            'user_id' => 'Идентификатор пользователя',
            'level_id' => 'Идентификатор уровня',
            'response' => 'Ответ пользователя',
            'is_correct' => 'Проверка на правильность',
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
     * Gets query for [[Levels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevels()
    {
        return $this->hasMany(Level::class, ['user_response' => 'id_response']);
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
