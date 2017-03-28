<?php
namespace app\mobile\controllers;

use Yii;
use yii\web\Controller;


class PublicController extends Controller
{
   
    // 切换语言
    public function actionLanguage()
    {
        $lang = Yii::$app->request->post('lang');
        setcookie("lang",$lang,time()+24*3600*30);
    }

   



}