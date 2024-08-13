<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Banners $model */

$this->title = 'Обновить: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="homes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
