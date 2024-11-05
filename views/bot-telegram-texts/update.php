<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotTelegramTexts $model */

$this->title = 'Update Bot Telegram Texts: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bot Telegram Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-telegram-texts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
