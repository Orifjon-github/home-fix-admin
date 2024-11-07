<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Advertises $model */

$this->title = 'Create Advertises';
$this->params['breadcrumbs'][] = ['label' => 'Advertises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertises-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
