<?php

use app\models\Services;
use app\models\Socials;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ServicesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Services', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title:ntext',
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function (Services $model) {
                            return $model->description;
                        }
                    ],
                    HelperService::image(),
                    HelperService::enable(),
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>
</div>
