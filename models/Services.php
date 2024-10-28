<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $description
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string $video_url
 * @property string|null $video_url_ru
 * @property string|null $video_url_en
 * @property string|null $video_bg
 * @property string|null $image
 * @property string|null $icon
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ServiceAdvantages[] $serviceAdvantages
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
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
            [['title', 'video_url'], 'required'],
            [['title', 'title_ru', 'title_en', 'description', 'description_ru', 'icon', 'description_en', 'video_url', 'video_url_ru', 'video_url_en', 'video_bg', 'image', 'enable'], 'string'],
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
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'video_url' => 'Video Url',
            'video_url_ru' => 'Video Url Ru',
            'video_url_en' => 'Video Url En',
            'video_bg' => 'Video Bg',
            'image' => 'Image',
            'icon' => 'Icon',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function services(): array
    {
        return self::find()
            ->select(['id', 'title'])
            ->indexBy('id')
            ->column();
    }

}
