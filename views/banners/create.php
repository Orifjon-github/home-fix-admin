<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Banners $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
