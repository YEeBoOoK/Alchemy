<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "correct_answer".
 *
 * @property int $id_answer
 * @property int $level_id
 * @property string $answer
 *
 * @property Level $level
 * @property Level[] $levels
 */
class CorrectAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correct_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level_id', 'answer'], 'required'],
            [['level_id'], 'integer'],
            [['answer'], 'string'],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::class, 'targetAttribute' => ['level_id' => 'id_level']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_answer' => 'Id Answer',
            'level_id' => 'Level ID',
            'answer' => 'Answer',
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
        return $this->hasMany(Level::class, ['correct_answer' => 'id_answer']);
    }
}
