<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserHomes $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-homes-view">
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
                    'type',
                    'name',
                    'long',
                    'lat',
                    'title',
                    'entrance',
                    'floor',
                    'number',
                    'description',
                    'target',
                    'created_at',
                    'updated_at',
                    'user_id',
                ],
            ]) ?>
        </div>
    </div>
</div>
