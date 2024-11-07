<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TaskMaterials $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-materials-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $equipmentList = \app\models\Tasks::find()->select(['id', 'name'])->asArray()->all();
    $equipmentOptions = [];
    foreach ($equipmentList as $equipment) {
        $equipmentOptions[$equipment['id']] = $equipment['name'];
    }
    ?>
    <?= $form->field($model, 'task_id')->dropDownList($equipmentOptions, ['prompt' => 'Select Equipment', 'maxlength' => 1]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity_type')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
