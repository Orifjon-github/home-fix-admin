<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlanAdvantages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="plan-advantages-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'title_ru')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'title_en')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'price')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
