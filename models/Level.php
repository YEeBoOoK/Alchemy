<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property int $id_level
 * @property string $name_level
 * @property string $instruction
 * @property int $property_id
 * @property string $board
 * @property string $selector
 * @property string $style
 * @property string $earlier
 * @property string $after
 *
 * @property CorrectAnswer[] $correctAnswers
 * @property Property $property
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
            [['name_level', 'instruction', 'property_id', 'board', 'selector', 'style', 'earlier', 'after'], 'required'],
            [['instruction', 'style', 'earlier', 'after'], 'string'],
            [['property_id'], 'integer'],
            [['name_level', 'selector'], 'string', 'max' => 255],
            [['board'], 'string', 'max' => 50],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::class, 'targetAttribute' => ['property_id' => 'id_property']],
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
        ];
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
     * Gets query for [[UserResponses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserResponses()
    {
        return $this->hasMany(UserResponse::class, ['level_id' => 'id_level']);
    }
}
