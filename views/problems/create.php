<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HomeProblems $model */

$this->title = 'Create Home problems';
$this->params['breadcrumbs'][] = ['label' => 'Home problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-problems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
