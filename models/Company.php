<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Company extends ActiveRecord
{
	public function rules()
	{
		return [
		['companyname', 'required', 'message' => '名称不能为空'],
		['companyaddress', 'required', 'message' => '地址不能为空'],
		['companytel', 'required', 'message' => '电话不能为空'],
		['companyemail', 'required', 'message' => '邮箱不能为空'],                                           
		['companyfax', 'required', 'message' => '传真不能为空'],                                           
		['companymobile', 'required', 'message' => '手机不能为空'],                                           
		['website', 'required', 'message' => '站点不能为空'],                                           
		['manufactureaddress', 'required', 'message' => '产地不能为空'],                                           
		[['cover','createtime'],'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
		'companyname' => '公司名称',
		'companyaddress'  => '地址',
		'companytel'  => '电话',
		'companyemail'  => '邮箱',
		'companyfax'  => '传真',
		'companymobile'  => '手机',
		'website'  => '站点',
		'manufactureaddress'  => '产地',
		'cover'  => '图片',
		'createtime'   => '修改时间',
		];
	}

	public static function tableName()
	{
		return "{{%company}}";
	}


}