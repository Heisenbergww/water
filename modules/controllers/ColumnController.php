<?php
namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
use app\modules\controllers\CommonController;
use app\models\Column;
use yii\data\Pagination;
use crazyfd\qiniu\Qiniu;
use yii\web\UploadedFile;

class ColumnController extends CommonController
{
    // 富文本编辑器设置
    public function actions()
    {
        return ['upload' => ['class' => 'kucha\ueditor\UEditorAction', 'config' => ["imageUrlPrefix" => 'http://'.$_SERVER['HTTP_HOST'], //图片访问路径前缀
            "imagePathFormat" => "/uploads/show/{yyyy}{mm}{dd}/{time}{rand:6}"
            //上传保存路径
        ],]];
    }

    public function actionList()
    {
        $this->layout = "layout1";
        $model = Column::find();
        $count = $model->count();
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
        $some = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("list", ['some' => $some, 'pager' => $pager]);
    }

    public function actionAboutus()
    {
        $this->layout = "layout1";
        $model = Column::find()->where('columnid = :id', [':id' => '1'])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->add($post)) {
                Yii::$app->session->setFlash('success', '添加成功');
                return $this->goBack(['admin/column/aboutus']);
            } else {
                Yii::$app->session->setFlash('error', '添加失败');
            }
        }
        return $this->render("aboutus", ['model' => $model]);
    }

    public function actionMod()
    {
        $this->layout = "layout1";
        $columnid = Yii::$app->request->get("columnid");
        $model = Column::find()->where('columnid = :id', [':id' => $columnid])->one();

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if ($model->load($post) && $model->save()) {
                Yii::$app->session->setFlash('info', '修改成功');
                return $this->goBack(['admin/column/mod','columnid' => $columnid]);
            }
        }
        return $this->render('aboutus',['model'=>$model]);
    }



}
