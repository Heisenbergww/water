<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Home extends ActiveRecord
{
	const AK = 'y8Ab-IawS5ge8KMXSRadqV74utVMTqat-NAShYi0';
	const SK = 'IkDEN6J3PXTFrMp2BUe-GjljrVXsf_DVNOK9nqt5';
	const DOMAIN = 'ocrr4n99u.bkt.clouddn.com';
	const BUCKET = 'oceanmin';

	public static function tableName()
	{
		return "{{%carousel}}";
	}

	public function rules()
	{
		return [
		['cover', 'required', 'message' => '图片不能为空'],
		['orderid', 'required', 'message' => '顺序号不能为空'],
		['createtime', 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
		'cover' => '图片',
		'orderid'  => '序号',
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