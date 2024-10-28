<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $image
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Users extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    public function rules()
    {
        return [
            [['name', 'username', 'password'], 'required'],
            [['email_verified_at', 'created_at', 'updated_at'], 'safe'],
            [['name', 'username', 'image', 'password'], 'string', 'max' => 255],
            [['remember_token'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'image' => 'Image',
            'email_verified_at' => 'Email Verified At',
            'password' => 'Password',
            'remember_token' => 'Remember Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function users(): array
    {
        $users = self::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();

        return ArrayHelper::map($users, 'id', 'name');
    }
}
