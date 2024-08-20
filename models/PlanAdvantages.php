<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_advantages".
 *
 * @property int $id
 * @property int $plan_id
 * @property string $title
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property int $price
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Plans $plan
 */
class PlanAdvantages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_advantages';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'title'], 'required'],
            [['plan_id', 'price'], 'integer'],
            [['title', 'title_ru', 'title_en'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plans::class, 'targetAttribute' => ['plan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_id' => 'Plan ID',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plans::class, ['id' => 'plan_id']);
    }
}
