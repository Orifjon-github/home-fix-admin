<?php

namespace app\controllers;

use app\models\Applications;
use app\models\ApplicationsSearch;
use app\services\HelperService;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ApplicationsController implements the CRUD actions for Applications model.
 */
class ApplicationsController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new ApplicationsSearch());
    }

    public function actionContacts()
    {
        $searchModel = new ApplicationsSearch();
        $searchModel->type = 'contact';
        return HelperService::index($this, $searchModel, 'contact');
    }

    public function actionPartners()
    {
        $searchModel = new ApplicationsSearch();
        $searchModel->type = 'career';
        return HelperService::index($this, $searchModel, 'career');
    }
    public function actionView($id): string
    {
        return HelperService::viewModel($this, new Applications(), $id);
    }
}
