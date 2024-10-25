<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "home_problems".
 *
 * @property int $id
 * @property int $home_id
 * @property string|null $problem
 * @property string|null $type
 * @property string|null $equipment_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property UserHomes $home
 */
class HomeProblems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home_problems';
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
            [['home_id'], 'required'],

            [['home_id'], 'integer'],
            [['problem'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['type', 'equipment_id'], 'string', 'max' => 255],
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
            'problem' => 'Problem',
            'type' => 'Type',
            'equipment_id' => 'Equipment ID',
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
