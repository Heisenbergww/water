<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\controllers\CommonController;
use yii\data\Pagination;



class OpenController extends CommonController
{
    public function actionIndex()
    {
        $this->layout = 'layout1';
        return $this->render('index');
    }
    public function actionOpenpages1()
    {
        $this->layout = 'layout1';
        return $this->render('open-pages1');
    }
    public function actionOpenpages2()
    {
        $this->layout = 'layout1';
        return $this->render('open-pages2');
    }
    public function actionOpenpages3()
    {
        $this->layout = 'layout1';
        return $this->render('open-pages3');
    }
    public function actionOpenpages4()
    {
        $this->layout = 'layout1';
        return $this->render('open-pages4');
    }
    public function actionOpenpages5()
    {
        $this->layout = 'layout1';
        return $this->render('open-pages5');
    }
    public function actionOpenpages6()
    {
        $this->layout = 'layout1';
        return $this->render('open-pages6');
    }
    public function actionOpenpages7()
    {
        $this->layout = 'layout1';
        return $this->render('open-pages7');
    }
}


