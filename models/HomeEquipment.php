<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "home_equipment".
 *
 * @property int $id
 * @property int $home_id
 * @property string $name
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $description
 * @property string|null $image
 * @property string|null $fix_date
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property UserHomes $home
 */
class HomeEquipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home_equipment';
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
            [['home_id', 'name'], 'required'],
            [['home_id'], 'integer'],
            [['description','description_ru','description_en', 'image'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name','name_ru','name_en', 'brand', 'model', 'fix_date'], 'string', 'max' => 255],
            [['home_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserHomes::class, 'targetAttribute' => ['home_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'home_id' => 'Home ID',
            'name' => 'Name',
            'name_ru'=>'Name Ru',
            'name_en'=>'Name En',
            'brand' => 'Brand',
            'model' => 'Model',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'image' => 'Image',
            'fix_date' => 'Fix Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Home]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHome()
    {
        return $this->hasOne(UserHomes::class, ['id' => 'home_id']);
    }
}
