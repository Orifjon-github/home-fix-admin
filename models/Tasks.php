<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $order_id
 * @property string|null $service_type
 * @property string $name
 * @property string|null $description
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Orders $order
 * @property TaskDates[] $taskDates
 * @property TaskImages[] $taskImages
 * @property TaskWorks[] $taskWorks
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
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
            [['order_id', 'name'], 'required'],
            [['order_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['service_type', 'name', 'description', 'status'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'service_type' => 'Service Type',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[TaskDates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaskDates()
    {
        return $this->hasMany(TaskDates::class, ['task_id' => 'id']);
    }

    /**
     * Gets query for [[TaskImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaskImages()
    {
        return $this->hasMany(TaskImages::class, ['task_id' => 'id']);
    }

    /**
     * Gets query for [[TaskWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaskWorks()
    {
        return $this->hasMany(TaskWorks::class, ['task_id' => 'id']);
    }
}
