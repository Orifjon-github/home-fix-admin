<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotTaskImages $model */

$this->title = 'Update Bot Task Images: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bot Task Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-task-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>