<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Processes $model */

$this->title = 'Update Processes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Processes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="processes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
