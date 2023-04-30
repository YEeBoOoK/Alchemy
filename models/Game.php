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
class Game extends Level
{
    
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
