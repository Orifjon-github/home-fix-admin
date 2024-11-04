<?php

use app\models\TaskImages;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Task Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'task_id',
            'image:ntext',
            [
                'attribute' => 'image',
                'format' => 'raw', // This allows HTML to be rendered in the cell
                'value' => function ($model) {
                    // Prepend a leading slash to the image path
                    $imageUrl = '/' . ltrim($model->image, '/'); // Ensure there's only one leading slash

                    return \yii\helpers\Html::img($imageUrl, ['alt' => $model->state, 'style' => 'width:50px; height:auto;']);
                },

                'label' => 'Equipment Name',
            ],
            'state',
            'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TaskImages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
