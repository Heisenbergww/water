<?php

namespace app\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\Join;
use app\models\Front;
use app\models\Category;
use app\mobile\controllers\CommonController;

class JoinusController extends CommonController
{
    public function actionIndex()
    {
        $this->layout = 'layout1';
        $model = new Join();
        $cate = Category::find()->orderBy('cateid')->all();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post['Join']['createtime'] = time();
            if ($model->add($post)) {
                Yii::$app->session->setFlash('success', '添加成功');
                return $this->goBack(['/mobile/joinus/index']);
            } else {
                Yii::$app->session->setFlash('error', '添加失败');
            }
        }
        $front = Front::find()->where('frontid = :id', [':id' => '1'])->one();
        return $this->render('index', ['model' => $model,'front' => $front,'cate' => $cate]);
    }
}