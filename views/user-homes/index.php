<?php

use app\models\UserHomes;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserHomesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Homes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-homes-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Branch', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'user_id',
                    'name',
                    'target',
                    'type',
                    'created_at',
                    HelperService::action(),
                ],
            ]); ?>
        </div>
    </div>
</div>
