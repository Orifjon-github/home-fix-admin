<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TaskWorkerUser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-worker-user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $equipmentList = \app\models\Tasks::find()->select(['id', 'name'])->asArray()->all();
    $equipmentOptions = [];
    foreach ($equipmentList as $equipment) {
        $equipmentOptions[$equipment['id']] = $equipment['name'];
    }
    ?>
    <?= $form->field($model, 'task_id')->dropDownList($equipmentOptions, ['prompt' => 'Select Tasks', 'maxlength' => 1]) ?>
    <?php
    $workers = \app\models\WorkerUsers::find()->select(['id', 'name'])->asArray()->all();
    $workerList = [];
    foreach ($workers as $equipment) {
        $workerList[$equipment['id']] = $equipment['name'];
    }
    ?>

    <?= $form->field($model, 'worker_user_id')->dropDownList($workerList, ['prompt' => 'Select Worker', 'maxlength' => 1]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
