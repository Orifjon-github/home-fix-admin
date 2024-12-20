<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tasks-view">
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
                    [
                        'attribute' => 'status',
                        'format' => 'raw', // Allows HTML rendering
                        'value' => function ($model) {

                            return $model->status;
                        },
                        'label' => 'Status',
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]);
            $form = ActiveForm::begin([
                'action' => ['task-check/update-status', 'id' => $model->id],  // Route to update the status
                'method' => 'post',  // Submit via POST
            ]);
            echo$form->field($model, 'status')->dropDownList(['done' => 'Done', 'process' => 'Process' , 'new'=>'New' , 'checking'=>'Checking'], ['prompt' => '']);
            echo Html::submitButton('Update Status', ['class' => 'btn btn-primary']);
            ActiveForm::end();
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>Worker</h1>
            <?= GridView::widget([
                'dataProvider' => $workers, // Set the data provider here
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
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


</div>
