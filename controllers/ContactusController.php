<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use Yii;
use app\models\Message;
use app\models\Company;
use app\models\Front;
use app\controllers\CommonController;

class ContactusController extends CommonController
{
	public function behaviors()
	{

		return [
			[
				'class' => 'yii\filters\PageCache',
				'variations' => [
					\Yii::$app->language,
				],
			],
		];
	}
	
	public function actionIndex()
	{
		$this->layout = 'layout2';		
		$model = new Message();
		$company = Company::find()->asArray()->one();
		if (Yii::$app->request->isPost) {
			$ip = Yii::$app->request->userIP;
			$post = Yii::$app->request->post();
			$post['Message']['pl'] = $post['Message']['pls'];
			$post['Message']['ip'] = $ip;
			$post['Message']['createtime'] = time();
			if ($model->add($post)) {
				Yii::$app->session->setFlash('success','添加成功');
				return $this->goback(['contactus/index']);
			}else{
				Yii::$app->session->setFlash('error','添加失败');
			}
		}
		$front = Front::find()->where('frontid = :id', [':id' => '1'])->one();
		return $this->render('index',['front'=>$front,'company'=>$company,'model'=>$model]);
	}


}