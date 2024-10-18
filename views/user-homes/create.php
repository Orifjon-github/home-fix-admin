<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserHomes $model */

$this->title = 'Create User Homes';
$this->params['breadcrumbs'][] = ['label' => 'User Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-homes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
