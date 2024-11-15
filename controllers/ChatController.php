<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\httpclient\Client;
class ChatController extends Controller
{
    public function actionIndex()
    {
        $url = "https://firestore.googleapis.com/v1/projects/homefixuz/databases/(default)/documents/chats";
        $client = new Client();
        $response = $client->get($url)->send();
        if ($response->isOk) {
            $data = $response->data;
            return $this->render('index', ['data' => $data]);
        } else {
            // Handle error
            Yii::$app->session->setFlash('error', 'Error fetching chat data');
            return $this->render('index', ['data' => []]);
        }
    }

}
