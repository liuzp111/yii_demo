<?php

//app指的是网站根目录
//controllers
namespace app\controllers;

//vendor\yiisoft\yii2\web
use yii\web\Controller;
use app\models\Article;
use app\models\Test;
/**
 * Request组件和验证学习
 */
class TestController extends Controller{

	public function actionIndex(){
		//echo 'Hello Word';


		//$this->redirect(['site/index']);

		//$this->goHome();
	
		//$this->goBack();

		//$this->refresh();

               // $article = new Article();
               // $article = Article::findOne(1);
                // var_dump($article);
                //$test = new Test();
                
                //var_dump($test);
                
                ;//============Request 组件
//                var_dump(\Yii::$app->request);//Request 组件
//                var_dump(\Yii::$app->request->isAjax);die;
//                var_dump(\Yii::$app->request->isPost);die;
//                var_dump(\Yii::$app->request->userAgent);die;
//                var_dump(\Yii::$app->request->get()).'<br/>';
//                
//                var_dump(\Yii::$app->request->userIp).'<br/>';
//                
//                var_dump(\Yii::$app->request->get('r')).'<br/>';
//                
//                var_dump(\Yii::$app->request->post()).'<br/>';
//                var_dump(\Yii::$app->request->post('r')).'<br/>';
//                die;
//                
//                
//                $model = new \app\models\Article();                var_dump($model);

                if(\Yii::$app->request->isPost){
                    header('Content-type:text/html;charset=utf-8');
                    var_dump(\Yii::$app->request->post());			
                    //exit();
                }
                $html = '<b>hello .</b>';
                $thtml = \yii\helpers\Html::encode($html);
                echo $thtml;
                 $thtml = \yii\helpers\Html::decode($html);
                  echo $thtml;
                $model =  \app\models\Article::findOne(1); 
                return $this->render('article' , ['model' => $model]);
                //return $this->render('index' , ['data' => [1,2,3]]);

		//return $this->renderPartial('index' , ['data' => [1,2,3]]);

	}

	public function actionShowUser(){
		echo 'Show User';
	}

}





?>