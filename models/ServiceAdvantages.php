<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_advantages".
 *
 * @property int $id
 * @property int $service_id
 * @property string $title
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property int $price
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Services $service
 */
class ServiceAdvantages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_advantages';
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
            [['service_id', 'title'], 'required'],
            [['service_id', 'price'], 'integer'],
            [['title', 'title_ru', 'title_en'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }
}
