<?php

use app\services\HelperService;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CorporateOrders $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Corporate Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="corporate-orders-view">
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
                    'plan_id',
                    'service_id',
                    'user_home_id',
                    'price',
                    'period',
                    'count_per_month',
                    'additional',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
