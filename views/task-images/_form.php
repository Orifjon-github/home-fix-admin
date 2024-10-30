<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TaskImages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-images-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'task_id')->dropDownList(\app\models\Tasks::services(), ['prompt' => 'Select Equipment', 'maxlength' => 1]) ?>

    <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*']) ?>

    <?= $form->field($model, 'state')->dropDownList([ 'before' => 'Before', 'after' => 'After', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
