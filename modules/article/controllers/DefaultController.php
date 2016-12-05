<?php

namespace app\modules\article\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        echo 'artilce 子模块';
        //return $this->render('index');
    }
}
