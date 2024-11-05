<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BotBranches $model */

$this->title = 'Create Bot Branches';
$this->params['breadcrumbs'][] = ['label' => 'Bot Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-branches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
