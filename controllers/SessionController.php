<?php

namespace app\controllers;
use yii\web\Controller;
use yii\web\Cookie;
class SessionController extends Controller{
    public function  actionIndex()
    {
//        1.调用session组件 
        $session = \Yii::$app -> session;
//        2.判断session是否开启
        if($session->isActive)
        {
            echo "Session is not acive";
        }else{
    //      3.开启session
            $session -> open();            
            echo "Session is  acive";
        }
      

//        4.设置session值
//        $session -> set('user','张三');//会将session 保存到php.ini指定的目录中。session.save_path ="E:/wamp/wamp64/tmp"
//        5.获取session值
//        echo $session -> get('user');
//        6.删掉session值
//        $session -> remove('user');
//
//        TIPS1：不同浏览器会产生不同的session,系统是根据sessionID来进行识别的
//        TIPS2: 即可通过对象的方式操作session，也可以通过数组的方式来操作session，因为实现了 the ArrayAccess interface的类 可以当作数组使用

//        通过数组方式来操作session
//        $session['user'] = "张三";// 设置session值
        echo $session['user']; //取出session数据
//        unset($session['user']);//通过unset 来删除session        
    }
    public function actionCookie(){
//        浏览器响应的时候添加cookie，请求的时候获取cookie
        // 添加cookie
        $cookies = \YII::$app->response->cookies;
        $cookie_data = array('name'=>'user', 'value'=>'zhangsan');
        //$cookies->add(new Cookie($cookie_data));
        //echo $cookies->getValue('user'); 获取cookie值
        // 删除cookie
       // $cookies->remove('user');

//        获取请求时cookies
        $cookies = \YII::$app->request->cookies;
        var_dump($cookies);
         echo   $cookies->getValue('users', 20);//获取不存在的cookie时，可以指定一个值输出  
    }
        /**
         * cookie和session学习
         */
	public function actionCookie2(){

            //第一种定义的cookie的方式
//            $cookie = new Cookie();
//            $cookie -> name = 'mrs_name';
//            $cookie -> expire = time() + 86400;////存活的时间
//            $cookie -> httpOnly = true;//无法通过 js 读取 cookie
//            $cookie -> value = 'smister';
//
//            \Yii::$app->response->getCookies()->add($cookie);




		//第二种定义的cookie的方式
//		$cookie = new \yii\web\Cookie([
//			'name' => 'mrs_name',
//			'expire' => time() + 86400,
//			'httpOnly' => true,
//			'value' => 'smister1'
//		]);
//
//		\Yii::$app->response->getCookies()->add($cookie);


//		$cookies = \Yii::$app->request->cookies;

//		var_dump($cookies->get('mrs_name'));//返回一个\yii\web\Cookie 对象
//		var_dump($cookies->getValue('mrs_name'));//直接返回 Cookie 的值
//		var_dump($cookies->has('mrs_name'));//判断一个 Cookie 是否存在

//		var_dump($cookies->count());
//		var_dump($cookies->getCount());//读取 Cookie 的总数


//		$cookies = \Yii::$app->request->cookies;
//		$ck = $cookies->get('mrs_name');
//		var_dump(\Yii::$app->response->getCookies()->remove($ck)); //null
//		var_dump($cookies->has('mrs_name')); ///false

		//\Yii::$app->response->getCookies()->removeAll();
		//var_dump($cookies->count());


//		$session = \Yii::$app->session;
//
//		$session->set('mrs_name' , 'smister');
//		$session->set('mrs_array' , [1,2,3]);
//
//		var_dump($session->get('mrs_name'));

//
//		var_dump($session->get('mrs_name'));
//		var_dump($session->get('mrs_array'));

		//$session->remove('mrs_name');
		//var_dump($session->get('mrs_name'));

//		$session->removeAll();
//
//		var_dump($session->get('mrs_name'));
//		var_dump($session->get('mrs_array'));



	}    
}