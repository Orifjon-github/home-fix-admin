<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_equipment".
 *
 * @property int $id
 * @property int $task_id
 * @property int $equipment_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TaskEquipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_equipment';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'equipment_id'], 'required'],
            [['task_id', 'equipment_id'], 'integer'],
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
            'task_id' => 'Task ID',
            'equipment_id' => 'Equipment ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
