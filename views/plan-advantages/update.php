<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PlanAdvantages $model */

$this->title = 'Update Plan Advantages: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Plan Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plan-advantages-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
