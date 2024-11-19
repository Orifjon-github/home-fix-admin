<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $branch_id
 * @property string $in_office
 * @property string|null $position
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Notifications[] $notifications
 * @property SmsCodes[] $smsCodes
 * @property UserFcmTokens[] $userFcmTokens
 */
class AttendancesUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
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
            [['name', 'username', 'password'], 'required'],
            [['in_office'], 'string'],
            [['email_verified_at', 'created_at', 'updated_at'], 'safe'],
            [['name', 'username', 'branch_id', 'position', 'password'], 'string', 'max' => 255],
            [['remember_token'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'branch_id' => 'Branch ID',
            'in_office' => 'In Office',
            'position' => 'Position',
            'email_verified_at' => 'Email Verified At',
            'password' => 'Password',
            'remember_token' => 'Remember Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[SmsCodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmsCodes()
    {
        return $this->hasMany(SmsCodes::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserFcmTokens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserFcmTokens()
    {
        return $this->hasMany(UserFcmTokens::class, ['user_id' => 'id']);
    }
    public function getAttendances()
    {
        return $this->hasMany(UserAttendances::class, ['user_id' => 'id']);
    }
    public function getBranch(){
        return $this->hasOne(AttendanceBranches::class, ['branch_id' => 'id']);
    }
}
