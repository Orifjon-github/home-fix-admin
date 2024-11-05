<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotTasks $model */

$this->title = 'Update Bot Tasks: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bot Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-tasks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
