<?php

use app\services\HelperService;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Works $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="works-view">
    <div class="card">
        <div class="card-body">
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
                    'title:ntext',
                    'title_ru:ntext',
                    'title_en:ntext',
                    'description:ntext',
                    'description_ru:ntext',
                    'description_en:ntext',
                    HelperService::image(),
                    HelperService::enable(),
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
