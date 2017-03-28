<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\controllers\CommonController;
use app\models\Known;
use app\models\Company;
use app\models\Column;
use Yii;

class KnownController extends CommonController
{


    public function actionIndex()
    {
        $this->layout = 'layout1';
        $model = Known::find();
        $count = $model->where(['isshow'=>'1'])->count();
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
        $articles = $model->orderby('createtime desc')->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render('index',['articles'=>$articles, 'pager' => $pager]);

    }

    public function actionPages()
    {
        $this->layout = 'layout1';
        $articleid = Yii::$app->request->get('articleid');
        $model = Known::find()->where(['articleid'=>$articleid])->asArray()->one();
        return $this->render('pages',['model'=>$model]);
    }


}