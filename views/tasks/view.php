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
            <?= GridView::widget([
                'dataProvider' => $images, // Set the data provider here
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    [
                        'attribute' => 'image', // This should be your image attribute
                        'label' => 'Image',
                        'format' => 'raw', // Use raw format to render HTML
                        'value' => function ($model) {
                            return Html::img($model->image, [
                                'alt' => 'Image',
                                'style' => 'width:100px; height:auto;', // Customize the size as needed
                            ]);
                        },
                    ],
                    'state'
                ],
            ]); ?>
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
