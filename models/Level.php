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
 * @property string|null $class
 * @property string|null $class2
 * @property string $style
 * @property string $earlier
 * @property string $after
 * @property string $winClass
 *
 * @property LevelAnswer[] $levelAnswers
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
            [['name_level', 'instruction', 'style', 'earlier', 'after'], 'required'],
            [['instruction', 'earlier', 'after'], 'string'],
            [['property_id'], 'integer'],
            [['name_level', 'class', 'class2', 'style', 'winClass'], 'string', 'max' => 255],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::class, 'targetAttribute' => ['property_id' => 'id_property']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_level' => 'Идентификатор',
            'name_level' => 'Название',
            'instruction' => 'Инструкция',
            'property_id' => 'Объяснение',
            'class' => 'Класс',
            'class2' => 'Класс2',
            'style' => 'Style',
            'earlier' => 'Текст до кода',
            'after' => 'Текст после',
            'winClass' => 'Класс получившегося элемента',
        ];
    }

    /**
     * Gets query for [[LevelAnswers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevelAnswers()
    {
        return $this->hasMany(LevelAnswer::class, ['level_id' => 'id_level']);
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
