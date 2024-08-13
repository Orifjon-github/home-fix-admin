<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $description
 * @property string|null $description_uz
 * @property string|null $image
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banners';
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
            [['title'], 'required'],
            [['title', 'title_ru','title_en', 'image', 'enable'], 'string'],
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
            'title' => 'Title',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'image' => 'Image',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}
