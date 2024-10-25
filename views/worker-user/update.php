<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkerUsers $model */

$this->title = 'Update Worker Users: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Worker Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worker-users-update">

    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
