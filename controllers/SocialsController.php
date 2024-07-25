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
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex(): string
    {
        $searchModel = new SocialsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate(): Response|string
    {
        $model = new Socials();
        $fileService = new FileService($model);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $fileService->create('icon');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id): Response|string
    {
        $model = $this->findModel($id);
        $fileService = new FileService($model);
        $oldValue = $model->icon;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $fileService->update($oldValue, attr: 'icon');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = $this->findModel($id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }

    protected function findModel($id): bool|Socials|null
    {
        if (($model = Socials::findOne(['id' => $id])) !== null) {
            return $model;
        }
        return false;
    }
}
