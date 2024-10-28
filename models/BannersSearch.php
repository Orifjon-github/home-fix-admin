<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Banners;

/**
 * @property mixed|null $title_ru
 * @property mixed|null $type
 */
class BannersSearch extends Banners
{
    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['title', 'title_ru','title_en', 'image' ,'enable', 'created_at', 'updated_at', 'image_ru', 'image_en', 'type', 'service_id'], 'safe'],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }

    public function search($params): ActiveDataProvider
    {
        $query = Banners::find();

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'enable', $this->enable]);

        return $dataProvider;
    }
}
