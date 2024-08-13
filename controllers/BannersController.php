<?php

namespace app\controllers;


use app\models\Banners;
use app\models\BannersSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class BannersController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new BannersSearch());
    }

    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => HelperService::findModel(new Banners(), $id),
        ]);
    }

    public function actionCreate(): Response|string
    {
        return HelperService::createModel($this, new Banners());
    }

    public function actionUpdate($id): Response|string
    {
        return HelperService::updateModel($this, new Banners(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Banners(), $id)->delete();
        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Banners(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
