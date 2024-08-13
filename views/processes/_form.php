<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Processes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="processes-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>
            <?= $form->field($model, 'image_ru')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>
            <?= $form->field($model, 'image_en')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>
            <?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
