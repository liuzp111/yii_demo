<?php

//app指的是网站根目录
//controllers
namespace app\controllers;

//vendor\yiisoft\yii2\web
use yii\web\Controller;
use app\models\Article;
use app\models\Test;
class TestController extends Controller{

	public function actionIndex(){
		echo 'Hello Word';


		//$this->redirect(['site/index']);

		//$this->goHome();
	
		//$this->goBack();

		//$this->refresh();

               // $article = new Article();
               // $article = Article::findOne(1);
                // var_dump($article);
                $test = new Test();
                
                var_dump($test);
		return $this->render('index' , ['data' => [1,2,3]]);

		//return $this->renderPartial('index' , ['data' => [1,2,3]]);

	}

	public function actionShowUser(){
		echo 'Show User';
	}


}





?>