<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "processes".
 *
 * @property int $id
 * @property string $image
 * @property string|null $image_ru
 * @property string|null $image_en
 * @property string|null $link
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Processes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'processes';
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
            [['link', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['image', 'image_ru', 'image_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'image_ru' => 'Image Ru',
            'image_en' => 'Image En',
            'link' => 'Link',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
