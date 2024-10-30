<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['name','name_ru' ,'name_en', 'long', 'lat', 'title','title_ru','title_en', 'entrance', 'floor', 'number', 'description','description_ru','description_en', 'target'], 'string', 'max' => 255],
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
            'name_ru'=>'Name Ru',
            'name_en'=>'Name En',
            'long' => 'Long',
            'lat' => 'Lat',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'entrance' => 'Entrance',
            'floor' => 'Floor',
            'number' => 'Number',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'target' => 'Target',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    public static function branches(): array
    {
        $branches = self::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();

        return ArrayHelper::map($branches, 'id', 'name');
    }
    public function getUser(){
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
