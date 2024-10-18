<?php

namespace app\services;

use GuzzleHttp\Client;
use Throwable;
use Yii;

class HomeFixService
{
    public mixed $client;
    public mixed $host;
    public mixed $token;
    public mixed $logger;
    public mixed $message;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
        $this->host = Yii::$app->params['card_service_url'];
        $this->token = Yii::$app->params['card_service_token'];
        $this->logger = new Logger();
    }

    public function send($method, $url, $params = [])
    {
        $log_name = 'card-service';
        $this->logger->setName($log_name);

        if ($method == HelperService::GET) {
            if (!empty($params)) {
                $url = $url . '?' . http_build_query($params);
            }
        }

        $this->logger->save($method . ' ' . $url, ['request', json_encode($params, JSON_UNESCAPED_UNICODE)]);

        try {
            $res = $this->client->$method($this->host . $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => $this->token,
                ],
                'json' => $params,
                'http_errors' => false,
                'proxy' => ''
            ]);
            $code = $res->getStatusCode();
            $body = $res->getBody()->getContents();
            $array_data = json_decode($body, 1);
        } catch (Throwable $exception) {
            $message = $exception->getMessage();
            $this->logger->save(500, ['response', $message]);
            $this->message = $message;
            return null;
        }


        $this->logger->save($code, ['response', $body]);
        if ($code >= 200 && $code < 300) {
            return $array_data['data'] ?? $array_data;
        } else {
            $this->message = $array_data['reason'] ?? 'Unknown error';
            return null;
        }
    }

    public function createUser($data)
    {
        return $this->send(HelperService::POST, '/internal/register', $data);
    }
}