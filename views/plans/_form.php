<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Plans $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="plans-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'type')->dropDownList(['individual' => 'Individual', 'corporate' => 'Corporate',], ['prompt' => '']) ?>

            <?= $form->field($model, 'duration')->dropDownList(['one time' => 'One time', 1 => '1', 3 => '3', 6 => '6', 12 => '12',], ['prompt' => '']) ?>

            <?= $form->field($model, 'amount')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
