<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\HomeEquipment $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="home-equipment-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

   <div class="card">
       <div class="card-body">
           <?= DetailView::widget([
               'model' => $model,
               'attributes' => [
                   'id',
                   'home_id',
                   'name',
                   'name_ru',
                   'name_en',
                   'brand',
                   'model',
                   'description:ntext',
                   'description_ru:ntext',
                   'description_en:ntext',
                   'image:ntext',
                   'fix_date',
                   'created_at',
                   'updated_at',
               ],
           ]) ?>
       </div>
   </div>

</div>
