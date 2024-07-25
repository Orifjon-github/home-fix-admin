<?php

use app\models\Settings;
use app\models\Socials;
use app\services\HelperService;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Settings $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="settings-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'key',
                        'format' => 'raw',
                        'value' => function (Settings $model) {
                            return $model::settingKeys($model->key) ?? $model->key;
                        }
                    ],
                    [
                        'attribute' => 'value',
                        'contentOptions' => ['style' => 'text-overflow: ellipsis; white-space: nowrap; max-width: 25vw; overflow: hidden;'],
                        'format' => 'raw',
                        'value' => function (Settings $model) {
                            if (str_starts_with($model->value, 'uploads/')) {
                                return Html::a('Просмотр Файл', ['/' . $model->value], ['target' => '_blank']);
                            } else {
                                return $model->value;
                            }
                        },
                    ],
                    [
                        'attribute' => 'value_ru',
                        'contentOptions' => ['style' => 'text-overflow: ellipsis; white-space: nowrap; max-width: 25vw; overflow: hidden;'],
                        'format' => 'raw',
                        'value' => function (Settings $model) {
                            if (empty($model->value_ru)) {
                                return "";
                            }
                            if (str_starts_with($model->value_ru, 'uploads/')) {
                                return Html::a('Просмотр Файл', ['/' . $model->value_ru], ['target' => '_blank']);
                            } else {
                                return $model->value_ru;
                            }
                        }
                    ],
                    [
                        'attribute' => 'value_en',
                        'contentOptions' => ['style' => 'text-overflow: ellipsis; white-space: nowrap; max-width: 25vw; overflow: hidden;'],
                        'format' => 'raw',
                        'value' => function (Settings $model) {
                            if (empty($model->value_en)) {
                                return "";
                            }
                            if (str_starts_with($model->value_en, 'uploads/')) {
                                return Html::a('Просмотр Файл', ['/' . $model->value_en], ['target' => '_blank']);
                            } else {
                                return $model->value_en;
                            }
                        }
                    ],
                    HelperService::enable(),
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
