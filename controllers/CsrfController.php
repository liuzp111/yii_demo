<?php
//app指的是网站根目录
//controllers
namespace app\controllers;

use yii\web\Controller;
use Yii;
/**
 * CSRF防护学习
*/
class CsrfController extends Controller
{
    /**
     * 地址：http://127.0.0.1/Yii/yii2-demo/web/index.php?r=csrf/csrf
     * 如果不携带csrfToken的话，会提示Bad Request (#400) 错误
     * @return type
     */
    public function actionCsrf()
    {   
        if(\Yii::$app->request->isPost){
            echo \Yii::$app ->request->post('title');
        }else{
            $csrfToken = \Yii::$app -> request -> csrfToken;
            return $this->renderPartial('csrf', ['csrfToken'=>$csrfToken]);
        }
    } 
}





?>
