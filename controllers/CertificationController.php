<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Article;
use app\models\Front;
use Yii;
use app\controllers\CommonController;

class CertificationController extends CommonController
{
    public function behaviors()
    {

        return [
            [
                'class' => 'yii\filters\PageCache',
                'variations' => [
                    \Yii::$app->language,
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'layout2';
        return $this->render('index');        
    } 
}