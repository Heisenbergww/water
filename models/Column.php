<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Column extends ActiveRecord
{
    const AK = 'y8Ab-IawS5ge8KMXSRadqV74utVMTqat-NAShYi0';
    const SK = 'IkDEN6J3PXTFrMp2BUe-GjljrVXsf_DVNOK9nqt5';
    const DOMAIN = 'ocrr4n99u.bkt.clouddn.com';
    const BUCKET = 'oceanmin';

    public static function tableName()
    {
        return "{{%column}}";
    }

    public function rules()
    {
        return [         
            ['detail', 'required', 'message' => '详情不能为空'],           
        ];
    }

    public function attributeLabels()
    {
        return [            
            'detail'  => '详情',           
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