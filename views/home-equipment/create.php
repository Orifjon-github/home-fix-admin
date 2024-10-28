<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HomeEquipment $model */

$this->title = 'Create Home Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Home Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-equipment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
