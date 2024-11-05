<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $id
 * @property int $objects_id
 * @property string $name
 * @property string|null $address
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Objects $objects
 */
class BotBranches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
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
            [['objects_id', 'name'], 'required'],
            [['objects_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address', 'status'], 'string', 'max' => 255],
            [['objects_id'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['objects_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'objects_id' => 'Objects ID',
            'name' => 'Name',
            'address' => 'Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Objects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasOne(Objects::class, ['id' => 'objects_id']);
    }
}
