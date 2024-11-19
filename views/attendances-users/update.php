<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AttendancesUsers $model */

$this->title = 'Update Attendances Users: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Attendances Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendances-users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
