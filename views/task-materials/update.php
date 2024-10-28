<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskMaterials $model */

$this->title = 'Update Task Materials: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-materials-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
