<?php

namespace app\controllers;
use yii\web\Controller;

class ViewController extends Controller{
    public function  actionIndex()
    {
        //视图之数据安全
        //在$hello_str的值后边加上一段js代码，在浏览器刷新页面时，js代码被当成真的js代码显示出来。
        //这样会产生问题，假如$hello_str是从用户那边传递过来的，用户以请求的方式发送了一段内容(含有js代码)，这样就真的放在视图里去显示了。
        //那么如果在js代码中用户放进了一些恶意代码，就会造成跨站脚本攻击，从而危害到安全。Yii框架提供了一些专门的工具来防止这些问题的发生。
        $hello_str = 'Hello God!<script>alert(3);</script>';
        $data = array();
        $data['view_hello_str'] = $hello_str;
        return $this->renderPartial('index',$data);
    }
}