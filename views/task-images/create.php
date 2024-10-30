<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskImages $model */

$this->title = 'Create Task Images';
$this->params['breadcrumbs'][] = ['label' => 'Task Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-images-create">


  <div class="card">
      <div class="card-body`">
          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>
  </div>
</div>
