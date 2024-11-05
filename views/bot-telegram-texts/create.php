<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotTelegramTexts $model */

$this->title = 'Create Bot Telegram Texts';
$this->params['breadcrumbs'][] = ['label' => 'Bot Telegram Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-telegram-texts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
