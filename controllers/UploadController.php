<?php
namespace app\controllers;

use yii\web\Controller;

use Yii;
/**
 * 文件上传学习
 */
class UploadController extends Controller
{
    /**
     * 单文件上传
     * @return type
     */
    public function actionUpload(){
        $upload = new \app\models\Upload();
        if(\Yii::$app->request->isPost){
                //$_FILES , load
                $upload->uploadFile = \yii\web\UploadedFile::getInstance($upload , 'uploadFile');
                if($upload->upload()){
                        echo '上传成功';
                }else{
                        var_dump($upload->getErrors());
                }
        }                
        return $this->render('upload' , ['upload' => $upload]);
    }
    /**
     * 多文件上传
     * @return type
     */
    public function actionUploads(){
        $uploads = new \app\models\Upload();
        if(\Yii::$app->request->isPost){
            $uploads ->uploadFile = \yii\web\UploadedFile::getInstances($uploads , 'uploadFile');
            if($uploads -> uploads()){
                    echo '上传多个文件成功';
            }else{
                    var_dump($uploads->getErrors());
            }            
        }
        return $this->render('uploads' , ['uploads' => $uploads]);
    }
}