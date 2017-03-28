<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;


class PublicController extends Controller
{
   
    // 切换语言
    public function actionLanguage()
    {
        $lang = Yii::$app->request->post('lang');
        var_dump($lang);
        setcookie("lang",$lang,time()+24*3600*30,'/');
    }

   



}