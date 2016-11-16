<?php

 namespace app\controllers;
 use yii\web\Controller;
 /**
  * Yii控制器响应处理学习
  */
 class ResponseController extends Controller  
 {
    public function actionIndex()
    {
        $res = \Yii::$app -> response;
        //改变header头信息
        //$res -> statusCode = '404';//返回404在状态码
       // $res -> headers-> add('pragma','no-cache');//Pragma:no-cache
       // $res -> headers-> set('pragma','max-age=5');//Pragma:max-age=5 缓存5秒
       // $res -> headers-> remove('pragma');//移除Pragma
        //===跳转
        //$res -> headers -> add('location','http://baidu.com');//重定向
        //$this ->redirect('http://baidu.com',302);//与上面等价
        //文件下载  
        //$res -> headers->add('content-disposition','attachment;filename=a.jpg');
       // $res -> sendFile('./robots.txt');
    }
 }