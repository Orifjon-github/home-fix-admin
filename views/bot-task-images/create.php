<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotTaskImages $model */

$this->title = 'Create Bot Task Images';
$this->params['breadcrumbs'][] = ['label' => 'Bot Task Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-task-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
