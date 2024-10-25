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

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    [
                        'attribute' => 'role',
                        'value' => function ($model) {
                            if (empty($model->role)) {
                                return '⚠️ ROLE BERILMAGAN ⚠️';
                            }
                            return BotUsers::roles($model->role);
                        },
                        'filter' => BotUsers::roles(),
                    ],
                    'phone',
                    'status',
                    'step',
                    'updated_at',
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>
</div>
