<?php

namespace app\controllers;

use app\models\HomeEquipment;
use app\models\HomeEquipmentSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class HomeEquipmentController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new HomeEquipmentSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new HomeEquipment(), $id);
    }

    public function actionCreate()
    {
        return HelperService::createModel($this, new HomeEquipment());
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new HomeEquipment(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new HomeEquipment(), $id)->delete();
        return $this->redirect(['index']);
    }
}
