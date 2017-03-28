<?php
namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
use app\modules\controllers\CommonController;
use app\models\Front;
use yii\data\Pagination;
use crazyfd\qiniu\Qiniu;
use yii\web\UploadedFile;

class FrontController extends CommonController
{
    // 富文本编辑器设置
    public function actions()
    {
        return ['upload' => ['class' => 'kucha\ueditor\UEditorAction', 'config' => ["imageUrlPrefix" => 'http://'.$_SERVER['HTTP_HOST'], //图片访问路径前缀
            "imagePathFormat" => "/uploads/article/{yyyy}{mm}{dd}/{time}{rand:6}"
            //上传保存路径
        ],]];
    }

    public function actionList()
    {
        $this->layout = "layout1";
        $model = Article::find();
        $count = $model->count();
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
        $articles = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("articles", ['articles' => $articles, 'pager' => $pager]);
    }

    public function actionAdd()
    {
        $this->layout = "layout1";
        $model = Front::find()->where('frontid = :id', [':id' => '1'])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            // 存logo
            $model->logo = UploadedFile::getInstance($model, 'logo');
            $imageName = 'logo' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->logo->extension;
            $model->logo->saveAs('uploads/front/' . $imageName);
            // 存一张图片结束
            $post['Front']['logo'] = 'uploads/front/' . $imageName;


            // 存faq
            $model->faqimg = UploadedFile::getInstance($model, 'faqimg');
            $imageName2 = 'faqimg' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->faqimg->extension;
            $model->faqimg->saveAs('uploads/front/' . $imageName2);
            // 存一张图片结束
            $post['Front']['faqimg'] = 'uploads/front/' . $imageName2;


            // 存product_img
            $model->product_img = UploadedFile::getInstance($model, 'product_img');
            $imageName3 = 'v' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->product_img->extension;
            $model->product_img->saveAs('uploads/front/' . $imageName3);
            // 存一张图片结束
            $post['Front']['product_img'] = 'uploads/front/' . $imageName3;
            

            // 存company_img
            $model->company_img = UploadedFile::getInstance($model, 'company_img');
            $imageName4 = 'company_img' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->company_img->extension;
            $model->company_img->saveAs('uploads/front/' . $imageName4);
            // 存一张图片结束
            $post['Front']['company_img'] = 'uploads/front/' . $imageName4;


            // 存contact_img
            $model->contact_img = UploadedFile::getInstance($model, 'contact_img');
            $imageName5 = 'contact_img' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->contact_img->extension;
            $model->contact_img->saveAs('uploads/front/' . $imageName5);
            // 存一张图片结束
            $post['Front']['contact_img'] = 'uploads/front/' . $imageName5;
            

            // 存join_img
            $model->join_img = UploadedFile::getInstance($model, 'join_img');
            $imageName6 = 'join_img' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->join_img->extension;
            $model->join_img->saveAs('uploads/front/' . $imageName6);
            // 存一张图片结束
            $post['Front']['join_img'] = 'uploads/front/' . $imageName6;
            $post['Front']['adminuser'] = Yii::$app->session['admin']['adminuser'];


            if ($model->add($post)) {
                Yii::$app->session->setFlash('success', '添加成功');
                return $this->goBack(['admin/front/add']);
            } else {
                Yii::$app->session->setFlash('error', '添加失败');
            }
        }
        return $this->render("add", ['model' => $model]);
    }

    public function actionDel()
    {
        $articleid = (int)Yii::$app->request->get('articleid');
        if (empty($articleid)) {
            return $this->redirect(['article/list']);
        }
        $model = new Article;
        $article = $model::find()->where('articleid = :id', [':id' => $articleid])->one();
        $tmp = $article->cover;
        if ($model->deleteAll('articleid=:id', [':id' => $articleid])) {
            if (unlink($tmp)) {
                Yii::$app->session->setFlash('info', '删除成功');
                return $this->redirect(['article/list']);
            }
        }
    }

    public function actionOn()
    {
        $articleid = (int)Yii::$app->request->get('articleid');
        if (empty($articleid)) {
            return $this->redirect(['article/list']);
        }
        $model = new Article;
        $model->updateAll(['isshow' => '1'], 'articleid=:id', [':id' => $articleid]);
        return $this->redirect(['article/list']);
    }

    public function actionOff()
    {
        $articleid = (int)Yii::$app->request->get('articleid');
        if (empty($articleid)) {
            return $this->redirect(['article/list']);
        }
        $model = new Article;
        $model->updateAll(['isshow' => '0'], 'articleid=:id', [':id' => $articleid]);
        return $this->redirect(['article/list']);
    }
    public function actionMod()
    {
        $this->layout = "layout1";
        $articleid = Yii::$app->request->get("articleid");
        $model = Article::find()->where('articleid = :id', [':id' => $articleid])->one();
        $image = $model->cover;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            // cover图片处理
            $model->cover = UploadedFile::getInstance($model, 'cover');
            if ($model->cover) {
                if (file_exists($image)) {
                    if (unlink($image)) {
                        $imageName = mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->cover->extension;
                        $model->cover->saveAs('uploads/article/' . $imageName);
                        $post['Article']['cover'] = 'uploads/article/' . $imageName;
                    }
                } else {
                    $imageName = mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->cover->extension;
                    $model->cover->saveAs('uploads/article/' . $imageName);
                    $post['Article']['cover'] = 'uploads/article/' . $imageName;
                }

            } else {
                $post['Article']['cover'] = $image;
            }

            if ($model->load($post) && $model->save()) {
                Yii::$app->session->setFlash('info', '修改成功');
                return $this->goBack(['admin/article/mod','articleid' => $articleid]);
            }
        }
        return $this->render('add',['model'=>$model]);
    }



}
