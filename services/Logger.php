<?php
/**
 * Created by PhpStorm.
 * PHP version 7
 *
 * @category pay-milliy
 * @package  Logger.php
 * @author   Abdujalilov Dilshod <ax5165@gmail.com>
 * @license  https://www.php.net PHP License
 * @link     https://t.me/Dilshod_Abdujalilov
 * @date     24.09.2020 10:30
 */

namespace app\services;


use Throwable;
use Yii;
use yii\helpers\FileHelper;

class Logger
{
    private $log_name;
    private $log_path;
    public $uniqid;

    private static $copy = null; // Единственный экземпляр класса, чтобы не создавать множество подключений

    /**
     * Получение экземпляра класса. Если он уже существует, то возвращается, если его не было, то создаётся и возвращается (паттерн Singleton)
     * @return Logger|null
     */
    public static function getStart()
    {
        if (self::$copy == null) self::$copy = new Logger();
        return self::$copy;
    }

    public function setName($name)
    {
        global $global_uniq;
        $this->log_name = $name;
        $this->uniqid = $global_uniq.' - '.uniqid();
    }

    /**
     * @param $text
     * @param array $tags
     */
    public function save($text, $tags = [])
    {
        if (!is_string($text)) {
            $text_j = json_encode($text, JSON_UNESCAPED_UNICODE);
            if (!$text_j) {
                $text = serialize($text);
            } else {
                $text = $text_j;
            }
        }

        global $current_operation;
        if ($current_operation != '') {
            $tags[] = $current_operation;
        }

        foreach ($tags as $k=>$v){
            if(!is_string($v)){
                $v = json_encode($v);
            }
            $tags[$k] = $v;
        }
        $app = Yii::$app;
        try {
            $func = $app->controller->id . ' -- ' . $app->controller->action->id;
        } catch (Throwable $exception){
            $func = 'undefind';
        }


        $line = date('H:i:s') . '[' . $this->uniqid . '] - ' . implode(', ', $tags) . ' - [' . $func . '] : ' . $text . PHP_EOL;
        $folder = Yii::getAlias('@app/runtime/logs/' . date('Y/m/d'));
        try {
            if (file_exists($folder) === false) {
                FileHelper::createDirectory($folder);
            }

            $file_path = $folder . DIRECTORY_SEPARATOR . $this->log_name . '.log';

            file_put_contents($file_path, $line . "\n", FILE_APPEND);
        } catch (Throwable $e) {
            Yii::error($e->getMessage(), __METHOD__);
        }
    }

    public function saveOneFile($text, $tags = [])
    {
        if (!is_string($text)) {
            $text_j = json_encode($text, JSON_UNESCAPED_UNICODE);
            if (!$text_j) {
                $text = serialize($text);
            } else {
                $text = $text_j;
            }
        }

        global $current_operation;
        if ($current_operation != '') {
            $tags[] = $current_operation;
        }

        foreach ($tags as $k=>$v){
            if(!is_string($v)){
                $v = json_encode($v);
            }
            $tags[$k] = $v;
        }
        $app = Yii::$app;
        try {
            $func = $app->controller->id . ' -- ' . $app->controller->action->id;
        } catch (Throwable $exception){
            $func = 'undefind';
        }


        $line = date('H:i:s') . '[' . $this->uniqid . '] - ' . implode(', ', $tags) . ' - [' . $func . '] : ' . $text . PHP_EOL;
        $folder = Yii::getAlias('@app/runtime/logs/' . date('Y/m'));
        try {
            if (file_exists($folder) === false) {
                FileHelper::createDirectory($folder);
            }

            $file_path = $folder . DIRECTORY_SEPARATOR . $this->log_name . '.log';

            file_put_contents($file_path, $line . "\n", FILE_APPEND);
        } catch (Throwable $e) {
            Yii::error($e->getMessage(), __METHOD__);
        }
    }
}