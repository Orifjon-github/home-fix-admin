<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CorporateOrders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="corporate-orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plan_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_home_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_per_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'additional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
