<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telegram_texts".
 *
 * @property int $id
 * @property string $keyword
 * @property string|null $uz
 * @property string|null $ru
 * @property string|null $en
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class BotTelegramTexts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_texts';
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
            [['keyword'], 'required'],
            [['uz', 'ru', 'en'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyword' => 'Keyword',
            'uz' => 'Uz',
            'ru' => 'Ru',
            'en' => 'En',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
