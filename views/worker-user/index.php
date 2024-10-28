<?php

use app\models\WorkerUsers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\WorkerUsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Worker Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-users-index">
    <p>
        <?= Html::a('Create Worker Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   <div class="card">
       <div class="card-body">

           <?= GridView::widget([
               'dataProvider' => $dataProvider,
               'filterModel' => $searchModel,
               'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],

                   'id',
                   'name',
                   'username',
                   'image',
                   'email_verified_at:email',
                   //'password',
                   //'status',
                   //'remember_token',
                   //'created_at',
                   //'updated_at',
                   [
                       'class' => ActionColumn::className(),
                       'urlCreator' => function ($action, WorkerUsers $model, $key, $index, $column) {
                           return Url::toRoute([$action, 'id' => $model->id]);
                       }
                   ],
               ],
           ]); ?>
       </div>
   </div>


</div>
