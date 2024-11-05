<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_images".
 *
 * @property int $id
 * @property string $material_id
 * @property string $image
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class BotMaterialImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_images';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db3');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['material_id', 'image'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['material_id', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'material_id' => 'Material ID',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
