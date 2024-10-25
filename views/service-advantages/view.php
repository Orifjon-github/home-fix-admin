<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ServiceAdvantages $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => $model->service->title,
    'url' => ['services/view', 'id' => $model->service_id],
];
\yii\web\YiiAsset::register($this);
?>
<div class="service-advantages-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                    'service_id',
                    'title:ntext',
                    'title_ru:ntext',
                    'title_en:ntext',
                    'price',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
