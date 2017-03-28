<?php

namespace app\mobile\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use Yii;
use app\models\Message;
use app\models\Company;
use app\mobile\controllers\CommonController;

class ContactusController extends CommonController
{
//	public function behaviors()
//	{
//		return [
//		[
//		'class'=>'yii\filters\HttpCache',
//		'only' => ['index'],
//		'lastModified'=>function(){
//			$count1 = (new \yii\db\Query())->from('ocean_company')->where(['companyid'=>1])->max('createtime');
//			// 产品数量和轮播图数量发生变化这不会用缓存
//			$count = $count1 + 1;
//			return $count;
//		}
//		]
//		];
//	}
	
	public function actionIndex()
	{
		$this->layout = 'layout1';
		$model = new Message();
		$company = Company::find()->asArray()->one() ;
		if (Yii::$app->request->isPost) {
			$ip = Yii::$app->request->userIP;
			$post = Yii::$app->request->post();
			$post['Message']['pl'] = $post['Message']['pls'];
			$post['Message']['ip'] = $ip;
			$post['Message']['createtime'] = time();
			if ($model->add($post)) {
				Yii::$app->session->setFlash('success','添加成功');
				return $this->goback(['/mobile/contactus/index']);
			}else{
				Yii::$app->session->setFlash('error','添加失败');
			}
		}
		return $this->render('index',['company'=>$company,'model'=>$model]);
	}


}