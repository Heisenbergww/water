<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Article extends ActiveRecord
{
	const AK = 'y8Ab-IawS5ge8KMXSRadqV74utVMTqat-NAShYi0';
	const SK = 'IkDEN6J3PXTFrMp2BUe-GjljrVXsf_DVNOK9nqt5';
	const DOMAIN = 'ocrr4n99u.bkt.clouddn.com';
	const BUCKET = 'oceanmin';

	public static function tableName()
	{
		return "{{%article}}";
	}

	public function rules()
	{
		return [
		['cover', 'required', 'message' => '图片不能为空'],
		['title', 'required', 'message' => '标题不能为空'],
		['brief', 'required', 'message' => '简介不能为空'],
		['descr', 'required', 'message' => '详情不能为空'],
		['isshow', 'safe'],
		['createtime', 'safe'],
		['adminuser', 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
		'cover' => '图片',
		'title'  => '标题',
		'descr'  => '文章详情',
		'isshow'  => '是否展示',
		'createtime' => '创建时间',
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