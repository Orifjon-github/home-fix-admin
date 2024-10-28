<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Works $model */

$this->title = 'Update Works: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="works-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
