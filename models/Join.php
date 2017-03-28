<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Join extends ActiveRecord
{
	public static function tableName()
	{
		return "{{%join}}";
	}

	public function rules()
	{
		return [
			['name', 'required', 'message' => '姓名不能为空'],
			['tel', 'required', 'message' => '电话不能为空'],
			['country', 'required', 'message' => '国家不能为空'],
			['email', 'required', 'message' => '邮箱不能为空'],
			['email', 'email', 'message' => '邮箱格式不正确'],
			['interest', 'required', 'message' => ''],
			['comment', 'safe'],
			['createtime', 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'name' => '姓名',
			'tel'  => '电话',
			'country'=>'国家',
			'email'  => '邮箱',
			'interest'  => '偏好',
			'comment'  => '意见',
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