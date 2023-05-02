<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level_answer".
 *
 * @property int $id
 * @property int $level_id
 * @property int $answer_id
 *
 * @property CorrectAnswer $answer
 * @property Level $level
 */
class LevelAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'level_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level_id', 'answer_id'], 'required'],
            [['level_id', 'answer_id'], 'integer'],
            [['answer_id'], 'exist', 'skipOnError' => true, 'targetClass' => CorrectAnswer::class, 'targetAttribute' => ['answer_id' => 'id_answer']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::class, 'targetAttribute' => ['level_id' => 'id_level']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'level_id' => 'Идентификатор уровня',
            'answer_id' => 'Идентификатор ответа',
        ];
    }

    /**
     * Gets query for [[Answer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer()
    {
        return $this->hasOne(CorrectAnswer::class, ['id_answer' => 'answer_id']);
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
}
