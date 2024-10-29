<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskWorks $model */

$this->title = 'Create Task Works';
$this->params['breadcrumbs'][] = ['label' => 'Task Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-works-create">
    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
