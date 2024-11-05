<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotMaterialImages $model */

$this->title = 'Create Bot Material Images';
$this->params['breadcrumbs'][] = ['label' => 'Bot Material Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-material-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
