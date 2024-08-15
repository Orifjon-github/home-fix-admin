<?php

use app\services\HelperService;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">
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
                    'title:ntext',
                    'title_ru:ntext',
                    'title_en:ntext',
                    HelperService::html(),
                    HelperService::html('ru'),
                    HelperService::html('en'),
                    'video_url:ntext',
                    'video_url_ru:ntext',
                    'video_url_en:ntext',
                    HelperService::image('uz', 'video_bg'),
                    HelperService::image(),
                    HelperService::enable(),
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Sub Services</h3>
            <p><?= Html::a('Добавить новое', ['service-advantages/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
            <?= /** @var mixed $dataProvider */
            /** @var mixed $searchModel */
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    'price',
                    'created_at',
                    HelperService::actionChild('service-advantages')
                ],
            ]); ?>
        </div>
    </div>
</div>
