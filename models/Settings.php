<?php

namespace app\models;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\web\Response;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $value_ru
 * @property string|null $value_en
 * @property string $type
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Settings extends \yii\db\ActiveRecord
{
    const FILE_TYPE = 'image';
    const HTML_TYPE = 'html';
    const TEXT_TYPE = 'text';
    public static function tableName(): string
    {
        return 'settings';
    }

    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    public function rules()
    {
        return [
            [['key'], 'required'],
            [['value', 'value_ru','value_en', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'value_ru' => 'Value Ru',
            'value_en' => 'Value En',
            'enable' => 'Enable/Disable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function settingKeys($key): ?string
    {
        $list = [
            'logo' => 'Логотип',
            'email' => 'Электронная почта',
            'address' => 'Адрес',
            'iframe' => 'Карта',
            'terms_partner' => 'Условия партнерства',
            'terms_partner_2' => 'Условия партнерства (2)',
            'background_image_partner' => 'Фоновое изображение для партнера',
            'about_image' => 'Изображение для «О нас»',
            'about_short_description' => 'Краткое описание для «О нас»',
            'about_image2' => 'Изображение для «О нас» (2)',
            'about_description' => 'Описание для О нас',
            'result_video' => 'Видео для результатов',
            'delivery_text' => 'Текст для доставки',
            'consultation_image' => 'Изображение для консультации',
            'consultation_description' => 'Описание для консультации',
            'consultation_job' => 'Профессия консультанта',
            'consultation_name' => 'Имя консультанта',
            'productBg' => 'Фон для страницы продукта',
            'contactBg' => 'Фон для страницы контактов',
            'aboutBg' => 'Фон для страницы «О нас»',
            'blogBg' => 'Фон для страницы новостей',
            'cartBg' => 'Фон для страницы корзины',
            'favoritesBg' => 'Фон для страницы избранного',
            'partnerBg' => 'Фон для партнерской страницы',
            'advantageBg' => 'Фон для страницы «Преимущества»',
            'consultationBg' => 'Фон для страницы «Консультации»',
            'galleryBg' => 'Фон для страницы «Галереи»',
            'about_video' => 'Видео для О нас',
            'about_video_image' => 'Изображение для видео «О нас»',
            'result_image' => 'Изображение для результатов',
        ];

        return $list[$key] ?? null;
    }
}
