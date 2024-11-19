<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\AttendancesUsers $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Attendances Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="attendances-users-view">
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
                   'name',
                   'username',
                   'branch_id',
                   'in_office',
                   'position',
                   'email_verified_at:email',
                   'password',
                   'remember_token',
                   'created_at',
                   'updated_at',
               ],
           ]) ?>
       </div>
   </div>
    <div class="card">
        <div class="card-body">
            <?php

            $dataProvider = new ArrayDataProvider([
                'allModels' => $model->attendances,
                'pagination' => [
                    'pageSize' => 10, // Optional, controls how many rows per page
                ],
            ]);
            ?>
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'], // Adds a serial number column
                    'user_id',
                    'type',
                    'created_at',
                    'updated_at',
                    'long',
                    'lat',
                    [
                        'class' => 'yii\grid\ActionColumn', // Adds default action buttons (View, Update, Delete)
                    ],
                ],
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center'], // Add Bootstrap classes
                    'linkOptions' => ['class' => 'page-link'], // Style links
                    'pageCssClass' => 'page-item', // Style individual pages
                    'prevPageCssClass' => 'page-item', // Style "Previous" button
                    'nextPageCssClass' => 'page-item', // Style "Next" button
                    'disabledPageCssClass' => 'disabled', // Style for disabled buttons
                ],
            ]);
            ?>
        </div>
    </div>

</div>
