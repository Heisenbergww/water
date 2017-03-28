<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\controllers\CommonController;
use yii\data\Pagination;
use app\models\Join;
use app\models\Front;
use app\models\Company;
use app\models\Category;


class JoinusController extends CommonController
{
    public function actionIndex()
    {
        $this->layout = 'layout1';
        $model = new Join();
        $cate = Category::find()->orderBy('cateid')->where('parentid = :id', [':id' => '0'])->all();
        $company = Company::find()->asArray()->one() ;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post['Join']['createtime'] = time();
            if ($model->add($post)) {
                Yii::$app->session->setFlash('success','添加成功');
                return $this->goBack(['joinus/index']);
            }else{
                Yii::$app->session->setFlash('error','添加失败');
            }
        }
        $front = Front::find()->where('frontid = :id', [':id' => '1'])->one();
        return $this->render('index',['front'=>$front,'company'=>$company,'model'=>$model,'cate'=>$cate]);
    }


}


