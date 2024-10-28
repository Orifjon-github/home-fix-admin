<?php

use app\models\HomeEquipment;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HomeEquipmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Home Equipments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-equipment-index">

    <p>
        <?= Html::a('Create Home Equipment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'corporate_order_id',
            'name',
            'brand',
            'model',
            'description',
            HelperService::image(),
            'fix_date',
            'created_at',
            //'updated_at',
            HelperService::action()
        ],
    ]); ?>


</div>
