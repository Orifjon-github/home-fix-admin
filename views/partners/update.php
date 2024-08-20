<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Partners $model */

$this->title = 'Update Partners: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partners-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
