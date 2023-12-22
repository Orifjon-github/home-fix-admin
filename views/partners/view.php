<?php

use app\models\Partners;
use app\models\Socials;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Partners $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="partners-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                    'name',
                    'name_uz',
                    'link:ntext',
                    'link_uz:ntext',
                    [
                        'attribute' => 'icon',
                        'format' => 'raw',
                        'value' => function (Partners $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->icon], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'icon_uz',
                        'format' => 'raw',
                        'value' => function (Partners $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->icon_uz], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (Partners $model) {
                            return Socials::enableOrDisable($model->enable);
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
