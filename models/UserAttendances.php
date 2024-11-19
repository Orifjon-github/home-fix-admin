<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_attendances".
 *
 * @property int $id
 * @property string $user_id
 * @property string $branch_id
 * @property string $type
 * @property string|null $long
 * @property string|null $lat
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class UserAttendances extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_attendances';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db5');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'branch_id'], 'required'],
            [['type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'branch_id', 'long', 'lat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'branch_id' => 'Branch ID',
            'type' => 'Type',
            'long' => 'Long',
            'lat' => 'Lat',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
