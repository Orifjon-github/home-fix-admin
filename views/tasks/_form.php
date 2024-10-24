<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'home_equipment_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'prevention' => 'Prevention', 'repair' => 'Repair', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_type_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_type_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'is_equipment')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
