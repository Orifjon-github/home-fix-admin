<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CorporateOrders $model */

$this->title = 'Update Corporate Orders: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Corporate Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="corporate-orders-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
