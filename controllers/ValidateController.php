<?php
//app指的是网站根目录
//controllers
namespace app\controllers;

//vendor\yiisoft\yii2\web
use yii\web\Controller;
use app\models\Article;
use app\models\Test;
        /**
         * 模型验证
         */
class ValidateController extends Controller
{


	public function actionValidate(){

            $data = [
                    'Test' => [
                            'username' => '',
                            'password' => '123456',
                            'repassword' => '123456',
                            'age' => 3,
                            'number' => 3,
                            'email' => 'smister@qq.com',
                            'sex' => 'nv',
                            'pt' => 'mrs12',
                            'str' => 'smister'
                    ]
            ];
            $test = new \app\models\Test();
          
            $test->load($data);
            //  var_dump($test);
            if(!$test->validate()){
                    //获取错误
                    var_dump($test->getErrors());
            }            
        }

}