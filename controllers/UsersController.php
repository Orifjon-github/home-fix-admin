<?php

namespace app\controllers;

use app\models\Users;
use app\models\UsersSearch;
use app\services\HelperService;
use app\services\HomeFixService;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $searchModel->role = 'individual';
        return HelperService::index($this, $searchModel);
    }

    public function actionCorporate()
    {
        $searchModel = new UsersSearch();
        $searchModel->role = 'corporate';
        return HelperService::index($this, $searchModel, 'corporate');
    }

    public function actionView($id)
    {
        return HelperService::viewModel($this, new Users(), $id);
    }

    public function actionCreate(): string
    {
        $form = new Users(); // Initialize the model
        $post = Yii::$app->request->post();

        // Print the POST data for debuggin
        // Load POST data into the model and validate it
        if ($form->load($post) && $form->validate()) {
            $form->password = Yii::$app->security->generatePasswordHash($form->password);
            if ($form->save()) {
                Yii::$app->session->setFlash('success', 'User created successfully.');
                return $this->render('view', [
                    'model' => $form,
                ]);
            } else {
                Yii::$app->session->setFlash('error', 'Failed to save the user.');
            }
        }

        // Render the create view if validation fails or data is not saved
        return $this->render('create', [
            'model' => $form,
        ]);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Users(), $id)->delete();
        return $this->redirect(['index']);
    }

    public function actionResetPassword($id): Response
    {
        Yii::$app->session->setFlash('error', 'Technical work in progress');
        return $this->redirect(['index']);
//        $user = Users::findOne($id);
//        $user->password = Hash::make($user->phone);
//        if ($user->save()) {
//            Yii::$app->session->setFlash('success','The user\'s password has been changed to his phone number');
//        } else {
//            Yii::$app->session->setFlash('error', 'The user\'s password was not changed');
//        }
//
//        return $this->redirect(['index']);
    }
}
