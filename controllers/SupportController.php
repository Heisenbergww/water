<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use app\models\Front;
use Yii;
use app\controllers\CommonController;

class SupportController extends CommonController
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
		$this->layout = 'layout1';
		$cate = Category::find()->where(['parentid'=>'0'])->asArray()->all();
		$products = Category::find()->where(['parentid'=>'0'])->asArray()->all();
		for ($i=0; $i < count($products); $i++) { 
			$product = Product::find()->where(['cateid'=>$cate[$i]['cateid']])->asArray()->all();
			$products[$i]['product'] = $product;
		}
		return $this->render('download_pdf',['cate'=>$cate,'products'=>$products]);
	}

	public function actionFaq()
	{
		$this->layout = 'layout2';
		$front = Front::find()->where('frontid = :id', [':id' => '1'])->one();
		return $this->render('faq',['front'=>$front]);
	}




}