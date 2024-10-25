<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HomeProblems $model */

$this->title = 'Create Home Problems';
$this->params['breadcrumbs'][] = ['label' => 'Home Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-problems-create">

    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
