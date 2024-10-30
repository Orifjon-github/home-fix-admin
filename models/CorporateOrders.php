<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "corporate_orders".
 *
 * @property int $id
 * @property string $plan_id
 * @property string $service_id
 * @property string $user_home_id
 * @property string|null $price
 * @property string|null $period
 * @property string|null $count_per_month
 * @property string|null $additional
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class CorporateOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corporate_orders';
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
            [['plan_id', 'name', 'name_ru', 'name_en', 'description', 'description_ru', 'description_en', 'service_id', 'user_home_id', 'price', 'price_ru', 'price_en', 'period', 'period_ru', 'period_en', 'count_per_month', 'additional', 'status'], 'safe'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
            'name'=>'Name',
            'name_ru'=>'Name Ru',
            'name_en'=>'Name En',
            'description'=>'Description',
            'description_ru'=>'Description Ru',
            'description_en'=>'Description Eu',
            'service_id' => 'Service ID',
            'user_home_id' => 'User Home ID',
            'price' => 'Price',
            'price_ru' => 'Price Ru','price_en' => 'Price En',
            'period' => 'Period',
            'periodu_ru' => 'Period Ru',
            'period_en' => 'Period En',
            'count_per_month' => 'Count Per Month',
            'additional' => 'Additional',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function orders(): array
    {
        $users = self::find()
            ->select([ 'name' , 'id'])
            ->asArray()
            ->all();

        return ArrayHelper::map($users, 'id', 'name');
    }
}
