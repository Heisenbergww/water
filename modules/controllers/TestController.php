<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class TestController extends Controller
{


    public function actionIndex()
    {
        $this->layout = false;
        $model = new Admin;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->reg($post)) {
                echo "success";
            }
        }
        return $this->render("index", ['model' => $model]);
    }

    public function actionJunfeng()
    {


    }


}