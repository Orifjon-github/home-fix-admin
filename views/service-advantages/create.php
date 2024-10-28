<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiceAdvantages $model */

$this->title = 'Create Service Advantages';
$this->params['breadcrumbs'][] = ['label' => 'Service Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-advantages-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
