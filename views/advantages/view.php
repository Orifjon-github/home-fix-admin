<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Advantages $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="advantages-view">

   <div class="card">
       <div class="card-body">
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

           <?= DetailView::widget([
               'model' => $model,
               'attributes' => [
                   'id',
                   'icon:ntext',
                   'title',
                   'title_ru',
                   'title_en',
                   'description:ntext',
                   'description_ru:ntext',
                   'description_en:ntext',
                   'enable',
                   'created_at',
                   'updated_at',
               ],
           ]) ?>
       </div>
   </div>

</div>
