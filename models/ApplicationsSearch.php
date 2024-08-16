<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Applications;

class ApplicationsSearch extends Applications
{
    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['name', 'phone', 'message', 'type', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function search($params): ActiveDataProvider
    {
        $query = Applications::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'message', $this->message]);

        $query->orderBy(['id' => SORT_DESC]);
        return $dataProvider;
    }
}
