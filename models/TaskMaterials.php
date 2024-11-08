<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_materials".
 *
 * @property int $id
 * @property string $task_id
 * @property string $name
 * @property string|null $description
 * @property string|null $price
 * @property string|null $quantity
 * @property string|null $quantity_type
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property MaterialImages[] $materialImages
 */
class TaskMaterials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_materials';
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
            [['task_id', 'name' , 'name_ru' , 'name_en' ,'type'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['task_id', 'name', 'description' ,'description_ru','description_en', 'price', 'quantity', 'quantity_type'], 'string', 'max' => 255],
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
            'name_en'=>'Name En',
            'name_ru'=>'Name Ru',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'price' => 'Price',
            'type'=>'Turi',
            'quantity' => 'Quantity',
            'quantity_type' => 'Quantity Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[MaterialImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialImages()
    {
        return $this->hasMany(MaterialImages::class, ['task_material_id' => 'id']);
    }
}
