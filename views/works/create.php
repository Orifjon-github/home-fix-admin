<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Works $model */

$this->title = 'Create Works';
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
