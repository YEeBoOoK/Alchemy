<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "correct_answer".
 *
 * @property int $id_answer
 * @property string $answer
 *
 * @property LevelAnswer[] $levelAnswers
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
            [['answer'], 'required'],
            [['answer'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_answer' => 'Идентификатор',
            'answer' => 'Ответ',
        ];
    }

    /**
     * Gets query for [[LevelAnswers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevelAnswers()
    {
        return $this->hasMany(LevelAnswer::class, ['answer_id' => 'id_answer']);
    }
}
