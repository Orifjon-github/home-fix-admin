<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\WorkerUsers $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Worker Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worker-users-view">

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

    <div class="card">
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'username',
                    \app\services\HelperService::image(),
                    'email_verified_at:email',
                    'password',
                    'status',
                    'remember_token',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
    <h1>Tasks</h1>
   <div class="card">
       <div class="card-body">
           <?php
           $dataProvider = new \yii\data\ActiveDataProvider([
               'query'=>$model->getTasks(),
           ]);
           echo \yii\grid\GridView::widget([
               'dataProvider' => $dataProvider,
               'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],

                   //'id',
                   'order_id',
                   'service_type',
                   'name',
                   'description',
                   //'status',
                   //'created_at',
                   //'updated_at',

               ],
           ]); ?>
       </div>
   </div>


</div>
