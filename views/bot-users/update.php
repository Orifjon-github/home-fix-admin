<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotUsers $model */

$this->title = 'Update Bot Users: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bot Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-users-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
