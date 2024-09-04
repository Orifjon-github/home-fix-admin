<?php

use app\models\Services;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ServicesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Services', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    HelperService::image(),
                    HelperService::image('uz', 'video_bg'),
                    HelperService::image('uz', 'icon'),
                    'video_url',
                    HelperService::enable(),
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>
</div>
