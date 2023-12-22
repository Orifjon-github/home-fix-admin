<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Capabilities $model */

$this->title = 'Обновить: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Возможности', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="capabilities-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
