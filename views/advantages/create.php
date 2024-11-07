<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Advantages $model */

$this->title = 'Create Advantages';
$this->params['breadcrumbs'][] = ['label' => 'Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-create">
    <div class="card">
        <div class="card-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
