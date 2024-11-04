<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_worker_user".
 *
 * @property int $id
 * @property string $task_id
 * @property string $worker_user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TaskWorkerUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $status;
    public static function tableName()
    {
        return 'task_worker_user';
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
            [['task_id', 'worker_user_id' ], 'required'],
            [['created_at', 'updated_at'], 'safe'],

            [['task_id', 'worker_user_id'], 'string', 'max' => 255],
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
            'worker_user_id' => 'Worker User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
