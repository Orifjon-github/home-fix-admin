<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CorporateOrders $model */

$this->title = 'Create Corporate Orders';
$this->params['breadcrumbs'][] = ['label' => 'Corporate Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corporate-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
