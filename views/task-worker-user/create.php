<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskWorkerUser $model */

$this->title = 'Create Task Worker User';
$this->params['breadcrumbs'][] = ['label' => 'Task Worker Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-worker-user-create">
    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
