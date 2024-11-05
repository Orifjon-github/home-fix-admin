<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotTasks $model */

$this->title = 'Create Bot Tasks';
$this->params['breadcrumbs'][] = ['label' => 'Bot Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-tasks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
