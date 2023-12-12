<?php

use app\models\Sertificates;
use app\models\Socials;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Sertificates $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sertificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sertificates-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function (Sertificates $model) {
                    return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                }
            ],
            [
                'attribute' => 'image_uz',
                'format' => 'raw',
                'value' => function (Sertificates $model) {
                    return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                }
            ],
            [
                'attribute' => 'enable',
                'value' => function (Sertificates $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>