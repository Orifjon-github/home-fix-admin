<?php

namespace app\controllers;

use app\models\PlanAdvantages;
use app\models\PlanAdvantagesSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class PlanAdvantagesController extends Controller
{
    public function actionIndex(): string
    {
        $searchModel = new PlanAdvantagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return HelperService::viewModel($this, new PlanAdvantages(), $id);
    }

    public function actionCreate($id)
    {
        return HelperService::createChildModel($this, new PlanAdvantages(), 'plan', $id);
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new PlanAdvantages(), $id);
    }

    public function actionDelete($id): Response
    {
        return HelperService::deleteChild($this, new PlanAdvantages(), $id, 'plan');
    }
}
