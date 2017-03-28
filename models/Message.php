<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Message extends ActiveRecord
{
	public static function tableName()
	{
		return "{{%message}}";
	}

	public function rules()
	{
		return [
		['name', 'required', 'message' => '姓名不能为空'],
		['phone', 'required', 'message' => '电话不能为空'],
		['email', 'required', 'message' => '邮箱不能为空'],
		['email', 'email', 'message' => '邮箱格式不正确'],
		['detail', 'safe'],
		[['pls','createtime','ip'] ,'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
		'name' => '姓名',
		'phone'  => '电话',
		'email'  => '邮箱',
		'company'  => '公司',
		'detail'  => '详情',
		'pls'  => '浏览过的商品',
		'ip'  => '用户ip',
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