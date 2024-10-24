<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkerUsers $model */

$this->title = 'Create Worker Users';
$this->params['breadcrumbs'][] = ['label' => 'Worker Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-users-create">
    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
