<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\ActionColumn;
/** @var yii\web\View $this */
/** @var app\models\HomeProblems $model */

$this->params['breadcrumbs'][] = ['label' => 'Home Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="home-problems-view">
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
                      'attribute' => 'home',
                      'format' => 'raw', // This allows HTML to be rendered in the cell
                      'value' => function ($model) {
                          $equipment = \app\models\UserHomes::findOne($model->home_id);
                          return $equipment
                              ? \yii\helpers\Html::a($equipment->name, ['user-homes/view', 'id' => $equipment->id], ['target' => '_blank'])
                              : null;
                      },
                      'label' => 'Equipment Name',
                  ],
                  'problem:ntext',
                  'type',
                  'equipment_id',
                  'created_at',
                  'updated_at',
                   [
                      'attribute' => 'equipment_id',
                      'format' => 'raw', // This allows HTML to be rendered in the cell
                      'value' => function ($model) {
                          $equipment = \app\models\HomeEquipment::findOne($model->equipment_id);
                          return $equipment
                              ? \yii\helpers\Html::a($equipment->name, ['home-equipment/view', 'id' => $equipment->id], ['target' => '_blank'])
                              : null;
                      },
                      'label' => 'Equipment Name',
                  ],

              ]
              ,
          ]) ?>
      </div>
  </div>
</div>
