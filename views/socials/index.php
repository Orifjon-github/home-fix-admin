<?php

use app\models\Socials;
use app\services\HelperService;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\SocialsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Социальные сети';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socials-index">
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
                    'name',
                    'link:ntext',
                    HelperService::image('uz', 'icon'),
                    HelperService::enable(),
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>

</div>
