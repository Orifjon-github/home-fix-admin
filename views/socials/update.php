<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Socials $model */

$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Социальные сети', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="socials-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
