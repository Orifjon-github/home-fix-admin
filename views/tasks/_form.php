<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $equipmentList = \app\models\HomeEquipment::find()->select(['id', 'name'])->asArray()->all();
    $equipmentOptions = [];
    foreach ($equipmentList as $equipment) {
        $equipmentOptions[$equipment['id']] = $equipment['name'];
    }
    ?>
    <?= $form->field($model, 'home_equipment_id')->dropDownList($equipmentOptions, ['prompt' => 'Select Equipment', 'maxlength' => 1]) ?>
    <?= $form->field($model, 'type')->dropDownList(['prevention' => 'Prevention', 'repair' => 'Repair'], ['prompt' => '']) ?>
    <?= $form->field($model, 'status')->dropDownList(['done' => 'Done', 'process' => 'Process' , 'new'=>'New' , 'checking'=>'Checking'], ['prompt' => '']) ?>

    <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>


    <?= $form->field($model, 'is_equipment')->dropDownList(['1'=>'Oldindi' , '0'=>'Buzilgan']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
