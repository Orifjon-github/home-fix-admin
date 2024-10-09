<?php

use app\models\BotUsers;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BotUsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bot Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-users-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Bot Users', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'role',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return BotUsers::roles($model->role);
                        },
                        'filter' => BotUsers::roles(),
                    ],
                    'phone',
                    'chat_id',
                    'language',
                    'status',
                    'created_at',
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {delete} {enable}', // specify the actions you want to display
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>
