<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *  Gii:
 *   http://127.0.0.1/Yii/yii2-demo/web/index.php?r=gii
 *   1.r=gii会判断是模块还是控制器，如果是模块的话会交给模块处理（GII模块），否则的话交给控制器处理（应用主体（也是个模块））
 *   2.所有的模块都是挂在应用主体之上的
 */



namespace app\controllers;

use yii\web\Controller;

use Yii;
/**
 * 文件上传学习
 */
class GiilearnController extends Controller
{
    /**
     * 1）
     * http://127.0.0.1/Yii/yii2-demo/web/index.php?r=giilearn/index
     * 访问上述地址即可到达子模块
     * 2）直接访问子模块
     * 
     */
    public function actionIndex()
    {
        //获取子模块,读取的是子模块的ID，子模块需要在config\web.php中配置
        $article = \Yii::$app ->getModule('article');
        //调用子模块的操作
        $article ->runAction('default/index');
    }
}