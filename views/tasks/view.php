<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tasks-view">

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
                    [
                       'attribute' => 'home_equipment_id',
                       'format' => 'raw', // This allows HTML to be rendered in the cell
                       'value' => function ($model) {
                           $equipment = \app\models\HomeEquipment::findOne($model->home_equipment_id);
                           return $equipment
                               ? \yii\helpers\Html::a($equipment->name, ['home-equipment/view', 'id' => $equipment->id], ['target' => '_blank'])
                               : null;
                       },
                       'label' => 'Equipment Name',
                   ],
                    'type',
                    'service_type',
                    'service_type_ru',
                    'service_type_en',
                    'name',
                    'name_ru',
                    'name_en',
                    'start_time',
                    'end_time',
                    'description',
                    'description_ru',
                    'description_en',
                    'duration',
                    'is_equipment',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>Worker</h1>

            <?= Html::a('Create Worker', ['/task-worker-user/create'], ['class' => 'btn btn-success']) ?>
            <?= GridView::widget([
                'dataProvider' => $workers, // Set the data provider here
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'task_id',
                    [
                        'attribute' => 'worker_user_id',
                        'format' => 'raw', // This allows HTML to be rendered in the cell
                        'value' => function ($model) {
                            $worker = \app\models\WorkerUsers::findOne($model->worker_user_id);

                            return $worker
                                ? \yii\helpers\Html::a($worker->name, ['worker-user/view', 'id' => $worker->id], ['target' => '_blank'])
                                : null;
                        },
                        'label' => 'Worker',
                    ],
                ],
            ]); ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>Materials</h1>
            <?= Html::a('Create Material', ['/task-materials/create'], ['class' => 'btn btn-success']) ?>
            <?= GridView::widget([
                'dataProvider' => $materials, // Set the data provider here
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'task_id',
                    'name',
                    'description',
                    'price',
                    'quantity',
                    'quantity_type',
                ],
            ]); ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>Works</h1>
            <?= Html::a('Create Works', ['/task-works/create'], ['class' => 'btn btn-success']) ?>
            <?= GridView::widget([
                'dataProvider' => $works, // Set the data provider here
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'price',
                    'is_finished'
                ],
            ]); ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>Images</h1>
            <?= Html::a('Create Images', ['/task-images/create'], ['class' => 'btn btn-success']) ?>
            <div class="row">
                <?php foreach ($images->getModels() as $model): ?>
                    <div class="col-md-3"> <!-- Adjust the column size as needed -->
                        <div class="card mb-3">
                            <img src="/<?= Html::encode($model->image) ?>" class="card-img-top" alt="Image" style="width:100%; height:auto;">
                            <div class="card-body">

                                <p class="card-text"><small class="text-muted"><?= Html::encode($model->state) ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


<!--    <div class="card">-->
<!--        <div class="card-body">-->
<!--            <h1>Equipments</h1>-->
<!--            --><?php //= GridView::widget([
//                'dataProvider' => $equptments, // Set the data provider here
//                'columns' => [
//                    ['class' => 'yii\grid\SerialColumn'],
//                    'id',
//                    'task_id',
//                    'equipment_id',
//                ],
//            ]); ?>
<!--        </div>-->
<!--    </div>-->

</div>
