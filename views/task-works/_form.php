<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TaskWorks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-works-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $equipmentList = \app\models\Tasks::find()->select(['id', 'name'])->asArray()->all();
    $equipmentOptions = [];
    foreach ($equipmentList as $equipment) {
        $equipmentOptions[$equipment['id']] = $equipment['name'];
    }
    ?>

    <?= $form->field($model, 'task_id')->dropDownList($equipmentOptions, ['prompt' => 'Select Tasks']) ?>


    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'name_ru')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'name_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_finished')->dropDownList([ '0'=>'NOT', '1'=>'DONE', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
