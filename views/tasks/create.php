<?php

use app\models\HomeEquipment;
use app\models\Tasks;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */

$this->title = 'Create Tasks';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-create">

   <div class="card">
       <div class="card-body">

           <?= $this->render('_form', [
               'model' => $model,
           ]) ?>
       </div>
   </div>

</div>
