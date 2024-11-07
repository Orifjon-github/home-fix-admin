<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advantages".
 *
 * @property int $id
 * @property string|null $icon
 * @property string $title
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $description
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Advantages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advantages';
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
            [['icon', 'description', 'description_ru', 'description_en', 'enable'], 'string'],
            [['title'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'title_ru', 'title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Icon',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
