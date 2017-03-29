<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Home;
use app\controllers\CommonController;
use app\models\News;
use app\models\Company;
use app\models\Column;
use app\models\Known;
use Yii;

class HomeController extends CommonController
{

	
    public function actionIndex()
    {
        $this->layout = 'layout1';
		$news = News::find()->where(['isshow'=>'1'])->orderBy(['createtime'=>SORT_DESC])->limit(2)->all();
		$knowns = Known::find()->where(['isshow'=>'1'])->orderBy(['createtime'=>SORT_DESC])->limit(4)->all();
		return $this->render('index',['news'=>$news,'knowns'=>$knowns]);
	
    }

}