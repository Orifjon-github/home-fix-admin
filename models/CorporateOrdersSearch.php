<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CorporateOrders;

/**
 * CorporateOrdersSearch represents the model behind the search form of `app\models\CorporateOrders`.
 */
class CorporateOrdersSearch extends CorporateOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['plan_id', 'service_id', 'user_home_id', 'price', 'period', 'count_per_month', 'additional', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = CorporateOrders::find();

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
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'plan_id', $this->plan_id])
            ->andFilterWhere(['like', 'service_id', $this->service_id])
            ->andFilterWhere(['like', 'user_home_id', $this->user_home_id])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'period', $this->period])
            ->andFilterWhere(['like', 'count_per_month', $this->count_per_month])
            ->andFilterWhere(['like', 'additional', $this->additional])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
