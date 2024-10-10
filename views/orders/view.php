<?php

use yii\helpers\Html;
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
            <?= Html::a('<i class="fa fa-refresh"></i> Activate', Yii::$app->urlManager->createUrl('/orders/activate?=id') . $model->id, ['class' => 'btn btn-warning', 'style' => 'display:inline-block']) ?>
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
                    'branch_id',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
