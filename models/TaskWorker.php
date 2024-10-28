<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_works".
 *
 * @property int $id
 * @property int $task_id
 * @property string $name
 * @property string $price
 * @property string $is_finished
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Tasks $task
 */
class TaskWorker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_works';
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
            [['task_id', 'name', 'price'], 'required'],
            [['task_id'], 'integer'],
            [['name', 'is_finished'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['price'], 'string', 'max' => 255],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::class, 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'name' => 'Name',
            'price' => 'Price',
            'is_finished' => 'Is Finished',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::class, ['id' => 'task_id']);
    }
}
