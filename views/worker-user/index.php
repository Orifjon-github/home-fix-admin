<?php

use app\models\WorkerUsers;
use app\services\HelperService;
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
                   HelperService::image(),
                   'email_verified_at:email',
                   'status',
                   'created_at',
                   HelperService::action(),
               ],
           ]); ?>
       </div>
   </div>


</div>
