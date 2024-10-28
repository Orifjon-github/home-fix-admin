<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PlanAdvantages $model */

$this->title = 'Create Plan Advantages';
$this->params['breadcrumbs'][] = ['label' => 'Plan Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-advantages-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
