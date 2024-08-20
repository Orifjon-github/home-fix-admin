<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property int $id
 * @property string $type
 * @property string $duration
 * @property int $amount
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Orders[] $orders
 * @property PlanAdvantages[] $planAdvantages
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans';
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
            [['type', 'duration', 'enable'], 'string'],
            [['amount'], 'required'],
            [['amount'], 'integer'],
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
            'type' => 'Type',
            'duration' => 'Duration',
            'amount' => 'Amount',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['plan_id' => 'id']);
    }

    /**
     * Gets query for [[PlanAdvantages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanAdvantages()
    {
        return $this->hasMany(PlanAdvantages::class, ['plan_id' => 'id']);
    }
}
