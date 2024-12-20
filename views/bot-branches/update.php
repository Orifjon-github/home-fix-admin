<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotBranches $model */

$this->title = 'Update Bot Branches: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bot Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-branches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
