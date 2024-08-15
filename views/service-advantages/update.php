<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiceAdvantages $model */

$this->title = 'Update Service Advantages: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Service Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-advantages-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
