<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $home_equipment_id
 * @property string $type
 * @property string|null $service_type
 * @property string|null $service_type_ru
 * @property string|null $service_type_en
 * @property string $name
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string|null $description
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property int|null $duration
 * @property int|null $is_equipment
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
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
            [['home_equipment_id', 'name'], 'required'],
            [['type'], 'string'],
            [['duration', 'is_equipment'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['home_equipment_id', 'service_type', 'service_type_ru', 'service_type_en', 'name', 'name_ru', 'name_en', 'start_time', 'end_time', 'description', 'description_ru', 'description_en', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'home_equipment_id' => 'Home Equipment ID',
            'type' => 'Type',
            'service_type' => 'Service Type',
            'service_type_ru' => 'Service Type Ru',
            'service_type_en' => 'Service Type En',
            'name' => 'Name',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'duration' => 'Duration',
            'is_equipment' => 'Is Equipment',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
