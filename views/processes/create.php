<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Processes $model */

$this->title = 'Create Processes';
$this->params['breadcrumbs'][] = ['label' => 'Processes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
