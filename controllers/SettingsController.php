<?php

namespace app\controllers;

use app\models\Settings;
use app\models\SettingsSearch;
use app\services\FileService;
use app\services\HelperService;
use yii\helpers\Url;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

class SettingsController extends Controller
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
        $searchModel = new SettingsSearch();
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


    public function actionUpdate($id)
    {
        $model = Settings::findOne($id);
        $fileService = new FileService($model);
        $oldValue = $model->value;
        $oldValueRu = $model->value_ru;
        $oldValueEn = $model->value_en;
        if ($model->load(Yii::$app->request->post()) ?? $model->validate()) {
            if ($model->type == Settings::FILE_TYPE) {
                $fileService->update($oldValue, $oldValueRu, $oldValueEn, 'value');
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', ['model' => $model]);
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
    protected function findModel($id)
    {
        if (($model = Settings::findOne(['id' => $id])) !== null) {
            return $model;
        }

        return ('The requested page does not exist.');
    }
}
