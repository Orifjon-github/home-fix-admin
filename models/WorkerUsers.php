<?php
namespace app\models;

use Yii;

/**
 * @property mixed|null $id
 * @property mixed|string|null $password
 */
class  WorkerUsers extends \yii\db\ActiveRecord

{
    public static function tableName(){
        return  'users';
    }
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }
    public function rules()
    {
        return [
            [['username', 'name', 'password'], 'required'],
            ['username', 'string', 'max' => 255],
            ['password', 'string', 'min' => 6], // Example: password must be at least 6 characters
            [['image'], 'string'], // Adjust based on your actual use case
            [['created_at', 'updated_at'], 'safe'], // Dates can be set to safe
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'image' => 'Image',
            'password' => 'Password',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getTasks(){
        // Get the Worker instance
        $taskIds = TaskWorkerUser::find()
            ->select('task_id') // Select only the task_id column
            ->where(['worker_user_id' => $this->id])
            ->column();
        $tasks = Tasks::find()
            ->where(['id' => $taskIds]); // Use 'IN' to filter;
        return $tasks;
    }

}