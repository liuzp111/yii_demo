<?php

//app指的是网站根目录

namespace app\controllers;

use yii\web\Controller;

/**
 * Request组件和验证学习
 */
class LayoutsController extends Controller{
    public $layout = 'common';//指定布局的文件
    public function actionIndex()
    {
        
        return $this->render('index');//会将views/layouts/index.php 包含进common.php文件中
    }
    
    
    /**
     * 在视图中显示另外一个试图
     * @return type
     */
    public function actionView()
    {
         return $this->renderPartial('index');//会将views/layouts/index.php 包含进common.php文件中
    }
     
    
    
    public function actionBlock()
    {
         return $this->render('index');
    }
}