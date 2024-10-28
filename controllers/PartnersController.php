<?php

namespace app\controllers;

use app\models\Partners;
use app\models\PartnersSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;


class PartnersController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new PartnersSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new Partners(), $id);
    }

    public function actionCreate(): Response|string
    {
        return HelperService::createModel($this, new Partners(), 'icon');
    }

    public function actionUpdate($id): Response|string
    {
        return HelperService::updateModel($this, new Partners(), $id, 'icon');
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Partners(), $id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Partners(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
