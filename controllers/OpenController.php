<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\controllers\CommonController;
use yii\data\Pagination;
use app\models\Open;



class OpenController extends CommonController
{
    public function actionIndex()
    {
        $this->layout = 'layout2';
        return $this->render('index');
    }

    public function actionPages()
    {
        $this->layout = 'layout2';
        $articleid = Yii::$app->request->get('articleid');
        $model = Open::find()->where(['articleid'=>$articleid])->asArray()->one();
        return $this->render('pages',['model'=>$model]);
    }
 
}


