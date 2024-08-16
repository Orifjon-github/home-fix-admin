<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'title_ru')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'title_en')->textarea(['rows' => 6]) ?>

            <?php
            echo $form->field($model, 'description')->widget(CKEditor::className(), [
                'editorOptions' => [
                    'preset' => 'basic',
                    'inline' => false,
                ],
            ]);
            echo $form->field($model, 'description_ru')->widget(CKEditor::className(), [
                'editorOptions' => [
                    'preset' => 'basic',
                    'inline' => false,
                ],
            ]);
            echo $form->field($model, 'description_en')->widget(CKEditor::className(), [
                'editorOptions' => [
                    'preset' => 'basic',
                    'inline' => false,
                ],
            ]);
            ?>

            <?= $form->field($model, 'video_url')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'video_url_ru')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'video_url_en')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'video_bg')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

            <?= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
