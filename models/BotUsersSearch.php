<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BotUsers;

class BotUsersSearch extends BotUsers
{

    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['name', 'role', 'phone', 'chat_id', 'language', 'step', 'status', 'object_id', 'remember_token', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }

    public function search($params): ActiveDataProvider
    {
        $query = BotUsers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'phone' => $this->phone,
            'role' => $this->role,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'chat_id', $this->chat_id])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'step', $this->step])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'object_id', $this->object_id])
            ->andFilterWhere(['like', 'remember_token', $this->remember_token]);
        return $dataProvider;
    }
}
