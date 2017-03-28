<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $imageFile;

    public function rules()
    {
        return [
        [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg ,jpeg,bmp'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $imageName = mt_rand(10000,99999) . (uniqid().'T' .date("ymd",time()));
            $name = $imageName. '.' . ($this->imageFile->extension);
            $this->imageFile->saveAs('uploads/'.$imageName. '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

  



}