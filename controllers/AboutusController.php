<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Article;
use app\models\Front;
use app\models\Column;
use Yii;
use app\controllers\CommonController;

class AboutusController extends CommonController
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
		$column = Column::find()->where('columnid = :id', [':id' => '1'])->one();
		return $this->render('index',['column' => $column]);
	}

	public function actionNews()
	{
		$this->layout = 'layout1';
		$model = Article::find();
		$count = $model->where(['isshow'=>'1'])->count();
		$pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
		$articles = $model->orderby('createtime desc')->offset($pager->offset)->limit($pager->limit)->all();
		return $this->render('news',['articles'=>$articles, 'pager' => $pager]);
	}

	public function actionNewdetail()
	{
		$this->layout = 'layout1';
		$articleid = Yii::$app->request->get('articleid');
		$model = Article::find()->where(['articleid'=>$articleid])->asArray()->one();
		return $this->render('news_pages',['model'=>$model]);
	}

	public function actionBranch()
	{
		$this->layout = 'layout1';
		return $this->render('our_branch');
	}
	
	public function actionCertification()
	{
		$this->layout = 'layout1';
		return $this->render('certification');
	}



}