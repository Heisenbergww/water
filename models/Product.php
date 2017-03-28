<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Product extends ActiveRecord
{
	const AK = 'y8Ab-IawS5ge8KMXSRadqV74utVMTqat-NAShYi0';
	const SK = 'IkDEN6J3PXTFrMp2BUe-GjljrVXsf_DVNOK9nqt5';
	const DOMAIN = 'ocrr4n99u.bkt.clouddn.com';
	const BUCKET = 'oceanmin';
	public $cate;
 
  public static function tableName()
  {
    return "{{%product}}";
  }

  public function rules()
    {
        return [
            ['title', 'required', 'message' => '标题不能为空'],
            ['descr', 'required', 'message' => '描述详情不能为空'],
//            ['orderid', 'required', 'message' => '不能为空'],
            ['cateid', 'required', 'message' => '分类不能为空'],
//            ['features', 'required', 'message' => '商品特点不能为空'],
//            ['description', 'required', 'message' => '商品简介不能为空'],
//            ['is_tui', 'required', 'message' => '商品是否推荐不能为空'],
//            [['pics','sku','createtime','is_tui'],'safe'],
            [['createtime'],'safe'],
            [['cover'], 'required'],
        ];
    }

   public function attributeLabels()
    {
        return [
            'cateid' => '分类名称',
            'title'  => '商品名称',
            'descr'  => '商品描述(Specifications)',
//            'sku'  => 'sku',
//            'orderid'  => '推荐顺序',
//            'features'  => '商品特点',
//            'description'  => '商品简介',
//            'is_tui'  => '是否推荐',
            'cover'  => '商品封面',
//            'pics'   => '商品图片',
        ];
    }

  public function add($data)
  {
  	if ($this->load($data) && $this->save()) {
  		return true;
  	}
  	return false;
  }
    
    

}