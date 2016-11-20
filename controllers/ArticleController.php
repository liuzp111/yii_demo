<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Article;
use Yii;
class ArticleController extends controller
{
    public function  actionIndex(){
        $article = Article::find();//读取的是model中的article类
        $pagination = new \yii\data\Pagination(['totalCount' => $article->count() , 'pageSize' => 1]);
        $data = $article->offset($pagination->offset)->limit($pagination->limit)->all();
            
        return $this->render('index' , ['data' => $data , 'pagination' => $pagination]);
    }
    public function actionAdd(){
        $model = new Article();
        //判断是否是post提交、并自动验证提交的字段
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
            //echo 'success';
            return $this->redirect(['index']);//添加成功跳转到首页            
        }
         return $this->render('add' , ['model' => $model]);
    }
    public function actionEdit($id){
        $id = (int)$id;
        if($id > 0 && ($model = Article::findOne($id))){
            if(Yii::$app->request->isPost && $model -> load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['index']);
            }
            return $this->render('edit' , ['model' => $model]);
        }
        return $this->redirect(['index']);	
    }
    public function actionDelete($id){
        $id = (int)$id;
        if($id > 0){
                Article::findOne($id)->delete();
        }
        return $this->redirect(['index']);
    }
}