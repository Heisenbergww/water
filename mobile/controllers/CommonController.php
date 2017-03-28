<?php

namespace app\mobile\controllers;

use yii\web\Controller;
use app\models\Social;
use app\models\Front;
use Yii;

class CommonController extends Controller
{
	public function init()
	{
		//if ($_SERVER['HTTP_HOST']=='www.ercolego.com'||$_SERVER['HTTP_HOST']=='ercolego.com'||$_SERVER['HTTP_HOST']=='web.shelf.com'||$_SERVER['HTTP_HOST']=='shelf.com'||$_SERVER['HTTP_HOST']=='192.168.199.60') {
			$footer = Social::find()->where('id = :id', [':id' => '1'])->one();
			$this->view->params['footer'] = $footer;
			$front = Front::find()->where('frontid = :id', [':id' => '1'])->one();
			$this->view->params['front'] = $front;
		//}else{
		//	return $this->redirect('http://www.ercolego.com/');
		//}
	}

}