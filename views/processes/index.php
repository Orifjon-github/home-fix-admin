<?php

use app\models\Processes;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProcessesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Processes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processes-index">
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
                    'link',
                    HelperService::image(),
                    HelperService::enable(),
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>
</div>
