<?php

namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
use yii\data\Pagination;
use app\modules\controllers\CommonController;
use app\models\Home;
use crazyfd\qiniu\Qiniu;
use yii\web\UploadedFile;

class HomeController extends CommonController
{
    public function actionList()
    {
        $homes = Home::find()->orderby('orderid asc')->all();
        $this->layout = "layout1";
        return $this->render('list', ['homes' => $homes]);
    }

    //添加banner
    public function actionAdd()
    {
        $this->layout = "layout1";
        $products = new Home;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            // 存一张图片开始
            $products->cover = UploadedFile::getInstance($products, 'cover');
            $imageName = 'banner' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $products->cover->extension;
            $products->cover->saveAs('uploads/banner/' . $imageName);
            // 存一张图片结束
            $post['Home']['cover'] = 'uploads/banner/' . $imageName;
            $post['Home']['createtime'] = time();
            if ($products->add($post)) {
                Yii::$app->session->setFlash('success', '添加成功');
                return $this->goBack(['admin/home/add']);
            } else {
                Yii::$app->session->setFlash('error', '添加失败');
            }
        }
        return $this->render("add");
    }

    public function actionDel()
    {
        $imageid = (int)Yii::$app->request->get('imageid');
        if (empty($imageId)) {
            $this->redirect(["home/list"]);
        }
        $model = new Home;
        $image = $model->find()->where(['imageid'=>$imageid])->one();
        if (unlink($image->cover)) {
           if ($model->deleteAll('imageid=:id', [':id' => $imageid])) {
            return $this->redirect(['home/list']);
            Yii::$app->session->setFlash('info', '删除成功');
            }
        }else{
            Yii::$app->session->setFlash('info', '删除失败');
        }
    }




}