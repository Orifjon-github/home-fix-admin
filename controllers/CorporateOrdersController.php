<?php

namespace app\controllers;

use app\models\CorporateOrders;
use app\models\CorporateOrdersSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class CorporateOrdersController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new CorporateOrdersSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new CorporateOrders(), $id);
    }

    public function actionCreate()
    {
        return HelperService::createModel($this, new CorporateOrders());
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new CorporateOrders(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new CorporateOrders(), $id)->delete();
        return $this->redirect(['index']);
    }
}
