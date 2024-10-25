<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Plans $model */

$this->title = 'Create Plans';
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plans-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
