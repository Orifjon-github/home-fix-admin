<?php

namespace app\models;

use Yii;

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
            [['plan_id', 'service_id', 'user_home_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['plan_id', 'service_id', 'user_home_id', 'price', 'period', 'count_per_month', 'additional', 'status'], 'string', 'max' => 255],
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
            'service_id' => 'Service ID',
            'user_home_id' => 'User Home ID',
            'price' => 'Price',
            'period' => 'Period',
            'count_per_month' => 'Count Per Month',
            'additional' => 'Additional',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
