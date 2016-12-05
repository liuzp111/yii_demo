<?php
//app指的是网站根目录
//controllers
namespace app\controllers;

use yii\web\Controller;
use Yii;
/**
 * XSS防护学习
*/
class XssController extends Controller
{
    /**
     * 在浏览器地址栏注入xss:  http://127.0.0.1/Yii/yii2-demo/web/index.php?r=xss/xss&name=%3Cscript%3Ealert(%22hello%20world%22)%3C/script%3E`
     */
    public function actionXss(){
        //==========================================
        //如果不加下方的取消防护XSS攻击，则在谷歌浏览器会提示以下错误信息，被goole自动屏蔽了
        //The XSS Auditor refused to execute a script in 'http://127.0.0.1/Yii/yii2-demo/web/index.php?r=xss/xss&name=%3Cscript%3Ealert(%22hello%20world%22)%3C/script%3E`'
        // because its source code was found within the request. The auditor was enabled as the server sent neither an 'X-XSS-Protection' nor 'Content-Security-Policy' header.
        //==========================================
        //\Yii::$app->response->headers->add('X-XSS-Protection', '0');//关闭XSS防护才能看出效果
        echo \YII::$app->request->get('name');        
    }
/**
 * XSS转码防范
 * 访问：127.0.0.1/Yii/yii2-demo/web/index.php?r=xss/xss2&script=<script>alert("hello world xss")</script>
 */
public function actionXss2()
{
    \Yii::$app->response->headers->add('X-XSS-Protection', '0');//部分浏览器关闭XSS防护才能看出效果
    $script = \Yii::$app->request->get('script');
    //echo $script;//未过滤的输出
    echo \yii\helpers\Html::encode($script);//转码过滤输出

}
/**
 * XSS过滤防范
 * 访问：127.0.0.1/Yii/yii2-demo/web/index.php?r=xss/xss2&script=start<script>alert("hello world xss")</script>end
 */
public function actionXss3(){
    \YII::$app->response->headers->add('X-XSS-Protection','0');
    $script = \YII::$app->request->get('script');
    //这个函数使用了lexer技术，可以识别HTML里的JS、HTML、CSS三种代码，并把js过滤掉
    //echo \yii\helpers\HtmlPurifier::process($script);//output:  startend
}


}