<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserHomes $model */

$this->title = 'Update User Homes: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-homes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
