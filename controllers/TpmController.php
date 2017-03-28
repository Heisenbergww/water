<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\Social;

class CommonController extends Controller
{
    public function init()
    {
        // footer的数据
        $flag = false;
        $ua = $_SERVER['HTTP_USER_AGENT'];
        if($ua == ''){
            $flag = true;
        }
        if($flag){
            header('HTTP/1.1 404 Not Found');
            header("status: 404 Not Found");
            echo '您的请求未通过我们的验证！';
            exit();
        }
        if ($_SERVER['HTTP_HOST']!='www.ercolego.com') {
            echo 'Adopted piecemeal, I write better code';
            exit();
        }
        $footer = Social::find()->where('id = :id', [':id' => '1'])->one();
        $this->view->params['footer'] = $footer;
        if (!empty($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
        } else {
            $lang = 'en';
        }
        if ($lang == 'cn') {
            Yii::$app->language = 'cn';
        } else {
            Yii::$app->language = 'en';
        }

        $url = \Yii::$app->request->getAbsoluteUrl();
        $count_server = strlen('http://' . $_SERVER['HTTP_HOST'] . '/');
        $tmp = self::isMobile();
        if ($tmp) {
            if ($url == 'http://' . $_SERVER['HTTP_HOST'] . '/') {
                $url = self::insertToStr($url, $count_server, "mobile/home/index.html");
            } else {
                $url = self::insertToStr($url, $count_server, "mobile/");
            }
            return $this->redirect($url);
        } else {

        }
    }

    private function insertToStr($str, $i, $substr)
    {
        $startstr = "";
        for ($j = 0; $j < $i; $j++) {
            $startstr .= $str[$j];
        }
        $laststr = "";
        for ($j = $i; $j < strlen($str); $j++) {
            $laststr .= $str[$j];
        }
        $str = $startstr . $substr . $laststr;
        return $str;
    }

    private function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return TRUE;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset($_SERVER['HTTP_VIA'])) {
            return stristr($_SERVER['HTTP_VIA'], "wap") ? TRUE : FALSE;
            // 找不到为flase,否则为TRUE
        }
        // 判断手机发送的客户端标志,兼容性有待提高
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('mobile', 'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap');
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return TRUE;
            }
        }
        if (isset($_SERVER['HTTP_ACCEPT'])) {
            // 协议法，因为有可能不准确，放到最后判断
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== FALSE && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === FALSE || strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))) {
                return TRUE;
            }
        }
        return FALSE;
    }




}