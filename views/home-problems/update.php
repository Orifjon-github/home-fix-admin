<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HomeProblems $model */

$this->title = 'Update Home Problems: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Home Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-problems-update">


  <div class="card">
      <div class="card-body">
          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>
      </div>
  </div>

</div>
