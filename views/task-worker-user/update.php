<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskWorkerUser $model */

$this->title = 'Update Task Worker User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Worker Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-worker-user-update">
    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
