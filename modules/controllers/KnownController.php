<?php
namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
use app\modules\controllers\CommonController;
use app\models\Known;
use yii\data\Pagination;
use crazyfd\qiniu\Qiniu;
use yii\web\UploadedFile;

class KnownController extends CommonController
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
        $model = Known::find();
        $count = $model->count();
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
        $articles = $model->offset($pager->offset)->limit($pager->limit)->orderBy(['articleid'=>SORT_DESC])->all();
        return $this->render("articles", ['articles' => $articles, 'pager' => $pager]);
    }

    public function actionAdd()
    {
        $this->layout = "layout1";
        $model = new Known;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post['Known']['adminuser'] = Yii::$app->session['admin']['adminuser'];
            $post['Known']['createtime'] = time();
            if ($model->add($post)) {
                Yii::$app->session->setFlash('success', '添加成功');
                return $this->goBack(['admin/known/add']);
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
            return $this->redirect(['known/list']);
        }
        $model = new Known;
        $article = $model::find()->where('articleid = :id', [':id' => $articleid])->one();
       
        if ($model->deleteAll('articleid=:id', [':id' => $articleid])) {
            
                Yii::$app->session->setFlash('info', '删除成功');
                return $this->redirect(['known/list']);
            
        }
    }

    public function actionOn()
    {
        $articleid = (int)Yii::$app->request->get('articleid');
        if (empty($articleid)) {
            return $this->redirect(['known/list']);
        }
        $model = new Known;
        $model->updateAll(['isshow' => '1'], 'articleid=:id', [':id' => $articleid]);
        return $this->redirect(['known/list']);
    }

    public function actionOff()
    {
        $articleid = (int)Yii::$app->request->get('articleid');
        if (empty($articleid)) {
            return $this->redirect(['known/list']);
        }
        $model = new Known;
        $model->updateAll(['isshow' => '0'], 'articleid=:id', [':id' => $articleid]);
        return $this->redirect(['known/list']);
    }
    public function actionMod()
    {
        $this->layout = "layout1";
        $articleid = Yii::$app->request->get("articleid");
        $model = Known::find()->where('articleid = :id', [':id' => $articleid])->one();
        $image = $model->cover;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            // cover图片处理
            $model->cover = UploadedFile::getInstance($model, 'cover');
            if ($model->cover) {
                if (file_exists($image)) {
                   if (unlink($image)) {
                    $imageName = mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->cover->extension;
                    $model->cover->saveAs('uploads/known/' . $imageName);
                    $post['Known']['cover'] = 'uploads/known/' . $imageName;
                    }
                } else {
                    $imageName = mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->cover->extension;
                    $model->cover->saveAs('uploads/known/' . $imageName);
                    $post['Known']['cover'] = 'uploads/known/' . $imageName;
                }

            } else {
                $post['Known']['cover'] = $image;
            }

            if ($model->load($post) && $model->save()) {
                Yii::$app->session->setFlash('info', '修改成功');
                return $this->goBack(['admin/known/mod','articleid' => $articleid]);
            }
        }
        return $this->render('add',['model'=>$model]);
    }

  

}
