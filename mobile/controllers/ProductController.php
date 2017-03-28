<?php

namespace app\mobile\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Category;
use app\models\Product;
use app\models\Company;
use app\models\Column;
use Yii;
use app\mobile\controllers\CommonController;

class ProductController extends CommonController
{
	public function behaviors()
	{
		return [
		[
		'class'=>'yii\filters\HttpCache',
		'only' => ['index'],
		'lastModified'=>function(){
			$count1 = (new \yii\db\Query())->from('ocean_product')->count();
			// 产品数量和轮播图数量发生变化这不会用缓存
			$count = $count1 + 1;
			return $count;
		}
		]
		];
	}
	
	public function actionIndex()
	{
		$this->layout = 'layout1';
		$menu = Category::getMenu();
		$cateid = Yii::$app->request->get('cateid');
		$catetitle=Category::find()->where(['cateid'=>$cateid])->one();
		$catetitlel=$catetitle['parentid'];
		$catetitlef=Category::find()->where(['cateid'=>$catetitlel])->one();
		if($catetitlef==null){
			$catetitlef['title']='All Products';
		}
		if ($cateid) {
			$model = Product::find();
			$count = $model->where(['cateid'=>$cateid])->count();
			$pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
			$products = $model->where(['cateid'=>$cateid])->offset($pager->offset)->limit($pager->limit)->all();
		}else{
			$model = Product::find();
			$count = $model->count();
			$pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
			$products = $model->offset($pager->offset)->limit($pager->limit)->all();
		}
		$company = Company::find()->asArray()->one();
		//var_dump($products);die;
		return $this->render('index',['catetitlef'=>$catetitlef,'menu'=>$menu,'products'=>$products,'company'=>$company,'pager'=>$pager]);
	}

	public function actionDetail()
	{
		$this->layout = "layout1";
		$productid = Yii::$app->request->get("productid");
		$product = Product::find()->where('productid = :id', [':id' => $productid])->asArray()->one();
		$product['pics'] = explode(",",$product['pics']);
		$column = Column::find()->where('columnid = :id', [':id' => '1'])->one();

		if($product['relation']!=null){
			$relation=$product['relation'];
			$relation = unserialize($relation);
			$res = array_values($relation);
			$l=count($res);
			$resnew = array();
			for($i=0;$i<4;$i++){
				$resnew[] = Product::find()->where('productid = :id', [':id' => $res[$i]])->asArray()->one();
			}
			return $this->render("item", ['product' => $product,'column' => $column,'resnew' => $resnew,'relation' => $relation]);
		}
		return $this->render("item", ['product' => $product,'column' => $column]);
	}


}