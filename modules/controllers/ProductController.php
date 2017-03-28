<?php
namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
use yii\data\Pagination;
use app\models\Product;
use app\models\Category;
use yii\web\UploadedFile;

class ProductController extends CommonController
{
    // 富文本编辑器设置
    public function actions()
    {
        return ['upload' => ['class' => 'kucha\ueditor\UEditorAction', 'config' => ["imageUrlPrefix" => 'http://'.$_SERVER['HTTP_HOST'], //图片访问路径前缀
            "imagePathFormat" => "/uploads/products/{yyyy}{mm}{dd}/{time}{rand:6}"
            //上传保存路径
        ],]];
    }

    // 商品列表
    public function actionList()
    {
        $model = Product::find();
        $count = $model->count();
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
        $products = $model->offset($pager->offset)->limit($pager->limit)->all();
        $this->layout = "layout1";
        return $this->render("products", ['products' => $products, 'pager' => $pager]);
    }

    //添加商品
    public function actionAdd()
    {
        $this->layout = "layout1";
        $products = new Product;
        $cate = new Category;
        $list = $cate->getOptions();
        unset($list[0]);
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            // 存多张图片开始
//            $products->pics = UploadedFile::getInstances($products, 'pics');
//            $pics = [];
//            foreach ($products->pics as $file) {
//                $picsName = 'pro' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $file->extension;
//                $file->saveAs('uploads/products/' . $picsName);
//                $tmp = 'uploads/products/' . $picsName;
//                array_push($pics, $tmp);
//            }
//            $picImage = implode(",", $pics);
            // 存多张图片结束
            // 存一张图片开始
            $products->cover = UploadedFile::getInstance($products, 'cover');
            $imageName = 'cover' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $products->cover->extension;
            $products->cover->saveAs('uploads/products/' . $imageName);
            $post['Product']['cover'] = 'uploads/products/' . $imageName;
            // 存一张图片结束

            $post['Product']['createtime'] = time();
//            $post['Product']['pics'] = $picImage;
            if ($products->add($post)) {
                Yii::$app->session->setFlash('success', '添加成功');
                return $this->goBack(['admin/product/add']);
            } else {
                Yii::$app->session->setFlash('error', '添加失败');
            }
        }
        return $this->render("add", ['opts' => $list, 'model' => $products]);
    }

    //删除
    public function actionDel()
    {
        $productid = (int)Yii::$app->request->get('productid');
        if (empty($goods_id)) {
            $this->redirect(["product/list"]);
        }
        $model = new Product;
        if ($model->deleteAll('productid=:id', [':id' => $productid])) {
            $this->redirect(["product/list"]);
            Yii::$app->session->setFlash('info', '删除成功');
        }
    }

    // 推荐
    public function actionOn()
    {
        $productid = Yii::$app->request->get("productid");
        Product::updateAll(['is_tui' => '1'], 'productid = :pid', [':pid' => $productid]);
        return $this->redirect(['product/list']);
    }

    // 不推荐
    public function actionOff()
    {
        $productid = Yii::$app->request->get("productid");
        Product::updateAll(['is_tui' => '0'], 'productid = :pid', [':pid' => $productid]);
        return $this->redirect(['product/list']);
    }
    public function actionMod()
    {
        $this->layout = "layout1";
        $cate = new Category;
        $list = $cate->getOptions();
        unset($list[0]);
        $productid = Yii::$app->request->get("productid");
        $model = Product::find()->where('productid = :id', [':id' => $productid])->one();
        $image = $model->cover;
//        $model->pics = explode(",",$model->pics);
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            // cover图片处理
            $model->cover = UploadedFile::getInstance($model, 'cover');
            if ($model->cover) {
                $imageName = mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $model->cover->extension;
                $model->cover->saveAs('uploads/company/' . $imageName);
                $post['Product']['cover'] = 'uploads/company/' . $imageName;
            } else {
                $post['Product']['cover'] = $image;
            }
//             多张图片处理
//            $tmp = Product::find()->where('productid = :id', [':id' => $productid])->one();
//            $pic = explode(",",$tmp->pics);
//            $model->pics = UploadedFile::getInstances($model, 'pics');
//            if ($model->pics) {
//                $pics = [];
//                foreach ($model->pics as $file) {
//                    $picsName = 'pro' . mt_rand(10000, 99999) . (uniqid() . 'T' . date("ymd", time())) . '.' . $file->extension;
//                    $file->saveAs('uploads/products/' . $picsName);
//                    $tmp = 'uploads/products/' . $picsName;
//                    array_push($pics, $tmp);
//                }
//                $image_tmp = array_merge($pic, $pics);
//                $post['Product']['pics'] = implode(",",$image_tmp);
//            }else{
//                $post['Product']['pics'] = $tmp->pics;
//            }
            if ($model->load($post) && $model->save()) {
                Yii::$app->session->setFlash('info', '修改成功');
                return $this->goBack(['admin/product/mod','productid' => $productid]);
            }
        }
        return $this->render('add', ['model' => $model, 'opts' => $list]);
    }
    // 删除商品图片
    public function actionRemovepic()
    {
        $key = Yii::$app->request->get("key"); 
        $productid = Yii::$app->request->get("productid");
        $model = Product::find()->where('productid = :id', [':id' => $productid])->one();
        $pic = explode(",",$model->pics);
        // 删除图片
        if (file_exists($pic[$key])) {
           if (unlink($pic[$key])) {
               unset($pic[$key]); 
            }else{
                Yii::$app->session->setFlash('info', '删除失败');
            }
        } else {
           unset($pic[$key]); 
        }
        Product::updateAll(['pics' => implode(",",$pic)], 'productid = :pid', [':pid' => $productid]);
        return $this->goBack(['admin/product/mod','productid' => $productid]);
    }
    
    //关联商品
    
    public function actionRelation(){
        $this->layout = "layout1";
        $productid = Yii::$app->request->get("productid");
        $product = Product::find()->where('productid = :id', [':id' => $productid])->asArray()->one();


        if($product['relation']!=null){
            $relation=$product['relation'];
            $relation = unserialize($relation);
            $res = array_values($relation);
            $l=count($res);
            $resnew = array();
            for($i=0;$i<$l;$i++){
                $resnew[] = Product::find()->where('productid = :id', [':id' => $res[$i]])->asArray()->one();
            }
            return $this->render("relation", ['product' => $product,'resnew' => $resnew,'relation' => $relation]);
        }


        return $this->render("relation", ['product' => $product]);
    }

    public function actionBackrelation(){

        if (Yii::$app->request->isAjax) {

            $productid = Yii::$app->request->post("productid");
            $products = Product::find()->where('productid != :id', [':id' => $productid])->asArray()->all();
            $datas = array(
                'code' => 200,
                'status' => true,
                'products' => $products
            );
            $jsonData = json_encode($datas);
            return urldecode($jsonData);
        }
    }

    public function actionRelations(){
        $this->layout = "layout1";
//        $product = new Product();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post = array_splice($post,1);
            $productid = $post[0];
            $product = Product::find()->where('productid = :id', [':id' => $productid])->one();
            $post = array_splice($post,1);
            $post = serialize($post);
            $update=Yii::$app->db->createCommand()->update('ocean_product', ['relation' => $post], ['productid' => $productid])->execute();
            if($update){
                Yii::$app->session->setFlash('success', '添加成功');
                return $this->goBack(Yii::$app->request->getReferrer());
            }
            else{
                Yii::$app->session->setFlash('success', '添加失败');
                return $this->goBack(Yii::$app->request->getReferrer());
            }


        }
    }




   

}
