<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Socials $model */

$this->title = 'Update Socials: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="socials-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>