<?php

use app\models\HomeProblems;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HomeProblemsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Home Problems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-problems-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'home_id',
                        'format' => 'raw', // This allows HTML to be rendered in the cell
                        'value' => function ($model) {
                            $equipment = \app\models\UserHomes::findOne($model->home_id);
                            return $equipment
                                ? \yii\helpers\Html::a($equipment->getUser()->one()->name, ['users/view', 'id' => $equipment->user_id], ['target' => '_blank'])
                                : null;
                        },
                        'label' => 'User',
                    ],
                    'problem:ntext',
                    'type',
                    [
                        'attribute' => 'equipment_id',
                        'format' => 'raw', // This allows HTML to be rendered in the cell
                        'value' => function ($model) {
                            $equipment = \app\models\HomeEquipment::findOne($model->equipment_id);
                            return $equipment
                                ? \yii\helpers\Html::a($equipment->name, ['home-equipment/view', 'id' => $equipment->id], ['target' => '_blank'])
                                : null;
                        },
                        'label' => 'Equipment Name',
                    ],
                    //'created_at',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, HomeProblems $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>

</div>
