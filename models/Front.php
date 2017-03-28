<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Front extends ActiveRecord
{
    const AK = 'y8Ab-IawS5ge8KMXSRadqV74utVMTqat-NAShYi0';
    const SK = 'IkDEN6J3PXTFrMp2BUe-GjljrVXsf_DVNOK9nqt5';
    const DOMAIN = 'ocrr4n99u.bkt.clouddn.com';
    const BUCKET = 'oceanmin';

    public static function tableName()
    {
        return "{{%front}}";
    }

    public function rules()
    {
        return [
            ['logo', 'required', 'message' => '图片不能为空'],
            ['faqimg', 'required', 'message' => '图片不能为空'],
            ['product_img', 'required', 'message' => '图片不能为空'],
            ['company_img', 'required', 'message' => '图片不能为空'],
            ['contact_img', 'required', 'message' => '图片不能为空'],
            ['join_img', 'required', 'message' => '图片不能为空'],            
        ];
    }

    public function attributeLabels()
    {
        return [
            'logo' => 'logo',
            'faqimg' => 'faq页面banner',
            'product_img' => 'product页面banner',
            'company_img' => 'company_info页面banner',
            'contact_img' => 'contact_us页面banner',
            'join_img' => 'join_us页面banner',

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