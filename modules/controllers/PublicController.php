<?php
namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class PublicController extends Controller
{

    public function actionLogin()
    {
        $this->layout = false;
//        if ($_SERVER['HTTP_HOST'] == 'www.ercolego.com' || $_SERVER['HTTP_HOST'] == 'ercolego.com' || $_SERVER['HTTP_HOST'] == 'web.shelf.com' || $_SERVER['HTTP_HOST'] == 'shelf.com'||$_SERVER['HTTP_HOST']=='107.170.254.164') {
            $model = new Admin;
            if (Yii::$app->request->isPost) {
                $post = Yii::$app->request->post();
                if ($model->login($post)) {
                    $this->redirect(['default/index']);
                    Yii::$app->end();
                }
            }
            return $this->render('login', ['model' => $model]);
//        } else {
//            return $this->redirect('http://www.ercolego.com/');
//        }

    }

    public function actionLogout()
    {
        Yii::$app->session->removeAll();
        if (!isset(Yii::$app->session['admin']['isLogin'])) {
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        $this->goback();
    }

    public function actionSeekpassword()
    {
        $this->layout = false;
        $model = new Admin;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->seekPass($post)) {
                Yii::$app->session->setFlash('info', '电子邮件发送成功，请查收');
            }
        }
        return $this->render('seekpassword', ['model' => $model]);
    }

    public function actionMailchangepass()
    {
        $this->layout = false;
        $time = Yii::$app->request->get("timestamp");
        $adminuser = Yii::$app->request->get("adminuser");
        $token = Yii::$app->request->get("token");
        $model = new Admin;
        $myToken = $model->createToken($adminuser, $time);
        if ($token != $myToken) {
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        if (time() - $time > 300) {
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->changePass($post)) {
                Yii::$app->session->setFlash('info', '密码修改成功');
            }
        }
        $model->adminuser = $adminuser;
        return $this->render('mailchangepass', ['model' => $model]);
    }


}
