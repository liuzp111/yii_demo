<?php

namespace app\modules\article\modules\category\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        echo 'hello cate';
        //return $this->render('index');
    }
}
