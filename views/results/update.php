<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Results $model */

$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="results-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
