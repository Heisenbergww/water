<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Social extends ActiveRecord
{
	public static function tableName()
	{
		return "{{%social_account}}";
	}
	public function rules()
	{
		return [
		['facebook', 'required', 'message' => '名称不能为空'],
		['twitter', 'required', 'message' => '地址不能为空'],
		['youtube', 'required', 'message' => '电话不能为空'],
		['linkedin', 'required', 'message' => '邮箱不能为空'],                                           
		['instagram', 'required', 'message' => '传真不能为空'],                                           
		];
	}

	



}