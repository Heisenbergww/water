<?php

namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
use app\modules\models\Admin;
use yii\data\Pagination;
use app\modules\controllers\CommonController;

class ManageController extends CommonController
{

  	public function actionManagers()
    {
    		$this->layout = 'layout1';
    		$model = Admin::find();
    		$count = $model->count();
    		$pager = new Pagination(['totalCount'=>$count,'pageSize'=>'10']);
    		$managers = $model->offset($pager->offset)->limit($pager->limit)->all();
    		return $this->render("managers",['managers'=>$managers,'pager'=>$pager]);
  	}

  	public function actionReg()
    {
        $this->layout= 'layout1';
        $model = new Admin;
        if (Yii::$app->request->isPost) {
        	$post = Yii::$app->request->post();
        	if($model->reg($post)){
        		Yii::$app->session->setFlash('info','添加成功');
            return $this->goBack(['admin/manage/reg']);
        	}else{
        		Yii::$app->session->setFlash('info','添加失败');
        	}
        }
        $model->adminpass = '';
        $model->repass = '';
        return $this->render('reg',['model'=>$model]);
    }

    public function actionDel()
    {
      	$adminid = (int)Yii::$app->request->get('adminid');
      	if (empty($adminid)) {
      		$this->redirect(["manage/managers"]);
      	}
      	$model = new Admin;
      	if ($model->deleteAll('adminid=:id',[':id'=>$adminid])){
      		Yii::$app->session->setFlash('info','删除成功');
  			 $this->redirect(["manage/managers"]);
      	}
    }	

    public function actionChangeemail()
    {
      	$this->layout = 'layout1';
      	$model = Admin::find()->where('adminuser=:user',[':user'=>Yii::$app->session['admin']['adminuser']])->one();
      	if (Yii::$app->request->isPost) {
      		$post = Yii::$app->request->post();
      		if ($model->changeemail($post)) {
      			Yii::$app->session->setFlash('info','修改成功');
            return $this->goBack(['admin/manage/changeemail']);
      		}
      	}
        $model->adminpass = '';
      	return $this->render('changeemail',['model'=>$model]);
    }

    public function actionChangepass()
    {
        $this->layout = 'layout1';
        $model = Admin::find()->where('adminuser=:user',[':user'=>Yii::$app->session['admin']['adminuser']])->one();
        $model->adminpass = '';
        if (Yii::$app->request->isPost) {
          $post = Yii::$app->request->post();
          if ($model->changePass($post)) {
            Yii::$app->session->setFlash('info','修改成功');
            return $this->goBack(['admin/manage/changepass']);
          }
        }
        return $this->render('changepass',['model'=>$model]);
    }







}