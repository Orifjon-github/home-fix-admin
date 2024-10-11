<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_homes".
 *
 * @property int $id
 * @property string $type
 * @property string|null $name
 * @property string|null $long
 * @property string|null $lat
 * @property string $title
 * @property string|null $entrance
 * @property string|null $floor
 * @property string|null $number
 * @property string|null $description
 * @property string|null $target
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $user_id
 *
 * @property HomeEquipment[] $homeEquipments
 * @property HomeProblems[] $homeProblems
 * @property Users $user
 */
class UserHomes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_homes';
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
            [['type'], 'string'],
            [['title', 'user_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'integer'],
            [['name', 'long', 'lat', 'title', 'entrance', 'floor', 'number', 'description', 'target'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'long' => 'Long',
            'lat' => 'Lat',
            'title' => 'Title',
            'entrance' => 'Entrance',
            'floor' => 'Floor',
            'number' => 'Number',
            'description' => 'Description',
            'target' => 'Target',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[HomeEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHomeEquipments()
    {
        return $this->hasMany(HomeEquipment::class, ['home_id' => 'id']);
    }

    /**
     * Gets query for [[HomeProblems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHomeProblems()
    {
        return $this->hasMany(HomeProblems::class, ['home_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
