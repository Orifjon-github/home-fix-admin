<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Banners $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="homes-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textarea(['rows' => 2]) ?>

            <?= $form->field($model, 'title_ru')->textarea(['rows' => 2]) ?>

            <?= $form->field($model, 'title_en')->textarea(['rows' => 2]) ?>

            <?= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
