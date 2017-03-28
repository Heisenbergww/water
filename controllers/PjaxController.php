<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Home;
use app\controllers\CommonController;
use app\models\Product;
use app\models\Company;
use app\models\Column;
use app\models\Category;
use Yii;

class PjaxController extends CommonController
{
    public function actionIndex()
    {
		$this->layout = false;
		return $this->render('index', ['time' => date('H:i:s')]);
	}

}