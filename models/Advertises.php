<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advertises".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string $description
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string $image
 * @property string|null $image_ru
 * @property string|null $image_en
 * @property string|null $service_id
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Advertises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertises';
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
            [['title', 'description', 'image'], 'required'],
            [['image_ru', 'image_en', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'title_ru', 'title_en', 'description', 'description_ru', 'description_en', 'image', 'service_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'image' => 'Image',
            'image_ru' => 'Image Ru',
            'image_en' => 'Image En',
            'service_id' => 'Service ID',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
