<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Level;

/**
 * LevelSearch represents the model behind the search form of `app\models\Level`.
 */
class LevelSearch extends Level
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_level', 'property_id'], 'integer'],
            [['name_level', 'instruction', 'board', 'selector', 'style', 'earlier', 'after'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Level::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_level' => $this->id_level,
            'property_id' => $this->property_id,
        ]);

        $query->andFilterWhere(['like', 'name_level', $this->name_level])
            ->andFilterWhere(['like', 'instruction', $this->instruction])
            ->andFilterWhere(['like', 'board', $this->board])
            ->andFilterWhere(['like', 'selector', $this->selector])
            ->andFilterWhere(['like', 'style', $this->style])
            ->andFilterWhere(['like', 'earlier', $this->earlier])
            ->andFilterWhere(['like', 'after', $this->after]);

        return $dataProvider;
    }
}
