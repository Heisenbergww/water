<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\controllers\CommonController;

class FashionController extends CommonController
{
	public function behaviors()
	{
		return[
		[
			'class' => 'yii\filters\PageCache',
			'duration' => 3600
		]
		];
	}
	
    public function actionIndex()
    {
        $this->layout = 'layout1';
        return $this->render('index');
    }





}