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

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'title')->textarea(['rows' => 2]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'title_uz')->textarea(['rows' => 2]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'title_en')->textarea(['rows' => 2]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'description_uz')->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'description_en')->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]); ?>
                </div>
            </div>

            <?= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
