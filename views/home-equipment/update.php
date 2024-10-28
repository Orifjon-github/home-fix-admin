<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HomeEquipment $model */

$this->title = 'Update Home Equipment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-equipment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
