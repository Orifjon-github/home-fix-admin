<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AttendancesUsers $model */

$this->title = 'Create Attendances Users';
$this->params['breadcrumbs'][] = ['label' => 'Attendances Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendances-users-create">

   <div class="card">
       <div class="card-body">
           <?= $this->render('_form', [
               'model' => $model,
           ]) ?>
       </div>
   </div>

</div>
