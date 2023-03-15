<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property int $id_property
 * @property string $name_property
 * @property string $definition
 *
 * @property Level[] $levels
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_property', 'definition'], 'required'],
            [['definition'], 'string'],
            [['name_property'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_property' => 'Id Объяснения',
            'name_property' => 'Название',
            'definition' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Levels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevels()
    {
        return $this->hasMany(Level::class, ['property_id' => 'id_property']);
    }
}
