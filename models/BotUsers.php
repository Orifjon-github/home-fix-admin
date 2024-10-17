<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $role
 * @property string|null $phone
 * @property string $chat_id
 * @property string|null $language
 * @property string $step
 * @property string $status
 * @property string|null $object_id
 * @property string|null $remember_token
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 */
class BotUsers extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'users';
    }

    public static function getDb()
    {
        return Yii::$app->get('db3');
    }

    public function rules(): array
    {
        return [
            [['chat_id'], 'required'],
            [['language', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'role', 'phone', 'chat_id', 'step', 'object_id'], 'string', 'max' => 255],
            [['remember_token'], 'string', 'max' => 100],
            [['chat_id'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'role' => 'Role',
            'phone' => 'Phone',
            'chat_id' => 'Chat ID',
            'language' => 'Language',
            'step' => 'Current Action',
            'status' => 'Status',
            'object_id' => 'Object ID',
            'remember_token' => 'Remember Token',
            'created_at' => 'Created At',
            'updated_at' => 'Last Action Time',
        ];
    }

    public static function roles($role=null)
    {
        $roles = [
            'manager' => 'Sales Manager',
            'warehouse' => 'Warehouse Worker',
            'employee' => 'Worker'
        ];
        if (!$role) return $roles;
        return array_key_exists($role, $roles) ? $roles[$role] : $role;
    }
}
