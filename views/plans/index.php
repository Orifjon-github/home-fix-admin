<?php

use app\models\Plans;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlansSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Plans';
$this->params['breadcrumbs'][] = $this->title;
$type = [
    'corporate' => 'Corporate',
    'individual' => 'Individual'
];
?>
<div class="plans-index">
    <div class="card">
        <div class="card-body">

            <p>
                <?= Html::a('Create Plans', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    [
                        'attribute' => 'type',
                        'value' => function ($model) use ($type) {
                            return $type[$model->type];
                        },
                        'filter' => $type
                    ],
                    'duration',
                    'amount',
                    HelperService::enable(),
                    //'created_at',
                    //'updated_at',
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>
</div>
