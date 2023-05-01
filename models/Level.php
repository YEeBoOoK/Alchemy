<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property int $id_level
 * @property string $name_level
 * @property string $instruction
 * @property int|null $property_id
 * @property string $board
 * @property string $class
 * @property string $class2
 * @property string $selector
 * @property string $style
 * @property string $earlier
 * @property string $after
 * @property int $correct_answer
 * @property int|null $user_response
 *
 * @property CorrectAnswer $correctAnswer
 * @property CorrectAnswer[] $correctAnswers
 * @property Property $property
 * @property UserResponse $userResponse
 * @property UserResponse[] $userResponses
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_level', 'instruction', 'board', 'class', 'class2', 'selector', 'style', 'earlier', 'after', 'correct_answer'], 'required'],
            [['instruction', 'earlier', 'after'], 'string'],
            [['property_id', 'correct_answer', 'user_response'], 'integer'],
            [['name_level', 'class', 'class2', 'selector', 'style'], 'string', 'max' => 255],
            [['board'], 'string', 'max' => 50],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::class, 'targetAttribute' => ['property_id' => 'id_property']],
            [['correct_answer'], 'exist', 'skipOnError' => true, 'targetClass' => CorrectAnswer::class, 'targetAttribute' => ['correct_answer' => 'id_answer']],
            [['user_response'], 'exist', 'skipOnError' => true, 'targetClass' => UserResponse::class, 'targetAttribute' => ['user_response' => 'id_response']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_level' => 'Id Уровня',
            'name_level' => 'Название',
            'instruction' => 'Инструкция',
            'property_id' => 'Объяснение',
            'board' => 'Доска',
            'selector' => 'Selector',
            'style' => 'Style',
            'earlier' => 'Текст до кода',
            'after' => 'Текст после',
            'correct_answer' => 'Правильный ответ',
            'user_response' => 'Ответ пользователя',
        ];
    }

    /**
     * Gets query for [[CorrectAnswer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCorrectAnswer()
    {
        return $this->hasOne(CorrectAnswer::class, ['id_answer' => 'correct_answer']);
    }

    /**
     * Gets query for [[CorrectAnswers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCorrectAnswers()
    {
        return $this->hasMany(CorrectAnswer::class, ['level_id' => 'id_level']);
    }

    /**
     * Gets query for [[Property]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::class, ['id_property' => 'property_id']);
    }

    /**
     * Gets query for [[UserResponse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserResponse()
    {
        return $this->hasOne(UserResponse::class, ['id_response' => 'user_response']);
    }

    /**
     * Gets query for [[UserResponses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserResponses()
    {
        return $this->hasMany(UserResponse::class, ['level_id' => 'id_level']);
    }
}
