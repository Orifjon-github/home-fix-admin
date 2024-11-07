<?php


use app\models\Tasks;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
/** @var yii\web\View $this */
?>

<div class="card">
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'description',
                'service_type',
                'status',
                [
                    'attribute' => 'home_equipment_id',
                    'format' => 'raw', // This allows HTML to be rendered in the cell
                    'value' => function ($model) {
                        $equipment = \app\models\HomeEquipment::findOne($model->home_equipment_id);
                        return $equipment
                            ? \yii\helpers\Html::a($equipment->name, ['home-equipment/view', 'id' => $equipment->id], ['target' => '_blank'])
                            : null;
                    },
                    'label' => 'Equipment Name',
                ],

                'start_time',
                'end_time',
                'duration',
                'is_equipment',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view}',
                    'urlCreator' => function ($action, Tasks $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
