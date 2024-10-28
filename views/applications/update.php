<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Applications $model */

$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="applications-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
