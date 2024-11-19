<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AttendancesUsersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="attendances-users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'branch_id') ?>

    <?= $form->field($model, 'in_office') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'email_verified_at') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'remember_token') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
