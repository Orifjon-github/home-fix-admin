<?php

use app\models\BotUsers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BotUsers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bot-users-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'role')->dropDownList(BotUsers::roles(), ['prompt' => '']) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
