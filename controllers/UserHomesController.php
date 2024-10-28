<?php

namespace app\controllers;

use app\models\UserHomes;
use app\models\UserHomesSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class UserHomesController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new UserHomesSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new UserHomes(), $id);
    }

    public function actionCreate()
    {
        return HelperService::createModel($this, new UserHomes());
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new UserHomes(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new UserHomes(), $id)->delete();
        return $this->redirect(['index']);
    }
}
