<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_images".
 *
 * @property int $id
 * @property int $post_id
 * @property string $image
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Posts $post
 */
class PostImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_images';
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
            [['post_id', 'image'], 'required'],
            [['post_id'], 'integer'],
            [['image', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::class, 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'image' => 'Image',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Posts::class, ['id' => 'post_id']);
    }
}
