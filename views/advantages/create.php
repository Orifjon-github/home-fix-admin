<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Advantages $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
