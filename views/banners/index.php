<?php

use app\models\Banners;
use app\models\Socials;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BannersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Баннеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homes-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Добавить новое', ['create'], ['class' => 'btn btn-success']) ?>
            </p>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    HelperService::image(),
                    HelperService::enable(),
                    HelperService::action()
                ],
            ]); ?>

        </div>
    </div>
</div>
