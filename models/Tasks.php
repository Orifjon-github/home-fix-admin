<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $home_equipment_id
 * @property string $type
 * @property string|null $service_type
 * @property string $name
 * @property string|null $description
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string $status
 * @property int|null $duration
 * @property int|null $is_equipment
 * @property string|null $created_at
 * @property string|null $updated_at
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
            [['home_equipment_id', 'name','status'], 'required'],
            [['type', 'service_type','service_type_ru','service_type_en', 'name', 'description', 'status'], 'string', 'max' => 255],
            [['duration', 'is_equipment'], 'integer'],
            [['start_time', 'end_time', 'created_at', 'updated_at'], 'safe'],
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
            'description' => 'Description',
            'description_ru' => 'Description',
            'description_en' => 'Description',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'duration' => 'Duration',
            'is_equipment' => 'Is Equipment',
        ];
    }
    public function getHomeEquipment()
    {
        return HomeEquipment::findOne($this->home_equipment_id);
    }
    public function getMaterials(){
       return TasksMaterials::find()->where(['task_id' => $this->id])->all();
    }

    public static function services(): array
    {
        $services = self::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();

        return ArrayHelper::map($services, 'id', 'name');
    }
}
