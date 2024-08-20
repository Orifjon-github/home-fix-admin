<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Plans $model */

$this->title = 'Update Plans: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plans-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
