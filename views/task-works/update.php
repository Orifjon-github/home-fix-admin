<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskWorks $model */

$this->title = 'Update Task Works: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-works-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
