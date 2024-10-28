<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskMaterials $model */

$this->title = 'Create Task Materials';
$this->params['breadcrumbs'][] = ['label' => 'Task Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-materials-create">
    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
