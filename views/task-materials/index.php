<?php

use app\models\TaskMaterials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskMaterialsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Task Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-materials-index">

    <p>
        <?= Html::a('Create Task Materials', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <div class="card">
      <div class="card-body">

          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],
                  'id',
                  [
                       'attribute' => 'task_id',
                       'format' => 'raw', // This allows HTML to be rendered in the cell
                       'value' => function ($model) {
                           $equipment = \app\models\Tasks::findOne($model->task_id);
                           return $equipment
                               ? \yii\helpers\Html::a($equipment->name, ['home-equipment/view', 'id' => $equipment->id], ['target' => '_blank'])
                               : null;
                       },
                       'label' => 'Tasks',
                   ],
                  'name',
                  'description',
                  'price',
                  //'quantity',
                  //'quantity_type',
                  //'created_at',
                  //'updated_at',
                  [
                      'class' => ActionColumn::className(),
                      'urlCreator' => function ($action, TaskMaterials $model, $key, $index, $column) {
                          return Url::toRoute([$action, 'id' => $model->id]);
                      }
                  ],
              ],
          ]); ?>
      </div>
  </div>


</div>
