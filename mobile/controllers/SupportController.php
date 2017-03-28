<?php

namespace app\mobile\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use app\models\Front;
use Yii;
use app\mobile\controllers\CommonController;

class SupportController extends CommonController
{
	public function behaviors()
	{
		return [
		[
		'class'=>'yii\filters\HttpCache',
		'lastModified'=>function(){
			$count1 = (new \yii\db\Query())->from('ocean_product')->count();
			// 文章数量数量发生变化这不会用缓存
			$count = $count1 + 1;
			return $count;
		}
		]
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
		return $this->render('pdf_download',['cate'=>$cate,'products'=>$products]);
	}

	public function actionFaq()
	{
		$this->layout = 'layout1';
		$front = Front::find()->where('frontid = :id', [':id' => '1'])->one();
		return $this->render('faq',['front'=>$front]);
	}




}