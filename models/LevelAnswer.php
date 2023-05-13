<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level_answer".
 *
 * @property int $id
 * @property int $level_id
 * @property int $answer
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
            [['level_id', 'answer'], 'required'],
            [['level_id'], 'integer'],
            [['answer'], 'string', 'max' => 255],
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
            'answer' => 'Правильный ответ',
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
}
