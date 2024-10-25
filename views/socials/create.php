<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Socials $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Социальные сети', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socials-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
