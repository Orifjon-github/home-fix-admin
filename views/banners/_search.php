<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BannersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="homes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'description_uz') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'image_uz') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
