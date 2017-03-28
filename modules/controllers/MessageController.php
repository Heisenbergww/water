<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\controllers\CommonController;
use Yii;
use yii\data\Pagination;
use app\models\Message;
use app\models\Join;




class MessageController extends CommonController
{
	public function actionListm()
	{
		$this->layout = 'layout1';
		$model = Message::find();
		$count = $model->count();
		$pager = new Pagination(['totalCount'=>$count,'pageSize'=>'10']);
		$messages = $model->orderBy(['messageid'=>SORT_DESC])->offset($pager->offset)->limit($pager->limit)->all();
		return $this->render('message',['messages'=>$messages,'pager'=>$pager]);
	}
	public function actionListj()
	{
		$this->layout = 'layout1';
		$model = Join::find();
		$count = $model->count();
		$pager = new Pagination(['totalCount'=>$count,'pageSize'=>'10']);
		$messages = $model->offset($pager->offset)->limit($pager->limit)->all();
		return $this->render('join',['messages'=>$messages,'pager'=>$pager]);
	}


}