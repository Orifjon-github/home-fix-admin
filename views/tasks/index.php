<?php

use app\models\HomeEquipment;
use app\models\Tasks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TasksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   <div class="card">
       <div class="card-body">
           <?= GridView::widget([
               'dataProvider' => $dataProvider,
               'filterModel' => $searchModel,
               'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],

                   'id',
                   'name',
                   'description',
                   'service_type',
                   'status',
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

                   'start_time',
                   'end_time',
                   'duration',
                   'is_equipment',
                   [
                       'class' => ActionColumn::className(),
                       'urlCreator' => function ($action, Tasks $model, $key, $index, $column) {
                           return Url::toRoute([$action, 'id' => $model->id]);
                       }
                   ],

               ],
           ]); ?>
       </div>
   </div>


</div>
