<?php

use app\models\Plans;
use app\models\Services;
use app\models\UserHomes;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CorporateOrders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="corporate-orders-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'plan_id')->dropDownList(Plans::plans(), ['prompt' => 'Select Plan']) ?>

            <?= $form->field($model, 'service_id')->dropDownList(Services::services(), ['prompt' => 'Select Plan']) ?>

            <?= $form->field($model, 'user_home_id')->dropDownList(UserHomes::branches(), ['prompt' => 'Select Plan']) ?>

            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'count_per_month')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
