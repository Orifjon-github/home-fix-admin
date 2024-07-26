<?php

use app\models\Settings;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Settings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="settings-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <?php
            if ($model->type == Settings::FILE_TYPE) {
                echo $form->field($model, 'value')->fileInput(['class' => 'form-control', 'id' => 'formFile']);
                echo $form->field($model, 'value_ru')->fileInput(['class' => 'form-control', 'id' => 'formFile']);
                echo $form->field($model, 'value_en')->fileInput(['class' => 'form-control', 'id' => 'formFile']);
            } elseif ($model->type == Settings::HTML_TYPE) {
                echo $form->field($model, 'value')->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                echo $form->field($model, 'value_ru')->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                echo $form->field($model, 'value_en')->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]);
            } else {
                echo $form->field($model, 'value')->textarea(['rows' => 3]);
                echo $form->field($model, 'value_ru')->textarea(['rows' => 3]);
                echo $form->field($model, 'value_en')->textarea(['rows' => 3]);
            }
            ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
