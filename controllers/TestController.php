<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\modules\models\Admin;


class TestController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();
        $this->layout = false;
        if (Yii::$app->request->isPost) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$imageName = mt_rand(10000,99999) . (uniqid().'T' .date("ymd",time()));
            if ($model->upload($imageName)) {
                return;
            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionFeng()
    {
        Yii::$app->language = 'cn ';  
        echo Yii::t('app', 'Goodbye_flag');
    }

    public function actionLanguage()
    {
        $lang = Yii::$app->request->post('lang');
        setcookie("lang",$lang,time()+24*3600*30);
    }

   



}