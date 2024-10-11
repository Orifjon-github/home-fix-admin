<?php

use app\models\Orders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <div class="card">
        <div class="card-body">
            <!--            <p>-->
            <!--                --><?php //= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
            <!--            </p>-->

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'user_id',
                    [
                        'attribute' => 'branch_id',
                        'value' => function ($model) {
                            return $model->branch->name ?? $model->branch_id;
                        }
                    ],
                    'status',
                    'created_at',
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view}', // specify the actions you want to display
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>
