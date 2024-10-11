<?php

use app\services\HelperService;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Orders $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?php
                if ($model->status == "pending") {
                    echo Html::a('ACTIVATE', Url::to(['orders/activate', 'id' => $model->id]), ['class' => 'btn btn-success']);
                }
                ?>
            </p>
<!--            <p>-->
<!--                --><?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--                --><?php //= Html::a('Delete', ['delete', 'id' => $model->id], [
//                    'class' => 'btn btn-danger',
//                    'data' => [
//                        'confirm' => 'Are you sure you want to delete this item?',
//                        'method' => 'post',
//                    ],
//                ]) ?>
<!--            </p>-->

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
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
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>Tasks</h3>
            <p><?= Html::a('Добавить новое', ['tasks/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
            <?= /** @var mixed $dataProvider */
            /** @var mixed $searchModel */
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'description',
                    'service_type',
                    'status',
                    HelperService::actionChild('tasks')
                ],
            ]); ?>
        </div>
    </div>
</div>
