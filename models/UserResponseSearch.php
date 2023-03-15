<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserResponse;

/**
 * UserResponseSearch represents the model behind the search form of `app\models\UserResponse`.
 */
class UserResponseSearch extends UserResponse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_response', 'user_id', 'level_id'], 'integer'],
            [['response'], 'safe'],
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
        $query = UserResponse::find();

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
            'id_response' => $this->id_response,
            'user_id' => $this->user_id,
            'level_id' => $this->level_id,
        ]);

        $query->andFilterWhere(['like', 'response', $this->response]);

        return $dataProvider;
    }
}
