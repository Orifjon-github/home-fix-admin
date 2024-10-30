<?php

use app\models\PlanAdvantages;
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
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])?>
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true])?>
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true])?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'plan_id')->dropDownList(Plans::plans(), ['prompt' => 'Select Plan']) ?>

            <?= $form->field($model, 'service_id')->dropDownList(PlanAdvantages::getAdvantages(), ['prompt' => 'Select Plan']) ?>
            <?= $form->field($model, 'status')->dropDownList(['pending'=>'Pending' , 'active'=>'Active' , 'done'=>'Done'], ['prompt' => 'Select Plan']) ?>
            <?= $form->field($model, 'user_home_id')->dropDownList(UserHomes::branches(), ['prompt' => 'Select Plan']) ?>

            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'price_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'price_en')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'period_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'period_en')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'count_per_month')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
