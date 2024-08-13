<?php

namespace app\services;

use yii\base\Model;
use yii\web\UploadedFile;

class FileService
{
    public Model $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($attr=null): bool
    {
        $attribute = $attr ?: 'image';
        $attribute_ru = $attr ? $attr.'_ru' : 'image_ru';
        $attribute_en = $attr ? $attr.'_en' : 'image_en';
        $this->handleFileUpload($attribute);
        $this->handleFileUpload($attribute_ru);
        $this->handleFileUpload($attribute_en);

        $this->model->save();
        return true;
    }

    public function update($oldImage=null, $oldImageRu=null, $oldImageEn=null, $attr=false): bool
    {
        $attribute = $attr ?: 'image';
        $attribute_ru = $attr ? $attr.'_ru' : 'image_ru';
        $attribute_en = $attr ? $attr.'_en' : 'image_en';
        $this->handleFileUpload($attribute, $oldImage);
        $this->handleFileUpload($attribute_ru, $oldImageRu);
        $this->handleFileUpload($attribute_en, $oldImageEn);

        $this->model->save();
        return true;
    }

    private function handleFileUpload($attribute, $oldValue=null): void
    {
        $file = UploadedFile::getInstance($this->model, $attribute);

        if ($file) {
            $filePath = 'uploads/' . uniqid() . '.' . $file->extension;

            if ($file->saveAs($filePath)) {
                $this->model->$attribute = $filePath;
            }
        } elseif ($oldValue) {
            $this->model->$attribute = $oldValue;
        }
    }
}