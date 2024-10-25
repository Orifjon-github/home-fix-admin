<?php

use app\models\Applications;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ApplicationsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Applications for Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">
    <div class="card">
        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'phone',
                    'message',
                    'created_at',
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view}',
                    ]
                ],
            ]); ?>

        </div>
    </div>
</div>
