<?php

namespace app\controllers;

use app\models\ServiceAdvantages;
use app\models\ServiceAdvantagesSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class ServiceAdvantagesController extends Controller
{
    public function actionIndex(): string
    {
        $searchModel = new ServiceAdvantagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return HelperService::viewModel($this, new ServiceAdvantages(), $id);
    }

    public function actionCreate($id)
    {
        return HelperService::createChildModel($this, new ServiceAdvantages(), 'service', $id);
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new ServiceAdvantages(), $id);
    }

    public function actionDelete($id): Response
    {
       return HelperService::deleteChild($this, new ServiceAdvantages(), $id, 'service');
    }
}
