<?php

namespace app\controllers;

use app\models\Socials;
use app\models\SocialsSearch;
use app\services\FileService;
use app\services\HelperService;
use Faker\Core\File;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;


class SocialsController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new SocialsSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new Socials(), $id);
    }

    public function actionCreate(): Response|string
    {
        return HelperService::createModel($this, new Socials(), 'icon');
    }

    public function actionUpdate($id): Response|string
    {
        return HelperService::updateModel($this, new Socials(), $id, 'icon');
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Socials(), $id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Socials(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
