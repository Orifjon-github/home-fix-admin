<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CorporateOrdersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="corporate-orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'plan_id') ?>

    <?= $form->field($model, 'service_id') ?>

    <?= $form->field($model, 'user_home_id') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'period') ?>

    <?php // echo $form->field($model, 'count_per_month') ?>

    <?php // echo $form->field($model, 'additional') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
