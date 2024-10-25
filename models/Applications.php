<?php

namespace app\models;

use Yii;

/**
 * @property mixed|null $id
 * @property mixed|null $type
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property mixed|null $name
 * @property mixed|null $phone
 * @property mixed|null $message
 */
class Applications extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'applications';
    }

    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    public function rules(): array
    {
        return [
            [['name', 'phone'], 'required'],
            [['message', 'type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'message' => 'Message',
            'type' => 'Type',
            'resume' => 'Resume',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    public static function AppTypes($type=null): array|string
    {
        $list = [
            'contact' => 'Contact Application',
            'career' => 'Career Application',
        ];
        if ($type==null) {
            return $list;
        }
        return $list[$type] ?? $type;
    }
}
